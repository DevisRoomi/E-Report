<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#4A151C">
        <title>E-Report · Layanan Sipil & Pengaduan Warga</title>
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
        <meta name="description" content="E-Report adalah register sipil terverifikasi untuk pencatatan, investigasi, dan penyelesaian fasilitas publik warga.">
    </head>
    <body class="bg-[#F7F4F2] font-sans text-[#1C1819] antialiased selection:bg-[#4A151C] selection:text-white">
        {{-- Top editorial header bar --}}
        <div class="border-b border-[#310A10] bg-[#3C0F15] px-6 py-2.5 text-xs text-[#FAF7F5]">
            <div class="mx-auto flex max-w-7xl items-center justify-between font-mono text-[10px] uppercase tracking-widest text-[#D6C4C6]">
                <div class="flex items-center gap-3">
                    <span class="inline-block h-1.5 w-1.5 rounded-full bg-[#C59B27]"></span>
                    <span>SISTEM INFORMASI PENGADUAN & LAYANAN PUBLIK RESMI</span>
                </div>
                <div class="hidden sm:flex items-center gap-4">
                    <span>REGISTRASI TERCATAT</span>
                    <span>&bull;</span>
                    <span>AKUNTABILITAS TINGGI</span>
                </div>
            </div>
        </div>

        <header class="sticky top-0 z-30 border-b border-[#DCD5C8] bg-[#F7F4F2]/95 backdrop-blur-xs">
            <nav class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-6 py-4 lg:px-10" aria-label="Navigasi beranda">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                    <span class="flex h-10 w-10 items-center justify-center rounded-md bg-[#4A151C] text-white shadow-xs">
                        <i data-lucide="shield" aria-hidden="true" class="h-5 w-5 stroke-[2.5]"></i>
                    </span>
                    <div>
                        <span class="font-display text-2xl tracking-wider text-[#1C1819]">E-REPORT</span>
                        <span class="block font-mono text-[9px] uppercase tracking-widest text-[#7A6B6E]">Layanan Sipil</span>
                    </div>
                </a>

                <div class="hidden items-center gap-8 font-mono text-xs font-semibold tracking-wider uppercase text-[#554749] md:flex">
                    <a href="#prosedur" class="hover:text-[#4A151C] transition">Prosedur</a>
                    <a href="#kategori" class="hover:text-[#4A151C] transition">Kategori Aduan</a>
                    <a href="#standar" class="hover:text-[#4A151C] transition">Standar Mutu</a>
                </div>

                <div class="flex items-center gap-3">
                    @auth
                        <a
                            href="{{ route(auth()->user()->dashboardRoute()) }}"
                            class="inline-flex items-center justify-center gap-2 rounded-md bg-[#4A151C] px-5 py-2.5 font-mono text-xs font-bold uppercase tracking-wider text-white shadow-xs transition hover:bg-[#3C0F15]"
                        >
                            Masuk Dashboard
                            <i data-lucide="arrow-up-right" aria-hidden="true" class="h-3.5 w-3.5 shrink-0"></i>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-3 py-2 font-mono text-xs font-bold uppercase tracking-wider text-[#1C1819] hover:text-[#4A151C] transition">
                            Masuk
                        </a>
                        <a
                            href="{{ route('register') }}"
                            class="inline-flex items-center justify-center gap-2 rounded-md bg-[#4A151C] px-5 py-2.5 font-mono text-xs font-bold uppercase tracking-wider text-white shadow-xs transition hover:bg-[#3C0F15]"
                        >
                            Daftar Warga
                            <i data-lucide="arrow-right" aria-hidden="true" class="h-3.5 w-3.5 shrink-0"></i>
                        </a>
                    @endauth
                </div>
            </nav>
        </header>

        <main>
            {{-- Hero Section: Editorial & Fashion Deck Modular Authority --}}
            <section class="border-b border-[#DCD5C8]">
                <div class="mx-auto max-w-7xl px-6 py-16 lg:px-10 lg:py-24">
                    <div class="grid items-center gap-12 lg:grid-cols-12 lg:gap-16">
                        <div class="lg:col-span-7">
                            <div class="mb-5 inline-flex items-center gap-2 font-mono text-xs font-bold tracking-[.2em] uppercase text-[#4A151C]">
                                <span class="h-1.5 w-1.5 rounded-full bg-[#4A151C]"></span>
                                TRANSPARANSI & PENGAWALAN FASILITAS UMUM
                            </div>
                            <h1 class="font-serif text-5xl font-bold leading-[1.08] tracking-tight sm:text-7xl text-[#1C1819]">
                                Suara Warga,<br>
                                <span class="italic font-normal text-[#4A151C]">Langkah Nyata</span> Perubahan.
                            </h1>
                            <p class="mt-6 max-w-xl text-base leading-relaxed text-[#554749]">
                                Setiap aduan warga diarsipkan dengan nomor register tunggal, dipantau tahapan audit lapangannya, dan diselesaikan oleh dinas terkait secara transparan.
                            </p>

                            <div class="mt-8 flex flex-wrap gap-3">
                                <a
                                    href="{{ auth()->check() ? route(auth()->user()->dashboardRoute()) : route('register') }}"
                                    class="inline-flex items-center justify-center gap-2 rounded-md bg-[#4A151C] px-6 py-3.5 font-mono text-xs font-bold uppercase tracking-wider text-white shadow-xs transition hover:bg-[#3C0F15]"
                                >
                                    Buat Pengaduan Sekarang
                                    <i data-lucide="arrow-right" aria-hidden="true" class="h-4 w-4 shrink-0"></i>
                                </a>
                                <a
                                    href="#prosedur"
                                    class="inline-flex items-center justify-center gap-2 rounded-md border border-[#DCD5C8] bg-white px-6 py-3.5 font-mono text-xs font-bold uppercase tracking-wider text-[#1C1819] hover:bg-[#EFECE6] transition"
                                >
                                    Lihat Prosedur
                                </a>
                            </div>

                            <div class="mt-10 grid grid-cols-3 gap-6 border-t border-[#DCD5C8] pt-8">
                                <div>
                                    <p class="font-display text-3xl font-bold text-[#4A151C]">100%</p>
                                    <p class="font-mono text-[10px] uppercase tracking-wider text-[#7A6B6E]">Terdokumentasi</p>
                                </div>
                                <div>
                                    <p class="font-display text-3xl font-bold text-[#4A151C]">&le; 24 Jam</p>
                                    <p class="font-mono text-[10px] uppercase tracking-wider text-[#7A6B6E]">Respon Awal</p>
                                </div>
                                <div>
                                    <p class="font-display text-3xl font-bold text-[#4A151C]">Publik</p>
                                    <p class="font-mono text-[10px] uppercase tracking-wider text-[#7A6B6E]">Akses Tracking</p>
                                </div>
                            </div>
                        </div>

                        {{-- Right Editorial Specimen Card --}}
                        <div class="lg:col-span-5">
                            <div class="rounded-xl border border-[#DCD5C8] bg-white p-6 shadow-sm">
                                <div class="flex items-center justify-between border-b border-[#ECE7DF] pb-4">
                                    <div class="flex items-center gap-2 font-mono text-xs font-bold uppercase tracking-wider text-[#4A151C]">
                                        <i data-lucide="file-text" class="h-4 w-4"></i>
                                        BERKAS SAMPLE #REP-2026-084
                                    </div>
                                    <span class="rounded bg-[#FAF7F2] border border-[#DCD5C8] px-2 py-0.5 font-mono text-[10px] font-semibold text-[#8C6D0F]">
                                        DALAM TINDAK LANJUT
                                    </span>
                                </div>

                                <div class="mt-5 space-y-4">
                                    <div class="rounded-lg bg-[#FAF7F5] border border-[#ECE7DF] p-4">
                                        <p class="font-mono text-[10px] uppercase tracking-wider text-[#7A6B6E]">Objek Masalah</p>
                                        <p class="mt-1 font-serif text-lg font-bold text-[#1C1819]">Perbaikan Lampu Penerangan Jalan Umum</p>
                                        <p class="mt-2 text-xs leading-relaxed text-[#554749]">PJU di simpang Jl. Melati mati total 3 malam berturut-turut, membahayakan pengendara malam hari.</p>
                                    </div>

                                    <div class="space-y-3 font-mono text-xs">
                                        <div class="flex items-center justify-between border-b border-[#ECE7DF] pb-2 text-[11px]">
                                            <span class="text-[#7A6B6E]">Lokasi</span>
                                            <span class="font-semibold text-[#1C1819]">Jl. Melati RT 04 / RW 02</span>
                                        </div>
                                        <div class="flex items-center justify-between border-b border-[#ECE7DF] pb-2 text-[11px]">
                                            <span class="text-[#7A6B6E]">Status Penanganan</span>
                                            <span class="font-semibold text-[#4A151C]">Tim Lapangan Diterjunkan</span>
                                        </div>
                                        <div class="flex items-center justify-between text-[11px]">
                                            <span class="text-[#7A6B6E]">Waktu Laporan</span>
                                            <span class="font-semibold text-[#1C1819]">30 Okt 2026, 09:15 WIB</span>
                                        </div>
                                    </div>

                                    <div class="rounded-md border border-[#DCD5C8] bg-[#FAF7F5] p-3 text-center font-mono text-[11px] text-[#554749]">
                                        Status diperbarui secara real-time oleh petugas teknis.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- 3 Step Process --}}
            <section id="prosedur" class="border-b border-[#DCD5C8] bg-white py-20">
                <div class="mx-auto max-w-7xl px-6 lg:px-10">
                    <div class="max-w-2xl">
                        <p class="font-mono text-xs font-bold tracking-[.2em] uppercase text-[#4A151C]">ALUR PELAPORAN</p>
                        <h2 class="mt-3 font-serif text-3xl sm:text-4xl font-bold tracking-tight text-[#1C1819]">Tiga langkah tertib penyampaian aduan warga.</h2>
                        <p class="mt-4 text-sm leading-relaxed text-[#554749]">Proses verifikasi dan eskalasi terstandar agar setiap kendala lingkungan tercatat dan segera ditangani.</p>
                    </div>

                    <div class="mt-12 grid gap-8 md:grid-cols-3">
                        <div class="rounded-lg border border-[#DCD5C8] bg-[#FAF7F5] p-7">
                            <span class="font-display text-4xl text-[#4A151C]">01</span>
                            <h3 class="mt-4 font-serif text-lg font-bold text-[#1C1819]">Registrasi & Unggah Bukti</h3>
                            <p class="mt-2 text-xs leading-relaxed text-[#554749]">Daftarkan akun warga, tuliskan rincian kronologi, dan sertakan foto dokumentasi masalah di lapangan.</p>
                        </div>
                        <div class="rounded-lg border border-[#DCD5C8] bg-[#FAF7F5] p-7">
                            <span class="font-display text-4xl text-[#4A151C]">02</span>
                            <h3 class="mt-4 font-serif text-lg font-bold text-[#1C1819]">Verifikasi Pengelola</h3>
                            <p class="mt-2 text-xs leading-relaxed text-[#554749]">Administrator memeriksa keabsahan bukti dan mengalokasikan unit kerja penanggung jawab teknis.</p>
                        </div>
                        <div class="rounded-lg border border-[#DCD5C8] bg-[#FAF7F5] p-7">
                            <span class="font-display text-4xl text-[#4A151C]">03</span>
                            <h3 class="mt-4 font-serif text-lg font-bold text-[#1C1819]">Eksekusi & Penyelesaian</h3>
                            <p class="mt-2 text-xs leading-relaxed text-[#554749]">Tindakan di lapangan dilaksanakan hingga tuntas, status dikonfirmasi, dan arsip terdokumentasi rapi.</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Categories Section --}}
            <section id="kategori" class="border-b border-[#DCD5C8] bg-[#F7F4F2] py-20">
                <div class="mx-auto max-w-7xl px-6 lg:px-10">
                    <div class="max-w-2xl">
                        <p class="font-mono text-xs font-bold tracking-[.2em] uppercase text-[#4A151C]">KLASIFIKASI ADUAN</p>
                        <h2 class="mt-3 font-serif text-3xl sm:text-4xl font-bold tracking-tight text-[#1C1819]">Fasilitas umum dan kenyamanan lingkungan sipil.</h2>
                    </div>

                    <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                        <div class="rounded-lg border border-[#DCD5C8] bg-white p-6">
                            <div class="flex h-10 w-10 items-center justify-center rounded-md bg-[#3C0F15] text-[#C59B27]">
                                <i data-lucide="wrench" class="h-5 w-5"></i>
                            </div>
                            <h3 class="mt-4 font-serif text-base font-bold text-[#1C1819]">Infrastruktur Jalan</h3>
                            <p class="mt-2 text-xs leading-relaxed text-[#7A6B6E]">Jalan berlubang, trotoar rusak, pembatas jalan, dan fasilitas pedestrian umum.</p>
                        </div>
                        <div class="rounded-lg border border-[#DCD5C8] bg-white p-6">
                            <div class="flex h-10 w-10 items-center justify-center rounded-md bg-[#3C0F15] text-[#C59B27]">
                                <i data-lucide="zap" class="h-5 w-5"></i>
                            </div>
                            <h3 class="mt-4 font-serif text-base font-bold text-[#1C1819]">Penerangan & Kelistrikan</h3>
                            <p class="mt-2 text-xs leading-relaxed text-[#7A6B6E]">PJU padam, kabel menjuntai, korsleting gardu, atau tiang listrik miring.</p>
                        </div>
                        <div class="rounded-lg border border-[#DCD5C8] bg-white p-6">
                            <div class="flex h-10 w-10 items-center justify-center rounded-md bg-[#3C0F15] text-[#C59B27]">
                                <i data-lucide="trash-2" class="h-5 w-5"></i>
                            </div>
                            <h3 class="mt-4 font-serif text-base font-bold text-[#1C1819]">Kebersihan & Sampah</h3>
                            <p class="mt-2 text-xs leading-relaxed text-[#7A6B6E]">Tumpukan sampah liar, drainase mampet, saluran air tersumbat atau meluap.</p>
                        </div>
                        <div class="rounded-lg border border-[#DCD5C8] bg-white p-6">
                            <div class="flex h-10 w-10 items-center justify-center rounded-md bg-[#3C0F15] text-[#C59B27]">
                                <i data-lucide="shield-alert" class="h-5 w-5"></i>
                            </div>
                            <h3 class="mt-4 font-serif text-base font-bold text-[#1C1819]">Ketertiban Umum</h3>
                            <p class="mt-2 text-xs leading-relaxed text-[#7A6B6E]">Gangguan fasilitas publik, parkir liar menghalangi akses, dan ketertiban sipil.</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- CTA Editorial Panel --}}
            <section id="standar" class="bg-[#3C0F15] text-[#FAF7F5] py-16">
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
                                class="inline-flex items-center justify-center gap-2 rounded-md bg-white px-6 py-3.5 font-mono text-xs font-bold uppercase tracking-wider text-[#3C0F15] shadow-sm hover:bg-[#FAF7F5] transition"
                            >
                                Mulai Laporkan
                                <i data-lucide="arrow-right" class="h-4 w-4"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="border-t border-[#DCD5C8] bg-[#F7F4F2] py-8">
            <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-4 px-6 font-mono text-[11px] text-[#7A6B6E] lg:px-10">
                <div class="flex items-center gap-3">
                    <span class="font-bold text-[#1C1819]">E-REPORT</span>
                    <span>&bull;</span>
                    <span>SISTEM INFORMASI LAYANAN PENGADUAN SIPIL</span>
                </div>
                <div class="flex items-center gap-4">
                    <span>&copy; {{ date('Y') }} Hak Cipta Dilindungi</span>
                    <a href="#prosedur" class="hover:text-[#4A151C] underline underline-offset-2">Panduan Prosedur</a>
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