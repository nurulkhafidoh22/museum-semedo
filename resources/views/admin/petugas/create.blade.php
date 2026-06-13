@extends('layouts.admin')

@section('content')

<div class="p-6 bg-[#f5f7fb] min-h-screen">

    <div class="mb-8">

        <h1 class="text-3xl font-bold text-gray-900">
            Tambah Petugas
        </h1>

        <p class="text-sm text-gray-500 mt-2">
            Tambahkan akun petugas baru untuk validasi tiket
        </p>

    </div>

    <div class="bg-white rounded-2xl border border-gray-200 p-6">

        <form action="{{ route('admin.petugas.store') }}"
            method="POST">

            @csrf

            <div class="space-y-5">

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Nama Petugas
                    </label>

                    <input type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="w-full border rounded-xl px-4 py-3"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Email
                    </label>

                    <input type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full border rounded-xl px-4 py-3"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Password
                    </label>

                    <input type="password"
                        name="password"
                        class="w-full border rounded-xl px-4 py-3"
                        required>
                </div>

                <div class="flex gap-3 pt-4">

                    <a href="{{ route('admin.petugas.index') }}"
                        class="px-5 py-3 rounded-xl border">

                        Kembali

                    </a>

                    <button type="submit"
                        class="px-5 py-3 rounded-xl bg-[#062b30] text-white">

                        Simpan Petugas

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection