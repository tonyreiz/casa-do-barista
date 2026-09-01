<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model{

    // Seleciona a pasta do 
    protected $table = 'tbl_venda';
    protected $primaryKey = 'id_venda';

    //permite se a data de criação aparece ou não
    public $timestamps = true;

    CONST CREATED_AT = 'data_criacao_venda';
    CONST UPDATED_AT = 'data_atualizacao_venda';

    //processo do que vai poder alterar
    protected $fillable = [
        'valor_total_venda',
        'forma_pagamento_venda',
        'status_venda'

    ];

}