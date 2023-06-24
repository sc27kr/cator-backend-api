<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\AnswerResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowQuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'title' => $this->title,
            'content' => Str::limit($this->content, 20),
            'created_at' => $this->created_at,
            'owner' => new UserResource($this->owner),
            'answers' => AnswerResource::collection($this->whenLoaded('answers'))
        ];
    }
}
