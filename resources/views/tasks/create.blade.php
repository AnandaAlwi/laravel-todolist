<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tugas Baru</title>
    <style>
        * {
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        body {  
            font-family:"Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background:linear-gradient(135deg,black,gray);
            padding:40px;
            background-attachment:fixed;
        }
        h1 {
            text-align:center;
            font-size:25px;
            margin-bottom:30px;
            color: #fff;
        }
        form {
            max-width:480px;
            margin:0 auto;
            padding:28px 24px;
            background:black;
            border-radius:12px;
            box-shadow:0 6px 16px rgba(0,0,0,0.12);
            display:flex;
            flex-direction:column;
            gap:18px;
        }
        input[type="text"] {
            width:100%;
            padding:12px 14px;
            border:1px solid #ccc;
            border-radius:8px;
            font-size:16px;
            transition:border-color: 0.2s,box-shadow 0.2s;
        }
        input[type="text"]:focus {
            border-color: #3498db;
            box-shadow:0 0 6px #3498db66;
            outline:none;
        }
        button {
            background: #2e46ccff;
            color: #fff;
            border:none;
            padding:12px;
            font-size:16px;
            border-radius:8px;
            cursor:pointer;
            font-weight:bold;
            transition:background 0.2s,transform 0.1s;
        }
        button:hover {
            background: #273baeff;
        }
        button:active {
            transform:scale(0.98);
        }
        .back-link {
            display:block;
            max-width:480px;
            margin:20px auto 0;
            text-align:center;
            background: #db3434ff;  
            color: #fff;
            padding:12px;
            border-radius:8px;
            text-decoration:none;
            font-weight:bold;
        }
        .back-link:hover {
            background: #b92929ff;
        }
     </style>
</head> 
<body>  
    <h1>Tambah Tugas Baru</h1>
        
    <form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Judul tugas" required>
    @error('title')
        <p style="color: red; font-size: 14px; margin-top: 5px;">{{ $message }}</p>
    @enderror
    <button type="submit">Simpan</button>
</form>

        
    <a href="{{ route('tasks.index') }}" class="back-link">← Kembali</a>
</body>
</html> 