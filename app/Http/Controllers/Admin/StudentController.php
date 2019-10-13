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
            $students = $role->users()->paginate(1);
            return view('admin.student.index', compact('students'));
        }

    }
    public function show(User $student)
    {
        $student = $student->load('courses');
        return view('admin.student.student', compact('student'));
    }
}
