<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistroController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Routing\Route as RoutingRoute;

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

Route::get('/', HomeController::class)->name('home');

Route::post('registros/index', [RegistroController::class, 'index'])->name('index');



Route::get('registros/login', [RegistroController::class, 'login'])->name('login');

Route::post('registros/login', [RegistroController::class, 'logout'])->middleware('auth')->name('logout');



Route::post('registros/create', [RegistroController::class, 'insert'])->name('insert');

Route::get('registros/create', [RegistroController::class, 'create'])->name('create');



Route::post('registros/store', [RegistroController::class, 'store'])->middleware('auth')->name('store');



Route::get('registros/{datos}/edit', [RegistroController::class, 'edit'])->middleware('auth')->name('edit');

Route::patch('registros/{user}', [RegistroController::class, 'update'])->middleware('auth')->name('update');

Route::delete('registros/{user}', [RegistroController::class, 'destroy'])->middleware('auth')->name('destroy');




