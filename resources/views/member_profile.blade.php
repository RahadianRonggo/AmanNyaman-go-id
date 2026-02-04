<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Akun Saya</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body class="bg-slate-50 font-sans pb-24">
    <nav class="bg-white p-4 shadow-sm sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <span class="font-black text-emerald-800 text-lg">Akun Saya</span>
            <a href="/" class="text-slate-400"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </nav>
    <div class="container mx-auto px-4 mt-6">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-16 h-16 bg-slate-200 rounded-full overflow-hidden border-2 border-white shadow">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user['name']) }}&background=10b981&color=fff" class="w-full h-full">
            </div>
            <div>
                <h2 class="font-bold text-lg text-slate-800">{{ $user['name'] }}</h2>
                <span class="bg-emerald-100 text-emerald-700 text-[10px] font-bold px-2 py-0.5 rounded-full">Verifikasi OK</span>
            </div>
        </div>
        <div class="bg-slate-800 rounded-2xl p-6 text-white shadow-xl mb-6 relative overflow-hidden">
            <h3 class="text-2xl font-black text-yellow-400 mb-2"><i class="fas fa-medal"></i> {{ $level }}</h3>
            <div class="w-full bg-slate-700 rounded-full h-2"><div class="bg-yellow-400 h-2 rounded-full" style="width: {{ $progress }}%"></div></div>
        </div>
    </div>
    <div class="fixed bottom-0 left-0 w-full bg-white border-t border-slate-200 shadow py-3 px-6 flex justify-between items-center z-50 md:hidden">
        <a href="{{ route('home') }}" class="flex flex-col items-center gap-1 {{ Route::is('home') ? 'text-emerald-600' : 'text-slate-400' }}"><i class="fas fa-home text-lg"></i><span class="text-[10px] font-bold">Home</span></a>
        <a href="{{ route('berita') }}" class="flex flex-col items-center gap-1 {{ Route::is('berita') ? 'text-emerald-600' : 'text-slate-400' }}"><i class="fas fa-newspaper text-lg"></i><span class="text-[10px] font-bold">Berita</span></a>
        <a href="{{ route('member.portfolio') }}" class="flex flex-col items-center gap-1 {{ Route::is('member.portfolio') ? 'text-emerald-600' : 'text-slate-400' }}"><i class="fas fa-wallet text-lg"></i><span class="text-[10px] font-bold">Dompet</span></a>
        <a href="{{ route('member.profile') }}" class="flex flex-col items-center gap-1 {{ Route::is('member.profile') ? 'text-emerald-600' : 'text-slate-400' }}"><i class="fas fa-user text-lg"></i><span class="text-[10px] font-bold">Akun</span></a>
    </div>
</body>
</html>