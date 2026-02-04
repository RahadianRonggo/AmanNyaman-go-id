<!DOCTYPE html>
<html lang="id">
<head>
    <title>Masuk - CuanTani</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm border border-slate-200">
        <h1 class="text-2xl font-bold text-center text-slate-800 mb-6">Login CuanTani</h1>
        
        @if ($errors->any())
            <div class="bg-red-100 text-red-600 p-3 rounded-lg text-sm mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-bold text-slate-700 mb-1">Email</label>
                <input type="email" name="email" class="w-full p-3 border rounded-lg bg-slate-50 focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
            </div>
            <div class="mb-6">
                <label class="block text-sm font-bold text-slate-700 mb-1">Password</label>
                <input type="password" name="password" class="w-full p-3 border rounded-lg bg-slate-50 focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
            </div>
            <button type="submit" class="w-full bg-emerald-600 text-white font-bold py-3 rounded-xl hover:bg-emerald-700 transition">MASUK</button>
        </form>
        <p class="text-center mt-4 text-sm text-slate-500">
            Belum punya akun? <a href="{{ route('register') }}" class="text-emerald-600 font-bold">Daftar Sekarang</a>
        </p>
        <p class="text-center mt-2 text-xs">
            <a href="{{ route('home') }}" class="text-slate-400">Kembali ke Pasar</a>
        </p>
    </div>
</body>
</html>