<!DOCTYPE html>
<html lang="id">
<head>
    <title>Daftar - CuanTani</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm border border-slate-200">
        <h1 class="text-2xl font-bold text-center text-slate-800 mb-2">Buat Akun</h1>
        <p class="text-center text-slate-400 text-xs mb-6">Mulai investasi pertanian hari ini</p>
        
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="block text-xs font-bold text-slate-700 mb-1">Nama Lengkap</label>
                <input type="text" name="name" class="w-full p-3 border rounded-lg bg-slate-50 focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
            </div>
            <div class="mb-3">
                <label class="block text-xs font-bold text-slate-700 mb-1">Email</label>
                <input type="email" name="email" class="w-full p-3 border rounded-lg bg-slate-50 focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
            </div>
            <div class="mb-3">
                <label class="block text-xs font-bold text-slate-700 mb-1">Password</label>
                <input type="password" name="password" class="w-full p-3 border rounded-lg bg-slate-50 focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
            </div>
            <div class="mb-6">
                <label class="block text-xs font-bold text-slate-700 mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full p-3 border rounded-lg bg-slate-50 focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
            </div>
            <button type="submit" class="w-full bg-emerald-600 text-white font-bold py-3 rounded-xl hover:bg-emerald-700 transition">DAFTAR AKUN</button>
        </form>
        <p class="text-center mt-4 text-sm text-slate-500">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-emerald-600 font-bold">Login</a>
        </p>
    </div>
</body>
</html>