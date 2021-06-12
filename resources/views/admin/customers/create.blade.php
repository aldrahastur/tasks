@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.customers.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-form-label">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                            <label for="email" class="col-form-label">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            <label for="address" class="col-form-label">{{ __('Address') }}</label>
                            <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">

                            <label for="zip_code" class="col-form-label">{{ __('Zip Code') }}</label>
                            <input id="zip_code" type="text" class="form-control" name="zip_code" value="{{ old('zip_code') }}">

                            <label for="city" class="col-form-label">{{ __('City') }}</label>
                            <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}">

                            <label for="vat_id" class="col-form-label">{{ __('Vat - ID') }}</label>
                            <input id="vat_id" type="text" class="form-control" name="vat_id" value="{{ old('vat_id') }}">
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
