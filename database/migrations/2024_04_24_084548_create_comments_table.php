<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('comments', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');  // Assuming you have users
        $table->text('body');
        $table->unsignedBigInteger('commentable_id');
        $table->string('commentable_type');
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  // Optional: Foreign key constraint
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_user_id_foreign');  // Drop the foreign key constraint
            $table->dropColumn('user_id');                       // Remove the user_id column
        });
    }
}
