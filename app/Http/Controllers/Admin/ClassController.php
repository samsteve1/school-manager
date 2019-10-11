<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\Admin\ClassStoreRequest;

class ClassController extends AdminController
{
    public function index()
    {
        $classes = Course::get();
    }
    public function create()
    {
        return view('admin.pages.class.add-class');
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
        return redirect()->back()->withSuccess('Class created!');
    }
}
