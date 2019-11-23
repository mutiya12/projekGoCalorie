<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $filleble = ['artikelid','user_id','judul','isi'];


    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
