<!DOCTYPE html>
<html>
<head>
    <title>Edit Tugas</title>
    <style>
        * {
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background:linear-gradient(135deg, #474747cc, #3f3f3fff, #080808ff);
            color: #f7fbffff;
            padding:40px;   
            background-attachment:fixed;
        }
        h1 {
            text-align:center;
            font-size:30px;
            margin-bottom:30px;
            color: #ffffffff;
        }
        form {
            max-width:480px;
            margin:0 auto;
            background:black;
            padding:28px 24px;
            border-radius:12px;
            box-shadow:0 6px 16px rgba(0,0,0,0.12);
            display:flex;
            flex-direction:column;
            gap:18px;
        }
        input[type="text"] {
            width:100%;
            padding:12px 14px;
            border:1px solid #030000ff;
            border-radius:8px;
            font-size:16px;
            transition:border-color 0.2s,box-shadow 0.2s;
        }
        input[type="text"]:focus {
            border-color: #3498db;
            box-shadow:0 0 6px rgba(52, 152, 219, 0.4);
            outline:none;
        }
        label {
            display:flex;
            align-items:center;
            font-size:16px;
            gap:8px;
            cursor:pointer;
            user-select:none;
        }
        input[type="checkbox"] {
            transform:scale(1.2);
            cursor:pointer;
        }
        button, .btn-link {
            display:inline-block;
            background:blue;
            color: #fff;
            border:none;
            padding:12px 18px;
            font-size:16px;
            border-radius:8px;
            cursor:pointer;
            font-weight:bold;
            text-align:center;
            text-decoration:none;
            transition:background 0.2, transform 0.1s;      
        }
        button:hover, .btn-link:hover {
            background:mediumblue;
        }
        button:active, .btn-link:active {
            transform:scale(0.98);
        }
        .btn-back {
            background: #cc2e2eff;
            margin:20px auto 0;
            max-width:480px;
            display:block;
        }
        .btn-back:hover {
            background: #ae2b27ff;
        }
    </style>
</head>
<body>
    <h1>Edit Tugas</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
    @csrf 
    @method('PUT')

    <input type="text" name="title" value="{{ old('title', $task->title) }}" placeholder="Judul Tugas" required>

    {{-- Pesan error untuk judul --}}
    @error('title')
        <div style="color: red; font-size: 14px; margin-top: 5px;">
            {{ $message }}
        </div>
    @enderror

    <label>
        <input type="checkbox" name="is_done" {{ $task->is_done ? 'checked' : '' }}>
        Selesai
    </label>

    <button type="submit">Update</button>
</form>

    <a href="{{ route('tasks.index') }}" class="btn-link btn-back">← Kembali</a>
</body>
</html>
