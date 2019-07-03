<?php

namespace App\Services;

abstract class AbstractService
{
    protected $model = '';

    public function create($data)
    {
        return call_user_func($this->model.'::create', $data);
    }

    public function read($id = null)
    {
        if (!is_null($id)) {
            return call_user_func($this->model.'::find', $id);
        } else {
            return call_user_func($this->model.'::all');
        }
    }

    public function update($id, $data)
    {
        $entity = call_user_func($this->model.'::find', $id);
        if(!$entity)
            return null;
            
        $entity->update($data);
        return $entity;
    }

    public function delete($id)
    {
        $entity = call_user_func($this->model.'::find', $id);
        if ($entity) {
            $entity->delete();
            return true;
        }
        return false;
    }
}