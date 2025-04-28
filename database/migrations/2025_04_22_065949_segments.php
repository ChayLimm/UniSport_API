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
       Schema::create("segments", function (Blueprint $table) { 
        $table->bigIncrements("id");
        $table->foreignId("race_id")->constrained('races')->onDelete('cascade');
        $table->string('name');
        $table->int('orderNumber');
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
