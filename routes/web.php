<?php

    use App\Http\Controllers\SendEmailController;
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


Route::get('se',[SendEmailController::class, 'index']);

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

Route::group(['middleware' => ['role:admin','verified']], function () {
        Route::get('/dashboard', function () {return view('dashboard');
        })->name('dashboard');
        Route::resource('client', App\Http\Controllers\ClientController::class);
        Route::resource('shop', App\Http\Controllers\ShopController::class);
        Route::resource('kind', App\Http\Controllers\KindController::class);
        Route::resource('condition', App\Http\Controllers\ConditionController::class);
        Route::resource('tool', App\Http\Controllers\ToolController::class);
        Route::resource('user', App\Http\Controllers\UserController::class);
    });

Route::group(['middleware' => ['role:user','verified']], function () {
        Route::get('/dashboard', function () {return view('dashboard');
        })->name('dashboard');
        Route::resource('client', App\Http\Controllers\ClientController::class);
        Route::resource('shop', App\Http\Controllers\ShopController::class);

    });













