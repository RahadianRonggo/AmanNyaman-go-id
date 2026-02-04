<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Berhasil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-emerald-600 h-screen flex items-center justify-center font-sans">

    <div class="bg-white p-8 rounded-3xl shadow-2xl w-full max-w-sm text-center relative overflow-hidden">
        
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-red-400 via-yellow-400 to-blue-400"></div>

        <div class="w-20 h-20 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6 text-4xl animate-bounce">
            <i class="fas fa-check"></i>
        </div>

        <h1 class="text-2xl font-bold text-slate-800 mb-2">Pembayaran Sukses!</h1>
        <p class="text-slate-500 text-sm mb-8">Saham proyek telah ditambahkan ke portofolio Anda.</p>

        <div class="bg-slate-50 rounded-xl p-4 mb-8 border border-slate-100">
            <div class="flex justify-between mb-2 text-sm">
                <span class="text-slate-400">ID Transaksi</span>
                <span class="font-bold text-slate-700">TRX-{{ rand(10000, 99999) }}</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-slate-400">Waktu</span>
                <span class="font-bold text-slate-700">{{ date('d M Y, H:i') }}</span>
            </div>
        </div>

        <a href="{{ route('home') }}" class="block w-full bg-slate-800 hover:bg-slate-900 text-white font-bold py-3 rounded-xl transition shadow-lg">
            Kembali ke Pasar
        </a>
    </div>

</body>
</html>