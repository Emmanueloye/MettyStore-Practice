<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function couponView()
    {
        $coupons = Coupon::latest()->get();
        return view('backend.coupon.coupon', compact('coupons'));
    }

    public function couponStore(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|unique:coupons',
            'coupon_type' => 'required',
            'coupon_discount' => 'required',
            'expiration_date' => 'required'
        ]);

        $coupon = new Coupon();
        $coupon->coupon_code = strtoupper($request->coupon_code);
        $coupon->coupon_type = $request->coupon_type;
        $coupon->coupon_discount = $request->coupon_discount;
        $coupon->expiration_date = $request->expiration_date;
        $coupon->save();

        return redirect()->back()->with('success', 'Coupon created successfully');
    }

    public function couponEdit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('backend.coupon.edit-coupon', compact('coupon'));
    }
}
