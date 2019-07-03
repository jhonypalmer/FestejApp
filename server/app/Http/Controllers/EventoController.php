<?php

namespace App\Http\Controllers;

use App\Services\EventoService;

class EventoController extends AbstractController
{
    /**
     * @var EventoService $service
     */
    protected $service;


    public function __construct(EventoService $service)
    {
        $this->service = $service;
    }
}
