<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AdministatorController;

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

Route::get('/', function () {
    return view('home.home');
});

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'loginAuthentication']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'resgisterAuthentication']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::resource('/administator', AdministatorController::class);
Route::resource('/member', MemberController::class);
Route::get('/member-list-json', [MemberController::class, 'templateJsonMember']);

