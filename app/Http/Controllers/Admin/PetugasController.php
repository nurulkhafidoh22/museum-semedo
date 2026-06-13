<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = User::where('role', 'petugas')
            ->latest()
            ->get();

        return view('admin.petugas.index', compact('petugas'));
    }

    public function create()
    {
        return view('admin.petugas.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'petugas'
        ]);

        return redirect()
            ->route('admin.petugas.index')
            ->with('success', 'Petugas berhasil ditambahkan');
    }

    public function edit($id)
    {
        $petugas = User::findOrFail($id);

        return view('admin.petugas.edit', compact('petugas'));
    }

    public function update(Request $request, $id)
    {
        $petugas = User::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $petugas->id,
        ]);

        $petugas->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()
            ->route('admin.petugas.index')
            ->with('success', 'Petugas berhasil diperbarui');
    }

    public function destroy($id)
    {
        $petugas = User::findOrFail($id);

        $petugas->delete();

        return redirect()
            ->route('admin.petugas.index')
            ->with('success', 'Petugas berhasil dihapus');
    }

    public function resetPassword(User $petugas)
    {
        $petugas->update([
            'password' => Hash::make('12345678')
        ]);

        return back()->with(
            'success',
            'Password berhasil direset menjadi 12345678'
        );
    }
}