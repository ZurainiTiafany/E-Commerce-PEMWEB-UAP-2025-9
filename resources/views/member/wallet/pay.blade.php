@extends('layouts.member')

@push('styles')
<style>
    body {
        font-size: 14px !important;
    }
    /* CARD SALDO */
    .wallet-card {
        background: #FFF0F3;
        border: 2px solid #A4133C;
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }
    .wallet-title {
        color: #A4133C;
        font-weight: 700;
        font-size: 14px;
    }
    .wallet-balance {
        font-size: 32px;
        font-weight: bold;
        color: #A4133C;
        margin-top: 10px;
    }

    /* QUICK BUTTON NOMINAL */
    .nominal-btn {
        background: #A4133C;
        color: white;
        padding: 12px;
        border-radius: 12px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: 0.2s;
    }
    .nominal-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 10px rgba(164,19,60,0.25);
    }

    /* FORM INPUT */
    .wallet-input {
        border: 2px solid #A4133C;
        padding: 10px;
        border-radius: 10px;
    }

    /* TOMBOL BUAT VA */
    .wallet-submit {
        background: #A4133C;
        color: white;
        padding: 10px;
        border-radius: 12px;
        border: none;
        width: 100%;
        margin-top: 12px;
        font-weight: 700;
        transition: 0.2s;
    }
    .wallet-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 10px rgba(164,19,60,0.25);
    }

    /* TABLE */
    .wallet-table th {
        color: #A4133C;
        font-weight: 700;
        border-bottom: 2px solid #A4133C;
    }
    .wallet-table td {
        padding: 10px 5px;
    }
</style>
@endpush

@section('content')

<div class="container mt-4">

    {{-- SALDO --}}
    <div class="wallet-card mb-4">
        <h3 class="wallet-title">Saldo Wallet</h3>
        <p class="wallet-balance">Rp {{ number_format($wallet->balance, 0, ',', '.') }}</p>
    </div>

    {{-- TOP UP --}}
    <div class="wallet-card mb-4">
        <h3 class="wallet-title mb-3">Top Up Saldo</h3>

        {{-- NOMINAL CEPAT --}}
        <div class="row g-2 mb-3">
            @foreach ([10000,20000,50000,100000,200000,500000] as $nom)
            <div class="col-4">
                <button class="nominal-btn w-100"
                        onclick="document.getElementById('amount').value={{ $nom }}">
                    Rp {{ number_format($nom, 0, ',', '.') }}
                </button>
            </div>
            @endforeach
        </div>

        {{-- FORM NOMINAL CUSTOM --}}
        <form action="{{ route('member.wallet.topup') }}" method="POST">
            @csrf
            <input id="amount" name="amount" type="number"
                   class="wallet-input w-100"
                   placeholder="Nominal minimal 1000" required>

            <button class="wallet-submit">Buat Nomor VA</button>
        </form>
    </div>

    {{-- RIWAYAT --}}
    <div class="wallet-card mb-5">
        <h3 class="wallet-title mb-3">Riwayat Top Up</h3>

        <table class="wallet-table w-100">
            <tr>
                <th>VA</th>
                <th>Jumlah</th>
                <th>Status</th>
            </tr>

            @foreach ($history as $h)
            <tr>
                <td>{{ $h->va_number }}</td>
                <td>Rp {{ number_format($h->amount, 0, ',', '.') }}</td>
                <td>{{ ucfirst($h->status) }}</td>
            </tr>
            @endforeach
        </table>
    </div>

</div>

@include('components.footer-member')

@endsection
