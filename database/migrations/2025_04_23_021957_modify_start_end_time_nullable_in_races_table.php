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
        Schema::table('races', function (Blueprint $table) {
            //
            $table->dateTime('start_time')->nullable()->change(); // Make start_time nullable
            $table->dateTime('end_time')->nullable()->change();
            $table->dateTime("updated_at")->nullable();  
            DB::statement('ALTER TABLE races RENAME COLUMN "createAt" TO created_at');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('races', function (Blueprint $table) {
            //
            $table->dateTime('start_time')->nullable(false)->change();
            $table->dateTime('end_time')->nullable(false)->change();
            $table->dropColumn('updated_at');
            
            DB::statement('ALTER TABLE races RENAME COLUMN created_at TO "createAt"');

        });
    }
};
