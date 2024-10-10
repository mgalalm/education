<?php

namespace App\Http\Controllers;

use App\Enums\TalkType;
use App\Models\Talk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TalkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('talks.index', [
            'talks' => Auth::user()->talks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('talks.create', [
            'talk' => new Talk,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'length' => '',
            'type' => ['required', Rule::enum(TalkType::class)],
            'abstract' => '',
            'organizer_notes' => '',
        ]);

        Auth::user()->talks()->create($validated);

        return redirect()->route('talks.index');
        // dd($request->all());
    }

    // update

    /**
     * Display the specified resource.
     */
    public function show(Talk $talk)
    {
        if (Auth::user()->cannot('view', $talk)) {
            abort(403);
        }

        return view('talks.show', [
            'talk' => $talk,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Talk $talk)
    {
        // check if the user is the owner of the talk
        if (Auth::user()->cannot('update', $talk)) {
            abort(403);
        }

        return view('talks.edit', [
            'talk' => $talk,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Talk $talk)
    {

        // check if the user is the owner of the talk

        if (Auth::user()->cannot('update', $talk)) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|max:255',
            'length' => '',
            'type' => ['required', Rule::enum(TalkType::class)],
            'abstract' => '',
            'organizer_notes' => '',
        ]);

        $talk->update($validated);

        return redirect()->route('talks.show', $talk);

        // dd($request, $talk);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Talk $talk)
    {
        // check if the user is the owner of the talk
        if (Auth::user()->id !== $talk->user_id) {
            abort(403);
        }

        // delete the talk
        $talk->delete();

        return redirect()->route('talks.index');
    }
}
