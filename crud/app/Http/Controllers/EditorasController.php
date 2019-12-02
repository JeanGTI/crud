<?php

namespace App\Http\Controllers;
use App\Editora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EditorasController extends Controller
{
    public function index(){
        $editora = Editora::get();
        return view('list-editoras',['editoras'=> $editora]);
    }
    public function novo(){
        return view('novo-editoras');
    }
        public function salvar(Request $request) {
            $editora = new Editora();
            $editora = $editora->create($request->all());
            \Session::flash('mensagem_sucesso','Editora cadastrada com sucesso!');
            return view('novo-editoras');
        }
        public function editar($id)
        {
            $editora = Editora::findOrFail($id);
            return view ('novo-editoras',['editora' => $editora]);
        }

        public function atualizar($id, Request $request)
        {
            $editora = Editora::findOrFail($id);
            $editora->update($request->all());
            \Session::flash('mensagem_sucesso','Editora atualizada com sucesso!');
            return Redirect::to ('editoras/'.$editora->id.'/editar');
            

        }

        public function deletar($id, Request $request)
        {
            $editora = Editora::findOrFail($id);
            $editora->delete();
            \Session::flash('mensagem_sucesso','Editora excluida com sucesso!');
            return Redirect::to ('editoras');

        }

}