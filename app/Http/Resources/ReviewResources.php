<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ReviewResources extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);

        return [
            'rating' => $this->rating,
            'review' => $this->review,
            'user_id' => UserResources::collection($this->user_id),
            'court_id' => CourtResources::collection($this->court_id)
        ];
    }
}
