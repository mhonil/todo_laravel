@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">To-Do List</div>

                <div class="card-body">
                   
                    @if (Session::has('alert-success'))
                        <div class="alert alert-primary" role="alert">
                            {{Session::get('alert-success')}}
                        </div>
                    @endif
                   
                    <a href="{{ route('todos.create')}}" type='button' class="btn btn-sm btn-info">Create To-Do</a>

                   @if (count($todos) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($todos as $todo)
                                <tr>
                                    <td>{{ $todo->title }}</td>
                                    <td>{{ $todo->description }}</td>
                                    <td>
                                        @if ( $todo->is_completed == 1)
                                                <a class="btn btn-sm btn-success">completed</a>
                                        @else
                                                <a class="btn btn-sm btn-danger">incompleted</a>
                                        @endif
                                    </td>
                                    <td>
                                    <a href="{{ route('todos.show', $todo->id) }}" type="button" class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ route('todos.edit', $todo->id) }}" type="button" class="btn btn-sm btn-secondary">Edit</a>
                                        <form method="post" action="{{ route('todos.destroy') }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="todo_id" value="{{$todo->id}}">
                                            <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                        </form>
                                            
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <h4>There are no To-dos</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
