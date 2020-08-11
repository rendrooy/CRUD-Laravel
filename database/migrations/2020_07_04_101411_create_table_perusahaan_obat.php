<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePerusahaanObat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaan_obat', function (Blueprint $table) {
            // Create tabel hobi_siswa
            $table->integer('id_obat')->unsigned()->index();
            $table->integer('id_perusahaan')->unsigned()->index();
            $table->timestamps();

            // Set PK
            $table->primary(['id_obat', 'id_perusahaan']);

            // Set FK hobi_siswa --- siswa
            $table->foreign('id_obat')
                  ->references('id')
                  ->on('obat')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            // Set FK hobi_siswa --- hobi
            $table->foreign('id_perusahaan')
                  ->references('id')
                  ->on('perusahaan')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perusahaan_obat');
    }
}
