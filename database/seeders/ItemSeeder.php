<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    public function run()
    {
        Item::insert([
            [
                'modelo' => 'Samsung Odyssey G5 27"',
                'especificacoes' => '2560 x 1440, 165Hz, Curvo',
                'descricao' => 'Novo - ' . now()->format('d/m/Y'),
                'localidade_id' => 1,
                'user_id' => rand(1, 6), // Distribuição aleatória
                'status_id' => 1
            ],
            [
                'modelo' => 'LG UltraWide 34" Curvo',
                'especificacoes' => '2560 x 1080, 75Hz, Curvo',
                'descricao' => 'Novo - ' . now()->format('d/m/Y'),
                'localidade_id' => 2,
                'user_id' => rand(1, 6), // Distribuição aleatória
                'status_id' => 2
            ],
            [
                'modelo' => 'Acer Predator X34P',
                'especificacoes' => '3440 x 1440, 120Hz, Curvo, IPS',
                'descricao' => 'Novo - ' . now()->format('d/m/Y'),
                'localidade_id' => 3,
                'user_id' => rand(1, 6), // Distribuição aleatória
                'status_id' => 6
            ],
            [
                'modelo' => 'Dell XPS 13 9300',
                'especificacoes' => 'Intel i7, 16GB RAM, 512GB SSD, 13.3" FHD',
                'descricao' => 'Novo - ' . now()->format('d/m/Y'),
                'localidade_id' => 3,
                'user_id' => rand(1, 6), // Distribuição aleatória
                'status_id' => 3
            ],
            [
                'modelo' => 'Apple MacBook Pro 14"',
                'especificacoes' => 'M1 Pro, 16GB RAM, 512GB SSD, Retina',
                'descricao' => 'Novo - ' . now()->format('d/m/Y'),
                'localidade_id' => 4,
                'user_id' => rand(1, 6), // Distribuição aleatória
                'status_id' => 4
            ],
            [
                'modelo' => 'Asus ZenBook 14',
                'especificacoes' => 'Intel i5, 8GB RAM, 256GB SSD, 14" Full HD',
                'descricao' => 'Novo - ' . now()->format('d/m/Y'),
                'localidade_id' => 2,
                'user_id' => rand(1, 6), // Distribuição aleatória
                'status_id' => 7
            ],
            [
                'modelo' => 'iPhone 13 Pro Max',
                'especificacoes' => '128GB, Tela 6.7", A15 Bionic',
                'descricao' => 'Novo - ' . now()->format('d/m/Y'),
                'localidade_id' => 5,
                'user_id' => rand(1, 6), // Distribuição aleatória
                'status_id' => 5
            ],
            [
                'modelo' => 'Samsung Galaxy S21 Ultra',
                'especificacoes' => '128GB, Tela 6.8", Exynos 2100',
                'descricao' => 'Novo - ' . now()->format('d/m/Y'),
                'localidade_id' => 1,
                'user_id' => rand(1, 6), // Distribuição aleatória
                'status_id' => 6
            ],
            [
                'modelo' => 'Google Pixel 6',
                'especificacoes' => '128GB, Tela 6.4", Google Tensor',
                'descricao' => 'Novo - ' . now()->format('d/m/Y'),
                'localidade_id' => 4,
                'user_id' => rand(1, 6), // Distribuição aleatória
                'status_id' => 8
            ],
            [
                'modelo' => 'Xiaomi Mi 11 Ultra',
                'especificacoes' => '256GB, Tela 6.81", Snapdragon 888',
                'descricao' => 'Novo - ' . now()->format('d/m/Y'),
                'localidade_id' => 3,
                'user_id' => rand(1, 6), // Distribuição aleatória
                'status_id' => 9
            ],
            [
                'modelo' => 'Apple iMac 24"',
                'especificacoes' => 'M1, 8GB RAM, 256GB SSD, Retina Display',
                'descricao' => 'Novo - ' . now()->format('d/m/Y'),
                'localidade_id' => 2,
                'user_id' => rand(1, 6), // Distribuição aleatória
                'status_id' => 7
            ],
            [
                'modelo' => 'PC Gamer Customizado',
                'especificacoes' => 'Intel i9, 32GB RAM, RTX 3080, 1TB SSD',
                'descricao' => 'Novo - ' . now()->format('d/m/Y'),
                'localidade_id' => 3,
                'user_id' => rand(1, 6), // Distribuição aleatória
                'status_id' => 8
            ],
            [
                'modelo' => 'Dell OptiPlex 7070',
                'especificacoes' => 'Intel i5, 16GB RAM, 512GB SSD, 21.5" Monitor',
                'descricao' => 'Novo - ' . now()->format('d/m/Y'),
                'localidade_id' => 5,
                'user_id' => rand(1, 6), // Distribuição aleatória
                'status_id' => 10
            ],
            [
                'modelo' => 'HP EliteDesk 800 G5',
                'especificacoes' => 'Intel i7, 16GB RAM, 512GB SSD',
                'descricao' => 'Novo - ' . now()->format('d/m/Y'),
                'localidade_id' => 2,
                'user_id' => rand(1, 6), // Distribuição aleatória
                'status_id' => 2
            ],
            [
                'modelo' => 'Acer Aspire 5',
                'especificacoes' => 'Intel i3, 4GB RAM, 500GB HDD, 15.6" Full HD',
                'descricao' => 'Novo - ' . now()->format('d/m/Y'),
                'localidade_id' => 4,
                'user_id' => rand(1, 6), // Distribuição aleatória
                'status_id' => 5
            ],
            [
                'modelo' => 'Lenovo ThinkCentre M720q',
                'especificacoes' => 'Intel i5, 8GB RAM, 256GB SSD',
                'descricao' => 'Novo - ' . now()->format('d/m/Y'),
                'localidade_id' => 1,
                'user_id' => rand(1, 6), // Distribuição aleatória
                'status_id' => 9
            ],
        ]);
    }
}
