<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ItemRepositoryInterface;
use App\Http\Requests\StoreUpdateItem;
use App\Models\Item;
use Illuminate\Http\JsonResponse;

class ItemController extends Controller
{
    protected $itemRepository;

    public function __construct(ItemRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $items = $this->itemRepository->getAll();
        return response()->json($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateItem  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUpdateItem $request):JsonResponse
    {
        $data = $request->validated();
        $item = Item::create($data);
        return response()->json($item, 201);
    }

    public function relatorios()
    {
        
        $somaValores = Item::sum('valor');

      
        $quantidadeValorSuperior100 = Item::where('valor', '>', 100)->count();

        return response()->json([
            'soma_valores' => $somaValores,
            'quantidade_valor_superior_100' => $quantidadeValorSuperior100,
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $id)
    {
        $item = $this->itemRepository->findOne($id);
        if (!$item) {
            return response()->json(['error' => 'Item not found'], 404);
        }
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateItem  $request
     * @param  string  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StoreUpdateItem $request, string $id)
    {
        $data = $request->validated();
        $data['id'] = $id;
        $item = $this->itemRepository->update($data);
        if (!$item) {
            return response()->json(['error' => 'Item not found'], 404);
        }
        return response()->json($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(string $id)
    {
        $this->itemRepository->delete($id);
        return response()->json(['message' => 'Item deleted']);
    }
}

