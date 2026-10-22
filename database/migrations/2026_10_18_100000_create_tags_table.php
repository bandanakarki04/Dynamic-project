<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // No "sf_" here: Laravel adds the prefix automatically.
        Schema::create('sf_tags', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // e.g. B2B, free, scalable
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sf_tags');
    }
};
