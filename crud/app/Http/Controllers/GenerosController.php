<?php

namespace App\Http\Controllers;
use App\Genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GenerosController extends Controller
{
    public function index(){
        $genero = Genero::get();
        return view('list-generos',['generos'=> $genero]);
    }
    public function novo(){
        return view('novo-generos');
    }
        public function salvar(Request $request) {
            $genero = new Genero();
            $genero = $genero->create($request->all());
            \Session::flash('mensagem_sucesso','Genero cadastrado com sucesso!');
            return view('novo-generos');
        }
        public function editar($id)
        {
            $genero = Generos::findOrFail($id);
            return view ('novo-generos',['genero' => $genero]);
        }

        public function atualizar($id, Request $request)
        {
            $genero = Autore::findOrFail($id);
            $genero->update($request->all());
            \Session::flash('mensagem_sucesso','Autor atualizado com sucesso!');
            return Redirect::to ('autores/'.$genero->id.'/editar');
            

        }

        public function deletar($id, Request $request)
        {
            $genero = Autore::findOrFail($id);
            $genero->delete();
            \Session::flash('mensagem_sucesso','Autor excluido com sucesso!');
            return Redirect::to ('autores');

        }

}