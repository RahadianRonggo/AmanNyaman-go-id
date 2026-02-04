<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CuanTani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-100 h-screen flex items-center justify-center font-sans">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md border-t-4 border-emerald-600 relative">
        
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-emerald-800">CuanTani</h1>
            <p class="text-slate-500 text-sm">Masuk untuk akses Dashboard</p>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4 text-sm font-bold">
                <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4 text-sm font-bold">
                <i class="fas fa-exclamation-triangle mr-1"></i> {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.proses') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-slate-600 text-sm font-bold mb-2">Email</label>
                <input type="email" name="email" class="w-full border border-slate-300 p-3 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none" placeholder="admin@cuantani.com" required>
            </div>
            
            <div class="mb-6 relative">
                <label class="block text-slate-600 text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" id="passInput" class="w-full border border-slate-300 p-3 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none pr-10" placeholder="••••••••" required>
                <button type="button" onclick="togglePass('passInput', 'eyeIcon')" class="absolute right-3 top-9 text-slate-400 hover:text-emerald-600">
                    <i id="eyeIcon" class="fas fa-eye"></i>
                </button>
            </div>

            <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 rounded-lg shadow-lg active:scale-95 transition">MASUK MARKAS</button>
        </form>

        <div class="mt-6 text-center text-sm">
            <span class="text-slate-500">Belum punya akun?</span>
            <a href="{{ route('register') }}" class="text-emerald-600 font-bold hover:underline">Daftar Sekarang</a>
        </div>
    </div>

    <script>
        function togglePass(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (input.type === "password") {
                input.type = "text";
                icon.classList.replace("fa-eye", "fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.replace("fa-eye-slash", "fa-eye");
            }
        }
    </script>
</body>
</html>