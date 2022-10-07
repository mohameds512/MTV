<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
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
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('send-mail', function () {

    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];

    \Mail::to('mhmde6373@gmail.com')->send(new \App\Mail\DetailsMail($details));

    dd("Email is Sent.");
});

Route::group(['middleware'=>['auth']],function () {
    Route::get('index_order',[OrderController::class ,'index'])->name('orders');
    Route::get('create_order',[OrderController::class ,'create'])->name('create_order');
    Route::post('store_order',[OrderController::class ,'store'])->name('store_order');
    Route::get('edit_order/{id}',[OrderController::class ,'edit'])->name('edit_order');
    Route::post('update_order/{id}',[OrderController::class ,'update'])->name('update_order');

});

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
