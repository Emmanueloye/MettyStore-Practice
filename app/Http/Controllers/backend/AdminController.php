<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        return view('backend.index');
    }

    public function adminLogin()
    {
        return view('backend.auth.login');
    }

    public function adminSignIn(Request $request)
    {
        $request->validate([
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required'
        ]);

        $check = $request->all();
        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('success', 'Invalid email or password. Please check your credentials and try again.');
        }
    }

    public function adminRegister()
    {
        return view('backend.auth.register');
    }

    public function createAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|unique:admins|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required|min:5',
            'confirm_password' => 'same:password',
        ]);

        $adminData = new Admin;
        $adminData->name = $request->name;
        $adminData->email = $request->email;
        $adminData->password = Hash::make($request->password);
        $adminData->save();

        return redirect()->route('admin.login');
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'We look forward to seeing you soon');
    }
}
