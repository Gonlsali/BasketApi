<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Http\Resources\ScheduleResources;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function showCourtSchedule(Request $request) {
        $court = Court::where('id', $request->id)->first();
        $schedules = $court->schedules()->get();

        return [
            'status' => Response::HTTP_OK,
            'message' => 'Success',
            'data'=> ScheduleResources::collection($schedules)
        ];
    }

    public function showUserSchedule(Request $request) {
        $user = User::where('id', $request->id)->first();
        $schedules = $user->schedules()->get();

        return [
            'status' => Response::HTTP_OK,
            'message' => 'Success',
            'data'=> ScheduleResources::collection($schedules)
        ];
    }

    public function createSchedule(Request $request) {
        $schedule = new Schedule();
        $schedule->date = $request->date;
        $schedule->start = $request->start;
        $schedule->end = $request->end;
        $schedule->player_joined = $request->player_joined;
        $schedule->max_player = $request->max_player;
        $schedule->user_id = $request->user_id;
        $schedule->court_id = $request->court_id;
        $schedule->save();

        return [
            'status' => Response::HTTP_OK,
            'message' => 'Success',
            'data'=> $schedule
        ];
    }

    public function DeleteSchedule(Request $request){
        $schedule = Schedule::where('id', $request->id)->first();
        $schedule->delete();

        return[
            'status' => Response::HTTP_OK,
            'message' => 'Success',
            'data' => $schedule
        ];
    }
}
