<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index',[
            'todos' => $todos
        ]);
    }
    
    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoRequest $request)
    {
        Todo:: create([
            'title'        => $request->title,
            'description'  => $request->description,
            'is_completed' => 0
        ]);

        $request -> session()->flash('alert-success', 'To-Do Created Successfully');
        
        return to_route('todos.index');
    }

    public function show($id)
    {
        $todo = Todo::find($id);
        if(! $todo){
            $request()-> session()->flash('error', 'Unable to find the to-do');
            return to_route('todo.index')->withErrors([
                'error' => 'Unable to find the to-do'
            ]);
        }
        return view('todos.show', ['todo' => $todo]);
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        if(! $todo){
            $request()-> session()->flash('error', 'Unable to find the to-do');
            return redirect()->route('todo.index')->withErrors([
                'error' => 'Unable to find the to-do'
            ]);
        }
        return view('todos.edit', ['todo' => $todo]);
    }

    public function update(TodoRequest $request)
    {
        $todo = Todo::find($request->todo_id);
        
        if (!$todo) {
            session()->flash('error', 'Unable to find the to-do');
            return redirect()->route('todo.index')->withErrors([
                'error' => 'Unable to find the to-do'
            ]);
        }
    
        $todo->update([
            'title'        => $request->title,
            'description'  => $request->description,
            'is_completed' => $request->is_completed
        ]);
    
        $request->session()->flash('alert-success', 'To-Do Updated Successfully');
        return redirect()->route('todos.index');
    }       

    public function destroy(Request $request)
    {
        $todo = Todo::find($request->todo_id);
    
        if (!$todo) {
            $request->session()->flash('error', 'Unable to find the to-do');
            return redirect()->route('todo.index')->withErrors([
                'error' => 'Unable to find the to-do'
            ]);
        }
    
        $todo->delete();
        $request->session()->flash('alert-success', 'To-Do Deleted Successfully');
        return redirect()->route('todos.index');
    }
    


}