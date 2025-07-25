<x-layouts.app title="Data Transaksi">
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold">Transaksi</h1>
            <a href="{{ route('transactions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah</a>
        </div>

        @if (session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        <table class="w-full table-auto border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">Siswa</th>
                    <th class="p-2 border">Tipe</th>
                    <th class="p-2 border">Kategori</th>
                    <th class="p-2 border">Jumlah</th>
                    <th class="p-2 border">Keterangan</th>
                    <th class="p-2 border">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $trx)
                    <tr>
                        <td class="p-2 border">{{ $trx->student->name }}</td>
                        <td class="p-2 border">{{ ucfirst($trx->type) }}</td>
                        <td class="p-2 border">{{ $trx->category ?? '-' }}</td>
                        <td class="p-2 border {{ $trx->type === 'keluar' ? 'text-red-600' : 'text-green-600' }}">
                            Rp{{ number_format($trx->amount, 2) }}
                        </td>
                        <td class="p-2 border">{{ $trx->description ?? '-' }}</td>
                        <td class="p-2 border">{{ $trx->created_at->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center p-4">Belum ada transaksi.</td></tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $transactions->links() }}
        </div>
    </div>
</x-layouts.app>
