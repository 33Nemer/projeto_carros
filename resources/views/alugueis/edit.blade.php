<h1>Editar Aluguel</h1>

<form method="POST" action="{{ route('alugueis.update', $aluguel->id) }}">
    @csrf
    @method('PUT')

    <label>Status</label><br>
    <select name="status">
        <option value="aberto" {{ $aluguel->status == 'aberto' ? 'selected' : '' }}>Aberto</option>
        <option value="finalizado" {{ $aluguel->status == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
        <option value="cancelado" {{ $aluguel->status == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
    </select><br><br>

    <label>Data Final Entregue</label><br>
    <input type="date" name="data_final_entregue" value="{{ $aluguel->data_final_entregue }}"><br><br>

    <button>Atualizar</button>
</form>

<a href="{{ route('alugueis.index') }}">Voltar</a>