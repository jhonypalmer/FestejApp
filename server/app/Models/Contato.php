<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $table = 'contato';
    protected $fillable = [
        'email',
        'telefone',
        'evento_id'
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id', 'id');
    }
}