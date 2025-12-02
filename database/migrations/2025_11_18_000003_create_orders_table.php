<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('whatsapp')->nullable();
            $table->string('reff_id')->nullable();
            $table->string('deposit_id')->nullable();
            $table->unsignedBigInteger('esim_stock_id')->nullable();
            $table->enum('status', ['pending', 'paid', 'expired', 'failed'])->default('pending');
            $table->enum('delivery_status', ['pending', 'delivered', 'manual'])->default('pending');
            $table->unsignedBigInteger('total')->default(0);
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();
            $table->foreign('esim_stock_id')->references('id')->on('product_stocks')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
