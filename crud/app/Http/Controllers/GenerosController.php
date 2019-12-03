<?php

namespace App\Http\Controllers;
use App\Generos;
use App\Livros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GenerosController extends Controller
{

    public function index(){
        $genero = Generos::get();
        return view('list-generos',['generos'=> $genero]);
    }



    //public function generos(){
    //    $genero = Generos::find(1);
    //    $livros = $genero->livros;
    //    echo '<h3>'.($genero->nome).'</h3>';
    //    echo '<ul>';
    //    foreach($livros as $l){
    //        echo '<li>'.$l->titulo.'</li>';
    //    }
    //    echo '</ul>';
    //}
    
    public function novo(){
        return view('novo-generos');
    }
        public function salvar(Request $request) {
            $genero = new Generos();
            $genero = $genero->create($request->all());
            \Session::flash('mensagem_sucesso','Genero cadastrado com sucesso!');
            return view('novo-generos');
        }
        public function editar($id)
        {
            $genero = Geneross::findOrFail($id);
            return view ('novo-generos',['genero' => $genero]);
        }

        public function atualizar($id, Request $request)
        {
            $genero = Generos::findOrFail($id);
            $genero->update($request->all());
            \Session::flash('mensagem_sucesso','Genero atualizado com sucesso!');
            return Redirect::to ('generos/'.$genero->id.'/editar');
            

        }

        public function deletar($id, Request $request)
        {
            $genero = Generos::findOrFail($id);
            $genero->delete();
            \Session::flash('mensagem_sucesso','Genero excluido com sucesso!');
            return Redirect::to ('generos');

        }

}