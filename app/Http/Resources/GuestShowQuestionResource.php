<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\GuestUserResource;
use App\Http\Resources\GuestAnswerResource;
use Illuminate\Http\Resources\Json\JsonResource;

class GuestShowQuestionResource extends JsonResource
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
            'owner' => new GuestUserResource($this->owner),
            'answers' => GuestAnswerResource::collection($this->whenLoaded('answers'))
        ];
    }
}
