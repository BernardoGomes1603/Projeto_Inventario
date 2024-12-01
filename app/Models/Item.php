<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'modelo',
        'especificacoes',
        'descricao',
        'Localidade_id',
        'User_id',
        'Status_id'
    ];

    public function localidade()
    {
        return $this->belongsTo(Localidade::class, 'localidade_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
