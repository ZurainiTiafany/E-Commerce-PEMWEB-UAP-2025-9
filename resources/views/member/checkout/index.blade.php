<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Checkout</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <div class="bg-white p-6 rounded shadow">

            <h3 class="font-semibold text-lg">Checkout Produk</h3>

            <p class="mt-3">Produk: {{ $product->name }}</p>
            <p>Harga: {{ $product->price }}</p>

            <form action="{{ route('member.payment.index') }}" method="GET" class="mt-4">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button class="bg-green-500 text-white px-4 py-2 rounded">Lanjut Pembayaran</button>
            </form>

        </div>
    </div>
</x-app-layout>