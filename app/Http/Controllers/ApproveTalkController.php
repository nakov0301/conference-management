<?php

namespace App\Http\Controllers;

use App\Models\Talk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ApproveTalkController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Talk $talk, Request $request)
    {
        Gate::authorize('organizer', $talk->conference);

        $talk->update(['approved_at' => now()]);

        return back();
    }
}
