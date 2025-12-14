<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BankController extends Controller
{
    public function index(Request $request)
    {
        $query = Bank::where('is_active', 'Aktif');


        // Jika user mengisi input search
        if ($request->filled('search')) {
            $query->where('nama_bank', 'like', '%' . $request->search . '%')
                ->orWhere('kode_bank', 'like', '%' . $request->search . '%')
                ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
        }

        $banks = $query->get();

        return view('bank', compact('banks'));
    }

    public function adminIndex()
    {
        $banks = Bank::all();
        return view('admin.kelola-bank', compact('banks'));
    }

    public function create()
    {
        return view('admin.bank.create');
    }

    public function store(Request $request)
    {
        // Validasi langsung
        $this->validate(
            $request,
            [
                'nama_bank' => 'required',
                'kode_bank' => 'required',
                'deskripsi' => 'required',
                'suku_bunga_dasar' => 'required|numeric|min:0',
                'is_active' => 'required',
                'gambar' => 'required|image|mimes:png,jpg,jpeg'
            ],
            [
                'gambar.required' => 'Gambar wajib diunggah.',
                'gambar.image' => 'File harus berupa gambar.',
                'gambar.mimes' => 'Format gambar harus PNG, JPG, atau JPEG.',
            ]
        );

        // Upload gambar
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/bank/', $gambar->hashName());

        // Simpan data
        Bank::create([
            'nama_bank' => $request->nama_bank,
            'kode_bank' => $request->kode_bank,
            'suku_bunga_dasar' => $request->suku_bunga_dasar,
            'is_active' => $request->is_active,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar->hashName()
        ]);

        return redirect()->route('admin.kelola-bank')
            ->with('success', 'Data bank berhasil ditambahkan!');
    }

    public function edit(Bank $bank)
    {
        return view('admin.bank.edit', compact('bank'));
    }

    public function update(Request $request, Bank $bank)
    {
        // Validasi langsung
        $this->validate(
            $request,
            [
                'nama_bank' => 'required',
                'kode_bank' => 'required',
                'deskripsi' => 'required',
                'suku_bunga_dasar' => 'required',
                'is_active' => 'required',
            ],
            [
                'nama_bank.unique' => 'Nama bank sudah terdaftar!',
                'kode_bank.unique' => 'Kode bank sudah terdaftar!',
            ]
        );

        $bank->nama_bank = $request->nama_bank;
        $bank->kode_bank = $request->kode_bank;
        $bank->suku_bunga_dasar = $request->suku_bunga_dasar;
        $bank->is_active = $request->is_active;
        $bank->deskripsi = $request->deskripsi;

        if ($request->file('gambar')) {
            Storage::disk('local')->delete('public/bank/', $bank->gambar);
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/bank/', $gambar->hashName());
            $bank->gambar = $gambar->hashName();
        }

        $bank->update();

        return redirect()->route('admin.kelola-bank')
            ->with('success', 'Data bank berhasil diperbarui!');
    }

    // DELETE
    public function destroy(Bank $bank)
    {
        // Cek jika ada file gambar
        if ($bank->gambar && file_exists(public_path('storage/bank/' . $bank->gambar))) {
            // Hapus file gambarnya
            unlink(public_path('storage/bank/' . $bank->gambar));
        }

        // Hapus data dari database
        $bank->delete();

        return redirect()->route('admin.kelola-bank')
            ->with('success', 'Data bank berhasil dihapus!');
    }
}
