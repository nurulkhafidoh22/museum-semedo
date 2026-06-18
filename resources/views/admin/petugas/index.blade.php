@extends('layouts.admin')

@section('content')

<div class="p-4 md:p-6 bg-[#f5f7fb] min-h-screen">

<!-- HEADER -->
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 mb-8">

    <div>

        <p class="text-[11px] tracking-[0.25em] uppercase text-[#0f766e] font-semibold mb-2">
            User Management
        </p>

        <h1 class="text-3xl font-bold text-gray-900 leading-tight">
            Manajemen Petugas
        </h1>

        <p class="text-sm text-gray-500 mt-2">
            Kelola akun petugas validasi tiket Museum Situs Semedo
        </p>

    </div>

    <a href="{{ route('admin.petugas.create') }}"
        class="w-full sm:w-auto
        lg:mt-6
        inline-flex items-center justify-center gap-2
        px-5 py-3 rounded-xl
        bg-[#062b30]
        text-white
        text-sm font-medium
        hover:bg-[#041f23]
        transition">

        <i data-lucide="plus" class="w-4 h-4"></i>

        Tambah Petugas

    </a>

</div>

<!-- STATISTIC -->
<div class="mb-8">

    <div class="w-full sm:w-64
                rounded-2xl
                border border-cyan-100
                bg-cyan-50/60
                p-5
                text-center">

        <p class="text-sm text-gray-600">
            Total Petugas
        </p>

        <h2 class="text-4xl font-bold text-gray-900 mt-3">
            {{ $petugas->count() }}
        </h2>

        <p class="text-xs text-cyan-700 mt-3">
            Akun petugas aktif
        </p>

    </div>

</div>

<!-- TABLE -->
<div class="bg-white border border-gray-200 rounded-2xl overflow-hidden">

    <div class="px-4 md:px-6 py-5 border-b border-gray-100">

        <h2 class="text-xl font-semibold text-gray-900">
            Daftar Petugas
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            Kelola akun petugas validasi tiket
        </p>

    </div>

    <div class="overflow-x-auto">

        <table class="min-w-[700px] w-full">

            <thead class="bg-gray-50">

                <tr>

                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                        Nama
                    </th>

                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                        Email
                    </th>

                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase">
                        Dibuat
                    </th>

                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody class="divide-y divide-gray-100">

                @forelse($petugas as $user)

                <tr class="hover:bg-gray-50">

                    <td class="px-6 py-5">

                        <p class="font-semibold text-gray-900">
                            {{ $user->name }}
                        </p>

                    </td>

                    <td class="px-6 py-5">

                        <p class="text-gray-700">
                            {{ $user->email }}
                        </p>

                    </td>

                    <td class="px-6 py-5 text-center">

                        {{ $user->created_at->format('d M Y') }}

                    </td>

                    <td class="px-6 py-5">

                        <div class="flex flex-col sm:flex-row justify-center gap-2 whitespace-nowrap">

                            <a href="{{ route('admin.petugas.edit', $user->id) }}"
                                class="px-3 py-2 rounded-lg
                                    border border-amber-200
                                    text-amber-700
                                    text-sm hover:bg-amber-50">
                                Edit
                            </a>

                            <form
                                action="{{ route('admin.petugas.reset-password', $user->id) }}"
                                method="POST"
                                class="form-reset-password">

                                @csrf

                                <button
                                    type="submit"
                                    class="px-3 py-2 rounded-lg
                                    border border-amber-200
                                    text-amber-700
                                    text-sm hover:bg-amber-50">

                                    Reset

                                </button>

                            </form>

                            <form action="{{ route('admin.petugas.destroy', $user->id) }}"
                                method="POST"
                                class="form-delete-petugas">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="px-3 py-2 rounded-lg
                                    border border-red-200
                                    text-red-700
                                    text-sm hover:bg-red-50">

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="4"
                        class="text-center py-12 text-gray-500">

                        Belum ada petugas

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))

    <script>

    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session('success') }}',
        confirmButtonColor: '#062b30'
    });

    </script>

    @endif

    @if(session('error'))

    <script>

    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: '{{ session('error') }}',
        confirmButtonColor: '#dc2626'
    });

    </script>

    @endif

    <script>

    document.querySelectorAll('.form-delete-petugas')
    .forEach(form => {

        form.addEventListener('submit', function(e){

            e.preventDefault();

            Swal.fire({
                title: 'Hapus Petugas?',
                text: 'Data petugas akan dihapus permanen.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {

                if(result.isConfirmed){
                    form.submit();
                }

            });

        });

    });

    document.querySelectorAll('.form-reset-password')
    .forEach(form => {

        form.addEventListener('submit', function(e){

            e.preventDefault();

            Swal.fire({
                title: 'Reset Password?',
                html: `
                    Password akan direset menjadi:
                    <br><br>
                    <strong>12345678</strong>
                `,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#f59e0b',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Reset',
                cancelButtonText: 'Batal'
            }).then((result) => {

                if(result.isConfirmed){
                    form.submit();
                }

            });

        });

    });

    </script>

@endsection