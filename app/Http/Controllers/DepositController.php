<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Simulation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\SimulationsExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DepositController extends Controller
{
    // Menampilkan halaman form deposit
    public function index()
    {
        return view('user.deposit');
    }

    // LOGIC PERHITUNGAN DEPOSITO
    public function calculate(Request $request)
    {
        // Bersihkan nominal_deposito dari format rupiah (hapus titik)
        $nominal_cleaned = str_replace('.', '', $request->nominal_deposito);

        // Replace value di request untuk validasi
        $request->merge(['nominal_deposito' => $nominal_cleaned]);

        // Validasi input
        $request->validate([
            'nominal_deposito' => 'required|numeric|min:1000000',
            'jangka_waktu_bulan' => 'required|in:1,3,6,12',
        ], [
            'nominal_deposito.required' => 'Jumlah deposito harus diisi',
            'nominal_deposito.numeric' => 'Jumlah deposito harus berupa angka',
            'nominal_deposito.min' => 'Jumlah deposito minimal Rp 1.000.000',
            'jangka_waktu_bulan.required' => 'Jangka waktu harus dipilih',
        ]);

        // Ambil nilai dari form
        $nominal = $nominal_cleaned;
        $jangka_waktu = $request->jangka_waktu_bulan;

        // Ambil semua bank yang aktif dari database
        $banks = Bank::where('is_active', 'aktif')->get();

        $results = [];

        // LOOP untuk hitung setiap bank
        foreach ($banks as $bank) {
            /**
             * RUMUS DEPOSITO:
             * Mn = Mo × (1 + r)^n
             * 
             * Mn = Saldo Akhir (total_akhir)
             * Mo = Modal Awal (nominal_deposito)
             * r  = Suku Bunga per periode (suku_bunga_dasar / 100 / 12)
             * n  = Jumlah periode dalam bulan (jangka_waktu_bulan)
             */

            // Konversi suku bunga tahunan ke desimal per bulan
            // Contoh: 3% per tahun = 3 / 100 / 12 = 0.0025 per bulan
            $suku_bunga_per_bulan = ($bank->suku_bunga_dasar / 100) / 12;

            // Hitung total akhir dengan rumus compound interest
            // Contoh: 100.000.000 × (1 + 0.0025)^6
            $total_akhir = $nominal * pow((1 + $suku_bunga_per_bulan), $jangka_waktu);

            // Hitung bunga yang diterima
            // Bunga = Total Akhir - Modal Awal
            $bunga_diterima = $total_akhir - $nominal;

            // Simpan hasil ke array
            $results[] = [
                'id_bank' => $bank->id_bank,
                'nama_bank' => $bank->nama_bank,
                'suku_bunga' => number_format($bank->suku_bunga_dasar, 2),
                'gambar' => $bank->gambar,
                'total_akhir' => round($total_akhir, 0),
                'bunga_diterima' => round($bunga_diterima, 0),
            ];
        }

        // Kirim hasil ke view
        return view('user.deposit', [
            'results' => $results,
            'nominal_deposito' => $nominal,
            'jangka_waktu_bulan' => $jangka_waktu,
        ]);
    }

    // Logic Menyimpan Simulasi yang dipilih user
    public function save(Request $request)
    {
        $request->validate([
            'id_bank' => 'required|exists:banks,id_bank',
            'nominal_deposito' => 'required|numeric|min:1000000',
            'jangka_waktu_bulan' => 'required|in:1,3,6,12',
        ]);

        try {
            // Panggil SP - SP yang HITUNG sendiri
            DB::statement('CALL sp_simpan_simulasi_lengkap(?, ?, ?, ?, @status, @message, @bunga, @total)', [
                Auth::id(),
                $request->id_bank,
                $request->nominal_deposito,
                $request->jangka_waktu_bulan
            ]);

            // Ambil hasil
            $result = DB::select('SELECT @status as status, @message as message, @bunga as bunga, @total as total');

            if ($result[0]->status === 'SUCCESS') {
                return redirect()->route('user.deposit')->with('success', $result[0]->message);
            } else {
                return redirect()->route('user.deposit')->with('error', $result[0]->message);
            }
        } catch (\Exception $e) {
            return redirect()->route('user.deposit')->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function history(Request $request)
    {
        // Ambil ID user yang sedang login
        $id_user = Auth::id();

        // Query untuk ambil data simulasi user dengan relasi bank
        // PENTING: where('id_user', $id_user) memastikan hanya data user ini
        $query = Simulation::with('bank')
            ->where('id_user', $id_user)
            ->orderBy('waktu_simulasi', 'desc');

        // Filter Search - Cari berdasarkan nama bank
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('bank', function ($q) use ($search) {
                $q->where('nama_bank', 'like', '%' . $search . '%');
            });
        }

        // Filter Jangka Waktu
        if ($request->has('jangka_waktu') && $request->jangka_waktu != '') {
            $query->where('jangka_waktu_bulan', $request->jangka_waktu);
        }

        // Ambil data dengan pagination (10 data per halaman)
        $simulations = $query->paginate(10);

        // Kirim ke view
        return view('user.histori', compact('simulations'));
    }

    // Hapus Histori
    public function destroy($id)
    {
        // Cari simulasi berdasarkan id_simulasi
        // memastikan user hanya bisa hapus data miliknya sendiri
        $simulation = Simulation::where('id_simulasi', $id)
            ->where('id_user', Auth::id())
            ->firstOrFail();

        // Hapus data
        $simulation->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('user.histori')->with('success', 'Histori simulasi berhasil dihapus!');
    }

    public function adminIndex(Request $request)
    {
        // Query untuk ambil SEMUA simulasi dari SEMUA user
        // Admin bisa lihat semua data
        $query = Simulation::with(['bank', 'user'])
            ->orderBy('waktu_simulasi', 'desc');

        // Filter Search - Cari berdasarkan nama bank atau nama user
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('bank', function ($subQ) use ($search) {
                    $subQ->where('nama_bank', 'like', '%' . $search . '%');
                })
                    ->orWhereHas('user', function ($subQ) use ($search) {
                        $subQ->where('nama_lengkap', 'like', '%' . $search . '%')
                            ->orWhere('email', 'like', '%' . $search . '%');
                    });
            });
        }

        if ($request->has('jangka_waktu') && $request->jangka_waktu != '') {
            $query->where('jangka_waktu_bulan', $request->jangka_waktu);
        }

        $simulations = $query->paginate();
        return view('admin.kelola-simulasi', compact('simulations'));
    }

    // Hapus Simulasi
    public function adminDestroy($id)
    {
        // Admin bisa hapus simulasi siapa saja
        $simulation = Simulation::where('id_simulasi', $id)->firstOrFail();

        // Hapus data
        $simulation->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.kelola-simulasi')->with('success', 'Simulasi berhasil dihapus!');
    }

    // Method Export to Excel
    public function exportExcel(Request $request)
    {
        // Query yang sama dengan adminIndex
        $query = Simulation::with(['bank', 'user'])
            ->orderBy('waktu_simulasi', 'desc');

        // Terapkan filter yang sama
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('bank', function ($subQ) use ($search) {
                    $subQ->where('nama_bank', 'like', '%' . $search . '%');
                })
                    ->orWhereHas('user', function ($subQ) use ($search) {
                        $subQ->where('nama_lengkap', 'like', '%' . $search . '%')
                            ->orWhere('email', 'like', '%' . $search . '%');
                    });
            });
        }

        if ($request->has('jangka_waktu') && $request->jangka_waktu != '') {
            $query->where('jangka_waktu_bulan', $request->jangka_waktu);
        }

        $fileName = 'simulasi-deposito-' . date('Y-m-d-His') . '.xlsx';

        return Excel::download(new SimulationsExport($query), $fileName);
    }

    // Method Export to PDF
    public function exportPdf(Request $request)
    {
        // Query yang sama dengan adminIndex
        $query = Simulation::with(['bank', 'user'])
            ->orderBy('waktu_simulasi', 'desc');

        // Terapkan filter yang sama
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('bank', function ($subQ) use ($search) {
                    $subQ->where('nama_bank', 'like', '%' . $search . '%');
                })
                    ->orWhereHas('user', function ($subQ) use ($search) {
                        $subQ->where('nama_lengkap', 'like', '%' . $search . '%')
                            ->orWhere('email', 'like', '%' . $search . '%');
                    });
            });
        }

        if ($request->has('jangka_waktu') && $request->jangka_waktu != '') {
            $query->where('jangka_waktu_bulan', $request->jangka_waktu);
        }

        $simulations = $query->get();

        $pdf = Pdf::loadView('admin.pdf.simulasi', [
            'simulations' => $simulations,
            'tanggal_export' => now()->format('d F Y H:i'),
        ]);

        $pdf->setPaper('A4', 'landscape');

        return $pdf->download('simulasi-deposito-' . date('Y-m-d-His') . '.pdf');
    }

    // Method Export Excel untuk User History
    public function userExportExcel(Request $request)
    {
        $userId = Auth::id();

        // Query yang sama dengan history
        $query = Simulation::with(['bank', 'user'])
            ->where('id_user', $userId)
            ->orderBy('waktu_simulasi', 'desc');

        // Terapkan filter yang sama
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('bank', function ($q) use ($search) {
                $q->where('nama_bank', 'like', '%' . $search . '%');
            });
        }

        if ($request->has('jangka_waktu') && $request->jangka_waktu != '') {
            $query->where('jangka_waktu_bulan', $request->jangka_waktu);
        }

        $fileName = 'histori-simulasi-' . Auth::user()->username . '-' . date('Y-m-d-His') . '.xlsx';

        return Excel::download(new SimulationsExport($query), $fileName);
    }

    // Method Export PDF untuk User History
    public function userExportPdf(Request $request)
    {
        $userId = Auth::id();

        // Query yang sama dengan history
        $query = Simulation::with(['bank', 'user'])
            ->where('id_user', $userId)
            ->orderBy('waktu_simulasi', 'desc');

        // Terapkan filter yang sama
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('bank', function ($q) use ($search) {
                $q->where('nama_bank', 'like', '%' . $search . '%');
            });
        }

        if ($request->has('jangka_waktu') && $request->jangka_waktu != '') {
            $query->where('jangka_waktu_bulan', $request->jangka_waktu);
        }

        $simulations = $query->get();
        $user = Auth::user();

        $pdf = Pdf::loadView('user.pdf.histori-simulasi', [
            'simulations' => $simulations,
            'user' => $user,
            'tanggal_export' => now()->format('d F Y H:i'),
        ]);

        $pdf->setPaper('A4', 'landscape');

        return $pdf->download('histori-simulasi-' . $user->username . '-' . date('Y-m-d-His') . '.pdf');
    }
}
