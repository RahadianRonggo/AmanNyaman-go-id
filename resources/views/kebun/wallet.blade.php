<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dompet</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-50 font-sans text-slate-800 pb-20">
    <div class="bg-emerald-700 p-6 pb-12 text-white rounded-b-3xl relative">
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('home') }}"><i class="fas fa-arrow-left"></i></a>
            <h1 class="font-bold">E-Wallet</h1>
            <i class="fas fa-qrcode"></i>
        </div>
        <p class="text-emerald-200 text-sm">Saldo Aktif</p>
        <h2 class="text-3xl font-bold">Rp 120.500.000</h2>
        <div class="absolute -bottom-6 left-4 right-4 bg-white p-4 rounded-xl shadow-lg flex justify-around text-slate-600">
            <div class="flex flex-col items-center gap-1">
                <div class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center"><i class="fas fa-plus"></i></div>
                <span class="text-xs font-bold">Top Up</span>
            </div>
            <div class="flex flex-col items-center gap-1">
                <div class="w-10 h-10 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center"><i class="fas fa-arrow-up"></i></div>
                <span class="text-xs font-bold">Tarik</span>
            </div>
            <div class="flex flex-col items-center gap-1">
                <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center"><i class="fas fa-history"></i></div>
                <span class="text-xs font-bold">Riwayat</span>
            </div>
        </div>
    </div>
    <div class="mt-10 p-4">
        <h3 class="font-bold text-slate-700 mb-4">Transaksi Terakhir</h3>
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-emerald-50 rounded-full flex items-center justify-center text-emerald-600"><i class="fas fa-arrow-down"></i></div>
                    <div><p class="font-bold text-sm">Top Up BCA</p><p class="text-xs text-slate-400">29 Jan, 14:00</p></div>
                </div>
                <span class="text-emerald-600 font-bold text-sm">+ Rp 10.000.000</span>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-red-50 rounded-full flex items-center justify-center text-red-600"><i class="fas fa-shopping-cart"></i></div>
                    <div><p class="font-bold text-sm">Beli TRK-JBR</p><p class="text-xs text-slate-400">28 Jan, 09:30</p></div>
                </div>
                <span class="text-slate-800 font-bold text-sm">- Rp 1.500.000</span>
            </div>
        </div>
    </div>
    @include('components.bottom-nav')
</body>
</html>