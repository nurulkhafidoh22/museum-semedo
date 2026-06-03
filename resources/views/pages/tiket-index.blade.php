<x-app-layout>

<section class="relative overflow-hidden min-h-screen bg-gradient-to-br
    from-[#f8fafc]
    via-[#f3f4f1]
    to-[#eef6f7]">

<!-- ORNAMEN -->
<div class="absolute top-0 left-0 w-96 h-96
    bg-cyan-200/20 blur-3xl rounded-full">
</div>

<div class="absolute bottom-0 right-0 w-96 h-96
    bg-emerald-200/20 blur-3xl rounded-full">
</div>

<div class="relative max-w-6xl mx-auto px-6 py-24">

    <!-- HEADER -->
    <div class="text-center">

        <span class="inline-flex items-center
            px-4 py-2 rounded-full
            bg-[#0f766e]/10
            text-[#0f766e]
            text-sm font-medium">

            Museum Semedo

        </span>

        <h1 class="mt-6
            text-3xl md:text-4xl
            font-bold text-[#0f2a2c]
            leading-tight">

            Pilih Metode
            Pemesanan Tiket

        </h1>

        <p class="mt-6 max-w-2xl mx-auto
            text-gray-500 leading-8">

            Tiket kunjungan tersedia secara online
            maupun langsung di lokasi museum.
            Pilih metode yang paling sesuai untuk
            kebutuhan kunjungan Anda.

        </p>

    </div>

    <!-- GRID -->
    <div class="grid gap-8 lg:grid-cols-2 mt-16">

        <!-- ONLINE -->
        <div class="group relative bg-white rounded-3xl
            border border-gray-100
            shadow-lg shadow-slate-100
            hover:-translate-y-2
            hover:shadow-2xl
            transition-all duration-300
            p-8 overflow-hidden">

            <h3 class="text-2xl font-semibold text-[#0f2a2c]">
                Tiket Online
            </h3>

            <p class="mt-3 text-gray-500 text-sm leading-7 text-justify">
                Pembelian tiket secara online disertai pengisian data
                demografis pengunjung melalui website. Setelah data
                lengkap, sistem akan menghasilkan QR Code yang
                digunakan untuk proses validasi kunjungan.
            </p>

            <div class="mt-6 space-y-3">

                <div class="flex items-center gap-3 text-sm text-gray-700">
                    <div class="w-2 h-2 rounded-full bg-cyan-500"></div>
                    Pembelian tiket melalui website
                </div>

                <div class="flex items-center gap-3 text-sm text-gray-700">
                    <div class="w-2 h-2 rounded-full bg-cyan-500"></div>
                    Pengisian data demografis pengunjung
                </div>

                <div class="flex items-center gap-3 text-sm text-gray-700">
                    <div class="w-2 h-2 rounded-full bg-cyan-500"></div>
                    QR Code untuk validasi kunjungan
                </div>

            </div>

            <a href="{{ url('/tiket/online') }}"
                class="mt-8 w-full inline-flex
                items-center justify-center
                px-5 py-3 rounded-xl
                bg-[#062b30]
                text-white font-medium
                hover:bg-[#0f766e]
                transition">

                Pesan Tiket Online

            </a>

        </div>

        <!-- OFFLINE -->
        <div class="group relative bg-white rounded-3xl
            border border-gray-100
            shadow-lg shadow-slate-100
            hover:-translate-y-2
            hover:shadow-2xl
            transition-all duration-300
            p-8 overflow-hidden">

            <h3 class="text-2xl font-semibold text-[#0f2a2c]">
                Tiket Offline
            </h3>

            <p class="mt-3 text-gray-500 text-sm leading-7 text-justify">
                Tiket dibeli langsung di loket museum.
                Setelah pembelian, pengunjung tetap perlu
                mengisi data demografis melalui website
                untuk memperoleh QR Code validasi kunjungan.
            </p>

            <div class="mt-6 space-y-3">

                <div class="flex items-center gap-3 text-sm text-gray-700">
                    <div class="w-2 h-2 rounded-full bg-gray-500"></div>
                    Pembelian tiket di loket museum
                </div>

                <div class="flex items-center gap-3 text-sm text-gray-700">
                    <div class="w-2 h-2 rounded-full bg-gray-500"></div>
                    Pengisian data demografis secara mandiri
                </div>

                <div class="flex items-center gap-3 text-sm text-gray-700">
                    <div class="w-2 h-2 rounded-full bg-gray-500"></div>
                    QR Code untuk validasi kunjungan
                </div>

            </div>

            <a href="{{ url('/tiket/offline') }}"
                class="mt-8 w-full inline-flex
                items-center justify-center
                px-5 py-3 rounded-xl
                border border-gray-300
                bg-white text-gray-700
                font-medium
                hover:bg-gray-50
                transition">

                Pilih Tiket Offline

            </a>

        </div>

    </div>

</div>

</section>

</x-app-layout>