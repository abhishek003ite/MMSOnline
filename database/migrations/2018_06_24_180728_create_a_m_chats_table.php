<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAMChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_m_chats', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('date')->useCurrent();
            $table->integer('from');
            $table->integer('to');
            $table->text('message');
            $table->integer('admin')->unsigned();
            $table->enum('notification', ['read', 'unread'])->default('unread');
            $table->string('attachment');
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
        Schema::dropIfExists('a_m_chats');
    }
}
