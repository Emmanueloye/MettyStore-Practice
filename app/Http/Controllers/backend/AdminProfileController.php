<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function adminProfileView()
    {
        $id = Auth::guard('admin')->user()->id;
        $adminData = Admin::find($id);
        return view('backend.profile.profile', compact('adminData'));
    }

    public function adminProfileEdit()
    {
        $id = Auth::guard('admin')->user()->id;
        $adminData = Admin::find($id);
        return view('backend.profile.profile-edit', compact('adminData'));
    }

    public function adminProfileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'profile_image' => 'image|mimes:jpg,jpeg,png,svg,gif|max:2048'
        ]);

        $id = Auth::guard('admin')->user()->id;
        $adminData = Admin::find($id);
        $adminData->name = $request->name;
        $adminData->email = $request->email;

        $profileImage = $request->file('profile_image');

        if ($profileImage) {
            $imageName = $profileImage->getClientOriginalName();
            unlink(public_path('upload/profile/admin-image/' . $adminData->profile_image));
            $profileImage->move(public_path('upload/profile/admin-image/'), $imageName);
            $adminData->profile_image = $imageName;
        }
        $adminData->save();
        return redirect()->route('admin.profile');
    }

    public function adminUpdatePassword()
    {
        return view('backend.profile.update-password');
    }

    public function updatePasswordStore(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:5',
            'confirm_password' => 'same:password',
        ]);

        $id = Auth::guard('admin')->user()->id;
        $adminData = Admin::find($id);
        $encryptedPassword = $adminData->password;

        if (Hash::check($request->current_password, $encryptedPassword)) {
            $adminData->password = Hash::make($request->password);
            $adminData->save();
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login');
        } else {
            return redirect()->back()->with('success', 'Sorry, we do not have your current password in our records. Please check and try again.');
        }
    }
}
