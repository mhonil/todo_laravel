@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-error" role="error">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-sm btn-info" href="{{ route('todos.index')}}">Go Back</a> <br>
                    <b>Your To-Do title is: </b> {{ $todo->title }}
                    <b>Your To-Do description is: </b> {{ $todo->description }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection