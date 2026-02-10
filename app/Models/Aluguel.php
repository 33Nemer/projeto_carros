<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aluguel extends Model
{
    protected $table = 'alugueis';

    protected $fillable = [
        'cliente_id', // Mantenha o nome exato da coluna que está no seu banco
        'carro_id',
        'data_inicio',
        'data_final_prevista',
        'data_final_entregue',
        'status'
    ];

    /**
     * Agora o Laravel vai encontrar a classe Cliente
     */
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function carro(): BelongsTo
    {
        return $this->belongsTo(Carro::class, 'carro_id');
    }
}
