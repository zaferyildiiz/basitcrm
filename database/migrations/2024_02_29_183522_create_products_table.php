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
            $table->bigIncrements('product_id');
            $table->integer('product_category_id');
            $table->integer('product_brand_id');
            $table->string('product_name');
            $table->decimal('product_old_price',10,2);
            $table->decimal('product_price',10,2);
            $table->decimal('buying_price',10,2);
            $table->text('description');
            $table->string('product_code');
            $table->integer('company_id');
            $table->integer('stock_quantity');
            $table->string('stock_type');
            $table->smallInteger('stock_alert_level');
            $table->tinyInteger('status');
            $table->string('image_json')->nullable();
            $table->tinyInteger('is_installment');
            $table->integer('max_installment_number')->nullable();
            $table->datetime("created_at");
            $table->datetime("updated_at");
            $table->datetime("deleted_at")->nullable();
            $table->integer("created_by");
            $table->integer("updated_by");
            $table->integer("deleted_by")->nullable();
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
