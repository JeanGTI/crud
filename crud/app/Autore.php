<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autore extends Model
{
    protected $fillable = [
        'nome',
        'nacionalidade',
        'ano_nascimento',
        'sexo'
    ];
    public function livro(){

        return $this ->hasMany(Livros::class, 'autores_id');
       
    }
}
