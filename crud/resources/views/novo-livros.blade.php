@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="form-group row">
            <div class="col-md-10 col-md-offset-1">
                    <div class="card-header">
                        Informe os dados do livro!
                        <a class="float-right" href="{{url('livros')}}">LIVROS CADASTRADOS</a>
                    </div>

                <div class="card-block">

                @if(Session::has('mensagem_sucesso'))
                    <div class = "alert alert-success">{{Session::get('mensagem_sucesso')}}</div>
                @endif              

                @if(Request::is('*/editar'))
                    {{ Form::model($livro, ['method'=>'PATCH','url'=>'livros/'.$livro->id])}}
                @else                
                {{ Form::open(['url' => 'livros/salvar']) }}
                @endif

                    {{ Form::label('titulo','Titulo')}}
                    {{ Form::input('text','titulo', null,['class' => 'form-control','autofocus','placeholder'=>'Titulo'])}}

                    {!!Form::label('nome','Autores',)!!}                   
                    {!! Form::select('autores.id', $autor,null,['class' =>'form-control', 'autofocus']) !!}
                    
                    {!!Form::label('nome','Genero',)!!}
                    {!! Form::select('generos.id', $genero,null,['class' =>'form-control', 'autofocus']) !!}

                    {!!Form::label('editora','Editora',)!!}                   
                    {!! Form::select('editoras.id', $editora,null,['class' =>'form-control', 'autofocus']) !!}


                    {{ Form::label('ano_lancamento','Ano_lancamento')}}
                    {{ Form::input('date','ano_lancamento', null,['class' => 'form-control','placeholder'=>'Ano de lancamento'])}}

                    {{ Form::submit('Salvar',['class'=>'btn-primary'])}}

                {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection