<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WelcomeMessage;
use Illuminate\Support\Facades\Storage;

class WelcomeMessageController extends Controller
{

    public function index()
    {
        $welcomeMessage = WelcomeMessage::latest()->first();
        return view('welcome_message.index', compact('welcomeMessage'));
    }

    public function show($id)
    {
        $welcomeMessage = WelcomeMessage::findOrFail($id);
        return view('welcome_message.show', compact('welcomeMessage'));
    }

    public function create()
    {
        return view('welcome_message.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar_profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Upload gambar profil
        $gambarProfilePath = $request->file('gambar_profile')->store('gambar_profile', 'public');

        // Simpan data kata sambutan
        WelcomeMessage::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar_profile' => $gambarProfilePath,
        ]);

        return redirect()->route('welcome_message.index')
                         ->with('success', 'Kata sambutan berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $welcomeMessage = WelcomeMessage::findOrFail($id);
        return view('welcome_message.edit', compact('welcomeMessage'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $welcomeMessage = WelcomeMessage::findOrFail($id);

        // Update data kata sambutan
        $welcomeMessage->judul = $request->judul;
        $welcomeMessage->isi = $request->isi;

        // Jika ada upload gambar baru, update gambar profil
        if ($request->hasFile('gambar_profile')) {
            // Hapus gambar lama jika ada
            if ($welcomeMessage->gambar_profile) {
                Storage::disk('public')->delete($welcomeMessage->gambar_profile);
            }

            // Upload gambar baru
            $gambarProfilePath = $request->file('gambar_profile')->store('gambar_profile', 'public');
            $welcomeMessage->gambar_profile = $gambarProfilePath;
        }

        $welcomeMessage->save();

        return redirect()->route('welcome_message.index')
                         ->with('success', 'Kata sambutan berhasil diperbarui.');
    }
}
