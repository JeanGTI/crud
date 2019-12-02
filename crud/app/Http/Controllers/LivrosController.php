<?php

namespace App\Http\Controllers;
use App\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LivrosController extends Controller
{
    public function index(){
        $livro = Livro::get();
        return view('list-livros',['livros'=> $livro]);
    }
    public function novo(){
        return view('novo-livros');
    }
        public function salvar(Request $request) {
            $livro = new Livro();
            $livro = $livro->create($request->all());
            \Session::flash('mensagem_sucesso','Livro cadastrado com sucesso!');
            return view('novo-livros');
        }
        public function editar($id)
        {
            $livro = Livro::findOrFail($id);
            return view ('novo-livros',['livro' => $livro]);
        }

        public function atualizar($id, Request $request)
        {
            $livro = Livro::findOrFail($id);
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