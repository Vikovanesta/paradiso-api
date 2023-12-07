    
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchant_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained();   // admin_id
            $table->foreignId('product_sub_category_id')->constrained();
            $table->foreignId('product_status_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->string('name');
            $table->text('description')->nullable()->default('No description');
            $table->integer('duration');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('price');
            $table->string('unit');
            $table->integer('stock')->nullable()->default(0);
            $table->integer('discount')->nullable()->default(0);
            $table->string('thumbnail')->nullable();
            $table->string('address');
            $table->string('coordinate');
            $table->integer('max_person')->nullable();
            $table->integer('min_person')->nullable();
            $table->text('note')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
