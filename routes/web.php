<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function (Request $request) {
    print_r(Auth::guard('vendor')->user());
    echo("<br/>");
    print_r(session()->getId());
    
    $check =Auth::guard('vendor')->attempt([
        'email' => 'nebochidera16@gmail.com',
        'password' => '12345678',
    ]);
    $request->session()->regenerate();
    //dd(session()->all());
    Auth::check();
    if (Auth::guard('vendor')->check()) {
        # code...
        echo "logged in";
    }
    /* if ($check) {
        # code...
        //$request->session()->regenerate();
    } */
    //dd($check);
    //dd(Auth::guard('vendor')->user());
    //dd(session()->all());
});

Route::get('/test1', function (Request $request) {
    //$request->session()->put('key', 'value');
    //dd(Auth::guard('vendor')->user());
    print_r(session()->getId());
    $request->session()->invalidate();
    echo("<br/>");
    print_r(session()->getId());
});
Route::get('/test2', function (Request $request) {
    print_r(Auth::guard('vendor')->user());
    print_r(Auth::guard('admin')->user());
    echo("<br/>");
    print_r(session()->getId());
    dd(session()->all());
    ;
    //dd(session()->getId());
});

Route::get('/test3', function (Request $request) {
    return view("admin.index");
});

Route::get('/test4', function (Request $request) {
    if (auth()->guard('admin') == auth()->guard('vendor')) {
        # code...
        echo "same gurads";
    }
});

Auth::routes();

Route::prefix('admin')
    ->middleware(['myauth:admin'])
    ->group(function () {
        Route::get('/', [AdminController::class, 'index']);
        
    });

    Route::prefix('vendor')
    ->middleware(['myauth:vendor'])
    ->group(function () {
        Route::get('/', [VendorController::class, 'index']);
        
    });
    Route::get('/admin/register', [App\Http\Controllers\MultiUserRegisterController::class, 'showadminRegistrationForm']);
    Route::post('/admin/register', [App\Http\Controllers\MultiUserRegisterController::class, 'registeradmin'])->name('registeradmin');
    Route::get('/vendor/register', [App\Http\Controllers\MultiUserRegisterController::class, 'showvendorRegistrationForm']);
    Route::post('/vendor/register', [App\Http\Controllers\MultiUserRegisterController::class, 'registervendor'])->name('registervendor');

    Route::get('/admin/login', [App\Http\Controllers\MultiUserLoginController::class, 'showadminLoginForm']);
    Route::post('/admin/login', [App\Http\Controllers\MultiUserLoginController::class, 'adminLogin'])->name('adminlogin');
    Route::get('/vendor/login', [App\Http\Controllers\MultiUserLoginController::class, 'showvendorLoginForm']);
    Route::post('/vendor/login', [App\Http\Controllers\MultiUserLoginController::class, 'vendorLogin'])->name('vendorlogin');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth:admin');
