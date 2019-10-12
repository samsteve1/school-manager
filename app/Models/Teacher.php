<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Teacher extends User
{
    protected $table = 'users';
}
