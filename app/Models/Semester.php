<?php

namespace App\Models;

use App\Models\{Session, Course};
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = ['type', 'active'];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'semesters_courses');
    }

    public function students()
    {
        $count = 0;
        $courses = $this->courses;
        foreach($courses as $course) {
            $count += $course->users->count();
        }
        return $count;
    }
}
