<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Simulasi Deposito</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #475449;
            padding-bottom: 15px;
        }

        .header h2 {
            margin: 5px 0;
            color: #273E3D;
        }

        .export-info {
            text-align: right;
            margin-bottom: 20px;
            font-size: 10px;
            color: #666;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background-color: #475449;
            color: white;
            padding: 10px;
            text-align: left;
            font-size: 11px;
        }

        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            font-size: 10px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .font-bold {
            font-weight: bold;
        }

        .total-akhir {
            color: #047857;
            font-weight: bold;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>LAPORAN SIMULASI DEPOSITO</h2>
        <p style="margin: 5px 0;">Sistem Perbandingan Bunga Deposito</p>
    </div>

    <div class="export-info">
        <strong>Tanggal Export:</strong> {{ $tanggal_export }}<br>
        <strong>Total Data:</strong> {{ $simulations->count() }} simulasi
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">User</th>
                <th width="12%">Bank</th>
                <th width="15%">Nominal</th>
                <th width="8%">Durasi</th>
                <th width="15%">Bunga</th>
                <th width="15%">Total Akhir</th>
                <th width="15%">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($simulations as $index => $simulation)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>
                        <strong>{{ $simulation->user->nama_lengkap }}</strong><br>
                        <span style="font-size: 9px; color: #666;">{{ $simulation->user->email }}</span>
                    </td>
                    <td class="font-bold">{{ $simulation->bank->nama_bank }}</td>
                    <td class="text-right">Rp {{ number_format($simulation->nominal_deposito, 0, ',', '.') }}</td>
                    <td class="text-center">{{ $simulation->jangka_waktu_bulan }} Bulan</td>
                    <td class="text-right">Rp {{ number_format($simulation->bunga_diterima, 0, ',', '.') }}</td>
                    <td class="text-right total-akhir">Rp {{ number_format($simulation->total_akhir, 0, ',', '.') }}
                    </td>
                    <td>
                        {{ $simulation->waktu_simulasi->format('d M Y') }}<br>
                        <span
                            style="font-size: 9px; color: #666;">{{ $simulation->waktu_simulasi->format('H:i') }}</span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center" style="padding: 30px;">
                        Tidak ada data simulasi
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>Dokumen ini dibuat secara otomatis oleh sistem</p>
    </div>
</body>

</html>
