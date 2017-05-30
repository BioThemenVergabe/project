<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkgroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workgroups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('groupLeader');
            $table->integer('spots');
            /*
             * Datenformat von Spalte 'date' noch in Klärung
             */
            $table->string('date');
            $table->timestamps();
        });


        DB::statement('ALTER TABLE `users` ADD CONSTRAINT `users_workgroups_foreign` foreign key (`zugewiesen`) references `workgroups` (`id`)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE `users` DROP FOREIGN KEY `users_workgroups_foreign`');
        Schema::dropIfExists('workgroups');
    }
}
