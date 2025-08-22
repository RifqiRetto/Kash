<x-layouts.app title="Data Transaksi">
    <div class="p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Data Transaksi</h1>
            <a href="{{ route('transactions.create') }}"
               class="mb-2 inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded shadow transition">
                ➕ Tambah Transaksi
            </a>
        </div>

        <!-- Notifikasi -->
        @if (session('success'))
            <div class="mb-4 bg-emerald-100 text-emerald-700 px-4 py-2 rounded-lg shadow">
                ✅ {{ session('success') }}
            </div>
        @endif

        <!-- Tabel -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="w-full table-auto border-collapse">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Siswa</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Tipe</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Kategori</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Jumlah</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Keterangan</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $trx)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 text-sm text-gray-800 border-t">{{ $trx->student->name }}</td>
                            <td class="px-4 py-3 text-sm border-t">
                                <span class="px-2 py-1 rounded-full text-xs font-medium
                                    {{ $trx->type === 'keluar' ? 'bg-red-100 text-red-600' : 'bg-green-100 text-green-600' }}">
                                    {{ ucfirst($trx->type) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-800 border-t">{{ $trx->category ?? '-' }}</td>
                            <td class="px-4 py-3 text-sm font-semibold border-t 
                                {{ $trx->type === 'keluar' ? 'text-red-600' : 'text-green-600' }}">
                                Rp{{ number_format($trx->amount, 2) }}
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-700 border-t">{{ $trx->description ?? '-' }}</td>
                            <td class="px-4 py-3 text-sm text-gray-500 border-t">{{ $trx->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center text-gray-500">Belum ada transaksi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $transactions->links() }}
        </div>
    </div>
</x-layouts.app>
