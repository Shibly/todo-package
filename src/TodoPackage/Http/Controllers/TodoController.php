<?php

namespace Shibly\TodoPackage\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Shibly\TodoPackage\TodoPackage\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('vendor.todo-package.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('todos.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'completed' => 'boolean',
        ]);

        $todo = Todo::find($id);
        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->has('completed'),
        ]);

        return redirect()->route('todos.index');
    }

    public function destroy($id)
    {
        Todo::destroy($id);
        return redirect()->route('todos.index');
    }
}