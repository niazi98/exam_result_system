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
    Schema::create('permanent_instructors', function (Blueprint $table) {
        $table->unsignedBigInteger('instructor_id')->primary();
        $table->string('office_room');
        $table->string('tenure_status');
        $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permanent_instructors');
    }
};
