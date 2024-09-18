<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('conferences.index', [
            'conferences' => Conference::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('conferences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => 'required',
        ]);

        Conference::create([
            'title'   => $data['title'],
            'user_id' => 1,
        ]);

        return redirect(route('conferences.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Conference $conference)
    {
        return view('conferences.show', [
            'conference' => $conference,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $conference = Conference::findOrFail($id);

        return view('conferences.edit', ['conference' => $conference]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $conference = Conference::findOrFail($id);

        $data = request()->validate([
            'title' => ['required', 'min:3'],
        ]);

        $conference->update([
            'title'   => $data['title'],
        ]);

        return redirect(route('conferences.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $conference = Conference::findOrFail($id);

        $conference->delete();

        return redirect(route('conferences.index'));
    }
}
