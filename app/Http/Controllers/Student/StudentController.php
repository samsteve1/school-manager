<?php

namespace App\Http\Controllers\Student;

use App\Models\{Course, Semester, Session};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class StudentController extends Controller
{
    protected $activeSession;
    protected $fallCourses;
    protected $springCourses;

    public function __construct()
    {
        //  Get active semesters and courses
        $this->activeSession = Session::where('active', true)->first()->load('semesters');
        $this->fallCourses = $this->activeSession->semesters[0]->load('courses')->courses;
        $this->springCourses = $this->activeSession->semesters[1]->load('courses')->courses;
    }

    public function classes()
    {

        // filter the courses and get current student's courses
        $fallCourses = $this->filterCourses($this->fallCourses);
        $springCourses = $this->filterCourses($this->springCourses);

        return view('student.my-classes', compact('fallCourses', 'springCourses'));

    }

    public function enroll()
    {

        return view('student.enroll', [
            'fallCourses' => $this->fallCourses,
            'springCourses' => $this->springCourses
        ]);
    }
    public function enrollStore(Request $request, Course $course)
    {
        $course = Course::findOrFail($request->class);
        // check if student already enroll
        if ($this->isEnrolled($course)) {
            return back()->withError("You're already enrolled in {$course->title}");
        }

        // check if student has enrolled in up to 6 classes in the semester
        if ($this->isEnrolledInMaximumClasses($course)) {
            return back()->withError("You can only enroll in 6 classes in a semester!");
        }

        // check if class students are up to 60 already
        if ($this->classHasMaximumStudents($course)) {
            return back()->withError("Only 60 students are allowed to enroll in this class. Try chacking other classes.");
        }

        // finnaly, enroll student

        $course->users()->attach(auth()->user());

        return back()->withSuccess("You are successfully enrolled in {$course->title}.");

    }

     // filter the courses and get current student's courses
    protected function filterCourses(Collection $courses)
    {
        return $courses->filter(function ($course) {
            foreach ($course->users as $user) {
                return $user->id === auth()->user()->id;
            }
        });
    }
    protected function isEnrolled(Course $course)
    {
        return $course->hasCurrentUser();
    }
    protected function isEnrolledInMaximumClasses(Course $course)
    {
        $count = 0;

        $semester = $course->semesters->first();
        $courses = $semester->courses;
        //  get the total courses the student has in the session;
        foreach($courses as $course) {

            if ($course->hasCurrentUser()) {

                if($course->users->first()->id == auth()->user()->id) {
                    $count++;
                }
            }
        }
       //   check if class is up to 6
       if ($count < 6) {
           return false;
       }
       return true;
    }
    protected function classHasMaximumStudents(Course $course)
    {
        return $course->users->count() >= 60;
    }
}
