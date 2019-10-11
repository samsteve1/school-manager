<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\PasswordChangeRequest;
use Illuminate\Support\Facades\Hash;
class PasswordChangeController extends Controller
{
    public function  create()
    {
        return view('account.password.index');
    }
    public function store(PasswordChangeRequest $request)
    {
        auth()->user()->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('account.index')->withSuccess('Account password changed!');
    }
}
