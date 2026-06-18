<x-app-layout>

<section class="py-16 md:py-20 bg-[#f3f4f1] min-h-screen overflow-x-hidden">
    <x-step-indicator step="2" />

    <div class="max-w-6xl mx-auto px-4 md:px-6">

        <!-- STEP INDICATOR -->
        <div class="mb-14 text-center">
            <p class="text-sm text-gray-500 mb-2">
                Langkah 2 dari 3
            </p>

            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-[#1f2937]">
                Konfirmasi & Pembayaran
            </h2>
        </div>

        <div class="grid lg:grid-cols-3 gap-10">

            <!-- ================= KIRI — DETAIL ================= -->
            <div class="lg:col-span-2 bg-white rounded-3xl shadow-lg p-5 md:p-8">

                <h3 class="text-2xl font-bold text-[#0f2a2c] mb-6">
                    Detail Kunjungan
                </h3>

                <div class="space-y-4 text-gray-700">

                    <div class="flex flex-col sm:flex-row sm:justify-between gap-1 sm:gap-4">
                        <span>Nama Pengunjung</span>
                        <span class="font-semibold">{{ $ticket->nama }}</span>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:justify-between gap-1 sm:gap-4">
                        <span>Kategori</span>
                        <span class="font-semibold">
                            {{ ucfirst($ticket->kategori) }}
                        </span>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:justify-between gap-1 sm:gap-4">
                        <span>Jumlah Tiket</span>
                        <span class="font-semibold">
                            {{ $ticket->jumlah_tiket }} Orang
                        </span>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:justify-between gap-1 sm:gap-4">
                        <span>Tanggal Kunjungan</span>
                        <span class="font-semibold">
                            {{ \Carbon\Carbon::parse($ticket->tanggal_kunjungan)->format('d M Y') }}
                        </span>
                    </div>

                </div>

                <!-- INFO BOX -->
                <div class="mt-8 bg-[#f3f4f1] p-5 rounded-xl text-sm text-gray-600">
                    Tiket yang telah dibayar tidak dapat dibatalkan.
                    Pastikan data kunjungan sudah benar sebelum melanjutkan pembayaran.
                </div>

            </div>

            <!-- ================= KANAN — RINGKASAN ================= -->
            <div class="bg-white rounded-3xl shadow-lg p-5 md:p-8 h-fit">

                <h3 class="text-xl font-bold text-[#0f2a2c] mb-6">
                    Ringkasan Pembayaran
                </h3>

                <div class="space-y-4 text-gray-700 text-sm">

                    <div class="flex justify-between items-center gap-4">
                        <span>Harga per Tiket</span>
                        <span>Rp{{ number_format($harga, 0, ',', '.') }}</span>
                    </div>

                    <div class="flex justify-between items-center gap-4">
                        <span>Jumlah Tiket</span>
                        <span>{{ $ticket->jumlah_tiket }}</span>
                    </div>

                    <hr>

                    <div class="flex justify-between items-center gap-4 text-lg font-bold text-[#0f2a2c]">
                        <span>Total Pembayaran</span>
                        <span>Rp{{ number_format($total, 0, ',', '.') }}</span>
                    </div>

                </div>

                <!-- BUTTON -->
                <button id="pay-button"
                        class="mt-8 w-full py-3
                               bg-[#0f2a2c]
                               text-white
                               font-semibold
                               rounded-full
                               shadow-lg
                               border-2 border-transparent

                               hover:bg-transparent
                               hover:text-[#0f2a2c]
                               hover:border-[#0f2a2c]

                               transition duration-300">

                    Bayar Sekarang

                </button>

                <p class="text-xs text-gray-500 mt-4 text-center">
                    Pembayaran diproses melalui Midtrans.
                </p>

            </div>

        </div>

    </div>

</section>

<!-- MIDTRANS -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}">
</script>

<script>
document.getElementById('pay-button').onclick = function () {
    snap.pay('{{ $snapToken }}', {
        onSuccess: function(result){
            window.location.href = "/tiket/success";
        }
    });
};
</script>

</x-app-layout>