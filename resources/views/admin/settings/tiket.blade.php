@extends('layouts.settings')

@section('content')

@php

$hargaAnak = $pages->where('section', 'harga_anak')->first();
$hargaDewasa = $pages->where('section', 'harga_dewasa')->first();
$hargaWna = $pages->where('section', 'harga_wna')->first();

@endphp

<div class="space-y-6">

    <!-- HEADER -->
    <div>

        <p class="text-[11px]
            tracking-[0.25em]
            uppercase
            text-[#0f766e]
            font-semibold mb-2">

            Website Management

        </p>

        <h1 class="text-2xl md:text-3xl font-bold text-gray-900">
            Pengaturan Tiket
        </h1>

        <p class="text-sm text-gray-500 mt-2">
            Kelola harga tiket Museum Semedo.
        </p>

    </div>

    <!-- SUCCESS -->
    @if(session('success'))

        <div class="bg-green-50
            border border-green-200
            text-sm
            text-green-700
            px-4 py-3
            rounded-xl">

            {{ session('success') }}

        </div>

    @endif

    <!-- ERROR -->
    @if ($errors->any())

        <div class="bg-red-50
            border border-red-200
            text-sm
            text-red-700
            px-4 py-3
            rounded-xl">

            <ul class="list-disc pl-5">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <!-- CARD -->
    <div class="bg-white
        border border-gray-200
        rounded-3xl
        p-5 md:p-8">

        <form
            action="{{ route('admin.settings.update-tiket') }}"
            method="POST">

            @csrf

            <div class="grid
                grid-cols-1
                md:grid-cols-2
                xl:grid-cols-3
                gap-6">

                <!-- ANAK -->
                <div class="border border-gray-200 rounded-2xl p-5">

                    <p class="text-xs uppercase tracking-wider text-gray-400 mb-2">
                        Tiket Anak
                    </p>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Harga Tiket Anak
                    </label>

                    <input
                        type="number"
                        name="harga_anak"
                        value="{{ old('harga_anak', $hargaAnak?->title) }}"
                        class="w-full
                        border border-gray-300
                        rounded-xl
                        px-4 py-3
                        focus:outline-none
                        focus:ring-2
                        focus:ring-[#0f766e]/20
                        focus:border-[#0f766e]">

                </div>

                <!-- DEWASA -->
                <div class="border border-gray-200 rounded-2xl p-5">

                    <p class="text-xs uppercase tracking-wider text-gray-400 mb-2">
                        Tiket Dewasa
                    </p>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Harga Tiket Dewasa
                    </label>

                    <input
                        type="number"
                        name="harga_dewasa"
                        value="{{ old('harga_dewasa', $hargaDewasa?->title) }}"
                        class="w-full
                        border border-gray-300
                        rounded-xl
                        px-4 py-3
                        focus:outline-none
                        focus:ring-2
                        focus:ring-[#0f766e]/20
                        focus:border-[#0f766e]">

                </div>

                <!-- WNA -->
                <div class="border border-gray-200 rounded-2xl p-5">

                    <p class="text-xs uppercase tracking-wider text-gray-400 mb-2">
                        Wisatawan Mancanegara
                    </p>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Harga Tiket WNA
                    </label>

                    <input
                        type="number"
                        name="harga_wna"
                        value="{{ old('harga_wna', $hargaWna?->title) }}"
                        class="w-full
                        border border-gray-300
                        rounded-xl
                        px-4 py-3
                        focus:outline-none
                        focus:ring-2
                        focus:ring-[#0f766e]/20
                        focus:border-[#0f766e]">

                </div>

            </div>

            <!-- BUTTON -->
            <div class="mt-8">

                <button
                    type="submit"
                    class="w-full sm:w-auto
                    inline-flex items-center justify-center gap-2
                    px-5 py-2.5
                    rounded-xl
                    bg-[#062b30]
                    text-white
                    font-medium
                    hover:bg-[#0f766e]
                    shadow-sm
                    hover:shadow-md
                    transition-all duration-300">

                    <i data-lucide="save"
                        class="w-4 h-4"></i>

                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection