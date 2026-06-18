<x-app-layout>

<section class="py-20 md:py-24 bg-[#f8fafc] min-h-screen overflow-x-hidden">

    <div class="mb-8 md:mb-12">
        <x-step-indicator
            step="1"
            label1="Isi Data"
            label2="Validasi"
            label3="Masuk" />
    </div>

    <div class="max-w-4xl mx-auto px-4 md:px-6">

        <!-- CARD -->
        <div class="bg-white
                    rounded-2xl md:rounded-3xl
                    shadow-md
                    border border-gray-200
                    p-5 sm:p-6 md:p-12">

            <!-- HEADER -->
            <div class="text-center mb-8 md:mb-10">

                <h2 class="text-2xl sm:text-3xl md:text-4xl
                           font-bold text-[#1f2937]">

                    Pengisian Data Kunjungan Offline

                </h2>

                <p class="text-gray-500
                          mt-3
                          text-sm sm:text-base md:text-lg">

                    Isi data kunjungan setelah membeli tiket
                    di loket Museum Semedo

                </p>

            </div>

            <form id="form-offline"
                action="{{ route('tiket.store') }}"
                method="POST"
                class="space-y-6">

                @csrf

                <!-- ERROR -->
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded-xl text-sm">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- ========================= -->
                <!-- DATA PENGUNJUNG -->
                <!-- ========================= -->

                <div>
                    <label class="block font-semibold text-[#1f2937] mb-2">
                        Nama Lengkap
                    </label>

                    <input type="text"
                        name="nama"
                        required
                        placeholder="Masukkan nama lengkap"
                        class="w-full p-3 border border-gray-300 rounded-xl
                                focus:ring-2 focus:ring-[#1ecad3]
                                focus:border-[#1ecad3]">
                </div>

                <div>
                    <label class="block font-semibold text-[#1f2937] mb-2">
                        Tanggal Kunjungan
                    </label>

                    <input type="date"
                        name="tanggal_kunjungan"
                        min="{{ date('Y-m-d') }}"
                        required
                        class="w-full p-3 border border-gray-300 rounded-xl
                                focus:ring-2 focus:ring-[#1ecad3]">
                </div>

                <input type="hidden" name="jenis_tiket" value="offline">

                <!-- ========================= -->
                <!-- DEMOGRAFI -->
                <!-- ========================= -->

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- KATEGORI PENGUNJUNG -->
                    <div>
                        <label class="block font-semibold text-[#1f2937] mb-2">
                            Kategori Pengunjung
                        </label>

                        <select name="kategori_pengunjung"
                                id="kategoriPengunjungOffline"
                                required
                                class="w-full p-3 border border-gray-300 rounded-xl
                                    focus:ring-2 focus:ring-[#1ecad3]">

                            <option value="">Pilih kategori pengunjung</option>

                            <option value="umum">Umum</option>
                            <option value="paud">KB/PAUD/TK/RA</option>
                            <option value="sd">SD/MI</option>
                            <option value="smp">SMP/MTs</option>
                            <option value="sma">SMA/MA/SMK</option>
                            <option value="pt">Perguruan Tinggi</option>
                        </select>
                    </div>

                    <!-- KATEGORI UMUR -->
                    <div>
                        <label class="block font-semibold text-[#1f2937] mb-2">
                            Kategori Umur
                        </label>

                        <select name="kategori_umur"
                                required
                                class="w-full p-3 border border-gray-300 rounded-xl
                                    focus:ring-2 focus:ring-[#1ecad3]">

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

                <!-- INSTANSI -->
                <div id="instansiFieldOffline" class="hidden">

                    <label class="block font-semibold text-[#1f2937] mb-2">
                        Nama Instansi / Sekolah
                    </label>

                    <input type="text"
                        name="instansi"
                        placeholder="Masukkan nama instansi/sekolah"
                        class="w-full p-3 border border-gray-300 rounded-xl
                                focus:ring-2 focus:ring-[#1ecad3]">
                </div>

                <!-- ========================= -->
                <!-- ASAL DAERAH -->
                <!-- ========================= -->

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- PROVINSI -->
                    <div>

                        <label class="block font-semibold text-[#1f2937] mb-2">
                            Provinsi
                        </label>

                        <select id="provinsi-offline"
                                name="provinsi"
                                required
                                class="w-full p-3 border border-gray-300 rounded-xl
                                    focus:ring-2 focus:ring-[#1ecad3]">

                            <option value="">Pilih Provinsi</option>

                            @php
                                $provinsi = [
                                    'aceh'=>'Aceh',
                                    'bali'=>'Bali',
                                    'banten'=>'Banten',
                                    'bengkulu'=>'Bengkulu',
                                    'yogyakarta'=>'DI Yogyakarta',
                                    'gorontalo'=>'Gorontalo',
                                    'jakarta'=>'DKI Jakarta',
                                    'jambi'=>'Jambi',
                                    'jawabarat'=>'Jawa Barat',
                                    'jawatengah'=>'Jawa Tengah',
                                    'jawatimur'=>'Jawa Timur',
                                    'kalbar'=>'Kalimantan Barat',
                                    'kalteng'=>'Kalimantan Tengah',
                                    'kalsel'=>'Kalimantan Selatan',
                                    'kaltim'=>'Kalimantan Timur',
                                    'kalut'=>'Kalimantan Utara',
                                    'babel'=>'Kepulauan Bangka Belitung',
                                    'kepri'=>'Kepulauan Riau',
                                    'lampung'=>'Lampung',
                                    'maluku'=>'Maluku',
                                    'malut'=>'Maluku Utara',
                                    'ntb'=>'Nusa Tenggara Barat',
                                    'ntt'=>'Nusa Tenggara Timur',
                                    'papua'=>'Papua',
                                    'papuabarat'=>'Papua Barat',
                                    'papuabaratdaya'=>'Papua Barat Daya',
                                    'papuapegunungan'=>'Papua Pegunungan',
                                    'papuaselatan'=>'Papua Selatan',
                                    'riau'=>'Riau',
                                    'sulbar'=>'Sulawesi Barat',
                                    'sulsel'=>'Sulawesi Selatan',
                                    'sultra'=>'Sulawesi Tenggara',
                                    'sulteng'=>'Sulawesi Tengah',
                                    'sulut'=>'Sulawesi Utara',
                                    'sumbar'=>'Sumatera Barat',
                                    'sumsel'=>'Sumatera Selatan',
                                    'sumut'=>'Sumatera Utara',
                                ];
                            @endphp

                            @foreach($provinsi as $kode => $nama)
                                <option value="{{ $nama }}" data-kode="{{ $kode }}">
                                    {{ $nama }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <!-- KABUPATEN -->
                    <div>

                        <label class="block font-semibold text-[#1f2937] mb-2">
                            Kabupaten/Kota
                        </label>

                        <select id="kabupaten-offline"
                                name="kabupaten"
                                required
                                class="w-full p-3 border border-gray-300 rounded-xl
                                    focus:ring-2 focus:ring-[#1ecad3]">

                            <option value="">Pilih Kabupaten/Kota</option>
                        </select>

                    </div>

                </div>

                <!-- ========================= -->
                <!-- INFORMASI KUNJUNGAN -->
                <!-- ========================= -->

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- TIPE KUNJUNGAN -->
                    <div>

                        <label class="block font-semibold text-[#1f2937] mb-2">
                            Tipe Kunjungan
                        </label>

                        <select name="tipe_kunjungan"
                                id="tipeKunjunganOffline"
                                required
                                class="w-full p-3 border border-gray-300 rounded-xl
                                    focus:ring-2 focus:ring-[#1ecad3]">

                            <option value="">Pilih tipe kunjungan</option>

                            <option value="individu">Individu</option>
                            <option value="rombongan">Rombongan</option>

                        </select>

                    </div>

                    <!-- JUMLAH PENGUNJUNG -->
                    <div>

                        <label class="block font-semibold text-[#1f2937] mb-2">
                            Jumlah Pengunjung
                        </label>

                        <input type="number"
                            name="jumlah_pengunjung"
                            id="jumlahPengunjungOffline"
                            min="1"
                            required
                            placeholder="Masukkan jumlah pengunjung"
                            class="w-full p-3 border border-gray-300 rounded-xl
                                    focus:ring-2 focus:ring-[#1ecad3]">

                    </div>

                </div>

                <!-- FREKUENSI -->
                <div>

                    <label class="block font-semibold text-[#1f2937] mb-2">
                        Frekuensi Kunjungan
                    </label>

                    <select name="frekuensi"
                            required
                            class="w-full p-3 border border-gray-300 rounded-xl
                                focus:ring-2 focus:ring-[#1ecad3]">

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
                            class="w-full sm:w-auto
                                px-10 py-3
                                bg-[#0f2a2c]
                                text-white
                                rounded-full font-semibold shadow-lg
                                hover:bg-transparent hover:text-[#0f2a2c]
                                hover:border-2 hover:border-[#0f2a2c]
                                transition">

                        Kirim Data

                    </button>

                </div>

            </form>
        </div>
    </div>
</div>

<!-- SCRIPT PROVINSI → KABUPATEN -->
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

    const provinsiEl = document.getElementById('provinsi-offline');
    const kabupatenEl = document.getElementById('kabupaten-offline');

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

<!-- SCRIPT -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    // =========================
    // ELEMENT
    // =========================
    const kategoriPengunjung =
        document.getElementById('kategoriPengunjungOffline');

    const instansiField =
        document.getElementById('instansiFieldOffline');

    const tipeKunjungan =
        document.getElementById('tipeKunjunganOffline');

    const jumlahPengunjung =
        document.getElementById('jumlahPengunjungOffline');

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
    // AUTO JUMLAH PENGUNJUNG
    // =========================
    tipeKunjungan.addEventListener('change', function () {

        // INDIVIDU
        if (this.value === 'individu') {

            jumlahPengunjung.value = 1;

            jumlahPengunjung.setAttribute('readonly', true);

        }

        // ROMBONGAN
        else if (this.value === 'rombongan') {

            jumlahPengunjung.value = '';

            jumlahPengunjung.removeAttribute('readonly');

        }

        // DEFAULT
        else {

            jumlahPengunjung.value = '';

            jumlahPengunjung.removeAttribute('readonly');

        }

    });

});
</script>

@endpush

</section>
</x-app-layout>