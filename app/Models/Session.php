<?php

namespace App\Models;

use App\Models\Semester;
use Illuminate\Database\Eloquent\Model;



class Session extends Model
{
    protected $fillable = ['year', 'active'];

    public function semesters()
    {
        return $this->hasMany(Semester::class);
    }
    protected static  function boot()
    {
        Parent::boot();

        static::creating(function () {
            $sessions = Session::get();
            foreach($sessions as $session) {
                $session->update(['active' => false]);
                foreach($session->semesters as $semester) {
                    $semester->update(['active' => false]);
                }
            }
        });
    }
}
