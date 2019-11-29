<?php

namespace App\Http\Controllers;
use App\Autore;
use Illuminate\Http\Request;

class AutoresController extends Controller
{
    public function index(){
        $autor = Autore::get();
        return view('list-autores',['autores'=> $autor]);
    }
    public function novo(){
        return view('novo-autores');
    }
        public function salvar(Request $request) {
            $autor = new Autore();
            $autor = $autor->create($request->all());
            \Session::flash('mensagem_sucesso','Cliente cadastrado com sucesso!');
            return view('novo-autores');
        }
        public function editar($id)
        {
            $autor = Autore::findOrFail($id);
            return view ('novo-autores',['autor' => $autor]);
        }

        public function atualizar($id, Request $request)
        {
            $autor = Autore::findOrFail($id);
            $autor->update($request->all());
            return view ('novo-autores',['autor' => $autor]);
        }

}