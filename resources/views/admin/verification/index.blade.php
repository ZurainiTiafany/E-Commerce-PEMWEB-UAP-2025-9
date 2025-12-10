<h1>Daftar Toko Belum Diverifikasi</h1>

@if (session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

@if (session('error'))
    <p style="color:red">{{ session('error') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>Nama Toko</th>
        <th>Pemilik</th>
        <th>Aksi</th>
    </tr>

    @forelse ($stores as $store)
    <tr>
        <td>{{ $store->name }}</td>
        <td>{{ $store->user->name }}</td>
        <td>

            <form action="{{ route('admin.verification.approve', $store->id) }}" method="POST" style="display:inline">
                @csrf
                <button type="submit">Setujui</button>
            </form>

            <form action="{{ route('admin.verification.reject', $store->id) }}" method="POST" style="display:inline">
                @csrf
                <input type="text" name="reason" placeholder="Alasan">
                <button type="submit">Tolak</button>
            </form>

        </td>
    </tr>
    @empty
    <tr>
        <td colspan="3">Tidak ada toko menunggu verifikasi.</td>
    </tr>
    @endforelse
</table>