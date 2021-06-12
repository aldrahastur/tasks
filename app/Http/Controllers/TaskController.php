<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveTaskRequest;
use App\Models\Checklist;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{

    public function index(Checklist $checklist) : View
    {
        //
    }


    public function create(Checklist $checklist) : View
    {
        return view('tasks.create', compact('checklist'));
    }

    public function store(Checklist $checklist, SaveTaskRequest $request): RedirectResponse
    {
        $position = $checklist->tasks()->max('position') + 1;
        $checklist->tasks()->create($request->validated() + ['position' => $position, 'user_id' => auth()->id()]);

        return redirect()->route('checklist-groups.checklists.show', [$checklist->checklist_group_id, $checklist]);
    }

    public function show(Checklist $checklist, Task $task) : View
    {
        //
    }

    public function edit(Checklist $checklist, Task $task) : View
    {
        return view('tasks.edit', compact('checklist', 'task'));
    }

    public function update(Checklist $checklist, SaveTaskRequest $request, Task $task) : RedirectResponse
    {
        $task->update($request->validated());

        return redirect()->route('checklist-groups.checklists.show', [$checklist->checklist_group_id, $checklist]);
    }

    public function destroy(Checklist $checklist, Task $task) : RedirectResponse
    {
        $checklist->tasks()->where('position', '>', $task->position)->update(
          ['position' => \DB::raw('position - 1')]
        );

       $task->delete();

       return redirect()->route('checklist-groups.checklists.show', [$checklist->checklist_group_id, $checklist]);
    }
}
