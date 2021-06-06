<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChecklistRequest;
use App\Models\Checklist;
use App\Models\ChecklistGroup;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ChecklistGroup $checklistGroup)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(ChecklistGroup $checklistGroup)
    {
        return view('admin.checklist.create', compact('checklistGroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Models\ChecklistGroup $checklistGroup
     * @param \App\Http\Requests\StoreChecklistRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ChecklistGroup $checklistGroup, StoreChecklistRequest $request)
    {
        $checklistGroup->checklists()->create($request->validated());
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ChecklistGroup $checklistGroup
     * @param Checklist $checklist
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        return view('admin.checklist.show', compact('checklist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ChecklistGroup $checklistGroup
     * @param \App\Models\Checklist $checklist
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        return view('admin.checklist.edit', compact('checklistGroup','checklist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Models\ChecklistGroup $checklistGroup
     * @param \App\Http\Requests\StoreChecklistRequest $request
     * @param \App\Models\Checklist $checklist
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ChecklistGroup $checklistGroup, StoreChecklistRequest $request, Checklist $checklist)
    {
        $checklist->update($request->validated());
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ChecklistGroup $checklistGroup
     * @param \App\Models\Checklist $checklist
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        $checklist->delete();
        return redirect()->route('home');
    }
}
