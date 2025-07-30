<div class="p-4">
    <h1 class="text-xl font-bold mb-4">Dashboard</h1>

    {{-- Ringkasan Kas --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="p-4 bg-white rounded shadow">
            <div class="text-sm text-gray-600">Total Masuk</div>
            <div class="text-lg font-bold text-green-700">Rp{{ number_format($totalMasuk) }}</div>
        </div>

        <div class="p-4 bg-white rounded shadow">
            <div class="text-sm text-gray-600">Total Keluar</div>
            <div class="text-lg font-bold text-red-700">Rp{{ number_format($totalKeluar) }}</div>
        </div>

        <div class="p-4 bg-white rounded shadow">
            <div class="text-sm text-gray-600">Saldo Akhir</div>
            <div class="text-lg font-bold text-blue-700">Rp{{ number_format($saldo) }}</div>
        </div>

        <div class="p-4 bg-white rounded shadow">
            <div class="text-sm text-gray-600">Jumlah Siswa</div>
            <div class="text-lg font-bold text-gray-800">{{ $jumlahSiswa }}</div>
        </div>
    </div>

    {{-- Navigasi --}}
    <div class="flex flex-wrap gap-4">
        <a href="{{ route('students.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">
            Siswa
        </a>
        <a href="{{ route('transactions.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">
            Transaksi
        </a>
        <a href="{{ route('reports.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">
            Laporan
        </a>
    </div>
    
</div>
