<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AbstractController extends Controller
{
    /**
     * @var AbstractService $service;
     */
    protected $service;

    public function create(Request $request, Response $response)
    {
        $data = $request->all();
        return $this->service->create($data);
    }

    public function read(Request $request, Response $response, $id = null)
    {
        $result = $this->service->read($id);
        if ($result) {
            return $result;
        }
        return response(['message' => 'Item não encontrado.'], 404);
    }

    public function update(Request $request, Response $response, $id)
    {
        $data = $request->all();
        $result = $this->service->update($id, $data);
        if ($result) {
            return $result;
        }
        return response(['message' => 'Item não encontrado.'], 404);
    }

    public function delete(Request $request, Response $response, $id)
    {
        $result = $this->service->delete($id);
        if ($result) {
            return $result;
        }
        return response(['message' => 'Item não encontrado.'], 404);
    }
}
