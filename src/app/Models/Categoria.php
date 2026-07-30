<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model{

    protected $table = 'tbl_categoria';
    protected $primaryKey = 'id_categoria';

    public $timestamps = false;

    protected $fillable = [
        'nome_categoria',
        'status_categoria',
    ];

    public function CategoriaProduto(){
        return $this->hasMany(Produto::class, 'id_categoria', 'id_categoria');
    }
}