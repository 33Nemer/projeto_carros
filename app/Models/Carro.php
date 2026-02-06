<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $fillable = [
        'modelo', 'placa', 'marca', 'ano',
        'preco_diaria', 'descricao', 'status'
    ];

    public function rentals()
    {
        return $this->hasMany(Rental::class, 'carro_id');
    }
    use HasFactory;
}
