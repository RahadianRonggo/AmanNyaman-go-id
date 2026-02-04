<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Akun Saya - CuanTani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body class="bg-slate-50 font-sans pb-24">

    <nav class="bg-white p-4 shadow-sm sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <span class="font-black text-emerald-800 text-lg">Akun Saya</span>
            <a href="/" class="text-slate-400 hover:text-red-500"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </nav>

    <div class="container mx-auto px-4 mt-6">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-16 h-16 bg-slate-200 rounded-full overflow-hidden border-2 border-white shadow-md">
                <img src="https://ui-avatars.com/api/?name=Sultan+Andara&background=10b981&color=fff" class="w-full h-full">
            </div>
            <div>
                <h2 class="font-bold text-lg text-slate-800">{{ $user['name'] }}</h2>
                <p class="text-xs text-slate-500">{{ $user['email'] }}</p>
                <span class="inline-block mt-1 bg-emerald-100 text-emerald-700 text-[10px] font-bold px-2 py-0.5 rounded-full">Verifikasi OK</span>
            </div>
        </div>

        <div class="bg-slate-800 rounded-2xl p-6 text-white shadow-xl mb-6 relative overflow-hidden">
            <div class="absolute -right-6 -bottom-6 text-white opacity-5 text-9xl"><i class="fas fa-crown"></i></div>
            <p class="text-xs text-slate-400 uppercase font-bold">Level Member</p>
            <h3 class="text-2xl font-black text-yellow-400 mb-2"><i class="fas fa-medal"></i> {{ $level }}</h3>
            
            <div class="flex justify-between text-[10px] text-slate-300 mb-1">
                <span>Progress Naik Level</span>
                <span>{{ $progress }}%</span>
            </div>
            <div class="w-full bg-slate-700 rounded-full h-2">
                <div class="bg-yellow-400 h-2 rounded-full" style="width: {{ $progress }}%"></div>
            </div>
        </div>

        <div class="space-y-3">
            <div class="bg-white p-4 rounded-xl border border-slate-100 flex justify-between items-center">
                <span class="text-sm font-bold text-slate-600"><i class="fas fa-id-card w-6 text-slate-400"></i> Data Diri</span>
                <i class="fas fa-chevron-right text-xs text-slate-300"></i>
            </div>
            <div class="bg-white p-4 rounded-xl border border-slate-100 flex justify-between items-center">
                <span class="text-sm font-bold text-slate-600"><i class="fas fa-university w-6 text-slate-400"></i> Rekening Bank</span>
                <i class="fas fa-chevron-right text-xs text-slate-300"></i>
            </div>
             <div class="bg-white p-4 rounded-xl border border-slate-100 flex justify-between items-center">
                <span class="text-sm font-bold text-slate-600"><i class="fas fa-shield-alt w-6 text-slate-400"></i> Keamanan</span>
                <i class="fas fa-chevron-right text-xs text-slate-300"></i>
            </div>
        </div>
    </div>

    <div class="fixed bottom-0 left-0 w-full bg-white border-t border-slate-200 shadow-lg py-3 px-6 flex justify-between items-center z-50 md:hidden">
        <a href="{{ route('home') }}" class="flex flex-col items-center gap-1 text-slate-400 hover:text-emerald-600">
            <i class="fas fa-home text-lg"></i><span class="text-[10px] font-bold">Home</span>
        </a>
        <a href="{{ route('berita') }}" class="flex flex-col items-center gap-1 text-slate-400 hover:text-emerald-600">
            <i class="fas fa-newspaper text-lg"></i><span class="text-[10px] font-bold">Berita</span>
        </a>
        <a href="{{ route('member.portfolio') }}" class="flex flex-col items-center gap-1 text-slate-400 hover:text-emerald-600">
            <i class="fas fa-wallet text-lg"></i><span class="text-[10px] font-bold">Dompet</span>
        </a>
        <a href="{{ route('member.profile') }}" class="flex flex-col items-center gap-1 text-emerald-600 transform scale-110">
            <i class="fas fa-user text-lg"></i><span class="text-[10px] font-bold">Akun</span>
        </a>
    </div>

</body>
</html>