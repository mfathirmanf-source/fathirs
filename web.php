<?php

use App\Models\Biodata;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    $biodatas = Biodata::latest()->get();
    return view('welcome', compact('biodatas'));
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::get('fathir', function () {
    return view('fathir');
});

Route::get('about', function () {
    return view('about');
});

// CRUD
Route::get('tambah', function () {
    return view('form');
})->name('tambah');

Route::post('simpan', function () {
    $data = request()->validate([
        'nama'      => 'required|string|max:255',
        'nim'       => 'required|string|max:50',
        'deskripsi' => 'nullable|string',
        'foto'      => 'nullable|image|max:2048',
    ]);

    if (request()->hasFile('foto')) {
        $data['foto'] = request()->file('foto')->store('foto', 'public');
    }

    Biodata::create($data);

    return redirect('/')->with('success', 'Data berhasil ditambahkan.');
})->name('simpan');

Route::get('{data}/ubah', function (Biodata $data) {
    return view('form', ['biodata' => $data]);
})->name('ubah');

Route::put('{data}', function (Biodata $data) {
    $validated = request()->validate([
        'nama'      => 'required|string|max:255',
        'nim'       => 'required|string|max:50',
        'deskripsi' => 'nullable|string',
        'foto'      => 'nullable|image|max:2048',
    ]);

    if (request()->hasFile('foto')) {
        if ($data->foto) {
            Storage::disk('public')->delete($data->foto);
        }
        $validated['foto'] = request()->file('foto')->store('foto', 'public');
    }

    $data->update($validated);

    return redirect('/')->with('success', 'Data berhasil diperbarui.');
})->name('perbarui');

Route::delete('{data}', function (Biodata $data) {
    if ($data->foto) {
        Storage::disk('public')->delete($data->foto);
    }
    $data->delete();

    return redirect('/')->with('success', 'Data berhasil dihapus.');
})->name('hapus');

require __DIR__ . '/settings.php';