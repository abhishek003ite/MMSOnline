<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('phone', 50);
            $table->enum('emailSub', ['0', '1'])->default(0);
            $table->string('address', 535);
            $table->longText('msg');
            $table->string('first_resp');
            $table->string('second_resp');
            $table->float('per_week');
            $table->string('b_day', 535);
            $table->text('youtube');
            $table->text('instagram');
            $table->text('facebook');
            $table->text('twitter');
            $table->text('mainSite');
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
        Schema::dropIfExists('details');
    }
}
