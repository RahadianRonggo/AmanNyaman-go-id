<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Proyek - CuanTani</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 py-10">
    <div class="container mx-auto max-w-2xl bg-white p-8 rounded-2xl shadow-xl border-t-8 border-blue-600">
        <h2 class="text-3xl font-black text-slate-800 mb-6">✏️ Edit Proyek Kebun</h2>
        
        <form action="{{ route('kebun.update', $kebun->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT') 

            <div>
                <label class="block font-bold text-slate-600 mb-1">Nama Proyek</label>
                <input type="text" name="nama_proyek" value="{{ $kebun->nama_proyek }}" class="w-full p-3 border rounded-lg bg-slate-50" required>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-600 mb-1">Lokasi</label>
                    <input type="text" name="lokasi" value="{{ $kebun->lokasi }}" class="w-full p-3 border rounded-lg bg-slate-50" required>
                </div>
                <div>
                    <label class="block font-bold text-slate-600 mb-1">Target Dana (Rp)</label>
                    <input type="number" name="target_dana" value="{{ $kebun->target_dana }}" class="w-full p-3 border rounded-lg bg-slate-50" required>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-600 mb-1">Estimasi ROI (%)</label>
                    <input type="number" name="roi" value="{{ $kebun->roi }}" class="w-full p-3 border rounded-lg bg-slate-50" required>
                </div>
                <div>
                    <label class="block font-bold text-slate-600 mb-1">Durasi (Bulan)</label>
                    <input type="number" name="durasi" value="{{ $kebun->durasi }}" class="w-full p-3 border rounded-lg bg-slate-50" required>
                </div>
            </div>

            <div>
                <label class="block font-bold text-slate-600 mb-1">Deskripsi Lengkap</label>
                <textarea name="deskripsi" rows="4" class="w-full p-3 border rounded-lg bg-slate-50" required>{{ $kebun->deskripsi }}</textarea>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-4 rounded-xl hover:bg-blue-800 transition shadow-lg mt-4">
                SIMPAN PERUBAHAN 💾
            </button>
            <a href="{{ route('kebun.show', $kebun->id) }}" class="block text-center text-slate-400 mt-4 text-sm hover:underline">Batal</a>
        </form>
    </div>
</body>
</html>