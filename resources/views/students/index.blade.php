<x-layouts.app title="Manajemen Siswa">
    <div class="p-6 max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
            <h1 class="text-2xl font-semibold">📋 Manajemen Siswa</h1>
            <a href="{{ route('students.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
                ➕ Tambah Siswa
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 bg-green-100 text-green-800 border border-green-300 px-4 py-3 rounded-lg">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="overflow-auto rounded-lg shadow-md">
            <table class="w-full text-sm text-left border border-zinc-300 bg-white dark:bg-zinc-900">
                <thead class="bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-200">
                    <tr>
                        <th class="p-3 border">NIS</th>
                        <th class="p-3 border">Nama</th>
                        <th class="p-3 border">Saldo</th>
                        <th class="p-3 border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                        <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800 transition">
                            <td class="p-3 border">{{ $student->nis }}</td>
                            <td class="p-3 border">{{ $student->name }}</td>
                            <td class="p-3 border">Rp{{ number_format($student->total_saldo, 2, ',', '.') }}</td>
                            <td class="p-3 border text-center space-x-2">
                                <a href="{{ route('students.edit', $student) }}"
                                   class="text-blue-600 hover:underline font-medium">Edit</a>
                                <form action="{{ route('students.destroy', $student) }}"
                                      method="POST"
                                      class="inline"
                                      onsubmit="return confirm('Yakin hapus siswa?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline font-medium">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center p-6 text-zinc-500">
                                Tidak ada data siswa.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $students->links() }}
        </div>
    </div>
</x-layouts.app>