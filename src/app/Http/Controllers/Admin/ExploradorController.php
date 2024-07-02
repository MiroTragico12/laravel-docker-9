<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateExplorador;
use App\Models\Explorador;
use Illuminate\Http\Request;
use App\DTO\CreateExploradorDTO;
use App\DTO\UpdateExploradorDTO;
use App\Services\ExploradorService;

class ExploradorController extends Controller
{

    public function __construct(protected ExploradorService $service){}

    public function index(Request $request){
        
        $exploradores = $this->service->getAll($request->filter);
    
        return view('admin/exploradores/index', compact('exploradores'));
    }

    public function show (string $id){
        if(!$explorador = $this->service->findOne($id)){
            return back();
        }
        return view('admin/exploradores/show', compact('explorador'));
    }

    public function create(){
        return view('admin/exploradores/create');
    }

    public function store(StoreUpdateExplorador $request){
        $this->service->new(CreateExploradorDTO::makeFromRequest($request));
        return redirect()->route('explorador.index');
    }

    public function edit(string $id){
        $explorador = $this->service->findOne($id);
        if (!$explorador) {
            return back();
        }
        return view('admin.explorador.edit');
    }

    public function update(StoreUpdateExplorador $request, Explorador $explorador, string|int $id){
       
        $explorador = $this->service->update(UpdateExploradorDTO::makeFromRequest($request));
        if(!$explorador){
            return back();
        }

        return redirect()->route('explorador.index');

    }
    public function destroy(string $id){
       
       $this->service->delete($id);

        return redirect()->route('explorador.index');
    }
}
