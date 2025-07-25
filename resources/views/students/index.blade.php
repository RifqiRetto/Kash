<x-layouts.app title="Manajemen Siswa">
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold">Daftar Siswa</h1>
            <a href="{{ route('students.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Siswa</a>
        </div>

        @if (session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        <table class="w-full table-auto border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">NIS</th>
                    <th class="p-2 border">Nama</th>
                    <th class="p-2 border">Saldo</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td class="p-2 border">{{ $student->nis }}</td>
                        <td class="p-2 border">{{ $student->name }}</td>
                        <td class="p-2 border">Rp{{ number_format($student->total_saldo, 2) }}</td>
                        <td class="p-2 border space-x-2">
                            <a href="{{ route('students.edit', $student) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus siswa?')">
                                @csrf @method('DELETE')
                                <button class="text-red-500">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="p-4 text-center">Tidak ada data siswa</td></tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $students->links() }}
        </div>
    </div>
</x-layouts.app>
