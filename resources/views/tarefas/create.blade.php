@extends('tarefas.layout')
@section('content')
<br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <br>
            <br>
            <h2>Nova Tarefa</h2>
            <br>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('tarefas.index') }}"> Voltar</a>
        </div>
    </div>
</div>
<br>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Eita!</strong> Tem algum problema com os dados fornecidos.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('tarefas.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                <input type="text" name="descricao" class="form-control" placeholder="Descrição">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <br>
                <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>
</form>
@endsection