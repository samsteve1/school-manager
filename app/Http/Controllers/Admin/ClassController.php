<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\ClassStoreRequest;

class ClassController extends AdminController
{
    public function index()
    {
        $classes = Course::get();
    }
    public function store(ClassStoreRequest $request)
    {
        dd($request->all());
    }
}
