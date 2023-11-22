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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('voucher_type_id')->constrained();
            $table->foreignId('merchant_id')->constrained();
            $table->string('name');
            $table->string('code');
            $table->integer('nominal');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('min_transaction');
            $table->integer('max_discount');
            $table->integer('quota');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
