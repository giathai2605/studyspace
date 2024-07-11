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
            $table->integer('reffered_by')->nullable();
            $table->string('username', 55)->unique();
            $table->string('email', 255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone', 11); // register
            $table->string('lastName', 255); // register
            $table->string('firstName', 255); // register
            $table->string('avatar', 255)->default('storage/users/default.png');
            $table->string('password', 255);
            $table->date('birthday')->nullable();
            $table->integer('gender'); // register
            $table->integer('roleID')->nullable(); // register default 3
            $table->string('address', 255); // register default Vietnam
            $table->string('refferalCode', 255)->nullable();
            $table->integer('userStatusID')->nullable();
            $table->date('lastLogin')->nullable();
            $table->string('description', 255)->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
