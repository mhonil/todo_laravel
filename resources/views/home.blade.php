@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>                   
                    @endif
                    <a href="{{ route('todos.create')}}" type='button' class="btn btn-sm btn-info">Create To-Do</a>
                    <a href="{{ route('todos.index')}}" type='button' class="btn btn-sm btn-info">View To-DO</a> <br>
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
