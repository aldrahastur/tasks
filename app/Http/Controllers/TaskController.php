<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveTaskRequest;
use App\Models\Checklist;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Checklist $checklist
     * @return Application|Factory|View|Response
     */
    public function create(Checklist $checklist)
    {
        return view('tasks.create', compact('checklist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Checklist $checklist
     * @param SaveTaskRequest $request
     * @return RedirectResponse
     */
    public function store(Checklist $checklist, SaveTaskRequest $request): RedirectResponse
    {
        $position = $checklist->tasks()->max('position') + 1;
        $checklist->tasks()->create($request->validated() + ['position' => $position]);

        return redirect()->route('admin.checklist-groups.checklists.show', [$checklist->checklist_group_id, $checklist]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Checklist $checklist, Task $task)
    {
        return view('tasks.edit', compact('checklist', 'task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Models\Checklist $checklist
     * @param \App\Http\Requests\SaveTaskRequest $request
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Checklist $checklist, SaveTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return redirect()->route('admin.checklist-groups.checklists.show', [$checklist->checklist_group_id, $checklist]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Checklist $checklist
     * @param \App\Models\Task $task
     * @return RedirectResponse
     */
    public function destroy(Checklist $checklist, Task $task)
    {
        $checklist->tasks()->where('position', '>', $task->position)->update(
          ['position' => \DB::raw('position - 1')]
        );

       $task->delete();

       return redirect()->route('admin.checklist-groups.checklists.show', [$checklist->checklist_group_id, $checklist]);
    }
}
