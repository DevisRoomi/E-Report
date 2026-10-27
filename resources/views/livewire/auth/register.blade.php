<div>
    <span class="text-xs font-bold tracking-widest text-blue-600">MULAI PERUBAHAN DARI SINI</span>
    <h1 class="mt-3 font-display text-3xl font-bold tracking-tight">Buat akun warga</h1>
    <p class="mt-3 text-sm text-slate-500">Satu akun untuk menyampaikan dan memantau pengaduan.</p>
    <form wire:submit="register" class="mt-7 space-y-4">
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
                placeholder="Nama sesuai identitas"
                required
                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-blue-500 focus:ring-3 focus:ring-blue-50 read-only:bg-slate-50"
            >
            @error('name')
                <p id="name-error" role="alert" class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">Email</label>
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
                    class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-blue-500 focus:ring-3 focus:ring-blue-50 read-only:bg-slate-50"
                >
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
                    placeholder="08xxxxxxxxxx"
                    required
                    class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-blue-500 focus:ring-3 focus:ring-blue-50 read-only:bg-slate-50"
                >
                @error('no_whatsapp')
                    <p id="no_whatsapp-error" role="alert" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
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
                placeholder="Jalan, RT/RW, kelurahan, kecamatan"
                rows="2"
                required
                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-blue-500 focus:ring-3 focus:ring-blue-50 min-h-32"
            ></textarea>
            @error('alamat')
                <p id="alamat-error" role="alert" class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="password" class="mb-2 block text-sm font-semibold text-slate-700">Password</label>
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
            <label for="password_confirmation" class="mb-2 block text-sm font-semibold text-slate-700">Konfirmasi password</label>
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
        <button
            type="submit"
            wire:loading.attr="disabled"
            class="inline-flex items-center justify-center gap-2 rounded-xl px-5 py-3 text-sm font-bold transition bg-blue-600 text-white shadow-sm shadow-blue-200 hover:bg-blue-700 w-full"
        >
            <span wire:loading.remove wire:target="register">Daftar & Mulai Melapor →</span>
            <span wire:loading wire:target="register">Membuat akun…</span>
        </button>
    </form>
    <p class="mt-6 text-center text-sm text-slate-500">
        Sudah punya akun?
        <a href="{{ route('login') }}" wire:navigate class="font-bold text-blue-600 hover:underline">Masuk di sini</a>
    </p>
</div>