<div x-data="{
    confirmModal: false,
    targetStatus: '',
    modalTitle: '',
    modalMessage: '',
    confirmText: '',
    confirmTheme: 'blue',
    openConfirm(status, title, message, text, theme) {
        this.targetStatus = status;
        this.modalTitle = title;
        this.modalMessage = message;
        this.confirmText = text;
        this.confirmTheme = theme || 'blue';
        this.confirmModal = true;
    }
}">
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="font-display text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">Tinjau Pengaduan</h1>
            <p class="mt-2 text-sm leading-relaxed text-slate-500">Periksa informasi dan tindak lanjuti pengaduan warga.</p>
        </div>
        <a
            href="{{ route('admin.laporan.index') }}"
            class="inline-flex items-center justify-center gap-2 rounded-xl px-5 py-3 text-sm font-bold transition border border-slate-200 bg-white text-slate-700 hover:bg-slate-50"
        >
            <i data-lucide="arrow-left" aria-hidden="true" class="h-4 w-4 shrink-0"></i>
            Kembali
        </a>
    </div>
    @if(session('success'))
        <div role="status" class="mb-6 flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
            <i data-lucide="circle-check" aria-hidden="true" class="h-5 w-5 shrink-0"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    <div class="grid items-start gap-6 lg:grid-cols-[1fr_310px]">
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
            {{-- Tahapan alur progres bergaris (stepper) --}}
            <section class="rounded-2xl border border-slate-200 bg-white p-6">
                <h2 class="font-display font-bold text-slate-900">Progres Pengaduan</h2>
                <div class="relative mt-6 space-y-6 before:absolute before:left-[17px] before:top-3 before:bottom-3 before:w-0.5 before:bg-slate-200">
                    @foreach(['pending' => ['clock-3', 'Menunggu Peninjauan'], 'proses' => ['loader-circle', 'Sedang Diproses'], 'selesai' => ['circle-check', 'Selesai Ditangani']] as $status => [$icon, $label])
                        @php
                            $order = ['pending', 'proses', 'selesai'];
                            $currentIdx = array_search($laporan->status, $order);
                            $stepIdx = array_search($status, $order);
                            $isCurrent = $laporan->status === $status;
                            $isDone = $currentIdx > $stepIdx;
                        @endphp
                        <div class="relative flex items-center gap-3.5">
                            <span @class([
                                'relative z-10 flex h-9 w-9 shrink-0 items-center justify-center rounded-full ring-4 ring-white transition-all',
                                'bg-blue-600 text-white shadow-sm shadow-blue-200' => $isCurrent,
                                'bg-emerald-50 text-emerald-600 ring-emerald-100' => $isDone,
                                'bg-slate-100 text-slate-400' => !$isCurrent && !$isDone,
                            ])>
                                <i data-lucide="{{ $isDone ? 'check' : $icon }}" aria-hidden="true" class="h-4 w-4 shrink-0"></i>
                            </span>
                            <div>
                                <p @class([
                                    'text-xs',
                                    'font-bold text-slate-900' => $isCurrent,
                                    'font-medium text-slate-700' => $isDone,
                                    'text-slate-400' => !$isCurrent && !$isDone,
                                ])>
                                    {{ $label }}
                                </p>
                                @if($isCurrent)
                                    <span class="mt-0.5 inline-block text-[10px] font-semibold text-blue-600">Tahap saat ini</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <p class="mt-6 rounded-xl bg-slate-50 p-4 text-xs leading-5 text-slate-500 border border-slate-100">{{ $laporan->statusDescription() }}</p>
            </section>

            {{-- Panel Tindak Lanjut --}}
            <section class="rounded-2xl border border-slate-200 bg-white p-6">
                <h2 class="font-display font-bold text-slate-900">Tindak Lanjut</h2>
                <p class="mt-2 text-xs leading-5 text-slate-500">Perbarui status sesuai penanganan yang telah dilakukan.</p>

                @if($laporan->status === 'pending')
                    <button
                        type="button"
                        wire:loading.attr="disabled"
                        @click="openConfirm('proses', 'Mulai Proses Penanganan', 'Mulai proses penanganan pengaduan ini? Status akan diperbarui menjadi proses dan warga tidak dapat mengubah laporan lagi.', 'Mulai Proses', 'blue')"
                        class="inline-flex items-center justify-center gap-2 rounded-xl px-5 py-3 text-sm font-bold transition bg-blue-600 text-white shadow-sm shadow-blue-200 hover:bg-blue-700 mt-4 w-full cursor-pointer"
                    >
                        Mulai Proses
                        <i data-lucide="arrow-right" aria-hidden="true" class="h-4 w-4 shrink-0"></i>
                    </button>
                @elseif($laporan->status === 'proses')
                    <button
                        type="button"
                        wire:loading.attr="disabled"
                        @click="openConfirm('selesai', 'Tandai Selesai Penanganan', 'Pastikan penanganan di lapangan telah tuntas sebelum menandai pengaduan ini sebagai selesai.', 'Tandai Selesai', 'emerald')"
                        class="inline-flex items-center justify-center gap-2 rounded-xl px-5 py-3 text-sm font-bold transition bg-emerald-600 text-white shadow-sm shadow-emerald-200 hover:bg-emerald-700 mt-4 w-full cursor-pointer"
                    >
                        Tandai Selesai
                        <i data-lucide="check" aria-hidden="true" class="h-4 w-4 shrink-0"></i>
                    </button>
                @else
                    <div class="mt-4 flex items-center gap-2 rounded-xl bg-emerald-50 p-3 text-xs font-semibold text-emerald-700 border border-emerald-100">
                        <i data-lucide="circle-check" class="h-4 w-4 shrink-0"></i>
                        Pengaduan telah selesai ditangani.
                    </div>
                @endif

                <span wire:loading wire:target="changeStatus" role="status" class="mt-3 block text-xs text-blue-600">Memperbarui status…</span>
                @error('status')
                    <p role="alert" class="mt-3 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </section>

            {{-- Kartu Ringkas Informasi Pelapor --}}
            <section class="rounded-2xl border border-slate-200 bg-white p-6">
                <h2 class="mb-4 font-display font-bold text-slate-900">Informasi Pelapor</h2>
                <div class="space-y-3.5 text-xs">
                    <div>
                        <span class="block text-slate-400 font-medium">Nama Pelapor</span>
                        <span class="mt-0.5 block font-semibold text-slate-800 text-sm">{{ $laporan->pelapor->name }}</span>
                    </div>
                    <div>
                        <span class="block text-slate-400 font-medium">Email</span>
                        <span class="mt-0.5 block text-slate-700">{{ $laporan->pelapor->email }}</span>
                    </div>
                    <div>
                        <span class="block text-slate-400 font-medium">Nomor WhatsApp</span>
                        @if($laporan->pelapor->no_whatsapp)
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $laporan->pelapor->no_whatsapp) }}" target="_blank" rel="noopener" class="mt-0.5 inline-flex items-center gap-1 font-semibold text-blue-600 hover:text-blue-700 hover:underline">
                                <span>{{ $laporan->pelapor->no_whatsapp }}</span>
                                <i data-lucide="external-link" class="h-3 w-3"></i>
                            </a>
                        @else
                            <span class="mt-0.5 block text-slate-400 italic">Belum diisi</span>
                        @endif
                    </div>
                    <div>
                        <span class="block text-slate-400 font-medium">Alamat</span>
                        <p class="mt-0.5 leading-relaxed text-slate-700">{{ $laporan->pelapor->alamat ?: 'Belum diisi' }}</p>
                    </div>
                </div>
            </section>
        </aside>
    </div>

    {{-- Modal Konfirmasi Custom (Modern) --}}
    <div
        x-show="confirmModal"
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center p-4"
        role="dialog"
        aria-modal="true"
        @keydown.escape.window="confirmModal = false"
    >
        {{-- Backdrop --}}
        <div
            x-show="confirmModal"
            x-transition:enter="ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="confirmModal = false"
            class="fixed inset-0 bg-slate-950/40 backdrop-blur-xs transition-opacity"
        ></div>

        {{-- Dialog Panel --}}
        <div
            x-show="confirmModal"
            x-transition:enter="ease-out duration-200"
            x-transition:enter-start="opacity-0 translate-y-3 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-3 sm:scale-95"
            class="relative w-full max-w-md transform overflow-hidden rounded-2xl bg-white p-6 shadow-2xl transition-all border border-slate-100"
        >
            <div class="flex items-start gap-4">
                <div
                    :class="confirmTheme === 'emerald' ? 'bg-emerald-50 text-emerald-600 ring-1 ring-emerald-200' : 'bg-blue-50 text-blue-600 ring-1 ring-blue-200'"
                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl"
                >
                    <i data-lucide="circle-alert" class="h-6 w-6"></i>
                </div>
                <div class="flex-1">
                    <h3 class="font-display text-lg font-bold text-slate-900" x-text="modalTitle"></h3>
                    <p class="mt-2 text-sm leading-relaxed text-slate-500" x-text="modalMessage"></p>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-3 border-t border-slate-100 pt-5">
                <button
                    type="button"
                    @click="confirmModal = false"
                    class="rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition cursor-pointer"
                >
                    Batal
                </button>
                <button
                    type="button"
                    :class="confirmTheme === 'emerald' ? 'bg-emerald-600 hover:bg-emerald-700 shadow-emerald-200' : 'bg-blue-600 hover:bg-blue-700 shadow-blue-200'"
                    class="inline-flex items-center gap-2 rounded-xl px-5 py-2.5 text-sm font-bold text-white shadow-sm transition cursor-pointer"
                    wire:loading.attr="disabled"
                    @click="$wire.changeStatus(targetStatus); confirmModal = false"
                >
                    <span x-text="confirmText"></span>
                </button>
            </div>
        </div>
    </div>
</div>