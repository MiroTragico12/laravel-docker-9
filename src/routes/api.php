<?php

use App\Http\Controllers\Api\ExploradorController;
use App\Http\Controllers\Api\InventarioController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\LocalizacaoController;
use App\Http\Controllers\Api\TrocaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::apiResource('/exploradores',ExploradorController::class);


Route::apiResource('/inventario',InventarioController::class);

Route::get('/exploradores/{id}/historico', [ExploradorController::class, 'historico']);
Route::apiResource('/localizacao',LocalizacaoController::class);
Route::put('/localizacao/{id}', [LocalizacaoController::class, 'update']);


Route::apiResource('/item',ItemController::class);

Route::put('/trocas', [TrocaController::class, 'store'])->name('trocas.store');



Route::get('/relatorios', [ItemController::class, 'relatorios']);