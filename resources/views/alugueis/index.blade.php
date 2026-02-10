@extends('layouts.app')

@section('title', 'Aluguéis')

@section('content')

<a href="{{ route('alugueis.create') }}" class="btn btn-primary mb-3">Novo Aluguel</a>

<table class="table table-bordered table-striped">
    <thead class="table-light">
        <tr>
            <th>Cliente</th>
            <th>Carro</th>
            <th>Início</th>
            <th>Previsto</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($alugueis as $aluguel)
        <tr>
            <td>{{ $aluguel->cliente->nome ?? 'Cliente não definido' }}</td>
            <td>{{ $aluguel->carro->modelo ?? 'Carro não definido' }}</td>
            <td>{{ $aluguel->data_inicio }}</td>
            <td>{{ $aluguel->data_final_prevista }}</td>
            <td>{{ ucfirst($aluguel->status) }}</td>
            <td>
                <a href="{{ route('alugueis.edit', $aluguel) }}" class="btn btn-sm btn-warning">Editar</a>

                <form method="POST" action="{{ route('alugueis.destroy', $aluguel) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection