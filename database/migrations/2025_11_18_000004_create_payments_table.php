<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->string('method');
            $table->decimal('amount', 12, 2);
            $table->enum('status', ['pending', 'paid', 'failed', 'expired'])->default('pending');
            $table->string('payment_url')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('qr_image')->nullable();
            $table->string('qr_string')->nullable();
            $table->string('bank')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('atas_nama')->nullable();
            $table->string('nomor_va')->nullable();
            $table->string('tambahan')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
