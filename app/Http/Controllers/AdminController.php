<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\User;
use App\Models\Simulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Hitung Total Pengguna (hanya role 'user', exclude admin)
        $totalUsers = User::where('role', 'user')->count();

        // Hitung Total Bank yang Aktif
        $totalBanks = Bank::where('is_active', 'aktif')->count();

        // Hitung Total Simulasi dari Semua User
        $totalSimulations = Simulation::count();

        // Statistik Tambahan (opsional, bisa dipakai nanti)
        $recentSimulations = Simulation::with(['user', 'bank'])
            ->orderBy('waktu_simulasi', 'desc')
            ->take(5)
            ->get();

        // Bank Paling Populer
        $popularBank = Simulation::select('id_bank', DB::raw('count(*) as total'))
            ->with('bank')
            ->groupBy('id_bank')
            ->orderBy('total', 'desc')
            ->first();

        // User Paling Aktif
        $activeUser = Simulation::select('id_user', DB::raw('count(*) as total'))
            ->with('user')
            ->groupBy('id_user')
            ->orderBy('total', 'desc')
            ->first();

        // Total Nominal Deposito Keseluruhan
        $totalNominal = Simulation::sum('nominal_deposito');

        // Kirim data ke view
        return view('admin.dashboard', compact(
            'totalUsers',
            'totalBanks',
            'totalSimulations',
            'recentSimulations',
            'popularBank',
            'activeUser',
            'totalNominal'
        ));

        return view('admin.dashboard');
    }
}
