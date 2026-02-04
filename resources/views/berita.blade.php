<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kabar Tani - Berita Terkini</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        body { padding-bottom: 90px; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 font-sans">

    <div class="bg-white sticky top-0 z-50 shadow-sm">
        <div class="flex justify-between items-center p-4">
            <h1 class="text-xl font-black text-emerald-800 tracking-wide">KABAR<span class="text-yellow-500">TANI</span></h1>
            <div class="flex gap-3 text-slate-500">
                <i class="fas fa-search text-lg"></i>
                <i class="far fa-bell text-lg"></i>
            </div>
        </div>

        <div class="flex overflow-x-auto gap-3 px-4 pb-4 no-scrollbar">
            @foreach($kategori as $k)
            <button class="px-4 py-1.5 rounded-full text-xs font-bold whitespace-nowrap border transition
                {{ $loop->first ? 'bg-emerald-600 text-white border-emerald-600 shadow-md' : 'bg-white text-slate-500 border-slate-200 hover:border-emerald-500' }}">
                {{ $k }}
            </button>
            @endforeach
        </div>
    </div>

    <div class="p-4 space-y-6">
        <div class="bg-white rounded-2xl overflow-hidden shadow-md group cursor-pointer relative">
            <div class="h-48 overflow-hidden">
                <img src="{{ $berita[0]['foto'] }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
            </div>
            <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/80 to-transparent p-4 pt-10">
                <span class="bg-red-600 text-white text-[10px] font-bold px-2 py-1 rounded uppercase mb-2 inline-block">Hot News</span>
                <h2 class="text-white font-bold text-lg leading-tight">{{ $berita[0]['judul'] }}</h2>
                <p class="text-slate-300 text-xs mt-1">{{ $berita[0]['jam'] }} &bull; {{ $berita[0]['sumber'] }}</p>
            </div>
        </div>

        <div class="space-y-4">
            <h3 class="font-bold text-slate-700 text-lg">Berita Terkini</h3>
            @foreach(array_slice($berita, 1) as $b)
            <div class="flex gap-4 bg-white p-3 rounded-xl border border-slate-100 hover:shadow-md transition cursor-pointer">
                <div class="w-24 h-24 bg-slate-200 rounded-lg overflow-hidden flex-shrink-0">
                    <img src="{{ $b['foto'] }}" class="w-full h-full object-cover">
                </div>
                <div class="flex flex-col justify-between py-1">
                    <div>
                        <span class="text-[10px] font-bold text-emerald-600 uppercase">{{ $b['kategori'] }}</span>
                        <h4 class="font-bold text-sm text-slate-800 leading-snug line-clamp-2">{{ $b['judul'] }}</h4>
                    </div>
                    <div class="flex justify-between items-center text-[10px] text-slate-400">
                        <span>{{ $b['sumber'] }}</span>
                        <span>{{ $b['jam'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center pt-4">
            <button class="text-emerald-600 font-bold text-sm hover:underline">Muat Lebih Banyak...</button>
        </div>
    </div>

    <div class="fixed bottom-0 left-0 w-full bg-white/95 backdrop-blur-lg border-t border-slate-200 shadow-[0_-5px_20px_rgba(0,0,0,0.1)] py-3 px-6 flex justify-between items-center z-50 md:hidden transition-all duration-300">
        
        <a href="{{ route('home') }}" class="flex flex-col items-center gap-1 {{ Route::is('home') ? 'text-emerald-600 transform scale-110 drop-shadow-sm' : 'text-slate-400 hover:text-emerald-600' }} transition duration-200">
            <i class="fas fa-home text-lg"></i>
            <span class="text-[10px] font-bold">Home</span>
        </a>

        <a href="{{ route('berita') }}" class="flex flex-col items-center gap-1 {{ Route::is('berita') ? 'text-emerald-600 transform scale-110 drop-shadow-sm' : 'text-slate-400 hover:text-emerald-600' }} transition duration-200">
            <i class="fas fa-newspaper text-lg"></i>
            <span class="text-[10px] font-bold">Berita</span>
        </a>

        <a href="{{ route('member.portfolio') }}" class="flex flex-col items-center gap-1 {{ Route::is('member.portfolio') ? 'text-emerald-600 transform scale-110 drop-shadow-sm' : 'text-slate-400 hover:text-emerald-600' }} transition duration-200">
            <i class="fas fa-wallet text-lg"></i>
            <span class="text-[10px] font-bold">Dompet</span>
        </a>

        <a href="{{ route('member.profile') }}" class="flex flex-col items-center gap-1 {{ Route::is('member.profile') ? 'text-emerald-600 transform scale-110 drop-shadow-sm' : 'text-slate-400 hover:text-emerald-600' }} transition duration-200">
            <i class="fas fa-user text-lg"></i>
            <span class="text-[10px] font-bold">Akun</span>
        </a>

    </div>
</body>
</html>