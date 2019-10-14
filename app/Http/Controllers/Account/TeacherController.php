<?php

namespace App\Http\Controllers\Account;

use App\Models\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher = Teacher::findOrFail(auth()->user()->id);
        $classes = $teacher->courses;

       return view('account.teacher.index', compact('classes'));
    }
}
