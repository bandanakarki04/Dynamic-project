<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sf_kpis', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();      // e.g. sales growth
            $table->text('description')->nullable(); // how it is measured
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sf_kpis');
    }
};
