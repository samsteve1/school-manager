<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    protected $fillable = ['code', 'title'];
    use SoftDeletes;

    public function users()
    {
        //return $this->belongsToMany(User::class)
    }

}
