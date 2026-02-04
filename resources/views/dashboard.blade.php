<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard CuanTani</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .card-custom { border: none; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        .header-bg { background: linear-gradient(45deg, #198754, #20c997); color: white; border-radius: 15px 15px 0 0; }
        .btn-custom { border-radius: 50px; padding: 10px 30px; font-weight: bold; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">🌾 CuanTani Command Center</a>
            <span class="navbar-text text-white">
                Siap, Ndan!
            </span>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-custom">
                    <div class="card-header header-bg p-4 text-center">
                        <h3 class="mb-0">MARKAS KOMANDO</h3>
                        <small>Panel Kontrol Utama</small>
                    </div>
                    
                    <div class="card-body p-5 text-center">
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="User Icon" width="100" class="mb-3">
                        
                        <h2 class="fw-bold">Selamat Datang, {{ Auth::user()->name }}! 👮‍♂️</h2>
                        <p class="text-muted mb-4">Anda berhasil masuk ke zona aman. Apa perintah selanjutnya?</p>
                        
                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-4">
                            <button class="btn btn-success btn-custom shadow">📊 Lihat Laporan</button>
                            <button class="btn btn-outline-secondary btn-custom shadow">👥 Kelola Pasukan</button>
                        </div>

                        <hr class="my-4">

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100 py-2 fw-bold">KELUAR (LOGOUT)</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>