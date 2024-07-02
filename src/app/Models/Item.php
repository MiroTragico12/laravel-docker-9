<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'itens';
    protected $fillable = [
        'nome',
        'valor',
        'inventario_id',
        'localizacao_id',
        'explorador_id'
    ];

    public function explorador()
    {
        return $this->belongsTo(Explorador::class, 'explorador_id');
    }

    public function localizacao()
    {
        return $this->belongsTo(Localizacao::class, 'localizacao_id');
    }

    public function inventario()
    {
        return $this->belongsTo(Inventario::class, 'inventario_id');
    }

}
