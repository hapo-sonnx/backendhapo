<?php

namespace App\Http\Controllers;

use App\Models\ReplyReview;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function replyreview(Request $request)
    {
        if ($request->userId == Auth::user()->id) {
            $reply = new ReplyReview();
            $reply['user_id'] = Auth::user()->id;
            $reply['feeback_id'] = $request->reviewId;
            $reply['content'] = $request->reply;
            $reply->save();
        }

        $user = User::find($request->userId);

        return response()->json([
            'reply' => $reply,
            'user' => $user['name'],
        ]);
    }
}
