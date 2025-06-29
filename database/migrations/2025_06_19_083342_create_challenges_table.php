<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('athlete_name');
            $table->string('athlete_image')->nullable(); // URL or path to image
            $table->text('description');
            $table->enum('difficulty', ['Easy', 'Intermediate', 'Hard'])->default('Intermediate'); // Easy, Intermediate, Hard
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenges');
    }
};
