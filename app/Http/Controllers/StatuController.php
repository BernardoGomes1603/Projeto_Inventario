<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class StatuController extends Controller
{
    /**
     * Construtor para gerenciar permissões.
     */
    function __construct()
    {
        $this->middleware('permission:status-list|status-create|status-edit|status-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:status-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:status-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:status-delete', ['only' => ['destroy']]);
    }

    /**
     * Exibe a lista de status.
     */
    public function index(): View
    {
        $status = status::latest()->paginate(1000);
        return view('status.index', compact('status'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Exibe o formulário de criação de um novo status.
     */
    public function create(): View
    {
        return view('status.create');
    }

    /**
     * Armazena um novo status.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
        ]);

        Status::create($request->all());

        return redirect()->route('status.index')
                         ->with('success', 'Status criado com sucesso.');
    }

    /**
     * Exibe um status específico.
     */
    public function show(Status $status): View
    {
        return view('status.show', compact('status'));
    }

    /**
     * Exibe o formulário para edição de um status.
     */
    public function edit(Status $status): View
    {
        return view('status.edit', compact('status'));
    }

    /**
     * Atualiza um status específico.
     */
    public function update(Request $request, Status $status): RedirectResponse
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
        ]);

        $status->update($request->all());

        return redirect()->route('status.index')
                         ->with('success', 'Status atualizado com sucesso.');
    }

    /**
     * Remove um status específico.
     */
    public function destroy(Status $status): RedirectResponse
    {
        $status->delete();

        return redirect()->route('status.index')
                         ->with('success', 'Status excluído com sucesso.');
    }
}
