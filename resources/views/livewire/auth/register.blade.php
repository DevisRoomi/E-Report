<div>
    <span class="font-mono text-[11px] font-bold tracking-[.2em] uppercase text-[#C59B27]">PENDAFTARAN RESMI</span>
    <h1 class="mt-2 font-serif text-3xl font-bold tracking-tight text-[#1C1819]">Registrasi Akun Warga</h1>
    <p class="mt-2 text-xs leading-relaxed text-[#7A6B6E]">Satu identitas terverifikasi untuk mengajukan dan memantau status aduan fasilitas lingkungan.</p>

    <form wire:submit="register" class="mt-6 space-y-4">
        <div>
            <label for="name" class="mb-1.5 block font-mono text-xs font-semibold uppercase tracking-wider text-[#1C1819]">Nama Lengkap</label>
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
                placeholder="Nama lengkap sesuai KTP"
                required
                class="w-full rounded-md border border-[#DCD5C8] bg-[#FAF7F5] px-3.5 py-2.5 text-xs text-[#1C1819] outline-none transition focus:border-[#4A151C] focus:bg-white focus:ring-1 focus:ring-[#4A151C]"
            >
            @error('name')
                <p id="name-error" role="alert" class="mt-1.5 font-mono text-xs text-rose-700">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
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
                    autocomplete="email"
                    placeholder="nama@email.com"
                    required
                    class="w-full rounded-md border border-[#DCD5C8] bg-[#FAF7F5] px-3.5 py-2.5 text-xs text-[#1C1819] outline-none transition focus:border-[#4A151C] focus:bg-white focus:ring-1 focus:ring-[#4A151C]"
                >
                @error('email')
                    <p id="email-error" role="alert" class="mt-1.5 font-mono text-xs text-rose-700">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="no_whatsapp" class="mb-1.5 block font-mono text-xs font-semibold uppercase tracking-wider text-[#1C1819]">Nomor WhatsApp</label>
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
                    placeholder="08xxxxxxxxxx"
                    required
                    class="w-full rounded-md border border-[#DCD5C8] bg-[#FAF7F5] px-3.5 py-2.5 text-xs text-[#1C1819] outline-none transition focus:border-[#4A151C] focus:bg-white focus:ring-1 focus:ring-[#4A151C]"
                >
                @error('no_whatsapp')
                    <p id="no_whatsapp-error" role="alert" class="mt-1.5 font-mono text-xs text-rose-700">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label for="alamat" class="mb-1.5 block font-mono text-xs font-semibold uppercase tracking-wider text-[#1C1819]">Alamat Domisili</label>
            <textarea
                id="alamat"
                name="alamat"
                aria-describedby="alamat-error"
                @error('alamat')
                aria-invalid="true"
                @enderror
                wire:model="alamat"
                autocomplete="street-address"
                placeholder="Jalan, RT/RW, kelurahan, kecamatan domisili pelapor"
                rows="2"
                required
                class="w-full rounded-md border border-[#DCD5C8] bg-[#FAF7F5] px-3.5 py-2.5 text-xs text-[#1C1819] outline-none transition focus:border-[#4A151C] focus:bg-white focus:ring-1 focus:ring-[#4A151C] min-h-24"
            ></textarea>
            @error('alamat')
                <p id="alamat-error" role="alert" class="mt-1.5 font-mono text-xs text-rose-700">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label for="password" class="mb-1.5 block font-mono text-xs font-semibold uppercase tracking-wider text-[#1C1819]">Kata Sandi</label>
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
                    class="w-full rounded-md border border-[#DCD5C8] bg-[#FAF7F5] px-3.5 py-2.5 text-xs text-[#1C1819] outline-none transition focus:border-[#4A151C] focus:bg-white focus:ring-1 focus:ring-[#4A151C]"
                >
                <p id="password-help" class="mt-1 font-mono text-[10px] text-[#7A6B6E]">Minimal 8 karakter, huruf & angka.</p>
                @error('password')
                    <p id="password-error" role="alert" class="mt-1.5 font-mono text-xs text-rose-700">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password_confirmation" class="mb-1.5 block font-mono text-xs font-semibold uppercase tracking-wider text-[#1C1819]">Konfirmasi Kata Sandi</label>
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
                    class="w-full rounded-md border border-[#DCD5C8] bg-[#FAF7F5] px-3.5 py-2.5 text-xs text-[#1C1819] outline-none transition focus:border-[#4A151C] focus:bg-white focus:ring-1 focus:ring-[#4A151C]"
                >
                @error('password_confirmation')
                    <p id="password_confirmation-error" role="alert" class="mt-1.5 font-mono text-xs text-rose-700">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <button
            type="submit"
            wire:loading.attr="disabled"
            class="inline-flex w-full items-center justify-center gap-2 rounded-md bg-[#4A151C] px-5 py-3 font-mono text-xs font-bold uppercase tracking-wider text-white shadow-xs transition hover:bg-[#3C0F15]"
        >
            <span wire:loading.remove wire:target="register">Daftar & Buat Akun Warga &rarr;</span>
            <span wire:loading wire:target="register">Mendaftarkan berkas akun…</span>
        </button>
    </form>

    <div class="mt-6 border-t border-[#ECE7DF] pt-5 text-center font-mono text-xs text-[#7A6B6E]">
        Sudah memiliki akun terdaftar?
        <a href="{{ route('login') }}" wire:navigate class="font-bold text-[#4A151C] hover:underline underline-offset-2">Masuk di sini</a>
    </div>
</div>