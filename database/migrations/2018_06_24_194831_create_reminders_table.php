<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminders', function (Blueprint $table) {
            $table->increments('id');
            $table->text('desc');
            $table->date('date');
            $table->enum('status', ['active', 'deactive'])->default('active');
            $table->integer('user_id')->unsigned();
            $table->string('start', 100);
            $table->string('end', 100);
            $table->string('link');
            $table->string('image');
            $table->string('eventDesc');
            $table->string('reminder_event');
            $table->enum('isReminded', ['0', '1'])->default('0');
            $table->enum('reminded', ['0', '1'])->default('0');
            $table->integer('adminId');
            $table->enum('isDeleted', ['0', '1'])->default('0');
            $table->integer('isRead');
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
        Schema::dropIfExists('reminders');
    }
}
