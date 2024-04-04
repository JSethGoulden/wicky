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
        Schema::create('travelling_merchant_shops', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('slotA');
            $table->string('slotB');
            $table->string('slotC');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travelling_merchant_shops');
    }
};
