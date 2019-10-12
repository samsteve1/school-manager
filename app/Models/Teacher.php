<?php

namespace App\Models;

use App\Models\{User, Course};
use Illuminate\Database\Eloquent\Model;

class Teacher extends User
{
    protected $table = 'users';

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'teachears_courses');
    }

    public function fullName()
    {
        return parent::fullName();
    }
}
