<!DOCTYPE html>
<html>
<head>
<title>To Do List</title>
<style>
  .container {
    display: flex;
    justify-content: space-around;
    padding: 20px;
  }

  body {
      font-family: "Poppins", Arial, sans-serif;
      background: linear-gradient(135deg, #1f1f1f, #2b2b2b, #3a3a3a);
      color: #f5f5f5;
      padding: 40px;
      background-attachment:fixed;
    }
    
    .container {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      gap: 40px;
      flex-wrap: wrap;
    }


  .card {
      width: 420px;
      background: rgba(255, 255, 255, 0.05);
      border-radius: 16px;
      padding: 25px 25px 30px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.3);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
  .card-title {
      text-align: center;
      font-size: 22px;
      margin-bottom: 20px;
      color:white;
      text-transform:capitalize;
    }

  .add-task {
      display: block;
      background:red;
      color: #fff;
      padding: 12px 20px;
      text-align: center;
      border-radius: 50px;
      text-decoration: none;
      font-weight: 600;
      transition: background 0.3s ease, transform 0.2s ease;
      margin-bottom: 25px;
    }
    .add-task:hover {
        background:firebrick;
    }
     ul {
      list-style: none;
    }

    ul li {
      background: rgba(255,255,255,0.1);
      border: 1px solid rgba(255,255,255,0.15);
      border-radius: 10px;
      padding: 14px 18px;
      margin-bottom: 12px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      transition: background 0.2s ease;
    }

     input[type="checkbox"] {
      transform: scale(1.3);
      cursor: pointer;
      accent-color:mediumblue;
    }

    .task-title {
      flex: 1;
      margin-left: 12px;
      color: #f0f0f0;
      font-weight: 500;
      font-size: 16px;
      transition: color 0.2s;
    }
    .task-title.done {
      text-decoration: line-through;
      color: #888;
    }
    .task-title a {
      color: inherit;
      text-decoration: none;
    }
    .task-title a:hover {
      text-decoration: underline;
    }
    .actions {
      display: flex;
      gap: 8px;
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

<div class="container">

  <div class="card">
    <h2 class="card-title">To Do List Kerja</h2>
    <ul>
        @foreach ($tasksKerja as $task)
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

    <a href="{{ route('tasks.create', ['category' => 'kerja']) }}" class="add-task">+ Tambah Tugas Kerja</a>
  </div>

  <div class="card">
    <h2 class="card-title">To Do List Rumah</h2>
   <ul>
        @foreach ($tasksRumah as $task)
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

    <a href="{{ route('tasks.create', ['category' => 'rumah']) }}" class="add-task">+ Tambah Tugas Rumah</a>
  </div>