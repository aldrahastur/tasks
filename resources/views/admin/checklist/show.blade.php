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
                    @livewire('tasks-table', ['checklist' => $checklist]);
                </div>
            </div>
        </div>
    </div>
@endsection
