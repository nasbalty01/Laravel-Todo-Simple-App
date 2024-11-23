
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do App</title>
</head>
<body>
    <h1>To-Do List</h1>

    <form action="/tasks" method="POST">
        @csrf
        <input type="text" name="title" placeholder="New Task">
        <button type="submit">Add</button>
    </form>

    <ul>
        @foreach ($tasks as $task)
            <li>
                <form action="/tasks/{{ $task->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PATCH')
                    <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                </form>
                {{ $task->title }}
                <form action="/tasks/{{ $task->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
                    