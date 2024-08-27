<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\CusController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\UserController;
use App\Models\Bus;
use App\Models\Reserve;
use Illuminate\Support\Facades\Route;



Route::resource('/admin',AdminController::class);

// Route::resource('/',UserController::class);

Route::get('/test',function(){
    return view('test');
});


Route::get('/home',[UserController::class,'index'])->name('user.index');
Route::get('/about',[UserController::class,'about'])->name('user.about');
Route::get('/contact',[UserController::class,'contact'])->name('user.contact');
Route::get('/view',[UserController::class,'viewbus'])->name('user.viewbus');

Route::resource('/buses',BusController::class);
Route::resource('/reserves',ReserveController::class);
Route::resource('/booking',BookingController::class);

// Route::get('/seats/{id}', [ReserveController::class, 'showPrice'])->name('reserves.show');
Route::post('/reservation',[ReserveController::class,'index'])->name('reserves.index');
Route::post('/store-selected-seat', [SeatController::class, 'storeSelectedSeat']);

Route::get('/',[AuthController::class,'registration'])->name('auth.registration');
Route::get('/login',[AuthController::class,'login'])->name('auth.login');
Route::get('/logout',[AuthController::class,'logout'])->name('auth.logout');

Route::post('/post_register',[CusController::class,'store'])->name('cus.store');
Route::post('/post_login',[AuthController::class,'authenticate'])->name('authenticate');

Route::post('/buses/{id}', [BusController::class, 'show']);



Route::get('/reserves', [ReserveController::class, 'show'])->name('reserves.show');
Route::get('/reservation/create', [ReserveController::class, 'create'])->name('reserves.create');
// Route::get('/edit', [ReserveController::class, 'edit'])->name('reserves.edit');


Route::get('reserves/{reserve}/edit', [ReserveController::class, 'edit'])->name('reserves.edit');

Route::get('reservation/edit',[ReserveController::class,'store'])->name('reserves.edit');
Route::post('/selectyourseat', [SeatController::class, 'index'])->name('seats.index');
Route::get('/seatselection', [SeatController::class, 'store'])->name('seats.store');
// Route::get('/seats/status', [SeatController::class, 'getSeatsStatus'])->name('seats.status');
// Route::get('/seats', [SeatController::class, 'showSeats'])->name('seats.index');

Route::get('/session',[ReserveController::class,'session'])->name('reserves.session');
Route::get('/seat',[ReserveController::class,'seat'])->name('reserves.seat');

Route::post('/seats/store', [SeatController::class, 'store'])->name('seats.store');
Route::get('/reserves/{reserveId}', [SeatController::class, 'show'])->name('reserves.show');
Route::post('/reserves/store', [ReserveController::class, 'store'])->name('reserves.store');

Route::post('Booking/Edit', [BookingController::class, 'edit'])->name('booking.edit');
