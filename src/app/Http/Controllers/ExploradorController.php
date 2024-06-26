<?php

namespace App\Http\Controllers;

use App\Models\Explorador;
use Illuminate\Http\Request;
use Src\App\Services\ExploradorService;

class ExploradorController extends Controller
{

    public function __construct(protected ExploradorService $service){}
    
    public function index(Request $request){
        $explorador = $this->service->getAll($request->filter);
    }

    public function show(string $id){
        if(!$explorador = $this->service->findOne($id)){
            return back();
        }
    }

    public function create(){

    }
}
