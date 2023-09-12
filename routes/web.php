<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Myecommerce;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\AdminOrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Myecommerce::class, 'index'])->name('home');
Route::get('/category/{id}', [Myecommerce::class, 'category'])->name('category.php');
Route::get('/detail/{id}', [Myecommerce::class, 'detail'])->name('detail.php');
Route::get('/show-cart', [CartController::class, 'cart'])->name('cart.php');
Route::post('/add-cart/{id}', [CartController::class, 'addCart'])->name('add.cart');
Route::get('/remove-cart-product/{id}', [CartController::class, 'removeCartProduct'])->name('remove.cart_product');
Route::post('/update-cart-product/{id}', [CartController::class, 'updateCartProduct'])->name('update.cart_product');
Route::get('/check-out', [CheckOutController::class, 'checkOut'])->name('check.out.php');
Route::get('/complete-order', [CheckOutController::class, 'completeOrderCash'])->name('complete-order');
Route::post('/new-cash-order', [CheckOutController::class, 'newCashOrder'])->name('new-cash-order');

//Customer Auth
Route::get('/customer-login', [CustomerAuthController::class, 'index'])->name('customer.index');
Route::post('/customer-login', [CustomerAuthController::class, 'login'])->name('customer.login');
Route::post('/customer-register', [CustomerAuthController::class, 'register'])->name('customer.register');
//customer-middleware
Route::middleware(['customer'])->group(function () {
    Route::get('/customer-logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');
    Route::get('/customer-order', [CustomerOrderController::class, 'order'])->name('customer.order');
    Route::get('/customer-dashboard', [CustomerAuthController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('/customer-profile', [CustomerAuthController::class, 'profile'])->name('customer.profile');
});
// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    //Home Route
    Route::get('/dashboard', [AdminController::class, 'index'])->name('home.php');

    //Category Route
    Route::get('/category/add', [CategoryController::class, 'addCategory'])->name('add.category');
    Route::get('/category/manage', [CategoryController::class, 'manageCategory'])->name('manage.category');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('edit.category');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('delete.category');
    Route::post('/category/create', [CategoryController::class, 'create'])->name('create.category');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('update.category');

    //Sub Category Route
    Route::get('/sub-category/add', [SubCategoryController::class, 'addSubCategory'])->name('add.sub-category');
    Route::get('/sub-category/manage', [SubCategoryController::class, 'manageSubCategory'])->name('manage.sub-category');
    Route::get('/sub-category/edit/{id}', [SubCategoryController::class, 'edit'])->name('edit.sub-category');
    Route::get('/sub-category/delete/{id}', [SubCategoryController::class, 'delete'])->name('delete.sub-category');
    Route::post('/sub-category/create', [SubCategoryController::class, 'create'])->name('create.sub-category');
    Route::post('/sub-category/update/{id}', [SubCategoryController::class, 'update'])->name('update.sub-category');

    //Brand Route
    Route::get('/brand/add', [BrandController::class, 'addBrand'])->name('add.brand');
    Route::get('/brand/manage', [BrandController::class, 'manageBrand'])->name('manage.brand');
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('edit.brand');
    Route::get('/brand/delete/{id}', [BrandController::class, 'delete'])->name('delete.brand');
    Route::post('/brand/create', [BrandController::class, 'create'])->name('create.brand');
    Route::post('/brand/update/{id}', [BrandController::class, 'update'])->name('update.brand');

    //Unit Route
    Route::get('/unit/add', [UnitController::class, 'addUnit'])->name('add.unit');
    Route::get('/unit/manage', [UnitController::class, 'manageUnit'])->name('manage.unit');
    Route::get('/unit/edit/{id}', [UnitController::class, 'edit'])->name('edit.unit');
    Route::get('/unit/delete/{id}', [UnitController::class, 'delete'])->name('delete.unit');
    Route::post('/unit/create', [UnitController::class, 'create'])->name('create.unit');
    Route::post('/unit/update/{id}', [UnitController::class, 'update'])->name('update.unit');

    //Product Route
    Route::get('/product/add', [ProductController::class, 'addproduct'])->name('add.product');
    Route::get('/product/get-subcategory-by-category', [ProductController::class, 'getSubCategoryByCategory'])->name('add.get-subcategory-by-category');
    Route::get('/product/manage', [ProductController::class, 'manageproduct'])->name('manage.product');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('edit.product');
    Route::get('/product/detail/{id}', [ProductController::class, 'detail'])->name('detail.product');
    Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('delete.product');
    Route::post('/product/create', [ProductController::class, 'create'])->name('create.product');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('update.product');

    //Admin-order
    Route::get('/all-order', [AdminOrderController::class, 'index'])->name('admin.all-order');
    Route::get('/edit-order/{id}', [AdminOrderController::class, 'edit'])->name('edit.order');
    Route::get('/view-order-details/{id}', [AdminOrderController::class, 'orderDetails'])->name('view.order-details');
    Route::get('/view-order-invoice/{id}', [AdminOrderController::class, 'orderInvoice'])->name('view.order-invoice');
    Route::get('/print-order-invoice/{id}', [AdminOrderController::class, 'printInvoice'])->name('print.order-invoice');
    Route::get('/delete-order/{id}', [AdminOrderController::class, 'delete'])->name('delete.order');
    Route::post('/update-order-details/{id}', [AdminOrderController::class, 'update'])->name('update.order-detail');

});
