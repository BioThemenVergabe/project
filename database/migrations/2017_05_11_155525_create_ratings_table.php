<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->integer('user')->unsigned();
            $table->integer('workgroup')->unsigned();
            $table->integer('rating');
            $table->timestamps();

            $table->foreign('user')->references('id')->on('users');
            $table->foreign('workgroup')->references('id')->on('workgroups');

            $table->primary(['user','workgroup']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('ratings');
        Schema::enableForeignKeyConstraints();

    }
}
