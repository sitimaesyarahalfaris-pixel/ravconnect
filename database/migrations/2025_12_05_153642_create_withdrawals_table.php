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
        Schema::create('withdrawals', function (Blueprint $table) {
        $table->id();
        $table->string('ref_id');
        $table->string('bank_code');
        $table->string('bank_name')->nullable();
        $table->string('account_number');
        $table->string('account_holder');
        $table->integer('amount');
        $table->integer('fee')->default(0);
        $table->integer('total_deducted'); // amount + fee
        $table->string('api_id')->nullable(); // ID dari API H2H
        $table->string('status')->default('pending'); // pending/success/failed
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdrawals');
    }
};
