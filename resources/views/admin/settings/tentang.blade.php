@extends('layouts.settings')

@section('content')

@php

$badge = $pages->where('section', 'badge')->first();

$title1 = $pages->where('section', 'title_1')->first();

$title2 = $pages->where('section', 'title_2')->first();

$title3 = $pages->where('section', 'title_3')->first();

$description = $pages->where('section', 'description')->first();

$image = $pages->where('section', 'image')->first();

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

        <h1 class="text-3xl font-bold text-gray-900">
            Pengaturan Halaman Tentang
        </h1>

        <p class="text-sm text-gray-500 mt-2">
            Kelola hero section halaman Tentang Museum Semedo.
        </p>

    </div>

    @if(session('success'))

        <div class="bg-green-50
            border border-green-200
            text-green-700
            px-4 py-3
            rounded-xl">

            {{ session('success') }}

        </div>

    @endif

    @if ($errors->any())

        <div class="bg-red-50
            border border-red-200
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

    <div class="bg-white
        border border-gray-200
        rounded-3xl
        p-8">

        <form
            action="{{ route('admin.settings.update-tentang') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="space-y-6">

                <!-- BADGE -->

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">

                        Badge

                    </label>

                    <input
                        type="text"
                        name="badge"
                        value="{{ old('badge', $badge?->title) }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3">

                </div>

                <!-- JUDUL 1 -->

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">

                        Judul Baris 1

                    </label>

                    <input
                        type="text"
                        name="title_1"
                        value="{{ old('title_1', $title1?->title) }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3">

                </div>

                <!-- JUDUL 2 -->

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">

                        Judul Highlight

                    </label>

                    <input
                        type="text"
                        name="title_2"
                        value="{{ old('title_2', $title2?->title) }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3">

                </div>

                <!-- JUDUL 3 -->

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">

                        Judul Baris 3

                    </label>

                    <input
                        type="text"
                        name="title_3"
                        value="{{ old('title_3', $title3?->title) }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3">

                </div>

                <!-- DESKRIPSI -->

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">

                        Deskripsi

                    </label>

                    <textarea
                        name="description"
                        rows="6"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3">{{ old('description', $description?->title) }}</textarea>

                </div>

                <!-- GAMBAR -->

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">

                        Gambar Hero

                    </label>

                    <input
                        type="file"
                        name="image"
                        class="w-full">

                </div>

                @if($image && $image->image)

                    <div>

                        <img
                            src="{{ asset('storage/'.$image->image) }}?v={{ $image->updated_at?->timestamp }}"
                            class="w-full max-w-md rounded-2xl border">

                    </div>

                @endif

                <!-- BUTTON -->

                <div>

                    <button
                        type="submit"
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