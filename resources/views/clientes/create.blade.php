<h1>Novo Cliente</h1>

<form method="POST" action="{{ route('clientes.store') }}">
    @csrf

    <label>Nome</label><br>
    <input type="text" name="nome"><br><br>

    <label>Email</label><br>
    <input type="email" name="email"><br><br>

    <label>Senha</label><br>
    <input type="password" name="senha"><br><br>

    <label>Status</label><br>
    <select name="status">
        <option value="ativo">Ativo</option>
        <option value="inativo">Inativo</option>
    </select><br><br>

    <button>Salvar</button>
</form>

<a href="{{ route('clientes.index') }}">Voltar</a>