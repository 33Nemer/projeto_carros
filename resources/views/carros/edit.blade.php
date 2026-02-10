@extends('layouts.app')

@section('title', 'Editar Carro')

@section('content')

<form action="{{ route('carros.update', $carro) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Modelo</label>
        <input type="text" name="modelo" value="{{ $carro->modelo }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Marca</label>
        <input type="text" name="marca" value="{{ $carro->marca }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Placa</label>
        <input type="text" name="placa" value="{{ $carro->placa }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Ano</label>
        <input type="number" name="ano" value="{{ $carro->ano }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Preço Diária</label>
        <input type="number" step="0.01" name="preco_diaria" value="{{ $carro->preco_diaria }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control">{{ $carro->descricao }}</textarea>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="disponivel" @selected($carro->status === 'disponivel')>Disponível</option>
            <option value="alugado" @selected($carro->status === 'alugado')>Alugado</option>
            <option value="manutencao" @selected($carro->status === 'manutencao')>Manutenção</option>
        </select>
    </div>

    <button class="btn btn-success">Atualizar</button>
    <a href="{{ route('carros.index') }}" class="btn btn-secondary">Voltar</a>
</form>

@endsection