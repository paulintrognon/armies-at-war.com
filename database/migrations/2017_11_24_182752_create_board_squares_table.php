<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardSquaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boardSquares', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('boardId')->unsigned();
            $table->integer('x');
            $table->integer('y');
            $table->integer('terrainId')->unsigned();
            $table->integer('soldierId')->unsigned()->nullable();
            $table->longText('data')->nullable();
        });

        Schema::table('boardSquares', function (Blueprint $table) {
            $table->foreign('boardId', 'boardSquares_ibfk_1')->references('id')->on('boards')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('terrainId', 'boardSquares_ibfk_2')->references('id')->on('terrains')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('soldierId', 'boardSquares_ibfk_3')->references('id')->on('soldiers')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('boardSquares', function (Blueprint $table) {
              $table->dropForeign('boardSquares_ibfk_1');
              $table->dropForeign('boardSquares_ibfk_2');
              $table->dropForeign('boardSquares_ibfk_3');
          });

        Schema::dropIfExists('boardSquares');
    }
}
