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
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('contact_id');
            $table->string('contact_name');
            $table->string('contact_surname');
            $table->string('contact_email');
            $table->integer('company_id');
            $table->string('contact_phone');
            $table->integer('customer_id');
            $table->string('position');
            $table->string('city');
            $table->string('district');
            $table->string('customer_note');
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
        Schema::dropIfExists('contacts');
    }
};
