@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <h1 class="text-2xl font-semibold mb-4">Verifikasi Toko</h1>

        <div class="bg-white p-6 shadow-sm rounded-lg">
            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-2 border">Nama Toko</th>
                        <th class="p-2 border">Pemilik</th>
                        <th class="p-2 border">Status</th>
                        <th class="p-2 border">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($stores as $store)
                        <tr>
                            <td class="p-2 border">{{ $store->name }}</td>
                            <td class="p-2 border">{{ $store->user->name }}</td>
                            <td class="p-2 border">{{ $store->status }}</td>

                            <td class="p-2 border flex gap-2">

                                <form action="{{ route('admin.verification.approve', $store->id) }}" method="POST">
                                    @csrf
                                    <button class="bg-green-500 text-white px-3 py-1 rounded">Approve</button>
                                </form>

                                <form action="{{ route('admin.verification.reject', $store->id) }}" method="POST">
                                    @csrf
                                    <button class="bg-red-500 text-white px-3 py-1 rounded">Reject</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
</div>
@endsection