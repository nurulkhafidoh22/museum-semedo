<section>

    <header>
        <h2 class="text-lg font-semibold text-gray-900">
            Ubah Password
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Gunakan password yang kuat untuk menjaga keamanan akun Anda.
        </p>
    </header>

    <form method="POST"
        action="{{ route('password.update') }}"
        class="mt-6 space-y-6">

        @csrf
        @method('PUT')

        <!-- PASSWORD SAAT INI -->
        <div>
            <x-input-label
                for="update_password_current_password"
                value="Password Saat Ini" />

            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="mt-1 block w-full"
                autocomplete="current-password" />

            <x-input-error
                :messages="$errors->updatePassword->get('current_password')"
                class="mt-2" />
        </div>

        <!-- PASSWORD BARU -->
        <div>
            <x-input-label
                for="update_password_password"
                value="Password Baru" />

            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                class="mt-1 block w-full"
                autocomplete="new-password" />

            <x-input-error
                :messages="$errors->updatePassword->get('password')"
                class="mt-2" />
        </div>

        <!-- KONFIRMASI PASSWORD -->
        <div>
            <x-input-label
                for="update_password_password_confirmation"
                value="Konfirmasi Password Baru" />

            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-1 block w-full"
                autocomplete="new-password" />

            <x-input-error
                :messages="$errors->updatePassword->get('password_confirmation')"
                class="mt-2" />
        </div>

        <!-- TOMBOL -->
        <div class="flex items-center gap-4">

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