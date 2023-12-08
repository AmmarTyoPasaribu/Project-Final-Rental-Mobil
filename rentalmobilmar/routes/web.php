<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// routes/web.php


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::get('detail/{car:slug}', [\App\Http\Controllers\HomeController::class, 'detail'])->name('detail');
Route::get('contact', [\App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('contact/{car:slug}', [\App\Http\Controllers\HomeController::class, 'contact'])->name('contacta');
Route::post('contact', [\App\Http\Controllers\HomeController::class, 'contactStore'])->name('contact.store');
Route::get('profile', [\App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::post('profile', [\App\Http\Controllers\HomeController::class, 'updateprofile'])->name('updateprofile');


// Route::resource('user/cars', \App\Http\Controllers\User\CarController::class);
// Route::resource('user/drivers', \App\Http\Controllers\User\DriverController::class);


Route::group(['middleware' =>'is_admin','prefix' =>'admin','as'=>'admin.'], function(){
    Route::get('/dashboard' ,[\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('cars', \App\Http\Controllers\Admin\CarController::class);
    Route::put('cars/update-image/{id}', [App\Http\Controllers\Admin\CarController::class, 'updateImage'])->name('cars.updateImage');
    
    Route::resource('drivers', \App\Http\Controllers\Admin\DriverController::class);
    Route::put('drivers/update-image/{id}', [App\Http\Controllers\Admin\DriverController::class, 'updateImage'])->name('drivers.updateImage');
    
    Route::get('/messages' ,[\App\Http\Controllers\Admin\MessageController::class, 'index'])->name('admin.messages.index');

    Route::resource('bayars', \App\Http\Controllers\Admin\BayarController::class);
    Route::put('bayars/update-image/{id}', [App\Http\Controllers\Admin\BayarController::class, 'updateImage'])->name('bayars.updateImage');

    Route::post('/update-status/{car}', [App\Http\Controllers\Admin\BayarController::class, 'updateStatus'])->name('bayars.updateStatus');
    Route::post('/update-status-driver/{driver}', [App\Http\Controllers\Admin\BayarController::class, 'updateStatusDriver'])->name('bayars.updateStatusDriver');

    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    
});

// Route::get('/search', [HomeController::class, 'searcha'])->name('search');   



Route::get('user/dashboard' ,[\App\Http\Controllers\User\DashboardController::class, 'index'])->name('user.dashboard.index');



Auth::routes();


