<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacoes extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'mensagem',
        'resposta',
        'anexos',
        'protocolo',
        'password',
        'telefone',
        'verificador',
    ];
    protected $casts = [
        'anexos' => 'array', // Adicione esta linha para garantir que a coluna anexos seja tratada como um array
    ];
}
