<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Produtos;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $faker = Factory::create();

        foreach (range(1, 20) as $i) {
            Produtos::create([
                'nome' => $faker->word,
                'preco' => $faker->randomFloat(2, 10, 1000),
                'imagem' => $faker->imageUrl(400, 300, 'products', true),
                'descricao' => $faker->sentence(10),

                'user_id' => User::inRandomOrder()->first()->id,
                'categoria_id' => Categoria::inRandomOrder()->first()->id,
            ]);
        }
    }
}
