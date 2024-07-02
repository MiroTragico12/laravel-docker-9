<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateExplorador;
use App\Http\Requests\StoreUpdateTroca;
use Illuminate\Http\Request;
use App\DTO\CreateExploradorDTO;
use App\Models\Explorador;
use App\Models\Item;
use App\Models\Troca;
use App\Models\Trocas;
use App\Services\ExploradorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ExploradorController extends Controller
{
    public function __construct(protected ExploradorService $service)
    {
    }

   
    public function index(Request $request): JsonResponse
    {
        $exploradores = Explorador::all();
        return response()->json($exploradores);
    }

   
    public function store(StoreUpdateExplorador $request): JsonResponse
    {
        $data = $request->validated();
        $explorador = Explorador::create($data);

        return response()->json($explorador, 201);
    }

    public function historico($id)
    {
        
        $explorador = Explorador::findOrFail($id);
       
        $historicoLocalizacoes = $explorador->historicoLocalizacoes()->orderBy('created_at', 'desc')->get();

        return response()->json($historicoLocalizacoes);
    }

    
    public function show(string $id): JsonResponse
    {
        $explorador = Explorador::findOrFail($id);
        return response()->json($explorador);
    }


    public function update(StoreUpdateExplorador $request, string $id): JsonResponse
    {
        $data = $request->validated();
        $explorador = Explorador::findOrFail($id);
        $explorador->update($data);

        return response()->json($explorador);
    }

    
    public function destroy(string $id): JsonResponse
    {
        $explorador = Explorador::findOrFail($id);
        $explorador->delete();

        return response()->json(null, 204);
    }
}
