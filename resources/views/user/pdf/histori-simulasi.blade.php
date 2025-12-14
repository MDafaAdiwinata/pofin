<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Histori Simulasi Deposito</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #00683E;
            padding-bottom: 15px;
        }

        .header h2 {
            margin: 5px 0;
            color: #00683E;
            font-size: 20px;
        }

        .header p {
            margin: 3px 0;
            color: #666;
        }

        .user-info {
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .user-info table {
            width: 100%;
            border-collapse: collapse;
        }

        .user-info td {
            padding: 5px;
            font-size: 11px;
        }

        .user-info .label {
            font-weight: bold;
            width: 150px;
            color: #333;
        }

        .export-info {
            text-align: right;
            margin-bottom: 20px;
            font-size: 10px;
            color: #666;
        }

        table.data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table.data-table th {
            background-color: #00683E;
            color: white;
            padding: 10px 8px;
            text-align: left;
            font-size: 11px;
            border: 1px solid #00523B;
        }

        table.data-table td {
            padding: 8px;
            border: 1px solid #ddd;
            font-size: 10px;
        }

        table.data-table tr:nth-child(even) {
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
            color: #00683E;
            font-weight: bold;
        }

        .summary {
            margin-top: 30px;
            background-color: #f0f9f4;
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #00683E;
        }

        .summary table {
            width: 100%;
            border-collapse: collapse;
        }

        .summary td {
            padding: 8px;
            font-size: 11px;
        }

        .summary .label {
            font-weight: bold;
            color: #333;
            width: 250px;
        }

        .summary .value {
            text-align: right;
            color: #00683E;
            font-weight: bold;
            font-size: 12px;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }

        .empty-state {
            text-align: center;
            padding: 50px;
            color: #999;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>HISTORI SIMULASI DEPOSITO</h2>
        <p>Sistem Perbandingan Bunga Deposito</p>
    </div>

    <div class="user-info">
        <table>
            <tr>
                <td class="label">Nama Lengkap</td>
                <td>: {{ $user->nama_lengkap }}</td>
                <td class="label">Username</td>
                <td>: {{ $user->username }}</td>
            </tr>
            <tr>
                <td class="label">Email</td>
                <td>: {{ $user->email }}</td>
                <td class="label">Tanggal Export</td>
                <td>: {{ $tanggal_export }}</td>
            </tr>
        </table>
    </div>

    <div class="export-info">
        <strong>Total Data:</strong> {{ $simulations->count() }} simulasi
    </div>

    @if ($simulations->count() > 0)
        <table class="data-table">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="15%">Bank</th>
                    <th width="15%">Nominal Deposito</th>
                    <th width="10%">Durasi</th>
                    <th width="15%">Bunga Diterima</th>
                    <th width="15%">Total Akhir</th>
                    <th width="15%">Tanggal Simulasi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalNominal = 0;
                    $totalBunga = 0;
                    $totalAkhir = 0;
                @endphp
                @foreach ($simulations as $index => $simulation)
                    @php
                        $totalNominal += $simulation->nominal_deposito;
                        $totalBunga += $simulation->bunga_diterima;
                        $totalAkhir += $simulation->total_akhir;
                    @endphp
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="font-bold">{{ $simulation->bank->nama_bank }}</td>
                        <td class="text-right">Rp {{ number_format($simulation->nominal_deposito, 0, ',', '.') }}</td>
                        <td class="text-center">{{ $simulation->jangka_waktu_bulan }} Bulan</td>
                        <td class="text-right">Rp {{ number_format($simulation->bunga_diterima, 0, ',', '.') }}</td>
                        <td class="text-right total-akhir">Rp
                            {{ number_format($simulation->total_akhir, 0, ',', '.') }}</td>
                        <td class="text-center">
                            {{ $simulation->waktu_simulasi->format('d M Y') }}<br>
                            <span
                                style="font-size: 9px; color: #666;">{{ $simulation->waktu_simulasi->format('H:i') }}</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="summary">
            <h3 style="margin: 0 0 15px 0; color: #00683E;">RINGKASAN</h3>
            <table>
                <tr>
                    <td class="label">Total Simulasi Deposito</td>
                    <td class="value">{{ $simulations->count() }} simulasi</td>
                </tr>
                <tr>
                    <td class="label">Total Nominal Deposito</td>
                    <td class="value">Rp {{ number_format($totalNominal, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="label">Total Bunga Diterima</td>
                    <td class="value">Rp {{ number_format($totalBunga, 0, ',', '.') }}</td>
                </tr>
                <tr style="border-top: 2px solid #00683E;">
                    <td class="label" style="font-size: 13px;">TOTAL SALDO AKHIR</td>
                    <td class="value" style="font-size: 14px;">Rp {{ number_format($totalAkhir, 0, ',', '.') }}</td>
                </tr>
            </table>
        </div>
    @else
        <div class="empty-state">
            <p style="font-size: 14px; font-weight: bold;">Belum ada histori simulasi</p>
            <p>Data simulasi deposito akan muncul di sini</p>
        </div>
    @endif

    <div class="footer">
        <p>Dokumen ini dibuat secara otomatis oleh sistem</p>
        <p>© {{ date('Y') }} Sistem Perbandingan Bunga Deposito - {{ $user->nama_lengkap }}</p>
    </div>
</body>

</html>
