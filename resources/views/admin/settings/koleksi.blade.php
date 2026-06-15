@extends('layouts.admin')

@section('content')

<div class="p-8 space-y-8">

    <!-- HEADER -->

    <div class="flex flex-col md:flex-row
        md:items-center
        md:justify-between
        gap-4">

        <div>

            <p class="text-[11px]
                tracking-[0.25em]
                uppercase
                text-[#0f766e]
                font-semibold mb-2">

                Collection Management

            </p>

            <h1 class="text-3xl font-bold text-gray-900">
                Data Koleksi
            </h1>

            <p class="text-sm text-gray-500 mt-2">
                Kelola koleksi Museum Semedo yang ditampilkan pada website.
            </p>

        </div>

        <a href="{{ route('admin.settings.koleksi.create') }}"
            class="inline-flex items-center gap-2

            px-5 py-2.5

            rounded-xl

            bg-[#062b30]
            text-white

            font-medium

            hover:bg-[#0f766e]

            shadow-sm
            hover:shadow-md

            transition-all duration-300">

            <i data-lucide="plus"
                class="w-4 h-4"></i>

            Tambah Koleksi

        </a>

    </div>

    <!-- STATISTIK -->

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-white
            border border-gray-200
            rounded-3xl
            p-6">

            <p class="text-sm text-gray-500">
                Total Koleksi
            </p>

            <h2 class="text-3xl font-bold text-[#062b30] mt-2">

                {{ $koleksi->count() }}

            </h2>

        </div>

    </div>

    <!-- TABLE -->

    <div class="bg-white
        border border-gray-200
        rounded-3xl
        overflow-hidden">

        <div class="px-6 py-5
            border-b border-gray-200">

            <h3 class="font-semibold text-gray-900">
                Daftar Koleksi
            </h3>

        </div>

        @if($koleksi->count())

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>

                        <tr class="bg-gray-50">

                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                Gambar
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                Judul
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                Kategori
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                Periode
                            </th>

                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($koleksi as $item)

                        <tr class="border-t border-gray-100">

                            <td class="px-6 py-4">

                                <img
                                    src="{{ asset('storage/'.$item->gambar) }}"
                                    class="w-20 h-14 object-cover rounded-xl border">

                            </td>

                            <td class="px-6 py-4">

                                <p class="font-semibold text-gray-900">

                                    {{ $item->judul }}

                                </p>

                            </td>

                            <td class="px-6 py-4">

                                <span class="inline-flex
                                    px-3 py-1
                                    rounded-full
                                    text-xs
                                    font-medium

                                    bg-cyan-50
                                    text-cyan-700">

                                    {{ ucfirst($item->kategori) }}

                                </span>

                            </td>

                            <td class="px-6 py-4 text-gray-600">

                                {{ $item->periode }}

                            </td>

                            <td class="px-6 py-4">

                                <div class="flex items-center
                                    justify-center
                                    gap-2">

                                    <a href="{{ route('admin.settings.koleksi.edit', $item->id) }}"
                                        class="px-3 py-2
                                        rounded-lg

                                        bg-amber-50
                                        text-amber-700

                                        hover:bg-amber-100">

                                        Edit

                                    </a>

                                    <form
                                        action="{{ route('admin.settings.koleksi.destroy', $item->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus koleksi ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="px-3 py-2
                                            rounded-lg
                                            bg-red-50
                                            text-red-700
                                            hover:bg-red-100">
                                            Hapus
                                        </button>
                                    </form>

                                </div>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="p-16 text-center">

                <div class="w-16 h-16
                    mx-auto

                    rounded-2xl

                    bg-gray-100

                    flex items-center
                    justify-center">

                    <i data-lucide="images"
                        class="w-8 h-8 text-gray-400"></i>

                </div>

                <h3 class="mt-5
                    text-lg
                    font-semibold
                    text-gray-900">

                    Belum Ada Koleksi

                </h3>

                <p class="text-gray-500 mt-2">

                    Tambahkan koleksi pertama Museum Semedo untuk ditampilkan pada website.

                </p>

            </div>

        @endif

    </div>

</div>

@endsection