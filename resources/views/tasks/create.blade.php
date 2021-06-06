@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @include('partials.validation-error')
                <div class="card-header">{{ __('New Task in ') }} {{ $checklist->name }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.checklists.tasks.store', $checklist) }}">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-form-label">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-form-label">{{ __('Name') }}</label>
                            <textarea id="description" class="form-control" name="description" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="due_at" class="col-form-label">{{ __('Name') }}</label>
                            <input type="datetime-local" id="due_at" class="form-control" name="due_at" >
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
