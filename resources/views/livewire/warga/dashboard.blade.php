<div wire:poll.30s>
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between border-b border-[#DCD5C8] pb-6">
        <div>
            <span class="font-mono text-[11px] font-bold tracking-[.2em] uppercase text-[#C59B27]">PORTAL ADUAN WARGA</span>
            <h1 class="mt-1 font-serif text-3xl font-bold tracking-tight text-[#1C1819] sm:text-4xl">{{ 'Selamat Datang, '.auth()->user()->name.'!' }}</h1>
            <p class="mt-1 text-xs leading-relaxed text-[#7A6B6E]">Pantau seluruh perkembangan pengaduan Anda dan sampaikan kendala fasilitas baru di lingkungan.</p>
        </div>
        <a
            href="{{ route('warga.laporan.create') }}"
            class="inline-flex items-center justify-center gap-2 rounded-md bg-[#4A151C] px-5 py-2.5 font-mono text-xs font-bold uppercase tracking-wider text-white shadow-xs transition hover:bg-[#3C0F15]"
        >
            <i data-lucide="plus" aria-hidden="true" class="h-3.5 w-3.5 shrink-0"></i>
            Buat Pengaduan Baru
        </a>
    </div>

    {{-- Ringkasan dari data yang dikirim oleh class Livewire --}}
    <div class="mb-8 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <div class="rounded-lg border border-[#DCD5C8] bg-white p-5 shadow-xs">
            <div class="flex items-center justify-between gap-3">
                <span class="font-mono text-[10px] uppercase tracking-wider text-[#7A6B6E]">Total Pengaduan</span>
                <span class="rounded p-2 bg-[#FAF7F5] border border-[#ECE7DF] text-[#4A151C]">
                    <i data-lucide="files" aria-hidden="true" class="h-4 w-4 shrink-0"></i>
                </span>
            </div>
            <p class="mt-3 font-display text-4xl text-[#1C1819]">{{ number_format($total) }}</p>
            <p class="mt-1 font-mono text-[10px] text-[#7A6B6E]">Pengaduan diajukan</p>
        </div>
        <div class="rounded-lg border border-[#DCD5C8] bg-white p-5 shadow-xs">
            <div class="flex items-center justify-between gap-3">
                <span class="font-mono text-[10px] uppercase tracking-wider text-[#7A6B6E]">Menunggu</span>
                <span class="rounded p-2 bg-[#FAF7F2] border border-[#ECE7DF] text-[#8C6D0F]">
                    <i data-lucide="clock-3" aria-hidden="true" class="h-4 w-4 shrink-0"></i>
                </span>
            </div>
            <p class="mt-3 font-display text-4xl text-[#8C6D0F]">{{ number_format($stats['pending']) }}</p>
            <p class="mt-1 font-mono text-[10px] text-[#7A6B6E]">Menunggu verifikasi</p>
        </div>
        <div class="rounded-lg border border-[#DCD5C8] bg-white p-5 shadow-xs">
            <div class="flex items-center justify-between gap-3">
                <span class="font-mono text-[10px] uppercase tracking-wider text-[#7A6B6E]">Sedang Diproses</span>
                <span class="rounded p-2 bg-[#F5F8FA] border border-[#ECE7DF] text-[#28577D]">
                    <i data-lucide="loader-circle" aria-hidden="true" class="h-4 w-4 shrink-0"></i>
                </span>
            </div>
            <p class="mt-3 font-display text-4xl text-[#28577D]">{{ number_format($stats['proses']) }}</p>
            <p class="mt-1 font-mono text-[10px] text-[#7A6B6E]">Dalam penanganan</p>
        </div>
        <div class="rounded-lg border border-[#DCD5C8] bg-white p-5 shadow-xs">
            <div class="flex items-center justify-between gap-3">
                <span class="font-mono text-[10px] uppercase tracking-wider text-[#7A6B6E]">Selesai</span>
                <span class="rounded p-2 bg-[#F3F7F4] border border-[#ECE7DF] text-[#1D5E38]">
                    <i data-lucide="circle-check" aria-hidden="true" class="h-4 w-4 shrink-0"></i>
                </span>
            </div>
            <p class="mt-3 font-display text-4xl text-[#1D5E38]">{{ number_format($stats['selesai']) }}</p>
            <p class="mt-1 font-mono text-[10px] text-[#7A6B6E]">Selesai ditangani</p>
        </div>
    </div>

    <div class="mb-8 flex flex-col gap-6 rounded-lg border border-[#310A10] bg-[#3C0F15] p-6 text-white sm:flex-row sm:items-center sm:justify-between">
        <div class="flex items-start gap-4">
            <span class="hidden rounded bg-white/10 p-3 text-[#C59B27] sm:inline-flex">
                <i data-lucide="megaphone" aria-hidden="true" class="h-6 w-6 shrink-0"></i>
            </span>
            <div>
                <p class="font-mono text-xs font-bold tracking-[.2em] uppercase text-[#C59B27]">PARTISIPASI AKTIF</p>
                <h2 class="mt-1 font-serif text-xl font-bold">Temukan kendala fasilitas publik di sekitar Anda?</h2>
                <p class="mt-1 text-xs leading-relaxed text-[#D6C4C6]">Jalan berlubang, lampu penerangan padam, atau saluran mampet. Masukan Anda mendorong perbaikan cepat.</p>
            </div>
        </div>
        <a href="{{ route('warga.laporan.create') }}" class="inline-flex shrink-0 items-center justify-center gap-2 rounded-md bg-white px-5 py-2.5 font-mono text-xs font-bold uppercase tracking-wider text-[#3C0F15] hover:bg-[#FAF7F5] transition">
            Ajukan Sekarang
            <i data-lucide="arrow-right" aria-hidden="true" class="h-3.5 w-3.5 shrink-0"></i>
        </a>
    </div>

    {{-- Pengaduan terbaru --}}
    <div class="overflow-hidden rounded-lg border border-[#DCD5C8] bg-white shadow-xs">
        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-[#ECE7DF] px-6 py-4">
            <div>
                <h2 class="font-serif text-lg font-bold text-[#1C1819]">Riwayat Pengaduan Anda</h2>
                <p class="mt-0.5 font-mono text-[10px] uppercase tracking-wider text-[#7A6B6E]">Catatan perkembangan tindak lanjut berkas</p>
            </div>
            <a href="{{ route('warga.laporan.index') }}" class="inline-flex items-center gap-1.5 font-mono text-xs font-bold uppercase tracking-wider text-[#4A151C] hover:underline underline-offset-2">
                Lihat Seluruh Riwayat
                <i data-lucide="arrow-right" aria-hidden="true" class="h-3.5 w-3.5 shrink-0"></i>
            </a>
        </div>
        @if($recent->isEmpty())
            <div class="px-6 py-14 text-center">
                <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-[#FAF7F5] border border-[#ECE7DF] text-[#7A6B6E]">
                    <i data-lucide="inbox" aria-hidden="true" class="h-6 w-6 shrink-0"></i>
                </div>
                <h3 class="font-serif text-base font-bold text-[#1C1819]">Belum Ada Pengaduan</h3>
                <p class="mx-auto mt-1 max-w-sm text-xs text-[#7A6B6E]">Ada masalah di lingkungan sekitar? Sampaikan pengaduan pertama Anda.</p>
                <div class="mt-5">
                    <a
                        href="{{ route('warga.laporan.create') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-md bg-[#4A151C] px-5 py-2.5 font-mono text-xs font-bold uppercase tracking-wider text-white shadow-xs transition hover:bg-[#3C0F15]"
                    >
                        <i data-lucide="plus" aria-hidden="true" class="h-3.5 w-3.5 shrink-0"></i>
                        Buat Pengaduan Sekarang
                    </a>
                </div>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full min-w-[580px] text-left text-xs">
                    <thead class="border-b border-[#ECE7DF] bg-[#FAF7F5] font-mono text-[10px] uppercase tracking-wider text-[#7A6B6E]">
                        <tr>
                            <th class="px-6 py-3 font-semibold">Pengaduan</th>
                            <th class="px-4 py-3 font-semibold">Tanggal Berkas</th>
                            <th class="px-4 py-3 font-semibold">Status</th>
                            <th class="px-6 py-3 text-right font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#ECE7DF]">
                        @foreach($recent as $laporan)
                            <tr class="hover:bg-[#FAF7F5]/80 transition">
                                <td class="max-w-xs px-6 py-4">
                                    <p class="truncate font-semibold text-[#1C1819]">{{ $laporan->judul }}</p>
                                    <p class="mt-0.5 font-mono text-[10px] text-[#7A6B6E]">#{{ str_pad($laporan->id, 5, '0', STR_PAD_LEFT) }}</p>
                                </td>
                                <td class="px-4 py-4 font-mono text-[11px] text-[#7A6B6E]">{{ $laporan->created_at->translatedFormat('d M Y') }}</td>
                                <td class="px-4 py-4">
                                    <x-badge-status :status="$laporan->status" />
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a
                                        href="{{ route('warga.laporan.show', $laporan) }}"
                                        class="inline-flex items-center gap-1 font-mono text-xs font-bold uppercase tracking-wider text-[#4A151C] hover:underline"
                                    >
                                        Detail
                                        <i data-lucide="arrow-up-right" aria-hidden="true" class="h-3.5 w-3.5 shrink-0"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    <div class="mt-5 flex items-center gap-2 font-mono text-[11px] text-[#7A6B6E]">
        <i data-lucide="info" aria-hidden="true" class="h-3.5 w-3.5 shrink-0 text-[#C59B27]"></i>
        Pengaduan dapat disunting atau dicabut selama status masih dalam antrean (menunggu).
    </div>
</div>