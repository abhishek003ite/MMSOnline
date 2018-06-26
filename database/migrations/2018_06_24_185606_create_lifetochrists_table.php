<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLifetochristsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lifetochrists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname', 100);
            $table->string('lname', 100);
            $table->string('contact', 100);
            $table->string('email', 100);
            $table->timestamp('date')->useCurrent();
            $table->enum('status', ['Yet to follow up', 'Followed up'])->default('Yet to follow up');
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
        Schema::dropIfExists('lifetochrists');
    }
}
