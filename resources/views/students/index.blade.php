<x-layouts.app title="Manajemen Siswa">
    <div class="p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Daftar Siswa</h1>
            <a href="{{ route('students.create') }}"
               class="mb-2 inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded shadow transition">
                ➕ Tambah Siswa
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
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">NIS</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Nama</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Saldo</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 text-sm text-gray-800 border-t">{{ $student->nis }}</td>
                            <td class="px-4 py-3 text-sm text-gray-800 border-t">{{ $student->name }}</td>
                            <td class="px-4 py-3 text-sm text-gray-800 border-t">Rp{{ number_format($student->total_saldo, 2) }}</td>
                            <td class="px-4 py-3 text-center border-t">
                                <div class="flex justify-center gap-2">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('students.edit', $student) }}"
                                       class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600 transition shadow">
                                        ✏️ Edit
                                    </a>
                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('students.destroy', $student) }}" method="POST" 
                                          onsubmit="return confirm('Yakin hapus siswa?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-white bg-red-500 rounded-md hover:bg-red-600 transition shadow">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-6 text-center text-gray-500">Tidak ada data siswa</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $students->links() }}
        </div>
    </div>
</x-layouts.app>
