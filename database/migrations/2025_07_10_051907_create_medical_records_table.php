<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id')->constrained('registrations')->onDelete('cascade');
            $table->date('tanggal_kunjungan');

            // Data layanan
            $table->float('berat_badan')->nullable();  // dalam kg
            $table->float('tinggi_badan')->nullable(); // dalam cm
            $table->string('imunisasi')->nullable();   // BCG, DPT, dsb
            $table->string('vitamin')->nullable();     // A, C, dsb
            $table->text('catatan_kesehatan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_records');
    }
};
