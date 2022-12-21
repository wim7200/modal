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

//Route::get('/','login');
Route::get('se',[SendEmailController::class, 'index']);

Route::get('/', function () {
     return view('auth.login');
 });
/* routes ivm email versturen*/
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

/* roles routes   */
Route::get('/shop', function () {
        // Only verified users may access this route...
})->middleware(['auth', 'verified']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
    ])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard'); })->name('dashboard');
});


Route::middleware([
    'auth:sanctum','role:admin',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin', function () {return view('admin.index'); })->name('admin.index');

});


Route::group(['middelware'=>'auth'],function (){
    Route::resource('kind', App\Http\Controllers\KindController::class);
    Route::resource('condition', App\Http\Controllers\ConditionController::class);
    Route::resource('client', App\Http\Controllers\ClientController::class);
    Route::resource('tool', App\Http\Controllers\ToolController::class);
    Route::resource('shop', App\Http\Controllers\ShopController::class);
    Route::resource('user', App\Http\Controllers\UserController::class);
});




