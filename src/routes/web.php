<?php

use App\Http\Controllers\Admin\ExploradorController;
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
Route::delete('explorador/{id}/delete',[ExploradorController::class, 'destroy'])->name('explorador.destroy');
Route::put('/explorador/{id}',[ExploradorController::class,'update'])->name('explorador.update');
Route::get('/explorador/{id}/edit',[ExploradorController::class,'edit'])->name('explorador.edit');
Route::get('/explorador/create',[ExploradorController::class, 'create'])->name('explorador.create');
Route::get('/explorador/{id}',[ExploradorController::class,'show'])->name('explorador.show');
Route::post('/explorador',[ExploradorController::class,'store'])->name('explorador.store');


Route::get('/explorador', [ExploradorController::class,'index'])->name('explorador.index');

    

