<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\AdminProfileController;
use App\Http\Controllers\backend\CouponController;
use App\Http\Controllers\backend\NavListController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\frontend\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');

Route::post('/admin/login', [AdminController::class, 'adminSignIn'])->name('admin.sign.in');




Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {


    Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');

    // Admin Authentication and Profile Routes
    Route::get('/admin/register', [AdminController::class, 'adminRegister'])->name('admin.register');

    Route::post('/admin/register', [AdminController::class, 'createAdmin'])->name('create.admin');

    Route::get('/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

    Route::get('/profile', [AdminProfileController::class, 'adminProfileView'])->name('admin.profile');

    Route::get('/profile-edit', [AdminProfileController::class, 'adminProfileEdit'])->name('admin.edit');

    Route::post('/profile-update', [AdminProfileController::class, 'adminProfileUpdate'])->name('admin.profile.store');

    Route::get('/update-password', [AdminProfileController::class, 'adminUpdatePassword'])->name('admin.update.password');

    Route::post('/update-passowrd', [AdminProfileController::class, 'updatePasswordStore'])->name('admin.password.update');

    // Admin Page Manager Routes
    // Navigation Links
    Route::get('/nav-list', [NavListController::class, 'navListView'])->name('nav.view');

    Route::post('/nav-list', [NavListController::class, 'navListPost'])->name('add.navlist');

    Route::get('/nav-list-edit/{id}', [NavListController::class, 'NavListedit'])->name('nav.edit');

    Route::post('/nav-list-update/{id}', [NavListController::class, 'navListUpdate'])->name('nav.update');

    Route::get('/nav-list/delet/{id}', [NavListController::class, 'navListDelete'])->name('nav.delete');

    // Categories Route
    Route::get('/category', [NavListController::class, 'categoryView'])->name('category.view');

    Route::post('/category', [NavListController::class, 'categoryPost'])->name('add.category');

    Route::get('/category-edit/{id}', [NavListController::class, 'categoryEdit'])->name('category.edit');

    Route::post('/category-update/{id}', [NavListController::class, 'categoryUpdate'])->name('category.update');

    Route::get('/category-delete/{id}', [NavListController::class, 'categoryDelete'])->name('category.delete');

    // subcategories Route
    Route::get('/subcategory', [NavListController::class, 'subcategoryView'])->name('subcategory.view');

    Route::get('/get-category/ajax/{id}', [NavListController::class, 'catAjaxCall']);

    Route::post('/subcategory', [NavListController::class, 'subCategoryPost'])->name('add.subcategory');

    Route::get('/subcategory-edit/{id}', [NavListController::class, 'subCategoryEdit'])->name('subcategory.edit');

    Route::post('/subcategory-update/{id}', [NavListController::class, 'subcategoryUpdate'])->name('subcategory.update');

    Route::get('/subcategory-delete/{id}', [NavListController::class, 'subcategoryDelete'])->name('subcategory.delete');

    // Products routes

    Route::get('/products', [ProductController::class, 'productView'])->name('products');

    Route::get('/get-subcategory/ajax/{id}', [ProductController::class, 'getSubcategories']);

    Route::post('/add-product', [ProductController::class, 'addProduct'])->name('add.product');

    Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit.product');

    Route::post('/update-product/{id}', [ProductController::class, 'updateProduct'])->name('update.product');

    Route::get('/deactivate/{id}', [ProductController::class, 'deactivateProduct'])->name('deactivate.product');

    Route::get('/activate/{id}', [ProductController::class, 'activateProduct'])->name('activate.product');

    Route::get('/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('delete.product');

    // Slider routes
    Route::get('/slider', [SliderController::class, 'sliderView'])->name('slider');

    Route::post('/add-slider', [SliderController::class, 'addSlider'])->name('add.slider');

    Route::get('/edit-slider/{id}', [SliderController::class, 'editSlider'])->name('edit.slider');

    Route::post('/update-slider/{id}', [SliderController::class, 'updateSlider'])->name('update.slider');

    Route::get('/deactivate-slider/{id}', [SliderController::class, 'deactivateSlider'])->name('deactivate.slider');

    Route::get('/activate-slider/{id}', [SliderController::class, 'activateSlider'])->name('activate.slider');

    Route::get('/delete-slider/{id}', [SliderController::class, 'deleteSlider'])->name('delete.slider');

    // Value section routes
    Route::get('/core-values', [SliderController::class, 'valueView'])->name('value');

    Route::post('/add-slide', [SliderController::class, 'addNewSlide'])->name('add.slide');

    Route::get('/edit-core-values/{id}', [SliderController::class, 'editValue'])->name('edit.value');

    Route::post('/update-core-values/{id}', [SliderController::class, 'updateValue'])->name('update.value.slide');

    Route::get('/deativate-value/{id}', [SliderController::class, 'deactivateValue'])->name('deactivate.value');

    Route::get('/ativate-value/{id}', [SliderController::class, 'activateValue'])->name('activate.value');

    // Admin coupon routes
    Route::get('/coupon', [CouponController::class, 'couponView'])->name('coupon');

    Route::post('/coupon-store', [CouponController::class, 'couponStore'])->name('add.coupon');

    Route::get('/coupon-edit/{id}', [CouponController::class, 'couponEdit'])->name('edit.coupon');

    Route::post('/coupon-update/{id}', [CouponController::class, 'couponUpdate'])->name('update.coupon');

    Route::get('/coupon-delete/{id}', [CouponController::class, 'couponDelete'])->name('delete.coupon');

    Route::get('/deactivate-coupon/{id}', [CouponController::class, 'couponDeactivate'])->name('deactivate.coupon');

    Route::get('/coupon-activate/{id}', [CouponController::class, 'couponActivate'])->name('activate.coupon');
});


// Frontend Routes

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/', [IndexController::class, 'index']);

Route::get('/logout', [IndexController::class, 'logout'])->name('user.logout');

// User profile and password change routes
Route::get('/update-profile/{id}', [IndexController::class, 'editProfile'])->name('edit-profile');

Route::post('/update-profile/{id}', [IndexController::class, 'updateProfile'])->name('update.profile');

Route::get('/update-password', [IndexController::class, 'changePassword'])->name('change.password');

Route::post('/update-password', [IndexController::class, 'UpdatePassword'])->name('update.password');

// product details route
Route::get('/product-details/{id}/{slug}', [MainController::class, 'productDetails'])->name('product.details');

// category and subcategory wise product routes
Route::get('/product/category/{id}/{slug}', [MainController::class, 'categoryWiseProducts']);

Route::get('/product/subcategory/{id}/{slug}', [MainController::class, 'subcategoryWiseProducts']);

// Add to cart routes
Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart']);

Route::post('/add-to-cart/auth-session/{id}', [CartController::class, 'addToCartSessionOption']);

Route::get('/get-carts-items', [CartController::class, 'cartItems']);

Route::get('/shopping-cart', [CartController::class, 'shoppingCartView'])->name('shopping.cart');

Route::get('/delete-cart-item/{id}', [CartController::class, 'deleteCart']);

Route::get('/get-carts-count', [CartController::class, 'cartCount']);

Route::get('/cart-increment/{id}', [CartController::class, 'cartQtyIncrement']);

Route::get('/cart-decrement/{id}', [CartController::class, 'cartQtyDecrement']);

// Apply coupon routes
Route::post('/apply-coupon', [CartController::class, 'applyCoupon']);

Route::get('/get-coupon', [CartController::class, 'getCoupon']);

Route::get('/remove-coupon', [CartController::class, 'removeCoupon']);
