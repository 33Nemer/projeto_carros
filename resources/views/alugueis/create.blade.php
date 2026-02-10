@extends('layouts.app')

@section('title', 'Novo Aluguel')

@section('content')

<form action="{{ route('alugueis.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Cliente</label>
        <select name="cliente_id" class="form-control" required>
            <option value="">Selecione um cliente</option>
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Carro</label>
        <select name="carro_id" class="form-control" required>
            <option value="">Selecione um carro</option>
            @foreach($carros as $carro)
                <option value="{{ $carro->id }}">{{ $carro->modelo }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Data de Início</label>
        <input type="date" name="data_inicio" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Data Final Prevista</label>
        <input type="date" name="data_final_prevista" class="form-control" required>
    </div>

    <button class="btn btn-success">Salvar</button>
    <a href="{{ route('alugueis.index') }}" class="btn btn-secondary">Voltar</a>
</form>

@endsection