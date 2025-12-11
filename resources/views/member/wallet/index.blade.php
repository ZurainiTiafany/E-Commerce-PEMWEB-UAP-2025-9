<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Wallet</h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto">
        <div class="bg-white p-6 rounded shadow">

            <h3 class="text-lg font-semibold">Saldo Wallet</h3>

            <p class="mt-3 text-2xl font-bold">Rp {{ number_format($wallet->balance, 0) }}</p>

        </div>
    </div>
</x-app-layout>
