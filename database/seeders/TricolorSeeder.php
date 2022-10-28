<?php

namespace Database\Seeders;

use App\Models\Tricolor;
use Illuminate\Database\Seeder;

class TricolorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tricolor::create(['red' => 0 , 'green' => 0, 'yellow' => 0]);
    }
}
