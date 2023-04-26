<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function(){ 
        // Route::auth();
        Route::get('/dashboard', function () {
            return view('backend.dashboard');
        })->name('dashboard');
        Route::get('/login', function () {
            return view('auth.login');
        })->name('ll');
        
        //categories
        Route::resource('categories',CategoryController::class);
        //products
        Route::resource('products',ProductController::class);
        //product
        Route::get('/product/{id}',[InvoiceController::class,'getproduct']);
        //price
        Route::get('/price/{id}',[InvoiceController::class,'getproductprice']);
        //payment status
        Route::post('Payment_status', [InvoiceController::class, 'payment_statusChange'])->name('Payment_status_change');  
        //invoices     
        Route::resource('invoices',InvoiceController::class);

           // permission  // roles
           Route::resource('roles', RoleController::class);
           // users
           Route::resource('users', UserController::class);








        require __DIR__.'/auth.php';
       


    });


// require __DIR__.'/auth.php';



