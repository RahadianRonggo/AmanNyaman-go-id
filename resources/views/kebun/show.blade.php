<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $kebun->nama }} - Detail CuanTani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-50 font-sans text-slate-800">

    <nav class="bg-emerald-800 text-white p-4 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="flex items-center gap-2 font-bold text-xl hover:text-emerald-200 transition">
                <i class="fas fa-arrow-left"></i> Kembali ke Pasar
            </a>
            <div class="flex items-center gap-3">
                <span class="text-xs bg-emerald-900 px-3 py-1 rounded-lg text-emerald-200">
                    <i class="fas fa-tag"></i> {{ $kebun->kode }}
                </span>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-6 max-w-5xl mt-4">
        
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-200">
            <div class="grid grid-cols-1 md:grid-cols-2">
                
                <div class="relative h-72 md:h-auto bg-slate-200 group overflow-hidden">
                    <img src="{{ asset('img/'.$kebun->gambar) }}" alt="{{ $kebun->nama }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                    <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <p class="text-xs font-bold bg-yellow-500 text-yellow-900 px-2 py-1 rounded inline-block mb-1">
                            {{ strtoupper($kebun->kategori) }}
                        </p>
                    </div>
                </div>

                <div class="p-8 flex flex-col justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-slate-800 mb-1 leading-tight">{{ $kebun->nama }}</h1>
                        <p class="text-slate-500 mb-6 flex items-center gap-2 text-sm">
                            <i class="fas fa-map-marker-alt text-red-500"></i> {{ $kebun->lokasi }}
                        </p>

                        <div class="grid grid-cols-3 gap-3 mb-6">
                            <div class="bg-emerald-50 p-3 rounded-xl border border-emerald-100 text-center">
                                <p class="text-[10px] uppercase tracking-wider text-slate-500">Harga</p>
                                <p class="font-bold text-emerald-700 text-sm md:text-base">Rp {{ number_format($kebun->harga/1000, 0) }}rb</p>
                            </div>
                            <div class="bg-blue-50 p-3 rounded-xl border border-blue-100 text-center">
                                <p class="text-[10px] uppercase tracking-wider text-slate-500">ROI</p>
                                <p class="font-bold text-blue-700 text-sm md:text-base">{{ $kebun->roi }}%</p>
                            </div>
                            <div class="bg-orange-50 p-3 rounded-xl border border-orange-100 text-center">
                                <p class="text-[10px] uppercase tracking-wider text-slate-500">Tenor</p>
                                <p class="font-bold text-orange-700 text-sm md:text-base">{{ $kebun->durasi }} Bln</p>
                            </div>
                        </div>

                        <h3 class="font-bold text-base mb-2 flex items-center gap-2 text-slate-700">
                            <i class="fas fa-info-circle text-emerald-500"></i> Tentang Proyek
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed text-justify">
                            {{ $kebun->deskripsi ?? 'Proyek investasi unggulan CuanTani yang dikelola secara profesional oleh mitra petani daerah. Memiliki potensi imbal hasil yang menarik dengan risiko yang terukur.' }}
                        </p>
                    </div>

                    <div class="mt-8 pt-6 border-t border-slate-100">
                        <a href="{{ route('kebun.checkout', $kebun->id) }}" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg transform hover:-translate-y-1 transition flex items-center justify-center gap-2 text-center decoration-0">
                            <span>Beli Saham {{ $kebun->kode }}</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <p class="text-center text-xs text-slate-400 mt-2">
                            <i class="fas fa-shield-alt"></i> Transaksi Aman & Terawasi
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <div class="mt-6 bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl p-6 text-white shadow-lg flex flex-col md:flex-row items-center gap-6 justify-between">
            <div class="flex items-center gap-4">
                <div class="bg-white/20 p-4 rounded-full backdrop-blur-sm">
                    <i class="fas fa-coins text-2xl"></i>
                </div>
                <div>
                    <h4 class="font-bold text-lg">Potensi Cuan</h4>
                    <p class="text-blue-100 text-sm">Estimasi keuntungan bersih setelah {{ $kebun->durasi }} bulan</p>
                </div>
            </div>
            <div class="text-right">
                <p class="text-3xl font-bold">
                    Rp {{ number_format(($kebun->harga * ($kebun->roi/100)), 0, ',', '.') }}
                </p>
                <p class="text-xs text-blue-200 bg-black/20 px-2 py-1 rounded inline-block mt-1">
                    *Belum termasuk modal awal
                </p>
            </div>
        </div>

    </div>
    
    <div class="h-10"></div>
</body>
</html>