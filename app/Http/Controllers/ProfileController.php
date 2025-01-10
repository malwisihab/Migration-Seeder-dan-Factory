<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua profile dengan relasi user
        $profiles = Profile::with('user')->get();
        return view('profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil semua user untuk dipilih pada form create
        $users = User::all();
        return view('profiles.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'biodata' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'address' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'user_id' => 'required|exists:users,id', // Validasi agar user_id sesuai dengan tabel users
        ]);

        // Data baru dengan UUID
        $data = $request->all();
        $data['id'] = (string) Str::uuid();

        // Jika ada avatar yang diupload, simpan ke folder storage
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        } else {
            $data['avatar'] = 'default_avatar.png';
        }

        // Simpan data ke tabel profiles
        Profile::create($data);

        return redirect()->route('profiles.index')->with('success', 'Profile created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profile = Profile::with('user')->findOrFail($id);
        return view('profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profile = Profile::findOrFail($id);
        $users = User::all();
        return view('profiles.edit', compact('profile', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profile = Profile::findOrFail($id);

        $request->validate([
            'biodata' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'address' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'user_id' => 'required|exists:users,id',
        ]);

        // Ambil data input
        $data = $request->all();

        // Jika ada file avatar baru, hapus avatar lama, lalu simpan avatar baru
        if ($request->hasFile('avatar')) {
            if ($profile->avatar && $profile->avatar !== 'default_avatar.png') {
                Storage::disk('public')->delete($profile->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        // Update data profile
        $profile->update($data);

        return redirect()->route('profiles.index')->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profile = Profile::findOrFail($id);

        // Hapus avatar jika ada, kecuali avatar default
        if ($profile->avatar && $profile->avatar !== 'default_avatar.png') {
            Storage::disk('public')->delete($profile->avatar);
        }

        // Hapus profile
        $profile->delete();

        return redirect()->route('profiles.index')->with('success', 'Profile deleted successfully.');
    }
}
