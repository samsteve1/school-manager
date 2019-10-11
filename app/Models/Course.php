<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    protected $fillable = ['code', 'title', 'maximum_number_of_students'];
    use SoftDeletes;

    public function users()
    {
        //return $this->belongsToMany(User::class)
    }

}
