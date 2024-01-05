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
        return CourtResources::collection($courts);
    }

    public function courtById($id) {
        return Court::find($id);
    }

}
