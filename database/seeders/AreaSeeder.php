<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create(['area' => 'Cardiologia']);
        Area::create(['area' => 'Dermatologia']);
        Area::create(['area' => 'Endocrinologia e metabologia']);
        Area::create(['area' => 'Geriatria']);
        Area::create(['area' => 'Nefrologia']);
        Area::create(['area' => 'Neurologia']);
        Area::create(['area' => 'Oftalmologia']);
        Area::create(['area' => 'Ortopedia e traumatologia']);
        Area::create(['area' => 'Psiquiatria']);
    }
}
