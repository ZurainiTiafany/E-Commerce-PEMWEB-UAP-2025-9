<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Detail Produk</h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto">
        <div class="bg-white p-6 shadow rounded">
            
            <h3 class="text-2xl font-semibold">{{ $product->name }}</h3>

            <p class="text-gray-700 mt-4">Harga: {{ $product->price }}</p>

            <p class="text-gray-600 mt-2">{{ $product->description }}</p>

            <a href="{{ route('member.checkout.index', $product->id) }}"
               class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">
                Checkout
            </a>

        </div>
    </div>
</x-app-layout>