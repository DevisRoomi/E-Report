<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#4A151C">
        <title>{{ $title ?? 'Selamat Datang' }} · E-Report Layanan Sipil</title>
        <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=JetBrains+Mono:wght@400;500;600;700&family=Newsreader:ital,opsz,wght@0,6..72,400;0,6..72,600;0,6..72,700;1,6..72,400&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <style type="text/tailwindcss">
            @theme {
                --font-display: 'Bebas Neue', 'Plus Jakarta Sans', sans-serif;
                --font-serif: 'Newsreader', serif;
                --font-sans: 'Plus Jakarta Sans', sans-serif;
                --font-mono: 'JetBrains Mono', monospace;
            }

            @layer base {
                button, a, input, textarea, select {
                    @apply focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#4A151C];
                }

                button:not(:disabled), select {
                    @apply cursor-pointer;
                }

                button:disabled {
                    @apply cursor-wait opacity-60;
                }
            }
        </style>
        <style>[x-cloak] { display: none !important; }</style>
        @livewireStyles
    </head>
    <body class="bg-[#F7F4F2] font-sans text-[#1C1819] antialiased">
        <div class="grid min-h-screen lg:grid-cols-12">
            {{-- Left editorial oxblood pane with dramatic civic infrastructure photography --}}
            <aside class="relative hidden bg-[#3C0F15] p-12 text-[#FAF7F5] lg:col-span-5 lg:flex lg:flex-col lg:justify-between xl:p-16 border-r border-[#310A10] overflow-hidden">
                {{-- High contrast gritty civil infrastructure backdrop image --}}
                <div class="absolute inset-0 z-0">
                    <img
                        src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1200&q=80"
                        alt="Infrastruktur dan konstruksi sipil"
                        class="h-full w-full object-cover opacity-25 filter saturate-50 contrast-125"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-[#3C0F15] via-[#3C0F15]/95 to-[#3C0F15]/80"></div>
                </div>

                <div class="relative z-10">
                    <a href="{{ route('home') }}" wire:navigate class="inline-flex items-center gap-3">
                        <x-civic-logo size="md" variant="white" />
                        <div>
                            <span class="font-display text-2xl tracking-wider text-white">E-REPORT<span class="text-[#C59B27]">.</span></span>
                            <span class="block font-mono text-[9px] uppercase tracking-widest text-[#E0D0D2]">Layanan Sipil</span>
                        </div>
                    </a>
                </div>

                <div class="relative z-10 my-auto py-12">
                    <p class="font-mono text-[11px] font-bold tracking-[.2em] uppercase text-[#C59B27]">DOKUMENTASI & ADVOKASI FASILITAS</p>
                    <h1 class="mt-4 font-serif text-4xl sm:text-5xl font-bold leading-[1.1] text-white">
                        Kawal laporan fasilitas warga dengan tertib dan transparan.
                    </h1>
                    <p class="mt-6 text-sm leading-relaxed text-[#D6C4C6]">
                        Setiap aduan dicatat dalam register resmi bernomor identifikasi tunggal, diverifikasi dengan bukti visual lapangan, dan dipantau hingga rampung.
                    </p>

                    <div class="mt-8 space-y-3 border-t border-[#521820] pt-6 font-mono text-xs text-[#E0D0D2]">
                        <div class="flex items-center gap-3">
                            <span class="flex h-5 w-5 items-center justify-center rounded-sm bg-[#521820] text-[#C59B27] font-bold text-[10px]">01</span>
                            <span>Bukti foto & titik koordinat tervalidasi</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="flex h-5 w-5 items-center justify-center rounded-sm bg-[#521820] text-[#C59B27] font-bold text-[10px]">02</span>
                            <span>Audit status berkala dari dinas teknis</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="flex h-5 w-5 items-center justify-center rounded-sm bg-[#521820] text-[#C59B27] font-bold text-[10px]">03</span>
                            <span>Arsip tindak lanjut dapat dipantau terbuka</span>
                        </div>
                    </div>
                </div>

                <div class="relative z-10 flex items-center justify-between border-t border-[#4A151C] pt-6 font-mono text-[10px] text-[#B99A9F]">
                    <span>REPUBLIK INDONESIA</span>
                    <span>STANDAR PELAYANAN PUBLIK</span>
                </div>
            </aside>

            {{-- Right form content pane --}}
            <main class="flex items-center justify-center px-6 py-12 sm:px-12 lg:col-span-7 bg-[#F7F4F2]">
                <div class="w-full max-w-md">
                    <div class="mb-8 lg:hidden">
                        <a href="{{ route('home') }}" wire:navigate class="inline-flex items-center gap-3">
                            <span class="flex h-9 w-9 items-center justify-center rounded-md bg-[#3C0F15] text-white shadow-xs">
                                <i data-lucide="shield" aria-hidden="true" class="h-4 w-4 stroke-[2.5]"></i>
                            </span>
                            <span class="font-display text-2xl tracking-wider text-[#3C0F15]">E-REPORT</span>
                        </a>
                    </div>

                    <a href="{{ route('home') }}" wire:navigate class="mb-8 inline-flex items-center gap-2 font-mono text-xs font-semibold text-[#7A6B6E] hover:text-[#4A151C] transition">
                        <i data-lucide="arrow-left" aria-hidden="true" class="h-3.5 w-3.5 shrink-0"></i>
                        Kembali ke beranda
                    </a>

                    <div class="rounded-xl border border-[#E5DBD9] bg-white p-7 shadow-xs sm:p-9">
                        {{ $slot }}
                    </div>

                    <p class="mt-8 text-center font-mono text-[11px] text-[#7A6B6E]">
                        &copy; {{ date('Y') }} E-Report Layanan Sipil. Data terlindungi kerahasiaannya.
                    </p>
                </div>
            </main>
        </div>

        @livewireScripts
        <script src="https://unpkg.com/lucide@0.468.0/dist/umd/lucide.min.js"></script>
        <script>
            function renderIcons() {
                if (window.lucide) {
                    window.lucide.createIcons();
                }
            }

            renderIcons();
            document.addEventListener('livewire:navigated', renderIcons);
            document.addEventListener('livewire:init', () => {
                Livewire.hook('morphed', renderIcons);
            });
        </script>
    </body>
</html>