<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Answer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AcceptAnswerRequest;
use App\Http\Resources\ShowAnswerResource;

class AcceptAnswerController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function __invoke(AcceptAnswerRequest $request, Answer $answer)
    {

        $answer->is_accepted = $request->is_accepted;
        $answer->save();

        return ShowAnswerResource::make($answer);

    }
}
