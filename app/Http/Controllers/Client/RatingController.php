<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\ReplyRating;
use App\Http\Controllers\Controller;

class RatingController extends Controller
{
    protected $rating;
    public function __construct(Rating $rating)
    {
        $this->rating = $rating;
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['UserID'] = auth()->user()->id;
        $check = $this->rating->where('UserID', $data['UserID'])->where('CourseID', $data['CourseID'])->first();
        if ($check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn đã đánh giá khoá học này rồi'
            ]);
        } else {

            try {
                $this->rating->create($data);
                return response()->json([
                    'status' => 1,
                    'message' => 'Đánh giá thành công'
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Đã có lỗi xảy ra : ' . $e->getMessage()
                ]);
            }
        }
    }

    public function storeReply(Request $request)
    {
        $data = $request->all();
        $data['UserID'] = auth()->user()->id;
        try {
            ReplyRating::create($data);
            return response()->json([
                'status' => 1,
                'message' => 'Đánh giá thành công'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 0,
                'message' => 'Đã có lỗi xảy ra : ' . $e->getMessage()
            ]);
        }

    }
}
