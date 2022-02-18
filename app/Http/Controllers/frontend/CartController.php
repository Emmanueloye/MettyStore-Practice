<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart as ModelsCart;
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

        return response()->json($carts);
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
        return response()->json('updated');
    }

    public function cartQtyDecrement($id)
    {
        $cartItem = ModelsCart::findOrFail($id);
        $cartItem->product_qty = $cartItem->product_qty - 1;
        $cartItem->save();
        return response()->json('updated');
    }
}
