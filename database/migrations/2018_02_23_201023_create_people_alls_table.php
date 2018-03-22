<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\MySqlBuilder;

class CreatePeopleAllsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_alls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->string('position', 150)->nullable();
            $table->text('text', 255)->nullable();
            $table->string('images', 100)->nullable();
            $table->timestamps();
            // For Route
             $table->integer('page_id')->nullable()->unsigned();
             $table->foreign('page_id')->references('id')->on('pages1');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropforeign(['page_id']);//ce virno?
        Schema::dropIfExists('people_alls');
    }
}
