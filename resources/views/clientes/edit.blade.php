@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('content')

<form action="{{ route('clientes.update', $cliente) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" value="{{ $cliente->nome }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="{{ $cliente->email }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Telefone</label>
        <input type="text" name="telefone" value="{{ $cliente->telefone }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="ativo" @selected($cliente->status=='ativo')>Ativo</option>
            <option value="inativo" @selected($cliente->status=='inativo')>Inativo</option>
        </select>
    </div>

    <button class="btn btn-success">Atualizar</button>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
</form>

@endsection
