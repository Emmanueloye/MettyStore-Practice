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
        return view('backend.coupon.update-coupon', compact('coupon'));
    }

    public function couponUpdate(Request $request, $id)
    {
        $request->validate([
            'coupon_code' => 'required|unique:coupons',
            'coupon_type' => 'required',
            'coupon_discount' => 'required',
            'expiration_date' => 'required'
        ]);

        $coupon = Coupon::findOrFail($id);
        $coupon->coupon_code = $request->coupon_code;
        $coupon->coupon_type = $request->coupon_type;
        $coupon->coupon_discount = $request->coupon_discount;
        $coupon->expiration_date = $request->expiration_date;
        $coupon->save();

        return redirect()->route('coupon');
    }

    public function couponDelete($id)
    {
        Coupon::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function couponDeactivate($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->status = 0;
        $coupon->save();
        return redirect()->back();
    }

    public function couponActivate($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->status = 1;
        $coupon->save();
        return redirect()->back();
    }
}
