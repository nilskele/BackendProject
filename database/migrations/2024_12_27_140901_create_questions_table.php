<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key
            $table->string('user_name'); // Name of the user submitting the question
            $table->string('email'); // Email of the user submitting the question
            $table->text('question'); // The question text
            $table->text('answer')->nullable(); // The admin's answer (nullable)
            $table->boolean('is_answered')->default(false); // Whether the question is answered
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Foreign key to categories table
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
}
