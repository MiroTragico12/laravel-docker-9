<?php

namespace App\Services;

use App\Models\Trocas;
use App\Models\Explorador;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
use stdClass;

class TrocaService
{
    // No seu serviço TrocaService
    public function realizarTroca(int $explorador1Id, int $explorador2Id, int $item1Id, int $item2Id): Trocas
    {
        // Obter os itens atuais dos exploradores
        $item1 = Item::findOrFail($item1Id);
        $item2 = Item::findOrFail($item2Id);

        // Verificar se os valores dos itens são equivalentes
        if ($item1->valor === $item2->valor) {
            // Atualizar o inventário dos itens
            $this->atualizarInventario($item1, $explorador2Id);
            $this->atualizarInventario($item2, $explorador1Id);

            // Realizar a troca dos itens entre os exploradores
            $this->trocarItens($item1, $explorador2Id, $item2, $explorador1Id);

            // Retornar os detalhes da troca (pode ser ajustado conforme necessário)
            return new Trocas([
                'explorador1_id' => $explorador1Id,
                'explorador2_id' => $explorador2Id,
                'item1_id' => $item1->id,
                'item2_id' => $item2->id,
            ]);
        } else {
            // Caso os valores não sejam equivalentes, lançar uma exceção ou retornar um erro
            throw new \Exception('Os valores dos itens não são equivalentes. A troca não pode ser realizada.');
        }
    }

    protected function atualizarInventario(Item $item, int $novoExploradorId): void
    {
        $item->explorador_id = $novoExploradorId;
        $item->save();
    }

    protected function trocarItens(Item $item1, int $explorador2Id, Item $item2, int $explorador1Id): void
    {
        $temporario = $item1->explorador_id;
        $item1->explorador_id = $explorador2Id;
        $item2->explorador_id = $explorador1Id;
        $item1->save();
        $item2->save();
    }
}
