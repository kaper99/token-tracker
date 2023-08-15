<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('token_id')->references('id')->on('tokens');
            $table->foreignId('vault_id')->references('id')->on('vaults');
            $table->decimal('purchase_price',17,10);
            $table->timestamp('bought_at')->default(now());
            $table->decimal('quantity', 17, 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
