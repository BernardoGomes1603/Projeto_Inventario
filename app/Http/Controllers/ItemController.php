<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Localidade;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:item-list|item-create|item-edit|item-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:item-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:item-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:item-delete', ['only' => ['destroy']]);
    }

    public function index(): View
    {
        $itens = Item::with(['localidade', 'user', 'status'])->latest()->paginate(5);

        return view('itens.index', compact('itens'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(): View
    {
        $localidades = Localidade::all();
        $statuses = Status::all();
        $users = User::all();

        return view('itens.create', compact('localidades', 'statuses', 'users'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Debug: Verifique os dados enviados
        if (env('APP_DEBUG')) {
            logger('Dados recebidos no request:', $request->all());
        }

        $request->validate([
            'modelo' => 'required|string|max:255',
            'especificacoes' => 'required|string',
            'descricao' => 'nullable|string',
            'localidade_id' => 'required|exists:localidade,id',
            'user_id' => 'required|exists:users,id',
            'status_id' => 'required|exists:status,id',
        ]);

        // Criando o item
        $item = Item::create($request->only(['modelo', 'especificacoes', 'descricao', 'localidade_id', 'user_id', 'status_id']));

        return redirect()->route('itens.index')
                         ->with('success', 'Item criado com sucesso.');
    }

    public function show(Item $item): View
    {
        $item->load(['localidade', 'user', 'status']);

        return view('itens.show', compact('item'));
    }

    public function edit(Item $item): View
    {
      $localidades = Localidade::all();
      $statuses = Status::all();
      $users = User::all();

     return view('itens.edit', compact('item', 'localidades', 'statuses', 'users'));
    }


    public function update(Request $request, Item $item): RedirectResponse
    {
        $request->validate([
            'modelo' => 'required|string|max:255',
            'especificacoes' => 'required|string',
            'descricao' => 'nullable|string',
            'localidade_id' => 'required|exists:localidade,id',
            'user_id' => 'required|exists:users,id',
            'status_id' => 'required|exists:status,id',
        ]);

        $item->update($request->only(['modelo', 'especificacoes', 'descricao', 'localidade_id', 'user_id', 'status_id']));

        return redirect()->route('itens.index')
                         ->with('success', 'Item atualizado com sucesso.');
    }

    public function destroy(Item $item): RedirectResponse
    {
        $item->delete();

        return redirect()->route('itens.index')
                         ->with('success', 'Item excluído com sucesso.');
    }
}
