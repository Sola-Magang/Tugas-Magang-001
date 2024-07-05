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
        Schema::create('profile_data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('pos_id')->constrained(
                table: 'categories',
                indexName: 'i_pos_id'
            );
            $table->string('slug')->unique();
            $table->string('place_birth');
            $table->datetime('date_birth');
            $table->string('school');
            $table->text('information');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_data');
    }
};
