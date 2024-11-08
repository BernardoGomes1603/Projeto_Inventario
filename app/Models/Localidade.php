<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidade extends Model
{
    protected $table = 'localidade';

    protected $fillable = ['nome', 'endereco', 'contato'];

    public function setores()
    {
        return $this->hasMany(Setor::class);
    }
}
