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
    Schema::create('visiting_instructors', function (Blueprint $table) {
        $table->unsignedBigInteger('instructor_id')->primary();
        $table->string('visiting_from');
        $table->date('contract_end');
        $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visiting_instructors');
    }
};
