<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart as ModelsCart;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        // check if user is logged in
        if (Auth::check()) {

            // check if product already exist in cart table for a particular user
            $existUser = ModelsCart::where('user_id', Auth::id())->where('product_id', $id)->first();
            if (!$existUser) {

                // save product to cart if product does not exist in cart for the user
                $cart = new ModelsCart();
                $cart->user_id = Auth::id();
                $cart->session_id = null;
                $cart->product_id = $id;
                $cart->product_qty = $request->product_qty;
                $cart->save();

                return response()->json(['success' => 'Product added to cart successfully']);
            } else {
                // increase product quantity by 1 if product already exist for the user
                $existUser->product_qty = $existUser->product_qty + 1;

                $existUser->save();

                return response()->json(['success' => 'Product added to cart successfully']);
            }
        } else {
            return response()->json(['error' => 'Please login to add product to cart']);
        }
    }

    public function addToCartSessionOption(Request $request, $id)
    {

        if (Auth::check()) {
            $existUser = ModelsCart::where('user_id', Auth::id())->where('product_id', $id)->first();
            if (!$existUser) {

                $cart = new ModelsCart();
                $cart->user_id = Auth::id();
                $cart->session_id = null;
                $cart->product_id = $id;
                $cart->product_qty = $request->product_qty;
                $cart->save();

                return response()->json(['success' => 'Product added to cart successfully']);
            } else {

                $existUser->product_qty = $request->product_qty;

                $existUser->save();

                return response()->json(['success' => 'Product added to cart successfully']);
            }
        } else {
            // use session. Generating session id
            $session_id = Session::get('session_id');
            if (empty($session_id)) {
                $session_id = Session::getId();
                Session::put('session_id', $session_id);
            }

            $existUser = ModelsCart::where('session_id', Session::get('session_id'))->where('product_id', $id)->first();

            if (!$existUser) {

                $cart = new ModelsCart();
                $cart->user_id = null;
                $cart->session_id = $session_id;
                $cart->product_id = $id;
                $cart->product_qty = $request->product_qty;
                $cart->save();

                return response()->json(['success' => 'Product added to cart successfully']);
            } else {

                $existUser->product_qty = $request->product_qty;

                $existUser->save();

                return response()->json(['success' => 'Product added to cart successfully']);
            }
        }
    }

    public function shoppingCartView()
    {
        return view('frontend.product.cart');
    }

    public function cartItems()
    {
        $carts = ModelsCart::with('product')->where('user_id', Auth::id())->latest()->get();
        $totalAmount = 0;
        foreach ($carts as $cart) {
            $sellingPrice = null;
            if ($cart->product->discount_price == null) {
                $sellingPrice = $cart->product->selling_price;
            } else {
                $sellingPrice = $cart->product->discount_price;
            }

            $totalAmount = $totalAmount + ($cart->product_qty * $sellingPrice);
        }

        return response()->json(array(
            'cartItems' => $carts,
            'totalAmount' => $totalAmount,
        ));
    }

    public function deleteCart($id)
    {
        ModelsCart::where('id', $id)->first()->delete();
        return response()->json('deleted');
    }

    public function cartCount()
    {
        $cartQty = ModelsCart::where('user_id', Auth::id())->get();
        return response()->json($cartQty);
    }

    public function cartQtyIncrement($id)
    {
        $cartItem = ModelsCart::findOrFail($id);
        $cartItem->product_qty = $cartItem->product_qty + 1;
        $cartItem->save();

        if (Session::has('coupon')) {

            $coupon_code = Session::get('coupon')['coupon_code'];
            $coupon = Coupon::where('coupon_code', $coupon_code)->first();
            $carts = ModelsCart::with('product')->where('user_id', Auth::id())->get();

            $totalAmount = 0;
            foreach ($carts as $cart) {
                $sellingPrice = null;
                if ($cart->product->discount_price == null) {
                    $sellingPrice = $cart->product->selling_price;
                } else {
                    $sellingPrice = $cart->product->discount_price;
                }

                $totalAmount  += ($cart->product_qty * $sellingPrice);
            }

            $discountAmount = null;
            if ($coupon->coupon_type == 'Fixed') {
                $discountAmount = $coupon->coupon_discount;
            } else {
                $discountAmount = $totalAmount * ($coupon->coupon_discount / 100);
            }

            Session::put('coupon', [
                'coupon_code' => $coupon->coupon_code,
                'coupon_discount' => $discountAmount,
                'total' => $totalAmount,
                'grandTotal' => $totalAmount - $discountAmount,
            ]);
        }

        return response()->json('updated');
    }

    public function cartQtyDecrement($id)
    {
        $cartItem = ModelsCart::findOrFail($id);
        $cartItem->product_qty = $cartItem->product_qty - 1;
        $cartItem->save();

        if (Session::has('coupon')) {

            $coupon_code = Session::get('coupon')['coupon_code'];
            $coupon = Coupon::where('coupon_code', $coupon_code)->first();
            $carts = ModelsCart::with('product')->where('user_id', Auth::id())->get();

            $totalAmount = 0;
            foreach ($carts as $cart) {
                $sellingPrice = null;
                if ($cart->product->discount_price == null) {
                    $sellingPrice = $cart->product->selling_price;
                } else {
                    $sellingPrice = $cart->product->discount_price;
                }

                $totalAmount  += ($cart->product_qty * $sellingPrice);
            }

            $discountAmount = null;
            if ($coupon->coupon_type == 'Fixed') {
                $discountAmount = $coupon->coupon_discount;
            } else {
                $discountAmount = $totalAmount * ($coupon->coupon_discount / 100);
            }

            Session::put('coupon', [
                'coupon_code' => $coupon->coupon_code,
                'coupon_discount' => $discountAmount,
                'total' => $totalAmount,
                'grandTotal' => $totalAmount - $discountAmount,
            ]);
        }

        return response()->json('updated');
    }

    public function applyCoupon(Request $request)
    {
        if (Auth::check()) {

            $coupon = Coupon::where('coupon_code', $request->coupon_code)->first();
            $carts = ModelsCart::with('product')->where('user_id', Auth::id())->get();

            $totalAmount = 0;
            foreach ($carts as $cart) {
                $sellingPrice = null;
                if ($cart->product->discount_price == null) {
                    $sellingPrice = $cart->product->selling_price;
                } else {
                    $sellingPrice = $cart->product->discount_price;
                }

                $totalAmount  += ($cart->product_qty * $sellingPrice);
            }


            if ($coupon && $coupon->expiration_date >= Carbon::now()->format('Y-m-d') && $coupon->status == 1) {

                $discountAmount = null;
                if ($coupon->coupon_type == 'Fixed') {
                    $discountAmount = $coupon->coupon_discount;
                } else {
                    $discountAmount = $totalAmount * ($coupon->coupon_discount / 100);
                }

                Session::put('coupon', [
                    'coupon_code' => $coupon->coupon_code,
                    'coupon_discount' => $discountAmount,
                    'total' => $totalAmount,
                    'grandTotal' => $totalAmount - $discountAmount,
                ]);
                return response()->json(['success' => 'Coupon applied successfully']);
            } else {
                return response()->json(['error' => 'Your coupon code is invalid']);
            }
        } else {
            return response()->json(['error' => 'Please login to apply coupon']);
        }
    }

    public function getCoupon()
    {
        if (Session::has('coupon')) {

            $carts = ModelsCart::with('product')->where('user_id', Auth::id())->get();

            $totalAmount = 0;
            foreach ($carts as $cart) {
                $sellingPrice = null;
                if ($cart->product->discount_price == null) {
                    $sellingPrice = $cart->product->selling_price;
                } else {
                    $sellingPrice = $cart->product->discount_price;
                }

                $totalAmount = $totalAmount + ($cart->product_qty * $sellingPrice);
            }

            return response()->json(array(
                'coupon_code' => Session::get('coupon')['coupon_code'],
                'coupon_discount' => Session::get('coupon')['coupon_discount'],
                'total' => $totalAmount,
                'grandTotal' => Session::get('coupon')['grandTotal']
            ));
        } else {

            $carts = ModelsCart::with('product')->where('user_id', Auth::id())->get();

            $totalAmount = 0;
            foreach ($carts as $cart) {
                $sellingPrice = null;
                if ($cart->product->discount_price == null) {
                    $sellingPrice = $cart->product->selling_price;
                } else {
                    $sellingPrice = $cart->product->discount_price;
                }

                $totalAmount = $totalAmount + ($cart->product_qty * $sellingPrice);
            }
            return response()->json([
                'noCouponTotal' => $totalAmount,
            ]);
        }
    }

    public function removeCoupon()
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');

            return response()->json(['success' => 'Coupon removed successfully']);
        }
    }
}
