<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Upload Proyek - CuanTani</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 py-10">
    <div class="container mx-auto max-w-2xl bg-white p-8 rounded-2xl shadow-xl border-t-8 border-emerald-600">
        <h2 class="text-3xl font-black text-emerald-900 mb-6">🌱 Ajukan Proyek Kebun Baru</h2>
        
        <form action="{{ route('kebun.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            
            <div class="bg-emerald-50 p-4 rounded-lg border border-emerald-200">
                <label class="block font-bold text-emerald-800 mb-2">Foto Utama Kebun 📸</label>
                <input type="file" name="foto" class="w-full p-2 bg-white rounded border border-emerald-300">
                <p class="text-xs text-slate-500 mt-1">*Format: JPG/PNG, Maks 2MB</p>
            </div>

            <div>
                <label class="block font-bold text-slate-600 mb-1">Nama Proyek</label>
                <input type="text" name="nama_proyek" placeholder="Contoh: Kebun Melon Golden" class="w-full p-3 border rounded-lg" required>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-600 mb-1">Lokasi</label>
                    <input type="text" name="lokasi" placeholder="Kota/Kabupaten" class="w-full p-3 border rounded-lg" required>
                </div>
                <div>
                    <label class="block font-bold text-slate-600 mb-1">Target Dana (Rp)</label>
                    <input type="number" name="target_dana" placeholder="50000000" class="w-full p-3 border rounded-lg" required>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-600 mb-1">Estimasi ROI (%)</label>
                    <input type="number" name="roi" placeholder="15" class="w-full p-3 border rounded-lg" required>
                </div>
                <div>
                    <label class="block font-bold text-slate-600 mb-1">Durasi (Bulan)</label>
                    <input type="number" name="durasi" placeholder="6" class="w-full p-3 border rounded-lg" required>
                </div>
            </div>

            <div>
                <label class="block font-bold text-slate-600 mb-1">Deskripsi Lengkap</label>
                <textarea name="deskripsi" rows="4" class="w-full p-3 border rounded-lg" required></textarea>
            </div>

            <button type="submit" class="w-full bg-emerald-700 text-white font-bold py-4 rounded-xl hover:bg-emerald-900 transition shadow-lg mt-4">
                TERBITKAN PROYEK SEKARANG 🚀
            </button>
        </form>
    </div>
</body>
</html>