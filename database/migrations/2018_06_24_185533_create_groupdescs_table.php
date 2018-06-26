<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupdescsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupdescs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group');
            $table->integer('user_id');
            $table->text('desc');
            $table->timestamp('date')->useCurrent();
            $table->text('attachments');
            $table->text('falseusers');
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
        Schema::dropIfExists('groupdescs');
    }
}
