<?php

namespace App\Models\Compras\Fornecedores;

use Illuminate\Database\Eloquent\Model;

class Fornecedores extends Model
{
    
    protected $table='fornecedores';


    protected $primaryKey = 'id_fornecedor';


    protected $fillable = [
        'pessoa_juridica',
        'nome',
        'registro',
        'telefone',
        'celular',
        'email',
        'password',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'uf',
        'created_at',
        'updated_at'
    ];

}
