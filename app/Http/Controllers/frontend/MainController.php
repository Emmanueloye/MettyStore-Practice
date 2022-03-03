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
}
