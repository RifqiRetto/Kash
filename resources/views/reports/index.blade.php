<x-layouts.app title="Laporan Siswa">
    <div class="p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Laporan Siswa</h1>
            <a href="{{ route('laporan.export') }}"
               class="mb-2 inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded shadow transition">
                📊 Export Excel
            </a>
        </div>

        <!-- Tabel -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="w-full table-auto border-collapse">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">NIS</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Nama</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Kas Masuk</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Kas Keluar</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Saldo</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Terakhir Kas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $student)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 text-sm text-gray-800 border-t">{{ $student->nis ?? '-' }}</td>
                            <td class="px-4 py-3 text-sm text-gray-800 border-t">{{ $student->name }}</td>
                            <td class="px-4 py-3 text-sm font-medium text-green-600 border-t">
                                Rp{{ number_format($student->kas_masuk ?? 0, 2) }}
                            </td>
                            <td class="px-4 py-3 text-sm font-medium text-red-600 border-t">
                                Rp{{ number_format($student->kas_keluar ?? 0, 2) }}
                            </td>
                            <td class="px-4 py-3 text-sm font-semibold text-indigo-600 border-t">
                                Rp{{ number_format(($student->kas_masuk ?? 0) - ($student->kas_keluar ?? 0), 2) }}
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-500 border-t">
                                {{ optional($student->transactions->sortByDesc('created_at')->first())->created_at?->format('d M Y') ?? '-' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>
