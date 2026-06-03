<x-app-layout>
<style>
@media print {
    nav, .no-print, .footer, .bg-white/20, .backdrop-blur-xl {
        display: none !important;
    }

    body {
        background: white !important;
    }

    .print-area {
        margin: 0 !important;
        padding: 0 !important;
        box-shadow: none !important;
    }
}
</style>

<div class="max-w-xl mx-auto my-12 px-6">

    @if (!isset($ticket))

        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6 rounded-xl shadow">
            <p class="text-yellow-700 font-semibold">
                Tiket tidak ditemukan.
            </p>

            <a href="{{ url('/tiket') }}"
               class="inline-block mt-4 px-5 py-2 bg-[#0f2a2c] text-white rounded-lg">
                Kembali ke Pilihan Tiket
            </a>
        </div>

    @else

        <!-- CARD TIKET PREMIUM -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden print-area">

            <!-- HEADER -->
            <div class="bg-[#0f2a2c] text-white px-8 py-6 flex justify-between items-center">

                <div>
                    <h2 class="text-xl font-bold">Museum Semedo</h2>
                    <p class="text-white/80 text-sm">E-Ticket Kunjungan</p>
                </div>

                <div class="text-right text-xs text-white/80">
                    ID Tiket<br>
                    <span class="font-semibold text-white">
                        {{ strtoupper(substr($ticket->hash,0,10)) }}
                    </span>
                </div>

            </div>

            <!-- BODY -->
            <div class="p-8">

                <!-- STATUS BADGE -->
                <div class="flex justify-between items-center mb-6">

                    <div class="text-sm text-gray-500">
                        Berlaku pada:
                        <span class="font-semibold text-[#1f2937]">
                            {{ \Carbon\Carbon::parse($ticket->tanggal_kunjungan)->format('d M Y') }}
                        </span>
                    </div>

                    @if($ticket->status == 'unused')
                        <span class="px-4 py-1 rounded-full
                                    bg-yellow-100 text-yellow-700
                                    text-xs font-semibold">
                            Belum Digunakan
                        </span>
                    @else
                        <span class="px-4 py-1 rounded-full
                                    bg-green-100 text-green-700
                                    text-xs font-semibold">
                            Sudah Digunakan
                        </span>
                    @endif

                </div>

                <!-- INFO UTAMA -->
                <div class="grid grid-cols-2 gap-6 mb-8 text-sm">

                    <div>
                        <p class="text-gray-500">Nama Pengunjung</p>
                        <p class="font-semibold text-lg text-[#1f2937]">
                            {{ $ticket->nama }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500">Jenis Tiket</p>
                        <p class="font-semibold capitalize">
                            {{ $ticket->jenis_tiket }}
                        </p>
                    </div>

                </div>

                <!-- QR BESAR -->
                <div class="text-center">

                    <div class="inline-block p-6 bg-[#f3f4f1] rounded-2xl shadow-inner">
                        {!! QrCode::size(240)->generate($ticket->hash) !!}
                    </div>

                    <p class="text-xs text-gray-400 mt-3">
                        Kode Verifikasi: {{ $ticket->hash }}
                    </p>

                </div>

                <!-- INSTRUKSI -->
                <div class="mt-8 bg-[#f3f4f1] rounded-xl p-4 text-sm text-gray-700 text-center">

                    Tunjukkan tiket ini kepada petugas di pintu masuk.
                    Screenshot atau cetak tiket sebelum berkunjung.

                </div>

            </div>

            <!-- FOOTER -->
            <div class="px-8 pb-8 flex justify-center gap-4 no-print">
                <a href="{{ url('/') }}"
                class="inline-flex items-center gap-2
                        px-6 py-2
                        rounded-full
                        border border-[#0f2a2c]
                        text-[#0f2a2c]
                        font-semibold
                        transition-all duration-300

                        hover:bg-[#0f2a2c]
                        hover:text-white
                        hover:shadow-md">

                    Kembali
                </a>

                <button onclick="window.print()"
                        class="inline-block px-8 py-3
                                bg-[#0f2a2c] text-white
                                rounded-full
                                border border-[#0f2a2c]
                                font-semibold
                                shadow-md
                                transition duration-300

                                hover:bg-white
                                hover:text-[#0f2a2c]
                                hover:border-[#0f2a2c]">
                    Cetak
                </button>

            </div>
        @endif
        </div>

</x-app-layout>