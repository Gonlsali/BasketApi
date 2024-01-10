<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResources;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class UserController extends Controller
{
    public function getAllUsers()
    {
        $user = User::all();
        return UserResources::collection($user);
    }

    public function getUser(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!empty($user)) {
            return ([
                'status' => Response::HTTP_OK,
                'messate' => "User Found",
                'data'[$user]
            ]);
        } else {
            return ([
                'status' => Response::HTTP_NOT_FOUND,
                'message' => "User Not Found",
                'data' => []
            ]);
        }
    }

    public function checkPassword()
    {
        $users = User::all();
        $check = [];

        foreach ($users as $user) {
            array_push(
                $check,
                Hash::check("Evan1234", $user->password)
            );
        }
        return $check;
    }

    public function createUser(Request $request)
    {
        try {
            $existingUser = User::where('email', $request->email)->first();

            if ($existingUser) {
                return [
                    'status' => Response::HTTP_CONFLICT, // 409 Conflict
                    'message' => "User already exists",
                    'data' => []
                ];
            }

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            return [
                'status' => Response::HTTP_OK,
                'message' => "User created",
                'data' => [
                    $user->createToken('login')->plainTextToken,
                    $user->email
                ]
            ];
        } catch (Exception $e) {
            return [
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage(),
                'data' => []
            ];
        }
    }


    public function updateUser(Request $request)
    {
        if (!empty($request->email)) {
            $user = User::where('email', $request->email)->first();
        } else {
            $user = User::where('id', $request->id)->first();
        }

        if (!empty($user)) {
            try {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->save();
                return [
                    'status' => Response::HTTP_OK,
                    'message' => "Success",
                    'data' => $user
                ];
            } catch (Exception $e) {
                return [
                    'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                    'message' => $e->getMessage(),
                    'data' => []
                ];
            }
        }

        return [
            'status' => Response::HTTP_NOT_FOUND,
            'message' => "User not found",
            'data' => []
        ];
    }

    public function deleteUser(Request $request)
    {
        if (!empty($request->email)) {
            $user = User::where('email', $request->email)->first();
        } else {
            $user = User::where('id', $request->id)->first();
        }

        if (!empty($user)) {
            $user->delete();

            return [
                'status' => Response::HTTP_OK,
                'message' => "Success",
                'data' => []
            ];
        }

        return [
            'status' => Response::HTTP_NOT_FOUND,
            'message' => "User not found",
            'data' => []
        ];
    }
}
