<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Recupera o total de itens
        $totalItens = \App\Models\Item::count();

        // Recupera o total de usuários
        $totalUsuarios = \App\Models\User::count();

        // Recupera o total de localidades
        $totalLocalidades = \App\Models\Localidade::count();

        // Passa as variáveis para a view
        return view('home', compact('totalItens', 'totalUsuarios', 'totalLocalidades'));
    }
}
