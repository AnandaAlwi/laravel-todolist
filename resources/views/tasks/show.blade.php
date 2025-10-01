<!DOCTYPE html>
<html>
<head>
    <title>Detail Tugas</title>
    <style>
        * {
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        body {
            font-family: "Segoe UI", Tahoma,Geneva,Verdana,sans-serif;
            background:linear-gradient(135deg, #3a3838ff, #000000ff);
            color: #2c3e50;
            padding:40px;
            background-attachment:fixed;
        }
        h1 {
            text-align:center;
            font-size:30px;
            margin-bottom:30px;
            color: #ffffffff;
        }
        .card {
            max-width:400px;
            margin:0 auto;
            background:#fff;
            padding:28px 24px;
            border-radius:12px;
            box-shadow:0 6px 16px rgba(0,0,0,0.12);
        }
        .card p {
            font-size:18px;
            margin-bottom:16px;
            line-height:1.6;
        }
        .card p strong {
            color:#2c3e50;
            min-width:120px;
            display:inline-block;
        }
        .actions {
            margin-top:25px;
            display:flex;
            gap:12px;
        }
        .btn {
            display:inline-block;
            padding:10px 18px;
            border-radius:8px;
            text-decoration:none;
            font-weight:bold;
            transition:background 0.2s, transform 0.1s;
            color:#fff;
        }
        .btn:hover {
            transform:scale(1.03);
        }
        .btn-edit {
            background:#3498db;
        }
        .btn-edit:hover {
            background:#2980b9;
        }
        .btn-back {
            background:#2ecc71;
        }
        .btn-back:hover {
            background:#27ae60;
        }
    </style>
</head>
<body>
    <h1>Detail Tugas</h1>

    <div class="card">
        <p><strong>Judul:</strong> {{ $task->title }}</p>
        <p><strong>Status:</strong> {{ $task->is_done ? 'Selesai ✅' : 'Belum selesai ❌' }}</p>
       <p><strong>Dibuat pada:</strong> <span id="current-time"></span></p>

<script>
  function updateTime() {
    const now = new Date();
    const options = { 
      day: '2-digit', month: 'short', year: 'numeric',
      hour: '2-digit', minute: '2-digit'
    };
    document.getElementById('current-time').textContent =
      now.toLocaleString('id-ID', options);
  }

  setInterval(updateTime, 1000);
  updateTime();
</script>
 

        <div class="actions">
            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-edit">Edit</a>
            <a href="{{ route('tasks.index') }}" class="btn btn-back">← Kembali</a>
        </div>
    </div>
</body>
</html>
