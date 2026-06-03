@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-6">Detail Tiket</h1>

<div class="bg-white p-6 shadow rounded-xl">

    <p><strong>Nama:</strong> {{ $ticket->nama }}</p>
    <p><strong>Email:</strong> {{ $ticket->email }}</p>
    <p><strong>Tanggal Kunjungan:</strong> {{ $ticket->tanggal_kunjungan }}</p>
    <p><strong>Kategori:</strong> {{ $ticket->kategori }}</p>
    <p><strong>Jumlah:</strong> {{ $ticket->jumlah_tiket }}</p>
    <p><strong>Status:</strong> {{ $ticket->status }}</p>

    @if ($ticket->status == 'pending')
    <form action="{{ route('admin.validasi.process', $ticket->id) }}" method="POST" class="mt-4">
        @csrf
        <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            Validasi Tiket
        </button>
    </form>
    @else
    <div class="mt-4 p-3 bg-green-100 text-green-700 rounded">
        Tiket sudah divalidasi ✔
    </div>
    @endif

</div>

@endsection