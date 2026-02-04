<div class="min-w-[300px] md:min-w-[350px] bg-white rounded-2xl shadow-md border border-slate-100 overflow-hidden snap-center flex flex-col hover:-translate-y-2 hover:shadow-xl transition duration-300 group">
    
    <div class="h-48 bg-slate-200 relative overflow-hidden flex-shrink-0">
        @if($k->foto)
            @if(str_starts_with($k->foto, 'http'))
                <img src="{{ $k->foto }}" alt="{{ $k->nama_proyek }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
            @else
                <img src="{{ asset('storage/' . $k->foto) }}" alt="{{ $k->nama_proyek }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
            @endif
        @else
            <div class="flex items-center justify-center h-full text-slate-400 text-4xl">🌾</div>
        @endif
        
        <div class="absolute top-3 right-3 bg-white/90 backdrop-blur px-2 py-1 rounded-lg text-[10px] font-bold text-emerald-800 shadow-sm flex items-center gap-1">
            📍 {{ $k->lokasi }}
        </div>
    </div>

    <div class="p-5 flex flex-col flex-grow">
        <h4 class="font-bold text-emerald-950 text-lg mb-1 truncate" title="{{ $k->nama_proyek }}">
            {{ $k->nama_proyek }}
        </h4>
        
        <div class="flex justify-between text-xs text-slate-500 mb-4 border-b border-slate-100 pb-3">
            <div class="text-center">
                <span class="block text-[10px] uppercase font-bold text-slate-400">ROI</span>
                <span class="text-emerald-600 font-black text-sm">{{ $k->roi }}%</span>
            </div>
            <div class="text-center">
                <span class="block text-[10px] uppercase font-bold text-slate-400">Durasi</span>
                <span class="text-slate-700 font-black text-sm">{{ $k->durasi }} Bln</span>
            </div>
        </div>

        <div class="w-full bg-slate-100 h-2 rounded-full mb-1">
            <div class="bg-yellow-400 h-2 rounded-full w-2/3"></div>
        </div>
        <div class="flex justify-between text-[10px] font-bold text-slate-400 mb-4">
            <span>70% Terkumpul</span>
            <span>Target: {{ number_format($k->target_dana/1000000) }} Jt</span>
        </div>

        <a href="{{ route('kebun.show', $k->id) }}" class="mt-auto block text-center bg-emerald-50 text-emerald-700 py-3 rounded-xl font-bold text-sm hover:bg-emerald-600 hover:text-white transition active:scale-95">
            Lihat Detail
        </a>
    </div>
</div>