<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('participants', function (Blueprint $table) {
            $table->dropColumn('name'); // Replace 'name' with the actual column name
        });
    }
    
    public function down()
    {
        Schema::table('participants', function (Blueprint $table) {
            $table->string('name'); // Replace with the appropriate column type and name
        });
    }
    };
