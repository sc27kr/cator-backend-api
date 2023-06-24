<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\GuestShowQuestionResource;
use App\Http\Resources\GuestIndexQuestionResource;

class QuestionController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Question::class);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Question::paginate(9);
        return ['key' => GuestIndexQuestionResource::collection($data)->response()->getData(true)];
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
    public function store(QuestionRequest $request)
    {
        $question = $request->user()->questions()->create($request->validated());

        return QuestionResource::make($question);
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        return GuestShowQuestionResource::make($question);
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
    public function update(QuestionRequest $request, Question $question)
    {
        $question->update($request->validated());

        return QuestionResource::make($question);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        // $this->authorize('delete', $question);

        $question->delete();

        return response()->noContent();
    }
}
