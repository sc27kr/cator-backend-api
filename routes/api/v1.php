<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\AnswerController;
use App\Http\Controllers\Api\V1\QuestionController;
use App\Http\Controllers\Api\V1\AcceptAnswerController;

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
  Route::apiResource('/users', UserController::class)->only(['index']);
  Route::apiResource('/questions', QuestionController::class)->only(['store', 'update', 'destroy']);
  Route::apiResource('/questions/{question}/answers', AnswerController::class)->only(['store']);
  Route::apiResource('/answers', AnswerController::class)->only(['update', 'destroy']);
  Route::patch('/answers/{answer}/accept', AcceptAnswerController::class)->name('answers.accept');
});

Route::prefix('v1')->group(function () {
  Route::apiResource('/questions', QuestionController::class)->only(['index', 'show']);
});
