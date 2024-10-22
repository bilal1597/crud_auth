<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function forgot()
    {
        return view('forgot_pass');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);
        // dd($request->all());
        $count = User::where('email', '=', $request->email)->count();
        if ($count > 0) {
            // dd($request->all());
            $user = User::where('email', '=', $request->email)->first();
            $user->remember_token = Str::random(50);
            $user->save();
            return redirect()->route('forgot')->with(
                'success',
                'Password has been reset'
            );
        } else {
            return redirect()->route('forgot')->withErrors([
                'email' => 'The provided credentials do not match our System',
            ]);;
        }
    }
}
