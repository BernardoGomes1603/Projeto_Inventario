<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use App\Models\Localidade;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SetorController extends Controller
{
    /**
     * Construtor para gerenciar permissões.
     */
    function __construct()
    {
        $this->middleware('permission:setor-list|setor-create|setor-edit|setor-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:setor-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:setor-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:setor-delete', ['only' => ['destroy']]);
    }

    /**
     * Exibe a lista de setores.
     */
    public function index(): View
    {
        $setores = Setor::with('localidade')->latest()->paginate(5);
        return view('setores.index', compact('setores'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Exibe o formulário de criação de um novo setor.
     */
    public function create(): View
    {
        $localidades = Localidade::all();
        return view('setores.create', compact('localidades'));
    }

    /**
     * Armazena um novo setor.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'localidade_id' => 'required|exists:localidades,id',
        ]);

        Setor::create($request->all());

        return redirect()->route('setores.index')
                         ->with('success', 'Setor criado com sucesso.');
    }

    /**
     * Exibe um setor específico.
     */
    public function show(Setor $setor): View
    {
        return view('setores.show', compact('setor'));
    }

    /**
     * Exibe o formulário para edição de um setor.
     */
    public function edit(Setor $setor): View
    {
        $localidades = Localidade::all();
        return view('setores.edit', compact('setor', 'localidades'));
    }

    /**
     * Atualiza um setor específico.
     */
    public function update(Request $request, Setor $setor): RedirectResponse
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'localidade_id' => 'required|exists:localidades,id',
        ]);

        $setor->update($request->all());

        return redirect()->route('setores.index')
                         ->with('success', 'Setor atualizado com sucesso.');
    }

    /**
     * Remove um setor específico.
     */
    public function destroy(Setor $setor): RedirectResponse
    {
        $setor->delete();

        return redirect()->route('setores.index')
                         ->with('success', 'Setor excluído com sucesso.');
    }
}
