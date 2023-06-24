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
        Schema::table('questions', function (Blueprint $table) {
            //
            $table->string('title');
            $table->string('content');
            $table->tinyText('question_type');
            $table->foreignIdFor(
                \App\Models\User::class,
                'by_user_id'
            )->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns('questions', [
            'title', 'content', 'question_type'
        ]);
    }
};
