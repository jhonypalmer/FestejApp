<?php

namespace App\Http\Controllers;

use App\Services\EventoService;
use Laravel\Lumen\Http\Request;
use App\Services\ArquivoService;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;

class EventoController extends AbstractController
{
    /**
     * @var EventoService $service
     */
    protected $service;

    /**
     * @var ArquivoService $arquivoService
     */
    protected $arquivoService;


    public function __construct(EventoService $service, ArquivoService $arquivoService)
    {
        $this->service = $service;
        $this->arquivoService = $arquivoService;
    }

    public function postAddFotoEvento(Request $request, Response $response, $id)
    {
        $file = $this->getFile($request, 'foto');
        $arquivo = $this->arquivoService->uploadFile($file);
        $evento = $this->service->read($id);
        $evento->fotos()->attach($arquivo->id);
        return $evento;
    }

    private function getFile(Request $request, $name)
    {
        if ($request->file($name)) {
            return $request->file($name);
        }

        if (array_key_exists($name, $_FILES)) {
            $file = $_FILES[$name];
            return new UploadedFile($file['tmp_name'], $file['name'], $file['type'], $file['error']);
        }

        throw new \ErrorException('Arquivo não encontrado', 500);
    }
}
