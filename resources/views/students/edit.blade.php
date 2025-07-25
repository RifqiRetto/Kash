<x-layouts.app title="Edit Siswa">
    <div class="p-6 max-w-lg mx-auto">
        <h1 class="text-xl font-bold mb-4">Edit Siswa</h1>

        <form method="POST" action="{{ route('students.update', $student) }}" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="block">NIS</label>
                <input name="nis" value="{{ $student->nis }}" class="w-full border p-2" required>
            </div>
            <div>
                <label class="block">Nama</label>
                <input name="name" value="{{ $student->name }}" class="w-full border p-2" required>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('students.index') }}" class="bg-gray-300 px-4 py-2 rounded">Kembali</a>
                <button class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>
</x-layouts.app>
