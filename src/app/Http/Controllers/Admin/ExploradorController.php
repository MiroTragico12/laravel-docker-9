<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Explorador;
use Illuminate\Http\Request;

class ExploradorController extends Controller
{
    public function index(Explorador $explorador){
        
        $exploradores = $explorador->all();
        dd($exploradores);
        return view('admin/exploradores/index', compact('exploradores'));
    }

    public function show (int|string $id){
        if(!$explorador = Explorador::find($id)){
            return back();
        }
        return view('admin/exploradores/show', compact('explorador'));
    }

    public function create(){
        return view('admin/exploradores/create');
    }

    public function store(Request $request){
        $data = $request->all();
        Explorador::create($data);
        return redirect()->route('explorador.index');
    }

    public function edit(Explorador $explorador, string|int $id){
        if(!$explorador = $explorador->where('id',$id)->first()){
            return back();
        }
        return view('admin/explorador.edit');
    }

    public function update(Request $request, Explorador $explorador, string|int $id){
        if(!$explorador = $explorador->find($id)->first()){
            return back();
        }
        $explorador->update($request->only([
            'nome','idade'
        ]));

        return redirect()->route('explorador.index');

    }
}
