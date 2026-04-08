<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Sekolah</title>
    <!-- Tailwind v3+ CDN untuk arbitrary colors -->
    <script src="https://cdn.tailwindcss.com"></script>
</head> 
<body class="bg-[#F6EFE7] min-h-screen flex flex-col justify-between">

    <!-- HEADER -->
    <header class="flex justify-end items-center px-10 py-6">
        @if (Route::has('login'))
            <nav class="flex items-center gap-4 text-sm">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-medium">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-[#1b1b18]">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="bg-[#F97316] text-white px-4 py-1.5 rounded-full text-sm font-medium hover:bg-[#EA580C] transition">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <!-- HERO SECTION -->
    <main class="flex flex-1 items-center justify-center px-10">
        <div class="flex flex-col lg:flex-row items-center gap-16 max-w-6xl w-full">

            <!-- LEFT TEXT -->
            <div class="max-w-xl">
                <h1 class="text-4xl font-bold leading-tight mb-4 text-[#1b1b18]">
                    Selamat Datang di <br>
                    <span class="text-[#F97316]">Pengaduan Sekolah</span>
                </h1>

                <p class="text-gray-500 mb-6">
                    Platform modern untuk mengelola project Anda
                    dengan lebih efisien dan produktif.
                </p>

                <!-- BUTTON -->
                <div class="flex gap-4 mb-6">
                    <a href="{{ route('login') }}"
                       class="bg-[#F97316] text-white px-6 py-3 rounded-full font-medium shadow-md hover:bg-[#EA580C] transition">
                        Mulai Sekarang →
                    </a>

                    <a href="https://smkwiraharapan.sch.id/fasilitas/" class="border px-6 py-3 rounded-full text-[#1b1b18] hover:bg-gray-100">
                        Pelajari Lebih Lanjut
                    </a>
                </div>

                <!-- FEATURES -->
                <div class="flex gap-8 text-sm">
                    <div>
                        <p class="font-semibold">Cepat & Ringan</p>
                        <p class="text-gray-500 text-xs">
                            Performa optimal untuk produktivitas maksimal
                        </p>
                    </div>

                    <div>
                        <p class="font-semibold">Aman & Terpercaya</p>
                        <p class="text-gray-500 text-xs">
                            Keamanan data adalah prioritas utama
                        </p>
                    </div>
                </div>
            </div>

            <!-- RIGHT CARD -->
            <div class="bg-white rounded-2xl shadow-xl p-6 w-[350px]">

                <!-- fake top bar -->
                <div class="flex gap-2 mb-4">
                    <div class="w-3 h-3 bg-gray-200 rounded-full"></div>
                    <div class="w-3 h-3 bg-gray-200 rounded-full"></div>
                    <div class="w-3 h-3 bg-gray-200 rounded-full"></div>
                </div>

                <!-- fake content -->
                <div class="grid grid-cols-3 gap-2 mb-4">
                    <div class="h-12 bg-gray-200 rounded"></div>
                    <div class="h-12 bg-[#FDBA74] rounded"></div>
                    <div class="h-12 bg-gray-200 rounded"></div>
                </div>

                <div class="bg-[#F97316] text-white text-center py-6 rounded-xl font-medium">
                    Dashboard Preview
                </div>
            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <footer class="text-center text-xs text-gray-400 py-6">
        © 2026 Pengaduan Sekolah. All rights reserved.
    </footer>

</body>
</html>