<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('registrations', function (Blueprint $table) {
        $table->id();
        $table->string('nama_lengkap');
        $table->string('nik')->unique();
        $table->string('kk')->nullable();
        $table->date('tanggal_lahir');
        $table->enum('jenis_kelamin', ['L', 'P']);
        $table->string('no_telepon');
        $table->string('kategori_peserta');
        $table->text('alamat');
        $table->string('rt_rw');
        $table->string('kelurahan');
        $table->string('kecamatan');
        $table->string('kota');
        $table->string('golongan_darah')->nullable();
        $table->string('alergi')->nullable();
        $table->float('berat_badan')->nullable();
        $table->float('tinggi_badan')->nullable();
        $table->string('nama_kontak_darurat');
        $table->string('no_telepon_darurat');
        $table->string('hubungan_kontak');
        $table->boolean('persetujuan');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
