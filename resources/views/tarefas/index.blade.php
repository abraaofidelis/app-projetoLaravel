@extends('tarefas.layout')
@section('content')
    <div class="row">
        <div class="col-xs-12 margin-tb">
            <br>
            <br>
            <br>
            <div class="pull-right">
            <a class="btn btn-success" href="{{ route('tarefas.create') }}"> Nova Tarefa</a>
            </div>
            <br>
        </div>
    </div>   

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

   
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th width="280px">Ações</th>
        </tr>

        @foreach ($tarefas as $tarefa)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $tarefa->descricao }}</td>
                <td>

                    <form action="{{ route('tarefas.destroy',$tarefa->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('tarefas.show', $tarefa->id) }}">Exibir</a>
                    <a class="btn btn-primary" href="{{ route('tarefas.edit', $tarefa->id) }}">Editar</a>

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $tarefas->links() }} 
@endsection