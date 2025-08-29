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
        Schema::create('moms', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('expectation');
            $table->string('discussions');
            $table->string('actionItems');
            $table->foreignId('meeting_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moms');
    }
};
