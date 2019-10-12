<?php

namespace App\Models;

use App\Models\{Semester, Teacher};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    protected $fillable = ['code', 'title'];
    use SoftDeletes;

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_courses');
    }

    public function semesters()
    {
        return $this->belongsToMany(Semester::class, 'semesters_courses');
    }
    public function teacher()
    {
        return $this->belongsToMany(Teacher::class, 'teachers_courses');
    }

}
