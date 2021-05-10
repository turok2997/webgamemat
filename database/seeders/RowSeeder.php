<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('row_pattern')->insert([
                'pattern' => '\sum_{i=1}^{\infty} \frac{$cn+d}{$an+$b}',
                 'bl_a'=> -50,
                'tl_a'=> 50,
                'bl_b'=> -50,
                'tl_b'=> 50,
                'bl_c'=> -50,
                'tl_c'=> 50,
                'bl_d'=> 50,
                'tl_d'=> -50,
                'bl_e'=> 0,
                'tl_e'=> 0,
                'can0_a'=> 0,
                'can0_b'=> 1,
                'can0_c'=> 0,
                'can0_d'=> 1,
                'can0_e'=> 1,
                'convergence'=> 0,
            ]);
    }
}
