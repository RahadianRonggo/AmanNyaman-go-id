<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Portofolio Saya - CuanTani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-slate-50 font-sans pb-24">

    <nav class="bg-white p-4 shadow-sm sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-slate-500 font-bold flex items-center gap-2">
                <i class="fas fa-chevron-left"></i> Kembali ke Pasar
            </a>
            <span class="font-bold text-slate-800">Portofolio</span>
            <i class="fas fa-cog text-slate-400"></i>
        </div>
    </nav>

    <div class="container mx-auto px-4 mt-6">
        
        <div class="bg-gradient-to-br from-emerald-600 to-emerald-800 rounded-2xl p-6 text-white shadow-xl relative overflow-hidden mb-6">
            <div class="absolute -right-4 -top-4 text-emerald-500 opacity-30 text-9xl"><i class="fas fa-wallet"></i></div>
            
            <p class="text-emerald-100 text-sm font-medium mb-1">Total Nilai Portofolio</p>
            <h1 class="text-3xl md:text-4xl font-black mb-4">Rp {{ number_format($totalEquity, 0, ',', '.') }}</h1>
            
            <div class="flex gap-4 border-t border-emerald-500/30 pt-4">
                <div class="flex-1">
                    <p class="text-xs text-emerald-200">Total Profit (All Time)</p>
                    <p class="font-bold text-lg text-green-300">+ Rp 12.500.000 <span class="text-xs bg-green-500/20 px-1 rounded">▲ 5.2%</span></p>
                </div>
                <div class="flex-1 border-l border-emerald-500/30 pl-4">
                    <p class="text-xs text-emerald-200">Buying Power (Kas)</p>
                    <p class="font-bold text-lg">Rp {{ number_format($user['saldo_cash'], 0, ',', '.') }}</p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3 mt-6">
                <button class="bg-white text-emerald-700 py-3 rounded-xl font-bold text-sm hover:bg-emerald-50 transition shadow">
                    <i class="fas fa-plus-circle mr-1"></i> Deposit (Top Up)
                </button>
                <button class="bg-emerald-700 border border-emerald-500 text-white py-3 rounded-xl font-bold text-sm hover:bg-emerald-600 transition">
                    <i class="fas fa-arrow-down mr-1"></i> Tarik Dana
                </button>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 mb-6">
            <h3 class="font-bold text-slate-700 mb-4 flex items-center gap-2">
                <i class="fas fa-chart-pie text-yellow-500"></i> Alokasi Aset
            </h3>
            <div class="flex items-center gap-4">
                <div class="w-1/2 h-32">
                    <canvas id="portfolioChart"></canvas>
                </div>
                <div class="w-1/2 text-xs space-y-2">
                    @foreach($portfolio as $p)
                    <div class="flex justify-between items-center">
                        <span class="truncate w-20">{{ $p['nama'] }}</span>
                        <span class="font-bold">{{ number_format(($p['lot'] * $p['harga_sekarang'] / $totalAsetInvestasi) * 100, 1) }}%</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <h3 class="font-bold text-slate-800 text-lg mb-4">Aset Saya ({{ count($portfolio) }})</h3>
        
        <div class="space-y-4">
            @foreach($portfolio as $p)
            <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-100 flex justify-between items-center hover:shadow-md transition cursor-pointer">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-slate-100 rounded-full flex items-center justify-center text-xl">
                        {{ $p['icon'] }}
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-700 text-sm line-clamp-1">{{ $p['nama'] }}</h4>
                        <p class="text-xs text-slate-400">{{ $p['lot'] }} Lot x Rp {{ number_format($p['harga_sekarang']/1000, 0) }}rb</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-bold text-sm">Rp {{ number_format($p['lot'] * $p['harga_sekarang'], 0, ',', '.') }}</p>
                    @if($p['status'] == 'up')
                        <p class="text-xs font-bold text-green-500">▲ +{{ $p['persen'] }}%</p>
                    @else
                        <p class="text-xs font-bold text-red-500">▼ {{ $p['persen'] }}%</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

    </div>

    <script>
        const ctx = document.getElementById('portfolioChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($chartLabels),
                datasets: [{
                    data: @json($chartValues),
                    backgroundColor: ['#10b981', '#facc15', '#ef4444'], // Hijau, Kuning, Merah
                    borderWidth: 0,
                    cutout: '65%'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } }
            }
        });
    </script>

</body>
</html>