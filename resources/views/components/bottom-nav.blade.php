<div class="fixed bottom-0 left-0 w-full bg-white border-t border-slate-200 shadow-[0_-2px_10px_rgba(0,0,0,0.05)] md:hidden z-50">
    <div class="grid grid-cols-5 h-16">
        
        <a href="{{ route('home') }}" class="flex flex-col items-center justify-center {{ Route::is('home') || Route::is('market') ? 'text-emerald-600' : 'text-slate-400' }} gap-1">
            <i class="fas fa-store text-lg"></i>
            <span class="text-[10px] font-bold">Pasar</span>
        </a>

        <a href="{{ route('trading') }}" class="flex flex-col items-center justify-center {{ Route::is('trading') ? 'text-yellow-500' : 'text-slate-400' }} hover:text-yellow-500 gap-1 transition">
            <i class="fas fa-bolt text-lg"></i> <span class="text-[10px] font-bold">Trading</span>
        </a>
        
        <a href="{{ route('portfolio') }}" class="flex flex-col items-center justify-center {{ Route::is('portfolio') ? 'text-emerald-600' : 'text-slate-400' }} hover:text-emerald-600 gap-1 transition">
            <i class="fas fa-chart-pie text-lg"></i>
            <span class="text-[10px] font-medium">Portofolio</span>
        </a>

        <a href="{{ route('wallet') }}" class="flex flex-col items-center justify-center {{ Route::is('wallet') ? 'text-emerald-600' : 'text-slate-400' }} hover:text-emerald-600 gap-1 transition">
            <i class="fas fa-wallet text-lg"></i>
            <span class="text-[10px] font-medium">Wallet</span>
        </a>
        
        <a href="{{ route('account') }}" class="flex flex-col items-center justify-center {{ Route::is('account') ? 'text-emerald-600' : 'text-slate-400' }} hover:text-emerald-600 gap-1 transition">
            <i class="fas fa-user text-lg"></i>
            <span class="text-[10px] font-medium">Akun</span>
        </a>
    </div>
</div>