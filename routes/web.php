<?php

use App\Http\Controllers\ApproveUserController;
use App\Http\Controllers\ClientToolController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\SettingController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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


Route::get('se', [SendEmailController::class, 'index'])->name('SendEmail');

Route::get('/mailable', function () {
    $user = App\Models\User::first();

    return new App\Mail\UserRegistered($user);
});

Route::get('/', function () {
    /*  return view('auth.login');*/
    return view('welcome');
});

/* routes ivm email versturen*/
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/shop');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::group(['middleware' => ['verified']], function () {

    // Route::get('/approval',\App\Http\Controllers\HomeController::class);

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('client', App\Http\Controllers\ClientController::class);
    Route::resource('shop', App\Http\Controllers\ShopController::class);
    Route::resource('kind', App\Http\Controllers\KindController::class);
    Route::resource('condition', App\Http\Controllers\ConditionController::class);
    Route::resource('tool', App\Http\Controllers\ToolController::class);
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::resource('clienttool', ClientToolController::class);
    Route::resource('setting', SettingController::class);
    Route::get('user/{user}/approve', ApproveUserController::class);
    Route::resource('role', RoleController::class);
    //  Route::get('/user',\App\Http\Livewire\LW_User\UserTable::class)->name('user');

});













