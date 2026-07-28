<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{

    protected $table = 'tbl_cliente'; 
    protected $primaryKey = 'id_cliente';
    public $timestamps = true;

    //laravel controla as dats de criacao e atualizacao
    const CREATE_AT = 'data_criacao_cliente';
    const UPDATED_UP = 'data_atualizacao_cliente';

    protected $fillable = [
        'nome_cliente ',
        'email_cliente',
        'senha_cliente',
        'foto_cliente',
        'status_cliente'
    ];

    //relacionamento um CLIENTE pertence a muitos DEPOIMENTOS 
    //hasMany = muitos

    public function ClienteDepoimento(){
        
        return $this->hasMany(depoimento::class, 'id_cliente', 'id_cliente');
    }

}