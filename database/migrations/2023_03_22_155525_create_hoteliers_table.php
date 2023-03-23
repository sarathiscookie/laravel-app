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
        Schema::create('hoteliers', function (Blueprint $table) {
            $table->id();
            $table->ulid('hoteliers_ulid');
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('contact_number', 25);
            $table->text('address');
            $table->enum('status', ['active', 'disabled']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoteliers');
    }
};
