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
        Schema::create('certificate_data_positions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('certificate_template_id')->constrained();
            $table->string('name');
            $table->string('x_position');
            $table->string('y_position');
            $table->string('font_size');
            $table->string('font_color');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_data_positions');
    }
};
