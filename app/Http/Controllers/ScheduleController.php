<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Http\Resources\ScheduleResources;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function showSchedules() {
        $schedules = Schedule::all();
        return ScheduleResources::collection($schedules);
    }

    public function scheduleById($id) {
        return Schedule::find($id);
    }

    public function createSchedule() {
        
    }
}
