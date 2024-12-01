<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash; // Adicionar esta linha
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Encontrar a role 'Admin'
        $roleAdmin = Role::where('name', 'Admin')->first();

        // Criar 5 usuários de exemplo
        $users = [
            [
                'name' => 'João Silva',
                'email' => 'joao.silva@example.com',
                'password' => Hash::make('123456'),
                'role' => $roleAdmin,  // Adicionar a role Admin
            ],
            [
                'name' => 'Maria Souza',
                'email' => 'maria.souza@example.com',
                'password' => Hash::make('123456'),
                'role' => $roleAdmin,  // Adicionar a role Admin
            ],
            [
                'name' => 'Carlos Pereira',
                'email' => 'carlos.pereira@example.com',
                'password' => Hash::make('123456'),
                'role' => $roleAdmin,  // Adicionar a role Admin
            ],
            [
                'name' => 'Ana Costa',
                'email' => 'ana.costa@example.com',
                'password' => Hash::make('123456'),
                'role' => $roleAdmin,  // Adicionar a role Admin
            ],
            [
                'name' => 'Lucas Almeida',
                'email' => 'lucas.almeida@example.com',
                'password' => Hash::make('123456'),
                'role' => $roleAdmin,  // Adicionar a role Admin
            ],
        ];

        // Criar os usuários com as roles
        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => $userData['password'],
            ]);

            // Atribuir a role ao usuário
            $user->assignRole($userData['role']);
        }
    }
}
