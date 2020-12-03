<?php

use Illuminate\Database\Seeder;

class FirmaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('firmas')->insert([
            'firma_unvan' => 'Firma Adı',
            'firma_adres' => 'Firma Adresi',
            'firma_telefon' => 'Firma Telefonu',
            'firma_faks' => 'Firma Faksı',
            'firma_eposta' => 'Firma Epostası'
        ]);
    }
}
