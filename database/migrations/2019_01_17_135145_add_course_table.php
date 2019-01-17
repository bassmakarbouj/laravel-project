<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('name');
            $table->string('time');
            $table->string('period');
            $table->string('target_age');
            $table->string('student_number');
            $table->string('lessons_number');
            $table->string('trainer_name');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            // $table->file('course_files');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('category_course')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course');
    }
}
