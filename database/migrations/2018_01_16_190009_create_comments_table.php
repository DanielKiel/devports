<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->integer('status');
            $table->bigInteger('commentable_id')->unsigned();
            $table->string('commentable_type');
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->longText('content');

            $table->index('status');
            $table->index('commentable_type');
            $table->index('commentable_id');
            $table->index(['commentable_type', 'commentable_id']);

            $table->foreign('user_id')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function(Blueprint $table) {
            $table->dropForeign('comments_user_id_foreign');
        });

        Schema::dropIfExists('comments');
    }
}
