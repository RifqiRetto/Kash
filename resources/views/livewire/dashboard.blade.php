<div class="min-h-screen bg-gray-100 text-gray-800">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">Dashboard</h1>
                <p class="text-sm text-gray-500 mt-1">Selamat datang di sistem manajemen sekolah</p>
            </div>

            <!-- Profile Dropdown -->
            <div class="relative">
                <button class="flex items-center gap-2 focus:outline-none" id="profileMenuBtn">
                    <!-- Avatar Bulat -->
                    <span id="profileAvatar"
                          class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-500 text-white text-xl">
                        <!-- emoji random akan masuk via JS -->
                    </span>
                    <!-- Icon Panah -->
                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div id="profileMenu" class="hidden absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-md py-2 z-50">
                    <div class="px-4 py-3 border-b">
                        <p class="font-medium text-gray-800">{{ auth()->user()->name }}</p>
                        <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
                    </div>
                    <a href="{{ route('settings.profile') }}" 
                       class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        ⚙️ Settings
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" 
                                class="w-full flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            🚪 Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Main -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-10">

        <!-- Ringkasan -->
        <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-white rounded-lg shadow p-5">
                <p class="text-sm text-gray-500 mb-1">Total Masuk</p>
                <p class="text-2xl font-semibold text-emerald-600">Rp{{ number_format($totalMasuk) }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-5">
                <p class="text-sm text-gray-500 mb-1">Total Keluar</p>
                <p class="text-2xl font-semibold text-rose-600">Rp{{ number_format($totalKeluar) }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-5">
                <p class="text-sm text-gray-500 mb-1">Saldo Akhir</p>
                <p class="text-2xl font-semibold text-indigo-600">Rp{{ number_format($saldo) }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-5">
                <p class="text-sm text-gray-500 mb-1">Jumlah Siswa</p>
                <p class="text-2xl font-semibold">{{ $jumlahSiswa }}</p>
            </div>
        </section>

        <!-- Menu Utama -->
        <section>
            <h2 class="text-lg font-semibold mb-4">Menu Utama</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
                <!-- Card Manajemen Siswa -->
                <a href="{{ route('students.index') }}"
                   class="group bg-white rounded-lg shadow hover:shadow-md p-5 transition hover:border-indigo-400 border border-transparent">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-12 h-12 mb-4 rounded-full bg-indigo-100 flex items-center justify-center group-hover:bg-indigo-200">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M9 20H4v-2a3 3 0 015.356-1.857M12 12a4 4 0 100-8 4 4 0 000 8z"/>
                            </svg>
                        </div>
                        <h3 class="text-base font-semibold mb-1">Manajemen Siswa</h3>
                        <p class="text-sm text-gray-500">Kelola data siswa</p>
                    </div>
                </a>

                <!-- Card Transaksi -->
                <a href="{{ route('transactions.index') }}"
                   class="group bg-white rounded-lg shadow hover:shadow-md p-5 transition hover:border-green-400 border border-transparent">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-12 h-12 mb-4 rounded-full bg-green-100 flex items-center justify-center group-hover:bg-green-200">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-10v2m0 10v2"/>
                            </svg>
                        </div>
                        <h3 class="text-base font-semibold mb-1">Transaksi</h3>
                        <p class="text-sm text-gray-500">Kelola pembayaran & kas</p>
                    </div>
                </a>

                <!-- Card Laporan -->
                <a href="{{ route('reports.index') }}"
                   class="group bg-white rounded-lg shadow hover:shadow-md p-5 transition hover:border-purple-400 border border-transparent">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-12 h-12 mb-4 rounded-full bg-purple-100 flex items-center justify-center group-hover:bg-purple-200">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 17v-6h13M5 10h2V7a2 2 0 012-2h2V3H7a4 4 0 00-4 4v3h2z"/>
                            </svg>
                        </div>
                        <h3 class="text-base font-semibold mb-1">Laporan</h3>
                        <p class="text-sm text-gray-500">Lihat laporan keuangan</p>
                    </div>
                </a>
            </div>
        </section>

        <!-- Aktivitas Terbaru -->
        <section class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Aktivitas Terbaru</h3>
            <div class="space-y-4">
                <div class="flex items-start gap-3">
                    <div class="w-2.5 h-2.5 mt-1 rounded-full bg-green-400"></div>
                    <div>
                        <p class="text-sm">Siswa baru <span class="font-medium">Ahmad Fauzi</span> ditambahkan</p>
                        <p class="text-xs text-gray-400">2 menit lalu</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-2.5 h-2.5 mt-1 rounded-full bg-blue-400"></div>
                    <div>
                        <p class="text-sm">Pembayaran SPP diterima dari <span class="font-medium">Siti Nurhaliza</span></p>
                        <p class="text-xs text-gray-400">15 menit lalu</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-2.5 h-2.5 mt-1 rounded-full bg-yellow-400"></div>
                    <div>
                        <p class="text-sm">Laporan bulanan digenerate</p>
                        <p class="text-xs text-gray-400">1 jam lalu</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<!-- JS Toggle Dropdown + Random Emoji -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const btn = document.getElementById("profileMenuBtn");
        const menu = document.getElementById("profileMenu");

        // Toggle dropdown
        btn.addEventListener("click", (e) => {
            e.stopPropagation();
            menu.classList.toggle("hidden");
        });
        document.addEventListener("click", (e) => {
            if (!menu.contains(e.target) && !btn.contains(e.target)) {
                menu.classList.add("hidden");
            }
        });

        // Avatar emoji random
        const emojis = ["😎","🐱","🐶","🐼","🐸","🦊","🐧","🐯","🐰","🦄","🐙","🐤","🐻","🐨","🐮","🐷","🐹","🐢","🐞","🦋","🐬","🦉","🐝"];
        const avatar = document.getElementById("profileAvatar");
        if (avatar) {
            const randomEmoji = emojis[Math.floor(Math.random() * emojis.length)];
            avatar.textContent = randomEmoji;
        }
    });
</script>
