@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">{{ __('Show customer: '.$customer['name']) }}</div>
                <div class="card-body">
                    <div class="row col-sm-12">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name" class="col-form-label">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control " name="name" value="{{ $customer['name'] }}" required autofocus>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <ul>
                            @foreach($users as $user)
                                    <li><a href="{{ route('admin.users.show', $user) }}">{{ $user->firstname }} {{ $user->name }}</a></li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
