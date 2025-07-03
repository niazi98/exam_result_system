<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('results', function (Blueprint $table) {
            // Add exam_id as nullable
            $table->unsignedBigInteger('exam_id')->nullable()->after('course_id');
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');

            // Drop foreign keys before dropping unique index
            $table->dropForeign(['student_id']);
            $table->dropForeign(['course_id']);

            // Drop the old unique constraint
            $table->dropUnique(['student_id', 'course_id']);

            // Add new unique constraint including exam_id (but allow nulls)
            $table->unique(['student_id', 'course_id', 'exam_id'], 'results_student_course_exam_unique');

            // Re-add foreign keys
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('results', function (Blueprint $table) {
            $table->dropForeign(['exam_id']);
            $table->dropColumn('exam_id');

            // Drop and re-add foreign keys to allow unique constraint change
            $table->dropForeign(['student_id']);
            $table->dropForeign(['course_id']);

            // Restore the old unique constraint
            $table->unique(['student_id', 'course_id']);

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }
};
