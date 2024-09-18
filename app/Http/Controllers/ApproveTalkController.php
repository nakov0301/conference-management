<?php

namespace App\Http\Controllers;

use App\Models\Talk;
use Illuminate\Http\Request;

class ApproveTalkController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Talk $talk, Request $request)
    {
        $talk->update(['approved_at' => now()]);

        return back();
    }
}
