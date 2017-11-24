<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoldiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soldiers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId')->unsigned();
            $table->integer('armyId')->unsigned();
            $table->string('firstName', 20);
            $table->string('lastName', 20);
            $table->string('gender', 10);
            $table->integer('healthPoints');
            $table->integer('actionPoints');
            $table->integer('coordinateX')->nullable();
            $table->integer('coordinateY')->nullable();
            $table->integer('sight');
            $table->dateTime('lastTurn');
            $table->dateTime('nextTurn');
            $table->integer('kills')->default(0);
            $table->integer('deaths')->default(0);
            $table->timestamps();
        });

        Schema::table('soldiers', function (Blueprint $table) {
            $table->foreign('userId', 'soldiers_ibfk_1')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('armyId', 'soldiers_ibfk_2')->references('id')->on('armies')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('soldiers', function (Blueprint $table) {
            $table->dropForeign('soldiers_ibfk_1');
            $table->dropForeign('soldiers_ibfk_2');
        });

        Schema::dropIfExists('soldiers');
    }
}
