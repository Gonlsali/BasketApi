<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ScheduleResources extends ResourceCollection
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
            'date' => $this->date,
            'start' => $this->start,
            'end' => $this->end,
            'player_joined' => $this->player_joined,
            'max_player' => $this->max_player,
            'user_id' => UserResources::collection($this->user_id),
            'court_id' => CourtResources::collection($this->court_id)
        ];
    }
}
