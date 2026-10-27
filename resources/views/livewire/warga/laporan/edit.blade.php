<div>
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="font-display text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">Edit Pengaduan</h1>
            <p class="mt-2 text-sm leading-relaxed text-slate-500">Perubahan hanya dapat dilakukan selama pengaduan menunggu peninjauan.</p>
        </div>
    </div>
    <form wire:submit="save" class="max-w-3xl rounded-2xl border border-slate-200 bg-white p-6 sm:p-8">
        {{-- Formulir pengaduan: setiap input terhubung ke properti Livewire --}}
        <div class="space-y-6">
            <div>
                <label for="judul" class="mb-2 block text-sm font-semibold text-slate-700">Judul pengaduan</label>
                <input
                    type="text"
                    id="judul"
                    name="judul"
                    aria-describedby="judul-help judul-error"
                    @error('judul')
                    aria-invalid="true"
                    @enderror
                    wire:model="judul"
                    placeholder="Contoh: Lampu jalan mati di Jalan Melati"
                    maxlength="255"
                    required
                    class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-blue-500 focus:ring-3 focus:ring-blue-50 read-only:bg-slate-50"
                >
                <p id="judul-help" class="mt-2 text-xs leading-relaxed text-slate-500">Gunakan judul singkat yang menggambarkan masalah.</p>
                @error('judul')
                    <p id="judul-error" role="alert" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="detail" class="mb-2 block text-sm font-semibold text-slate-700">Deskripsi pengaduan</label>
                <textarea
                    id="detail"
                    name="detail"
                    aria-describedby="detail-help detail-error"
                    @error('detail')
                    aria-invalid="true"
                    @enderror
                    wire:model="detail"
                    rows="6"
                    placeholder="Ceritakan masalah secara jelas, termasuk lokasi dan dampaknya bagi warga…"
                    maxlength="10000"
                    required
                    class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-blue-500 focus:ring-3 focus:ring-blue-50 min-h-32"
                ></textarea>
                <p id="detail-help" class="mt-2 text-xs leading-relaxed text-slate-500">Jelaskan lokasi kejadian dalam deskripsi. Maksimal 10.000 karakter.</p>
                @error('detail')
                    <p id="detail-error" role="alert" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="tanggal" class="mb-2 block text-sm font-semibold text-slate-700">Tanggal kejadian</label>
                <input
                    type="date"
                    id="tanggal"
                    name="tanggal"
                    aria-describedby="tanggal-error"
                    @error('tanggal')
                    aria-invalid="true"
                    @enderror
                    wire:model="tanggal"
                    max="{{ today()->format('Y-m-d') }}"
                    required
                    class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-blue-500 focus:ring-3 focus:ring-blue-50 read-only:bg-slate-50 file:mr-3 file:rounded-lg file:border-0 file:bg-blue-50 file:px-3 file:py-2 file:text-blue-700"
                >
                @error('tanggal')
                    <p id="tanggal-error" role="alert" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="rounded-xl border border-dashed border-slate-300 bg-slate-50 p-5">
                <div>
                    <label for="foto" class="mb-2 block text-sm font-semibold text-slate-700">Foto bukti (opsional)</label>
                    <input
                        type="file"
                        id="foto"
                        name="foto"
                        aria-describedby="foto-help foto-error"
                        @error('foto')
                        aria-invalid="true"
                        @enderror
                        wire:model="foto"
                        accept="image/jpeg,image/png,image/webp"
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-blue-500 focus:ring-3 focus:ring-blue-50 read-only:bg-slate-50 file:mr-3 file:rounded-lg file:border-0 file:bg-blue-50 file:px-3 file:py-2 file:text-blue-700"
                    >
                    <p id="foto-help" class="mt-2 text-xs leading-relaxed text-slate-500">JPG, PNG, atau WebP. Maksimal 2 MB. Pilih foto yang memperjelas pengaduan.</p>
                    @error('foto')
                        <p id="foto-error" role="alert" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <p wire:loading wire:target="foto" role="status" class="mt-3 text-xs text-blue-600">Mengunggah foto…</p>
                @if($laporan->foto)
                    <div class="mt-4">
                        <p class="mb-2 text-xs text-slate-500">Foto saat ini. Unggah foto baru untuk menggantinya.</p>
                        <img src="{{ Storage::disk('public')->url($laporan->foto) }}" alt="Foto bukti saat ini" class="max-h-44 rounded-xl object-contain">
                    </div>
                @endif
            </div>
        </div>
        <div class="mt-8 flex flex-wrap justify-end gap-3 border-t border-slate-100 pt-6">
            <a
                href="{{ route('warga.laporan.show', $laporan) }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl px-5 py-3 text-sm font-bold transition border border-slate-200 bg-white text-slate-700 hover:bg-slate-50"
            >Batal</a>
            <button
                type="submit"
                wire:loading.attr="disabled"
                wire:target="save,foto"
                class="inline-flex items-center justify-center gap-2 rounded-xl px-5 py-3 text-sm font-bold transition bg-blue-600 text-white shadow-sm shadow-blue-200 hover:bg-blue-700"
            >
                <span wire:loading.remove wire:target="save">Simpan Perubahan</span>
                <span wire:loading wire:target="save">Menyimpan…</span>
            </button>
        </div>
    </form>
</div>