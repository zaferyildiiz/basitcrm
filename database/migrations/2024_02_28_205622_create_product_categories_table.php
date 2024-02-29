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
        Schema::create('product_categories', function (Blueprint $table) {
            $table->bigIncrements("product_category_id");
            $table->string('category_name');
            $table->text('category_description')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('company_id');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('product_categories');
    }
};
