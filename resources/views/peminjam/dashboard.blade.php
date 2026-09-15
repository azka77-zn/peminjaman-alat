@extends('layouts.app')

@section('title', 'Dashboard Peminjam')

@section('content')
<div class="min-h-screen bg-gray-50">

    {{-- Header --}}
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 py-5">
            <div class="flex items-center justify-between">

                <div>
                    <h1 class="text-2xl font-bold text-gray-800">
                        Dashboard Peminjam
                    </h1>

                    <p class="mt-1 text-sm text-gray-500">
                        Kelola peminjaman alat dengan mudah.
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <div class="text-right">
                        <p class="text-sm font-semibold text-gray-800">
                            {{ auth()->user()->name ?? 'Peminjam' }}
                        </p>

                        <p class="text-xs text-gray-500">
                            Peminjam
                        </p>
                    </div>

                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                        <span class="text-blue-600 font-bold">
                            {{ strtoupper(substr(auth()->user()->name ?? 'P', 0, 1)) }}
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>


    {{-- Main Content --}}
    <div class="max-w-7xl mx-auto px-6 py-8">

        {{-- Welcome --}}
        <div class="mb-8">
            <h2 class="text-xl font-bold text-gray-800">
                Halo, {{ auth()->user()->name ?? 'Peminjam' }} 👋
            </h2>

            <p class="text-gray-500 mt-1">
                Selamat datang di sistem peminjaman alat.
            </p>
        </div>


        {{-- Menu Utama --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            {{-- Melihat Daftar Alat --}}
            <a href="{{ url('/peminjam/katalog') }}"
               class="group bg-white rounded-xl border border-gray-200 p-6 shadow-sm hover:shadow-md hover:border-blue-300 transition">

                <div class="w-12 h-12 rounded-lg bg-blue-100 flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-blue-600"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M20 13V7a2 2 0 00-2-2h-4l-2-2H6a2 2 0 00-2 2v8m16 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m16 0H4"/>
                    </svg>
                </div>

                <h3 class="text-lg font-bold text-gray-800 group-hover:text-blue-600">
                    Daftar Alat
                </h3>

                <p class="text-sm text-gray-500 mt-2">
                    Lihat alat yang tersedia untuk dipinjam.
                </p>

                <div class="mt-5 text-sm font-semibold text-blue-600">
                    Lihat alat →
                </div>
            </a>


            {{-- Ajukan Peminjaman --}}
            <a href="{{ url('/peminjam/peminjaman') }}"
               class="group bg-white rounded-xl border border-gray-200 p-6 shadow-sm hover:shadow-md hover:border-green-300 transition">

                <div class="w-12 h-12 rounded-lg bg-green-100 flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-green-600"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 4v16m8-8H4"/>
                    </svg>
                </div>

                <h3 class="text-lg font-bold text-gray-800 group-hover:text-green-600">
                    Ajukan Peminjaman
                </h3>

                <p class="text-sm text-gray-500 mt-2">
                    Ajukan peminjaman alat yang kamu butuhkan.
                </p>

                <div class="mt-5 text-sm font-semibold text-green-600">
                    Ajukan sekarang →
                </div>
            </a>


            {{-- Riwayat Peminjaman --}}
            <a href="{{ url('/peminjam/riwayat') }}"
               class="group bg-white rounded-xl border border-gray-200 p-6 shadow-sm hover:shadow-md hover:border-purple-300 transition">

                <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-purple-600"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>

                <h3 class="text-lg font-bold text-gray-800 group-hover:text-purple-600">
                    Riwayat Peminjaman
                </h3>

                <p class="text-sm text-gray-500 mt-2">
                    Lihat status dan riwayat peminjaman alat.
                </p>

                <div class="mt-5 text-sm font-semibold text-purple-600">
                    Lihat riwayat →
                </div>
            </a>


            {{-- Pengembalian --}}
            <a href="{{ url('/peminjam/pengembalian') }}"
               class="group bg-white rounded-xl border border-gray-200 p-6 shadow-sm hover:shadow-md hover:border-orange-300 transition">

                <div class="w-12 h-12 rounded-lg bg-orange-100 flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-orange-600"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M3 10h11m0 0l-4-4m4 4l-4 4m11-4v8a2 2 0 01-2 2H5"/>
                    </svg>
                </div>

                <h3 class="text-lg font-bold text-gray-800 group-hover:text-orange-600">
                    Pengembalian Alat
                </h3>

                <p class="text-sm text-gray-500 mt-2">
                    Ajukan pengembalian alat yang sedang dipinjam.
                </p>

                <div class="mt-5 text-sm font-semibold text-orange-600">
                    Kembalikan alat →
                </div>
            </a>

        </div>


        {{-- Informasi --}}
        <div class="mt-8 bg-white rounded-xl border border-gray-200 p-6">

            <h3 class="text-lg font-bold text-gray-800 mb-4">
                Informasi Peminjaman
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <div class="p-4 rounded-lg bg-blue-50">
                    <p class="text-sm font-semibold text-blue-700">
                        1. Pilih Alat
                    </p>
                    <p class="text-xs text-blue-600 mt-1">
                        Lihat alat yang tersedia di katalog.
                    </p>
                </div>

                <div class="p-4 rounded-lg bg-green-50">
                    <p class="text-sm font-semibold text-green-700">
                        2. Ajukan
                    </p>
                    <p class="text-xs text-green-600 mt-1">
                        Tentukan jumlah dan tanggal pengembalian.
                    </p>
                </div>

                <div class="p-4 rounded-lg bg-orange-50">
                    <p class="text-sm font-semibold text-orange-700">
                        3. Kembalikan
                    </p>
                    <p class="text-xs text-orange-600 mt-1">
                        Kembalikan alat setelah selesai digunakan.
                    </p>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection