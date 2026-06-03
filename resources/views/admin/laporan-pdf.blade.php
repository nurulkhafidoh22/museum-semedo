<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Laporan Analitik Pengunjung Museum Semedo</title>

<style>

body{
    font-family:"Times New Roman", serif;
    font-size:11px;
    color:#111827;
    line-height:1.5;
    margin:30px;
}

/* =========================================
HEADER
========================================= */

.header{
    margin-bottom:25px;
}

.header-table{
    width:100%;
    border-collapse:collapse;
}

.logo{
    width:110px;
    text-align:center;
    vertical-align:middle;
}

.header-center{
    text-align:center;
}

.instansi{
    font-size:18px;
    font-weight:bold;
}

.museum{
    font-size:24px;
    font-weight:bold;
    margin-top:4px;
}

.judul{
    font-size:18px;
    font-weight:bold;
    margin-top:8px;
    text-transform:uppercase;
}

.periode{
    margin-top:8px;
    font-size:13px;
}

.alamat{
    margin-top:5px;
    font-size:11px;
    color:#555;
}

.line-top{
    border-top:3px solid #000;
    margin-top:15px;
}

.line-bottom{
    border-top:1px solid #000;
    margin-top:2px;
}

/* =========================================
INFORMASI LAPORAN
========================================= */

.info-box{
    margin-top:15px;
    border:1px solid #d1d5db;
    background:#fafafa;
    padding:12px;
}

.info-table{
    width:100%;
    border-collapse:collapse;
}

.info-table td{
    border:none;
    padding:4px 0;
    font-size:11px;
}

/* =========================================
SECTION
========================================= */

.section{
    margin-top:24px;
}

.section-title{
    font-size:14px;
    font-weight:bold;
    margin-bottom:8px;
}

/* =========================================
SUMMARY CARD
========================================= */

.summary{
    margin-top:20px;
}

.summary-table{
    width:100%;
    border-collapse:separate;
    border-spacing:8px;
}

.summary-card{
    border:1px solid #d6dbe3;
    padding:12px;
    background:#fafcff;
}

.summary-label{
    font-size:10px;
    color:#6b7280;
}

.summary-value{
    margin-top:6px;
    font-size:22px;
    font-weight:bold;
}

.summary-desc{
    margin-top:6px;
    font-size:10px;
    color:#6b7280;
}

/* =========================================
INSIGHT
========================================= */

.insight-box{
    margin-top:15px;
    border-left:4px solid #0f766e;
    background:#f8fafc;
    padding:12px;
}

.insight-box p{
    margin:0;
    text-align:justify;
}

/* =========================================
TABLE GLOBAL
========================================= */

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#f3f4f6;
    border:1px solid #d1d5db;
    padding:8px;
    font-size:10px;
    text-transform:uppercase;
}

td{
    border:1px solid #d1d5db;
    padding:7px;
    font-size:10px;
}

.text-center{
    text-align:center;
}

.page-break{
    page-break-before:always;
}

thead{
    display:table-header-group;
}

tr{
    page-break-inside:avoid;
}

</style>

</head>

<body>

{{-- =========================================
HEADER
========================================= --}}

<div class="header">

    <table class="header-table">

        <tr>

            <td class="logo">

                <img src="{{ public_path('images/logo-login.png') }}"
                    style="width:90px;">

            </td>

            <td class="header-center">

                <div class="instansi">
                    PEMERINTAH KABUPATEN TEGAL
                </div>

                <div class="museum">
                    MUSEUM SEMEDO
                </div>

                <div class="judul">
                    LAPORAN ANALITIK PENGUNJUNG
                </div>

                <div class="periode">

                    Periode

                    {{ \Carbon\Carbon::parse($start)->format('d M Y') }}

                    -

                    {{ \Carbon\Carbon::parse($end)->format('d M Y') }}

                </div>

                <div class="alamat">

                    Jl. Raya Semedo, Kedungbanteng, Kabupaten Tegal

                </div>

            </td>

        </tr>

    </table>

    <div class="line-top"></div>
    <div class="line-bottom"></div>

</div>

{{-- =========================================
INFORMASI LAPORAN
========================================= --}}

<div class="info-box">

    <table class="info-table">

        <tr>
            <td width="150"><strong>Tanggal Cetak</strong></td>
            <td>: {{ now()->format('d M Y H:i') }}</td>
        </tr>

        <tr>
            <td><strong>Periode Laporan</strong></td>
            <td>: {{ $start }} s/d {{ $end }}</td>
        </tr>

        <tr>
            <td><strong>Total Data</strong></td>
            <td>: {{ $data->count() }} data pengunjung</td>
        </tr>

        <tr>
            <td><strong>Sumber Data</strong></td>
            <td>: Sistem Informasi Reservasi Museum Semedo</td>
        </tr>

    </table>

</div>

{{-- =========================================
RINGKASAN EKSEKUTIF
========================================= --}}

<div class="section">

    <div class="section-title">
        Ringkasan Eksekutif
    </div>

    <table class="summary-table">

        <tr>

            <td width="20%">

                <div class="summary-card">

                    <div class="summary-label">
                        Total Pengunjung
                    </div>

                    <div class="summary-value">
                        {{ $total }}
                    </div>

                    <div class="summary-desc">
                        Total kunjungan
                    </div>

                </div>

            </td>

            <td width="20%">

                <div class="summary-card">

                    <div class="summary-label">
                        Tiket Online
                    </div>

                    <div class="summary-value">
                        {{ $online }}
                    </div>

                    <div class="summary-desc">
                        Reservasi website
                    </div>

                </div>

            </td>

            <td width="20%">

                <div class="summary-card">

                    <div class="summary-label">
                        Tiket Offline
                    </div>

                    <div class="summary-value">
                        {{ $offline }}
                    </div>

                    <div class="summary-desc">
                        Pembelian langsung
                    </div>

                </div>

            </td>

            <td width="20%">

                <div class="summary-card">

                    <div class="summary-label">
                        Dominasi Tiket
                    </div>

                    <div class="summary-value" style="font-size:16px">

                        {{ $online >= $offline ? 'Online' : 'Offline' }}

                    </div>

                    <div class="summary-desc">
                        Metode terbanyak
                    </div>

                </div>

            </td>

        </tr>

    </table>

</div>

{{-- =========================================
KESIMPULAN AWAL
========================================= --}}

<div class="section">

    <div class="section-title">
        Hasil Analisis Utama
    </div>

    <div class="insight-box">

        <p>

            Berdasarkan hasil pengolahan data kunjungan Museum Semedo
            pada periode

            <strong>
                {{ \Carbon\Carbon::parse($start)->format('d M Y') }}
            </strong>

            sampai

            <strong>
                {{ \Carbon\Carbon::parse($end)->format('d M Y') }}
            </strong>,

            tercatat sebanyak

            <strong>{{ $total }}</strong>

            kunjungan pengunjung.

            Penggunaan tiket online sebanyak

            <strong>{{ $online }}</strong>

            sedangkan tiket offline sebanyak

            <strong>{{ $offline }}</strong>.

            Hasil ini menunjukkan bahwa penggunaan

            <strong>
                {{ $online >= $offline ? 'tiket online' : 'tiket offline' }}
            </strong>

            merupakan metode reservasi yang paling dominan selama periode laporan.

        </p>

    </div>

</div>
{{-- =====================================================
DATA PENGUNJUNG
===================================================== --}}

<div class="section">

    <div class="section-title">
        Data Pengunjung
    </div>

    <div class="section-subtitle">
        Data detail pengunjung sebagai dasar analisis kunjungan museum.
    </div>

    <table>

        <thead>

            <tr>

                <th width="5%">No</th>
                <th>Nama</th>
                <th>Provinsi</th>
                <th>Usia</th>
                <th>Instansi</th>
                <th>Frekuensi</th>
                <th width="10%">Jumlah</th>
                <th width="12%">Tanggal</th>

            </tr>

        </thead>

        <tbody>

            @forelse($data as $i => $d)

            <tr>

                <td class="text-center">
                    {{ $i + 1 }}
                </td>

                <td>
                    {{ $d->nama }}
                </td>

                <td>
                    {{ $d->provinsi }}
                </td>

                <td class="text-center">
                    {{ $d->kategori_umur ?? '-' }}
                </td>

                <td>
                    {{ $d->instansi ?? 'Umum' }}
                </td>

                <td class="text-center">

                    @switch($d->frekuensi)

                        @case('1')
                            Pertama Kali
                            @break

                        @case('2')
                            Kedua Kali
                            @break

                        @case('3')
                            Ketiga Kali
                            @break

                        @case('4')
                            Lebih dari 3 Kali
                            @break

                        @default
                            {{ $d->frekuensi }}

                    @endswitch

                </td>

                <td class="text-center">
                    {{ $d->jumlah_tiket }}
                </td>

                <td class="text-center">
                    {{ \Carbon\Carbon::parse($d->tanggal_kunjungan)->format('d M Y') }}
                </td>

            </tr>

            @empty

            <tr>

                <td colspan="8" class="text-center">
                    Tidak ada data pengunjung
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

{{-- =====================================================
ANALISIS WILAYAH
===================================================== --}}
<div class="section page-break">

    <div class="section-title">
        Analisis Sebaran Wilayah Pengunjung
    </div>

    <div class="section-subtitle">
        Distribusi asal wilayah pengunjung berdasarkan provinsi.
    </div>

    <table>

        <thead>

            <tr>

                <th width="8%">No</th>
                <th>Provinsi</th>
                <th width="18%">Total</th>
                <th width="18%">Persentase</th>

            </tr>

        </thead>

        <tbody>

            @php
                $totalWilayah = $analisisWilayah->sum('total');
            @endphp

            @forelse($analisisWilayah as $i => $item)

            <tr>

                <td class="text-center">
                    {{ $i + 1 }}
                </td>

                <td>
                    {{ $item->provinsi ?? '-' }}
                </td>

                <td class="text-center">
                    {{ $item->total }}
                </td>

                <td class="text-center">

                    {{ $totalWilayah > 0
                        ? number_format(($item->total / $totalWilayah) * 100, 1)
                        : 0 }} %

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="4" class="text-center">
                    Tidak ada data wilayah
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

    @if($analisisWilayah->count())

    <div class="insight-box">

        <p>

            Berdasarkan hasil analisis wilayah,
            pengunjung terbanyak berasal dari

            <strong>
                {{ $analisisWilayah->first()->provinsi }}
            </strong>

            dengan jumlah kunjungan

            <strong>
                {{ $analisisWilayah->first()->total }}
            </strong>

            pengunjung.

            Kondisi ini menunjukkan bahwa jangkauan utama
            Museum Semedo masih didominasi oleh wilayah tersebut,
            sehingga strategi promosi dapat difokuskan pada
            penguatan pasar lokal sekaligus memperluas
            jangkauan ke provinsi lainnya.

        </p>

    </div>

    @endif

</div>

{{-- =====================================================
ANALISIS USIA
===================================================== --}}

<div class="section">

    <div class="section-title">
        Analisis Kategori Usia Pengunjung
    </div>

    <div class="section-subtitle">
        Distribusi kelompok usia pengunjung museum.
    </div>

    <table>

        <thead>

            <tr>

                <th width="8%">No</th>
                <th>Kategori Usia</th>
                <th width="18%">Total</th>
                <th width="18%">Persentase</th>

            </tr>

        </thead>

        <tbody>

            @php
                $totalUsia = $analisisUsia->sum('total');
            @endphp

            @forelse($analisisUsia as $i => $item)

            <tr>

                <td class="text-center">
                    {{ $i + 1 }}
                </td>

                <td>
                    {{ $item->kategori_umur }}
                </td>

                <td class="text-center">
                    {{ $item->total }}
                </td>

                <td class="text-center">

                    {{ $totalUsia > 0
                        ? number_format(($item->total / $totalUsia) * 100, 1)
                        : 0 }} %

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="4" class="text-center">
                    Tidak ada data usia
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

    @if($analisisUsia->count())

    <div class="insight-box">

        <p>

            Kelompok usia yang paling dominan adalah

            <strong>
                {{ $analisisUsia->first()->kategori_umur }}
            </strong>

            dengan total kunjungan

            <strong>
                {{ $analisisUsia->first()->total }}
            </strong>

            pengunjung.

            Informasi ini dapat menjadi dasar bagi
            Museum Semedo dalam menyusun program edukasi,
            promosi, maupun kegiatan yang sesuai dengan
            karakteristik pengunjung dominan.

        </p>

    </div>

    @endif

</div>
{{-- =====================================================
ANALISIS FREKUENSI KUNJUNGAN
===================================================== --}}

<div class="section">

    <div class="section-title">
        Analisis Frekuensi Kunjungan
    </div>

    <div class="section-subtitle">
        Distribusi tingkat kunjungan ulang pengunjung Museum Semedo.
    </div>

    <table>

        <thead>

            <tr>

                <th width="8%">No</th>
                <th>Frekuensi Kunjungan</th>
                <th width="18%">Total</th>
                <th width="18%">Persentase</th>

            </tr>

        </thead>

        <tbody>

            @php
                $totalFrekuensi = $analisisFrekuensi->sum('total');
            @endphp

            @forelse($analisisFrekuensi as $i => $item)

            <tr>

                <td class="text-center">
                    {{ $i + 1 }}
                </td>

                <td>

                    @switch($item->frekuensi)

                        @case('1')
                            Pertama Kali
                            @break

                        @case('2')
                            Kedua Kali
                            @break

                        @case('3')
                            Ketiga Kali
                            @break

                        @case('4')
                            Lebih dari 3 Kali
                            @break

                        @default
                            {{ $item->frekuensi }}

                    @endswitch

                </td>

                <td class="text-center">
                    {{ $item->total }}
                </td>

                <td class="text-center">

                    {{ $totalFrekuensi > 0
                        ? number_format(($item->total / $totalFrekuensi) * 100, 1)
                        : 0 }} %

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="4" class="text-center">
                    Tidak ada data frekuensi kunjungan
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

    @if($analisisFrekuensi->count())

    <div class="insight-box">

        <p>

            Berdasarkan hasil analisis frekuensi kunjungan,
            kategori kunjungan terbanyak adalah

            <strong>

                @switch($analisisFrekuensi->first()->frekuensi)

                    @case('1')
                        Pertama Kali
                        @break

                    @case('2')
                        Kedua Kali
                        @break

                    @case('3')
                        Ketiga Kali
                        @break

                    @case('4')
                        Lebih dari 3 Kali
                        @break

                    @default
                        {{ $analisisFrekuensi->first()->frekuensi }}

                @endswitch

            </strong>

            dengan jumlah

            <strong>
                {{ $analisisFrekuensi->first()->total }}
            </strong>

            kunjungan.

            Hasil ini menunjukkan tingkat loyalitas pengunjung
            yang dapat menjadi dasar evaluasi program promosi,
            pelayanan museum, dan strategi peningkatan kunjungan ulang.

        </p>

    </div>

    @endif

</div>

{{-- =====================================================
ANALISIS INSTANSI
===================================================== --}}

<div class="section">

    <div class="section-title">
        Analisis Instansi Pengunjung
    </div>

    <div class="section-subtitle">
        Distribusi kunjungan berdasarkan asal instansi pengunjung.
    </div>

    <table>

        <thead>

            <tr>

                <th width="8%">No</th>
                <th>Instansi</th>
                <th width="18%">Total</th>
                <th width="18%">Persentase</th>

            </tr>

        </thead>

        <tbody>

            @php
                $totalInstansi = $analisisInstansi->sum('total');
            @endphp

            @forelse($analisisInstansi as $i => $item)

            <tr>

                <td class="text-center">
                    {{ $i + 1 }}
                </td>

                <td>
                    {{ $item->instansi }}
                </td>

                <td class="text-center">
                    {{ $item->total }}
                </td>

                <td class="text-center">

                    {{ $totalInstansi > 0
                        ? number_format(($item->total / $totalInstansi) * 100, 1)
                        : 0 }} %

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="4" class="text-center">
                    Tidak ada data instansi
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

    @if($analisisInstansi->count())

    <div class="insight-box">

        <p>

            Instansi dengan jumlah kunjungan tertinggi adalah

            <strong>
                {{ $analisisInstansi->first()->instansi }}
            </strong>

            dengan total

            <strong>
                {{ $analisisInstansi->first()->total }}
            </strong>

            pengunjung.

            Informasi ini dapat dimanfaatkan sebagai dasar
            pengembangan kerja sama edukasi dan promosi dengan
            institusi pendidikan maupun organisasi yang memiliki
            minat terhadap kegiatan museum.

        </p>

    </div>

    @endif

</div>

{{-- =====================================================
KESIMPULAN
===================================================== --}}

<div class="section">

    <div class="section-title">
        Kesimpulan Analisis
    </div>

    <div class="insight-box">

        <p>

            Berdasarkan hasil analisis data kunjungan Museum Semedo
            periode

            <strong>
                {{ \Carbon\Carbon::parse($start)->format('d M Y') }}
            </strong>

            sampai

            <strong>
                {{ \Carbon\Carbon::parse($end)->format('d M Y') }}
            </strong>,

            diperoleh beberapa kesimpulan sebagai berikut:

        </p>

        <ol style="margin-top:10px;">

            <li>
                Total kunjungan pengunjung tercatat sebanyak
                <strong>{{ $total }}</strong> kunjungan.
            </li>

            <li>
                Metode reservasi yang dominan adalah
                <strong>
                    {{ $online >= $offline ? 'tiket online' : 'tiket offline' }}
                </strong>.
            </li>

            <li>
                Wilayah asal pengunjung terbanyak berasal dari
                <strong>
                    {{ $analisisWilayah->count() ? $analisisWilayah->first()->provinsi : '-' }}
                </strong>.
            </li>

            <li>
                Kelompok usia dominan adalah
                <strong>
                    {{ $analisisUsia->count() ? $analisisUsia->first()->kategori_umur : '-' }}
                </strong>.
            </li>

            <li>
                Instansi dengan kontribusi kunjungan tertinggi adalah
                <strong>
                    {{ $analisisInstansi->count() ? $analisisInstansi->first()->instansi : '-' }}
                </strong>.
            </li>

        </ol>

    </div>

</div>

{{-- =====================================================
REKOMENDASI
===================================================== --}}

<div class="section">

    <div class="section-title">
        Rekomendasi
    </div>

    <div class="insight-box">

        <ol>

            <li>
                Meningkatkan promosi digital untuk memperluas jangkauan
                pengunjung dari luar daerah.
            </li>

            <li>
                Mengembangkan program kunjungan edukatif untuk sekolah
                dan institusi pendidikan.
            </li>

            <li>
                Menyusun program loyalitas guna meningkatkan kunjungan ulang.
            </li>

            <li>
                Mengoptimalkan sistem reservasi online sebagai sarana utama
                pelayanan pengunjung.
            </li>

            <li>
                Memanfaatkan hasil analisis data pengunjung sebagai dasar
                pengambilan keputusan manajemen museum.
            </li>

        </ol>

    </div>

</div>

{{-- =====================================================
FOOTER
===================================================== --}}

<div class="footer">

    <div class="signature">

        <p>
            Tegal, {{ now()->format('d M Y') }}
        </p>

        <p>
            Kepala Museum Semedo
        </p>

        <br><br><br><br>

        <p>
            <strong>(..................................)</strong>
        </p>

    </div>

</div>

</body>
</html>