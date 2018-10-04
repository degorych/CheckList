<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_items', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('check_list_id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->boolean('is_done')->default(0);
            $table->integer('order');
            $table->timestamps();

            $table->foreign('check_list_id')->references('id')->on('check_lists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_items');
    }
}
