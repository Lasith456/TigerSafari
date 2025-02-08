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
            $table->string('name')->nullable()->unique()->change();
            $table->text('description')->nullable()->change();
            $table->decimal('price', 10, 2)->nullable()->change();
            $table->date('date')->nullable()->change();
            $table->string('pickup_location', 255)->nullable()->change();
            $table->string('dropoff_location', 255)->nullable()->change();
            $table->string('contact_number', 20)->nullable()->change();
            $table->string('car_number', 50)->nullable()->change();
            $table->string('jeep_number', 50)->nullable()->change();
            $table->time('pickup_time')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('safaris', function (Blueprint $table) {
            $table->string('name')->nullable(false)->unique()->change();
            $table->text('description')->nullable(false)->change();
            $table->decimal('price', 10, 2)->nullable(false)->change();
            $table->date('date')->nullable(false)->change();
            $table->string('pickup_location', 255)->nullable(false)->change();
            $table->string('dropoff_location', 255)->nullable(false)->change();
            $table->string('contact_number', 20)->nullable(false)->change();
            $table->string('car_number', 50)->nullable(false)->change();
            $table->string('jeep_number', 50)->nullable(false)->change();
            $table->time('pickup_time')->nullable(false)->change();
        });
    }
};
