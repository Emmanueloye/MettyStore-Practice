<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Navlist;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\ThumbnailImg;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function productView()
    {
        $navlists = Navlist::latest()->get();
        $products = Product::latest()->get();
        return view('backend.products.product', compact('navlists', 'products'));
    }

    public function getSubcategories($id)
    {
        $subcategories = Subcategory::where('category_id', $id)->orderBy('subcategory_name', 'ASC')->get();
        return json_encode($subcategories);
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'navlist_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'product_name' => 'required|unique:products',
            'product_qty' => 'required',
            'product_color' => 'required',
            'product_code' => 'unique:products',
            'product_tag' => 'required',
            'selling_price' => 'required',
            'product_image' => 'required|image|mimes:jpg,jpeg,png,svg,gif',
            'short_desc' => 'required',
            'long_desc' => 'required',
        ], [
            'navlist_id.required' => 'The Navlist field is required',
            'category_id.required' => 'The Category field is required',
            'subcategory_id.required' => 'The Subcategory field is required',
            'short_desc.required' => 'The short description field is required',
            'long_desc.required' => 'The long description field is required'
        ]);

        $productImage = $request->file('product_image');
        $imageName = time() . $productImage->getClientOriginalName();
        Image::make($productImage)->resize(917, 1000)->save('upload/products/product-images/' . $imageName);
        $savedPath = 'upload/products/product-images/' . $imageName;

        $product = new Product();
        $product->navlist_id = $request->navlist_id;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->product_name = $request->product_name;
        $product->product_slug = strtolower(str_replace(' ', '-', $request->product_name));
        $product->product_qty = $request->product_qty;
        $product->product_color = $request->product_color;
        $product->product_code = 'P-' . floor(time() - 999999999);
        $product->product_tag = $request->product_tag;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->product_image = $savedPath;
        $product->short_desc = $request->short_desc;
        $product->long_desc = $request->long_desc;
        $product->new_arrival = $request->new_arrival;
        $product->popular_demand = $request->popular_demand;
        $product->hot_deals = $request->hot_deals;
        $product->featured = $request->featured;
        $product->all_products = $request->all_products;
        $product->status = 1;
        $product->save();

        $product_id = $product->id;

        $multiImgs = $request->file('thumbnail');
        foreach ($multiImgs as $img) {
            $imgName = time() . $img->getClientOriginalName();
            Image::make($img)->resize(917, 1000)->save('upload/products/product-thumbnails/' . $imgName);
            $savedPath = 'upload/products/product-thumbnails/' . $imgName;

            $thumbnail = new ThumbnailImg();
            $thumbnail->product_id = $product_id;
            $thumbnail->thumbnail_img = $savedPath;
            $thumbnail->save();
        }

        return redirect()->back()->with('success', 'Product created successfully');
    }

    public function editProduct($id)
    {
        $thumbnails = ThumbnailImg::where('product_id', $id)->get();
        $navlists = Navlist::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $product = Product::findOrFail($id);
        return view('backend.products.product-edit', compact('navlists', 'categories', 'subcategories', 'product', 'thumbnails'));
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'navlist_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'product_name' => 'required',
            'product_qty' => 'required',
            'product_color' => 'required',
            'product_tag' => 'required',
            'product_image' => 'image|mimes:jpg,jpeg,png,svg,gif',
            'selling_price' => 'required',
            'product_tag' => 'required',
            'short_desc' => 'required',
            'long_desc' => 'required',
        ], [
            'navlist_id.required' => 'The Navlist field is required',
            'category_id.required' => 'The Category field is required',
            'subcategory_id.required' => 'The Subcategory field is required',
            'short_desc.required' => 'The short description field is required',
            'long_desc.required' => 'The long description field is required'
        ]);

        $productImage = $request->file('product_image');

        $product = Product::findOrFail($id);
        $product->navlist_id = $request->navlist_id;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->product_name = $request->product_name;
        $product->product_slug = strtolower(str_replace(' ', '-', $request->product_name));
        $product->product_qty = $request->product_qty;
        $product->product_color = $request->product_color;
        $product->product_tag = $request->product_tag;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->short_desc = $request->short_desc;
        $product->long_desc = $request->long_desc;
        $product->new_arrival = $request->new_arrival;
        $product->popular_demand = $request->popular_demand;
        $product->hot_deals = $request->hot_deals;
        $product->featured = $request->featured;
        $product->all_products = $request->all_products;
        $product->status = 1;
        if ($productImage) {
            unlink($request->old_image);
            $imageName = time() . $productImage->getClientOriginalName();
            Image::make($productImage)->resize(917, 1000)->save('upload/products/product-images/' . $imageName);
            $savedPath = 'upload/products/product-images/' . $imageName;
            $product->product_image = $savedPath;
        }
        $product->save();

        $thumbnails = $request->thumbnail;

        if ($thumbnails) {
            foreach ($thumbnails as $id => $img) {

                $oldImage = ThumbnailImg::findOrFail($id);
                unlink($oldImage->thumbnail_img);

                $imageName = time() . $img->getClientOriginalName();
                Image::make($img)->resize(917, 1000)->save('upload/products/product-thumbnails/' . $imageName);
                $savedPath =  'upload/products/product-thumbnails/' . $imageName;

                $newImage = ThumbnailImg::where('id', $id)->first();
                $newImage->thumbnail_img = $savedPath;
                $newImage->save();
            }
        }
        return redirect()->route('products')->with('success', 'Product updated successfully');
    }

    public function deactivateProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->status = 0;
        $product->save();

        return redirect()->back();
    }

    public function activateProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->status = 1;
        $product->save();

        return redirect()->back();
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        unlink($product->product_image);
        $product->delete();

        $thumbnails = ThumbnailImg::where('product_id', $id)->get();
        foreach ($thumbnails as $img) {
            unlink($img->thumbnail_img);
            ThumbnailImg::where('product_id', $id)->delete();
        }
        return redirect()->back();
    }
}
