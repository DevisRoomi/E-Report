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
                    <x-civic-logo size="md" />
                    <div>
                        <span class="font-display text-2xl tracking-wider text-[#1C1819]">E-REPORT<span class="text-[#C59B27]">.</span></span>
                        <span class="block font-mono text-[9px] uppercase tracking-widest text-[#7A6B6E]">Layanan Sipil</span>
                    </div>
                </a>

                <div class="hidden items-center gap-8 font-mono text-xs font-semibold tracking-wider uppercase text-[#554749] md:flex">
                    <a href="#prosedur" class="hover:text-[#4A151C] transition hover:-translate-y-0.5 active:translate-y-0">Alur Pengaduan</a>
                    <a href="#kategori" class="hover:text-[#4A151C] transition hover:-translate-y-0.5 active:translate-y-0">Kategori</a>
                    <a href="#galeri" class="hover:text-[#4A151C] transition hover:-translate-y-0.5 active:translate-y-0">Dokumentasi Lapangan</a>
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

                        {{-- Interactive Specimen Card with Real Photo Documentation & Alpine Switcher --}}
                        <div class="lg:col-span-5" x-data="{
                            activeTab: 0,
                            items: [
                                {
                                    id: 'REP-2026-042',
                                    badge: 'DIPROSES',
                                    badgeClass: 'bg-[#FDF9F0] text-[#8C6D0F] border-[#E8D49B]',
                                    kategori: 'Penerangan Jalan (PJU)',
                                    judul: 'Perbaikan Lampu Jalan Simpang Melati Padam 3 Malam',
                                    lokasi: 'Jl. Melati RT 04 / RW 02, Sektor Barat',
                                    tindakLanjut: 'Teknisi Dinas ESDM penggantian trafo & kabel induk',
                                    waktu: '30 Okt 2026, 09:15 WIB',
                                    photo: '{{ asset("images/gallery/teknisi_pju_opt.jpg") }}',
                                    petugas: 'Unit Reaksi Cepat ESDM 03'
                                },
                                {
                                    id: 'REP-2026-079',
                                    badge: 'SELESAI',
                                    badgeClass: 'bg-[#F2F7F4] text-[#1D5E38] border-[#A8D3B8]',
                                    kategori: 'Infrastruktur Jalan',
                                    judul: 'Penambalan Lubang Aspal Amblas Dekat Jembatan',
                                    lokasi: 'Jl. Pemuda No. 12, Kelurahan Sukamaju',
                                    tindakLanjut: 'Pekerjaan perataan aspal hotmix telah rampung 100%',
                                    waktu: '28 Okt 2026, 14:20 WIB',
                                    photo: '{{ asset("images/gallery/jalan_aspal_opt.jpg") }}',
                                    petugas: 'Dinas Bina Marga & Tata Ruang'
                                },
                                {
                                    id: 'REP-2026-091',
                                    badge: 'MENUNGGU',
                                    badgeClass: 'bg-[#FAF2F3] text-[#85222E] border-[#E5B8BE]',
                                    kategori: 'Kebersihan & Drainase',
                                    judul: 'Saluran Drainase Tersumbat Endapan Sampah Liar',
                                    lokasi: 'Gang Mawar 3 RT 01, RW 05',
                                    tindakLanjut: 'Antrean tim pembersihan & ekskavasi parit akhir pekan',
                                    waktu: '30 Okt 2026, 11:05 WIB',
                                    photo: '{{ asset("images/gallery/ekskavator_kerja_opt.jpg") }}',
                                    petugas: 'Satgas Dinas Lingkungan Hidup'
                                }
                            ]
                        }">
                            <div class="rounded-3xl border border-[#DCD5C8] bg-white/95 backdrop-blur-sm p-6 sm:p-7 shadow-[0_8px_30px_rgb(74,21,28,0.06)] transition-all duration-200 hover:shadow-[0_12px_40px_rgb(74,21,28,0.12)]">
                                <div class="flex items-center justify-between border-b border-[#ECE7DF] pb-4">
                                    <div class="flex items-center gap-2">
                                        <x-civic-logo size="sm" />
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

                                {{-- Photographic Evidence Thumbnail with Verified Watermark --}}
                                <div class="mt-4 relative overflow-hidden rounded-2xl border border-[#ECE7DF] h-40 bg-[#1C1819] shadow-inner group">
                                    <img :src="items[activeTab].photo" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105 filter contrast-110" alt="Foto dokumentasi fisik lapangan">
                                    <div class="absolute inset-0 bg-gradient-to-t from-[#1C1819]/90 via-[#1C1819]/25 to-transparent"></div>
                                    <div class="absolute top-2.5 left-2.5 flex items-center gap-1.5 rounded-md bg-[#3C0F15]/90 backdrop-blur-xs px-2.5 py-1 font-mono text-[9px] font-bold tracking-wider text-[#FAF7F5] border border-[#C59B27]/40">
                                        <span class="h-1.5 w-1.5 rounded-full bg-[#C59B27] animate-pulse"></span>
                                        DOKUMENTASI OTENTIK
                                    </div>
                                    <div class="absolute bottom-2.5 left-3 right-3 flex items-center justify-between font-mono text-[10px] text-white">
                                        <span class="text-[#D6C4C6] truncate" x-text="items[activeTab].petugas"></span>
                                        <span class="text-[#C59B27] font-semibold tracking-wider shrink-0">&bull; TERVERIFIKASI</span>
                                    </div>
                                </div>

                                <div class="mt-4 space-y-3.5">
                                    <div class="rounded-2xl bg-[#FAF7F5] border border-[#ECE7DF] p-4 transition-all">
                                        <p class="font-mono text-[10px] font-bold uppercase tracking-wider text-[#C59B27]" x-text="items[activeTab].kategori"></p>
                                        <p class="mt-1 font-serif text-base font-bold text-[#1C1819] leading-snug" x-text="items[activeTab].judul"></p>
                                        <p class="mt-1.5 text-xs leading-relaxed text-[#554749]" x-text="items[activeTab].tindakLanjut"></p>
                                    </div>

                                    <div class="space-y-2 font-mono text-xs">
                                        <div class="flex items-center justify-between border-b border-[#ECE7DF] pb-2 text-[11px]">
                                            <span class="text-[#7A6B6E]">Lokasi</span>
                                            <span class="font-semibold text-[#1C1819] text-right" x-text="items[activeTab].lokasi"></span>
                                        </div>
                                        <div class="flex items-center justify-between text-[11px]">
                                            <span class="text-[#7A6B6E]">Waktu Registrasi</span>
                                            <span class="font-semibold text-[#1C1819]" x-text="items[activeTab].waktu"></span>
                                        </div>
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

            {{-- Categories Section: Photographic Editorial Tactile Cards --}}
            <section id="kategori" class="border-b border-[#DCD5C8]/80 bg-[#F7F4EE] py-18">
                <div class="mx-auto max-w-7xl px-6 lg:px-10">
                    <div class="max-w-2xl">
                        <p class="font-mono text-xs font-bold tracking-[.2em] uppercase text-[#4A151C]">KLASIFIKASI ADUAN</p>
                        <h2 class="mt-3 font-serif text-3xl sm:text-4xl font-bold tracking-tight text-[#1C1819]">Fasilitas umum dan kenyamanan lingkungan sipil.</h2>
                    </div>

                    <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                        {{-- Card 1 --}}
                        <div class="group relative overflow-hidden rounded-2xl border border-[#DCD5C8] bg-white p-6 shadow-2xs transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:border-[#4A151C] cursor-default flex flex-col justify-between">
                            <div class="relative z-10">
                                <div class="flex items-center justify-between">
                                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#FAF7F5] border border-[#ECE7DF] text-[#4A151C] transition duration-200 group-hover:bg-[#4A151C] group-hover:text-white">
                                        <i data-lucide="wrench" class="h-5 w-5"></i>
                                    </div>
                                    <span class="font-mono text-[10px] font-bold text-[#7A6B6E] tracking-widest uppercase">KAT-01</span>
                                </div>
                                <h3 class="mt-4 font-serif text-base font-bold text-[#1C1819] group-hover:text-[#4A151C] transition-colors">Infrastruktur Jalan</h3>
                                <p class="mt-2 text-xs leading-relaxed text-[#7A6B6E]">Jalan berlubang, trotoar amblas, pembatas ambruk, dan fasilitas pedestrian.</p>
                            </div>
                            <div class="mt-5 pt-3 border-t border-[#ECE7DF] flex items-center justify-between font-mono text-[10px] text-[#554749]">
                                <span>Target Respon</span>
                                <span class="font-bold text-[#4A151C]">&le; 24 Jam</span>
                            </div>
                        </div>

                        {{-- Card 2 --}}
                        <div class="group relative overflow-hidden rounded-2xl border border-[#DCD5C8] bg-white p-6 shadow-2xs transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:border-[#4A151C] cursor-default flex flex-col justify-between">
                            <div class="relative z-10">
                                <div class="flex items-center justify-between">
                                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#FAF7F5] border border-[#ECE7DF] text-[#4A151C] transition duration-200 group-hover:bg-[#4A151C] group-hover:text-white">
                                        <i data-lucide="zap" class="h-5 w-5"></i>
                                    </div>
                                    <span class="font-mono text-[10px] font-bold text-[#7A6B6E] tracking-widest uppercase">KAT-02</span>
                                </div>
                                <h3 class="mt-4 font-serif text-base font-bold text-[#1C1819] group-hover:text-[#4A151C] transition-colors">Penerangan & Kelistrikan</h3>
                                <p class="mt-2 text-xs leading-relaxed text-[#7A6B6E]">PJU padam malam hari, kabel instalasi membahayakan, trafo, tiang listrik miring.</p>
                            </div>
                            <div class="mt-5 pt-3 border-t border-[#ECE7DF] flex items-center justify-between font-mono text-[10px] text-[#554749]">
                                <span>Target Respon</span>
                                <span class="font-bold text-[#4A151C]">&le; 12 Jam</span>
                            </div>
                        </div>

                        {{-- Card 3 --}}
                        <div class="group relative overflow-hidden rounded-2xl border border-[#DCD5C8] bg-white p-6 shadow-2xs transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:border-[#4A151C] cursor-default flex flex-col justify-between">
                            <div class="relative z-10">
                                <div class="flex items-center justify-between">
                                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#FAF7F5] border border-[#ECE7DF] text-[#4A151C] transition duration-200 group-hover:bg-[#4A151C] group-hover:text-white">
                                        <i data-lucide="trash-2" class="h-5 w-5"></i>
                                    </div>
                                    <span class="font-mono text-[10px] font-bold text-[#7A6B6E] tracking-widest uppercase">KAT-03</span>
                                </div>
                                <h3 class="mt-4 font-serif text-base font-bold text-[#1C1819] group-hover:text-[#4A151C] transition-colors">Kebersihan & Sampah</h3>
                                <p class="mt-2 text-xs leading-relaxed text-[#7A6B6E]">Tumpukan sampah liar, drainase mampet, sedimentasi got saluran meluap.</p>
                            </div>
                            <div class="mt-5 pt-3 border-t border-[#ECE7DF] flex items-center justify-between font-mono text-[10px] text-[#554749]">
                                <span>Target Respon</span>
                                <span class="font-bold text-[#4A151C]">&le; 24 Jam</span>
                            </div>
                        </div>

                        {{-- Card 4 --}}
                        <div class="group relative overflow-hidden rounded-2xl border border-[#DCD5C8] bg-white p-6 shadow-2xs transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:border-[#4A151C] cursor-default flex flex-col justify-between">
                            <div class="relative z-10">
                                <div class="flex items-center justify-between">
                                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#FAF7F5] border border-[#ECE7DF] text-[#4A151C] transition duration-200 group-hover:bg-[#4A151C] group-hover:text-white">
                                        <i data-lucide="shield-alert" class="h-5 w-5"></i>
                                    </div>
                                    <span class="font-mono text-[10px] font-bold text-[#7A6B6E] tracking-widest uppercase">KAT-04</span>
                                </div>
                                <h3 class="mt-4 font-serif text-base font-bold text-[#1C1819] group-hover:text-[#4A151C] transition-colors">Ketertiban Umum</h3>
                                <p class="mt-2 text-xs leading-relaxed text-[#7A6B6E]">Fasilitas umum rusak terhalang, rambu lalulintas roboh, dan keamanan sipil.</p>
                            </div>
                            <div class="mt-5 pt-3 border-t border-[#ECE7DF] flex items-center justify-between font-mono text-[10px] text-[#554749]">
                                <span>Target Respon</span>
                                <span class="font-bold text-[#4A151C]">&le; 48 Jam</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Dramatic Photographic Documentary Proof Dispatch Section (Josjis, Sangar, Gagah) --}}
            <section id="galeri" class="border-b border-[#310A10] bg-[#1C1819] text-[#FAF7F5] py-20 relative overflow-hidden">
                {{-- Ambient glow accents --}}
                <div class="absolute -top-32 -right-32 h-96 w-96 rounded-full bg-[#4A151C]/40 blur-3xl pointer-events-none"></div>
                <div class="absolute -bottom-32 -left-32 h-96 w-96 rounded-full bg-[#C59B27]/10 blur-3xl pointer-events-none"></div>

                <div class="relative mx-auto max-w-7xl px-6 lg:px-10">
                    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 border-b border-[#352F31] pb-8">
                        <div>
                            <div class="inline-flex items-center gap-2 rounded-full border border-[#C59B27]/40 bg-[#3C0F15] px-3 py-1 font-mono text-[10px] font-bold tracking-widest uppercase text-[#FAF7F5]">
                                <span class="h-1.5 w-1.5 rounded-full bg-[#C59B27] animate-pulse"></span>
                                ARSIP PENANGANAN FISIK
                            </div>
                            <h2 class="mt-4 font-serif text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-white leading-tight">
                                Dokumentasi Eksekusi Lapangan.
                            </h2>
                            <p class="mt-3 text-sm leading-relaxed text-[#B99A9F] max-w-2xl">
                                Rekam jejak intervensi teknis nyata di lapangan. Dari perataan jalan aspal uap malam, perbaikan tiang instalasi, hingga rekayasa saluran parit terbuka.
                            </p>
                        </div>
                        <div class="font-mono text-xs text-[#B99A9F] shrink-0 text-left md:text-right">
                            <span class="block text-white font-bold text-base font-display">100% TERVERIFIKASI</span>
                            <span>INSPEKSI VISUAL BERKOORDINAT</span>
                        </div>
                    </div>

                    {{-- 4 Cinematic Photographic Dispatch Grid --}}
                    <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                        {{-- Dispatch 1 --}}
                        <div class="group relative overflow-hidden rounded-2xl border border-[#352F31] bg-[#252022] transition-all duration-300 hover:-translate-y-2 hover:border-[#C59B27]/70 hover:shadow-2xl">
                            <div class="relative h-64 overflow-hidden">
                                <img
                                    src="{{ asset('images/gallery/jalan_aspal_opt.jpg') }}"
                                    alt="Pekerjaan konstruksi jalan dan mesin paver aspal hotmix"
                                    class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110 filter contrast-125 saturate-75 brightness-90"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-[#1C1819] via-[#1C1819]/30 to-transparent"></div>
                                <div class="absolute top-3 left-3">
                                    <span class="rounded-md bg-[#1D5E38]/90 backdrop-blur-xs px-2 py-0.5 font-mono text-[9px] font-bold uppercase tracking-wider text-white border border-emerald-400/40">
                                        SELESAI FISIK
                                    </span>
                                </div>
                                <div class="absolute bottom-3 left-4 right-4">
                                    <span class="font-mono text-[10px] text-[#C59B27] font-semibold tracking-widest block">SEKTOR BINA MARGA</span>
                                    <h3 class="font-serif text-lg font-bold text-white leading-snug mt-0.5">Penambalan & Gelar Aspal Hotmix</h3>
                                </div>
                            </div>
                            <div class="p-4 border-t border-[#352F31]/60 font-mono text-xs text-[#A8989A] space-y-1.5">
                                <div class="flex items-center justify-between text-[11px]">
                                    <span>Titik Lokasi</span>
                                    <span class="font-semibold text-white">Jl. Pemuda Km 4.2</span>
                                </div>
                                <div class="flex items-center justify-between text-[11px]">
                                    <span>Pelaksana</span>
                                    <span class="text-[#D6C4C6]">Unit Respon Cepat 02</span>
                                </div>
                            </div>
                        </div>

                        {{-- Dispatch 2 --}}
                        <div class="group relative overflow-hidden rounded-2xl border border-[#352F31] bg-[#252022] transition-all duration-300 hover:-translate-y-2 hover:border-[#C59B27]/70 hover:shadow-2xl">
                            <div class="relative h-64 overflow-hidden">
                                <img
                                    src="{{ asset('images/gallery/teknisi_pju_opt.jpg') }}"
                                    alt="Teknisi instalasi kelistrikan mobil derek tiang PJU"
                                    class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110 filter contrast-125 saturate-75 brightness-90"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-[#1C1819] via-[#1C1819]/30 to-transparent"></div>
                                <div class="absolute top-3 left-3">
                                    <span class="rounded-md bg-[#8C6D0F]/90 backdrop-blur-xs px-2 py-0.5 font-mono text-[9px] font-bold uppercase tracking-wider text-white border border-[#E8D49B]/40">
                                        REKONSTRUKSI
                                    </span>
                                </div>
                                <div class="absolute bottom-3 left-4 right-4">
                                    <span class="font-mono text-[10px] text-[#C59B27] font-semibold tracking-widest block">INSTALASI ESDM</span>
                                    <h3 class="font-serif text-lg font-bold text-white leading-snug mt-0.5">Penggantian Trafo Jaringan PJU</h3>
                                </div>
                            </div>
                            <div class="p-4 border-t border-[#352F31]/60 font-mono text-xs text-[#A8989A] space-y-1.5">
                                <div class="flex items-center justify-between text-[11px]">
                                    <span>Titik Lokasi</span>
                                    <span class="font-semibold text-white">Simpang Melati Timur</span>
                                </div>
                                <div class="flex items-center justify-between text-[11px]">
                                    <span>Pelaksana</span>
                                    <span class="text-[#D6C4C6]">Regu Teknisi Derek Altec</span>
                                </div>
                            </div>
                        </div>

                        {{-- Dispatch 3 --}}
                        <div class="group relative overflow-hidden rounded-2xl border border-[#352F31] bg-[#252022] transition-all duration-300 hover:-translate-y-2 hover:border-[#C59B27]/70 hover:shadow-2xl">
                            <div class="relative h-64 overflow-hidden">
                                <img
                                    src="{{ asset('images/gallery/ekskavator_kerja_opt.jpg') }}"
                                    alt="Ekskavator alat berat galian parit dan drainase lingkungan"
                                    class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110 filter contrast-125 saturate-75 brightness-90"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-[#1C1819] via-[#1C1819]/30 to-transparent"></div>
                                <div class="absolute top-3 left-3">
                                    <span class="rounded-md bg-[#4A151C]/90 backdrop-blur-xs px-2 py-0.5 font-mono text-[9px] font-bold uppercase tracking-wider text-white border border-rose-400/40">
                                        OPERASIONAL
                                    </span>
                                </div>
                                <div class="absolute bottom-3 left-4 right-4">
                                    <span class="font-mono text-[10px] text-[#C59B27] font-semibold tracking-widest block">SUMBER DAYA AIR</span>
                                    <h3 class="font-serif text-lg font-bold text-white leading-snug mt-0.5">Ekskavasi & Pengerukan Parit</h3>
                                </div>
                            </div>
                            <div class="p-4 border-t border-[#352F31]/60 font-mono text-xs text-[#A8989A] space-y-1.5">
                                <div class="flex items-center justify-between text-[11px]">
                                    <span>Titik Lokasi</span>
                                    <span class="font-semibold text-white">Bantaran Saluran Pembuang</span>
                                </div>
                                <div class="flex items-center justify-between text-[11px]">
                                    <span>Pelaksana</span>
                                    <span class="text-[#D6C4C6]">Satgas Alat Berat Dinas</span>
                                </div>
                            </div>
                        </div>

                        {{-- Dispatch 4 --}}
                        <div class="group relative overflow-hidden rounded-2xl border border-[#352F31] bg-[#252022] transition-all duration-300 hover:-translate-y-2 hover:border-[#C59B27]/70 hover:shadow-2xl">
                            <div class="relative h-64 overflow-hidden">
                                <img
                                    src="{{ asset('images/gallery/guardrail_rambu_opt.jpg') }}"
                                    alt="Pemasangan pengaman guardrail baja jalan tol"
                                    class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110 filter contrast-125 saturate-75 brightness-90"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-[#1C1819] via-[#1C1819]/30 to-transparent"></div>
                                <div class="absolute top-3 left-3">
                                    <span class="rounded-md bg-[#1D5E38]/90 backdrop-blur-xs px-2 py-0.5 font-mono text-[9px] font-bold uppercase tracking-wider text-white border border-emerald-400/40">
                                        INSPEKSI AMAN
                                    </span>
                                </div>
                                <div class="absolute bottom-3 left-4 right-4">
                                    <span class="font-mono text-[10px] text-[#C59B27] font-semibold tracking-widest block">AUDIT SIPIL</span>
                                    <h3 class="font-serif text-lg font-bold text-white leading-snug mt-0.5">Pemasangan Guardrail Baja</h3>
                                </div>
                            </div>
                            <div class="p-4 border-t border-[#352F31]/60 font-mono text-xs text-[#A8989A] space-y-1.5">
                                <div class="flex items-center justify-between text-[11px]">
                                    <span>Titik Lokasi</span>
                                    <span class="font-semibold text-white">Jalur Tol Lingkar Luar Km 11</span>
                                </div>
                                <div class="flex items-center justify-between text-[11px]">
                                    <span>Pelaksana</span>
                                    <span class="text-[#D6C4C6]">Inspektur Keselamatan Bina Marga</span>
                                </div>
                            </div>
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

        <footer class="border-t border-[#DCD5C8]/80 bg-[#F7F4EE] py-10">
            <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-6 px-6 font-mono text-[11px] text-[#7A6B6E] lg:px-10">
                <div class="flex items-center gap-3">
                    <x-civic-logo size="sm" />
                    <div>
                        <span class="font-bold text-[#1C1819] tracking-wider">E-REPORT.</span>
                        <span class="block text-[9px] text-[#7A6B6E] uppercase">SISTEM INFORMASI PENGADUAN FASILITAS SIPIL</span>
                    </div>
                </div>
                <div class="flex flex-wrap items-center gap-6">
                    <span>&copy; {{ date('Y') }} Hak Cipta Dilindungi</span>
                    <a href="#prosedur" class="hover:text-[#4A151C] underline underline-offset-2 transition">Panduan Prosedur</a>
                    <a href="#galeri" class="hover:text-[#4A151C] underline underline-offset-2 transition">Dokumentasi Lapangan</a>
                    <span class="text-[#4A151C] font-semibold">&bull; STANDAR SP4N-LAPOR!</span>
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