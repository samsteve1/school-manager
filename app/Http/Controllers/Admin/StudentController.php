<?php

namespace App\Http\Controllers\Admin;

use App\Models\{role, User};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $role = Role::where('name', 'student')->first();
        if($role) {
            $studentCount = $role->users->count();
            $students = $role->users()->paginate(1);
            return view('admin.student.index', compact('students', 'studentCount'));
        }

    }
    public function show(User $student)
    {
        $student = $student->load('courses');
        return view('admin.student.student', compact('student'));
    }
}
