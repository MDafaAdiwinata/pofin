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
        Schema::create('simulations', function (Blueprint $table) {
            $table->id('id_simulasi'); // PK, AI

            // Foreign Key
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_bank');

            // Data simulasi
            $table->decimal('nominal_deposito', 15, 2);
            $table->integer('jangka_waktu_bulan');
            $table->decimal('bunga_diterima', 15, 2);
            $table->decimal('total_akhir', 15, 2);
            $table->dateTime('waktu_simulasi');

            $table->timestamps();

            // Relasi FK
            $table->foreign('id_user')
                ->references('id_user')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('id_bank')
                ->references('id_bank')
                ->on('banks')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simulations');
    }
};
