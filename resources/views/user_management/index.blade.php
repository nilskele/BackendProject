@extends('layouts.fullwidth')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-8">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">User Management</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-6 rounded-md">
            <strong>Success:</strong> {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('user_management.store') }}" method="POST" class="mb-6">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <input type="text" name="name" placeholder="Name" class="border p-2 rounded" required>
            <input type="email" name="email" placeholder="Email" class="border p-2 rounded" required>
            <input type="password" name="password" placeholder="Password" class="border p-2 rounded" required>
            <select name="is_admin" class="border p-2 rounded" required>
                <option value="0">Regular User</option>
                <option value="1">Admin</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded mt-4">Create User</button>
    </form>

    <table class="table-auto w-full bg-white shadow-md rounded-lg">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Role</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2">{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                    <td class="px-4 py-2">
                        <form action="{{ route('user_management.update_role', $user) }}" method="POST" class="inline-block">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="is_admin" value="{{ $user->is_admin ? 0 : 1 }}">
                            <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded">
                                {{ $user->is_admin ? 'Revoke Admin' : 'Make Admin' }}
                            </button>
                        </form>

                        <form action="{{ route('user_management.destroy', $user) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
