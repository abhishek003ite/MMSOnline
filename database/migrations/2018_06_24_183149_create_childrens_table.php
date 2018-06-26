<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildrensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('childrens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned();
            $table->string('fname', 100);
            $table->string('lname', 100);
            $table->integer('month');
            $table->integer('day');
            $table->integer('age_group');
            $table->string('email', 100);
            $table->string('mobile', 50);
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->enum('relation', ['child', 'grand'])->default('child');
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
        Schema::dropIfExists('childrens');
    }
}
