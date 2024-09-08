@extends('tarefas.layout')
@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <br>
                <br>
                <h2>Exibir Tarefa</h2>
                <br>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tarefas.index') }}"> Voltar</a>
            </div>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                {{ $tarefa->descricao }}
            </div>
        </div>
    </div>

@endsection