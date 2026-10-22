<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sf_case_records', function (Blueprint $table) {
            $table->id();

            $table->string('client_name');          // who the case is for
            $table->text('notes')->nullable();      // consultant's notes

            // Needs the problems and solutions tables (made by B and C)
            // to exist already, so this file must have a LATER timestamp.
            $table->foreignId('problem_id')->constrained('sf_problems')->cascadeOnDelete();
            $table->foreignId('solution_id')->constrained('sf_solutions')->cascadeOnDelete();

            // Exactly ONE KPI per case: a single foreign key, not a pivot table.
            // restrictOnDelete = a KPI that is used in a case cannot be deleted.
            $table->foreignId('kpi_id')->constrained('sf_kpis')->restrictOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sf_case_records');
    }
};
