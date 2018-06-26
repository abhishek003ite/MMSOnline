<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeepersNetworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keepers_networks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('senderId');
            $table->string('absenteeName');
            $table->string('absenceDescription');
            $table->string('absenceDescriptionOther');
            $table->string('absenteeContactNo', 50);
            $table->string('absenteeEmail');
            $table->date('dateLastSeen');
            $table->text('comment');
            $table->text('firstFollowUp');
            $table->integer('firstFollowUpAdmin');
            $table->text('secondFollowUp');
            $table->integer('secondFollowUpAdmin');
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
        Schema::dropIfExists('keepers_networks');
    }
}
