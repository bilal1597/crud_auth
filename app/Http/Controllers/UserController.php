<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function showProducts()
    {

        if (Auth::check()) {
            $collection = Product::all();
            return view('products', compact('collection'));
        } else {
            return redirect()->route('view.login');
        }
    }

    public function loadAddUser()
    {
        return view('add_product');
    }

    public function addUser(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required',
            'details' => 'required',
            'price' => 'required|integer|max:9999999'
        ]);
        Product::create($data);
        return redirect()->route('product.view');
    }

    public function viewProduct(string $id)
    {
        $product = Product::find($id);
        return view('edit', compact('product'));
    }

    public function editProduct(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required',
            'details' => 'required',
            'price' => 'required|integer|max:9999999'
        ]);

        Product::where('id', $request->id)->update($data);

        return redirect()->route('product.view')->with('success', 'User Updated Successfully');
    }

    public function deleteProduct($id)
    {
        $delete = Product::findOrFail($id);
        $delete->delete();
        return redirect()->route('product.view');
    }

    //////////////////// Authentication ////////////////////


    public function getLogin()
    {
        if (Auth::check()) {
            return redirect()->route('product.view');
        } else {

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
            return redirect()->route('view.login')
                ->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ]);
        }
    }

    public function viewRegister()
    {
        if (Auth::check()) {
            return redirect()->route('product.view');
        } else {
            return view('register');
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
