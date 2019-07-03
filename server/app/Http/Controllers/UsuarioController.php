<?php

namespace App\Http\Controllers;

use App\Services\UsuarioService;

class UsuarioController extends AbstractController
{
    /**
     * @var UsuarioService $service
     */
    protected $service;


    public function __construct(UsuarioService $service)
    {
        $this->service = $service;
    }
}
