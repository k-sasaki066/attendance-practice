<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthenticatedSessionController;

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

Route::middleware('guest')->group(function() {
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function() {
    Route::get('/', [AttendanceController::class, 'index']);
    Route::post('/attendance', [AttendanceController::class, 'create']);
    Route::get('/user', [AttendanceController::class, 'indexUser']);
    Route::get('/work', [AttendanceController::class, 'indexWork']);
    Route::post('/work',[AttendanceController::class, 'indexDate']);
});

