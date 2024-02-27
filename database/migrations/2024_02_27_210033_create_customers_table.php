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
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('customer_id');
            $table->string('customer_name');
            $table->string('customer_type');
            $table->string('city');
            $table->string('district');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('tax_no')->nullable();
            $table->string("tax_office")->nullable();
            $table->string('contact_person_name');
            $table->string('contact_person_email');
            $table->string('contact_person_phone');
            $table->string('activity_area');
            $table->string('customer_note');
            $table->integer('company_id');
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
        Schema::dropIfExists('customers');
    }
};
