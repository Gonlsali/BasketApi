<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Http\Resources\ScheduleResources;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Schedule;
use App\Models\Court;
use App\Models\User;
use Exception;

class ScheduleController extends Controller
{
    public function showCourtSchedule(Request $request)
    {
        $court = Court::where('id', $request->id)->first();
        $schedules = $court->schedules()->get();

        if (empty($schedules)) {
            return [
                'status' => Response::HTTP_NOT_FOUND,
                'message' => 'No Schedules Yet',
                'data' => $schedules
            ];
        }

        return [
            'status' => Response::HTTP_OK,
            'message' => 'Success',
            'data' => $schedules
        ];
    }

    public function showUserSchedule(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $schedules = $user->schedules()->get();

        return [
            'status' => Response::HTTP_OK,
            'message' => 'Success',
            'data' => $schedules
        ];
    }

    public function createSchedule(Request $request)
    {
        $schedule = new Schedule();
        $schedule->date = $request->date;
        $schedule->start = $request->start;
        $schedule->end = $request->end;
        $schedule->max_players = $request->max_players;
        $schedule->user_id = $request->user_id;
        $schedule->court_id = $request->court_id;
        $schedule->save();

        $schedule->players()->attach($request->player_ids);

        return [
            'status' => Response::HTTP_OK,
            'message' => 'Success',
            'data' => $schedule
        ];
    }

    public function DeleteSchedule(Request $request)
    {
        $schedule = Schedule::where('id', $request->id)->first();
        $schedule->delete();

        return [
            'status' => Response::HTTP_OK,
            'message' => 'Success',
            'data' => []
        ];
    }

    public function addPlayer(Request $request): array
    {
        $scheduleId = $request->schedule_id;
        $playerId = $request->player_id;

        // Validasi data
        if (empty($scheduleId) || empty($playerId)) {
            return [
                'status' => Response::HTTP_BAD_REQUEST,
                'message' => 'scheduleId dan playerId tidak boleh kosong',
                'data' => []
            ];
        }

        $schedule = Schedule::where('id', $scheduleId)->first();

        // Periksa apakah pemain sudah bergabung dengan jadwal
        if ($schedule->players->contains($playerId)) {
            return [
                'status' => Response::HTTP_BAD_REQUEST,
                'message' => 'Pemain sudah bergabung dengan jadwal',
                'data' => []
            ];
        }

        try {
            $schedule->players()->attach($playerId);
            $schedule->refresh();  // Refresh untuk mendapatkan jumlah players_joined yang diperbarui

            return [
                'status' => Response::HTTP_OK,
                'message' => 'Pemain berhasil ditambahkan ke jadwal',
                'data' => $schedule
            ];
        } catch (Exception $e) {
            return [
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Gagal menambahkan pemain: ' . $e->getMessage(),
                'data' => []
            ];
        }
    }
}
