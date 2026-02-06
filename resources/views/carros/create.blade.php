@extends('layouts.app')

@section('title', 'Novo Carro')

@section('content')

<form action="{{ route('cars.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Modelo</label>
        <input type="text" name="modelo" class="form-control">
    </div>

    <div class="mb-3">
        <label>Marca</label>
        <input type="text" name="marca" class="form-control">
    </div>

    <div class="mb-3">
        <label>Placa</label>
        <input type="text" name="placa" class="form-control">
    </div>

    <div class="mb-3">
        <label>Ano</label>
        <input type="number" name="ano" class="form-control">
    </div>

    <div class="mb-3">
        <label>Preço Diária</label>
        <input type="number" step="0.01" name="preco_diaria" class="form-control">
    </div>

    <div class="mb-3">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="disponivel">Disponível</option>
            <option value="alugado">Alugado</option>
            <option value="manutencao">Manutenção</option>
        </select>
    </div>

    <button class="btn btn-success">Salvar</button>
    <a href="{{ route('cars.index') }}" class="btn btn-secondary">Voltar</a>
</form>

@endsection