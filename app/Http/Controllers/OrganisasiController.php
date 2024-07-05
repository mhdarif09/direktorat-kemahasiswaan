<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisasi;
use Illuminate\Support\Facades\Storage;

class OrganisasiController extends Controller
{
    public function index()
    {
        $organisasi = Organisasi::latest()->paginate(10);
        return view('admin.organisasi.index', compact('organisasi'));
    }


    public function create()
    {
        return view('admin.organisasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->storeAs('public/organisasi', $imageName);
        } else {
            $imageName = null;
        }

        Organisasi::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('organisasi.index')->with('success', 'Organisasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $organisasi = Organisasi::findOrFail($id);
        return view('admin.organisasi.edit', compact('organisasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $organisasi = Organisasi::findOrFail($id);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($organisasi->image) {
                Storage::delete('public/organisasi/' . $organisasi->image);
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->storeAs('public/organisasi', $imageName);
        } else {
            $imageName = $organisasi->image;
        }

        $organisasi->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('organisasi.index')->with('success', 'Organisasi berhasil diupdate.');
    }

    public function destroy($id)
    {
        $organisasi = Organisasi::findOrFail($id);

        if ($organisasi->image) {
            Storage::delete('public/organisasi/' . $organisasi->image);
        }

        $organisasi->delete();

        return redirect()->route('organisasi.index')->with('success', 'Organisasi berhasil dihapus.');
    }
}
