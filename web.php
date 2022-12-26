<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    Route::post('vendors/{id}', [App\Http\Controllers\Admin\UsersController::class, 'update'])->name('vendors');
    Route::post('resetpassword', [App\Http\Controllers\Admin\UsersController::class, 'resetpassword'])->name('resetpassword');
    Route::resources([
        'users' => App\Http\Controllers\Admin\UsersController::class,
        'menus' => App\Http\Controllers\Admin\MenusController::class,
        'orders' => App\Http\Controllers\Admin\OrdersController::class,
        'banners' => App\Http\Controllers\Admin\BannersController::class,
        'offers' => App\Http\Controllers\Admin\OffersController::class,
        'settings' => App\Http\Controllers\Admin\SettingsController::class,
        'categories' => App\Http\Controllers\Admin\CategoriesController::class,
        'subcategories' => App\Http\Controllers\Admin\SubcategoriesController::class,
        'vendors' => App\Http\Controllers\Admin\UsersController::class,
        'agents' => App\Http\Controllers\Admin\UsersController::class,
        'fooditems' => App\Http\Controllers\Admin\FoodItemsController::class,
    ]);
});

Route::group(['middleware' => ['auth'], 'prefix' => 'vendor', 'as' => 'vendor.'], function () {
    Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    // Route::post('vendors/{id}', [App\Http\Controllers\Admin\UsersController::class, 'update'])->name('vendors');
    Route::resources([
        'categories' => App\Http\Controllers\Admin\CategoriesController::class,
        'subcategories' => App\Http\Controllers\Admin\SubcategoriesController::class,
        'vendors' => App\Http\Controllers\Admin\UsersController::class,
        'agents' => App\Http\Controllers\Admin\UsersController::class,
        'fooditems' => App\Http\Controllers\Admin\FoodItemsController::class,
    ]);
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('/ajaxUpdate', [App\Http\Controllers\CommonController::class, 'ajaxUpdate'])->name('ajaxUpdate');
});
