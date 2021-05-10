<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=1; $i<10; $i++){
      DB::table('levels')->insert([
            'quantity_row' => $i,
            'slug' => 'lvl-'.$i,
            ]);
          }
    }
}
