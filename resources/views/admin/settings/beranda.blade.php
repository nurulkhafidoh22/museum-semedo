@extends('layouts.settings')

@section('content')

@php
$hero = $pages->first();
@endphp

<div class="space-y-6">

    <div>

        <p class="text-[11px]
            tracking-[0.25em]
            uppercase
            text-[#0f766e]
            font-semibold mb-2">

            Website Management

        </p>

        <h1 class="text-2xl md:text-3xl
            font-bold text-gray-900">
            Pengaturan Beranda
        </h1>

        <p class="text-sm text-gray-500 mt-2">
            Kelola konten halaman utama website Museum Semedo.
        </p>

    </div>

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

    <div class="bg-white
                border border-gray-200
                rounded-3xl
                p-5 md:p-8">

        @if ($errors->any())

            <div class="bg-red-50
                border border-red-200
                text-red-700
                text-sm
                p-4
                rounded-xl
                mb-6">

                <ul class="list-disc pl-5">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form
            action="{{ route('admin.settings.update-home') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="space-y-6">

                <!-- JUDUL -->

                <div>

                    <label class="block
                        text-sm
                        font-medium
                        text-gray-700
                        mb-2">

                        Judul Hero

                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title', $hero?->title) }}"
                        class="w-full
                            border border-gray-300
                            rounded-xl
                            px-4 py-3
                            focus:outline-none
                            focus:ring-2
                            focus:ring-[#0f766e]/20
                            focus:border-[#0f766e]">
                </div>

                <!-- DESKRIPSI -->

                <div>

                    <label class="block
                        text-sm
                        font-medium
                        text-gray-700
                        mb-2">

                        Deskripsi Hero

                    </label>

                    <textarea
                        name="content"
                        rows="5"
                        class="w-full
                        border
                        border-gray-300
                        rounded-xl
                        px-4 py-3">{{ old('content', $hero?->content) }}</textarea>

                </div>

                <!-- GAMBAR -->

                <div>

                    <label class="block
                        text-sm
                        font-medium
                        text-gray-700
                        mb-2">

                        Background Hero

                    </label>

                    <input
                        type="file"
                        name="image"
                        class="w-full">

                </div>

                @if($hero && $hero->image)

                <div>

                    <img
                        src="{{ asset('storage/'.$hero->image) }}?v={{ $hero->updated_at->timestamp }}"
                        class="w-full
                            max-w-md
                            rounded-2xl
                            border border-gray-200
                            shadow-sm">

                </div>

                @endif

                <!-- BUTTON -->

                <div>

                    <button
                        type="submit"
                        class="flex w-full sm:w-auto
                        items-center justify-center gap-2
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
                            class="w-4 h-4">
                        </i>

                        Simpan Perubahan

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection