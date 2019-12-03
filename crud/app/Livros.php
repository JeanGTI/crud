<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Genero;

class Livros extends Model
{
    protected $fillable = [
        'titulo',
        'ano_lancamento'
    ];

    public function generos(){
        return $this->belongsToMany('App\Generos','livrosgeneros','generos_id','livros_id');
    }
    
    public function autores(){

        return $this ->hasMany(Autor::class,'id','id');
       
    }

    public function editoras(){

        return $this ->hasMany(Editora::class,'id','id');
       
    }
}