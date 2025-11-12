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
      width:500px;
      background:black;
      border-radius:16px;
      padding:25px 25px 30px;
      box-shadow:0 10px 25px rgba(0,0,0,0.3);
      transition:transform 0.3s ease, box-shadow 0.3s ease;
    }
    
  .card-title {
      text-align: center;
      font-size: 22px;
      margin-bottom: 20px;
      color:white;
      text-transform:capitalize;
    }

    .card2 {
      width:500px;
      background:firebrick;
      border-radius:16px;
      padding:25px 25px 30px;
      box-shadow:0 10px 25px rgba(0,0,0,0.3);
      transition:transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-title2 {
      text-align:center;
      font-size:22px;
      margin-bottom:20px;
      color:white;
      text-transform:capitalize;
    }

    .card3 {
      width:500px;
      background:blue;
      border-radius:16px;
      padding:25px 25px 30px;
      box-shadow:0 10px 25px rgba(0,0,0,0.3);
      transition:transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card-title3 {
      text-align:center;
      font-size:22px;
      margin-bottom:20px;
      color:white;
      text-transform:capitalize;
    }

    .card4 {
      width:500px;
      background:getprotobyname;
      border-radius:16px;
      padding:25px 25px 30px;
      box-shadow:0 10px 25px rgba(0,0,0,0.3);
      transition:transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card-title4 {
      text-align:center;
      font-size:22px;
      margin-bottom:20px;
      color:white;
      text-transform:capitalize;
    }

    .add-task {
      display:block;
      background:red;
      color: #fff;
      padding:12px 20px;
      text-align:center;
      border-radius:50px;
      text-decoration:none;
      font-weight:600;
      transition:background 0.3s ease, transform 0.2s ease;
      margin-bottom:25px;
    }
    .add-task:hover {
        background:firebrick;
    }
     ul {
      list-style: none;
      max-width:700px;
      margin:0 auto;
      padding:0;
    }

    ul li {
      background: rgba(255,255,255,0.1);
      backdrop-filter:blur(10px);
      border: 1px solid rgba(255,255,255,0.15);
      border-radius: 10px;
      padding: 14px 18px;
      margin-bottom: 12px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      transition: all 0.3s ease;
      animation:fadeIn 1.2s ease forwards;
    }
    ul li:hover {
      background: rgba(255,255,255,0.25);
    }

     input[type="checkbox"] {
      transform: scale(1.3);
      cursor: pointer;
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

  <div class="card2">
    <h2 class="card-title2">To Do List Rumah</h2>
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


  <div class="card3">
    <h2 class="card-title3">To Do List Sekolah</h2>
   <ul>
        @foreach ($tasksSekolah as $task)
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

    <a href="{{ route('tasks.create', ['category' => 'sekolah']) }}" class="add-task">+ Tambah Tugas Sekolah</a>
  </div>

  <div class="card4">
    <h2 class="card-title4">To Do List Santay</h2>
   <ul>
        @foreach ($tasksSantay as $task)
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

    <a href="{{ route('tasks.create', ['category' => 'santay']) }}" class="add-task">+ Tambah Tugas Santay</a>
  </div>