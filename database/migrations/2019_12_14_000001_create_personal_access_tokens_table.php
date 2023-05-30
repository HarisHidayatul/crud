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
            $table->string('paket',255);
            $table->string('pagu',255);
            $table->string('pengadaan',255);
            $table->string('produk',255);
            $table->string('usaha',255);
            $table->string('metode',255);
            $table->string('pemilihan',255);
            $table->string('klpd',255);
            
            $table->string('satuan',255);
            $table->string('lokasi',255);
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
    }
};
