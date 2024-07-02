<?php

namespace App\Observers;

use App\Models\Explorador;
use App\Models\Localizacao;
use App\Models\Inventario;

class ExploradorObserver
{
    /**
     * Handle the Explorador "created" event.
     *
     * @param  \App\Models\Explorador  $explorador
     * @return void
     */
    public function created(Explorador $explorador)
    {
       
        $localizacao = new Localizacao();
        $localizacao->latitude = '0.000000'; 
        $localizacao->longitude = '0.000000'; 
        $localizacao->explorador_id = $explorador->id;
        $localizacao->save();

        // Criar Inventario
        $inventario = new Inventario();
        $inventario->explorador_id = $explorador->id;
        $inventario->save();
    }
}
