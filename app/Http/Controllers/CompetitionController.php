<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompetitionRequest;
use App\Http\Requests\UpdateCompetitionRequest;
use App\Http\Resources\CompetitionResources;
use App\Models\Competition;

class CompetitionController extends Controller
{
    public function showCompetition()
    {
        $competition = Competition::all();
        return CompetitionResources::collection($competition);
    }

    public function competitionById($id) {
        return Competition::find($id);
    }
}
