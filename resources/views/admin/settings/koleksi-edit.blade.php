@extends('layouts.settings')

@section('content')

<div class="space-y-8">

<!-- HEADER -->

<div>

    <p class="text-[11px]
        tracking-[0.25em]
        uppercase
        text-[#0f766e]
        font-semibold mb-2">

        Collection Management

    </p>

    <h1 class="text-2xl md:text-3xl font-bold text-gray-900">
        Edit Koleksi
    </h1>

    <p class="text-sm text-gray-500 mt-2">
        Perbarui data koleksi Museum Semedo yang ditampilkan pada website.
    </p>

</div>

@if ($errors->any())

    <div class="bg-red-50
        border border-red-200
        text-red-700
        p-4
        rounded-2xl">

        <ul class="list-disc pl-5 space-y-1">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

<form
    id="formEditKoleksi"
    action="{{ route('admin.settings.koleksi.update', $koleksi->id) }}"
    method="POST"
    enctype="multipart/form-data"
    class="space-y-8">

    @csrf
    @method('PUT')

    <!-- INFORMASI UTAMA -->

    <div class="bg-white
        border border-gray-200
        rounded-3xl
        p-5 md:p-8">

        <h2 class="text-xl font-semibold text-gray-900 mb-6">
            Informasi Utama
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Judul Koleksi
                </label>

                <input
                    type="text"
                    name="judul"
                    value="{{ old('judul', $koleksi->judul) }}"
                    class="w-full
                    border border-gray-300
                    rounded-xl
                    px-4 py-3
                    focus:outline-none
                    focus:ring-2
                    focus:ring-[#0f766e]/20
                    focus:border-[#0f766e]"
                    required
                >

            </div>

            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Kategori
                </label>

                <select
                    name="kategori"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3"
                    required>

                    <option value="">
                        Pilih Kategori
                    </option>

                    <option
                        value="paleontologi"
                        {{ old('kategori', $koleksi->kategori) == 'paleontologi' ? 'selected' : '' }}>
                        Paleontologi
                    </option>

                    <option
                        value="paleoantropologi"
                        {{ old('kategori', $koleksi->kategori) == 'paleoantropologi' ? 'selected' : '' }}>
                        Paleoantropologi
                    </option>

                    <option
                        value="artefak"
                        {{ old('kategori', $koleksi->kategori) == 'artefak' ? 'selected' : '' }}>
                        Artefak
                    </option>

                </select>

            </div>

        </div>

        <div class="mt-6">

            <label class="block text-sm font-medium text-gray-700 mb-2">
                Gambar Saat Ini
            </label>

            <img
                src="{{ asset('storage/' . $koleksi->gambar) }}"
                class="w-full
                    max-w-xs
                    h-auto
                    object-cover
                    rounded-2xl
                    border border-gray-200
                    shadow-sm
                    mb-4">

            <label class="block text-sm font-medium text-gray-700 mb-2">
                Ganti Gambar (Opsional)
            </label>

            <input
                type="file"
                name="gambar"
                accept=".jpg,.jpeg,.png,.webp"
                class="w-full">

            <p class="text-xs text-gray-500 mt-2">
                Format: JPG, JPEG, PNG, WEBP (Maksimal 10 MB)
            </p>

        </div>

    </div>

    <!-- INFORMASI DETAIL -->

    <div class="bg-white
        border border-gray-200
        rounded-3xl
        p-5 md:p-8">

        <h2 class="text-xl font-semibold text-gray-900 mb-6">
            Informasi Detail
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Periode
                </label>

                <input
                    type="text"
                    name="periode"
                    value="{{ old('periode', $koleksi->periode) }}"
                    class="w-full
                        border border-gray-300
                        rounded-xl
                        px-4 py-3
                        focus:outline-none
                        focus:ring-2
                        focus:ring-[#0f766e]/20
                        focus:border-[#0f766e]">
            </div>

            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Usia Koleksi
                </label>

                <input
                    type="text"
                    name="usia"
                    value="{{ old('usia', $koleksi->usia) }}"
                    class="w-full
                        border border-gray-300
                        rounded-xl
                        px-4 py-3
                        focus:outline-none
                        focus:ring-2
                        focus:ring-[#0f766e]/20
                        focus:border-[#0f766e]">
            </div>

            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Lokasi Temuan
                </label>

                <input
                    type="text"
                    name="lokasi"
                    value="{{ old('lokasi', $koleksi->lokasi) }}"
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

    </div>

    <!-- KONTEN KOLEKSI -->

    <div class="bg-white
        border border-gray-200
        rounded-3xl
        p-5 md:p-8">

        <h2 class="text-xl font-semibold text-gray-900 mb-6">
            Konten Koleksi
        </h2>

        <div class="space-y-6">

            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Deskripsi Singkat
                </label>

                <textarea
                    name="deskripsi"
                    rows="4"
                    class="w-full
                        border border-gray-300
                        rounded-xl
                        px-4 py-3
                        focus:outline-none
                        focus:ring-2
                        focus:ring-[#0f766e]/20
                        focus:border-[#0f766e]"
                    required>{{ old('deskripsi', $koleksi->deskripsi) }}</textarea>

            </div>

            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Deskripsi Lengkap 1
                </label>

                <textarea
                    name="deskripsi_lengkap_1"
                    rows="6"
                    class="w-full
                        border border-gray-300
                        rounded-xl
                        px-4 py-3
                        focus:outline-none
                        focus:ring-2
                        focus:ring-[#0f766e]/20
                        focus:border-[#0f766e]">{{ old('deskripsi_lengkap_1', $koleksi->deskripsi_lengkap_1) }}</textarea>
            </div>

            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Deskripsi Lengkap 2
                </label>

                <textarea
                    name="deskripsi_lengkap_2"
                    rows="6"
                    class="w-full
                        border border-gray-300
                        rounded-xl
                        px-4 py-3
                        focus:outline-none
                        focus:ring-2
                        focus:ring-[#0f766e]/20
                        focus:border-[#0f766e]">{{ old('deskripsi_lengkap_2', $koleksi->deskripsi_lengkap_2) }}</textarea>
            </div>

            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Konteks Sejarah
                </label>

                <textarea
                    name="konteks"
                    rows="6"
                    class="w-full
                        border border-gray-300
                        rounded-xl
                        px-4 py-3
                        focus:outline-none
                        focus:ring-2
                        focus:ring-[#0f766e]/20
                        focus:border-[#0f766e]">{{ old('konteks', $koleksi->konteks) }}</textarea>
            </div>

        </div>

    </div>

    <!-- BUTTON -->

    <div class="flex flex-col sm:flex-row gap-3">

        <a
            href="{{ route('admin.settings', ['menu' => 'koleksi']) }}"
            class="w-full sm:w-auto
            inline-flex items-center justify-center gap-2

            px-5 py-2.5

            border border-gray-300
            text-gray-700

            rounded-xl

            hover:bg-gray-50

            transition-all duration-300">

            <i data-lucide="arrow-left"
                class="w-4 h-4"></i>

            Kembali

        </a>

        <button
            type="submit"
            class="w-full sm:w-auto
            inline-flex items-center justify-center gap-2

            px-5 py-2.5

            bg-[#062b30]
            text-white

            rounded-xl

            hover:bg-[#0f766e]

            shadow-sm
            hover:shadow-md

            transition-all duration-300">

            <i data-lucide="save"
                class="w-4 h-4"></i>

            Update Koleksi

        </button>

    </div>

</form>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

document.getElementById('formEditKoleksi')
.addEventListener('submit', function(e){

    e.preventDefault();

    Swal.fire({

        title: 'Simpan Perubahan?',
        text: 'Perubahan data koleksi akan disimpan.',
        icon: 'question',

        showCancelButton: true,

        confirmButtonColor: '#062b30',
        cancelButtonColor: '#6b7280',

        confirmButtonText: 'Ya, Simpan',
        cancelButtonText: 'Batal'

    }).then((result) => {

        if(result.isConfirmed){

            this.submit();

        }

    });

});

</script>

@endsection