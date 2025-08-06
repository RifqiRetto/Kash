<div class="min-h-screen bg-gray-50">
    <!-- Header Section -->
    <div class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="py-6">
                <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
                <p class="mt-2 text-sm text-gray-600">Selamat datang di sistem manajemen sekolah</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Ringkasan Kas -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <p class="text-sm text-gray-600">Total Masuk</p>
                <p class="text-2xl font-bold text-green-700">Rp{{ number_format($totalMasuk) }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <p class="text-sm text-gray-600">Total Keluar</p>
                <p class="text-2xl font-bold text-red-700">Rp{{ number_format($totalKeluar) }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <p class="text-sm text-gray-600">Saldo Akhir</p>
                <p class="text-2xl font-bold text-blue-700">Rp{{ number_format($saldo) }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <p class="text-sm text-gray-600">Jumlah Siswa</p>
                <p class="text-2xl font-bold text-gray-800">{{ $jumlahSiswa }}</p>
            </div>
        </div>

        <!-- Menu Utama -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-900 mb-6">Menu Utama</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <a href="{{ route('students.index') }}" 
                   class="group bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md hover:border-blue-300 transition-all duration-200">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-4 group-hover:bg-blue-200 transition-colors">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Manajemen Siswa</h3>
                        <p class="text-sm text-gray-600">Kelola data siswa</p>
                    </div>
                </a>

                <a href="{{ route('transactions.index') }}" 
                   class="group bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md hover:border-green-300 transition-all duration-200">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-4 group-hover:bg-green-200 transition-colors">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Transaksi</h3>
                        <p class="text-sm text-gray-600">Kelola pembayaran & kas</p>
                    </div>
                </a>

                <a href="{{ route('reports.index') }}" 
                   class="group bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md hover:border-purple-300 transition-all duration-200">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mb-4 group-hover:bg-purple-200 transition-colors">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Laporan</h3>
                        <p class="text-sm text-gray-600">Lihat laporan keuangan</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Aktivitas Terbaru -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Aktivitas Terbaru</h3>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-900">Siswa baru <span class="font-medium">Ahmad Fauzi</span> ditambahkan</p>
                            <p class="text-xs text-gray-500">2 menit lalu</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-2 h-2 bg-blue-400 rounded-full"></div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-900">Pembayaran SPP diterima dari <span class="font-medium">Siti Nurhaliza</span></p>
                            <p class="text-xs text-gray-500">15 menit lalu</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-2 h-2 bg-yellow-400 rounded-full"></div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-900">Laporan bulanan digenerate</p>
                            <p class="text-xs text-gray-500">1 jam lalu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
