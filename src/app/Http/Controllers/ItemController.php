<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;


class ItemController extends Controller
{
    public function index(){
        Item::all();
    }

    public function store(Request $request){
        Item::create($request->all());

        
    }

    public function show(Item $item){
        $item->hasItens()->create([
            'nome' => '',
            'valor' =>''
        ]);
    }

}
