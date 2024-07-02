<?php

namespace App\Http\Controllers\Api;

use App\DTO\UpdateTrocaDTO;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateTroca;
use App\Models\Trocas;
use App\Services\TrocaService;
use Illuminate\Http\JsonResponse;

class TrocaController extends Controller
{
    protected TrocaService $trocaService;

    public function __construct(TrocaService $trocaService)
    {
        $this->trocaService = $trocaService;
    }

     
    public function index(): JsonResponse
    {
        $trocas = Trocas::all();
        return response()->json($trocas);
    }

   
    public function store(Request $request): JsonResponse
{
    try {
      
        $explorador1Id = $request->input('explorador1_id');
        $explorador2Id = $request->input('explorador2_id');
        $item1Id = $request->input('item1_id');
        $item2Id = $request->input('item2_id');

      
        $troca = $this->trocaService->realizarTroca($explorador1Id, $explorador2Id, $item1Id, $item2Id);

        return response()->json($troca, 201);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Erro ao realizar a troca de itens.', 'message' => $e->getMessage()], 500);
    }
}
    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        try {
            $troca = Trocas::findOrFail($id);
            return response()->json($troca);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Troca não encontrada.'], 404);
        }
    }

  
   
}
