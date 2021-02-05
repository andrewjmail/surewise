<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavigationCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigation_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('colour');
            $table->integer('order');
            $table->bigInteger('navigation_id')->unsigned();

            $table->foreign('navigation_id')->references('id')->on('navigations')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('navigation_categories');
    }
}
