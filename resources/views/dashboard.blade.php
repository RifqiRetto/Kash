<x-layouts.app :title="__('Dashboard')">
    <div class="p-6 space-y-6">
        <h1 class="text-xl font-bold">Dashboard</h1>

        <!-- Pintasan ke manajemen siswa -->
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <a href="{{ route('students.index') }}" class="p-4 bg-blue-100 hover:bg-blue-200 rounded-lg border text-center shadow">
                <div class="text-lg font-semibold text-blue-800">📚 Manajemen Siswa</div>
                <div class="text-sm text-blue-600">Tambah, edit, dan hapus data siswa</div>
            </a>
            <a href="{{ route('transactions.index') }}" class="p-4 bg-blue-100 hover:bg-blue-200 rounded-lg border text-center shadow">
                <div class="text-lg font-semibold text-blue-800">📚 Transaksi Sisq</div>
                <div class="text-sm text-blue-600">Tambah, edit, dan hapus transaksi siswa</div>
            </a>
            <!-- Bisa tambahkan pintasan lain di sini -->
        </div>
    </div>
</x-layouts.app