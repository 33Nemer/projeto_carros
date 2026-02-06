<h1>Novo Aluguel</h1>

<form method="POST" action="{{ route('alugueis.store') }}">
    @csrf

    <label>Usuário</label><br>
    <select name="usuario_id">
        @foreach ($usuarios as $usuario)
            <option value="{{ $usuario->id }}">{{ $usuario->nome }}</option>
        @endforeach
    </select><br><br>

    <label>Carro</label><br>
    <select name="carro_id">
        @foreach ($carros as $carro)
            <option value="{{ $carro->id }}">{{ $carro->modelo }}</option>
        @endforeach
    </select><br><br>

    <label>Data Início</label><br>
    <input type="date" name="data_inicio"><br><br>

    <label>Data Final Prevista</label><br>
    <input type="date" name="data_final_prevista"><br><br>

    <button>Salvar</button>
</form>

<a href="{{ route('alugueis.index') }}">Voltar</a>