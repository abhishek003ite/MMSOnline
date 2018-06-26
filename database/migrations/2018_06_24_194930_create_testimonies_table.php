<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimoniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->text('msg');
            $table->enum('anon', ['true', 'false'])->default('false');
            $table->timestamp('date')->useCurrent();
            $table->integer('user_id');
            $table->integer('approval')->default(0);
            $table->text('file1')->nullable();
            $table->text('file2')->nullable();
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
        Schema::dropIfExists('testimonies');
    }
}
