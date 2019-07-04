<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Usuario extends Model
{
    protected $table = 'usuario';
    protected $fillable = [
        'nome',
        'sobrenome',
        'data_nascimento',
        'cpf',
        'cnpj',
        'email',
        'senha'
    ];

    public function setSenhaAttribute($value)
    {
        $this->attributes['senha'] = Hash::make($value);
    }
}
