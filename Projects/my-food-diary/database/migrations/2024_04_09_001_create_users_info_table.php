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
        Schema::create('users_info', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->text('avatar')->nullable();
            $table->string('status')->nullable();
            $table->text('goal')->nullable();
            $table->text('social1')->nullable();
            $table->text('social2')->nullable();
            $table->text('social3')->nullable();
            $table->text('social4')->nullable();
            $table->text('social5')->nullable();
            $table->string('pronouns')->nullable();
            $table->integer('age')->nullable();
            $table->string('job')->nullable();
            $table->string('favorite_food')->nullable();
            $table->string('least_favorite_food')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_info');
    }
};

