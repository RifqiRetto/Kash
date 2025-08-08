<x-layouts.app title="Manajemen User">
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4">Manajemen User</h1>

        @if(session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        <table class="w-full table-auto border border-collapse border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border">#</th>
                    <th class="p-2 border">Nama</th>
                    <th class="p-2 border">Email</th>
                    <th class="p-2 border">Role</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                    <tr class="text-sm">
                        <td class="p-2 border text-center">{{ $index + 1 }}</td>
                        <td class="p-2 border">{{ $user->name }}</td>
                        <td class="p-2 border">{{ $user->email }}</td>
                        <td class="p-2 border text-center">{{ $user->role }}</td>
                        <td class="p-2 border text-center">
                            <form method="POST" action="{{ route('users.updateRole', $user->id) }}">
                                @csrf
                                @method('PATCH')
                                <select name="role" class="border rounded px-1 py-0.5 text-sm">
                                    <option value="viewer" @selected($user->role === 'viewer')>viewer</option>
                                    <option value="admin" @selected($user->role === 'admin')>admin</option>
                                </select>
                                <button type="submit" class="ml-1 px-2 py-0.5 bg-blue-500 text-white rounded text-sm">
                                    Simpan
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>
