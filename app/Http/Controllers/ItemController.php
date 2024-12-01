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

    public function index(Request $request)
{
    // Iniciar a consulta para os itens
    $query = Item::query();

    // Filtro de busca (por modelo, especificações, ou descrição)
    if ($request->has('search') && $request->get('search') != '') {
        $search = $request->get('search');
        $query->where('modelo', 'LIKE', "%{$search}%")
              ->orWhere('especificacoes', 'LIKE', "%{$search}%")
              ->orWhere('descricao', 'LIKE', "%{$search}%");
    }

    // Ordenação
    $sort = $request->get('sort_by', 'id');  // Campo de ordenação (padrão: 'id')
    $direction = $request->get('order', 'asc');  // Direção da ordenação (padrão: 'asc')

    // Ordenação por colunas relacionadas
    if ($sort === 'localidade') {
        $query->join('localidades', 'items.localidade_id', '=', 'localidades.id')
              ->orderBy('localidades.nome', $direction);  // Ordena pelo nome da localidade
    } elseif ($sort === 'user') {
        $query->join('users', 'items.user_id', '=', 'users.id')
              ->orderBy('users.name', $direction);  // Ordena pelo nome do usuário
    } elseif ($sort === 'status') {
        $query->join('status', 'items.status_id', '=', 'status.id')
              ->orderBy('status.descricao', $direction);  // Ordena pela descrição do status
    } else {
        // Ordenação normal para os campos na tabela 'items'
        $query->orderBy($sort, $direction);
    }

    // Recuperar os itens com paginação
    $itens = $query->paginate(100);  // Paginação ajustada para 10 itens por página

    // Passar os itens para a view
    return view('itens.index', compact('itens'));
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
