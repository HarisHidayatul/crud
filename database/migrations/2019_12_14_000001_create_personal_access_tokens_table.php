<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });

        Schema::create('paket_nasional', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_paket')->unique();
            $table->tinyInteger('idBulan');
            $table->unsignedBigInteger('pagu');
            $table->string('satuanKerja');
            $table->string('isPDN');
            $table->string('lokasi');
            $table->unsignedBigInteger('idlokasi');
            $table->string('idKldi');
            $table->string('metode');
            $table->string('kldi');
            $table->string('isUMK');
            $table->unsignedBigInteger('id_referensi');
            $table->string('jenisPengadaan');
            $table->string('pemilihan');
            $table->unsignedBigInteger('idMetode');
            $table->unsignedBigInteger('idJenisPengadaan');
            $table->string('paket');
            $table->timestamps();
        });

        Schema::create('last_update_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('start_data');
            $table->unsignedBigInteger('end_data');
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
        Schema::dropIfExists('personal_access_tokens');
        Schema::dropIfExists('paket_nasional');
        Schema::dropIfExists('last_update_data');
    }
};
