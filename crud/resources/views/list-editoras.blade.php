@extends('layouts.app')

@section('content')
<div class="container spark-screen">
        <div class="form-group row">
            <div class="col-md-10 col-md-offset-1">
                    <div class="card-header">
                        Editoras
                        <a class="float-right" href="{{url('editoras/novo')}}">NOVA EDITORA</a>
                    </div>

                <div class="card-block">
                    <table class= "table">
                    @if(Session::has('mensagem_sucesso'))
                    <div class = "alert alert-success">{{Session::get('mensagem_sucesso')}}</div>
                    @endif
                        <th>Nome</th>
                        <th>Ações</th>
                            <tbody>
                            @foreach($editoras as $editora)
                                    <tr>
                                        <td>{{$editora->nome}}</td>
                                        <td>
                                        <a href="editoras/{{$editora->id}}/editar" class="btn btn-secondary">Editar</a>
                                        {{ Form::open(['method'=>'DELETE','url' => 'editoras/'.$editora->id, 'style'=>'display: inline;']) }}
                                        <button type="submit" class="btn btn-secondary" >Excluir</button>
                                        {{ Form::close() }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection