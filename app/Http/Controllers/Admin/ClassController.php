<?php

namespace App\Http\Controllers\Admin;

use App\Models\{Course, Semester, Session, Teacher, Role, User};
use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\Admin\ClassStoreRequest;
use Illuminate\Http\Request;

class ClassController extends AdminController
{
    public  $activeSession;
    public $fallCourses;
    public $springCourses;

    public function __construct()
    {
        $this->activeSession = Session::where('active', true)->first()->load('semesters');
        $this->fallCourses = $this->activeSession->semesters[0]->load('courses')->courses;
        $this->springCourses = $this->activeSession->semesters[1]->load('courses')->courses;

    }
    public function index()
    {
        return view('admin.class.index', [
            'fallCourses' => $this->fallCourses,
            'springCourses' => $this->springCourses,
            'activeSession' => $this->activeSession
        ]);
    }
    public function create()
    {
        $activeSession = Session::where('active', true)->first()->load('semesters');

        if($activeSession) {
            return view('admin.class.add-class', compact('activeSession'));
        }
        return redirect()->route('admin.session.create')->withSuccess('No active academic session found, Please create one!');

    }
    public function show(Course $class)
    {
        $class = $class->load(['users', 'teacher']);
       return view('admin.class.class', compact('class'));
    }

    /**
     * Create a new course
     *
     * @param ClassStoreRequest $request
     *
     */
    public function store(ClassStoreRequest $request)
    {

        $course = $request->only(['code', 'title']);
        $course  = Course::create($course);

        // find the semester and attach course
        $semester = Semester::find($request->semester);
        $semester->courses()->attach($course);
        return redirect()->back()->withSuccess('Class created!');
    }
    public function teacher()
    {
        $teachers = Role::where('name', 'teacher')->get()->first()->users;

        return view('admin.class.teacher', [
            'teachers' => $teachers,
            'fallCourses' => $this->fallCourses,
            'springCourses' => $this->springCourses,
            'activeSession' => $this->activeSession
        ]);
    }
    public function assignTeacher(Request $request, Course $course)
    {
        if($request->teacher){
            //  find the particluar user
            $teacher = Teacher::findOrFail($request->teacher);
            if($teacher) {

                //  Check if Teacher doesn't have more than three classes

               if ( $this->checkNumberOfTeachersClasses($teacher, $course)) {

                // detach current teacher
                $course->teacher()->detach();

                // attach teacher to class
                $course->teacher()->attach($teacher);
                return back()->withSuccess("{$teacher->fullName()} has been assigned to {$course->title}");
               }

               return back()->withError("{$teacher->fullName()} has been assigned to 3 classes already this semester.");

            }
        }
        return back()->withError('Please select a Teacher to assign.');
    }
    public function removeStudent(Course $course, User $user)
    {
        $course->users()->detach($user);
        return back()->withSuccess("{$user->fullName()} removed from {$course->title}");
    }

    protected function checkNumberOfTeachersClasses(Teacher $teacher, Course $course)
    {
        $count = 0;

        $semester = $course->semesters->first();
        $courses = $semester->courses;

        //  calculate number of courses teacher has in the semester
        foreach($courses as $course) {

            if ($course->hasTeacher()) {

                if($course->teacher->first()->id == $teacher->id) {
                    $count++;
                }
            }
        }

        //  check if classes is up to three
       if ($count < 3) {
           return true;
       }

       return false;
    }
}
