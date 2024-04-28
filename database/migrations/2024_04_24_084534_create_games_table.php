<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('games', function (Blueprint $table) {
        $table->id();
        $table->date('date');
        $table->string('location');
        $table->integer('score');
        $table->unsignedBigInteger('sport_id');
        $table->unsignedBigInteger('team1_id');
        $table->unsignedBigInteger('team2_id');
        $table->time('time');
        $table->timestamps();

    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
