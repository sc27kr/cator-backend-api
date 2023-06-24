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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->tinyText('breed');
            $table->unsignedTinyInteger('age');
            $table->tinyText('color');
            $table->boolean('is_mentor')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('users', function (Blueprint $table) {
        //     //
        // });
        Schema::dropColumns('users', [
            'breed', 'age', 'color', 'is_mentor'
        ]);
    }
};
