<x-app-layout>

    @php

    $hargaDewasa = $tiket
        ->where('section', 'harga_dewasa')
        ->first();

    $hargaWna = $tiket
        ->where('section', 'harga_wna')
        ->first();

    @endphp

    <section class="py-24 bg-[#f3f4f1] min-h-screen">
    <x-step-indicator step="1" />

    <div class="max-w-4xl mx-auto px-6">

        <!-- CARD -->
        <div class="bg-white rounded-3xl shadow-xl p-10">

            <!-- HEADER -->
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-[#1f2937]">
                    Pembelian Tiket Online
                </h2>

                <p class="text-gray-600 mt-3">
                    Isi data kunjungan Anda untuk melakukan pemesanan tiket.
                </p>
            </div>

            {{-- ================= DATA PROVINSI ================= --}}
            @php
                $provinsi = [
                    'aceh'=>'Aceh','bali'=>'Bali','banten'=>'Banten','bengkulu'=>'Bengkulu',
                    'yogyakarta'=>'DI Yogyakarta','gorontalo'=>'Gorontalo','jakarta'=>'DKI Jakarta',
                    'jambi'=>'Jambi','jawabarat'=>'Jawa Barat','jawatengah'=>'Jawa Tengah','jawatimur'=>'Jawa Timur',
                    'kalbar'=>'Kalimantan Barat','kalteng'=>'Kalimantan Tengah','kalsel'=>'Kalimantan Selatan',
                    'kaltim'=>'Kalimantan Timur','kalut'=>'Kalimantan Utara',
                    'babel'=>'Kepulauan Bangka Belitung','kepri'=>'Kepulauan Riau','lampung'=>'Lampung',
                    'maluku'=>'Maluku','malut'=>'Maluku Utara',
                    'ntb'=>'Nusa Tenggara Barat','ntt'=>'Nusa Tenggara Timur',
                    'papua'=>'Papua','papuabarat'=>'Papua Barat',
                    'papuabaratdaya'=>'Papua Barat Daya','papuapegunungan'=>'Papua Pegunungan',
                    'papuaselatan'=>'Papua Selatan',
                    'riau'=>'Riau','sulbar'=>'Sulawesi Barat','sulsel'=>'Sulawesi Selatan',
                    'sultra'=>'Sulawesi Tenggara','sulteng'=>'Sulawesi Tengah','sulut'=>'Sulawesi Utara',
                    'sumbar'=>'Sumatera Barat','sumsel'=>'Sumatera Selatan','sumut'=>'Sumatera Utara',
                ];
            @endphp

            <form id="form-online"
            action="{{ route('tiket.store') }}"
            method="POST"
            class="space-y-8">

            @csrf

            <!-- NAMA -->
            <div>
                <label class="font-semibold text-gray-700">Nama Lengkap</label>

                <input type="text"
                    name="nama"
                    required
                    class="w-full mt-2 p-3 border rounded-xl focus:ring-2 focus:ring-[#1ecad3]"
                    placeholder="Masukkan nama lengkap">
            </div>

            <!-- TANGGAL -->
            <div>
                <label class="font-semibold text-gray-700">Tanggal Kunjungan</label>

                <input type="date"
                    name="tanggal_kunjungan"
                    min="{{ date('Y-m-d') }}"
                    required
                    class="w-full mt-2 p-3 border rounded-xl focus:ring-2 focus:ring-[#1ecad3]">
            </div>

            <input type="hidden" name="jenis_tiket" value="online">

            <!-- TIPE KUNJUNGAN + KATEGORI UMUR -->
            <div class="grid md:grid-cols-2 gap-6">

                <div>
                    <label class="font-semibold text-gray-700">Tipe Kunjungan</label>

                    <select name="tipe_kunjungan"
                            id="tipeKunjungan"
                            required
                            class="w-full mt-2 p-3 border rounded-xl focus:ring-2 focus:ring-[#1ecad3]">

                        <option value="">Pilih tipe kunjungan</option>
                        <option value="individu">Individu</option>
                        <option value="rombongan">Rombongan</option>
                    </select>
                </div>

                <div>
                    <label class="font-semibold text-gray-700">Kategori Umur</label>

                    <select name="kategori_umur"
                            required
                            class="w-full mt-2 p-3 border rounded-xl focus:ring-2 focus:ring-[#1ecad3]">

                        <option value="">Pilih kategori umur</option>
                        <option value="0-12">0–12 Tahun</option>
                        <option value="13-17">13–17 Tahun</option>
                        <option value="18-25">18–25 Tahun</option>
                        <option value="26-40">26–40 Tahun</option>
                        <option value="41-60">41–60 Tahun</option>
                        <option value=">60">>60 Tahun</option>
                    </select>
                </div>

            </div>

            <!-- KATEGORI PENGUNJUNG -->
            <div>
                <label class="font-semibold text-gray-700">Kategori Pengunjung</label>

                <select name="kategori_pengunjung"
                        id="kategoriPengunjung"
                        required
                        class="w-full mt-2 p-3 border rounded-xl focus:ring-2 focus:ring-[#1ecad3]">

                    <option value="">Pilih kategori pengunjung</option>
                    <option value="umum">Umum</option>
                    <option value="paud">KB/PAUD/TK/RA</option>
                    <option value="sd">SD/MI</option>
                    <option value="smp">SMP/MTs</option>
                    <option value="sma">SMA/MA/SMK</option>
                    <option value="pt">Perguruan Tinggi</option>
                </select>
            </div>

            <!-- NAMA INSTANSI -->
            <div id="instansiField" class="hidden">
                <label class="font-semibold text-gray-700">
                    Nama Instansi / Sekolah
                </label>

                <input type="text"
                    name="instansi"
                    class="w-full mt-2 p-3 border rounded-xl focus:ring-2 focus:ring-[#1ecad3]"
                    placeholder="Masukkan nama instansi/sekolah">
            </div>

            <!-- PROVINSI + KABUPATEN -->
            <div class="grid md:grid-cols-2 gap-6">

                <div>
                    <label class="font-semibold text-gray-700">Provinsi</label>

                    <select id="provinsi-online"
                            name="provinsi"
                            required
                            class="w-full mt-2 p-3 border rounded-xl focus:ring-2 focus:ring-[#1ecad3]">

                        <option value="">Pilih Provinsi</option>

                        @foreach ($provinsi as $kode => $nama)
                            <option value="{{ $nama }}" data-kode="{{ $kode }}">
                                {{ $nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="font-semibold text-gray-700">Kabupaten/Kota</label>

                    <select id="kabupaten-online"
                            name="kabupaten"
                            required
                            class="w-full mt-2 p-3 border rounded-xl focus:ring-2 focus:ring-[#1ecad3]">

                        <option value="">Pilih Kabupaten/Kota</option>
                    </select>
                </div>

            </div>

            <!-- JENIS TIKET + JUMLAH TIKET -->
            <div class="grid md:grid-cols-2 gap-6">

                <!-- JENIS TIKET -->
                <div>
                    <label class="font-semibold text-gray-700">
                        Jenis Tiket
                    </label>

                    <select name="kategori"
                            id="kategoriTiket"
                            required
                            class="w-full mt-2 p-3 border rounded-xl
                                focus:ring-2 focus:ring-[#1ecad3]">

                        <option value="">Pilih jenis tiket</option>

                        <option
                            value="domestik"
                            data-harga="{{ $hargaDewasa?->title ?? 8000 }}">

                            Domestik —
                            Rp{{ number_format($hargaDewasa?->title ?? 8000, 0, ',', '.') }}

                        </option>

                        <option
                            value="mancanegara"
                            data-harga="{{ $hargaWna?->title ?? 20000 }}">

                            Mancanegara —
                            Rp{{ number_format($hargaWna?->title ?? 20000, 0, ',', '.') }}

                        </option>

                    </select>
                </div>

                <!-- JUMLAH TIKET -->
                <div>
                    <label class="font-semibold text-gray-700">
                        Jumlah Tiket
                    </label>

                    <input type="number"
                        name="jumlah_tiket"
                        id="jumlahTiket"
                        min="1"
                        required
                        class="w-full mt-2 p-3 border rounded-xl
                                focus:ring-2 focus:ring-[#1ecad3]"
                        placeholder="Masukkan jumlah tiket">
                </div>

            </div>

            <!-- FREKUENSI -->
            <div>
                <label class="font-semibold text-gray-700">
                    Frekuensi Kunjungan
                </label>

                <select name="frekuensi"
                        required
                        class="w-full mt-2 p-3 border rounded-xl focus:ring-2 focus:ring-[#1ecad3]">

                    <option value="">Pilih frekuensi kunjungan</option>
                    <option value="1">Pertama Kali</option>
                    <option value="2">Kedua Kali</option>
                    <option value="3">Ketiga Kali</option>
                    <option value="4">Lebih dari 3 Kali</option>
                </select>
            </div>

            <!-- BUTTON -->
            <div class="text-center pt-6">
                <button type="submit"
                        class="px-10 py-3 bg-[#0f2a2c] text-white
                            rounded-full font-semibold shadow-lg
                            hover:bg-transparent hover:text-[#0f2a2c]
                            hover:border-2 hover:border-[#0f2a2c]
                            transition">

                    Bayar Sekarang
                </button>
            </div>

        </form>

        </div>

    </div>

</section>

{{-- ================= SCRIPT WILAYAH ================= --}}
@push('scripts')
<script>
(function () {
    const dataWilayah = {
        aceh:["Kota Banda Aceh","Kab. Aceh Besar","Kab. Aceh Utara","Kab. Aceh Barat"],
        sumut:["Kota Medan","Kab. Deli Serdang","Kab. Langkat"],
        sumbar:["Kota Padang","Kab. Solok","Kab. Agam"],
        riau:["Kota Pekanbaru","Kab. Siak","Kab. Kampar"],
        kepri:["Kota Batam","Kota Tanjung Pinang","Kab. Karimun"],
        jambi:["Kota Jambi","Kab. Batanghari","Kab. Tebo"],
        sumsel:["Kota Palembang","Kab. Ogan Ilir","Kab. Musi Banyuasin"],
        babel:["Kota Pangkalpinang","Kab. Bangka","Kab. Belitung"],
        bengkulu:["Kota Bengkulu","Kab. Rejang Lebong","Kab. Mukomuko"],
        lampung:["Kota Bandar Lampung","Kab. Lampung Selatan","Kab. Pringsewu"],
        banten:["Kota Serang","Kota Tangerang","Kab. Lebak"],
        jawabarat:["Kota Bandung","Kab. Bandung","Kota Bogor"],
        jakarta:["Jakarta Pusat","Jakarta Selatan","Jakarta Timur","Jakarta Barat","Jakarta Utara"],
        jawatengah:["Kota Tegal","Kab. Tegal","Kab. Brebes","Kab. Pemalang","Kota Semarang"],
        yogyakarta:["Kota Yogyakarta","Kab. Sleman","Kab. Bantul"],
        jawatimur:["Kota Surabaya","Kab. Malang","Kota Malang","Kab. Kediri"],
        bali:["Kota Denpasar","Kab. Gianyar","Kab. Badung"],
        ntb:["Kota Mataram","Kab. Lombok Barat","Kab. Lombok Timur"],
        ntt:["Kota Kupang","Kab. Sikka","Kab. Ende"],
        kalbar:["Kota Pontianak","Kab. Kubu Raya","Kab. Sambas"],
        kalteng:["Kota Palangka Raya","Kab. Kotawaringin Barat","Kab. Kapuas"],
        kalsel:["Kota Banjarmasin","Kab. Banjar","Kab. Hulu Sungai Selatan"],
        kaltim:["Kota Samarinda","Kota Balikpapan","Kab. Kutai Kartanegara"],
        kalut:["Kab. Bulungan","Kota Tarakan"],
        sulut:["Kota Manado","Kab. Minahasa","Kab. Bolaang Mongondow"],
        sulteng:["Kota Palu","Kab. Donggala","Kab. Parigi Moutong"],
        sulsel:["Kota Makassar","Kab. Gowa","Kab. Bone"],
        sultra:["Kota Kendari","Kab. Kolaka","Kab. Konawe"],
        gorontalo:["Kota Gorontalo","Kab. Bone Bolango"],
        sulbar:["Kab. Mamuju","Kab. Polewali Mandar"],
        maluku:["Kota Ambon","Kab. Maluku Tengah"],
        malut:["Kota Ternate","Kab. Halmahera Barat"],
        papua:["Kota Jayapura","Kab. Mimika"],
        papuaselatan:["Kab. Merauke","Kab. Asmat"],
        papuapegunungan:["Kab. Jayawijaya","Kab. Yahukimo"],
        papuabarat:["Kota Manokwari","Kab. Sorong"],
        papuabaratdaya:["Kota Sorong","Kab. Raja Ampat"]
    };

    const container = document.getElementById('form-online');
    if (!container) return;

    const provinsiEl = container.querySelector('#provinsi-online');
    const kabupatenEl = container.querySelector('#kabupaten-online');

    provinsiEl.addEventListener('change', function () {
        kabupatenEl.innerHTML = '<option value="">Pilih Kabupaten/Kota</option>';

        const selected = this.options[this.selectedIndex].dataset.kode;

        if (dataWilayah[selected]) {
            dataWilayah[selected].forEach(item => {
                const opt = document.createElement('option');
                opt.value = item;
                opt.textContent = item;
                kabupatenEl.appendChild(opt);
            });
        }
    });
})();
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // =========================
    // ELEMENT
    // =========================
    const kategoriPengunjung =
        document.getElementById('kategoriPengunjung');

    const instansiField =
        document.getElementById('instansiField');

    const tipeKunjungan =
        document.getElementById('tipeKunjungan');

    const jumlahTiket =
        document.getElementById('jumlahTiket');

    // =========================
    // CONDITIONAL INSTANSI
    // =========================
    kategoriPengunjung.addEventListener('change', function () {

        if (this.value !== 'umum' && this.value !== '') {

            instansiField.classList.remove('hidden');

        } else {

            instansiField.classList.add('hidden');

        }

    });

    // =========================
    // AUTO JUMLAH TIKET
    // =========================
    tipeKunjungan.addEventListener('change', function () {

        // INDIVIDU
        if (this.value === 'individu') {

            jumlahTiket.value = 1;

            jumlahTiket.setAttribute('readonly', true);

        }

        // ROMBONGAN
        else if (this.value === 'rombongan') {

            jumlahTiket.value = '';

            jumlahTiket.removeAttribute('readonly');

        }

        // DEFAULT
        else {

            jumlahTiket.value = '';

            jumlahTiket.removeAttribute('readonly');

        }

    });

});
</script>

@endpush

</x-app-layout>