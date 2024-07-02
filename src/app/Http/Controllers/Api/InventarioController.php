<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventario;
use Illuminate\Http\JsonResponse;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $inventarios = Inventario::all();
        return response()->json($inventarios);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->all(); // Ajuste conforme necessário para validar ou transformar os dados recebidos

        $inventario = Inventario::create($data);

        return response()->json($inventario, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $inventario = Inventario::findOrFail($id);

        return response()->json($inventario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $data = $request->all(); // Ajuste conforme necessário para validar ou transformar os dados recebidos

        $inventario = Inventario::findOrFail($id);
        $inventario->update($data);

        return response()->json($inventario);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $inventario = Inventario::findOrFail($id);
        $inventario->delete();

        return response()->json(null, 204);
    }
}
