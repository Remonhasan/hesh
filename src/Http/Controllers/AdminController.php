<?php

namespace Remonhasan\Hesh\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Remonhasan\Hesh\Models\Admin;

class AdminController extends Controller
{
    /**
     * Register Page as a Admin
     *
     * @return void
     */
    public function registerForm()
    {
        return view('hesh::register');
    }

    /**
     * Register as a Admin
     *
     * @return void
     */
    public function register(Request $request)
    {
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);

        $admin->save();

        return back()->with('success', 'Registered Successfully!');
    }

    /**
     * loginForm
     *
     * @return void
     */
    public function loginForm()
    {
        return view('hesh::login');
    }

    /**
     * dashboard
     *
     * @return void
     */
    public function dashboard()
    {
        return view('hesh::master');
    }

    /**
     * login Check
     *
     * @param  mixed $request
     * @return void
     */
    public function login(Request $request)
    {
        $loginCheck = $request->all();

        if (Auth::guard('admin')->attempt(['email' => $loginCheck['email'], 'password' => $loginCheck['password']])) {
            return redirect()->route('admin.dashboard')->with('error', 'Admin Login Successfully');
        } else {
            return redirect()->back()->with('error', 'Invalid Email or Password');
        }
    }

    /**
     * Logout
     *
     * @return void
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login.form')->with('error', 'Admin Logout Successfully');
    }
}
