@extends('layouts.app')

@section('title', 'Editar Aluguel')

@section('content')

<form action="{{ route('alugueis.update', $aluguel) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Cliente</label>
        <select name="cliente_id" class="form-control" required>
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}" @selected($aluguel->cliente_id == $cliente->id)>{{ $cliente->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Carro</label>
        <select name="carro_id" class="form-control" required>
            @foreach($carros as $carro)
                <option value="{{ $carro->id }}" @selected($aluguel->carro_id == $carro->id)>{{ $carro->modelo }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Data de Início</label>
        <input type="date" name="data_inicio" value="{{ $aluguel->data_inicio }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Data Final Prevista</label>
        <input type="date" name="data_final_prevista" value="{{ $aluguel->data_final_prevista }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="aberto" @selected($aluguel->status=='aberto')>Aberto</option>
            <option value="finalizado" @selected($aluguel->status=='finalizado')>Finalizado</option>
            <option value="cancelado" @selected($aluguel->status=='cancelado')>Cancelado</option>
        </select>
    </div>

    <button class="btn btn-success">Atualizar</button>
    <a href="{{ route('alugueis.index') }}" class="btn btn-secondary">Voltar</a>
</form>

@endsection