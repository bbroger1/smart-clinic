<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::create(['genre' => 'Masculino']);
        Genre::create(['genre' => 'Feminino']);
        Genre::create(['genre' => 'Transgênero']);
        Genre::create(['genre' => 'Gênero Neutro']);
        Genre::create(['genre' => 'Não-binário']);
        Genre::create(['genre' => 'Agênero']);
    }
}
