<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateLocalizacao;
use App\Services\LocalizacaoService;
use Illuminate\Http\JsonResponse;

class LocalizacaoController extends Controller
{
    protected $service;

    public function __construct(LocalizacaoService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $localizacoes = $this->service->getAll();
        return response()->json($localizacoes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUpdateLocalizacao $request
     * @return JsonResponse
     */
    public function store(StoreUpdateLocalizacao $request): JsonResponse
    {
        $dto = $request->validated();
        $localizacao = $this->service->create($dto);
        return response()->json($localizacao, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        $localizacao = $this->service->findOne($id);
        if (!$localizacao) {
            return response()->json(['message' => 'Localizacao not found'], 404);
        }
        return response()->json($localizacao);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreUpdateLocalizacao $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(StoreUpdateLocalizacao $request, string $id): JsonResponse
    {
        $dto = $request->validated();
        $localizacao = $this->service->update($dto, $id); 
        if (!$localizacao) {
            return response()->json(['message' => 'Localizacao not found'], 404);
        }
        return response()->json($localizacao);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        $this->service->delete($id);
        return response()->json(['message' => 'Localizacao deleted']);
    }
}
