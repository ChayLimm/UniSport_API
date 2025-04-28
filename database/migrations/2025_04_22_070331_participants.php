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
        Schema::create("participants", function (Blueprint $table) {            
            $table->bigIncrements("id");
            $table->string("name");
            $table->foreignId("race_id")->constrained()->cascadeOnDelete();
            $table->string("bib_number");
            $table->string("username");
            $table->integer("age");
            $table->enum("gender", ["male","female"]);
            $table->timestamp("registration_time")->useCurrent();
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
