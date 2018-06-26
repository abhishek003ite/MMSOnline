<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('words', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('date_created')->useCurrent();
            $table->string('members');
            $table->string('preacher_name');
            $table->string('topic');
            $table->longText('message');
            $table->timestamp('later_date')->useCurrent();
            $table->timestamp('date_preached')->useCurrent();
            $table->tinyInteger('emailSent')->default(0);
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
        Schema::dropIfExists('words');
    }
}
