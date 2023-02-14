<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QueryStatus;

class QueryStatusSeeder extends Seeder
{
    public function run()
    {
        QueryStatus::create(['title' => 'new']);
        QueryStatus::create(['title' => 'confirm']);
        QueryStatus::create(['title' => 'canceled']);
    }
}
