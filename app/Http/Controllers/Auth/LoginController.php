<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct () {
        $this->middleware(['guest']);
    }

    // Responsible for showing the form
    public function index () {
        return view('auth.login');
    }

    // Responsible for signing in user
    public function store (Request $request) {

        $this->validate($request,
        [
            'email'=> 'required|email',
            'password'=> 'required',
        ]);
         // This is used to sign a user in
        if (! auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('error', 'Invalid login details'); // This would return back to the last page and return "status" to the session
        }
        return redirect()->route('employee');
        
    }
}
