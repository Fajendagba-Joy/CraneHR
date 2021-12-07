<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __construct () {
        $this->middleware(['guest']);
    }

    public function index () {
        return view('auth.register');
    }

    public function store (Request $request) {


        // dd($request->name); //dd mean Dump and Die

        $this->validate($request,
        [
            'name'=> 'required|max:255',
            'state'=> 'required|max:255',
            'country'=> 'required|max:255',
            'email'=> 'required|email|max:255|unique:users',
            'password'=> 'required|confirmed',
        ]);

        // dd($request->name);

        User::create([
            'name' => $request->name,
            'company_name' => $request->company_name,
            'address' => $request->address,
            'website' => $request->website,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('dashboard');
        return response()->json([
            'success' => 'Registered Successfully'
        ], 400);
    }
}
