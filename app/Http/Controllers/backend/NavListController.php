<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Navlist;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class NavListController extends Controller
{
    // Navlists functions

    public function navListView()
    {
        $navlists = Navlist::latest()->get();
        return view('backend.page-manager.nav-list', compact('navlists'));
    }

    public function navListPost(Request $request)
    {
        $request->validate([
            'navlist_name' => 'required|unique:navlists',
        ]);

        $navlist = new Navlist;
        $navlist->navlist_name = $request->navlist_name;
        $navlist->navlist_slug = strtolower(str_replace(' ', '-', $request->navlist_name));
        $navlist->save();

        return redirect()->back();
    }

    public function NavListedit($id)
    {

        $navlist = Navlist::findOrFail($id);
        return view('backend.page-manager.navlist-edit', compact('navlist'));
    }

    public function navListUpdate(Request $request, $id)
    {
        $request->validate([
            'navlist_name' => 'required'
        ]);

        Navlist::findOrFail($id)->update([
            'navlist_name' => $request->navlist_name,
            'navlist_slug' => strtolower(str_replace(' ', '-', $request->navlist_name))
        ]);
        return redirect()->route('nav.view');
    }

    public function navListDelete($id)
    {
        Navlist::findOrFail($id)->delete();
        return redirect()->back();
    }

    // Categories Functions
    public function categoryView()
    {
        $navlists = Navlist::orderBy('navlist_name', 'ASC')->get();
        $categories = Category::latest()->get();
        return view('backend.page-manager.category', compact('categories', 'navlists'));
    }

    public function categoryPost(Request $request)
    {
        $request->validate([
            'navlist_id' => 'required',
            'category_name' => 'required|unique:categories'
        ]);

        $category = new Category;
        $category->navlist_id = $request->navlist_id;
        $category->category_name = $request->category_name;
        $category->category_slug = strtolower(str_replace(' ', '-', $request->category_name));
        $category->save();

        return redirect()->back();
    }

    public function categoryEdit($id)
    {
        $navlists = Navlist::orderBy('navlist_name', 'ASC')->get();
        $category = Category::findOrFail($id);
        return view('backend.page-manager.category-edit', compact('category', 'navlists'));
    }

    public function categoryUpdate(Request $request, $id)
    {
        $request->validate([
            'navlist_id' => 'required',
            'category_name' => 'required'
        ]);
        Category::findOrFail($id)->update([
            'navlist_id' => $request->navlist_id,
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name))
        ]);

        return redirect()->route('category.view');
    }

    public function categoryDelete($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back();
    }

    // Subcategories functions
    public function subcategoryView()
    {
        $navlists = Navlist::orderBy('navlist_name', 'ASC')->get();
        $subcategories = Subcategory::latest()->get();
        return view('backend.page-manager.subcategory', compact('subcategories', 'navlists'));
    }

    public function catAjaxCall($id)
    {
        $category = Category::where('navlist_id', $id)->orderBy('category_name', 'ASC')->get();
        return json_encode($category);
    }

    public function subCategoryPost(Request $request)
    {
        $request->validate([
            'navlist_id' => 'required',
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:subcategories'
        ]);

        $subCategory = new Subcategory;
        $subCategory->navlist_id = $request->navlist_id;
        $subCategory->category_id = $request->category_id;
        $subCategory->subcategory_name = $request->subcategory_name;
        $subCategory->subcategory_slug = strtolower(str_replace(' ', '-', $request->subcategory_name));
        $subCategory->save();

        return redirect()->back();
    }

    public function subCategoryEdit($id)
    {
        $navlists = Navlist::orderBy('navlist_name', 'ASC')->get();
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subcategory = Subcategory::findOrFail($id);
        return view('backend.page-manager.subcategory-edit', compact('navlists', 'categories', 'subcategory'));
    }

    public function subcategoryUpdate(Request $request, $id)
    {
        $request->validate([
            'navlist_id' => 'required',
            'category_id' => 'required',
            'subcategory_name' => 'required'
        ]);

        Subcategory::findOrFail($id)->update([
            'navlist_id' => $request->navlist_id,
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_name))
        ]);

        return redirect()->route('subcategory.view');
    }

    public function subcategoryDelete($id)
    {
        Subcategory::findOrFail($id)->delete();
        return redirect()->back();
    }
}
