<h1>Clientes</h1>

<a href="{{ route('clientes.create') }}">Novo Cliente</a>

<form method="GET">
    <select name="status">
        <option value="">Todos</option>
        <option value="ativo">Ativo</option>
        <option value="inativo">Inativo</option>
    </select>
    <button type="submit">Filtrar</button>
</form>

<table border="1">
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>

    @foreach ($clientes as $cliente)
        <tr>
            <td>{{ $cliente->nome }}</td>
            <td>{{ $cliente->email }}</td>
            <td>{{ $cliente->status }}</td>
            <td>
                <a href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>

                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button>Excluir</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>