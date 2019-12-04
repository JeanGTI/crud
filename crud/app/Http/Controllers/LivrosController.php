<?php

namespace App\Http\Controllers;
use App\Livro;
use App\Generos;
use App\Editora;
use App\Autore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LivrosController extends Controller
{

    public function index(){
        $livro = Livro::get();
        return view('list-Livros',['livro'=> $livro]);
    }
    
    //public function Livro(){
    //    $livro = Livro::find(1);
    //   $generos = $livro->generos;
    //    echo '<h3>'.($livro->titulo).'</h3>';
//
     //   echo '<ul>';
     //   foreach($generos as $g){
     //       echo '<li>'.$g->nome.'</li>';
     //   }
     //   echo '</ul>';
   // }
    
    //public function novo(){
    //    return view('novo-Livro');
    
        public function salvar(Request $request) {
            $livro = new Livro();
            $livro = $livro->create($request->all());
            \Session::flash('mensagem_sucesso','Livro cadastrado com sucesso!');
            return Redirect::to ('livros');
        }

        public function cadastrar() {
            $autor = Autore::pluck('nome', 'id');
            $genero = Generos::pluck('nome', 'id');
            $editora = Editora::pluck('nome', 'id');
    
            return view('novo-Livros',compact('autor','genero','editora'));
        }

        public function editar($id)
        {
            $livro = Livro::findOrFail($id);
            $autor = Autore::pluck('nome', 'id');
            $genero = Generos::pluck('nome', 'id');
            $editora = Editora::pluck('nome', 'id');
            return view ('novo-livros',compact('livro','autor','genero','editora'));
            //['livro' => $livro]
        }

        public function atualizar($id, Request $request)
        {
            $livro = Livro::findOrFail($id);
            $livro->update($request->all());
            \Session::flash('mensagem_sucesso','Livro atualizado com sucesso!');
            return Redirect::to ('livro/'.$livro->id.'/editar');
            

        }

        public function deletar($id, Request $request)
        {
            $livro = Livro::findOrFail($id);
            $livro->delete();
            \Session::flash('mensagem_sucesso','Livro excluido com sucesso!');
            return Redirect::to ('livro');

        }
    
}