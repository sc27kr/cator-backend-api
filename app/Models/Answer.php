<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;

    protected $attributes = [
        'is_accepted' => 0
    ];

// protected $with = ['question'];

    protected $fillable = [
        'content', 'is_accepted',
    ];

    protected $sortable = [
        'created_at'
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            \App\Models\User::class,
            'by_user_id'
        );
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(
            \App\Models\Question::class,
            'question_id'
        );
    }

}
