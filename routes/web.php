<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SiteController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SalesInvoiceController;
use App\Http\Controllers\Admin\CategoryNewsController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\SupplierController;
use App\Http\Controllers\admin\ImportInvoiceController;

use App\Http\Controllers\Client\SiteController as Home;
use App\Http\Controllers\Client\ProductController as Product;
use App\Http\Controllers\Client\CartController as Cart;
use App\Http\Controllers\Client\UserController as User;


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


// home
Route::get('/', [Home::class, 'home'])->name('home');

//auth user
Route::post('/login', [Home::class, 'login'])->name('home.login');
Route::post('/register', [Home::class, 'register'])->name('home.register');
Route::post('/logout', [Home::class, 'logout'])->name('home.logout');

// all product
Route::get('/all', [Product::class, 'all'])->name('all');
// product by category
Route::get('/danh-muc/{slug}', [Product::class, 'danhmuc'])->name('danhmuc');

// detail product
Route::get('/{slug}', [Product::class, 'detail'])->name('detail');
// product has view
Route::post('/product/render', [Product::class, 'renderProduct'])->name('product.render');


// news
Route::get('/tin-tuc', [Product::class, 'news'])->name('tintuc');
Route::get('/tin-tuc/{slug}', [Product::class, 'detailNews'])->name('tintuc.detail');
Route::get('/tin-tuc/danh-muc/{slug}', [Product::class, 'getByCategory_news'])->name('tintuc.danhmuc');


// user routes
Route::prefix('user')->group(function () {
    Route::get('account/profile', [User::class, 'profile'])->name('account.profile');
    Route::post('account/post_profile', [User::class, 'post_profile'])->name('account.post_profile');

    Route::get('purchase', [User::class, 'purchase'])->name('purchase');
    Route::get('purchase/order/{id}', [User::class, 'order'])->name('purchase.order');
    Route::post('purchase/updateInfo/{id}', [User::class, 'updateInfo'])->name('updateInfo');
    Route::get('salesinvoice_user/softDelete/{id}', [SalesInvoiceController::class, 'softDelete'])->name('salesinvoice_user.softDelete');
    
});

// Authencation
Route::prefix('admin')->group(function () {
   

    //Login view
    Route::get('/login', [SiteController::class, 'login'])->name('auth.login');
    //Post Login 
    Route::post('/post_login', [SiteController::class, 'post_login'])->name('auth.post_login');

    //Register view
    Route::get('/register', [SiteController::class, 'register'])->name('auth.register');

    //Post register
    Route::post('/post_register', [SiteController::class, 'post_register'])->name('auth.post_register');

    //Logout
    Route::get('/logout', [SiteController::class, 'logout'])->name('auth.logout');

    // deny accesss
    Route::get('/deny_access', [SiteController::class, 'denyAccess'])->name('auth.denyaccess');
});

// admin route resource  
Route::prefix('admin')->as('admin.')->middleware('auth')->group(function () {

    //dashboard view
    Route::get('/dashboard', [SiteController::class, 'index'])->name('dashboard');

    //admin route::resources
    Route::resources([
        // category
        'category' => CategoryController::class,

        // product
        'product' => ProductController::class,

        // sales invoice
        'salesinvoice' => SalesInvoiceController::class,

        // role
        'role' => RoleController::class,

        //user
        'user' => UserController::class,

        //Category_news
        'category_news' => CategoryNewsController::class,

        //News
        'news' => NewsController::class,

        //Supplier
        'supplier' => SupplierController::class,

        //importInvoice
        'importinvoice' => ImportInvoiceController::class,

    ]);
    
    //update role user
    Route::put('user/{user}', [UserController::class, 'updateRole'])->name('user.updateRole');

    // softDelete
    Route::get('category/softDelete/{id}', [CategoryController::class, 'softDelete'])->name('category.softDelete');
    Route::get('product/softDelete/{id}', [ProductController::class, 'softDelete'])->name('product.softDelete');
    Route::get('salesinvoice/softDelete/{id}', [SalesInvoiceController::class, 'softDelete'])->name('salesinvoice.softDelete');
   
    //category trash
    Route::get('trash/category', [CategoryController::class, 'trash'])->name('category.trash');
    Route::get('untrash/{id}/category', [CategoryController::class, 'unTrash'])->name('category.untrash');
    
    //product trash
    Route::get('trash/product', [ProductController::class, 'trash'])->name('product.trash');
    Route::get('untrash/{id}/product', [ProductController::class, 'unTrash'])->name('product.untrash');
    
    //sales invoice trash
    Route::get('trash/salesinvoice', [SalesInvoiceController::class, 'trash'])->name('salesinvoice.trash');
    Route::get('untrash/{id}/salesinvoice', [SalesInvoiceController::class, 'unTrash'])->name('salesinvoice.untrash');

    //export pdf salesinvoice
    Route::get('pdf/{id}', [SalesInvoiceController::class, 'pdf'])->name('pdf');

});

// Route Cart

// -- get Cart
Route::get('getCart', [Cart::class, 'getCart'])->name('getCart');
// --add Cart
Route::get('addcart/{id}', [Cart::class, 'AddCart'])->name('addcart');
// --delete item Cart
Route::get('deletecart/{id}', [Cart::class, 'DeleteCart']);

// --list Cart
Route::get('cart', [Cart::class, 'viewListCart'])->name('cart');
// --view checkout
Route::get('cart/checkout', [Cart::class, 'checkout'])->name('cart.checkout')->middleware('customer');
// --view checkout success
Route::post('cart/checkout_success', [Cart::class, 'post_checkout'])->name('cart.post_checkout');



// -- Add item Cart in list cart
Route::get('addcartlist/{id}', [Cart::class, 'AddCartList'])->name('addcartlist'); // tăng 1 sản phẩm
// --update quantity item in list cart
Route::get('updatecart/{id}/{quantity}', [Cart::class, 'UpdateCart'])->name('updatecart'); // sửa lại số lượng
// --
Route::get('deletecartlist/{id}', [Cart::class, 'DeleteItemCartList'])->name('deletecartlist'); // giảm 1 sản phẩm

Route::get('deleteItemCartList/{id}', [Cart::class, 'DeleteCartList'])->name('deleleItemCart');// xóa sản phẩm






