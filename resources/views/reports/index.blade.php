<x-layouts.app title="Laporan Siswa">
    <h1 class="text-2xl font-bold mb-4">Laporan Siswa</h1>

    <!-- Tombol Export -->
    <a href="{{ route('laporan.export') }}" class="mb-4 inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
        Export Excel
    </a>

    <!-- Tabel -->
    <table class="w-full table-auto border">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">NIS</th>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Kas Masuk</th>
                <th class="border px-4 py-2">Kas Keluar</th>
                <th class="border px-4 py-2">Saldo</th>
                <th class="border px-4 py-2">Terakhir Kas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $student)
                <tr>
                    <td class="border px-4 py-2">{{ $student->nis ?? '-' }}</td>
                    <td class="border px-4 py-2">{{ $student->name }}</td>
                    <td class="border px-4 py-2">{{ number_format($student->kas_masuk ?? 0, 2) }}</td>
                    <td class="border px-4 py-2">{{ number_format($student->kas_keluar ?? 0, 2) }}</td>
                    <td class="border px-4 py-2">{{ number_format(($student->kas_masuk ?? 0) - ($student->kas_keluar ?? 0), 2) }}</td>
                    <td class="border px-4 py-2">
                        {{ optional($student->transactions->sortByDesc('created_at')->first())->created_at?->format('d-m-Y') ?? '-' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layouts.app>
