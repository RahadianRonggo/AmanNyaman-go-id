<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - CuanTani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body class="bg-slate-100 font-sans">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-slate-900 text-white hidden md:flex flex-col fixed h-full">
            <div class="p-6 text-2xl font-black tracking-widest border-b border-slate-800">
                🌱 CUAN<span class="text-yellow-400">ADMIN</span>
            </div>
            <nav class="mt-6 flex-1 px-4 space-y-2">
                <a href="#" class="flex items-center gap-3 py-3 px-4 bg-emerald-600 rounded-lg text-white shadow-lg">
                    <i class="fas fa-chart-line"></i> Dashboard
                </a>
                <a href="/" target="_blank" class="flex items-center gap-3 py-3 px-4 text-slate-400 hover:bg-slate-800 hover:text-white rounded-lg transition">
                    <i class="fas fa-globe"></i> Lihat Website
                </a>
            </nav>
        </aside>

        <main class="flex-1 p-8 md:ml-64">
            
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-slate-800">Dashboard Keuangan</h1>
                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded shadow animate-pulse">
                    ✅ {{ session('success') }}
                </div>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-blue-500">
                    <div class="text-slate-400 text-xs font-bold uppercase">Total Dana Masuk</div>
                    <div class="text-2xl font-black text-slate-800">Rp {{ number_format($totalInvestasi, 0, ',', '.') }}</div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-emerald-500">
                    <div class="text-slate-400 text-xs font-bold uppercase">Pendapatan Bersih</div>
                    <div class="text-2xl font-black text-emerald-600">Rp {{ number_format($pendapatanAplikasi, 0, ',', '.') }}</div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-yellow-500">
                    <div class="text-slate-400 text-xs font-bold uppercase">Jumlah Proyek</div>
                    <div class="text-2xl font-black text-slate-800">{{ $totalProyek }} Unit</div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-6 mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-bold text-lg text-slate-700 flex items-center gap-2">
                        <i class="fas fa-history text-emerald-500"></i> Riwayat Transaksi Terbaru
                    </h3>
                    <a href="{{ route('transaksi.create') }}" class="bg-emerald-600 text-white px-4 py-2 rounded-lg font-bold text-sm hover:bg-emerald-700 shadow-md transition flex items-center gap-2">
                        <i class="fas fa-plus"></i> Input Manual
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-slate-50 text-slate-500 uppercase font-bold text-xs">
                            <tr>
                                <th class="px-4 py-3">Investor</th>
                                <th class="px-4 py-3">Proyek</th>
                                <th class="px-4 py-3">Jumlah</th>
                                <th class="px-4 py-3">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($transaksiTerbaru as $t)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-4 py-3 font-bold">{{ $t->nama_investor }}</td>
                                <td class="px-4 py-3 truncate max-w-[200px]">{{ $t->proyek_tujuan }}</td>
                                <td class="px-4 py-3 text-emerald-600 font-bold">+Rp {{ number_format($t->jumlah, 0, ',', '.') }}</td>
                                <td class="px-4 py-3 text-slate-500">{{ $t->tanggal }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-6">
                <h3 class="font-bold text-lg text-slate-700 mb-4">Manajemen Proyek</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($semuaProyek as $p)
                    <div class="flex items-center gap-3 p-3 border rounded-lg hover:bg-slate-50">
                        <div class="w-12 h-12 bg-slate-200 rounded overflow-hidden shrink-0">
                            @if(str_starts_with($p->foto, 'http'))
                                <img src="{{ $p->foto }}" class="w-full h-full object-cover">
                            @else
                                <img src="{{ asset('storage/' . $p->foto) }}" class="w-full h-full object-cover">
                            @endif
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="font-bold text-sm truncate">{{ $p->nama_proyek }}</p>
                            <div class="flex gap-2 text-xs mt-1">
                                <a href="{{ route('kebun.edit', $p->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('kebun.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Hapus?')" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </main>
    </div>
</body>
</html>