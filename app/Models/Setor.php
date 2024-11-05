<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $fillable = ['nome', 'localidade_id'];

    // Relacionamento com Localidade
    public function localidade()
    {
        return $this->belongsTo(Localidade::class);
    }
}
