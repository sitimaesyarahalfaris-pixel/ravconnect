<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->text('content'); // QR/link/text
            $table->string('type')->nullable(); // type of stock (QR, link, code)
            $table->integer('stock')->default(0); // Add stock column for compatibility with seeder
            $table->string('sku')->nullable();
            $table->enum('status', ['available', 'used'])->default('available');
            $table->string('iccid')->nullable();
            $table->string('activation_code')->nullable();
            $table->string('smdp_plus')->nullable();
            $table->string('qr_image_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_stocks');
    }
};
