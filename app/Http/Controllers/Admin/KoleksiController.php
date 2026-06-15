<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Koleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class KoleksiController extends Controller
{
    /**
     * Redirect ke halaman koleksi pada Website Management
     */
    public function index()
    {
        return redirect()->route(
            'admin.settings',
            [
                'menu' => 'koleksi'
            ]
        );
    }

    /**
     * Form tambah koleksi
     */
    public function create()
    {
        $menu = 'koleksi';

        return view(
            'admin.settings.koleksi-create',
            compact('menu')
        );
    }

    /**
     * Simpan koleksi baru
     */
    public function store(Request $request)
    {
        $request->validate([

            'judul' => 'required|max:255',

            'kategori' => 'required|in:paleontologi,paleoantropologi,artefak',

            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',

            'periode' => 'nullable|max:255',

            'usia' => 'nullable|max:255',

            'lokasi' => 'nullable|max:255',

            'deskripsi' => 'required',

            'deskripsi_lengkap_1' => 'nullable',

            'deskripsi_lengkap_2' => 'nullable',

            'konteks' => 'nullable',

        ]);

        // Generate slug
        $slug = Str::slug($request->judul);

        // Cegah slug duplikat
        if (Koleksi::where('slug', $slug)->exists()) {

            $slug .= '-' . time();

        }

        // Upload gambar
        $path = $request->file('gambar')
            ->store('koleksi', 'public');

        // Simpan ke database
        Koleksi::create([

            'judul' => $request->judul,

            'slug' => $slug,

            'kategori' => $request->kategori,

            'gambar' => $path,

            'periode' => $request->periode,

            'usia' => $request->usia,

            'lokasi' => $request->lokasi,

            'deskripsi' => $request->deskripsi,

            'deskripsi_lengkap_1' => $request->deskripsi_lengkap_1,

            'deskripsi_lengkap_2' => $request->deskripsi_lengkap_2,

            'konteks' => $request->konteks,

        ]);

        return redirect()
            ->route(
                'admin.settings',
                [
                    'menu' => 'koleksi',
                    'refresh' => time()
                ]
            )
            ->with(
                'success',
                'Koleksi berhasil ditambahkan.'
            );
    }

    public function edit(Koleksi $koleksi)
    {
        $menu = 'koleksi';

        return view(
            'admin.settings.koleksi-edit',
            compact(
                'koleksi',
                'menu'
            )
        );
    }

    public function update(
        Request $request,
        Koleksi $koleksi
    )
    {
        $request->validate([

            'judul' => 'required|max:255',

            'kategori' => 'required|in:paleontologi,paleoantropologi,artefak',

            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',

            'periode' => 'nullable|max:255',

            'usia' => 'nullable|max:255',

            'lokasi' => 'nullable|max:255',

            'deskripsi' => 'required',

            'deskripsi_lengkap_1' => 'nullable',

            'deskripsi_lengkap_2' => 'nullable',

            'konteks' => 'nullable',
        ]);

        $slug = Str::slug($request->judul);

        if (
            Koleksi::where('slug', $slug)
                ->where('id', '!=', $koleksi->id)
                ->exists()
        ) {
            $slug .= '-' . time();
        }

        $data = [

            'judul' => $request->judul,

            'slug' => $slug,

            'kategori' => $request->kategori,

            'periode' => $request->periode,

            'usia' => $request->usia,

            'lokasi' => $request->lokasi,

            'deskripsi' => $request->deskripsi,

            'deskripsi_lengkap_1' => $request->deskripsi_lengkap_1,

            'deskripsi_lengkap_2' => $request->deskripsi_lengkap_2,

            'konteks' => $request->konteks,
        ];

        if ($request->hasFile('gambar')) {

            if (
                $koleksi->gambar &&
                Storage::disk('public')->exists($koleksi->gambar)
            ) {
                Storage::disk('public')->delete($koleksi->gambar);
            }

            $data['gambar'] = $request
                ->file('gambar')
                ->store('koleksi', 'public');
        }

        $koleksi->update($data);

        return redirect()
            ->route(
                'admin.settings',
                [
                    'menu' => 'koleksi',
                    'refresh' => time()
                ]
            )
            ->with(
                'success',
                'Koleksi berhasil diperbarui.'
            );
    }

    public function destroy(
        Koleksi $koleksi
    )
    {
        if (
            $koleksi->gambar &&
            Storage::disk('public')->exists($koleksi->gambar)
        ) {
            Storage::disk('public')->delete($koleksi->gambar);
        }
        $koleksi->delete();

        return redirect()
            ->route(
                'admin.settings',
                [
                    'menu' => 'koleksi',
                    'refresh' => time()
                ]
            )
            ->with(
                'success',
                'Koleksi berhasil dihapus.'
            );
    }
}