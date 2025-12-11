<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Riwayat Transaksi</h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto">
        <div class="bg-white p-6 rounded shadow">

            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="p-2 text-left">ID</th>
                        <th class="p-2 text-left">Produk</th>
                        <th class="p-2 text-left">Total</th>
                        <th class="p-2 text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $t)
                        <tr class="border-b">
                            <td class="p-2">{{ $t->id }}</td>
                            <td class="p-2">{{ $t->product->name }}</td>
                            <td class="p-2">{{ $t->total }}</td>
                            <td class="p-2">{{ $t->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>