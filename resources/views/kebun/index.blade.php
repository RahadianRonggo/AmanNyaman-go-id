<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CuanTani Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-50 font-sans text-slate-800">

    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="container mx-auto px-6 h-16 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <div class="bg-emerald-600 text-white p-1.5 rounded-lg">
                    <i class="fas fa-wallet"></i>
                </div>
                <span class="font-bold text-xl text-emerald-800">CUANTANI</span>
            </div>
            <div class="flex items-center gap-3">
                <div class="text-right hidden md:block">
                    <p class="text-xs text-slate-400">Halo, Investor</p>
                    <p class="text-sm font-bold text-slate-700">{{ Auth::user()->name ?? 'Taruna' }}</p>
                </div>
            </div>
        </div>
    </nav>

    <div class="bg-white pt-8 pb-10 border-b border-slate-100">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-slate-800">Rp {{ number_format(Auth::user()->saldo ?? 0, 0, ',', '.') }}</h2>
            <p class="text-slate-500">Total Aset Saya</p>
        </div>
    </div>

    <main class="container mx-auto px-6 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-5">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-bold text-slate-700">Saham Ternak</h3>
                    <span class="bg-orange-100 text-orange-600 text-xs px-2 py-1 rounded font-bold">TRK</span>
                </div>
                <div class="space-y-3">
                    @foreach($kebuns->where('kategori', 'Ternak') as $item)
                    <a href="{{ url('/kebun/detail/'.$item->id) }}" class="flex justify-between items-center p-2 hover:bg-slate-50 rounded cursor-pointer transition">
                        <div>
                            <h4 class="font-bold text-sm text-slate-700">{{ $item->nama }}</h4>
                            <p class="text-xs text-slate-400">Sentra Ternak</p>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-sm">Rp {{ number_format($item->harga/1000, 0) }}k</p>
                            <p class="text-xs text-green-500 font-bold">+{{ $item->roi }}%</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-5">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-bold text-slate-700">Saham Tani</h3>
                    <span class="bg-green-100 text-green-600 text-xs px-2 py-1 rounded font-bold">TANI</span>
                </div>
                <div class="space-y-3">
                    @foreach($kebuns->where('kategori', 'Pertanian') as $item)
                    <a href="{{ url('/kebun/detail/'.$item->id) }}" class="flex justify-between items-center p-2 hover:bg-slate-50 rounded cursor-pointer transition">
                        <div>
                            <h4 class="font-bold text-sm text-slate-700">{{ $item->nama }}</h4>
                            <p class="text-xs text-slate-400">Lumbung Padi</p>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-sm">Rp {{ number_format($item->harga/1000, 0) }}k</p>
                            <p class="text-xs text-green-500 font-bold">+{{ $item->roi }}%</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-5">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-bold text-slate-700">Saham Kebun</h3>
                    <span class="bg-blue-100 text-blue-600 text-xs px-2 py-1 rounded font-bold">KBN</span>
                </div>
                <div class="space-y-3">
                    @foreach($kebuns->where('kategori', 'Perkebunan') as $item)
                    <a href="{{ url('/kebun/detail/'.$item->id) }}" class="flex justify-between items-center p-2 hover:bg-slate-50 rounded cursor-pointer transition">
                        <div>
                            <h4 class="font-bold text-sm text-slate-700">{{ $item->nama }}</h4>
                            <p class="text-xs text-slate-400">Perkebunan</p>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-sm">Rp {{ number_format($item->harga/1000, 0) }}k</p>
                            <p class="text-xs text-blue-500 font-bold">{{ $item->durasi_panen }} Bln</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

        </div>
    </main>

</body>
</html>