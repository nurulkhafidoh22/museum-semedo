@extends('layouts.settings')

@section('content')

@php

$badge = $pages->where('section', 'badge')->first();

$title1 = $pages->where('section', 'title_1')->first();

$title2 = $pages->where('section', 'title_2')->first();

$title3 = $pages->where('section', 'title_3')->first();

$description = $pages->where('section', 'description')->first();

$image = $pages->where('section', 'image')->first();

$jamHari = $pages->where('section', 'jam_hari')->first();

$jamWaktu = $pages->where('section', 'jam_waktu')->first();

$tutupHari = $pages->where('section', 'tutup_hari')->first();

$tutupStatus = $pages->where('section', 'tutup_status')->first();

$liburHari = $pages->where('section', 'libur_hari')->first();

$liburStatus = $pages->where('section', 'libur_status')->first();

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
            Pengaturan Informasi
        </h1>

        <p class="text-sm text-gray-500 mt-2">
            Kelola hero section halaman Informasi Museum Semedo.
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
            action="{{ route('admin.settings.update-informasi') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="space-y-6">

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

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">

                        Deskripsi

                    </label>

                    <textarea
                        name="description"
                        rows="6"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3">{{ old('description', $description?->title) }}</textarea>

                </div>

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

                <hr class="my-8">

                <h2 class="text-xl font-semibold text-gray-900">
                    Jam Operasional
                </h2>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Hari Operasional
                        </label>

                        <input
                            type="text"
                            name="jam_hari"
                            value="{{ old('jam_hari', $jamHari?->title) }}"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3">

                    </div>

                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Jam Operasional
                        </label>

                        <input
                            type="text"
                            name="jam_waktu"
                            value="{{ old('jam_waktu', $jamWaktu?->title) }}"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3">

                    </div>

                </div>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Hari Tutup
                        </label>

                        <input
                            type="text"
                            name="tutup_hari"
                            value="{{ old('tutup_hari', $tutupHari?->title) }}"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3">

                    </div>

                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Status Tutup
                        </label>

                        <input
                            type="text"
                            name="tutup_status"
                            value="{{ old('tutup_status', $tutupStatus?->title) }}"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3">

                    </div>

                </div>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Hari Libur Nasional
                        </label>

                        <input
                            type="text"
                            name="libur_hari"
                            value="{{ old('libur_hari', $liburHari?->title) }}"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3">

                    </div>

                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Status Libur
                        </label>

                        <input
                            type="text"
                            name="libur_status"
                            value="{{ old('libur_status', $liburStatus?->title) }}"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3">

                    </div>

                </div>

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