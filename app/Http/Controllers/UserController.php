<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Simulation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::id();

        // Hitung total simulasi user ini
        $totalSimulasi = Simulation::where('id_user', $userId)->count();

        // Hitung total nominal deposito user ini
        $totalNominal = Simulation::where('id_user', $userId)
            ->sum('nominal_deposito');

        // Hitung total bunga yang diterima
        $totalBunga = Simulation::where('id_user', $userId)
            ->sum('bunga_diterima');

        // Hitung total saldo akhir
        $totalSaldoAkhir = Simulation::where('id_user', $userId)
            ->sum('total_akhir');

        // Ambil bank yang paling sering digunakan
        $bankFavorit = Simulation::where('id_user', $userId)
            ->select('id_bank', DB::raw('COUNT(*) as total'))
            ->groupBy('id_bank')
            ->orderBy('total', 'desc')
            ->with('bank')
            ->first();

        // Ambil 5 simulasi terakhir
        $simulasiTerakhir = Simulation::where('id_user', $userId)
            ->with('bank')
            ->orderBy('waktu_simulasi', 'desc')
            ->limit(5)
            ->get();

        return view('user.dashboard', compact(
            'totalSimulasi',
            'totalNominal',
            'totalBunga',
            'totalSaldoAkhir',
            'bankFavorit',
            'simulasiTerakhir'
        ));
    }


    public function index(Request $request)
    {
        $query = User::where('role', 'user');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_lengkap', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('username', 'like', '%' . $request->search . '%');
            });
        }

        $users = $query->get();

        return view('admin.kelola-user', compact('users'));
    }
    public function adminIndex()
    {
        $users = User::all();
        return view('admin.kelola-user', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create-user');
    }

    public function store(Request $request)
    {
        // Validasi input
        $this->validate(
            $request,
            [
                'nama_lengkap' => 'required|string|max:100',
                'username' => 'required|string|max:20|unique:users,username',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
            ],
            [
                'username.unique' => 'Username sudah digunakan.',
                'email.unique' => 'Email sudah digunakan.',
                'password.min' => 'Password minimal 8 karakter.',
            ]
        );

        // Insert data pengguna baru
        User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role ?? 'user',
        ]);

        return redirect()->route('admin.kelola-user')
            ->with('success', 'User berhasil ditambahkan!');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit-user', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validasi dengan custom message
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'username'     => 'required|string|max:50',
            'email'        => 'required|email|max:255', // Ubah dari 10 ke 255
            'role'         => 'required|string',
            'password'     => 'nullable|string|min:8',
        ], [
            // Custom error messages
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'nama_lengkap.max'      => 'Nama lengkap tidak boleh lebih dari 100 karakter.',

            'username.required'     => 'Username wajib diisi.',
            'username.max'          => 'Username tidak boleh lebih dari 50 karakter.',

            'email.required'        => 'Email wajib diisi.',
            'email.email'           => 'Format email tidak valid.',
            'email.max'             => 'Email tidak boleh lebih dari 255 karakter.',

            'role.required'         => 'Role wajib dipilih.',

            'password.min'          => 'Password minimal 8 karakter.',
        ]);

        // Update data
        $user->nama_lengkap = $request->nama_lengkap;
        $user->username     = $request->username;
        $user->email        = $request->email;
        $user->role         = $request->role;

        // Jika password diisi baru → hashing
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('admin.kelola-user')
            ->with('success', 'Data User berhasil diperbarui!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.kelola-user');
    }
}
