<?php

use App\Http\Controllers\ExploradorController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LocalizacaoController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
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

Route::get('explorador', [ExploradorController::class,'index']);

Route::get('item', [ItemController::class,'index']);

Route::get('localizacao', [LocalizacaoController::class,'index']);

Route::get('inventario', [InventarioController::class,'index']);

Route::post('item/postar',[ItemController::class,'store']);

    Route::get('user/{user}', [UserController::class, 'show'])->name('user.show');
 
    Route::get('users', [UserController::class, 'index'])->name('user.index');
 
    

