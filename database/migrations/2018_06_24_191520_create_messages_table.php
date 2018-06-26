<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('date')->useCurrent();
            $table->string('from', 20);
            $table->string('to', 20);
            $table->text('messages');
            $table->enum('notification', ['read', 'unread'])->default('unread');
            $table->enum('user1', ['true', 'false'])->default('false');
            $table->enum('user2', ['true', 'false'])->default('false');
            $table->text('attachements')->nullable();
            $table->integer('u1');
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
        Schema::dropIfExists('messages');
    }
}
