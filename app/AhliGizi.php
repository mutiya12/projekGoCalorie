<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AhliGizi extends Model
{
    protected $table = 'ahligizi';
    protected $fillable = ['id','user_id','nama_lengkap','lulusan'];
}
