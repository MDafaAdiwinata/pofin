<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pofin Dashboard</title>

    {{-- Website Icon --}}
    <link rel="icon" type="image/png" href="{{ Vite::asset('resources/img/logo.svg') }}" />

    {{-- Website Logo --}}
    <link rel="icon" type="image/png" href="{{ Vite::asset('resources/img/logo-bulet-putih.svg') }}" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-jakarta_sans antialiased">
    <div class="min-h-screen bg-[#f6f6f8]">
        @include('layouts.navigation')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    @if (session('success'))
        <audio id="notif-sound" autoplay>
            <source src="{{ asset('sound/notif-success.mp3') }}" type="audio/mpeg">
        </audio>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const audio = document.getElementById("notif-sound");
                audio.volume = 0.5; // volume 0.0 - 1.0
                audio.play().catch(() => {
                    // Jika browser minta interaction dulu, bisa di-handle
                    console.log("User belum berinteraksi, suara pending.");
                });
            });
        </script>
    @endif

    <audio id="bg-music" autoplay loop>
        <source src="{{ asset('sound/bg-music.mp3') }}" type="audio/mpeg">
    </audio>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const bg = document.getElementById("bg-music");
            bg.volume = 0.2; // atur volume
            bg.play().catch(() => {
                console.log("User belum interaksi, audio pending.");
            });
        });
    </script>

    <script>
        function sukuBunga() {
            return {
                display: '',
                raw: '',

                format() {
                    // Ambil hanya angka
                    let digits = this.display.replace(/\D/g, '');

                    if (!digits) {
                        this.display = '';
                        this.raw = '';
                        return;
                    }

                    // Bagi 100 → format persen
                    let value = (parseInt(digits) / 100).toFixed(2);

                    // Untuk DB (titik)
                    this.raw = value;

                    // Untuk tampilan (koma)
                    this.display = value.replace('.', ',');
                }
            }
        }
    </script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
