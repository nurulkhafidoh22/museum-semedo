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

        <h1 class="text-3xl font-bold text-gray-900">
            Pengaturan Beranda
        </h1>

        <p class="text-sm text-gray-500 mt-2">
            Kelola konten halaman utama website Museum Semedo.
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

    <div class="bg-white
        border border-gray-200
        rounded-3xl
        p-8">

        @if ($errors->any())

            <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl">

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
                        border
                        border-gray-300
                        rounded-xl
                        px-4 py-3">

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
                        class="w-full max-w-md rounded-xl border">

                </div>

                @endif

                <!-- BUTTON -->

                <div>

                    <button
                        type="submit"

                        class="px-6 py-3
                        bg-[#062b30]
                        text-white
                        rounded-xl
                        hover:bg-[#0f766e]
                        transition">

                        Simpan Perubahan

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection