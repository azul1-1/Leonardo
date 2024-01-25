<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

//Route::get('/', App\Http\Controllers\HomeController::class, 'index' ]);


Route::get('/', function () {
    return view('layouts.base');
    /*return view('components.home2');*/
})->middleware('checkUserStatus');

/*->middleware('checkUserStatus');*/

Route::get('/table', [App\Http\Controllers\HomeController::class, 'bookingShow']);

/*cambio*/


Auth::routes([
    'verify'=>true,
    'twofactor'=>true
    ]);

Route::get('/dashboard', function () {
    return view('layouts.user');
})->middleware(['auth', 'twofactor'])->name('dashboard');

Route::middleware('auth','twofactor')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/admin',[App\Http\Controllers\AdminController::class,'index']);


Route::get('/home',[App\Http\Controllers\HomeController::class,'index']);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


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


Route::get('/cards', function () {
    return view('layouts.cards');
})->middleware(['auth']);

Route::get('/colors', function () {
    return view('layouts.colors');
})->middleware(['auth']);

Route::get('/sell', function () {
    return view('layouts.sell');
})->middleware(['auth']);

Route::get('/buy', function () {
    return view('layouts.buy');
})->middleware(['auth']);

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::get('/item/edit/update/{id}', [App\Http\Controllers\HomeController::class, 'update']);

Route::get('verify/resend', 'App\Http\Controllers\Auth\TwoFactorController@resend')->name('verify.resend');
Route::resource('verify', 'App\Http\Controllers\Auth\TwoFactorController')->only(['index', 'store']);