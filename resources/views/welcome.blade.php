<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CuanTani Pro - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Ticker Animation */
        .ticker-wrap { width: 100%; overflow: hidden; background-color: #0f172a; color: white; }
        .ticker-move { display: inline-block; white-space: nowrap; padding-right: 100%; animation: ticker 25s linear infinite; }
        .ticker-item { display: inline-block; padding: 0 1.5rem; font-family: monospace; }
        @keyframes ticker { 0% { transform: translate3d(0, 0, 0); } 100% { transform: translate3d(-100%, 0, 0); } }
        
        /* Hide Scrollbar */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-slate-50 font-sans text-slate-800 pb-24 md:pb-0">

    <nav class="bg-white border-b border-slate-200 sticky top-0 z-40 shadow-sm">
        <div class="container mx-auto px-4 h-14 md:h-16 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <div class="bg-emerald-600 text-white p-1 rounded-lg">
                    <i class="fas fa-chart-bar text-sm md:text-lg"></i>
                </div>
                <span class="font-bold text-lg md:text-xl tracking-tight text-slate-900">CUAN<span class="text-emerald-600">TANI</span></span>
            </div>
            
            <div class="hidden md:flex items-center gap-6 text-sm font-semibold text-slate-500">
                <a href="{{ route('home') }}" class="{{ Route::is('home') ? 'text-emerald-600 border-b-2 border-emerald-600 pb-4 mt-4' : 'hover:text-emerald-600 pb-4 mt-4 transition' }}">
                    Pasar
                </a>
                
                <a href="{{ route('trading') }}" class="{{ Route::is('trading') ? 'text-yellow-500 border-b-2 border-yellow-500 pb-4 mt-4' : 'hover:text-yellow-500 pb-4 mt-4 transition' }}">
                    <i class="fas fa-bolt mr-1"></i> Trading
                </a>

                <a href="{{ route('portfolio') }}" class="hover:text-emerald-600 pb-4 mt-4 transition">Portofolio</a>
                <a href="{{ route('wallet') }}" class="hover:text-emerald-600 pb-4 mt-4 transition">Wallet</a>
                <a href="{{ route('account') }}" class="hover:text-emerald-600 pb-4 mt-4 transition">Akun</a>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('account') }}" class="flex items-center gap-2 hover:bg-slate-50 p-1 rounded-full transition">
                    <div class="text-right hidden sm:block">
                        <p class="text-[10px] text-slate-400">Halo, Investor</p>
                        <p class="text-sm font-bold text-slate-800 truncate max-w-[100px]">
                            {{ Auth::user()->name ?? 'Tamu' }}
                        </p>
                    </div>
                    <div class="w-8 h-8 bg-emerald-100 text-emerald-700 border border-emerald-200 rounded-full flex items-center justify-center font-bold text-xs uppercase">
                        {{ substr(Auth::user()->name ?? 'G', 0, 2) }}
                    </div>
                </a>
            </div>
        </div>
    </nav>

    <div class="ticker-wrap border-b border-slate-800">
        <div class="ticker-move text-[10px] md:text-xs py-2">
            @foreach($marketData as $m)
                <div class="ticker-item">
                    <span class="font-bold text-emerald-400">{{ $m['name'] }}</span>
                    <span class="ml-1 text-slate-300">{{ $m['price'] }}</span>
                    @if($m['trend'] == 'up')
                        <span class="text-emerald-500 ml-1"><i class="fas fa-caret-up"></i> {{ $m['change'] }}%</span>
                    @else
                        <span class="text-red-500 ml-1"><i class="fas fa-caret-down"></i> {{ abs($m['change']) }}%</span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <div class="container mx-auto px-4 py-4 md:py-6">
        
        <div class="bg-gradient-to-r from-emerald-600 to-emerald-800 rounded-2xl p-5 text-white shadow-lg mb-6 relative overflow-hidden">
            <div class="absolute right-0 bottom-0 opacity-10 transform translate-x-4 translate-y-4">
                <i class="fas fa-wallet text-9xl"></i>
            </div>
            <p class="text-emerald-100 text-xs mb-1">Total Nilai Aset</p>
            <h2 class="text-3xl font-bold tracking-tight">Rp 120.500.000</h2>
            <div class="flex gap-2 mt-4">
                <a href="{{ route('wallet') }}" class="bg-white/20 hover:bg-white/30 backdrop-blur-sm px-4 py-2 rounded-lg text-xs font-bold flex items-center gap-2 transition">
                    <i class="fas fa-plus-circle"></i> Deposit
                </a>
                <a href="{{ route('wallet') }}" class="bg-white/20 hover:bg-white/30 backdrop-blur-sm px-4 py-2 rounded-lg text-xs font-bold flex items-center gap-2 transition">
                    <i class="fas fa-arrow-circle-down"></i> Withdraw
                </a>
            </div>
        </div>

        <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm mb-6">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h2 class="text-slate-500 text-xs font-bold uppercase tracking-wide">Indeks Gabungan</h2>
                    <div class="flex items-end gap-2">
                        <p class="text-xl md:text-2xl font-bold text-slate-800">7,241.55</p>
                        <span class="text-emerald-500 text-xs font-bold mb-1 bg-emerald-50 px-1 rounded">+0.85%</span>
                    </div>
                </div>
                <div class="flex gap-1">
                     <span class="px-2 py-1 text-[10px] bg-slate-100 rounded text-slate-500 font-bold">1D</span>
                     <span class="px-2 py-1 text-[10px] bg-white border border-slate-200 rounded text-slate-400">1W</span>
                </div>
            </div>
            <div class="h-40 md:h-64 w-full">
                <canvas id="marketChart"></canvas>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm flex flex-col h-[400px]">
                <div class="p-3 border-b border-slate-100 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
                    <h3 class="font-bold text-slate-700 text-sm flex items-center gap-2">
                        <i class="fas fa-cow text-orange-500"></i> Saham Ternak
                    </h3>
                    <span class="text-[10px] bg-orange-100 text-orange-700 px-2 rounded font-bold">TRK</span>
                </div>
                <div class="overflow-y-auto flex-1 no-scrollbar p-1">
                    @forelse($peternakan as $p)
                        <a href="{{ route('kebun.detail.custom', $p->id) }}" class="flex justify-between items-center p-3 hover:bg-slate-50 rounded-lg transition border-b border-slate-50 last:border-0">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center font-bold text-[10px]">
                                    TRK
                                </div>
                                <div>
                                    <p class="font-bold text-slate-800 text-sm">{{ $p->kode }}</p>
                                    <p class="text-[10px] text-slate-400 truncate w-24">{{ $p->nama }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-mono text-xs font-semibold text-slate-700">Rp {{ number_format($p->harga/1000, 0) }}k</p>
                                <p class="text-[10px] {{ $p->roi > 10 ? 'text-emerald-500' : 'text-red-500' }} font-bold">
                                    {{ $p->roi > 10 ? '+' : '' }}{{ rand(-2, 5) + $p->roi }}%
                                </p>
                            </div>
                        </a>
                    @empty
                        <p class="text-center text-xs text-slate-400 mt-10">Data kosong.</p>
                    @endforelse
                </div>
            </div>

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm flex flex-col h-[400px]">
                <div class="p-3 border-b border-slate-100 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
                    <h3 class="font-bold text-slate-700 text-sm flex items-center gap-2">
                        <i class="fas fa-wheat text-emerald-500"></i> Saham Tani
                    </h3>
                    <span class="text-[10px] bg-emerald-100 text-emerald-700 px-2 rounded font-bold">TANI</span>
                </div>
                <div class="overflow-y-auto flex-1 no-scrollbar p-1">
                    @forelse($pertanian as $p)
                        <a href="{{ route('kebun.detail.custom', $p->id) }}" class="flex justify-between items-center p-3 hover:bg-slate-50 rounded-lg transition border-b border-slate-50 last:border-0">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-[10px]">
                                    TANI
                                </div>
                                <div>
                                    <p class="font-bold text-slate-800 text-sm">{{ $p->kode }}</p>
                                    <p class="text-[10px] text-slate-400 truncate w-24">{{ $p->nama }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-mono text-xs font-semibold text-slate-700">Rp {{ number_format($p->harga/1000, 0) }}k</p>
                                <p class="text-[10px] text-emerald-500 font-bold">
                                    ROI {{ $p->roi }}%
                                </p>
                            </div>
                        </a>
                    @empty
                        <p class="text-center text-xs text-slate-400 mt-10">Data kosong.</p>
                    @endforelse
                </div>
            </div>

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm flex flex-col h-[400px]">
                <div class="p-3 border-b border-slate-100 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
                    <h3 class="font-bold text-slate-700 text-sm flex items-center gap-2">
                        <i class="fas fa-tree text-blue-500"></i> Saham Kebun
                    </h3>
                    <span class="text-[10px] bg-blue-100 text-blue-700 px-2 rounded font-bold">KBN</span>
                </div>
                <div class="overflow-y-auto flex-1 no-scrollbar p-1">
                    @forelse($perkebunan as $p)
                        <a href="{{ route('kebun.detail.custom', $p->id) }}" class="flex justify-between items-center p-3 hover:bg-slate-50 rounded-lg transition border-b border-slate-50 last:border-0">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-[10px]">
                                    KBN
                                </div>
                                <div>
                                    <p class="font-bold text-slate-800 text-sm">{{ $p->kode }}</p>
                                    <p class="text-[10px] text-slate-400 truncate w-24">{{ $p->nama }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-mono text-xs font-semibold text-slate-700">Rp {{ number_format($p->harga/1000, 0) }}k</p>
                                <p class="text-[10px] text-blue-500 font-bold">
                                    {{ $p->durasi }} Bln
                                </p>
                            </div>
                        </a>
                    @empty
                        <p class="text-center text-xs text-slate-400 mt-10">Data kosong.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

    @include('components.bottom-nav')

    <script>
        const ctx = document.getElementById('marketChart').getContext('2d');
        let gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(16, 185, 129, 0.2)');
        gradient.addColorStop(1, 'rgba(16, 185, 129, 0)');

        // PHP NATIVE UNTUK DATA CHART
        const labels = {!! json_encode($chartLabels ?? ['09:00', '10:00', '11:00', '12:00', '13:00']) !!};
        const data = {!! json_encode($chartValues ?? [7000, 7100, 7050, 7200, 7241]) !!};

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'IHGT',
                    data: data,
                    borderColor: '#10b981', 
                    backgroundColor: gradient,
                    borderWidth: 2,
                    pointRadius: 0,
                    pointHoverRadius: 4,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: { display: false },
                    y: { display: false }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
            }
        });
    </script>
</body>
</html>