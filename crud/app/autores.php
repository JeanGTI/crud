<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class autores extends Model
{
    protected $fillable = ['nome','ano_nascimento','nacionalidade','sexo'];
    protected $guarded = ['id','created_at','update_at'];
    protected $table = 'autores';
}
