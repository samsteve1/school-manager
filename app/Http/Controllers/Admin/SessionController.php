<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\SessionStoreRequest;


class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::latest()->get();
        return view('admin.session.index', compact('sessions'));
    }
    public function create()
    {
        return view ('admin.session.create');
    }
    public function store(SessionStoreRequest $request)
    {
        $session = Session::create(['year' => $request->year, 'active'  => true]);
        $this->createSemesters($session);

        return redirect()->route('account.index')->withSuccess('Academic session has been created and initialized.');
    }
    protected function createSemesters(Session $session)
    {
        $session->semesters()->create(['type' => 'fall', 'active' => true]);
        $session->semesters()->create(['type' => 'spring', 'active' => true]);
    }
}
