<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableFirma extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firmas', function (Blueprint $table) {
            $table->id();
            $table->string('firma_unvan', 150)->nullable()->default('text');
            $table->string('firma_adres', 255)->nullable()->default('text');
            $table->string('firma_telefon', 20)->nullable()->default('text');
            $table->string('firma_faks', 20)->nullable()->default('text');
            $table->string('firma_eposta', 50)->nullable()->default('text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('firmas');
    }
}
