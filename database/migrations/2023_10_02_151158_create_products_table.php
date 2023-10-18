
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
            $table->foreignId('merchant_id')->nullable();
            $table->foreignId('user_id')->nullable();   // admin_id
            $table->foreignId('product_sub_category_id');
            $table->tinyInteger('product_status_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->string('name');
            $table->text('description');
            $table->integer('duration');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('price');
            $table->string('unit');
            $table->integer('discount')->nullable();
            $table->string('thumbnail');
            $table->string('address');
            $table->string('coordinate');
            $table->integer('max_person');
            $table->integer('min_person');
            $table->text('note');
            $table->boolean('is_published');
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
