<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageReqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_reqs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('date')->useCurrent();
            $table->integer('user_id')->unsigned();
            $table->text('questions');
            $table->enum('status', ['accepted', 'rejected', 'pending'])->default('pending');
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
        Schema::dropIfExists('page_reqs');
    }
}
