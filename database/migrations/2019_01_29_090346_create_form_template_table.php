<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('form_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->string('student_name');
            $table->string('studing_year')->nullable();
            $table->string('class')->nullable();
            $table->string('category')->nullable();
            $table->string('group')->nullable();
            $table->string('facebook_link')->nullable();
            $table->boolean('accepted')->default(0);
            $table->string('email')->unique()->nullable();
            $table->timestamps();


            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_templates');
    }
}
