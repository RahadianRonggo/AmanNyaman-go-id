<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - CuanTani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-100 h-screen flex items-center justify-center font-sans">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md border-t-4 border-blue-600 relative">
        
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-blue-800">Daftar Akun Baru</h1>
            <p class="text-slate-500 text-sm">Bergabung menjadi investor CuanTani</p>
        </div>

        <form action="{{ route('register.proses') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-slate-600 text-sm font-bold mb-2">Nama Lengkap</label>
                <input type="text" name="name" class="w-full border border-slate-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required>
            </div>

            <div class="mb-4">
                <label class="block text-slate-600 text-sm font-bold mb-2">Email</label>
                <input type="email" name="email" class="w-full border border-slate-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required>
            </div>
            
            <div class="mb-6 relative">
                <label class="block text-slate-600 text-sm font-bold mb-2">Password Baru</label>
                <input type="password" name="password" id="regPass" class="w-full border border-slate-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none pr-10" required>
                <button type="button" onclick="togglePass('regPass', 'eyeReg')" class="absolute right-3 top-9 text-slate-400 hover:text-blue-600">
                    <i id="eyeReg" class="fas fa-eye"></i>
                </button>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg shadow-lg active:scale-95 transition">BUAT AKUN</button>
        </form>

        <div class="mt-6 text-center text-sm">
            <span class="text-slate-500">Sudah punya akun?</span>
            <a href="{{ route('login') }}" class="text-blue-600 font-bold hover:underline">Login di sini</a>
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