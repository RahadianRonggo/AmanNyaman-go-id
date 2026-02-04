@props(['k'])

<div class="min-w-[280px] w-[280px] bg-white rounded-2xl border border-slate-100 shadow-lg shadow-slate-200/50 overflow-hidden group hover:-translate-y-2 transition duration-300 relative snap-center flex flex-col" data-aos="fade-up">
    
    <div class="absolute top-3 right-3 z-10">
        <span class="bg-black/60 backdrop-blur-md text-white text-[10px] font-bold px-2 py-1 rounded-lg border border-white/20 shadow-sm">
            <i class="fas fa-users text-yellow-400 mr-1"></i> Sisa {{ rand(10, 150) }} Lot
        </span>
    </div>

    <div class="h-40 overflow-hidden relative shrink-0">
        @if(str_starts_with($k->foto, 'http'))
            <img src="{{ $k->foto }}" alt="{{ $k->nama_proyek }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
        @else
            <img src="{{ asset('storage/' . $k->foto) }}" alt="{{ $k->nama_proyek }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
        @endif
        
        <div class="absolute bottom-0 left-0 w-full h-1/2 bg-gradient-to-t from-black/70 to-transparent"></div>
        
        <div class="absolute bottom-3 left-4 text-white flex items-center gap-1">
            <i class="fas fa-map-marker-alt text-red-400 text-xs"></i>
            <p class="text-[10px] font-medium opacity-90 truncate max-w-[200px]">{{ $k->lokasi }}</p>
        </div>
    </div>

    <div class="p-4 flex flex-col flex-1 justify-between">
        <div>
            <h4 class="font-bold text-slate-800 text-sm mb-3 line-clamp-1 group-hover:text-emerald-600 transition" title="{{ $k->nama_proyek }}">
                {{ $k->nama_proyek }}
            </h4>
            
            <div class="flex justify-between items-center mb-4 bg-slate-50 p-2 rounded-lg border border-slate-100">
                <div class="text-center">
                    <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wider">ROI Est.</p>
                    <p class="font-black text-emerald-500 text-sm">{{ $k->roi }}% <span class="text-[9px] text-slate-400 font-normal">/thn</span></p>
                </div>
                <div class="w-px h-6 bg-slate-200"></div> <div class="text-center">
                    <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wider">Durasi</p>
                    <p class="font-bold text-slate-700 text-sm">{{ $k->durasi }} Bln</p>
                </div>
            </div>

            @php 
                $persen = rand(30, 95); 
                $danaTerkumpul = ($k->target_dana * $persen) / 100;
            @endphp
            <div class="mb-4">
                <div class="flex justify-between text-[10px] font-bold mb-1">
                    <span class="text-emerald-600">{{ $persen }}% Terkumpul</span>
                    <span class="text-slate-400">Target {{ number_format($k->target_dana / 1000000, 0) }} Juta</span>
                </div>
                <div class="w-full bg-slate-100 rounded-full h-2 overflow-hidden shadow-inner">
                    <div class="bg-gradient-to-r from-emerald-400 to-emerald-600 h-2 rounded-full shadow-sm" style="width: {{ $persen }}%"></div>
                </div>
            </div>
        </div>

        <a href="{{ route('kebun.show', $k->id) }}" class="group/btn block w-full text-center bg-white border border-slate-200 text-slate-600 py-2.5 rounded-xl font-bold text-xs hover:bg-emerald-600 hover:text-white hover:border-emerald-600 transition-all shadow-sm hover:shadow-emerald-500/30 flex items-center justify-center gap-2">
            Lihat Detail <i class="fas fa-arrow-right text-[10px] group-hover/btn:translate-x-1 transition"></i>
        </a>
    </div>
</div>