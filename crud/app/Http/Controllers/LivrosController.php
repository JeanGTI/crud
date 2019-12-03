<?php

namespace App\Http\Controllers;
use App\livros;
use App\Generos;
use App\Editora;
use App\Autore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LivrosController extends Controller
{

    public function index(){
        $livro = Livros::get();
        return view('list-livros',['livros'=> $livro]);
    }
    
    //public function livros(){
    //    $livro = Livros::find(1);
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
    //    return view('novo-livros');
    
        public function salvar(Request $request) {
            $livro = new Livros();
            $livro = $livro->create($request->all());
            \Session::flash('mensagem_sucesso','Livro cadastrado com sucesso!');
            return Redirect::to ('livros');
        }

        public function cadastrar() {
            $autor = Autore::pluck('nome', 'id');
            $genero = Generos::pluck('nome', 'id');
            $editora = Editora::pluck('nome', 'id');
    
            return view('novo-livros',compact('autor','genero','editora'));
        }

        public function editar($id)
        {
            $livro = Livros::findOrFail($id);
            $autor = Autore::pluck('nome', 'id');
            $genero = Generos::pluck('nome', 'id');
            $editora = Editora::pluck('nome', 'id');
            return view ('novo-livros',compact('livro','autor','genero','editora'));
            //['livro' => $livro]
        }

        public function atualizar($id, Request $request)
        {
            $livro = Livros::findOrFail($id);
            $livro->update($request->all());
            \Session::flash('mensagem_sucesso','Livro atualizado com sucesso!');
            return Redirect::to ('livros/'.$livro->id.'/editar');
            

        }

        public function deletar($id, Request $request)
        {
            $livro = Livro::findOrFail($id);
            $livro->delete();
            \Session::flash('mensagem_sucesso','Livro excluido com sucesso!');
            return Redirect::to ('livros');

        }
    
}