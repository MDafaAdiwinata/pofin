<?php

namespace App\Exports;

use App\Models\Simulation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SimulationsExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function collection()
    {
        return $this->query->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama User',
            'Email User',
            'Nama Bank',
            'Nominal Deposito',
            'Jangka Waktu (Bulan)',
            'Bunga Diterima',
            'Total Akhir',
            'Waktu Simulasi',
        ];
    }

    public function map($simulation): array
    {
        static $no = 0;
        $no++;

        return [
            $no,
            $simulation->user->nama_lengkap,
            $simulation->user->email,
            $simulation->bank->nama_bank,
            'Rp ' . number_format($simulation->nominal_deposito, 0, ',', '.'),
            $simulation->jangka_waktu_bulan . ' Bulan',
            'Rp ' . number_format($simulation->bunga_diterima, 0, ',', '.'),
            'Rp ' . number_format($simulation->total_akhir, 0, ',', '.'),
            $simulation->waktu_simulasi->format('d M Y H:i'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true, 'size' => 12],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '475449']
                ],
            ],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 8,
            'B' => 25,
            'C' => 30,
            'D' => 20,
            'E' => 20,
            'F' => 20,
            'G' => 20,
            'H' => 20,
            'I' => 20,
        ];
    }
}
