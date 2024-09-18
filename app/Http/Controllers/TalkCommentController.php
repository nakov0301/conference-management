<?php

namespace App\Http\Controllers;

use App\Models\Talk;
use Illuminate\Http\Request;

class TalkCommentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Talk $talk)
    {
        $data = $request->validate([
            'comment' => 'required|min:5',
        ]);

        $data['user_id'] = auth()->id();

        $talk->comments()->create($data);

        return back();
    }
}
