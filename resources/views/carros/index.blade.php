@extends('layouts.app')

@section('title', 'Carros')

@section('content')

<a href="{{ route('carros.create') }}" class="btn btn-primary mb-3">Novo Carro</a>

<table class="table table-bordered">
    <tr>
        <th>Modelo</th>
        <th>Marca</th>
        <th>Placa</th>
        <th>Ano</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>

    @foreach($carros as $car)
    <tr>
        <td>{{ $car->modelo }}</td>
        <td>{{ $car->marca }}</td>
        <td>{{ $car->placa }}</td>
        <td>{{ $car->ano }}</td>
        <td>{{ $car->status }}</td>
        <td>
            <a href="{{ route('cars.edit', $car) }}" class="btn btn-sm btn-warning">Editar</a>

            <form action="{{ route('cars.destroy', $car) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Excluir</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection