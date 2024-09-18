<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use App\Models\Talk;
use Illuminate\Http\Request;

class TalkController extends Controller
{
    public function show(Talk $talk)
    {
        $talk->load('comments.user');

        return view('talks.show', compact('talk'));
    }

    public function create(Conference $conference)
    {
        return view('talks.create', compact('conference'));
    }

    public function store(Conference $conference, Request $request)
    {
        $validData = $request->validate([
            'title' => 'string|required',
            'description' => 'string|required',
        ]);

        $conference->talks()->create([
            'title' => $validData['title'],
            'description' => $validData['description'],
            'user_id' => auth()->id(),
        ]);

        return redirect(route('conferences.show', $conference));
    }
}
