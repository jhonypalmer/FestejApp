<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Arquivo;

class Evento extends Model
{
    protected $table = 'evento';
    protected $fillable = [
        'nome',
        'data_evento',
        'hora_evento',
        'tipo_evento_id',
        'cpf_usuario',
        'cnpj_usuario',
    ];

    public function tipo()
    {
        return $this->belongsTo(TipoEvento::class, 'tipo_evento_id', 'id');
    }

    public function fotos()
    {
        return $this->belongsToMany(Arquivo::class, 'evento_foto', 'arquivo_id', 'evento_id');
    }
}