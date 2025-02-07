<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Models\Producto;
use App\Models\User;
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

Route::get('/', function () {
    $productos = Producto::all();
    return view('productos.index',compact('productos'));
});
Route::resource('users', UserController::class);
Route::resource('productos', ProductoController::class);


