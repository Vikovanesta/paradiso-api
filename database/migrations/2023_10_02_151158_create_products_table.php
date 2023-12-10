    
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
            $table->foreignId('city_id')->nullable()->constrained();
            $table->foreignId('district_id')->constrained();
            $table->string('name');
            $table->text('description')->nullable()->default('No description');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('price');
            $table->string('price_unit')->comment('pack, night, hour, etc');
            $table->integer('stock')->default(0);
            $table->integer('discount')->default(0);
            $table->string('thumbnail')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('address');
            $table->string('coordinate');
            $table->text('note')->nullable();
            $table->boolean('is_published')->default(false);
            $table->softDeletes();
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
