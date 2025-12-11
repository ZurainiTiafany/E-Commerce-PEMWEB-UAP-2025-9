<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Pembayaran</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <div class="bg-white p-6 shadow rounded">

            <h3 class="font-semibold text-lg">Metode Pembayaran</h3>

            <form action="{{ route('member.payment.process') }}" method="POST" class="mt-4">
                @csrf
                
                <p class="mb-2">Total: {{ $total }}</p>

                <select name="method" class="border rounded p-2 w-full">
                    <option value="wallet">Wallet</option>
                    <option value="transfer">Bank Transfer</option>
                </select>

                <button class="mt-3 bg-blue-500 text-white px-4 py-2 rounded">
                    Bayar
                </button>
            </form>

        </div>
    </div>
</x-app-layout>