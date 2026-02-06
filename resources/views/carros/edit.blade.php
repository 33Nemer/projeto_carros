@extends('layouts.app')

@section('title', 'Editar Carro')

@section('content')

<form action="{{ route('cars.update', $car) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Modelo</label>
        <input type="text" name="modelo" value="{{ $car->modelo }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Marca</label>
        <input type="text" name="marca" value="{{ $car->marca }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Placa</label>
        <input type="text" name="placa" value="{{ $car->placa }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Ano</label>
        <input type="number" name="ano" value="{{ $car->ano }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Preço Diária</label>
        <input type="number" step="0.01" name="preco_diaria" value="{{ $car->preco_diaria }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control">{{ $car->descricao }}</textarea>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="disponivel" @selected($car->status=='disponivel')>Disponível</option>
            <option value="alugado" @selected($car->status=='alugado')>Alugado</option>
            <option value="manutencao" @selected($car->status=='manutencao')>Manutenção</option>
        </select>
    </div>

    <button class="btn btn-success">Atualizar</button>
    <a href="{{ route('cars.index') }}" class="btn btn-secondary">Voltar</a>
</form>

@endsection