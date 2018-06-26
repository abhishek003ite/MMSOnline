<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lives', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('date')->useCurrent();
            $table->text('members');
            $table->string('title');
            $table->string('link', 535);
            $table->string('linkType', 100);
            $table->timestamp('schedule')->useCurrent();
            $table->enum('status', ['on', 'off'])->default('on');
            $table->float('expiryHours')->nullable();
            $table->float('expiryMinutes')->nullable();
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
        Schema::dropIfExists('lives');
    }
}
