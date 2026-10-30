<div>
    <span class="font-mono text-[11px] font-bold tracking-[.2em] uppercase text-[#C59B27]">AUTENTIKASI WARGA & PETUGAS</span>
    <h1 class="mt-2 font-serif text-3xl font-bold tracking-tight text-[#1C1819]">Masuk ke Portal E-Report</h1>
    <p class="mt-2 text-xs leading-relaxed text-[#7A6B6E]">Akses berkas pengaduan, riwayat pelaporan, dan pantauan status penanganan.</p>

    <form wire:submit="login" class="mt-6 space-y-4">
        <div>
            <label for="email" class="mb-1.5 block font-mono text-xs font-semibold uppercase tracking-wider text-[#1C1819]">Alamat Email</label>
            <input
                type="email"
                id="email"
                name="email"
                aria-describedby="email-error"
                @error('email')
                aria-invalid="true"
                @enderror
                wire:model="email"
                placeholder="nama@email.com"
                autocomplete="email"
                required
                class="w-full rounded-md border border-[#DCD5C8] bg-[#FAF7F5] px-3.5 py-2.5 text-xs text-[#1C1819] outline-none transition focus:border-[#4A151C] focus:bg-white focus:ring-1 focus:ring-[#4A151C]"
            >
            @error('email')
                <p id="email-error" role="alert" class="mt-1.5 font-mono text-xs text-rose-700">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="mb-1.5 block font-mono text-xs font-semibold uppercase tracking-wider text-[#1C1819]">Kata Sandi</label>
            <input
                type="password"
                id="password"
                name="password"
                aria-describedby="password-error"
                @error('password')
                aria-invalid="true"
                @enderror
                wire:model="password"
                placeholder="Masukkan kata sandi akun"
                autocomplete="current-password"
                required
                class="w-full rounded-md border border-[#DCD5C8] bg-[#FAF7F5] px-3.5 py-2.5 text-xs text-[#1C1819] outline-none transition focus:border-[#4A151C] focus:bg-white focus:ring-1 focus:ring-[#4A151C]"
            >
            @error('password')
                <p id="password-error" role="alert" class="mt-1.5 font-mono text-xs text-rose-700">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between text-xs">
            <label class="flex items-center gap-2 text-[#554749]">
                <input type="checkbox" wire:model="remember" class="h-4 w-4 rounded border-[#DCD5C8] text-[#4A151C] focus:ring-[#4A151C] accent-[#4A151C]">
                <span>Ingat sesi saya</span>
            </label>
        </div>

        <button
            type="submit"
            wire:loading.attr="disabled"
            class="inline-flex w-full items-center justify-center gap-2 rounded-md bg-[#4A151C] px-5 py-3 font-mono text-xs font-bold uppercase tracking-wider text-white shadow-xs transition hover:bg-[#3C0F15]"
        >
            <span wire:loading.remove wire:target="login">
                Masuk ke Akun
                <span aria-hidden="true">&rarr;</span>
            </span>
            <span wire:loading wire:target="login">Memverifikasi kredensial…</span>
        </button>
    </form>

    <div class="mt-6 border-t border-[#ECE7DF] pt-5 text-center font-mono text-xs text-[#7A6B6E]">
        Belum memiliki akun warga?
        <a href="{{ route('register') }}" wire:navigate class="font-bold text-[#4A151C] hover:underline underline-offset-2">Daftar sekarang</a>
    </div>
</div>