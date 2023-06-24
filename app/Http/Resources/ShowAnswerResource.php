<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowAnswerResource extends JsonResource
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
            'content' => $this->content,
            'is_accepted' => (bool) $this->is_accepted,
            'created_at' => $this->created_at,
            'owner' => new UserResource($this->owner),
            'question' => new QuestionResource($this->question)
        ];
    }
}
