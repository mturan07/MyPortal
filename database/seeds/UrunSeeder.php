<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UrunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('uruns')->insert([
            'urunadi' => 'Elma',
            'grup_id' => 1,
            'birim_id' => 1,
            'birimfiyat' => 0,
            'cinsi' => 'Starking',
            'barkod' => '123456789',
            'sinif' => '1.Kalite'
        ]);
    }
}
