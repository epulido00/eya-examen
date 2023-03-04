<?php

use App\Http\Controllers\ShipController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ShipController::class, 'index']);
Route::post('/create_ship', [ShipController::class, 'create_ship']);

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout']);
Route::post('/authenticate', [UserController::class, 'auth']);

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/solicitudes', [ShipController::class, 'ships_list']);
    Route::delete('/ship-delete/{id}', [ShipController::class, 'delete_ship']);
});
