@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @include('partials.validation-error')
                <div class="card-header">{{ __('Users') }}</div>
                <div class="card-body">
                    <table class="table table-responsive-sm" >
                        <thead>
                        <tr>
                            <th>{{ __('Created At') }}</th>
                            <th>Name</th>
                            <th>Due At</th>
                            <th>Due At</th>
                            <th>Edit/Delete</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td>{{$customer->created_at}}</td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->email}}</td>
                                <td>
                                    <div class="row">
                                        <a class="btn btn-success btn-sm" href="{{ route('admin.customers.show', [$customer]) }}">{{ __('Show') }}</a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.customers.edit', [$customer]) }}">{{ __('Edit') }}</a>
                                        <form action="{{ route('admin.customers.destroy', [$customer]) }}" method="POST">
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
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
