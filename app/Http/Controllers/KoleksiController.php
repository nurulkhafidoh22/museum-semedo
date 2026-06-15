<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;

class KoleksiController extends Controller
{
    public function index()
    {
        $kategori = request('kategori');

        $query = Koleksi::query();

        if ($kategori) {

            $query->where(
                'kategori',
                $kategori
            );
        }

        $koleksi = $query
            ->latest()
            ->get();

        return view(
            'pages.koleksi',
            [
                'koleksi' => $koleksi,
                'kategori' => $kategori,
            ]
        );
    }

    public function show(string $slug)
    {
        $detail = Koleksi::where(
            'slug',
            $slug
        )->firstOrFail();

        $related = Koleksi::where(
            'id',
            '!=',
            $detail->id
        )
        ->latest()
        ->take(3)
        ->get();

        return view(
            'pages.koleksi-detail',
            [

                'judul' => $detail->judul,
                'gambar' => asset('storage/' . $detail->gambar),
                'kategori' => $detail->kategori,
                'deskripsi' => $detail->deskripsi,

                'periode' => $detail->periode,
                'usia' => $detail->usia,
                'lokasi' => $detail->lokasi,

                'deskripsi_lengkap_1' => $detail->deskripsi_lengkap_1,
                'deskripsi_lengkap_2' => $detail->deskripsi_lengkap_2,

                'konteks' => $detail->konteks,

                'related' => $related,
            ]
        );
    }
}