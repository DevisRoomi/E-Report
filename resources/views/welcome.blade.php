<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#4A151C">
        <title>E-Report · Layanan Pengaduan Sipil & Fasilitas Warga</title>
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
        <style>
            [x-cloak] { display: none !important; }
            @keyframes pulse-subtle {
                0%, 100% { opacity: 1; transform: scale(1); }
                50% { opacity: 0.85; transform: scale(0.98); }
            }
        </style>
        @livewireStyles
        <meta name="description" content="E-Report adalah register sipil terverifikasi untuk pencatatan, investigasi, dan penyelesaian fasilitas publik warga.">
    </head>
    <body class="bg-[#F7F4EE] font-sans text-[#1C1819] antialiased selection:bg-[#4A151C] selection:text-white" x-data="{ scrollProgress: 0, scrolled: false }" @scroll.window="scrolled = window.scrollY > 24; const h = document.documentElement.scrollHeight - window.innerHeight; scrollProgress = h > 0 ? (window.scrollY / h) * 100 : 0">
        {{-- Reading / scroll progress bar --}}
        <div class="fixed top-0 left-0 h-1 bg-gradient-to-r from-[#C59B27] via-[#85222E] to-[#4A151C] z-50 transition-all duration-75" :style="`width: ${scrollProgress}%`"></div>

        {{-- Top editorial ticker bar --}}
        <div class="border-b border-[#310A10] bg-[#3C0F15] px-6 py-2 text-xs text-[#FAF7F5]">
            <div class="mx-auto flex max-w-7xl items-center justify-between font-mono text-[10px] uppercase tracking-widest text-[#E0D0D2]">
                <div class="flex items-center gap-2.5">
                    <span class="inline-block h-2 w-2 rounded-full bg-[#C59B27] animate-pulse"></span>
                    <span>PORTAL RESMI PENGADUAN FASILITAS WARGA</span>
                </div>
                <div class="hidden sm:flex items-center gap-4 text-[#C59B27]">
                    <span>WAKTU TANGGAP &le; 24 JAM</span>
                    <span class="text-[#FAF7F5]">&bull;</span>
                    <span class="text-[#FAF7F5]">TRANSPARAN TERBUKA</span>
                </div>
            </div>
        </div>

        {{-- Dynamic sticky nav on scroll --}}
        <header :class="scrolled ? 'backdrop-blur-md bg-[#F7F4EE]/90 shadow-xs border-[#DCD5C8]' : 'bg-[#F7F4EE] border-[#DCD5C8]/60'" class="sticky top-0 z-40 border-b transition-all duration-200">
            <nav class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-6 py-3.5 lg:px-10" aria-label="Navigasi beranda">
                <a href="{{ route('home') }}" class="group inline-flex items-center gap-3">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#4A151C] text-white shadow-xs transition duration-200 group-hover:scale-105 group-hover:bg-[#3C0F15] group-active:scale-95">
                        <i data-lucide="shield-check" aria-hidden="true" class="h-5 w-5 stroke-[2.2]"></i>
                    </span>
                    <div>
                        <span class="font-display text-2xl tracking-wider text-[#1C1819]">E-REPORT<span class="text-[#C59B27]">.</span></span>
                        <span class="block font-mono text-[9px] uppercase tracking-widest text-[#7A6B6E]">Layanan Sipil</span>
                    </div>
                </a>

                <div class="hidden items-center gap-8 font-mono text-xs font-semibold tracking-wider uppercase text-[#554749] md:flex">
                    <a href="#prosedur" class="hover:text-[#4A151C] transition hover:-translate-y-0.5 active:translate-y-0">Alur Pengaduan</a>
                    <a href="#kategori" class="hover:text-[#4A151C] transition hover:-translate-y-0.5 active:translate-y-0">Kategori</a>
                    <a href="#komitmen" class="hover:text-[#4A151C] transition hover:-translate-y-0.5 active:translate-y-0">Standar Mutu</a>
                </div>

                <div class="flex items-center gap-3">
                    @auth
                        <a
                            href="{{ route(auth()->user()->dashboardRoute()) }}"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#4A151C] px-5 py-2.5 font-mono text-xs font-bold uppercase tracking-wider text-white shadow-xs transition-all duration-150 hover:-translate-y-0.5 hover:shadow-md hover:bg-[#3C0F15] active:translate-y-0 active:scale-95 cursor-pointer"
                        >
                            Masuk Dashboard
                            <i data-lucide="arrow-up-right" aria-hidden="true" class="h-3.5 w-3.5 shrink-0"></i>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 font-mono text-xs font-bold uppercase tracking-wider text-[#1C1819] hover:text-[#4A151C] transition hover:-translate-y-0.5 active:translate-y-0">
                            Masuk
                        </a>
                        <a
                            href="{{ route('register') }}"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#4A151C] px-5 py-2.5 font-mono text-xs font-bold uppercase tracking-wider text-white shadow-xs transition-all duration-150 hover:-translate-y-0.5 hover:shadow-md hover:bg-[#3C0F15] active:translate-y-0 active:scale-95 cursor-pointer"
                        >
                            Daftar Warga
                            <i data-lucide="arrow-right" aria-hidden="true" class="h-3.5 w-3.5 shrink-0"></i>
                        </a>
                    @endauth
                </div>
            </nav>
        </header>

        <main>
            {{-- Hero Section: Anti-AI-Slop, organic rounded specimens, tactile switcher --}}
            <section class="border-b border-[#DCD5C8]/80 relative overflow-hidden">
                <div class="mx-auto max-w-7xl px-6 py-14 lg:px-10 lg:py-20">
                    <div class="grid items-center gap-12 lg:grid-cols-12 lg:gap-14">
                        <div class="lg:col-span-7">
                            <div class="mb-5 inline-flex items-center gap-2 rounded-full border border-[#DCD5C8] bg-white/70 px-3.5 py-1 font-mono text-[11px] font-bold tracking-wider uppercase text-[#4A151C] shadow-2xs">
                                <span class="h-1.5 w-1.5 rounded-full bg-[#C59B27]"></span>
                                PENGAWALAN FASILITAS LINGKUNGAN
                            </div>
                            <h1 class="font-serif text-5xl font-bold leading-[1.08] tracking-tight sm:text-7xl text-[#1C1819]">
                                Suara Warga,<br>
                                <span class="italic font-normal text-[#4A151C]">Langkah Perubahan</span>.
                            </h1>
                            <p class="mt-6 max-w-xl text-base leading-relaxed text-[#554749]">
                                Salurkan kendala fasilitas publik langsung ke unit dinas teknis. Dipantau dengan nomor registrasi unik, bukti foto terverifikasi, dan alur penanganan terbuka.
                            </p>

                            <div class="mt-8 flex flex-wrap items-center gap-3">
                                <a
                                    href="{{ auth()->check() ? route(auth()->user()->dashboardRoute()) : route('register') }}"
                                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#4A151C] px-6 py-3.5 font-mono text-xs font-bold uppercase tracking-wider text-white shadow-xs transition-all duration-150 hover:-translate-y-0.5 hover:shadow-md hover:bg-[#3C0F15] active:translate-y-0 active:scale-95 cursor-pointer"
                                >
                                    Buat Pengaduan Sekarang
                                    <i data-lucide="arrow-right" aria-hidden="true" class="h-4 w-4 shrink-0"></i>
                                </a>
                                <a
                                    href="#prosedur"
                                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-[#DCD5C8] bg-white px-6 py-3.5 font-mono text-xs font-bold uppercase tracking-wider text-[#1C1819] shadow-2xs transition-all duration-150 hover:-translate-y-0.5 hover:bg-[#FAF7F2] hover:border-[#4A151C]/40 active:translate-y-0 active:scale-95 cursor-pointer"
                                >
                                    Alur Penanganan
                                </a>
                            </div>

                            <div class="mt-10 grid grid-cols-3 gap-6 border-t border-[#DCD5C8]/80 pt-7">
                                <div class="transition-transform duration-200 hover:-translate-y-0.5">
                                    <p class="font-display text-3xl font-bold text-[#4A151C] sm:text-4xl">100%</p>
                                    <p class="font-mono text-[10px] uppercase tracking-wider text-[#7A6B6E] mt-1">Registrasi Sah</p>
                                </div>
                                <div class="transition-transform duration-200 hover:-translate-y-0.5">
                                    <p class="font-display text-3xl font-bold text-[#4A151C] sm:text-4xl">&le; 24 Jam</p>
                                    <p class="font-mono text-[10px] uppercase tracking-wider text-[#7A6B6E] mt-1">Verifikasi Awal</p>
                                </div>
                                <div class="transition-transform duration-200 hover:-translate-y-0.5">
                                    <p class="font-display text-3xl font-bold text-[#4A151C] sm:text-4xl">Terbuka</p>
                                    <p class="font-mono text-[10px] uppercase tracking-wider text-[#7A6B6E] mt-1">Status Progres</p>
                                </div>
                            </div>
                        </div>

                        {{-- Interactive Specimen Card with Alpine Switcher (Anti-Stiff Boxes, Soft Curvature) --}}
                        <div class="lg:col-span-5" x-data="{
                            activeTab: 0,
                            items: [
                                {
                                    id: 'REP-2026-084',
                                    badge: 'PROSES',
                                    badgeClass: 'bg-[#FAF4E5] text-[#8C6D0F] border-[#E8D49B]',
                                    kategori: 'Penerangan Jalan (PJU)',
                                    judul: 'Perbaikan Lampu Jalan Simpang Melati Padam 3 Malam',
                                    lokasi: 'Jl. Melati RT 04 / RW 02, Sektor Barat',
                                    tindakLanjut: 'Teknisi Dinas ESDM dijadwalkan ganti trafo hari ini',
                                    waktu: '30 Okt 2026, 09:15 WIB'
                                },
                                {
                                    id: 'REP-2026-079',
                                    badge: 'SELESAI',
                                    badgeClass: 'bg-[#F2F7F4] text-[#1D5E38] border-[#A8D3B8]',
                                    kategori: 'Infrastruktur Jalan',
                                    judul: 'Penambalan Lubang Aspal Amblas Dekat Jembatan',
                                    lokasi: 'Jl. Pemuda No. 12, Kelurahan Sukamaju',
                                    tindakLanjut: 'Pekerjaan perataan aspal hotmix telah rampung',
                                    waktu: '28 Okt 2026, 14:20 WIB'
                                },
                                {
                                    id: 'REP-2026-091',
                                    badge: 'MENUNGGU',
                                    badgeClass: 'bg-[#FAF2F3] text-[#85222E] border-[#E5B8BE]',
                                    kategori: 'Kebersihan & Drainase',
                                    judul: 'Saluran Drainase Tersumbat Endapan Sampah Liar',
                                    lokasi: 'Gang Mawar 3 RT 01, RW 05',
                                    tindakLanjut: 'Antrean tim pembersihan lingkungan akhir pekan',
                                    waktu: '30 Okt 2026, 11:05 WIB'
                                }
                            ]
                        }">
                            <div class="rounded-3xl border border-[#DCD5C8] bg-white/90 backdrop-blur-sm p-6 sm:p-7 shadow-[0_8px_30px_rgb(74,21,28,0.06)] transition-all duration-200 hover:shadow-[0_12px_40px_rgb(74,21,28,0.09)]">
                                <div class="flex items-center justify-between border-b border-[#ECE7DF] pb-4">
                                    <div class="flex items-center gap-2">
                                        <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-[#FAF7F5] border border-[#ECE7DF] text-[#4A151C]">
                                            <i data-lucide="file-text" class="h-3.5 w-3.5"></i>
                                        </span>
                                        <span class="font-mono text-xs font-bold uppercase tracking-wider text-[#1C1819]" x-text="items[activeTab].id"></span>
                                    </div>
                                    <span class="rounded-full border px-3 py-0.5 font-mono text-[10px] font-bold tracking-wider transition-colors duration-150" :class="items[activeTab].badgeClass" x-text="items[activeTab].badge"></span>
                                </div>

                                {{-- Tab Switcher Pills with Tactile Press Feedback --}}
                                <div class="mt-4 flex gap-1.5 rounded-xl bg-[#FAF7F2] p-1 border border-[#ECE7DF]">
                                    <button
                                        type="button"
                                        @click="activeTab = 0"
                                        class="flex-1 rounded-lg py-1.5 text-center font-mono text-[11px] font-bold transition-all duration-150 cursor-pointer active:scale-95"
                                        :class="activeTab === 0 ? 'bg-white text-[#4A151C] shadow-2xs border border-[#DCD5C8]' : 'text-[#7A6B6E] hover:text-[#1C1819]'"
                                    >
                                        PJU
                                    </button>
                                    <button
                                        type="button"
                                        @click="activeTab = 1"
                                        class="flex-1 rounded-lg py-1.5 text-center font-mono text-[11px] font-bold transition-all duration-150 cursor-pointer active:scale-95"
                                        :class="activeTab === 1 ? 'bg-white text-[#4A151C] shadow-2xs border border-[#DCD5C8]' : 'text-[#7A6B6E] hover:text-[#1C1819]'"
                                    >
                                        Jalan
                                    </button>
                                    <button
                                        type="button"
                                        @click="activeTab = 2"
                                        class="flex-1 rounded-lg py-1.5 text-center font-mono text-[11px] font-bold transition-all duration-150 cursor-pointer active:scale-95"
                                        :class="activeTab === 2 ? 'bg-white text-[#4A151C] shadow-2xs border border-[#DCD5C8]' : 'text-[#7A6B6E] hover:text-[#1C1819]'"
                                    >
                                        Drainase
                                    </button>
                                </div>

                                <div class="mt-5 space-y-4">
                                    <div class="rounded-2xl bg-[#FAF7F5] border border-[#ECE7DF] p-4 sm:p-5 transition-all">
                                        <p class="font-mono text-[10px] font-bold uppercase tracking-wider text-[#C59B27]" x-text="items[activeTab].kategori"></p>
                                        <p class="mt-1.5 font-serif text-lg font-bold text-[#1C1819] leading-snug" x-text="items[activeTab].judul"></p>
                                        <p class="mt-2 text-xs leading-relaxed text-[#554749]" x-text="items[activeTab].tindakLanjut"></p>
                                    </div>

                                    <div class="space-y-2.5 font-mono text-xs">
                                        <div class="flex items-center justify-between border-b border-[#ECE7DF] pb-2 text-[11px]">
                                            <span class="text-[#7A6B6E]">Lokasi Kejadian</span>
                                            <span class="font-semibold text-[#1C1819] text-right" x-text="items[activeTab].lokasi"></span>
                                        </div>
                                        <div class="flex items-center justify-between text-[11px]">
                                            <span class="text-[#7A6B6E]">Waktu Dicatat</span>
                                            <span class="font-semibold text-[#1C1819]" x-text="items[activeTab].waktu"></span>
                                        </div>
                                    </div>

                                    <div class="rounded-xl border border-[#DCD5C8]/80 bg-[#FAF7F2] p-3 text-center font-mono text-[11px] text-[#554749]">
                                        <span class="inline-block h-1.5 w-1.5 rounded-full bg-emerald-500 mr-1.5"></span>
                                        Setiap laporan ditindaklanjuti dengan bukti lapangan.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- 3 Step Process: Connected Curved Flow --}}
            <section id="prosedur" class="border-b border-[#DCD5C8]/80 bg-white py-18">
                <div class="mx-auto max-w-7xl px-6 lg:px-10">
                    <div class="max-w-2xl">
                        <p class="font-mono text-xs font-bold tracking-[.2em] uppercase text-[#4A151C]">ALUR PELAPORAN TERPADU</p>
                        <h2 class="mt-3 font-serif text-3xl sm:text-4xl font-bold tracking-tight text-[#1C1819]">Tiga langkah tertib penyampaian aduan warga.</h2>
                        <p class="mt-3 text-sm leading-relaxed text-[#554749]">Proses verifikasi dan eskalasi terstandar agar setiap kendala lingkungan tercatat dan segera ditangani.</p>
                    </div>

                    <div class="mt-12 grid gap-6 md:grid-cols-3">
                        <div class="group rounded-2xl border border-[#DCD5C8] bg-[#FAF7F5] p-7 transition-all duration-200 hover:-translate-y-1 hover:shadow-md hover:border-[#4A151C]/40">
                            <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-white border border-[#DCD5C8] font-display text-3xl text-[#4A151C] shadow-2xs group-hover:scale-105 group-hover:bg-[#4A151C] group-hover:text-white transition duration-200">
                                01
                            </span>
                            <h3 class="mt-5 font-serif text-lg font-bold text-[#1C1819]">Registrasi & Unggah Bukti</h3>
                            <p class="mt-2 text-xs leading-relaxed text-[#554749]">Daftarkan akun warga, tuliskan kronologi masalah, dan sertakan foto dokumentasi otentik di lapangan.</p>
                        </div>
                        <div class="group rounded-2xl border border-[#DCD5C8] bg-[#FAF7F5] p-7 transition-all duration-200 hover:-translate-y-1 hover:shadow-md hover:border-[#4A151C]/40">
                            <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-white border border-[#DCD5C8] font-display text-3xl text-[#4A151C] shadow-2xs group-hover:scale-105 group-hover:bg-[#4A151C] group-hover:text-white transition duration-200">
                                02
                            </span>
                            <h3 class="mt-5 font-serif text-lg font-bold text-[#1C1819]">Verifikasi Pengelola</h3>
                            <p class="mt-2 text-xs leading-relaxed text-[#554749]">Administrator memeriksa berkas dan mengalokasikan unit kerja penanggung jawab teknis dalam 24 jam.</p>
                        </div>
                        <div class="group rounded-2xl border border-[#DCD5C8] bg-[#FAF7F5] p-7 transition-all duration-200 hover:-translate-y-1 hover:shadow-md hover:border-[#4A151C]/40">
                            <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-white border border-[#DCD5C8] font-display text-3xl text-[#4A151C] shadow-2xs group-hover:scale-105 group-hover:bg-[#4A151C] group-hover:text-white transition duration-200">
                                03
                            </span>
                            <h3 class="mt-5 font-serif text-lg font-bold text-[#1C1819]">Eksekusi & Penyelesaian</h3>
                            <p class="mt-2 text-xs leading-relaxed text-[#554749]">Tindakan di lapangan dilaksanakan tuntas, status dikonfirmasi, dan hasil penanganan terdokumentasi.</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Categories Section: Tactile Lift Cards --}}
            <section id="kategori" class="border-b border-[#DCD5C8]/80 bg-[#F7F4EE] py-18">
                <div class="mx-auto max-w-7xl px-6 lg:px-10">
                    <div class="max-w-2xl">
                        <p class="font-mono text-xs font-bold tracking-[.2em] uppercase text-[#4A151C]">KLASIFIKASI ADUAN</p>
                        <h2 class="mt-3 font-serif text-3xl sm:text-4xl font-bold tracking-tight text-[#1C1819]">Fasilitas umum dan kenyamanan lingkungan sipil.</h2>
                    </div>

                    <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                        <div class="group rounded-2xl border border-[#DCD5C8] bg-white p-6 shadow-2xs transition-all duration-200 hover:-translate-y-1.5 hover:shadow-md hover:border-[#4A151C]/40 cursor-default">
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#FAF7F5] border border-[#ECE7DF] text-[#4A151C] transition duration-200 group-hover:bg-[#4A151C] group-hover:text-white">
                                <i data-lucide="wrench" class="h-5 w-5"></i>
                            </div>
                            <h3 class="mt-4 font-serif text-base font-bold text-[#1C1819]">Infrastruktur Jalan</h3>
                            <p class="mt-2 text-xs leading-relaxed text-[#7A6B6E]">Jalan berlubang, trotoar rusak, pembatas jalan ambruk, dan fasilitas pedestrian umum.</p>
                        </div>
                        <div class="group rounded-2xl border border-[#DCD5C8] bg-white p-6 shadow-2xs transition-all duration-200 hover:-translate-y-1.5 hover:shadow-md hover:border-[#4A151C]/40 cursor-default">
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#FAF7F5] border border-[#ECE7DF] text-[#4A151C] transition duration-200 group-hover:bg-[#4A151C] group-hover:text-white">
                                <i data-lucide="zap" class="h-5 w-5"></i>
                            </div>
                            <h3 class="mt-4 font-serif text-base font-bold text-[#1C1819]">Penerangan & Kelistrikan</h3>
                            <p class="mt-2 text-xs leading-relaxed text-[#7A6B6E]">PJU padam malam hari, kabel instalasi menjuntai, gardu bermasalah, atau tiang miring.</p>
                        </div>
                        <div class="group rounded-2xl border border-[#DCD5C8] bg-white p-6 shadow-2xs transition-all duration-200 hover:-translate-y-1.5 hover:shadow-md hover:border-[#4A151C]/40 cursor-default">
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#FAF7F5] border border-[#ECE7DF] text-[#4A151C] transition duration-200 group-hover:bg-[#4A151C] group-hover:text-white">
                                <i data-lucide="trash-2" class="h-5 w-5"></i>
                            </div>
                            <h3 class="mt-4 font-serif text-base font-bold text-[#1C1819]">Kebersihan & Sampah</h3>
                            <p class="mt-2 text-xs leading-relaxed text-[#7A6B6E]">Tumpukan sampah liar, drainase mampet, sedimentasi parit, atau saluran air meluap.</p>
                        </div>
                        <div class="group rounded-2xl border border-[#DCD5C8] bg-white p-6 shadow-2xs transition-all duration-200 hover:-translate-y-1.5 hover:shadow-md hover:border-[#4A151C]/40 cursor-default">
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#FAF7F5] border border-[#ECE7DF] text-[#4A151C] transition duration-200 group-hover:bg-[#4A151C] group-hover:text-white">
                                <i data-lucide="shield-alert" class="h-5 w-5"></i>
                            </div>
                            <h3 class="mt-4 font-serif text-base font-bold text-[#1C1819]">Ketertiban Umum</h3>
                            <p class="mt-2 text-xs leading-relaxed text-[#7A6B6E]">Gangguan fasilitas bersama, parkir liar menghalangi jalur evakuasi, dan keamanan sipil.</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- CTA Editorial Commitment Panel --}}
            <section id="komitmen" class="bg-[#3C0F15] text-[#FAF7F5] py-16">
                <div class="mx-auto max-w-7xl px-6 lg:px-10">
                    <div class="grid items-center gap-8 md:grid-cols-12">
                        <div class="md:col-span-8">
                            <p class="font-mono text-xs font-bold tracking-[.2em] uppercase text-[#C59B27]">KOMITMEN LAYANAN PUBLIK</p>
                            <h2 class="mt-2 font-serif text-3xl sm:text-4xl font-bold leading-snug text-white">
                                Transparansi adalah dasar kepercayaan warga.
                            </h2>
                            <p class="mt-4 text-sm leading-relaxed text-[#D6C4C6]">
                                Laporkan kendala fasilitas di sekitar Anda. Setiap masukan adalah langkah konkret menuju ruang hidup yang lebih aman dan teratur.
                            </p>
                        </div>
                        <div class="md:col-span-4 md:text-right">
                            <a
                                href="{{ auth()->check() ? route(auth()->user()->dashboardRoute()) : route('register') }}"
                                class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-6 py-3.5 font-mono text-xs font-bold uppercase tracking-wider text-[#3C0F15] shadow-sm transition-all duration-150 hover:-translate-y-0.5 hover:shadow-lg hover:bg-[#FAF7F5] active:translate-y-0 active:scale-95 cursor-pointer"
                            >
                                Mulai Laporkan
                                <i data-lucide="arrow-right" class="h-4 w-4"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="border-t border-[#DCD5C8]/80 bg-[#F7F4EE] py-8">
            <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-4 px-6 font-mono text-[11px] text-[#7A6B6E] lg:px-10">
                <div class="flex items-center gap-3">
                    <span class="font-bold text-[#1C1819]">E-REPORT</span>
                    <span>&bull;</span>
                    <span>SISTEM INFORMASI LAYANAN PENGADUAN SIPIL</span>
                </div>
                <div class="flex items-center gap-4">
                    <span>&copy; {{ date('Y') }} Hak Cipta Dilindungi</span>
                    <a href="#prosedur" class="hover:text-[#4A151C] underline underline-offset-2 transition">Panduan Prosedur</a>
                </div>
            </div>
        </footer>

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