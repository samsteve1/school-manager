<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function show(Semester $semester)
    {

        $courses = $semester->courses->load(['users', 'teacher']);

       return view('admin.semester.index', compact(['semester', 'courses']));
    }
}
