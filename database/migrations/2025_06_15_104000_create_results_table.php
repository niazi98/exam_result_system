<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
 public function up(): void
{
    Schema::create('results', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('student_id');
        $table->unsignedBigInteger('course_id');
        $table->string('grade'); // Only grade, no marks
        $table->timestamps();
        $table->unique(['student_id', 'course_id']);


        // Foreign keys
        $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
    });
}



    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
