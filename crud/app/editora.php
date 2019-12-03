<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{
    protected $fillable = [
        'nome'
    ];
    public function livro(){

        return $this ->hasMany(Livros::class,'editoras_id');
       
    }
}
