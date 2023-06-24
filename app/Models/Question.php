<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;

    protected $with = ['answers'];

    protected $fillable = [
        'title', 'content', 'question_type'
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

    public function answers(): HasMany
    {
        return $this->hasMany(
            Answer::class,
            'question_id'
        );
    }


}
