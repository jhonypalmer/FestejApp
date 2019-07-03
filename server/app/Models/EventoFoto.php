<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventoFoto extends Model
{
    protected $table = 'evento_foto';
    protected $fillable = [
        'arquivo_id',
        'evento_id'
    ];

    public function arquivo() 
    {
        return $this->belongsTo(Arquivo::class, 'arquivo_id', 'id');
    }
}