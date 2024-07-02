<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trocas extends Model
{
    use HasFactory;
    protected $table = 'trocas';
    protected $fillable = [
        'explorador_origem_id',
        'explorador_destino_id',
        'item_id',
    ];

    public function exploradorOrigem()
    {
        return $this->belongsTo(Explorador::class, 'explorador_origem_id');
    }

    public function exploradorDestino()
    {
        return $this->belongsTo(Explorador::class, 'explorador_destino_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
