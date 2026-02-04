<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Transaksi Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 font-sans flex items-center justify-center min-h-screen p-4">

    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md border-t-4 border-emerald-600">
        <h2 class="text-2xl font-black text-slate-800 mb-6 flex items-center gap-2">
            💸 Catat Cuan Masuk
        </h2>

        <form action="{{ route('transaksi.store') }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label class="block text-sm font-bold text-slate-600 mb-1">Nama Investor</label>
                <input type="text" name="nama_investor" placeholder="Contoh: Pak Budi Santoso" required
                       class="w-full p-3 border rounded-lg focus:outline-emerald-500 font-bold text-slate-800">
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-600 mb-1">Investasi Ke Proyek?</label>
                <select name="proyek_tujuan" class="w-full p-3 border rounded-lg focus:outline-emerald-500 bg-white">
                    @foreach($daftarProyek as $p)
                        <option value="{{ $p->nama_proyek }}">{{ $p->nama_proyek }}</option>
                    @endforeach
                    <option value="Investasi Umum">Investasi Umum (Lainnya)</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-600 mb-1">Nominal Transfer (Rp)</label>
                <input type="number" name="jumlah" placeholder="10000000" required
                       class="w-full p-3 border rounded-lg focus:outline-emerald-500 font-bold text-emerald-700 text-lg">
                <p class="text-xs text-slate-400 mt-1">*Tulis angka saja tanpa titik</p>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-600 mb-1">Tanggal Terima</label>
                <input type="date" name="tanggal" value="{{ date('Y-m-d') }}" required
                       class="w-full p-3 border rounded-lg focus:outline-emerald-500">
            </div>

            <button type="submit" class="w-full bg-emerald-600 text-white font-bold py-4 rounded-xl shadow-lg hover:bg-emerald-700 hover:scale-[1.02] transition transform mt-4">
                SIMPAN DATA 💾
            </button>
            
            <a href="{{ route('admin.dashboard') }}" class="block text-center text-slate-400 text-sm hover:text-slate-600">Batal, kembali ke dashboard</a>
        </form>
    </div>

</body>
</html>