<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
public function up()
{
    Schema::create('exams', function (Blueprint $table) {
        $table->id(); // Primary key
        $table->string('title');
        $table->date('exam_date');
        $table->unsignedBigInteger('course_id'); // Foreign key column
        $table->timestamps();

        // Foreign key constraint
        $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
    });
}



    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
