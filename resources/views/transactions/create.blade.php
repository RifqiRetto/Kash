<x-layouts.app title="Tambah Transaksi">
    <div class="p-6 max-w-xl mx-auto">
        <h1 class="text-xl font-bold mb-4">Tambah Transaksi</h1>

        <form method="POST" action="{{ route('transactions.store') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block">Siswa</label>
                <select name="student_id" class="w-full border p-2" required>
                    <option value="">-- Pilih Siswa --</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }} ({{ $student->nis }})</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block">Tipe</label>
                <select name="type" class="w-full border p-2" required>
                    <option value="masuk">Masuk</option>
                    <option value="keluar">Keluar</option>
                </select>
            </div>

            <div>
                <label class="block">Kategori</label>
                <input name="category" class="w-full border p-2" placeholder="(opsional, contoh: sosial, tugas)">
            </div>

            <div>
                <label class="block">Jumlah</label>
                <input name="amount" type="number" step="0.01" class="w-full border p-2" required>
            </div>

            <div>
                <label class="block">Keterangan</label>
                <textarea name="description" class="w-full border p-2" rows="3"></textarea>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('transactions.index') }}" class="bg-gray-300 px-4 py-2 rounded">Batal</a>
                <button class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</x-layouts.app>
