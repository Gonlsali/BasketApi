<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourtRequest;
use App\Http\Requests\UpdateCourtRequest;
use App\Http\Resources\CourtResources;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Court;

class CourtController extends Controller
{
    public function showCourts() {
        $courts = Court::all();
        return new CourtResource($courts);
    }

    public function courtById(Request $request) {
        $court = Court::where("id", $request->id)->first();

        return [
            'status' => Response::HTTP_OK,
            'message' => 'Success',
            'data'=> CourtResources::collection($court)
        ];
    }

    public function createCourt(Request $request)
    {
        $court = new Court();
        $court->name = $request->name;
        $court->address = $request->address;
        $court->price = $request->price;
        $court->save();

        return [
            'status' => Response::HTTP_OK,
            'message' => 'Success',
            'data'=> $court
        ];
    }

    public function deleteCourt(Request $request){
        $court = Court::where('id', $request->id)->first();
        $court->delete();

        return[
            'status' => Response::HTTP_OK,
            'message' => 'Success',
            'data' => []
        ];
    }

    public function updateCourt(Request $request)
    {
        $court = Court::where('id', $request->id)->first();
        $court->name = $request->name;
        $court->address = $request->address;
        $court->price = $request->price;
        $court->save();

        return [
            'status'=> Response::HTTP_OK,
            'message'=> 'Update Success',
            'data'=> $court
        ];
    }
}
