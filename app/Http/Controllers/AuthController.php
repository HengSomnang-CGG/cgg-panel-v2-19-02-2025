<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class AuthController extends Controller
{
    public function index()
    {
        return view("login");
    }

    public function gateUsers(Request $request)
    {
        $credentials = $request->only("name", "password");

        if (Auth::attempt($credentials)) {
            Alert::success("Welcome\n\n" . Auth::user()->name . '', "\n\nYou've Been Successfully Logged In");
            return redirect()->intended('/panel')->withSuccess('Signed in');
        }

        Alert::warning("Failure\n\n", "\n\n Something went wrong..");
        return back()->withInput($request->only('name'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/panel/login');
    }

    public function login(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'password' => 'required'
    ]);

    $user = \App\Models\User::where('name', $request->name)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            'error' => 'Invalid credentials.'
        ], 401);
    }

    $ip = $request->ip();
    if (env('APP_ENV') === 'production') {
        $ip = $request->header('X-Forwarded-For') ?: $ip;
    }

    // Generate and store the token
    // $token = $user->createToken('auth_token')->plainTextToken;

    $user->update([
        'ip' => $ip,

    ]);

    return response()->json([
        'message' => 'You have successfully logged in.',
        'data' => [
            'user' => $user,
            // 'token' => $token,
            'ip' => $ip
        ]
    ]);
}
}
