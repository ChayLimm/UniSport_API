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
        Schema::create("checkpoints", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->foreignId("segment_id")->constrained()->cascadeOnDelete();
            $table->foreignId("participant_id")->constrained()->cascadeOnDelete();
            $table->timestamp("checkpoint_time")->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
