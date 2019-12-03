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

        return $this ->hasMany(Livros::class,'generos_id');
       
    }
    
}
