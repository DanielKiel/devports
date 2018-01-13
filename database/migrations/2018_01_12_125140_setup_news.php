<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetupNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();

            $table->integer('status');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('teaser');
            $table->longText('content');

            $table->index('status');
            $table->index('title');

            $table->timestamps();
        });

        Schema::table('news', function(Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function(Blueprint $table) {
            $table->dropForeign('news_user_id_foreign');
        });

        Schema::dropIfExists('news');
    }
}
