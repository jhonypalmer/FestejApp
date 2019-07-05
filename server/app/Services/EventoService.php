<?php

namespace App\Services;

use App\Models\Evento;

class EventoService extends AbstractService
{
    protected $model = Evento::class;

    public function read($id = null)
    {
        if (!is_null($id)) {
            return Evento::with('fotos')->find($id);
        } else {
            return Evento::with('fotos')->get();
        }
    }
}