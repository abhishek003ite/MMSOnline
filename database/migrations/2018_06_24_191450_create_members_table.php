<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent');
            $table->enum('title', ['Mr','Mrs','Mis','Bishop','Pastor','Prophet','Prophetess','Reverend','Deacon','Deaconess','Dr','Professor'])->nullable();
            $table->text('username');
            $table->string('lname');
            $table->string('fname');
            $table->enum('gender', ['male', 'female', 'select your gender'])->default('select your gender');
            $table->integer('birth_month');
            $table->integer('birth_date');
            $table->integer('member_since_month');
            $table->integer('member_since_year');
            $table->integer('age_group');
            $table->string('employement', 100);
            $table->string('maritalStatus');
            $table->text('career');
            $table->text('biography');
            $table->string('nativeCountry', 50);
            $table->string('hobbies', 50);
            $table->string('address', 535);
            $table->string('address2', 535);
            $table->string('county', 50);
            $table->string('town', 50);
            $table->string('postalCode', 50);
            $table->string('country', 50);
            $table->string('mobile', 50)->unique();
            $table->string('email', 150)->unique();
            $table->string('password', 100);
            $table->string('image');
            $table->string('homeNo', 50);
            $table->text('grandChild');
            $table->text('child');
            $table->string('businessGroup', 50);
            $table->string('churchGroup', 50);
            $table->timestamp('dOfJoining')->useCurrent();
            $table->enum('first_time', ['yes', 'no'])->default('no');
            $table->timestamp('lasttime')->useCurrent();
            $table->integer('count');
            $table->enum('visiblity', ['online', 'offline'])->default('online');
            $table->string('quote');
            $table->enum('status', ['active', 'suspend'])->default('active');
            $table->integer('brest')->default(0);
            $table->enum('permanentDelete', ['0', '1'])->default(0);
            $table->enum('emailSub', ['0', '1'])->default(0);
            $table->enum('registrationEmail', ['0', '1'])->default(0);
            $table->tinyInteger('giftAid')->default(0);
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
        Schema::dropIfExists('members');
    }
}
