<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authenticate;
use App\Http\Controllers\CloudCRUDController;
use Illuminate\Support\Facades\Auth;


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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('cloud', CloudCRUDContoller::class);





Route::get('/login', [authenticate::class, 'login'])->name('login.user');

Route::get('/register', [authenticate::class, 'register'])->name('register.user');

Route::post('/registeruser', [authenticate::class, 'registeruser'])->name('registeruser');

Route::post('/loginuser', [authenticate::class, 'loginuser'])->name('loginuser');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::view('/', 'home')->name('home');

    Route::get('/data', [CloudCRUDController::class, 'show'])->name('show');;

    Route::view('/addmember', 'Cloud.create')->name('addmember');

    Route::post('/store', [CloudCRUDController::class, 'store'])->name('store');

    Route::get('editmember/{id}', [CloudCRUDController::class, 'edit']);

    Route::put('/update/{id}', [CloudCRUDController::class, 'update']);

    Route::get('/deletedata/{id}', [CloudCRUDController::class, 'delete']);

    Route::get('/export', [CloudCRUDController::class, 'export'])->name('export');
});
