<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class CourseRatingController extends Controller
{
    private $review;

    function __construct(Review $review)
    {
        $this->review = new Review();
    }

    public function rating(Request $request)
    {
        try {
            $reviews = $this->review;

            $reviews->updateOrCreate(
                ['user_id' => auth()->user()->id, 'course_id' => $request->course_id],
                [
                    'comment' => $request->message,
                    'rating' => $request->rate,
                    'instructor_id' => $request->instructor_id,
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Thêm đánh giá thành công'
            ]);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function getRatingByCourse()
    {
        try {
            $course_id = request()->course_id;
            $reviews = $this->review
            ->orderBy('created_at', 'desc')
            ->where('course_id', $course_id)
            ->with('users')
            ->get();

            $total = $reviews->count();
            $avg = $reviews->avg('rating');

            return response()->json([
                'status' => 'success',
                'data' => $reviews,
                'total' => $total,
                'avg' => $avg
            ]);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    function deleteRating(Request $request)
    {
        try {
            $this->review->where('id', $request->id)->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Xóa đánh giá thành công'
            ]);
        } catch (\Exception $e) {
            dd($e);
        }
    }
}