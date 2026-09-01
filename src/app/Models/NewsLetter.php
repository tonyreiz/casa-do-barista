<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsLetter extends model{

    protected $table = 'tbl_news';
    protected $primaryKey = 'id_news';
    public $timestamps = false;

    protected  $fillabel = [
        'email_news',
        'aceite_news'
    ];
}

