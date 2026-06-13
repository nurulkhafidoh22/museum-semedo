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
}