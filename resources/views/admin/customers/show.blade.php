@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">{{ __('Show customer: '.$customer['name']) }}</div>
                <div class="card-body">

                        <div class="form-group">
                            <label for="name" class="col-form-label">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control " name="name" value="{{ $customer['name'] }}" required autofocus>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save') }}
                            </button>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
