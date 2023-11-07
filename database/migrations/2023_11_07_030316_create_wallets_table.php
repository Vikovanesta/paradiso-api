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
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchant_id')->constrained();
            $table->foreignId('user_id')->comment('admin user_id')->constrained();
            $table->foreignId('transaction_id')->constrained();
            $table->foreignId('wallet_status_id')->constrained();
            $table->integer('nominal');
            $table->boolean('type')->comment('0=in, 1=out');
            $table->string('image')->comment('bukti transfer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallets');
    }
};
