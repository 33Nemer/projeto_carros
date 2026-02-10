@extends('layouts.app')

@section('title', 'Carros')

@section('content')

<a href="{{ route('carros.create') }}" class="btn btn-primary mb-3">
    Novo Carro
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Placa</th>
            <th>Ano</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($carros as $carro)
            <tr>
                <td>{{ $carro->modelo }}</td>
                <td>{{ $carro->marca }}</td>
                <td>{{ $carro->placa }}</td>
                <td>{{ $carro->ano }}</td>
                <td>{{ ucfirst($carro->status) }}</td>
                <td>
                    <a href="{{ route('carros.edit', $carro) }}" class="btn btn-sm btn-warning">
                        Editar
                    </a>

                    <form action="{{ route('carros.destroy', $carro) }}"
                          method="POST"
                          style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Deseja excluir este carro?')">
                            Excluir
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection