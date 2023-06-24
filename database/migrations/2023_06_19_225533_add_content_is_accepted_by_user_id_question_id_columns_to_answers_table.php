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
        Schema::table('answers', function (Blueprint $table) {
            //
            $table->string('content');
            $table->boolean('is_accepted')->default(false);
            $table->foreignIdFor(
                \App\Models\User::class,
                'by_user_id'
            )->constrained('users');
            $table->foreignIdFor(
                \App\Models\Question::class,
                'question_id'
            )->constrained('questions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns('answers', [
            'content', 'is_accepted'
        ]);
    }
};
