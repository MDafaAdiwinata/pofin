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
        Schema::create('log_backup_replikasi', function (Blueprint $table) {
            $table->id('id_log');
            $table->enum('jenis_aktivitas', ['backup', 'restore', 'replikasi']);
            $table->string('nama_file')->nullable();
            $table->string('lokasi_file')->nullable();
            $table->bigInteger('ukuran_file')->nullable()->comment('Ukuran dalam bytes');
            $table->enum('status', ['berhasil', 'gagal', 'proses']);
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('id_user')->nullable()->comment('User yang melakukan aktivitas');
            $table->timestamp('tanggal_aktivitas')->useCurrent();
            $table->timestamps();

            $table->foreign('id_user')
                ->references('id_user')
                ->on('users')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_backup_replikasi');
    }
};
