<?php

namespace App\Http\Controllers\Admin;

use App\Models\{Course, Semester, Session, Teacher, Role};
use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\Admin\ClassStoreRequest;
use Illuminate\Http\Request;

class ClassController extends AdminController
{
    public function index()
    {
        $classes = Course::get();
    }
    public function create()
    {
        $activeSession = Session::where('active', true)->first()->load('semesters');

        if($activeSession) {
            return view('admin.class.add-class', compact('activeSession'));
        }
        return redirect()->route('admin.session.create')->withSuccess('No active academic session found, Please create one!');

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
        $teachers = Role::where('name', 'teacher')->get()->first()->users;//->users;
        $activeSession = Session::where('active', true)->first()->load('semesters');

        $fallCourses = $activeSession->semesters[0]->load('courses')->courses;
        $springCourses = $activeSession->semesters[1]->load('courses')->courses;

        return view('admin.class.teacher', [
            'teachers' => $teachers,
            'fallCourses' => $fallCourses,
            'springCourses' => $springCourses,
            'activeSession' => $activeSession
        ]);
    }
    public function assignTeacher(Request $request, Course $course)
    {
        if($request->teacher){
            //  find the particluar user
            $teacher = Teacher::findOrFail($request->teacher);
            if($teacher) {

                //  Check if Teacher doesn't have more than three classes

               if ( $this->checkNumberOfTeachersClasses($teacher)) {

                // detach current teacher
                $course->teacher()->detach();

                // attach teacher to class
                $course->teacher()->attach($teacher);
                return back()->withSuccess("{$teacher->fullName()} has been assigned to {$course->title}");
               }

               return back()->withError("{$teacher->fullName()} has been assigned to 3 classes already.");

            }
        }
        return back()->withError('Please select a Teacher to assign.');
    }
    protected function checkNumberOfTeachersClasses(Teacher $teacher)
    {
       if ($teacher->courses->count() < 3) {
           return true;
       }
       return false;
    }
}
