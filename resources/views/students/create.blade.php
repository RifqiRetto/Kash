<x-layouts.app title="Tambah Siswa">
    <div class="max-w-md w-full mx-auto mt-12">
        <div class="bg-white dark:bg-zinc-900 p-8 rounded-2xl shadow-xl space-y-6">
            <!-- Header -->
            <h1 class="text-xl font-semibold text-center">
                Tambah Siswa
            </h1>

            <form method="POST" action="{{ route('students.store') }}" class="space-y-4">
                @csrf

                <!-- NIS -->
                <div>
                    <label for="nis" class="block text-sm font-medium text-zinc-700 dark:text-zinc-200 mb-1">NIS</label>
                    <input
                        id="nis"
                        name="nis"
                        type="text"
                        class="w-full border border-zinc-300 dark:border-zinc-700 rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-500"
                        required
                    >
                </div>

                <!-- Nama -->
                <div>
                    <label for="name" class="block text-sm font-medium text-zinc-700 dark:text-zinc-200 mb-1">Nama</label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        class="w-full border border-zinc-300 dark:border-zinc-700 rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-500"
                        required
                    >
                </div>

                <!-- Actions -->
                <div class="flex justify-between items-center pt-2">
                    <a href="{{ route('students.index') }}"
                       class="text-sm text-zinc-600 dark:text-zinc-400 hover:underline">
                        ← Kembali
                    </a>

                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>