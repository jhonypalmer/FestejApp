<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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

    public function setDataEventoAttribute($value)
    {
        $dt = explode('T', $value);
        $this->attributes['data_evento'] = Carbon::createFromFormat('Y-m-d', $dt[0]);
        $this->attributes['hora_evento'] = Carbon::createFromFormat('H:i:s.uP', $dt[1]);
    }

    public function tipo()
    {
        return $this->belongsTo(TipoEvento::class, 'tipo_evento_id', 'id');
    }

    public function fotos()
    {
        return $this->belongsToMany(Arquivo::class, 'evento_foto', 'evento_id', 'arquivo_id');
    }
}