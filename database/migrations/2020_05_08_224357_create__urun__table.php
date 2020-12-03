<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uruns', function (Blueprint $table) {
            $table->id();
            $table->string('urunadi', 100)->nullable()->default('');
            $table->bigInteger('grup_id')->unsigned();
            $table->bigInteger('birim_id')->unsigned();
            $table->double('birimfiyat', 10, 2)->nullable()->default(0);
            $table->string('cinsi', 100)->nullable()->default('');
            $table->string('barkod', 100)->nullable()->default('');
            $table->string('sinif', 100)->nullable()->default('');

            $table->timestamps();
            
            $table->foreign('grup_id')
                ->references('id')
                ->on('grups')
                ->onDelete('cascade');

            $table->foreign('birim_id')
                ->references('id')
                ->on('birims')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uruns');
    }
}
