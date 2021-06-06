@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @include('partials.validation-error')
                <div class="card-header">{{ __('Show checklist: '.$checklist['name']) }}</div>
                <div class="card-body">
                    <div class="row">
                        <a href="{{ route('admin.checklist-groups.checklists.edit', [$checklistGroup, $checklist]) }}" class="btn btn-primary">
                            {{ __('Edit') }}
                        </a>
                        <form action="{{ route('admin.checklist-groups.checklists.destroy', [$checklistGroup, $checklist]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('{{__('Are you sure')}}')">
                                {{ __('Delete') }}
                            </button>
                        </form>
                        <a href="{{ route('admin.checklists.tasks.create', $checklist) }}" class="btn btn-success">
                            {{ __('Create Tasks') }}
                        </a>
                    </div>

                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-header">{{ __('List of Tasks') }}</div>
                <div class="card-body">
                    <table class="table table-responsive-sm">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Due At</th>
                            <th>Edit/Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($checklist->tasks as $task)
                            <tr>
                                <td>{{$task->name}}</td>
                                <td>{{$task->due_at}}</td>
                                <td>
                                    <div class="row">
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.checklists.tasks.edit', [$checklist, $task]) }}">{{ __('Edit') }}</a>
                                        <form action="{{ route('admin.checklists.tasks.destroy', [$checklist, $task]) }}" method="POST">
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

                </div>
            </div>
        </div>
    </div>
@endsection
