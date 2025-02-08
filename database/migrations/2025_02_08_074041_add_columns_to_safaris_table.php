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
        Schema::table('safaris', function (Blueprint $table) {
            $table->string('pickup_location')->after('date');
            $table->string('dropoff_location')->after('pickup_location');
            $table->string('contact_number')->after('dropoff_location');
            $table->string('car_number')->after('contact_number');
            $table->string('jeep_number')->after('car_number');
            $table->time('pickup_time')->after('jeep_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('safaris', function (Blueprint $table) {
            $table->dropColumn([
                'pickup_location',
                'dropoff_location',
                'contact_number',
                'car_number',
                'jeep_number',
                'pickup_time'
            ]);
        });
    }
};
