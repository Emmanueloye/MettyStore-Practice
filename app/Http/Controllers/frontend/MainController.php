<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\ThumbnailImg;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function productDetails($id, $slug)
    {
        $product = Product::findOrFail($id);
        $thumbnails = ThumbnailImg::where('product_id', $id)->get();
        $relatedProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $id)->where('status', 1)->latest()->limit(4)->get();
        return view('frontend.product.product-details', compact('product', 'thumbnails', 'relatedProducts'));
    }

    public function categoryWiseProducts($id, $slug)
    {
        $products = Product::where('category_id', $id)->where('status', 1)->latest()->paginate(3);
        $category = Category::findOrFail($id);
        $subcategories = Subcategory::where('category_id', $id)->orderBy('id', 'ASC')->get();
        return view('frontend.product.product-catwise', compact('products', 'category', 'subcategories'));
    }

    public function subcategoryWiseProducts($id, $slug)
    {

        $products = Product::where('status', 1)->where('subcategory_id', $id)->latest()->paginate(3);
        $subcat = Subcategory::findOrFail($id);
        return view('frontend.product.product-subcatwise', compact('products', 'subcat'));
    }

    public function applyCoupon(Request $request)
    {
        if (Auth::check()) {

            $coupon = Coupon::where('coupon_code', $request->coupon_code)->first();
            $carts = Cart::with('product')->where('user_id', Auth::id())->get();

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


            $discountAmount = null;
            if ($coupon->coupon_type == 'Fixed') {
                $discountAmount = $coupon->coupon_discount;
            } else {
                $discountAmount = $totalAmount * ($coupon->coupon_discount / 100);
            }

            if ($coupon && $coupon->expiration_date >= Carbon::now()->format('Y-m-d')) {
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
            return response()->json(array(
                'coupon_code' => Session::get('coupon')['coupon_code'],
                'coupon_discount' => Session::get('coupon')['coupon_discount'],
                'total' => Session::get('coupon')['total'],
                'grandTotal' => Session::get('coupon')['grandTotal']
            ));
        } else {

            $carts = Cart::with('product')->where('user_id', Auth::id())->get();

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
}
