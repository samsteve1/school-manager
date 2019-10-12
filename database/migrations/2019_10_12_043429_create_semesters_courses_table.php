<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemestersCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semesters_courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('semester_id')->unsigned()->index();
            $table->bigInteger('course_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semesters_courses');
    }
}
