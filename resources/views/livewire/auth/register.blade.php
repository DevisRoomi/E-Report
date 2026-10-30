<div x-data="{ showPass: false }">
    <span class="font-mono text-[11px] font-bold tracking-[.2em] uppercase text-[#C59B27]">PENDAFTARAN RESMI WARGA</span>
    <h1 class="mt-2 font-serif text-3xl font-bold tracking-tight text-[#1C1819]">Registrasi Akun</h1>
    <p class="mt-2 text-xs leading-relaxed text-[#7A6B6E]">Satu identitas terverifikasi untuk menyampaikan dan mengawal aduan fasilitas lingkungan.</p>

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
                placeholder="Nama lengkap sesuai identitas"
                required
                class="w-full rounded-xl border border-[#DCD5C8] bg-[#FAF7F5] px-4 py-2.5 text-xs text-[#1C1819] outline-none transition-all duration-150 focus:border-[#4A151C] focus:bg-white focus:ring-2 focus:ring-[#4A151C]/15"
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
                    class="w-full rounded-xl border border-[#DCD5C8] bg-[#FAF7F5] px-4 py-2.5 text-xs text-[#1C1819] outline-none transition-all duration-150 focus:border-[#4A151C] focus:bg-white focus:ring-2 focus:ring-[#4A151C]/15"
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
                    class="w-full rounded-xl border border-[#DCD5C8] bg-[#FAF7F5] px-4 py-2.5 text-xs text-[#1C1819] outline-none transition-all duration-150 focus:border-[#4A151C] focus:bg-white focus:ring-2 focus:ring-[#4A151C]/15"
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
                placeholder="Jalan, RT/RW, kelurahan domisili"
                rows="2"
                required
                class="w-full rounded-xl border border-[#DCD5C8] bg-[#FAF7F5] px-4 py-2.5 text-xs text-[#1C1819] outline-none transition-all duration-150 focus:border-[#4A151C] focus:bg-white focus:ring-2 focus:ring-[#4A151C]/15 min-h-20"
            ></textarea>
            @error('alamat')
                <p id="alamat-error" role="alert" class="mt-1.5 font-mono text-xs text-rose-700">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <div class="mb-1.5 flex items-center justify-between">
                <label for="password" class="block font-mono text-xs font-semibold uppercase tracking-wider text-[#1C1819]">Kata Sandi</label>
                <button
                    type="button"
                    @click="showPass = !showPass"
                    class="font-mono text-[11px] text-[#7A6B6E] hover:text-[#4A151C] transition cursor-pointer"
                    x-text="showPass ? 'Sembunyikan' : 'Tampilkan'"
                ></button>
            </div>
            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <input
                        :type="showPass ? 'text' : 'password'"
                        id="password"
                        name="password"
                        aria-describedby="password-help password-error"
                        @error('password')
                        aria-invalid="true"
                        @enderror
                        wire:model="password"
                        autocomplete="new-password"
                        placeholder="Minimal 8 karakter"
                        required
                        class="w-full rounded-xl border border-[#DCD5C8] bg-[#FAF7F5] px-4 py-2.5 text-xs text-[#1C1819] outline-none transition-all duration-150 focus:border-[#4A151C] focus:bg-white focus:ring-2 focus:ring-[#4A151C]/15"
                    >
                    @error('password')
                        <p id="password-error" role="alert" class="mt-1.5 font-mono text-xs text-rose-700">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input
                        :type="showPass ? 'text' : 'password'"
                        id="password_confirmation"
                        name="password_confirmation"
                        aria-describedby="password_confirmation-error"
                        @error('password_confirmation')
                        aria-invalid="true"
                        @enderror
                        wire:model="password_confirmation"
                        autocomplete="new-password"
                        placeholder="Ulangi kata sandi"
                        required
                        class="w-full rounded-xl border border-[#DCD5C8] bg-[#FAF7F5] px-4 py-2.5 text-xs text-[#1C1819] outline-none transition-all duration-150 focus:border-[#4A151C] focus:bg-white focus:ring-2 focus:ring-[#4A151C]/15"
                    >
                    @error('password_confirmation')
                        <p id="password_confirmation-error" role="alert" class="mt-1.5 font-mono text-xs text-rose-700">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <p id="password-help" class="mt-1.5 font-mono text-[10px] text-[#7A6B6E]">Gunakan kombinasi minimal 8 karakter huruf dan angka.</p>
        </div>

        <button
            type="submit"
            wire:loading.attr="disabled"
            class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-[#4A151C] px-5 py-3.5 font-mono text-xs font-bold uppercase tracking-wider text-white shadow-xs transition-all duration-150 hover:-translate-y-0.5 hover:shadow-md hover:bg-[#3C0F15] active:translate-y-0 active:scale-95 cursor-pointer"
        >
            <span wire:loading.remove wire:target="register">Daftar Akun Warga &rarr;</span>
            <span wire:loading wire:target="register">Mendaftarkan data akun…</span>
        </button>
    </form>

    <div class="mt-6 border-t border-[#ECE7DF] pt-5 text-center font-mono text-xs text-[#7A6B6E]">
        Sudah memiliki akun terdaftar?
        <a href="{{ route('login') }}" wire:navigate class="font-bold text-[#4A151C] hover:underline underline-offset-2">Masuk di sini</a>
    </div>
</div>