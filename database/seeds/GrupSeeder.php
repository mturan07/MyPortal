<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grups')->insert(['grupadi' => 'Meyve']);
        DB::table('grups')->insert(['grupadi' => 'Sebze']);
        DB::table('grups')->insert(['grupadi' => 'Yeşillik']);
    }
}
