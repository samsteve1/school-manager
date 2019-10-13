<?php

namespace App\Http\Controllers\Student;

use App\Models\Course;
use App\Models\Semester;
use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class StudentController extends Controller
{
    public function classes()
    {

        $activeSession = Session::where('active', true)->first()->load('semesters');
        //  get all courses for each semester
        $fallCourses = $activeSession->semesters[0]->load('courses')->courses;
        $springCourses = $activeSession->semesters[1]->load('courses')->courses;

        // filter the courses and get current student's courses
        $fallCourses = $this->filterCourses($fallCourses);
        $springCourses = $this->filterCourses($springCourses);

        return view('student.my-classes', compact('fallCourses', 'springCourses'));

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
}
