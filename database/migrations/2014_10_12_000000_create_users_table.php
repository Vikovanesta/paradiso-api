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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_level_id')->nullable();
            $table->string('name');
            $table->integer('user_level')->nullable()->default(2);  //2 = customer
            $table->string('email')->unique();
            $table->boolean('is_email_verified');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone', 15)->unique();
            $table->string('password');
            $table->tinyInteger('status');
            $table->string('user_uid')->unique()->nullable();
            $table->string('api_token')->unique()->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
