<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
</head>
<body>
<h1>Todo List</h1>

<form action="{{ route('todos.store') }}" method="post">
    @csrf
    <label for="title">Title</label>
    <input type="text" name="title" required>
    <label for="description">Description</label>
    <textarea name="description"></textarea>
    <button type="submit">Add Todo</button>
</form>

<ul>
    @foreach ($todos as $todo)
        <li>
            <form action="{{ route('todos.update', $todo->id) }}" method="post">
                @csrf
                @method('patch')
                <input type="text" name="title" value="{{ $todo->title }}" required>
                <textarea name="description">{{ $todo->description }}</textarea>
                <input type="checkbox" name="completed" value="1" {{ $todo->completed ? 'checked' : '' }}>
                <button type="submit">Update</button>
            </form>

            <form action="{{ route('todos.destroy', $todo->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
</body>
</html>
