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
        Schema::table('travelling_merchant_shops', function (Blueprint $table) {
            $table->string('slotAImg');
            $table->string('slotBImg');
            $table->string('slotCImg');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('travelling_merchant_shops', function (Blueprint $table) {
            $table->dropColumn('slotAImg');
            $table->dropColumn('slotBImg');
            $table->dropColumn('slotCImg');
        });
    }
};
