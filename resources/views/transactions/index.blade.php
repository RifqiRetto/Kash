<x-layouts.app title="Kelola Pengguna">
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold">Kelola Pengguna</h1>
        </div>

        @if(session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        <table class="w-full table-auto border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">Nama</th>
                    <th class="p-2 border">Email</th>
                    <th class="p-2 border">Role</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td class="p-2 border">{{ $user->name }}</td>
                        <td class="p-2 border">{{ $user->email }}</td>
                        <td class="p-2 border capitalize">{{ $user->role }}</td>
                        <td class="p-2 border">
                            <form method="POST" action="{{ route('users.toggleRole', $user) }}">
                                @csrf
                                <button type="submit" class="px-3 py-1 text-white rounded
                                    {{ $user->role === 'admin' ? 'bg-red-500 hover:bg-red-600' : 'bg-blue-500 hover:bg-blue-600' }}">
                                    Jadikan {{ $user->role === 'admin' ? 'Viewer' : 'Admin' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center p-4">Belum ada pengguna.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.app>
