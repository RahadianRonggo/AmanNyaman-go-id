<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Trading Arena - CuanTani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://unpkg.com/lightweight-charts@3.8.0/dist/lightweight-charts.standalone.production.js"></script>

    <style>
        body { background-color: #0f172a; color: white; font-family: sans-serif; touch-action: manipulation; }
        /* Trik agar chart responsif tanpa hilang */
        #chartContainer { width: 100%; height: 100%; }
    </style>
</head>
<body class="flex flex-col h-screen overflow-hidden">

    <nav class="bg-slate-800 border-b border-slate-700 h-14 md:h-16 flex justify-between items-center px-3 md:px-4 z-50 shrink-0">
        <div class="flex items-center gap-2 md:gap-4">
            <a href="{{ route('home') }}" class="text-slate-400 hover:text-white"><i class="fas fa-chevron-left"></i> <span class="hidden md:inline">Kembali</span></a>
            
            <div class="relative group">
                <button class="bg-slate-700 px-3 py-1.5 md:px-4 md:py-2 rounded text-xs md:text-sm font-bold text-yellow-500 border border-slate-600 flex items-center gap-2">
                    <i class="fas fa-chart-line"></i> <span id="assetName">TANI</span> <i class="fas fa-caret-down"></i>
                </button>
                <div class="absolute top-full left-0 mt-1 w-48 bg-slate-800 border border-slate-600 rounded shadow-xl hidden group-hover:block z-[60]">
                    <a href="#" onclick="gantiAset('SAHAM TANI', 'TANI', 5000)" class="block px-4 py-3 hover:bg-slate-700 text-xs border-b border-slate-700">🌾 Saham Tani</a>
                    <a href="#" onclick="gantiAset('SAHAM TERNAK', 'TRK', 15000)" class="block px-4 py-3 hover:bg-slate-700 text-xs border-b border-slate-700">🐄 Saham Ternak</a>
                    <a href="#" onclick="gantiAset('SAHAM KEBUN', 'KBN', 8000)" class="block px-4 py-3 hover:bg-slate-700 text-xs">🌴 Saham Kebun</a>
                </div>
            </div>
        </div>

        <div class="bg-slate-700 px-3 py-1.5 md:px-4 md:py-2 rounded text-right border border-slate-600">
            <p class="text-[8px] md:text-[10px] text-slate-400">SALDO DEMO</p>
            <p class="font-bold text-emerald-400 text-xs md:text-base">Rp 120.500.000</p>
        </div>
    </nav>

    <div class="flex flex-1 flex-col md:flex-row h-full overflow-hidden relative">
        
        <div class="h-[45%] md:h-full md:flex-1 bg-slate-900 relative order-1">
            <div id="chartContainer"></div>

            <div class="absolute top-3 left-3 bg-slate-800/80 p-2 rounded border border-slate-700 pointer-events-none z-10 backdrop-blur-sm">
                <h2 class="text-2xl md:text-4xl font-bold text-emerald-400 tracking-tighter" id="livePrice">--</h2>
                <div class="flex items-center gap-1 text-[10px] md:text-xs text-slate-400 mt-1 font-mono">
                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span> LIVE
                </div>
            </div>
        </div>

        <div class="h-[55%] md:h-full w-full md:w-96 bg-slate-800 border-t md:border-t-0 md:border-l border-slate-700 p-4 md:p-6 flex flex-col shrink-0 z-20 shadow-[0_-5px_15px_rgba(0,0,0,0.3)] order-2 overflow-y-auto">
            
            <div class="mb-4 md:mb-6">
                <label class="block text-[10px] md:text-xs font-bold text-slate-400 mb-1">NOMINAL (Rp)</label>
                <div class="flex items-center bg-slate-900 rounded p-2 md:p-3 border border-slate-600 focus-within:border-emerald-500 transition">
                    <span class="text-slate-500 mr-2 font-bold text-xs md:text-sm">Rp</span>
                    <input type="number" id="inputAmount" value="100000" oninput="hitungProfit()" 
                           class="bg-transparent text-white font-bold text-lg md:text-xl w-full outline-none text-right placeholder-slate-600">
                </div>
                <div class="grid grid-cols-3 gap-2 mt-2">
                     <button onclick="setNominal(50000)" class="bg-slate-700 text-[10px] font-bold py-1.5 rounded hover:bg-slate-600 border border-slate-600">50K</button>
                     <button onclick="setNominal(100000)" class="bg-slate-700 text-[10px] font-bold py-1.5 rounded hover:bg-slate-600 border border-slate-600">100K</button>
                     <button onclick="setNominal(500000)" class="bg-slate-700 text-[10px] font-bold py-1.5 rounded hover:bg-slate-600 border border-slate-600">500K</button>
                </div>
            </div>

            <div class="bg-slate-700/50 rounded p-3 mb-4 md:mb-6 border border-slate-700 flex justify-between items-center">
                <div>
                    <span class="block text-[10px] text-slate-400">Profit Rate</span>
                    <span class="block text-yellow-400 font-bold text-xs">80%</span>
                </div>
                <div class="text-right">
                    <span class="block text-[10px] text-slate-400">Estimasi Cuan</span>
                    <span class="block text-emerald-400 font-bold text-sm md:text-lg" id="profitText">+Rp 80.000</span>
                </div>
            </div>

            <div class="mt-auto grid grid-cols-2 md:flex md:flex-col gap-3 pb-2">
                <form id="tradeForm" action="{{ route('trading.proses') }}" method="POST" class="hidden">
                    @csrf
                    <input type="hidden" name="amount" id="formAmount">
                    <input type="hidden" name="hasil" id="formHasil">
                </form>

                <button onclick="tebak('up')" class="bg-emerald-600 hover:bg-emerald-500 text-white font-bold py-3 md:py-4 rounded-xl shadow-lg flex flex-col md:flex-row justify-center md:justify-between px-2 md:px-6 items-center transition active:scale-95 group">
                    <div class="flex flex-col items-center md:items-start">
                        <span class="text-[9px] md:text-[10px] uppercase opacity-75">Naik</span>
                        <span class="text-lg md:text-2xl">CALL 🚀</span>
                    </div>
                    <i class="fas fa-arrow-trend-up text-xl md:text-3xl opacity-50 group-hover:opacity-100 hidden md:block"></i>
                </button>

                <button onclick="tebak('down')" class="bg-red-600 hover:bg-red-500 text-white font-bold py-3 md:py-4 rounded-xl shadow-lg flex flex-col md:flex-row justify-center md:justify-between px-2 md:px-6 items-center transition active:scale-95 group">
                    <div class="flex flex-col items-center md:items-start">
                        <span class="text-[9px] md:text-[10px] uppercase opacity-75">Turun</span>
                        <span class="text-lg md:text-2xl">PUT 🔻</span>
                    </div>
                    <i class="fas fa-arrow-trend-down text-xl md:text-3xl opacity-50 group-hover:opacity-100 hidden md:block"></i>
                </button>
            </div>
        </div>
    </div>

    <script>
        // PENGAMAN ERROR
        window.onerror = function(msg) { console.error(msg); };

        let chart, series;
        let currentPrice = 5000;
        let nextTime = Math.floor(Date.now() / 1000);

        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('chartContainer');

            if (typeof LightweightCharts === 'undefined') {
                container.innerHTML = '<p class="text-center text-red-500 mt-10">Gagal memuat Chart</p>';
                return;
            }

            // BUAT CHART
            chart = LightweightCharts.createChart(container, {
                layout: { backgroundColor: '#0f172a', textColor: '#cbd5e1' },
                grid: { vertLines: { color: '#1e293b' }, horzLines: { color: '#1e293b' } },
                timeScale: { timeVisible: true, secondsVisible: true, borderColor: '#334155' },
                crosshair: { mode: 0 },
                // Hilangkan scroll di chart biar ga ganggu scroll halaman
                handleScroll: { mouseWheel: false, pressedMouseMove: false, horzTouchDrag: true, vertTouchDrag: false }
            });

            series = chart.addCandlestickSeries({
                upColor: '#10b981', downColor: '#ef4444', borderUpColor: '#10b981', borderDownColor: '#ef4444', wickUpColor: '#10b981', wickDownColor: '#ef4444',
            });

            // DATA DUMMY
            let data = [];
            let t = nextTime - 1000;
            for (let i = 0; i < 50; i++) {
                t += 60; 
                let c = generateNextCandle(t, currentPrice);
                data.push(c);
                currentPrice = c.close;
            }
            series.setData(data);
            nextTime = t;

            // ANIMASI LIVE
            setInterval(() => {
                nextTime += 2;
                let c = generateNextCandle(nextTime, currentPrice);
                currentPrice = c.close;
                series.update(c);
                updatePriceText(c);
            }, 500);

            // AUTO RESIZE
            new ResizeObserver(entries => {
                if (entries.length === 0 || entries[0].target !== container) return;
                const newRect = entries[0].contentRect;
                chart.applyOptions({ width: newRect.width, height: newRect.height });
            }).observe(container);
        });

        function generateNextCandle(time, open) {
            let change = (Math.random() - 0.5) * 30;
            let close = open + change;
            let high = Math.max(open, close) + Math.random() * 5;
            let low = Math.min(open, close) - Math.random() * 5;
            return { time, open, high, low, close };
        }

        function updatePriceText(candle) {
            let el = document.getElementById('livePrice');
            el.innerText = Math.round(candle.close);
            el.className = candle.close >= candle.open ? "text-2xl md:text-4xl font-bold text-emerald-400 tracking-tighter" : "text-2xl md:text-4xl font-bold text-red-400 tracking-tighter";
        }

        function hitungProfit() {
            let val = parseInt(document.getElementById('inputAmount').value) || 0;
            document.getElementById('profitText').innerText = "+Rp " + new Intl.NumberFormat('id-ID').format(val * 0.8);
        }

        function setNominal(amount) {
            document.getElementById('inputAmount').value = amount;
            hitungProfit();
        }

        window.gantiAset = function(nama, kode, hargaBaru) {
            document.getElementById('assetName').innerText = kode;
            currentPrice = hargaBaru;
            // Reset logic
            let data = [];
            let t = Math.floor(Date.now() / 1000) - 1000;
            for(let i=0; i<50; i++) { t+=60; let c=generateNextCandle(t,currentPrice); data.push(c); currentPrice=c.close; }
            series.setData(data);
            nextTime = t;
        }

        window.tebak = function(arah) {
            let nominal = document.getElementById('inputAmount').value;
            let entryPrice = currentPrice;
            Swal.fire({
                title: 'ANALISA MARKET...',
                html: `Entry: <b>${Math.round(entryPrice)}</b><br>Tunggu 3 Detik...`,
                timer: 3000, timerProgressBar: true, background: '#1e293b', color: '#fff', didOpen: () => Swal.showLoading()
            }).then(() => {
                let status = 'loss';
                if ((arah === 'up' && currentPrice > entryPrice) || (arah === 'down' && currentPrice < entryPrice)) status = 'win';
                document.getElementById('formAmount').value = nominal;
                document.getElementById('formHasil').value = status;
                document.getElementById('tradeForm').submit();
            });
        }
    </script>
    @if(session('success')) <script>Swal.fire({icon: 'success', title: 'CUAN!', text: '{{ session("success") }}', background: '#1e293b', color: '#fff'});</script> @endif
    @if(session('error')) <script>Swal.fire({icon: 'error', title: 'BONCOS!', text: '{{ session("error") }}', background: '#1e293b', color: '#fff'});</script> @endif
</body>
</html>