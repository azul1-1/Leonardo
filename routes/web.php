<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Mail\Notification;

use Illuminate\Support\Facades\Mail;


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

Route::get('/', function () {
    return view('layouts.base');
})->middleware('checkUserStatus');



/*->middleware('checkUserStatus');*/

Route::get('/table', [App\Http\Controllers\HomeController::class, 'bookingShow']);

/*cambio*/


Auth::routes([
    'verify'=>true
    ]);

Route::get('/dashboard', function () {
    return view('layouts.user');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/sell', function () {
    return view('layouts.sell');
});

Route::get('/admin',[App\Http\Controllers\AdminController::class,'index']);


Route::get('/home',[App\Http\Controllers\HomeController::class,'index']);




Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});





Route::get('/mail',function(){
    //return new Notification("juan");
    
    $response=Mail::to('naguanagua.leo@gmail.com')->send(new Notification("juan"));
    dump($response);
});


Route::get('/bookingStore', [App\Http\Controllers\HomeController::class, 'bookingStore']);

Route::get('/booking', [App\Http\Controllers\HomeController::class, 'bookingForm']);


Route::get('/item/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('item.edit');


Route::get('/item/delete/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('item.edit');


Route::get('/item/edit/update/{id}', [App\Http\Controllers\HomeController::class, 'update']);