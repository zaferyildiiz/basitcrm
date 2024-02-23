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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('surname');
            $table->string('username');
            $table->string('birth_date');
            $table->string('gender');
            $table->string('address')->nullable();
            $table->string('city');
            $table->string('district');
            $table->string('notes');
            $table->datetime('last_login_date')->nullable();
            $table->integer('role_id');
            $table->integer('status');
            $table->integer('company_id');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
};
