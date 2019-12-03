<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Livro;


class Generos extends Model
{
    protected $fillable = [
        'nome'
    ];

    public function livros(){
        return $this->belongsToMany('App\Livros','livrosgeneros','generos_id','livros_id');
    }
    
}
