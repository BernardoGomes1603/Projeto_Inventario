<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidade extends Model
{
    use HasFactory;

    /**
     * Nome da tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'localidade';

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nome', 'endereco', 'contato'];

    /**
     * Relacionamento: Uma localidade pode ter vários itens associados.
     */
    public function itens()
    {
        return $this->hasMany(Item::class, 'Localidade_id');
    }
}
