<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model{

    protected $table = 'tbl_galeria';
    protected $primaryKey = 'id_galeria';

    public $timestamps = false;

    protected $fillabel = [
        'nome_galeria',
        'imagem_galeria',
        'status_galeria'
    ];


}