<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $kebun->nama_proyek }} - Detail Prospektus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 font-sans">

    <nav class="bg-white p-4 shadow-sm sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-emerald-700 font-bold flex items-center hover:underline gap-2">
                <i class="fas fa-arrow-left"></i> Kembali ke Pasar
            </a>
            <span class="font-bold text-slate-400 text-xs uppercase tracking-widest border border-slate-200 px-3 py-1 rounded-full">
                Kode Emiten: TANI-{{ $kebun->id }}0X
            </span>
        </div>
    </nav>

    <div class="relative bg-slate-900 h-72 md:h-96 overflow-hidden">
        <div class="absolute inset-0 opacity-60">
            @if($kebun->foto)
                @if(str_starts_with($kebun->foto, 'http'))
                    <img src="{{ $kebun->foto }}" class="w-full h-full object-cover">
                @else
                    <img src="{{ asset('storage/' . $kebun->foto) }}" class="w-full h-full object-cover">
                @endif
            @else
                <div class="w-full h-full bg-emerald-800 flex items-center justify-center"><span class="text-6xl">🌾</span></div>
            @endif
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent"></div>
        <div class="container mx-auto relative z-10 h-full flex flex-col justify-end pb-8 px-4">
            <div class="flex gap-2 mb-4">
                <span class="bg-emerald-500 text-white text-[10px] font-bold px-3 py-1 rounded uppercase shadow-lg">IPO Live</span>
                <span class="bg-yellow-400 text-yellow-900 text-[10px] font-bold px-3 py-1 rounded uppercase shadow-lg">High Return</span>
            </div>
            <h1 class="text-3xl md:text-5xl font-black text-white mb-2 drop-shadow-xl">{{ $kebun->nama_proyek }}</h1>
            <p class="text-slate-300 flex items-center gap-4 text-sm font-medium">
                <span><i class="fas fa-map-marker-alt text-red-500"></i> {{ $kebun->lokasi }}</span>
                <span><i class="fas fa-clock text-blue-400"></i> Tenor {{ $kebun->durasi }} Bulan</span>
            </p>
        </div>
    </div>

    <div class="container mx-auto -mt-6 px-4 relative z-10 pb-20" x-data="{ tab: 'ringkasan' }">
        <div class="bg-white rounded-t-xl shadow-sm border-b flex overflow-x-auto no-scrollbar">
            <button @click="tab = 'ringkasan'" :class="{ 'text-emerald-600 border-b-4 border-emerald-600 bg-emerald-50': tab === 'ringkasan' }" class="flex-1 py-4 px-6 font-bold text-sm text-slate-500 hover:bg-slate-50 transition uppercase whitespace-nowrap"><i class="fas fa-file-alt mr-2"></i> Prospektus</button>
            <button @click="tab = 'timeline'" :class="{ 'text-emerald-600 border-b-4 border-emerald-600 bg-emerald-50': tab === 'timeline' }" class="flex-1 py-4 px-6 font-bold text-sm text-slate-500 hover:bg-slate-50 transition uppercase whitespace-nowrap"><i class="fas fa-tasks mr-2"></i> Live Tracking</button>
            <button @click="tab = 'simulasi'" :class="{ 'text-emerald-600 border-b-4 border-emerald-600 bg-emerald-50': tab === 'simulasi' }" class="flex-1 py-4 px-6 font-bold text-slate-500 hover:bg-slate-50 transition uppercase whitespace-nowrap"><i class="fas fa-calculator mr-2"></i> Simulasi Cuan</button>
        </div>

        <div class="bg-white p-6 md:p-8 rounded-b-xl shadow-xl min-h-[400px]">
            <div x-show="tab === 'ringkasan'" x-transition.opacity>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="md:col-span-2">
                        <h3 class="font-bold text-xl text-slate-800 mb-4">Analisa Fundamental</h3>
                        <p class="text-slate-600 leading-relaxed text-justify mb-6 whitespace-pre-line text-sm border-l-4 border-emerald-500 pl-4 bg-emerald-50/50 p-2 rounded-r">{{ $kebun->deskripsi }}</p>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-8">
                            <div class="p-4 bg-white rounded-xl shadow border border-slate-100 text-center"><span class="text-[10px] text-slate-400 uppercase font-bold tracking-widest">ROI / Tahun</span><p class="text-2xl font-black text-emerald-500">{{ $kebun->roi }}%</p></div>
                            <div class="p-4 bg-white rounded-xl shadow border border-slate-100 text-center"><span class="text-[10px] text-slate-400 uppercase font-bold tracking-widest">Target Dana</span><p class="text-lg font-bold text-slate-700">{{ number_format($kebun->target_dana / 1000000) }} Juta</p></div>
                            <div class="p-4 bg-white rounded-xl shadow border border-slate-100 text-center"><span class="text-[10px] text-slate-400 uppercase font-bold tracking-widest">Risiko</span><p class="text-lg font-bold text-blue-500">Moderat</p></div>
                            <div class="p-4 bg-white rounded-xl shadow border border-slate-100 text-center"><span class="text-[10px] text-slate-400 uppercase font-bold tracking-widest">Min. Invest</span><p class="text-lg font-bold text-slate-700">1 Lot</p></div>
                        </div>
                    </div>
                    <div>
                        <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200 mb-6 sticky top-24">
                            <div class="flex justify-between items-center mb-4"><h4 class="font-bold text-slate-700 text-sm uppercase">Order Book</h4><span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span></div>
                            
                            <a href="{{ route('investasi.checkout', $kebun->id) }}" class="flex items-center justify-center gap-2 w-full bg-emerald-600 text-white text-center py-4 rounded-xl font-bold hover:bg-emerald-700 transition mb-3 shadow-lg hover:shadow-emerald-500/30 hover:-translate-y-1 group">
                                <i class="fas fa-shopping-cart text-xl"></i> Beli Lot Sekarang
                            </a>
                            
                            <button class="w-full bg-white border border-slate-300 text-slate-600 py-3 rounded-xl font-bold text-sm hover:bg-slate-50 transition flex items-center justify-center gap-2 mb-4"><i class="fas fa-file-pdf text-red-500"></i> Download Prospektus</button>
                            <div class="text-[10px] text-slate-400 text-center border-t pt-4"><i class="fas fa-shield-alt text-emerald-500"></i> Dijamin aman oleh CuanTani Secure</div>
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="tab === 'timeline'" x-transition.opacity style="display: none;">
                <h3 class="font-bold text-xl text-slate-800 mb-6 flex items-center gap-2"><span class="w-3 h-3 bg-red-500 rounded-full animate-ping"></span> Live Project Updates</h3>
                <div class="relative border-l-4 border-slate-200 ml-4 space-y-8">
                    @if(isset($timeline))
                        @foreach($timeline as $t)
                        <div class="relative pl-8 group">
                            <div class="absolute -left-[13px] top-0 w-6 h-6 rounded-full border-4 border-white {{ $t['status'] == 'done' ? 'bg-emerald-500' : ($t['status'] == 'goal' ? 'bg-yellow-400' : 'bg-slate-300') }} shadow-md group-hover:scale-125 transition"></div>
                            <div class="bg-slate-50 p-5 rounded-xl border border-slate-100 group-hover:bg-white group-hover:shadow-md transition">
                                <span class="text-[10px] font-bold uppercase tracking-widest {{ $t['status'] == 'done' ? 'text-emerald-600' : 'text-slate-400' }}">{{ $t['date'] }}</span>
                                <h4 class="font-bold text-lg text-slate-800 mt-1 {{ $t['status'] == 'done' ? 'line-through decoration-emerald-500 decoration-2' : '' }}">{{ $t['title'] }}</h4>
                                <p class="text-sm text-slate-500 mt-2">{{ $t['desc'] }}</p>
                                @if($t['status'] == 'done') <div class="mt-3 inline-block px-2 py-1 bg-emerald-100 text-emerald-700 text-[10px] font-bold rounded"><i class="fas fa-check-circle"></i> Selesai</div> @endif
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div x-show="tab === 'simulasi'" x-transition.opacity style="display: none;" x-data="{ nominal: 1000000, roi: {{ $kebun->roi }} }">
                <h3 class="font-bold text-xl text-slate-800 mb-6">Simulasi Keuntungan (Dividen)</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <div class="bg-white p-6 rounded-xl border border-emerald-100 mb-6 shadow-sm">
                            <label class="block font-bold text-slate-700 mb-2 text-sm uppercase">Modal Investasi</label>
                            <div class="flex items-center border-2 border-emerald-500 rounded-lg overflow-hidden"><span class="bg-emerald-100 px-4 py-3 font-bold text-emerald-800 border-r border-emerald-500">Rp</span><input type="number" x-model="nominal" class="w-full p-3 outline-none font-bold text-lg text-slate-700"></div>
                            <input type="range" min="100000" max="100000000" step="100000" x-model="nominal" class="w-full mt-4 accent-emerald-600 cursor-pointer">
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center p-4 bg-slate-50 rounded-lg border border-slate-200"><span class="text-sm text-slate-500 font-bold">ROI (Per Tahun)</span><span class="font-black text-emerald-600 text-lg">{{ $kebun->roi }}%</span></div>
                        <div class="flex justify-between items-center p-4 bg-slate-50 rounded-lg border border-slate-200"><span class="text-sm text-slate-500 font-bold">Estimasi Profit</span><span class="font-black text-green-500 text-lg" x-text="'+ Rp ' + parseInt(Number(nominal) * (roi/100)).toLocaleString('id-ID')"></span></div>
                        <div class="flex justify-between items-center p-6 bg-emerald-600 text-white rounded-xl shadow-lg shadow-emerald-500/30 transform scale-105"><span class="text-sm font-bold uppercase tracking-widest">Total Cair</span><span class="font-black text-2xl" x-text="'Rp ' + parseInt(Number(nominal) + (Number(nominal) * (roi/100))).toLocaleString('id-ID')"></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>