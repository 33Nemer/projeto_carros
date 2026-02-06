<h1>Editar Cliente</h1>

<form method="POST" action="{{ route('clientes.update', $cliente->id) }}">
    @csrf
    @method('PUT')

    <label>Nome</label><br>
    <input type="text" name="nome" value="{{ $cliente->nome }}"><br><br>

    <label>Email</label><br>
    <input type="email" name="email" value="{{ $cliente->email }}"><br><br>

    <label>Senha</label><br>
    <input type="text" name="senha" value="{{ $cliente->senha }}"><br><br>

    <label>Status</label><br>
    <select name="status">
        <option value="ativo" {{ $cliente->status == 'ativo' ? 'selected' : '' }}>Ativo</option>
        <option value="inativo" {{ $cliente->status == 'inativo' ? 'selected' : '' }}>Inativo</option>
    </select><br><br>

    <button>Atualizar</button>
</form>

<a href="{{ route('clientes.index') }}">Voltar</a>
