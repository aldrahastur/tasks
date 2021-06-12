@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @include('partials.validation-error')
                <div class="card-header">{{ __('Edit checklist group: '.$task['name']) }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('checklists.tasks.update', [$checklist, $task]) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name" class="col-form-label">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control " name="name" value="{{ $task['name'] }}" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-form-label">{{ __('Description') }}</label>
                            <textarea id="description" class="form-control" name="description" rows="5">{{ $task['description'] }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="due_at" class="col-form-label">{{ __('Due At') }}</label>
                            <input type="datetime-local" id="due_at" class="form-control" name="due_at" value="{{ $task['due_at'] }}">
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

@section('scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
