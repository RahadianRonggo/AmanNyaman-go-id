<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - CuanTani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-50 font-sans text-slate-800">

    <nav class="bg-white border-b border-slate-200 p-4 sticky top-0 z-50">
        <div class="container mx-auto flex items-center gap-4">
            <a href="javascript:history.back()" class="text-slate-500 hover:text-emerald-600">
                <i class="fas fa-arrow-left text-xl"></i>
            </a>
            <h1 class="font-bold text-lg">Konfirmasi Pembelian</h1>
        </div>
    </nav>

    <div class="container mx-auto p-4 max-w-2xl mt-4">
        
        <form action="{{ route('kebun.bayar', $kebun->id) }}" method="POST">
            @csrf
            
            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 mb-4">
                <h2 class="font-bold text-slate-700 mb-4">Ringkasan Pesanan</h2>
                <div class="flex gap-4">
                    <img src="{{ asset('img/'.$kebun->gambar) }}" class="w-20 h-20 rounded-lg object-cover">
                    <div>
                        <span class="bg-emerald-100 text-emerald-800 text-xs font-bold px-2 py-1 rounded">
                            {{ $kebun->kode }}
                        </span>
                        <h3 class="font-bold text-lg mt-1">{{ $kebun->nama }}</h3>
                        <p class="text-slate-500 text-sm">{{ $kebun->lokasi }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 mb-4">
                <label class="font-bold text-slate-700 block mb-2">Investasi Berapa Lot?</label>
                <div class="flex items-center gap-4">
                    <button type="button" onclick="ubahLot(-1)" class="w-10 h-10 rounded-full bg-slate-100 text-slate-600 font-bold text-xl hover:bg-emerald-100">-</button>
                    <input type="number" name="lot" id="inputLot" value="1" min="1" class="w-20 text-center text-xl font-bold border-b-2 border-emerald-500 outline-none" readonly>
                    <button type="button" onclick="ubahLot(1)" class="w-10 h-10 rounded-full bg-slate-100 text-slate-600 font-bold text-xl hover:bg-emerald-100">+</button>
                </div>
                <p class="text-sm text-slate-400 mt-2">1 Lot = 100 Lembar Saham</p>
            </div>

            <div class="fixed bottom-0 left-0 w-full bg-white border-t border-slate-200 p-4 shadow-lg z-50">
                <div class="container mx-auto max-w-2xl flex justify-between items-center">
                    <div>
                        <p class="text-xs text-slate-500">Total Tagihan</p>
                        <h2 class="text-2xl font-bold text-emerald-700" id="textTotal">
                            Rp {{ number_format($kebun->harga, 0, ',', '.') }}
                        </h2>
                    </div>
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-8 rounded-lg shadow-lg">
                        Bayar Sekarang
                    </button>
                </div>
            </div>
            <div class="h-24"></div>
        </form>
    </div>

    <script>
        let harga = {{ $kebun->harga }};
        let lot = 1;
        function ubahLot(val) {
            lot += val;
            if(lot < 1) lot = 1;
            document.getElementById('inputLot').value = lot;
            let total = harga * lot;
            document.getElementById('textTotal').textContent = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(total);
        }
    </script>
</body>
</html>