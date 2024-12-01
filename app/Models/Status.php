<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    /**
     * Nome da tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'status';

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = ['descricao'];

    /**
     * Relacionamento: Um status pode ser associado a vários itens.
     */
    public function itens()
    {
        return $this->hasMany(Item::class, 'Status_id');
    }
}
