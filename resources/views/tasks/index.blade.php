<!DOCTYPE html>
<html>
<head>      
    <title>To Do List</title>
    <style>
        * {
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            background:linear-gradient(135deg, darkgray,black,darkgray);
            padding:40px;
            color: #ecf0f1; 
            background-attachment:fixed;    
        }
        h1 {
            text-align:center;  
            margin-bottom:25px;
            font-size:30px;
            color: #ffffffff;
        }
        .add-task {
            display:inline-block;
            background: #cc2e2eff;
            color: #fff;
            padding:15px 18px;
            border-radius:40px;
            text-decoration:none;
            font-weight:bold;
            transition:background 0.2s;
        }
        .add-task:hover {
            background: #ae2727ff;
        }
        .add-task-container {
            text-align:center;
            margin-bottom:25px;
        }
        ul {
            list-style:none;
            max-width:600px;
            margin:0 auto;
            padding:0;
        }
        ul li {
            background:whitesmoke;
            border:1px solid #e6e6e6;
            border-radius:8px;
            padding:15px 20px;
            margin-bottom:12px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            transition:background 0.2s;
        }
        u li:hover {
            background: #1d1919ff;
        }
        .task-title {
            flex:1;
            font-size:16px;
            font-weight:500;
            margin-left:10px;
            color: #7f8c8d;
        }
        .task-title.done {
            text-decoration:line-through;
            color: black;
        }
        .task-title a {
            color: black;
            text-decoration:none;
        }
        .task-title a:hover {
            text-decoration:underline;
        }
        input[type="checkbox"] {
            transform:scale(1.2);
            cursor:pointer;
        }
        .actions {
            display:flex;
            gap:6px;
        }
        .btn {
            border:none;
            border-radius:6px;
            padding:6px 12px;
            font-size:14px;
            font-weight:bold;
            cursor:pointer;
            transition:background 0.2s,transform 0.1s;
            text-decoration:none;
            color:white;
        }
        .btn:hover {
            transform:scale(1.05);
        }
        .btn-edit {
            background:blue;
        }
        .btn-edit:hover {
            background:darkblue;
        }
        .btn-delete {
            background:red;
        }
        .btn-delete:hover {
            background:firebrick;    
        }
    </style>
</head>
<body>
    <h1>To Do List</h1>

    <div class="add-task-container">
        <a href="{{ route('tasks.create') }}" class="add-task">+ Tambah Tugas</a>
    </div>

    <ul>
        @foreach ($tasks as $task)
            <li>
                <form action="{{ route('tasks.toggle', $task) }}" method="POST" style="display:inline;">
                    @csrf 
                    @method('PATCH')
                    <input type="checkbox" onchange="this.form.submit()" {{ $task->is_done ? 'checked' : '' }}>
                </form>

                <span class="task-title {{ $task->is_done ? 'done' : '' }}">
                    <a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a>
                </span>

                <div class="actions">
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-edit">Edit</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete">Hapus</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</body>
</html>
