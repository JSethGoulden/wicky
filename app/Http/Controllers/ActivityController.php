<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dailyscape.index', [
            'dailies' => Activity::select(['id', 'type', 'name', 'completed', 'additional_component'])->visible()->where('type', 'daily')->orderByDesc('completed')->orderBy('name')->get(),
            'weeklies' => Activity::select(['id', 'type', 'name', 'completed', 'additional_component'])->visible()->where('type', 'weekly')->orderByDesc('completed')->orderBy('name')->get(),
            'monthlies' => Activity::select(['id', 'type', 'name', 'completed', 'additional_component'])->visible()->where('type', 'monthly')->orderByDesc('completed')->orderBy('name')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        $validated = $request->safe()->only('completed');

        $activity->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
