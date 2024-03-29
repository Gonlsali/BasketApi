<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CompetitionResources extends ResourceCollection
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
            'price' => $this->price,
            'organizer' => $this->organizer,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'max_team' => $this->max_team,
            'rules' => $this->rules,
        ];
    }
}
