<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $roles = auth()->user()->roles;
        $permissions = auth()->user()->permissions;



        return view('account.pages.profile', [
            'roles' => $roles,
            'permissions' => $permissions
        ]);
    }
}
