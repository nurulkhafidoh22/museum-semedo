@extends('layouts.settings')

@section('content')

@php

$description = $pages->where('section', 'description')->first();

$alamat = $pages->where('section', 'alamat')->first();

$telepon = $pages->where('section', 'telepon')->first();

$email = $pages->where('section', 'email')->first();

$instagram = $pages->where('section', 'instagram')->first();

$tiktok = $pages->where('section', 'tiktok')->first();

$youtube = $pages->where('section', 'youtube')->first();

$copyright = $pages->where('section', 'copyright')->first();

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
            Pengaturan Footer
        </h1>

        <p class="text-sm text-gray-500 mt-2">
            Kelola informasi footer yang ditampilkan pada seluruh halaman Museum Semedo.
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
            action="{{ route('admin.settings.update-footer') }}"
            method="POST">

            @csrf

            <div class="space-y-6">

                <h2 class="text-xl font-semibold text-gray-900">
                    Informasi Museum
                </h2>

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">

                        Deskripsi Museum

                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3">{{ old('description', $description?->title) }}</textarea>

                </div>

                <hr class="my-8">

                <h2 class="text-xl font-semibold text-gray-900">
                    Informasi Kontak
                </h2>

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">

                        Alamat

                    </label>

                    <input
                        type="text"
                        name="alamat"
                        value="{{ old('alamat', $alamat?->title) }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3">

                </div>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-2">

                            Nomor Telepon

                        </label>

                        <input
                            type="text"
                            name="telepon"
                            value="{{ old('telepon', $telepon?->title) }}"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3">

                    </div>

                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-2">

                            Email

                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $email?->title) }}"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3">

                    </div>

                </div>

                <hr class="my-8">

                <h2 class="text-xl font-semibold text-gray-900">
                    Media Sosial
                </h2>

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">

                        Instagram

                    </label>

                    <input
                        type="text"
                        name="instagram"
                        value="{{ old('instagram', $instagram?->title) }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3">

                </div>

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">

                        TikTok

                    </label>

                    <input
                        type="text"
                        name="tiktok"
                        value="{{ old('tiktok', $tiktok?->title) }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3">

                </div>

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">

                        YouTube

                    </label>

                    <input
                        type="text"
                        name="youtube"
                        value="{{ old('youtube', $youtube?->title) }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3">

                </div>

                <hr class="my-8">

                <h2 class="text-xl font-semibold text-gray-900">
                    Copyright
                </h2>

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">

                        Teks Copyright

                    </label>

                    <input
                        type="text"
                        name="copyright"
                        value="{{ old('copyright', $copyright?->title) }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3">

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