<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsitePage;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebsiteSettingController extends Controller
{
    public function index(Request $request)
    {
        $menu = $request->query('menu', 'beranda');

        $allowedMenus = [
            'beranda',
            'tentang',
            'informasi',
            'tiket',
            'koleksi',
            'footer'
        ];

        if (!in_array($menu, $allowedMenus)) {
            $menu = 'beranda';
        }

        $setting = WebsiteSetting::first();

        $pages = WebsitePage::where(
            'page',
            $menu
        )->get();

        return view(
            'admin.settings.index',
            compact(
                'menu',
                'setting',
                'pages'
            )
        );
    }

    public function updateHome(Request $request)
    {
        $request->validate([
            'title'   => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp,avif|max:10240',
        ]);

        $hero = WebsitePage::where(
            'page',
            'beranda'
        )
        ->where(
            'section',
            'hero'
        )
        ->first();

        if (!$hero) {

            $hero = new WebsitePage();

            $hero->page = 'beranda';
            $hero->section = 'hero';
        }

        $hero->title = $request->title;
        $hero->content = $request->content;

        if ($request->hasFile('image')) {

            // hapus gambar lama
            if (
                $hero->image &&
                Storage::disk('public')->exists($hero->image)
            ) {
                Storage::disk('public')->delete($hero->image);
            }

            // simpan gambar baru
            $path = $request->file('image')
                ->store('website', 'public');

            $hero->image = $path;
        }

        $hero->save();

        return redirect()
            ->route(
                'admin.settings',
                [
                    'menu' => 'beranda',
                    'refresh' => time()
                ]
            )
            ->with(
                'success',
                'Konten Beranda berhasil diperbarui.'
            );
    }

    public function updateTentang(Request $request)
    {
        $request->validate([
            'badge'       => 'required|max:255',
            'title_1'     => 'required|max:255',
            'title_2'     => 'required|max:255',
            'title_3'     => 'required|max:255',
            'description' => 'required',
            'image'       => 'nullable|mimes:jpg,jpeg,png,webp,avif|max:10240',
        ]);

        $sections = [
            'badge'       => $request->badge,
            'title_1'     => $request->title_1,
            'title_2'     => $request->title_2,
            'title_3'     => $request->title_3,
            'description' => $request->description,
        ];

        foreach ($sections as $section => $value) {

            WebsitePage::updateOrCreate(
                [
                    'page' => 'tentang',
                    'section' => $section,
                ],
                [
                    'title' => $value,
                ]
            );
        }

        if ($request->hasFile('image')) {

            $imageSection = WebsitePage::updateOrCreate(
                [
                    'page' => 'tentang',
                    'section' => 'image'
                ],
                [
                    'title' => 'Gambar Tentang'
                ]
            );

            $path = $request->file('image')
                ->store('website', 'public');

            $imageSection->image = $path;

            $imageSection->save();
        }

        return redirect()
            ->route(
                'admin.settings',
                [
                    'menu' => 'tentang',
                    'refresh' => time()
                ]
            )
            ->with(
                'success',
                'Konten halaman Tentang berhasil diperbarui.'
            );
    }

    public function updateInformasi(Request $request)
    {
        $request->validate([
            'badge'       => 'required|max:255',
            'title_1'     => 'required|max:255',
            'title_2'     => 'required|max:255',
            'title_3'     => 'required|max:255',
            'description' => 'required',
            'image'       => 'nullable|mimes:jpg,jpeg,png,webp,avif|max:10240',

            'jam_hari'     => 'required|max:255',
            'jam_waktu'    => 'required|max:255',

            'tutup_hari'   => 'required|max:255',
            'tutup_status' => 'required|max:255',

            'libur_hari'   => 'required|max:255',
            'libur_status' => 'required|max:255',
        ]);

        $sections = [

            // HERO
            'badge'       => $request->badge,
            'title_1'     => $request->title_1,
            'title_2'     => $request->title_2,
            'title_3'     => $request->title_3,
            'description' => $request->description,

            // JAM OPERASIONAL
            'jam_hari'     => $request->jam_hari,
            'jam_waktu'    => $request->jam_waktu,

            'tutup_hari'   => $request->tutup_hari,
            'tutup_status' => $request->tutup_status,

            'libur_hari'   => $request->libur_hari,
            'libur_status' => $request->libur_status,
        ];

        foreach ($sections as $section => $value) {

            WebsitePage::updateOrCreate(
                [
                    'page' => 'informasi',
                    'section' => $section,
                ],
                [
                    'title' => $value,
                ]
            );
        }

        if ($request->hasFile('image')) {

            $imageSection = WebsitePage::updateOrCreate(
                [
                    'page' => 'informasi',
                    'section' => 'image'
                ],
                [
                    'title' => 'Gambar Informasi'
                ]
            );

            $path = $request->file('image')
                ->store('website', 'public');

            $imageSection->image = $path;

            $imageSection->save();
        }

        return redirect()
            ->route(
                'admin.settings',
                [
                    'menu' => 'informasi',
                    'refresh' => time()
                ]
            )
            ->with(
                'success',
                'Konten halaman Informasi berhasil diperbarui.'
            );
    }

    public function updateTiket(Request $request)
    {
        $request->validate([
            'harga_anak'   => 'required|numeric|min:0',
            'harga_dewasa' => 'required|numeric|min:0',
            'harga_wna'    => 'required|numeric|min:0',
        ]);

        $sections = [

            'harga_anak'   => $request->harga_anak,
            'harga_dewasa' => $request->harga_dewasa,
            'harga_wna'    => $request->harga_wna,

        ];

        foreach ($sections as $section => $value) {

            WebsitePage::updateOrCreate(
                [
                    'page' => 'tiket',
                    'section' => $section,
                ],
                [
                    'title' => $value,
                ]
            );
        }

        return redirect()
            ->route(
                'admin.settings',
                [
                    'menu' => 'tiket',
                    'refresh' => time()
                ]
            )
            ->with(
                'success',
                'Harga tiket berhasil diperbarui.'
            );
    }
}