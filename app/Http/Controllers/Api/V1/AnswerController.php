<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnswerRequest;
use App\Http\Resources\ShowAnswerResource;
use App\Http\Resources\ShowQuestionResource;

class AnswerController extends Controller
{

    // public function __construct()
    // {
    //     $this->authorizeResource(Answer::class);
    // }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Question $question, AnswerRequest $request)
    {
        $this->authorize('create', [Answer::class, $question]);

        $answer = Answer::make($request->validated());

        $question->answers()->save(
            $answer->owner()->associate($request->user())
        );

        # todo: change to have updated response
        return ShowAnswerResource::make($answer);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnswerRequest $request, Answer $answer)
    {

        $this->authorize('update', $answer);

        $answer->update($request->validated());

        return ShowAnswerResource::make($answer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        $this->authorize('delete', $answer);

        $answer->delete();

        return response()->noContent();
    }
}
