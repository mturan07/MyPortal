<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKayitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kayits', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('urun_id')->unsigned();
            // $table->bigInteger('grup_id')->unsigned();
            $table->bigInteger('birim_id')->unsigned();

            $table->float('birimfiyat')->nullable()->default(0);
            $table->float('netagirlik')->nullable()->default(0);
            $table->float('tutar')->nullable()->default(0);
            // $table->string('cinsi', 100)->nullable()->default('');
            // $table->string('barkod', 100)->nullable()->default('');
            // $table->string('sinif', 100)->nullable()->default('');
            $table->boolean('onayli')->nullable()->default(false);

            $table->bigInteger('created_user_id')->nullable()->unsigned();
            $table->bigInteger('updated_user_id')->nullable()->unsigned();

            $table->timestamps();

            $table->foreign('urun_id')
            ->references('id')
            ->on('uruns')
            ->onDelete('cascade');
            
            // $table->foreign('grup_id')
            //     ->references('id')
            //     ->on('grup')
            //     ->onDelete('cascade');

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
        Schema::dropIfExists('kayits');
    }
}
