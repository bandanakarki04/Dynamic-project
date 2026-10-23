<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('problem_solution', function (Blueprint $table) {
            $table->foreignId('problem_id')
                ->constrained('problems')
                ->cascadeOnDelete();

            $table->foreignId('solution_id')
                ->constrained('solutions')
                ->cascadeOnDelete();

            $table->primary(['problem_id', 'solution_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('problem_solution');
    }
};