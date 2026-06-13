<section>

    <header class="mb-6">

        <h2 class="text-lg font-semibold text-gray-900">
            Informasi Profil
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Perbarui nama dan alamat email akun Anda.
        </p>

    </header>

    <form id="send-verification"
        method="POST"
        action="{{ route('verification.send') }}">

        @csrf

    </form>

    <form method="POST"
        action="{{ route('profile.update') }}"
        class="space-y-5">

        @csrf
        @method('PATCH')

        <!-- NAMA -->

        <div>

            <label class="block text-sm font-medium text-gray-700 mb-2">
                Nama Lengkap
            </label>

            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"

                class="w-full rounded-lg border border-gray-300
                px-4 py-2.5
                focus:border-[#062b30]
                focus:ring-[#062b30]">

            <x-input-error
                class="mt-2"
                :messages="$errors->get('name')" />

        </div>

        <!-- EMAIL -->

        <div>

            <label class="block text-sm font-medium text-gray-700 mb-2">
                Email
            </label>

            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"

                class="w-full rounded-lg border border-gray-300
                px-4 py-2.5
                focus:border-[#062b30]
                focus:ring-[#062b30]">

            <x-input-error
                class="mt-2"
                :messages="$errors->get('email')" />

        </div>

        <!-- EMAIL BELUM VERIFIKASI -->

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

            <div class="rounded-lg bg-yellow-50 border border-yellow-200 p-3">

                <p class="text-sm text-yellow-800">

                    Email Anda belum terverifikasi.

                    <button
                        form="send-verification"
                        class="underline font-medium ml-1">

                        Kirim ulang email verifikasi

                    </button>

                </p>

                @if (session('status') === 'verification-link-sent')

                    <p class="mt-2 text-sm text-green-600">

                        Link verifikasi berhasil dikirim.

                    </p>

                @endif

            </div>

        @endif

        <!-- TOMBOL -->

        <div class="pt-2">

            <button
                type="submit"
                class="px-4 py-2
                text-sm
                rounded-lg
                bg-[#062b30]
                text-white
                hover:bg-[#041f23]
                transition">

                Simpan

            </button>

        </div>

    </form>

</section>