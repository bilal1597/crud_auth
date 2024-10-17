<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function products()
    {

        if (Auth::check()) {
            return view('products');
        } else {
            return redirect()->route('view.login');
        }
    }

    public function getLogin()
    {
        if (Auth::check()) {
            return redirect()->route('product.view');
        } else {
            // return redirect()->route('view.login');
            return view('login');
        }
    }

    public function login(Request $request)
    {

        // return view('login');

        $user = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        if (Auth::attempt($user)) {
            // $request->session()->regenerate();
            return redirect()->route('product.view');
        } else {
            return redirect()->route('view.login');
        }
    }



    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'mobile' => 'required | max:11',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
            'password_confirm' => 'same:password'

        ]);

        User::create($data);
        return redirect()->route('view.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('view.login');
    }
}
