<?php

namespace App\Http\Controllers;

use App\Models\Aluguel;
use App\Models\Cliente;
use App\Models\Carro;
use Illuminate\Http\Request;

class AluguelController extends Controller
{
    /**
     * Listar todos os aluguéis com filtro opcional por status
     */
    public function index(Request $request)
    {
        $query = Aluguel::with(['cliente', 'carro']);

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $alugueis = $query->get();

        return view('alugueis.index', compact('alugueis'));
    }

    /**
     * Mostrar formulário para criar novo aluguel
     */
    public function create()
    {
        $clientes = Cliente::where('status', 'ativo')->get();
        $carros = Carro::where('status', 'disponivel')->get();

        return view('alugueis.create', compact('clientes', 'carros'));
    }

    /**
     * Salvar novo aluguel no banco
     */
    public function store(Request $request)
    {
        // Validação básica
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'carro_id' => 'required|exists:carros,id',
            'data_inicio' => 'required|date',
            'data_final_prevista' => 'required|date|after_or_equal:data_inicio',
        ]);

        // Criar aluguel
        $aluguel = Aluguel::create($request->all());

        // Atualizar status do carro para alugado
        $carro = Carro::find($request->carro_id);
        $carro->update(['status' => 'alugado']);

        return redirect()->route('alugueis.index');
    }

    /**
     * Mostrar formulário de edição
     */
    public function edit($id)
    {
        $aluguel = Aluguel::findOrFail($id);
        $clientes = Cliente::all();
        $carros = Carro::all();

        return view('alugueis.edit', compact('aluguel', 'clientes', 'carros'));
    }

    /**
     * Atualizar aluguel no banco
     */
    public function update(Request $request, $id)
    {
        $aluguel = Aluguel::findOrFail($id);

        // Validação básica
        $request->validate([
            'status' => 'required|in:aberto,finalizado,cancelado',
            'data_final_entregue' => 'nullable|date|after_or_equal:data_inicio',
        ]);

        $aluguel->update($request->all());

        // Se o aluguel for finalizado ou cancelado, liberar o carro
        if ($request->status !== 'aberto') {
            $aluguel->carro->update(['status' => 'disponivel']);
        }

        return redirect()->route('alugueis.index');
    }

    /**
     * Excluir aluguel
     */
    public function destroy($id)
    {
        $aluguel = Aluguel::findOrFail($id);

        // Antes de deletar, se estiver aberto, liberar o carro
        if ($aluguel->status === 'aberto') {
            $aluguel->carro->update(['status' => 'disponivel']);
        }

        $aluguel->delete();

        return redirect()->route('alugueis.index');
    }
}
