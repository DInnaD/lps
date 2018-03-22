<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\MySqlBuilder;

class CreatePortfolioAllsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_alls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200)->nullable();
            $table->string('filter', 100)->nullable();
            $table->string('images', 100)->nullable();
            
            $table->string('link', 255)->nullable();
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
        Schem::dropIfExists('portfolio_alls');
    }
}
