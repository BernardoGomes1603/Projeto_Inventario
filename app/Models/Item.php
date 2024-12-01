<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // Defina os campos que podem ser preenchidos em massa
    protected $fillable = [
        'modelo',
        'especificacoes',
        'descricao',
        'localidade_id', // Corrigido para letras minúsculas
        'user_id',       // Corrigido para letras minúsculas
        'status_id'      // Corrigido para letras minúsculas
    ];

    // Relacionamento com a tabela 'localidade'
    public function localidade()
    {
        return $this->belongsTo(Localidade::class, 'localidade_id');
    }

    // Relacionamento com a tabela 'users'
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relacionamento com a tabela 'status'
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
