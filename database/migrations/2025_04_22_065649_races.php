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
       Schema::create("races", function (Blueprint $table) { 
        $table->bigIncrements("id");
        $table->string("name");
        $table->string("description");
        $table->timestamp("start_time");
        $table->timestamp("end_time");
        $table->enum("status", ["pending","inProgress","completed"]);
        $table->timestamp("createAt")->useCurrent();
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
