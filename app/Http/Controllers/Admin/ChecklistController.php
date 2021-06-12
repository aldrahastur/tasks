<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChecklistRequest;
use App\Models\Checklist;
use App\Models\ChecklistGroup;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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
     * @return Application|Factory|View
     */
    public function create(ChecklistGroup $checklistGroup)
    {
        return view('admin.checklist.create', compact('checklistGroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ChecklistGroup $checklistGroup
     * @param StoreChecklistRequest $request
     * @return RedirectResponse
     */
    public function store(ChecklistGroup $checklistGroup, StoreChecklistRequest $request)
    {
        $checklistGroup->checklists()->create($request->validated()+ ['user_id' => auth()->id()]);
        return redirect()->route('welcomeUserPage');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ChecklistGroup $checklistGroup
     * @param Checklist $checklist
     * @return Application|Factory|View
     */
    public function show(ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        return view('admin.checklist.show', compact('checklistGroup','checklist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ChecklistGroup $checklistGroup
     * @param \App\Models\Checklist $checklist
     * @return Application|Factory|View
     */
    public function edit(ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        return view('admin.checklist.edit', compact('checklistGroup','checklist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Models\ChecklistGroup $checklistGroup
     * @param StoreChecklistRequest $request
     * @param \App\Models\Checklist $checklist
     * @return RedirectResponse
     */
    public function update(ChecklistGroup $checklistGroup, StoreChecklistRequest $request, Checklist $checklist)
    {
        $checklist->update($request->validated());
        return redirect()->route('welcomeUserPage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ChecklistGroup $checklistGroup
     * @param \App\Models\Checklist $checklist
     * @return RedirectResponse
     */
    public function destroy(ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        $checklist->delete();
        return redirect()->route('welcomeUserPage');
    }
}
