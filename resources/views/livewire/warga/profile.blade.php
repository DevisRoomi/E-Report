<div>
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="font-display text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">Profil Saya</h1>
            <p class="mt-2 text-sm leading-relaxed text-slate-500">Kelola informasi pribadi dan keamanan akun Anda.</p>
        </div>
    </div>
    @if(session('success'))
        <div role="status" class="mb-6 flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
            <i data-lucide="circle-check" aria-hidden="true" class="h-5 w-5 shrink-0"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    <div class="grid items-start gap-6 lg:grid-cols-[280px_1fr]">
        <aside class="rounded-2xl border border-slate-200 bg-white p-7 text-center">
            @if(auth()->user()->foto)
                <img src="{{ Storage::disk('public')->url(auth()->user()->foto) }}" alt="Foto profil Anda" class="mx-auto h-24 w-24 rounded-full object-cover">
            @else
                <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-blue-50 font-display text-3xl font-bold text-blue-600">{{ mb_substr(auth()->user()->name, 0, 1) }}</div>
            @endif
            <h2 class="mt-5 font-display font-bold break-words">{{ auth()->user()->name }}</h2>
            <p class="mt-2 text-xs break-words text-slate-500">{{ auth()->user()->email }}</p>
            <span class="mt-4 inline-flex rounded-full bg-blue-50 px-4 py-1 text-xs font-bold text-blue-600">Warga</span>
            <dl class="mt-6 space-y-4 border-t border-slate-100 pt-5 text-left text-xs">
                <div>
                    <dt class="text-slate-400">WhatsApp</dt>
                    <dd class="mt-1.5 text-slate-700">{{ auth()->user()->no_whatsapp ?: 'Belum diisi' }}</dd>
                </div>
                <div>
                    <dt class="text-slate-400">Alamat</dt>
                    <dd class="mt-1.5 leading-6 break-words text-slate-700">{{ auth()->user()->alamat ?: 'Belum diisi' }}</dd>
                </div>
            </dl>
        </aside>
        <div class="space-y-6">
            <form wire:submit="updateProfile" class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-8">
                <h2 class="font-display text-lg font-bold">Informasi Pribadi</h2>
                <p class="mt-2 text-xs text-slate-500">Pastikan informasi kontak Anda selalu terbaru.</p>
                <div class="mt-7 space-y-5">
                    <div>
                        <label for="name" class="mb-2 block text-sm font-semibold text-slate-700">Nama lengkap</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            aria-describedby="name-error"
                            @error('name')
                            aria-invalid="true"
                            @enderror
                            wire:model="name"
                            autocomplete="name"
                            required
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-blue-500 focus:ring-3 focus:ring-blue-50 read-only:bg-slate-50"
                        >
                        @error('name')
                            <p id="name-error" role="alert" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            aria-describedby="email-help email-error"
                            @error('email')
                            aria-invalid="true"
                            @enderror
                            value="{{ auth()->user()->email }}"
                            readonly
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-blue-500 focus:ring-3 focus:ring-blue-50 read-only:bg-slate-50 file:mr-3 file:rounded-lg file:border-0 file:bg-blue-50 file:px-3 file:py-2 file:text-blue-700"
                        >
                        <p id="email-help" class="mt-2 text-xs leading-relaxed text-slate-500">Email tidak dapat diubah.</p>
                        @error('email')
                            <p id="email-error" role="alert" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="no_whatsapp" class="mb-2 block text-sm font-semibold text-slate-700">Nomor WhatsApp</label>
                        <input
                            type="tel"
                            id="no_whatsapp"
                            name="no_whatsapp"
                            aria-describedby="no_whatsapp-error"
                            @error('no_whatsapp')
                            aria-invalid="true"
                            @enderror
                            wire:model="no_whatsapp"
                            autocomplete="tel"
                            required
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-blue-500 focus:ring-3 focus:ring-blue-50 read-only:bg-slate-50"
                        >
                        @error('no_whatsapp')
                            <p id="no_whatsapp-error" role="alert" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="alamat" class="mb-2 block text-sm font-semibold text-slate-700">Alamat</label>
                        <textarea
                            id="alamat"
                            name="alamat"
                            aria-describedby="alamat-error"
                            @error('alamat')
                            aria-invalid="true"
                            @enderror
                            wire:model="alamat"
                            autocomplete="street-address"
                            rows="3"
                            required
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-blue-500 focus:ring-3 focus:ring-blue-50 min-h-32"
                        ></textarea>
                        @error('alamat')
                            <p id="alamat-error" role="alert" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="foto" class="mb-2 block text-sm font-semibold text-slate-700">Foto profil</label>
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
                        <p id="foto-help" class="mt-2 text-xs leading-relaxed text-slate-500">JPG, PNG, atau WebP. Maksimal 2 MB.</p>
                        @error('foto')
                            <p id="foto-error" role="alert" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <p wire:loading wire:target="foto" class="text-xs text-blue-600">Mengunggah foto…</p>
                </div>
                <div class="mt-7 flex justify-end">
                    <button
                        type="submit"
                        wire:loading.attr="disabled"
                        wire:target="updateProfile,foto"
                        class="inline-flex items-center justify-center gap-2 rounded-xl px-5 py-3 text-sm font-bold transition bg-blue-600 text-white shadow-sm shadow-blue-200 hover:bg-blue-700"
                    >
                        <span wire:loading.remove wire:target="updateProfile">Simpan Profil</span>
                        <span wire:loading wire:target="updateProfile">Menyimpan…</span>
                    </button>
                </div>
            </form>
            <form wire:submit="updatePassword" class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-8">
                <div class="flex items-center gap-3">
                    <span class="rounded-xl bg-slate-50 p-2 text-blue-600">
                        <i data-lucide="lock-keyhole" aria-hidden="true" class="h-5 w-5 shrink-0"></i>
                    </span>
                    <div>
                        <h2 class="font-display text-lg font-bold">Ubah Password</h2>
                        <p class="mt-1 text-xs text-slate-500">Gunakan password yang kuat untuk melindungi akun.</p>
                    </div>
                </div>
                <div class="mt-7 space-y-5">
                    <div>
                        <label for="current_password" class="mb-2 block text-sm font-semibold text-slate-700">Password saat ini</label>
                        <input
                            type="password"
                            id="current_password"
                            name="current_password"
                            aria-describedby="current_password-error"
                            @error('current_password')
                            aria-invalid="true"
                            @enderror
                            wire:model="current_password"
                            autocomplete="current-password"
                            required
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-blue-500 focus:ring-3 focus:ring-blue-50 read-only:bg-slate-50"
                        >
                        @error('current_password')
                            <p id="current_password-error" role="alert" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="mb-2 block text-sm font-semibold text-slate-700">Password baru</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            aria-describedby="password-help password-error"
                            @error('password')
                            aria-invalid="true"
                            @enderror
                            wire:model="password"
                            autocomplete="new-password"
                            required
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-blue-500 focus:ring-3 focus:ring-blue-50 read-only:bg-slate-50"
                        >
                        <p id="password-help" class="mt-2 text-xs leading-relaxed text-slate-500">Minimal 8 karakter, mengandung huruf dan angka.</p>
                        @error('password')
                            <p id="password-error" role="alert" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="mb-2 block text-sm font-semibold text-slate-700">Konfirmasi password baru</label>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            aria-describedby="password_confirmation-error"
                            @error('password_confirmation')
                            aria-invalid="true"
                            @enderror
                            wire:model="password_confirmation"
                            autocomplete="new-password"
                            required
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-blue-500 focus:ring-3 focus:ring-blue-50 read-only:bg-slate-50"
                        >
                        @error('password_confirmation')
                            <p id="password_confirmation-error" role="alert" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-7 flex justify-end">
                    <button
                        type="submit"
                        wire:loading.attr="disabled"
                        class="inline-flex items-center justify-center gap-2 rounded-xl px-5 py-3 text-sm font-bold transition bg-blue-600 text-white shadow-sm shadow-blue-200 hover:bg-blue-700"
                    >
                        <span wire:loading.remove wire:target="updatePassword">Ubah Password</span>
                        <span wire:loading wire:target="updatePassword">Menyimpan…</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>