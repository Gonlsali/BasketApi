<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Http\Resources\ReviewResource;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function showCourtReview(Request $request) {
        $court = Court::where('id', $request->id)->first();
        $review = $court->reviews()->get();

        return [
            'status' => Response::HTTP_OK,
            'message' => 'Success',
            'data'=> ReviewResources::collection($schedules)
        ];
    }

    public function createReview(Request $request) {
        $review = new Review();
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->user_id = $request->user_id;
        $review->court_id = $request->court_id;
        $review->save();

        return [
            'status' => Response::HTTP_OK,
            'message' => 'Success',
            'data'=> $review
        ];
    }

    public function deleteReview(Request $request){
        $review = Review::where('id', $request->id)->first();
        $review->delete();

        return[
            'status' => Response::HTTP_OK,
            'message' => 'Success',
            'data' => []
        ];
    }
}
