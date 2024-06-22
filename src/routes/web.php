<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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


Route::get('/request', function(Request $request){
    $r =$request->ip();
    dd($r);
    return 'x';


 });

 Route::get('user/{user}', [UserController::class, 'show']);
 
    


// Route::prefix('usuario')->group(function(){

//     Route::get('', function(){
//         return "usuarios.";
//     })->name('usuarios');

//     Route::get('/{id}', function(){
//         return "Mostrar detalhes do usuarios!";
//     })->name('usuarios.show');

//     Route::get('/{id}/tags', function(){
//         return "Tags do usuario!";
//     })->name('usuarios.tags');

// });


// Route::get('/users/{parametroA}/{parametroB}', function ($parametroA, $parametroB) {
//     return $parametroA.'-'.$parametroB;
// });
