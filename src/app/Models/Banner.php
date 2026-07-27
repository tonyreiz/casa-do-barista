<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model{

    // Seleciona a pasta do 
    protected $table = 'tbl_banner';
    protected $primaryKey = 'id_banner';

    //permite se a data de criação aparece ou não
    public $timestamps = false;

    //processo do que vai poder alterar
    protected $fillable = [
        'titulo_banner',
        'imagem_banner',
        'status_banner'

    ];

}

// docker .yml traz o banco e .env conecta