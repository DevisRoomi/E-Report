<div wire:poll.15s>
    @if(session('success'))
        <div role="status" class="mb-6 flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
            <i data-lucide="circle-check" aria-hidden="true" class="h-5 w-5 shrink-0"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="font-display text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">Detail Pengaduan</h1>
            <p class="mt-2 text-sm leading-relaxed text-slate-500">Pantau dan lihat informasi lengkap pengaduan Anda.</p>
        </div>
        <a
            href="{{ route('warga.laporan.index') }}"
            class="inline-flex items-center justify-center gap-2 rounded-xl px-5 py-3 text-sm font-bold transition border border-slate-200 bg-white text-slate-700 hover:bg-slate-50"
        >
            <i data-lucide="arrow-left" aria-hidden="true" class="h-4 w-4 shrink-0"></i>
            Kembali
        </a>
    </div>
    <div class="grid items-start gap-6 lg:grid-cols-[1fr_300px]">
        {{-- Informasi lengkap pengaduan --}}
        <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white">
            <div class="border-b border-slate-100 p-6 sm:p-8">
                <div class="mb-4 flex flex-wrap items-center justify-between gap-3">
                    <span class="text-xs font-bold tracking-wider text-slate-400">PENGADUAN # {{ str_pad($laporan->id, 5, '0', STR_PAD_LEFT) }}</span>
                    <span @class([
                    'inline-flex items-center gap-1.5 whitespace-nowrap rounded-full px-3 py-1.5 text-xs font-semibold',
                    'bg-amber-50 text-amber-800 ring-1 ring-inset ring-amber-200' => $laporan->status === 'pending',
                    'bg-blue-50 text-blue-700 ring-1 ring-inset ring-blue-200' => $laporan->status === 'proses',
                    'bg-emerald-50 text-emerald-700 ring-1 ring-inset ring-emerald-200' => $laporan->status === 'selesai',
                    ])>
                        <span class="h-1.5 w-1.5 rounded-full bg-current"></span>
                        {{ \App\Models\Laporan::STATUSES[$laporan->status] ?? $laporan->status }}
                    </span>
                </div>
                <h2 class="font-display text-2xl leading-snug font-bold break-words">{{ $laporan->judul }}</h2>
                <div class="mt-6 grid gap-4 text-xs text-slate-500 sm:grid-cols-2">
                    <div class="flex items-center gap-2">
                        <i data-lucide="calendar-days" aria-hidden="true" class="h-4 w-4 shrink-0 text-slate-400"></i>
                        <span>
                            Kejadian:
                            <strong class="font-medium text-slate-700">{{ $laporan->tanggal->translatedFormat('d F Y') }}</strong>
                        </span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i data-lucide="clock-3" aria-hidden="true" class="h-4 w-4 shrink-0 text-slate-400"></i>
                        <span>Diajukan: {{ $laporan->created_at->translatedFormat('d M Y, H:i') }}</span>
                    </div>
                </div>
            </div>
            <div class="p-6 sm:p-8">
                <h3 class="mb-4 text-sm font-bold">Deskripsi Pengaduan</h3>
                <p class="text-sm leading-8 break-words whitespace-pre-line text-slate-600">{{ $laporan->detail }}</p>
                <h3 class="mt-8 mb-4 text-sm font-bold">Foto Bukti</h3>
                @if($laporan->foto)
                    <a href="{{ Storage::disk('public')->url($laporan->foto) }}" target="_blank" rel="noopener">
                        <img src="{{ Storage::disk('public')->url($laporan->foto) }}" alt="Foto bukti: {{ $laporan->judul }}" class="max-h-[500px] w-full rounded-xl border border-slate-100 bg-slate-50 object-contain">
                    </a>
                    <p class="mt-2 text-xs text-slate-400">Klik foto untuk melihat ukuran penuh.</p>
                @else
                    <div class="flex items-center gap-3 rounded-xl bg-slate-50 p-5 text-sm text-slate-400">
                        <i data-lucide="image" aria-hidden="true" class="h-5 w-5 shrink-0"></i>
                        Tidak ada foto bukti dilampirkan.
                    </div>
                @endif
            </div>
        </article>
        <aside class="space-y-5">
            {{-- Tahapan penanganan --}}
            <section class="rounded-2xl border border-slate-200 bg-white p-6">
                <h2 class="font-display font-bold">Progres Pengaduan</h2>
                <div class="mt-6 space-y-6">
                    @foreach(['pending' => ['clock-3', 'Menunggu Peninjauan'], 'proses' => ['loader-circle', 'Sedang Diproses'], 'selesai' => ['circle-check', 'Selesai Ditangani']] as $status => [$icon, $label])
                        @php $reached = array_search($laporan->status, ['pending','proses','selesai']) >= $loop->index; @endphp
                        <div class="flex items-center gap-3">
                            <span @class(['flex h-9 w-9 shrink-0 items-center justify-center rounded-full', 'bg-blue-50 text-blue-600' => $reached, 'bg-slate-50 text-slate-300' => !$reached])>
                                <i data-lucide="{{ $icon }}" aria-hidden="true" class="h-4 w-4 shrink-0"></i>
                            </span>
                            <p @class(['text-xs font-semibold', 'text-slate-700' => $reached, 'text-slate-400' => !$reached])>
                                {{ $label }}
                                @if($laporan->status === $status)
                                    <span class="mt-1 block text-[10px] font-normal text-blue-600">Tahap saat ini</span>
                                @endif
                            </p>
                        </div>
                    @endforeach
                </div>
                <p class="mt-6 rounded-xl bg-slate-50 p-4 text-xs leading-6 text-slate-500">{{ $laporan->statusDescription() }}</p>
            </section>
            @can('update', $laporan)
                <section class="rounded-2xl border border-slate-200 bg-white p-6">
                    <h2 class="font-display text-sm font-bold">Kelola Pengaduan</h2>
                    <p class="mt-2 text-xs leading-6 text-slate-500">Anda dapat mengubah informasi selama pengaduan belum diproses.</p>
                    <a
                        href="{{ route('warga.laporan.edit', $laporan) }}"
                        class="inline-flex items-center justify-center gap-2 rounded-xl px-5 py-3 text-sm font-bold transition border border-slate-200 bg-white text-slate-700 hover:bg-slate-50 mt-4 w-full"
                    >
                        <i data-lucide="pencil" aria-hidden="true" class="h-4 w-4 shrink-0"></i>
                        Edit Pengaduan
                    </a>
                    <button
                        type="button"
                        wire:loading.attr="disabled"
                        wire:click="delete"
                        wire:confirm="Hapus pengaduan beserta foto buktinya? Tindakan ini tidak dapat dibatalkan."
                        class="inline-flex items-center justify-center gap-2 rounded-xl px-5 py-3 text-sm font-bold transition border border-red-200 bg-red-50 text-red-700 hover:bg-red-100 mt-3 w-full"
                    >
                        <i data-lucide="trash-2" aria-hidden="true" class="h-4 w-4 shrink-0"></i>
                        Hapus Pengaduan
                    </button>
                </section>
            @endcan
        </aside>
    </div>
</div>