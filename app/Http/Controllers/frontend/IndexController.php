<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class IndexController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->latest()->limit(3)->get();
        $products = Product::where('status', 1)->latest()->limit(8)->get();
        $highDemands = Product::where('status', 1)->where('popular_demand', 1)->latest()->limit(8)->get();
        $hotDeals = Product::where('status', 1)->where('hot_deals', 1)->where('discount_price', '!=', NULL)->latest()->limit(8)->get();
        $hairSkip = Category::skip(0)->first();
        $hairProducts = Product::where('status', 1)->where('category_id', $hairSkip->id)->latest()->limit(8)->get();
        $accessoriesSkip = Category::skip(1)->first();
        $accessoriesProducts = Product::where('status', 1)->where('category_id', $accessoriesSkip->id)->latest()->limit(8)->get();
        $haircareSkip = Category::skip(2)->first();
        $haircareProduct = Product::where('status', 1)->where('category_id', $haircareSkip->id)->latest()->limit(8)->get();
        return view('frontend.index', compact('sliders', 'products', 'highDemands', 'hotDeals', 'hairSkip', 'hairProducts', 'accessoriesSkip', 'accessoriesProducts', 'haircareSkip', 'haircareProduct'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function editProfile($id)
    {
        $user = User::findorFail($id);
        return view('frontend.profile.profile-edit', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'profile_image' => 'image|mimes:jpg,jpeg,png,svg,gif'
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        $profileImage = $request->file('profile_image');
        dd($profileImage);

        if ($profileImage) {
            $imageName = time() . $profileImage->getClientOriginalName();
            unlink(public_path('upload/profile/user-image/' . $user->profile_image));
            $profileImage->move(public_path('upload/profile/user-image/'), $imageName);
            $user->profile_image = $imageName;
        }
        $user->save();

        return redirect()->route('dashboard');
    }

    public function changePassword()
    {
        return view('frontend.profile.change-password');
    }

    public function UpdatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:5',
            'confirm_password' => 'same:password',
        ]);
        $user = User::findOrFail(Auth::user()->id);
        $encryptedPassword = $user->password;

        if (Hash::check($request->current_password, $encryptedPassword)) {
            $user->password = Hash::make($request->password);
            $user->save();

            Auth::logout();

            return redirect('/');
        } else {
            return redirect()->back()->with('success', 'Your credentials do not match our records. Please check and try again.');
        }
    }
}
