<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizacaoController extends Controller
{
    public function index(){
        Explorador::all();
    }

}
