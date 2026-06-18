<x-app-layout>

<section class="py-8 md:py-10 bg-[#f8fafc] min-h-screen overflow-x-hidden">

    {{-- STEP INDICATOR --}}
    @if($ticket->jenis_tiket === 'online')
        <x-step-indicator step="3"
            label1="Isi Data"
            label2="Pembayaran"
            label3="E-Ticket" />
    @else
        <x-step-indicator step="2"
            label1="Isi Data"
            label2="Validasi"
            label3="Masuk" />
    @endif

    <div class="max-w-xl mx-auto my-8 md:my-12 px-4 md:px-6">

        <!-- CARD -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

            <!-- HEADER -->
            <div class="bg-[#0f2a2c] text-white px-5 md:px-8 py-6">

                <div class="flex justify-between items-start">

                    <!-- LEFT -->
                    <div>

                        <p class="text-[11px]
                                uppercase
                                tracking-[0.25em]
                                text-white/45 mb-3">

                            Museum Semedo

                        </p>

                        <h1 class="text-2xl sm:text-3xl
                            font-bold
                            tracking-tight
                            leading-tight">

                            @if($ticket->jenis_tiket === 'online')
                                Pembayaran Berhasil
                            @else
                                Data Berhasil Dikirim
                            @endif

                        </h1>

                        <p class="mt-3
                                text-sm
                                text-white/70
                                leading-relaxed
                                max-w-md">

                            @if($ticket->jenis_tiket === 'online')
                                E-ticket berhasil dibuat dan siap digunakan
                                saat kunjungan museum.
                            @else
                                Data kunjungan berhasil dicatat dan siap
                                diverifikasi petugas museum.
                            @endif

                        </p>

                    </div>

                </div>

            </div>

            <!-- BODY -->
            <div class="p-5 md:p-8">

                <!-- TOP -->
                <div class="flex flex-col sm:flex-row
                    justify-between
                    items-start sm:items-center
                    gap-3
                    mb-8">

                    <!-- LEFT -->
                    <div class="text-sm text-gray-500">

                        Ticket ID

                        <span class="font-semibold text-[#1f2937] ml-1">
                            #{{ $ticket->id }}
                        </span>

                    </div>

                    <!-- RIGHT -->
                    @if($ticket->jenis_tiket === 'online')

                        <span class="px-4 py-1 rounded-full
                                    bg-green-100 text-green-700
                                    text-xs font-semibold">

                            Status: {{ strtoupper($ticket->payment_status) }}

                        </span>

                    @else

                        <span class="px-4 py-1 rounded-full
                                    bg-yellow-100 text-yellow-700
                                    text-xs font-semibold">

                            MENUNGGU VALIDASI

                        </span>

                    @endif

                </div>

                <!-- INFO -->
                <div class="grid grid-cols-1 sm:grid-cols-2
                    gap-y-7 gap-x-12
                    mb-10 text-sm">

                    <!-- NAMA -->
                    <div>

                        <p class="text-gray-500 mb-1">
                            Nama Pengunjung
                        </p>

                        <p class="font-semibold text-base md:text-lg
                            text-[#1f2937]
                            break-words">

                            {{ $ticket->nama }}

                        </p>

                    </div>

                    <!-- JENIS -->
                    <div>

                        <p class="text-gray-500 mb-1">
                            Jenis Tiket
                        </p>

                        <p class="font-semibold capitalize text-[#1f2937]">

                            {{ $ticket->jenis_tiket }}

                        </p>

                    </div>

                    <!-- TANGGAL -->
                    <div>

                        <p class="text-gray-500 mb-1">
                            Tanggal Kunjungan
                        </p>

                        <p class="font-semibold text-[#1f2937]">

                            {{ \Carbon\Carbon::parse($ticket->tanggal_kunjungan)->format('d M Y') }}

                        </p>

                    </div>

                    <!-- JUMLAH -->
                    <div>

                        <p class="text-gray-500 mb-1">
                            Jumlah Pengunjung
                        </p>

                        <p class="font-semibold text-[#1f2937]">

                            {{ $ticket->jumlah_pengunjung }} Orang

                        </p>

                    </div>

                </div>

                <!-- QR -->
                <div class="text-center">

                    <div class="inline-block p-4 md:p-6 bg-[#f3f4f1] rounded-2xl shadow-inner">

                        {!! QrCode::size(240)->generate($ticket->hash) !!}

                    </div>

                    <p class="text-xs text-gray-400 mt-3 break-all">

                        Kode Verifikasi:
                        {{ $ticket->hash }}

                    </p>

                </div>

                <!-- INFO -->
                <div class="mt-8 bg-[#f3f4f1] rounded-xl p-4 text-sm text-gray-700 text-center leading-relaxed">

                    @if($ticket->jenis_tiket === 'online')
                        Tunjukkan QR Code ini kepada petugas sebelum memasuki museum.
                    @else
                        Silakan menuju area validasi untuk proses pemeriksaan tiket oleh petugas museum.
                    @endif

                </div>

                <!-- BUTTON -->
                <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">

                    @if($ticket->jenis_tiket === 'online')

                        <a href="{{ route('tiket.show', $ticket->id) }}"
                        class="w-full sm:w-auto
                                inline-flex items-center justify-center gap-2
                                px-8 py-3
                                rounded-full
                                bg-[#0f2a2c]
                                text-white
                                font-semibold
                                shadow-md
                                transition duration-300

                                hover:bg-[#12383b]
                                hover:scale-[1.02]">

                            Lihat E-Ticket

                        </a>

                    @else

                        <a href="{{ url('/') }}"
                        class="w-full sm:w-auto
                                inline-flex items-center justify-center gap-2
                                px-8 py-3
                                rounded-full
                                bg-[#0f2a2c]
                                text-white
                                font-semibold
                                shadow-md
                                transition duration-300

                                hover:bg-[#12383b]
                                hover:scale-[1.02]">

                            Kembali ke Beranda

                        </a>

                    @endif

                </div>

            </div>

        </div>

    </div>

</section>

</x-app-layout>