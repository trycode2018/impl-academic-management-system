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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // ex: "10ª A - Informática"
            $table->foreignId('course_id')->constrained('courses')->onDelete('restrict');
            $table->foreignId('school_class_id')->constrained('school_classes')->onDelete('restrict');
            $table->year('year'); // ano lectivo
            $table->integer('max_students')->default(30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
