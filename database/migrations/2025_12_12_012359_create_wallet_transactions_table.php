<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wallet_transactions', function (Blueprint $table) {
            $table->id();
            
            // Jika user dihapus, histori topup ikut hilang (aman)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // VA code unik untuk topup
            $table->string('va_number')->unique();
            
            // amount bisa besar → pakai bigInteger
            $table->bigInteger('amount');
            
            // pending = user belum bayar
            // paid = VA dibayar
            $table->enum('status', ['pending', 'paid'])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wallet_transactions');
    }
};