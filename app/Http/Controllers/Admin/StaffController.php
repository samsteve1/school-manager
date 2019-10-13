<?php

namespace App\Http\Controllers\Admin;

use App\Models\{User, Role};
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreStaffRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index()
    {
        $role = Role::where('name', 'student')->first();
        //  fetch all staff
        $staffs = User::get();

        $staffs = $staffs->filter(function($staff) {

            foreach($staff->roles as $role){
                return $role->name != 'student';
            }
        });
        return view('admin.staff.index', compact('staffs'));


    }
    public function create()
    {
        $roles = Role::get();
        $roles = $roles->filter(function($role) {
            return strtolower($role->name) != 'student';
        });

        return view('admin.staff.create', compact('roles'));
    }

    public function show(User $staff)
    {
        $staff = $staff->load(['roles']);
       return view('admin.staff.show', compact('staff'));
    }
    public function store(StoreStaffRequest $request)
    {
        $role = Role::findOrFail($request->role);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email'     => $request->email,
            'gender'    => $request->gender,
            'password' => Hash::make($request->password),
            'active' => true
        ]);
        $user->roles()->attach($role);

        return back()->withSuccess('Staff added!');
    }
}
