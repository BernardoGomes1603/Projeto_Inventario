<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Localidade;

class LocalidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserindo Localidades
        Localidade::insert([
            ['nome' => 'São Paulo - SP', 'endereco' => 'Rua A, 123, Centro', 'contato' => '11 99999-9999'],
            ['nome' => 'Rio de Janeiro - RJ', 'endereco' => 'Av. Brasil, 456, Centro', 'contato' => '21 98888-8888'],
            ['nome' => 'Belo Horizonte - MG', 'endereco' => 'Rua B, 789, Savassi', 'contato' => '31 97777-7777'],
            ['nome' => 'Curitiba - PR', 'endereco' => 'Rua C, 101, Batel', 'contato' => '41 96666-6666'],
            ['nome' => 'Porto Alegre - RS', 'endereco' => 'Av. Osvaldo Aranha, 202, Cidade Baixa', 'contato' => '51 95555-5555']
        ]);
    }
}
