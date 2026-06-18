@extends('layouts.admin')

@section('content')

<div class="p-4 md:p-6 bg-[#f5f7fb] min-h-screen">

<!-- HEADER -->
<div class="mb-8">

    <h1 class="text-2xl md:text-3xl font-bold text-gray-900">
        Tambah Petugas
    </h1>

    <p class="text-sm text-gray-500 mt-2">
        Tambahkan akun petugas baru untuk validasi tiket
    </p>

</div>

<!-- CARD -->
<div class="bg-white rounded-2xl border border-gray-200 p-6">

    <form
        action="{{ route('admin.petugas.store') }}"
        method="POST">

        @csrf

        <div class="space-y-5">

            <!-- NAMA -->
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Petugas
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full
                    border border-gray-300
                    rounded-xl
                    px-4 py-3
                    focus:outline-none
                    focus:ring-2
                    focus:ring-[#0f766e]/20
                    focus:border-[#0f766e]"
                    required>

            </div>

            <!-- EMAIL -->
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full
                    border border-gray-300
                    rounded-xl
                    px-4 py-3
                    focus:outline-none
                    focus:ring-2
                    focus:ring-[#0f766e]/20
                    focus:border-[#0f766e]"
                    required>

            </div>

            <!-- PASSWORD -->
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full
                    border border-gray-300
                    rounded-xl
                    px-4 py-3
                    focus:outline-none
                    focus:ring-2
                    focus:ring-[#0f766e]/20
                    focus:border-[#0f766e]"
                    required>

                <p class="text-xs text-gray-500 mt-2">
                    Gunakan password yang aman untuk akun petugas.
                </p>

            </div>

            <!-- ACTION -->
            <div class="flex flex-col sm:flex-row gap-3 pt-4">

                <!-- KEMBALI -->
                <a
                    href="{{ route('admin.petugas.index') }}"
                    class="w-full sm:w-auto
                    inline-flex items-center justify-center gap-2
                    px-4 py-2.5
                    rounded-xl
                    border border-gray-300
                    text-gray-700
                    text-sm font-medium
                    hover:bg-gray-50
                    transition">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-4 h-4">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />

                    </svg>

                    Kembali

                </a>

                <!-- SIMPAN -->
                <button
                    type="submit"
                    class="w-full sm:w-auto
                    inline-flex items-center justify-center gap-2
                    px-4 py-2.5
                    rounded-xl
                    bg-[#062b30]
                    text-white
                    text-sm font-medium
                    hover:bg-[#041f23]
                    transition">

                    <!-- Heroicon User Plus -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-4 h-4">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M18 7.5v6m3-3h-6" />

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15.75 18.75a6.75 6.75 0 10-13.5 0" />

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 10.5a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z" />

                    </svg>

                    Simpan

                </button>

            </div>

        </div>

    </form>

</div>

</div>

@endsection