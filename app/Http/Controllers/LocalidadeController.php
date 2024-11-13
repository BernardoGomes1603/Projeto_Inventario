<?php

namespace App\Http\Controllers;

use App\Models\Localidade;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class LocalidadeController extends Controller
{
    /**
     * Construtor para gerenciar permissões.
     */
    function __construct()
    {
        $this->middleware('permission:localidade-list|localidade-create|localidade-edit|localidade-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:localidade-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:localidade-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:localidade-delete', ['only' => ['destroy']]);
    }

    /**
     * Exibe a lista de localidades.
     */
    public function index(): View
    {
        $localidades = Localidade::latest()->paginate(5);
        return view('localidades.index', compact('localidades'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Exibe o formulário de criação de uma nova localidade.
     */
    public function create(): View
    {
        return view('localidades.create');
    }

    /**
     * Armazena uma nova localidade.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'contato' => 'required|string|max:255',
        ]);

        Localidade::create($request->all());

        return redirect()->route('localidades.index')
                         ->with('success', 'Localidade criada com sucesso.');
    }

    /**
     * Exibe uma localidade específica.
     */
    public function show(Localidade $localidade): View
    {
        return view('localidades.show', compact('localidade'));
    }

    /**
     * Exibe o formulário para edição de uma localidade.
     */
    public function edit(Localidade $localidade): View
    {
        return view('localidades.edit', compact('localidade'));
    }

    /**
     * Atualiza uma localidade específica.
     */
    public function update(Request $request, Localidade $localidade): RedirectResponse
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'contato' => 'required|string|max:255',
        ]);

        $localidade->update($request->all());

        return redirect()->route('localidades.index')
                         ->with('success', 'Localidade atualizada com sucesso.');
    }

    /**
     * Remove uma localidade específica.
     */
    public function destroy(Localidade $localidade): RedirectResponse
    {
        $localidade->delete();

        return redirect()->route('localidades.index')
                         ->with('success', 'Localidade excluída com sucesso.');
    }
}
