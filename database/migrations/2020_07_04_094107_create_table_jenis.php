<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableJenis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_jenis', 20);
            $table->timestamps();
        });

        // Set FK di kolom is_kelas di tabel siswa.
        Schema::table('obat', function (Blueprint $table) {
            $table->foreign('id_jenis')
                  ->references('id')
                  ->on('jenis')
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
        // Drop FK di kolom id_kelas di tabel siswa
        Schema::table('obat', function (Blueprint $table) {
            $table->dropForeign('obat_id_jenis_foreign');
        });

        Schema::dropIfExists('jenis');
    }
}
