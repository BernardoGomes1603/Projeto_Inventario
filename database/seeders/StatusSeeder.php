<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Definir os status que você quer inserir
        $status = [
            'Novo',
            'Em Uso',
            'Em Manutenção',
            'Defeito',
            'Devolvido',
            'Disponível',
            'Reservado',
            'Aguardando Retirada',
            'Em Processamento',
            'Fora de Estoque'
        ];

        // Inserir cada status na tabela 'status'
        foreach ($status as $desc) {
            Status::create([
                'descricao' => $desc
            ]);
        }
    }
}
