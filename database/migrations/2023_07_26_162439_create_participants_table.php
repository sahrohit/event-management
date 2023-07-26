<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('country');
            $table->string('emergency_contact');
            $table->boolean('require_parking')->default(false);
            $table->enum('room_preference', ['single', 'shared', 'none'])->default('none');
            $table->enum('food_preference', ['vegetarian', 'vegan', 'none'])->default('none');
            $table->enum('id_type', ['citizenship', 'voter_id', 'passport'])->default('passport');
            $table->string('id_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};