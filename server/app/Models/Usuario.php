<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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

    protected $dates = [
        'data_nascimento'
    ];

    public function setSenhaAttribute($value)
    {
        $this->attributes['senha'] = Hash::make($value);
    }

    public function setDataNascimentoAttribute($value)
    {
        $dt = explode('T', $value);
        $this->attributes['data_nascimento'] = Carbon::createFromFormat('Y-m-d', $dt[0]);
    }
}
