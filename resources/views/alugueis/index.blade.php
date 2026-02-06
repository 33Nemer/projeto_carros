<h1>Aluguéis</h1>

<a href="{{ route('alugueis.create') }}">Novo Aluguel</a>

<form method="GET">
    <select name="status">
        <option value="">Todos</option>
        <option value="aberto">Aberto</option>
        <option value="finalizado">Finalizado</option>
        <option value="cancelado">Cancelado</option>
    </select>
    <button>Filtrar</button>
</form>

<table border="1">
    <tr>
        <th>Usuário</th>
        <th>Carro</th>
        <th>Início</th>
        <th>Previsto</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>

    @foreach ($alugueis as $aluguel)
    <tr>
        <td>{{ $aluguel->usuario->nome }}</td>
        <td>{{ $aluguel->carro->modelo }}</td>
        <td>{{ $aluguel->data_inicio }}</td>
        <td>{{ $aluguel->data_final_prevista }}</td>
        <td>{{ $aluguel->status }}</td>
        <td>
            <a href="{{ route('alugueis.edit', $aluguel->id) }}">Editar</a>

            <form method="POST" action="{{ route('alugueis.destroy', $aluguel->id) }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <button>Excluir</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>