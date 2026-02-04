<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio Saya</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-50 font-sans text-slate-800 pb-20">
    
    <div class="bg-white p-4 border-b border-slate-200 sticky top-0 z-40 flex items-center gap-4">
        <a href="{{ route('home') }}" class="text-slate-500"><i class="fas fa-arrow-left"></i></a>
        <h1 class="font-bold text-lg">Portofolio</h1>
    </div>

    <div class="container mx-auto p-4 max-w-lg">
        <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-200 mb-4">
            <p class="text-xs text-slate-400">Total Nilai Investasi</p>
            <h2 class="text-2xl font-bold text-slate-800">Rp 19.350.000</h2>
            <div class="flex items-center gap-2 mt-1">
                <span class="text-xs font-bold bg-emerald-100 text-emerald-600 px-2 py-0.5 rounded">+ Rp 850.000</span>
                <span class="text-xs text-slate-400">(Total PnL)</span>
            </div>
        </div>

        <h3 class="font-bold text-slate-600 mb-3 text-sm">Aset Kamu</h3>
        <div class="space-y-3">
            @foreach($myStocks as $stock)
            <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-200">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <span class="font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded text-xs">{{ $stock->kode }}</span>
                        <h4 class="font-bold text-slate-800 mt-1">{{ $stock->nama }}</h4>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-slate-400">Nilai Sekarang</p>
                        <p class="font-bold text-slate-800">Rp {{ number_format($stock->val, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="border-t border-slate-100 pt-2 flex justify-between text-xs">
                    <div>
                        <span class="text-slate-400 block">Lembar</span>
                        <span class="font-bold">{{ $stock->lot * 100 }} lbr</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block">Avg Price</span>
                        <span class="font-bold">{{ number_format($stock->avg) }}</span>
                    </div>
                    <div class="text-right">
                        <span class="text-slate-400 block">PnL %</span>
                        <span class="font-bold {{ $stock->pnl >= 0 ? 'text-emerald-500' : 'text-red-500' }}">
                            {{ $stock->pnl }}%
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
    @include('components.bottom-nav')
</body>
</html>