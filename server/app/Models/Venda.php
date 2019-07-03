<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'venda';
    protected $fillable = [
        'valor',
        'data',
        'hora',
        'evento_id',
        'usuario_id'
    ];

    public function arquivo() 
    {
        return $this->belongsTo(Arquivo::class, 'arquivo_id', 'id');
    }

    public function usuario() 
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }
}