
<table class="table table-responsive-sm" wire:sortable="updateTaskOrder">
    <thead>
    <tr>
        <th>Name</th>
        <th>Due At</th>
        <th>Edit/Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tasks as $task)
        <tr wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}">
            <td>{{$task->name}}</td>
            <td>{{$task->due_at}}</td>
            <td>
                <div class="row">
                    <a class="btn btn-primary btn-sm" href="{{ route('checklists.tasks.edit', [$checklist, $task]) }}">{{ __('Edit') }}</a>
                    <form action="{{ route('checklists.tasks.destroy', [$checklist, $task]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{__('Are you sure?')}}')">
                            {{ __('Delete') }}
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

