<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompetitionRequest;
use App\Http\Requests\UpdateCompetitionRequest;
use App\Http\Resources\CompetitionResources;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\Court;

class CompetitionController extends Controller
{
    public function showCompetition(Request $request)
    {
        $court = Court::where("id", $request->id)->first();
        $competition = $court->competitions()->get();

        return [
            'status' => Response::HTTP_OK,
            'message' => 'Success',
            'data'=> CompetitionResources::collection($competition)
        ];
    }

    public function createCompetition(Request $request)
    {
        $competition = new Competition();
        $competition->price = $request->price;
        $competition->organizer = $request->organizer;
        $competition->start_date = $request->start_date;
        $competition->end_date = $request->end_date;
        $competition->max_team = $request->max_team;
        $competition->rules = $request->rules;
        $competition->save();

        return [
            'status' => Response::HTTP_OK,
            'message' => 'Success',
            'data'=> $competition
        ];
    }

    public function deleteCompetition(Request $request)
    {
        $competition = Competition::where('id', $request->id)->first();
        $competition->delete();

        return [
            'status' => Response::HTTP_OK,
            'message' => "Success",
            'data'=> []
        ];
    }
}
