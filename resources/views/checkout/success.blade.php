@extends ('layouts.app')
@section ('title', 'Pembayaran Berhasil')
@section ('content')
    <main class="mx-auto max-w-3xl px-6 py-20 text-center">
        <div
            class="inline-block w-full max-w-md rounded-3xl border border-slate-200 bg-white p-12 shadow-sm"
        >
            <div
                class="roundedfull mx-auto mb-6 flex h-24 w-24 items-center justify-center bg-green-100 text-green-500"
            >
                <svg class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="3"
                        d="M5 13l4 4L19 7"
                    ></path>
                </svg>
            </div>
            <h2 class="mb-4 text-3xl font-black">Terima Kasih!</h2>
            <p class="mb-8 leading-relaxed text-slate-500">Pembayaran untuk pesanan <strong>{{ $transaction->order_id }}
                </strong> sedang diproses atau telah berhasil. E-Ticket akan dikirim ke email Anda (<strong>{{$transaction->customer_email }}
                </strong>) setelah pembayaran terkonfirmasi lunas.</p>
            <a
                href="{{ route('home') }}"
                class="hover:bg-indigo700 inline-block rounded-xl bg-indigo-600 px-8 py-4 font-bold text-white transition">
                Kembali ke Beranda
            </a>
        </div>
    </main>
@endsection
