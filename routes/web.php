<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BrandMasterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryBrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('website.index');
})->name('home');


Route::get('about', [ProfileController::class, 'about'])->name('website.about');
Route::get('product', [ProductController::class, 'product'])->name('website.product');
Route::get('shop-now', [ShopController::class, 'index'])->name('website.shop');
Route::get('product-summary', [ShopController::class, 'summary'])->name('website.summary');
Route::get('checkout', [ShopController::class, 'checkout'])->name('website.checkout');
Route::get('contact', [ContactController::class, 'contact'])->name('website.contact');

Route::prefix('account')->name('account.')->group(function () {

    // 👤 Guest Routes
    Route::middleware('guest')->group(function () {

        Route::get('login', [LoginController::class, 'index'])->name('login');
        Route::post('login', [LoginController::class, 'authentication'])->name('authentication');

        Route::get('signup', [LoginController::class, 'registration'])->name('signup');
        Route::post('signup', [LoginController::class, 'register'])->name('register');
    });

    // Auth Routes
    Route::middleware('auth:web')->group(function () {

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    });
});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('login', [AdminLoginController::class, 'index'])->name('login');
        Route::get('signup', [AdminLoginController::class, 'registration'])->name('signup');
        Route::post('login', [AdminLoginController::class, 'authentication'])->name('authentication');
        Route::post('signup', [AdminLoginController::class, 'register'])->name('register');
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('product', [ProductController::class, 'index'])->name('product');
        Route::post('add-product', [ProductController::class, 'create'])->name('addproduct');


        Route::get('category', [CategoryBrandController::class, 'index'])->name('category.index');
        Route::post('category/store', [CategoryBrandController::class, 'store'])->name('category.store');

        Route::get('category/{id}/edit', [CategoryBrandController::class, 'edit'])->name('category.edit');
        Route::post('category/{id}/update', [CategoryBrandController::class, 'update'])->name('category.update');
        Route::delete('category/{id}', [CategoryBrandController::class, 'deleteCategory'])->name('category.delete');


        // sub category
        Route::get('sub-category', [SubCategoryController::class, 'index'])->name('subcategory.index');
        Route::get('sub-category/create', [SubCategoryController::class, 'create'])->name('subcategory.create');
        Route::post('sub-category/store', [SubCategoryController::class, 'store'])->name('subcategory.store');

        Route::get('sub-category/{id}/edit', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
        Route::delete('sub-category/{id}', [SubCategoryController::class, 'deleteCategory'])->name('sub-category.delete');



        // product type master route
        Route::get('product-type', [ProductTypeController::class, 'index'])->name('addproduct.index');
        Route::get('product-type/create', [ProductTypeController::class, 'create'])->name('product-type.create');
        Route::post('product/store', [ProductTypeController::class, 'store'])->name('product-type.store');
        Route::get('product/{id}/edit', [ProductTypeController::class, 'edit'])->name('product-type.edit');
        Route::post('product/{id}/delete', [ProductTypeController::class, 'destroy'])->name('product-type.destroy');


        Route::get('brand-master', [BrandMasterController::class, 'index'])->name('brand.index');
        Route::get('brand-master/create', [BrandMasterController::class, 'create'])->name('brand-master.create');
        Route::post('brand-master/store', [BrandMasterController::class, 'store'])->name('brand-master.store');
        Route::get('brand-master/{id}/edit', [BrandMasterController::class, 'edit'])->name('brand-master.edit');

        Route::get('order', [OrderController::class, 'index'])->name('ordered');
        Route::get('my-profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('my-profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('my-profile/change-password', [ProfileController::class, 'changePassword'])->name('change.password');
        Route::post('my-profile/notification', [ProfileController::class, 'notification'])->name('notification');


        Route::get('logout', [AdminLoginController::class, 'logout'])->name('logout');
    });
});
