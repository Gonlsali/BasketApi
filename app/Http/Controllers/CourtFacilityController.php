<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourt_FacilityRequest;
use App\Http\Requests\UpdateCourt_FacilityRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Court_Facility;

class CourtFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourt_FacilityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Court_Facility $court_Facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Court_Facility $court_Facility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourt_FacilityRequest $request, Court_Facility $court_Facility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Court_Facility $court_Facility)
    {
        //
    }
}
