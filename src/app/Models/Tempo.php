<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tempo extends Model{

    protected $table = 'tbl_linha_tempo';
    protected $primaryKey = 'id_linha_tempo';
    public $timestamps = true;

    CONST CREATED_AT = 'data_criacao_linha_tempo';
    CONST UPDATED_AT = 'data_atualizacao_linha_tempo';

    protected $fillabel = [
        'titulo_linha_tempo',
        'ano_linha_tempo',
        'descricao_linha_tempo',
        'status_linha_tempo'
    ];
}