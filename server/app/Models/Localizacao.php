<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Localizacao extends Model
{
    protected $table = 'localizacao';
    protected $fillable = [
        'rua',
        'bairro',
        'complemento',
        'evento_id'
    ];

    public function arquivo() 
    {
        return $this->belongsTo(Arquivo::class, 'arquivo_id', 'id');
    }
}