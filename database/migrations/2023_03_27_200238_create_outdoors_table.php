<?php

use App\Enum\StatusEnum;
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
        Schema::create('outdoors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->foreignId('hotel_id')->constrained();
            $table->enum('status', [StatusEnum::ACTIVE->value, StatusEnum::DISABLED->value])->default(StatusEnum::ACTIVE->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outdoors');
    }
};
