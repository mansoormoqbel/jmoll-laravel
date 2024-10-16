<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Middleware\CheckBanned;
use  App\Http\Middleware\CheckTypeUesr;
/* use  App\Http\Middleware\Auther; */
/* use App\Http\Middleware\CheckUserActive; */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('a.logout');

/* Start admin  */

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/logout', [App\Http\Controllers\Admin\DashboardController::class, 'logout'])->name('admin.logout');
    Route::prefix('user')->controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
        Route::get('/',  'index')->name('admin.user.index');
        Route::get('/show/{id}',  'show')->name('admin.user.show');
        Route::get('/create',  'create')->name('admin.user.create');
        Route::post('/store',  'store')->name('admin.user.store');
        Route::delete('/destroy/{id}','destroy')->name('admin.user.destroy');
        Route::get('/edit/{id}',  'edit')->name('admin.user.edit');
        Route::post('/update',  'update')->name('admin.user.update');
        Route::get('/changeStatus/{id}',  'changeStatus')->name('admin.user.changeStatus');
    });
    Route::prefix('admin')->controller(App\Http\Controllers\Admin\AdminController::class)->group(function () {
        Route::get('/',  'index')->name('admin.admin.index');
        Route::get('/show/{id}',  'show')->name('admin.admin.show');
        Route::get('/create',  'create')->name('admin.admin.create');
        Route::post('/store',  'store')->name('admin.admin.store');
        Route::delete('/destroy/{id}','destroy')->name('admin.admin.destroy');
        Route::get('/edit/{id}',  'edit')->name('admin.admin.edit');
        Route::post('/update',  'update')->name('admin.admin.update');
        Route::get('/changeStatus/{id}',  'changeStatus')->name('admin.admin.changeStatus');
    });
    Route::prefix('seller')->controller(App\Http\Controllers\Admin\SellerController::class)->group(function () {
        Route::get('/',  'index')->name('admin.seller.index');
        Route::get('/show/{id}',  'show')->name('admin.seller.show');
        Route::get('/create',  'create')->name('admin.seller.create');
        Route::post('/store',  'store')->name('admin.seller.store');
        Route::delete('/destroy/{id}','destroy')->name('admin.seller.destroy');
        Route::get('/edit/{id}',  'edit')->name('admin.seller.edit');
        Route::post('/update',  'update')->name('admin.seller.update');
        Route::get('/changeStatus/{id}',  'changeStatus')->name('admin.seller.changeStatus');
    });
    Route::prefix('driver')->controller(App\Http\Controllers\Admin\DriverController::class)->group(function () {
        Route::get('/',  'index')->name('admin.driver.index');
        Route::get('/show/{id}',  'show')->name('admin.driver.show');
        Route::get('/create',  'create')->name('admin.driver.create');
        Route::post('/store',  'store')->name('admin.driver.store');
        Route::delete('/destroy/{id}','destroy')->name('admin.driver.destroy');
        Route::get('/edit/{id}',  'edit')->name('admin.driver.edit');
        Route::post('/update',  'update')->name('admin.driver.update');
        Route::get('/changeStatus/{id}',  'changeStatus')->name('admin.driver.changeStatus');
    });
    Route::prefix('feedback')->controller(App\Http\Controllers\Admin\CustomerServiceController::class)->group(function () {
        Route::get('/',  'index')->name('admin.feedback.index');
        Route::get('/create',  'create')->name('admin.feedback.create');
        Route::post('/store',  'store')->name('admin.feedback.store');
        Route::get('/edit/{id}',  'edit')->name('admin.feedback.edit');
        Route::post('/update',  'update')->name('admin.feedback.update');
        Route::delete('/destroy/{id}','destroy')->name('admin.feedback.destroy');
       
    });
    Route::prefix('profile')->controller(App\Http\Controllers\Admin\ProfilePhotoController::class)->group(function () {
        Route::get('/',  'index')->name('admin.profile.index');
        Route::get('/create',  'create')->name('admin.profile.create');
        Route::post('/store',  'store')->name('admin.profile.store');
        Route::delete('/destroy/{id}','destroy')->name('admin.profile.destroy');
        Route::get('/edit/{id}',  'edit')->name('admin.profile.edit');
        Route::post('/update',  'update')->name('admin.profile.update');
        
       
    });
    Route::prefix('driverinfo')->controller(App\Http\Controllers\Admin\DriverInfoController::class)->group(function () {
        Route::get('/',  'index')->name('admin.driverinfo.index');
        Route::get('/create',  'create')->name('admin.driverinfo.create');
        Route::get('/show/{id}',  'show')->name('admin.driverinfo.show');
        Route::post('/store',  'store')->name('admin.driverinfo.store');
        Route::get('/edit/{id}',  'edit')->name('admin.driverinfo.edit');
        Route::post('/update',  'update')->name('admin.driverinfo.update');
        Route::delete('/destroy/{id}','destroy')->name('admin.driverinfo.destroy');
    });
    Route::prefix('categories')->controller(App\Http\Controllers\Admin\CategoriesController::class)->group(function () {
        Route::get('/',  'index')->name('admin.categories.index');
        Route::get('/create',  'create')->name('admin.categories.create');
        Route::post('/store',  'store')->name('admin.categories.store');
        Route::get('/edit/{id}',  'edit')->name('admin.categories.edit');
        Route::post('/update',  'update')->name('admin.categories.update');
        Route::delete('/destroy/{id}','destroy')->name('admin.categories.destroy'); 
       
    });
    Route::prefix('shop')->controller(App\Http\Controllers\Admin\ShopController::class)->group(function () {
        Route::get('/',  'index')->name('admin.shop.index');
        Route::get('/create',  'create')->name('admin.shop.create');
        Route::post('/store',  'store')->name('admin.shop.store');
        Route::get('/show/{id}',  'show')->name('admin.shop.show');
        Route::delete('/destroy/{id}','destroy')->name('admin.shop.destroy');
        Route::get('/edit/{id}',  'edit')->name('admin.shop.edit');
        Route::post('/update',  'update')->name('admin.shop.update');
       
    });
    Route::prefix('product')->controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/',  'index')->name('admin.product.index');
        Route::get('/create',  'create')->name('admin.product.create');
        Route::post('/store',  'store')->name('admin.product.store');
        Route::get('/show/{id}',  'show')->name('admin.product.show');
        Route::delete('/destroy/{id}','destroy')->name('admin.product.destroy');
        Route::get('/edit/{id}',  'edit')->name('admin.product.edit');
        Route::post('/update',  'update')->name('admin.product.update');
        /* 
        
       
        Route::get('/edit/{id}',  'edit')->name('admin.shop.edit');
         */
       
    });
    Route::prefix('comment')->controller(App\Http\Controllers\Admin\CommentController::class)->group(function () {
        Route::get('/',  'index')->name('admin.comment.index');
        Route::get('/create',  'create')->name('admin.comment.create');
        Route::post('/store',  'store')->name('admin.comment.store');
        Route::get('/edit/{id}',  'edit')->name('admin.comment.edit');
        Route::post('/update',  'update')->name('admin.comment.update'); 
        Route::delete('/destroy/{id}','destroy')->name('admin.comment.destroy'); 
    });
    Route::prefix('shopcart')->controller(App\Http\Controllers\Admin\ShoppingCartController::class)->group(function () {
        Route::get('/',  'index')->name('admin.shopcart.index');
        Route::post('/AddToCart',  'AddToCart')->name('admin.shopcart.AddToCart');
        Route::get('/show/{id}',  'show')->name('admin.shopcart.show');
        Route::get('/ShowProducts/{id}',  'ShowProducts')->name('admin.shopcart.ShowProducts');
        Route::get('/showCart',  'showCart')->name('admin.shopcart.showCart');
        Route::post('/addcomment',  'addcomment')->name('admin.shopcart.addcomment');
        Route::delete('/destroy/{id}','DeleteCartItem')->name('admin.shopcart.DeleteCartItem');
        Route::get('/ShowOrder',  'ShowOrder')->name('admin.shopcart.ShowOrder');
        Route::get('/test',  'test')->name('admin.shopcart.test');
        Route::post('/checkorder',  'checkorder')->name('admin.shopcart.checkorder');
        Route::post('/create_order',  'create_order')->name('admin.shopcart.create_order');
       
        
       
    });
    
});
Route::prefix('driver')->middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Driver\DashboardController::class, 'index'])->name('driver.dashboard');
    Route::get('/logout', [App\Http\Controllers\Driver\DashboardController::class, 'logout'])->name('driver.logout');
    Route::prefix('order')->controller(App\Http\Controllers\Driver\OrderController::class)->group(function () {
       Route::get('/','index')->name('driver.order');
       Route::get('/getOrder/{id}','getOrder')->name('driver.getOrder');
       
        
       
    });
});
Route::prefix('seller')->middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Seller\DashboardController::class, 'index'])->name('seller.dashboard');
    Route::get('/logout', [App\Http\Controllers\Seller\DashboardController::class, 'logout'])->name('seller.logout');
    Route::get('/create', [App\Http\Controllers\Seller\DashboardController::class, 'create'])->name('seller.create');
    Route::post('/store', [App\Http\Controllers\Seller\DashboardController::class, 'store'])->name('seller.store');

    Route::get('/showShop/{id}', [App\Http\Controllers\Seller\DashboardController::class, 'showShop'])->name('seller.showShop');
    
    Route::get('/product/{id}', [App\Http\Controllers\Seller\DashboardController::class, 'product'])->name('seller.product');
    Route::get('/createproduct/{id}',  [App\Http\Controllers\Seller\DashboardController::class, 'createproduct'])->name('seller.createproduct');
    Route::post('/storeproduct', [App\Http\Controllers\Seller\DashboardController::class, 'storeproduct'])->name('seller.storeproduct');
    Route::delete('/destroy/{id}',[App\Http\Controllers\Seller\DashboardController::class, 'destroy'])->name('seller.destroy');
    Route::get('/TakenByDriver/{id}',  [App\Http\Controllers\Seller\DashboardController::class, 'TakenByDriver'])->name('seller.TakenByDriver');
    Route::get('/WithOutDriver/{id}',  [App\Http\Controllers\Seller\DashboardController::class, 'WithOutDriver'])->name('seller.WithOutDriver');
    Route::get('/OrderDone/{id}',  [App\Http\Controllers\Seller\DashboardController::class, 'OrderDone'])->name('seller.OrderDone');
    
    Route::get('/GetProduct/{id}',  [App\Http\Controllers\Seller\DashboardController::class, 'GetProduct'])->name('seller.GetProduct');
    Route::get('/OrderStatus/{id}', [App\Http\Controllers\Seller\DashboardController::class, 'OrderStatus'])->name('seller.OrderStatus');
    Route::post('/editDriver', [App\Http\Controllers\Seller\DashboardController::class, 'editDriver'])->name('seller.editDriver');
    
    
    
});

