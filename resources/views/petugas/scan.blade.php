<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Scan Tiket</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
</head>
<body class="bg-[#f4f7f6] text-gray-800">

<div class="min-h-screen px-6 py-6">

    <!-- HEADER -->
    <div class="mb-8">

        <div class="flex flex-col lg:flex-row
            lg:items-center lg:justify-between
            gap-5">

            <!-- LEFT -->
            <div>

                <div class="inline-flex items-center gap-2
                    px-4 py-2 rounded-full
                    bg-[#0f766e]/10
                    text-[#0f766e]
                    text-sm font-medium mb-4">

                    <i data-lucide="shield-check"
                        class="w-4 h-4">
                    </i>

                    Validation System

                </div>

                <h1 class="text-3xl font-bold text-[#0f172a]">

                    Scan Validasi Tiket

                </h1>

                <p class="mt-2 text-gray-500">

                    Sistem validasi tiket pengunjung Museum Semedo
                    secara realtime menggunakan QR Code.

                </p>

            </div>

            <!-- RIGHT -->
            <div class="flex items-center gap-4">

                <!-- LOGOUT -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        class="inline-flex items-center gap-2
                        px-5 py-2.5 rounded-xl
                        border border-gray-200
                        bg-white text-gray-700
                        text-sm font-medium
                        hover:bg-gray-50
                        transition">

                        <i data-lucide="log-out"
                            class="w-4 h-4">
                        </i>

                        Logout

                    </button>

                </form>

                <!-- Pengaturan Akun -->
                <a href="{{ route('profile.edit') }}"
                    class="hidden md:flex items-center gap-3
                    px-4 py-2 rounded-xl
                    bg-white border border-gray-200
                    hover:bg-gray-50 transition">

                    <div class="w-8 h-8 rounded-full
                        bg-cyan-100 text-cyan-700
                        flex items-center justify-center
                        font-semibold">

                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                    </div>

                    <div class="text-left">

                        <p class="text-sm font-medium text-gray-800">
                            {{ Auth::user()->name }}
                        </p>

                        <p class="text-xs text-gray-500">
                            Pengaturan Akun
                        </p>

                    </div>

                </a>

            </div>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- KAMERA -->
        <div class="lg:col-span-2
            bg-white rounded-[32px]
            shadow-sm border border-gray-100
            p-6 lg:p-8">

            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-xl font-semibold text-[#0f172a]">
                        Kamera Scanner
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Arahkan QR Code tiket ke area scanner
                    </p>
                </div>

                <div class="hidden md:flex items-center gap-2
                    px-3 py-2 rounded-full
                    bg-[#0f766e]/10
                    text-[#0f766e]
                    text-sm font-medium">

                    <i data-lucide="scan-line"
                        class="w-4 h-4">
                    </i>

                    QR Ready

                </div>
            </div>

            <div class="relative
                rounded-[28px]
                overflow-hidden
                border border-gray-200
                bg-[#f8fafc] p-4">

                <!-- SCAN AREA -->
                <div id="reader"
                    class="w-full h-[360px]
                    rounded-2xl overflow-hidden">
                </div>

                <!-- CORNER -->
                <div class="absolute top-8 left-8
                    w-10 h-10
                    border-t-4 border-l-4
                    border-[#0f766e]
                    rounded-tl-xl">
                </div>

                <div class="absolute top-8 right-8
                    w-10 h-10
                    border-t-4 border-r-4
                    border-[#0f766e]
                    rounded-tr-xl">
                </div>

                <div class="absolute bottom-8 left-8
                    w-10 h-10
                    border-b-4 border-l-4
                    border-[#0f766e]
                    rounded-bl-xl">
                </div>

                <div class="absolute bottom-8 right-8
                    w-10 h-10
                    border-b-4 border-r-4
                    border-[#0f766e]
                    rounded-br-xl">
                </div>

            </div>

            <div class="mt-5">

                <button
                    onclick="startScanner()"
                    class="w-full flex items-center justify-center gap-2
                        bg-[#0f766e]
                        hover:bg-[#0d5f59]
                        text-white
                        py-3.5
                        rounded-2xl
                        font-semibold
                        text-sm
                        shadow-sm
                        hover:shadow-md
                        transition-all duration-300">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 7V5a1 1 0 011-1h2m10 0h2a1 1 0 011 1v2m0 10v2a1 1 0 01-1 1h-2m-10 0H5a1 1 0 01-1-1v-2m4-8h8" />
                    </svg>

                    Mulai Scan

                </button>

            </div>
</div>

        <!-- HASIL -->
        <div class="bg-white rounded-xl shadow-sm border p-5">

            <h2 class="text-lg font-medium text-gray-700 mb-4">Hasil Validasi</h2>

            <div class="space-y-3 text-sm text-gray-600">
                <div class="flex justify-between">
                    <span>Nama</span>
                    <span id="res-nama" class="text-gray-800 font-medium">-</span>
                </div>
                <div class="flex justify-between">
                    <span>Tiket</span>
                    <span id="res-tiket" class="text-gray-800 font-medium">-</span>
                </div>
                <div class="flex justify-between">
                    <span>Status</span>
                    <span id="res-status" class="font-medium">-</span>
                </div>
                <div class="flex justify-between">
                    <span>Tanggal</span>
                    <span id="res-tanggal" class="text-gray-800 font-medium">-</span>
                </div>
            </div>

            <div id="res-box"
                class="mt-5 rounded-2xl border border-gray-200
                bg-[#f8fafc] p-6 text-center transition-all duration-300">

                <!-- ICON -->
                <div id="res-icon"
                    class="w-14 h-14 mx-auto rounded-full
                    bg-gray-200 flex items-center justify-center
                    text-gray-500">

                    <i data-lucide="scan-line"
                        class="w-6 h-6">
                    </i>

                </div>

                <!-- STATUS -->
                <h3 id="res-title"
                    class="mt-4 text-lg font-semibold text-gray-700">

                    Belum Ada Scan

                </h3>

                <!-- DESKRIPSI -->
                <p id="res-desc"
                    class="mt-1 text-sm text-gray-500">

                    Silakan scan QR tiket pengunjung

                </p>

            </div>

        </div>

    </div>

    <div class="flex justify-between items-start mt-6 mb-6">
           
        <!-- CARD -->
        <div class="w-[200px]">

            <div class="bg-emerald-50
                border border-emerald-100
                rounded-2xl
                p-4">

                <p class="text-xs font-medium text-gray-600">
                    Tiket Tervalidasi
                </p>

                <h2 class="text-3xl font-bold text-emerald-700 mt-2">
                    {{ $totalValidasi }}
                </h2>

                <p class="text-xs text-emerald-700 mt-2">
                    Total aktivitas scan
                </p>

            </div>

        </div>

        <!-- FILTER -->
        <div class="bg-white
            border border-gray-200
            rounded-2xl
            px-4 py-4
            shadow-sm
            inline-block">

            <div class="mb-3">

                <h3 class="text-sm font-semibold text-gray-800">
                    Periode Scan
                </h3>

            </div>

            <form method="GET">

                <div class="flex flex-wrap items-end gap-3">

                    <div>

                        <label class="block text-xs text-gray-500 mb-1">
                            Tanggal
                        </label>

                        <input
                            type="date"
                            name="date"
                            value="{{ $date }}"
                            class="border border-gray-200
                            rounded-lg
                            px-3 py-2
                            text-sm
                            focus:ring-0
                            focus:border-[#0f766e]">

                    </div>

                    <button
                        type="submit"
                        class="inline-flex items-center gap-2
                        px-4 py-2
                        rounded-lg
                        bg-[#062b30]
                        text-white
                        text-sm font-medium
                        hover:bg-[#041f23]
                        transition">

                        <i data-lucide="filter"
                            class="w-4 h-4"></i>

                        Terapkan

                    </button>

                    <a
                        href="/scan"
                        class="inline-flex items-center gap-2
                        px-4 py-2
                        rounded-lg
                        border border-gray-300
                        text-gray-700
                        text-sm font-medium
                        hover:bg-gray-100">

                        <i data-lucide="rotate-ccw"
                            class="w-4 h-4"></i>

                        Reset

                    </a>

                </div>

            </form>

        </div>

    </div>

    <!-- LOG -->
    <div class="mt-6 bg-white rounded-xl shadow-sm border p-5">

        <div class="mb-4">

            <h2 class="text-lg font-semibold text-gray-900">
                Riwayat Scan Tiket
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Aktivitas validasi tiket pengunjung
            </p>

        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50
                    text-gray-500
                    text-xs
                    uppercase">

                <tr>

                    <th class="px-4 py-3 text-left">
                        Tanggal
                    </th>

                    <th class="px-4 py-3 text-left">
                        Nama
                    </th>

                    <th class="px-4 py-3 text-left">
                        Tiket
                    </th>

                    <th class="px-4 py-3 text-left">
                        Waktu
                    </th>

                    <th class="px-4 py-3 text-left">
                        Status
                    </th>

                </tr>
                </thead>
                <tbody id="log-body">

                    @forelse($validations as $validation)
                        <tr class="border-b">

                            <td class="px-4 py-3">
                                {{ \Carbon\Carbon::parse($validation->scanned_at)->format('d M Y') }}
                            </td>
                            
                            <td class="px-4 py-3">
                                {{ $validation->ticket?->nama ?? '-' }}
                            </td>

                            <td class="px-4 py-3">
                                {{ ucfirst($validation->ticket?->jenis_tiket ?? '-') }}
                            </td>

                            <td class="px-4 py-3">
                                {{ \Carbon\Carbon::parse($validation->scanned_at)->format('H:i:s') }}
                            </td>

                            <td class="px-4 py-3">

                                <span class="px-2 py-1 text-xs rounded-full

                                {{ $validation->status == 'valid'
                                    ? 'bg-green-100 text-green-700'
                                    : ($validation->status == 'duplicate'
                                        ? 'bg-yellow-100 text-yellow-700'
                                        : 'bg-red-100 text-red-700') }}">

                                    {{ ucfirst($validation->status) }}

                                </span>

                            </td>

                        </tr>
                    @empty
                        <tr>

                            <td colspan="5" class="py-12">

                                <div class="max-w-md mx-auto text-center">

                                    <i data-lucide="scan-search"
                                        class="w-10 h-10 text-gray-300 mx-auto mb-4">
                                    </i>

                                    <h3 class="text-lg font-semibold text-gray-900">

                                        Belum Ada Aktivitas Scan

                                    </h3>

                                    <p class="mt-2 text-sm text-gray-500">

                                        Tidak ditemukan riwayat scan
                                        pada periode yang dipilih.

                                    </p>

                                </div>

                            </td>

                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        <!-- PAGINATION -->
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $validations->links() }}
        </div>

    </div>

</div>

<!-- AUDIO -->
<audio id="sound-success">
    <source src="https://assets.mixkit.co/active_storage/sfx/2869/2869-preview.mp3" type="audio/mpeg">
</audio>

<audio id="sound-error">
    <source src="https://assets.mixkit.co/active_storage/sfx/2870/2870-preview.mp3" type="audio/mpeg">
</audio>

<script>
let scanner;

// ============================
// START SCANNER
// ============================
function startScanner() {

    if (scanner) {

        scanner.stop()
        .then(() => {

            scanner.clear();

        })
        .catch(() => {});

    }

    scanner = new Html5Qrcode("reader");

    scanner.start(

        {
            facingMode: "environment"
        },

        {
            fps: 10,

            qrbox: function(viewfinderWidth, viewfinderHeight) {

                const minEdge =
                    Math.min(viewfinderWidth, viewfinderHeight);

                return {
                    width: minEdge * 0.75,
                    height: minEdge * 0.75
                };
            }
        },

        function(decodedText) {

            scanner.stop()
            .then(() => {

                validateTicket(decodedText);

            });

        },

        function(errorMessage) {

            // abaikan error scan
        }

    )
    .catch(err => {

        console.error(err);

        alert(
            "Tidak dapat mengakses kamera. Pastikan izin kamera telah diberikan."
        );

    });
}

// ============================
// HIT API
// ============================
function validateTicket(hash) {

    // LOADING STATE
    let box = document.getElementById('res-box');
    let icon = document.getElementById('res-icon');
    let title = document.getElementById('res-title');
    let desc = document.getElementById('res-desc');

    box.className =
        "mt-5 rounded-2xl border border-cyan-200 bg-cyan-50 p-6 text-center transition-all duration-300";

    icon.className =
        "w-14 h-14 mx-auto rounded-full bg-cyan-100 flex items-center justify-center text-2xl text-cyan-700";

    icon.innerHTML = `
        <i data-lucide="loader-circle"
        class="w-6 h-6 animate-spin">
        </i>
    `;

    lucide.createIcons();

    title.innerText = "Memvalidasi Tiket...";
    title.className = "mt-4 text-lg font-semibold text-cyan-700";

    desc.innerText = "Mohon tunggu sebentar";

    fetch('/validate-ticket', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ hash: hash })
    })
    .then(async res => {

        console.log("STATUS:", res.status);

        const text = await res.text();

        console.log("RESPONSE:", text);

        return JSON.parse(text);
    })
    .then(data => {

        showResult(data);
        addLog(data);

        setTimeout(() => {
            startScanner();
        }, 2500);

    })
    .catch(error => {

        console.error("VALIDATION ERROR:", error);

        alert("Terjadi kesalahan saat validasi tiket");

    });
}

// ============================
// TAMPILKAN HASIL
// ============================
function showResult(data) {

    document.getElementById('res-nama').innerText =
        data.nama ?? '-';

    document.getElementById('res-tiket').innerText =
        data.tiket ?? '-';

    document.getElementById('res-tanggal').innerText =
        data.tanggal ?? '-';

    let box = document.getElementById('res-box');
    let icon = document.getElementById('res-icon');
    let title = document.getElementById('res-title');
    let desc = document.getElementById('res-desc');

    // =========================
    // VALID
    // =========================
    if (data.status === 'valid') {

        if (navigator.vibrate) {
            navigator.vibrate(300);
        }

        document.getElementById('sound-success').play();
        document.getElementById('res-status').innerText = 'VALID';
        document.getElementById('res-status').className =
            'font-semibold text-green-600';

        box.className =
            "mt-5 rounded-2xl border border-green-200 bg-green-50 p-6 text-center transition-all duration-300";

        icon.className =
            "w-14 h-14 mx-auto rounded-full bg-green-100 flex items-center justify-center text-2xl text-green-700";

        icon.innerHTML = `
            <i data-lucide="badge-check"
            class="w-6 h-6">
            </i>
        `;

        lucide.createIcons();

        title.innerText = "Tiket Valid";
        title.className =
            "mt-4 text-lg font-semibold text-green-700";

        desc.innerText =
            "Pengunjung dapat masuk";

    }

    // =========================
    // DUPLICATE
    // =========================
    else if (data.status === 'duplicate') {
        
        document.getElementById('sound-error').play();
        document.getElementById('res-status').innerText = 'DIGUNAKAN';
        document.getElementById('res-status').className =
            'font-semibold text-yellow-600';

        box.className =
            "mt-5 rounded-2xl border border-yellow-200 bg-yellow-50 p-6 text-center transition-all duration-300";

        icon.className =
            "w-14 h-14 mx-auto rounded-full bg-yellow-100 flex items-center justify-center text-2xl text-yellow-700";

        icon.innerHTML = `
            <i data-lucide="alert-triangle"
            class="w-6 h-6">
            </i>
        `;

        lucide.createIcons();

        title.innerText = "Sudah Digunakan";
        title.className =
            "mt-4 text-lg font-semibold text-yellow-700";

        desc.innerText =
            "Tiket sudah pernah digunakan";

    }

    // =========================
    // INVALID
    // =========================
    else {

        document.getElementById('sound-error').play();
        document.getElementById('res-status').innerText = 'INVALID';
        document.getElementById('res-status').className =
            'font-semibold text-red-600';

        box.className =
            "mt-5 rounded-2xl border border-red-200 bg-red-50 p-6 text-center transition-all duration-300";

        icon.className =
            "w-14 h-14 mx-auto rounded-full bg-red-100 flex items-center justify-center text-2xl text-red-700";

        icon.innerHTML = `
            <i data-lucide="x-circle"
            class="w-6 h-6">
            </i>
        `;

        lucide.createIcons();

        title.innerText = "Tiket Tidak Valid";
        title.className =
            "mt-4 text-lg font-semibold text-red-700";

        desc.innerText =
            "QR tidak dikenali sistem";

    }
    
    // AUTO RESET
    setTimeout(() => {

        document.getElementById('res-status').innerText = '-';
        document.getElementById('res-status').className =
            'font-medium text-gray-500';

        box.className =
            "mt-5 rounded-2xl border border-gray-200 bg-[#f8fafc] p-6 text-center transition-all duration-300";

        icon.className =
            "w-14 h-14 mx-auto rounded-full bg-gray-200 flex items-center justify-center text-gray-500";

        icon.innerHTML = `
            <i data-lucide="scan-line"
                class="w-6 h-6">
            </i>
        `;

        title.innerText = "Siap Melakukan Scan";
        title.className =
            "mt-4 text-lg font-semibold text-gray-700";

        desc.innerText =
            "Arahkan QR Code tiket ke kamera";

        lucide.createIcons();

    }, 8000);
}

// ============================
// TAMBAH LOG
// ============================
function addLog(data) {

    let tbody = document.getElementById('log-body');

    let firstRow = tbody.querySelector('tr');

    if (firstRow && firstRow.innerText.includes('Belum ada')) {
        tbody.innerHTML = '';
    }

    let row = `
        <tr class="border-t">
            <td class="py-2">${data.nama ?? '-'}</td>
            <td>${data.tiket ?? '-'}</td>
            <td>${new Date().toLocaleTimeString()}</td>
            <td class="font-medium">${data.status}</td>
        </tr>
    `;

    tbody.insertAdjacentHTML('afterbegin', row);
}

</script>

<script src="https://unpkg.com/lucide@latest"></script>

<script>
    lucide.createIcons();
</script>

</body>
</html>