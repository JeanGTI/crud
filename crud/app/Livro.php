<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Genero;

class Livro extends Model
{
    protected $fillable = [
        'titulo',
        'ano_lancamento',
        'generos_id',
        'editoras_id',
        'autores_id'
    ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'livros';

    public function generos(){

        return $this ->hasMany(Generos::class,'id','generos_id');
       
    }
    
    public function autores(){

        return $this ->hasMany(Autore::class,'id','autores_id');
       
    }

    public function editoras(){

        return $this ->hasMany(Editora::class,'id','editoras_id');
       
    }
}