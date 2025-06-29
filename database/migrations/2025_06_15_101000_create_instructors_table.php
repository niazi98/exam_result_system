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
    Schema::create('instructors', function (Blueprint $table) {
        $table->id(); // ✅ this is unsigned BIGINT and works with foreign keys
        $table->string('name');
        $table->string('email')->unique();
        
        $table->string('department');
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
