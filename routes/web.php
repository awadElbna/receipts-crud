<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/*
 * please set up database connection and run
 *
 * php artisan migrate --seed
 *
 * then uncomment route group
 *
 * login with
 *
 * email: admin@gmail.com
 *
 * pass: password
 *
 * */

Auth::routes(['register' => false, 'reset' => false]);

Route::group(['middleware' => ['auth']],function(){

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('receipts','App\Http\Controllers\ReceiptController');

});


