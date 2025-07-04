<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create();

        foreach (range(1, 5) as $i) {
            Categoria::create([
                'nome' => $faker->word,
                'descricao' => $faker->word,
            ]);
        }

    }
}
