@extends('layouts.app')

@section('content')
<div class="container spark-screen">
        <div class="form-group row">
            <div class="col-md-10 col-md-offset-1">
                    <div class="card-header">
                        Generos
                        <a class="float-right" href="{{url('generos/novo')}}">NOVO GENERO</a>
                    </div>

                <div class="card-block">
                    <table class= "table">
                    @if(Session::has('mensagem_sucesso'))
                    <div class = "alert alert-success">{{Session::get('mensagem_sucesso')}}</div>
                    @endif
                        <th>Nome</th>
                        <th>Ações</th>
                            <tbody>
                            @foreach($generos as $genero)
                                    <tr>
                                        <td>{{$genero->nome}}</td>
                                        <td>
                                        <a href="generos/{{$genero->id}}/editar" class="btn btn-secondary">Editar</a>
                                        {{ Form::open(['method'=>'DELETE','url' => 'generos/'.$genero->id, 'style'=>'display: inline;']) }}
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