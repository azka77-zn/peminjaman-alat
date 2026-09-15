@extends('layouts.app')

@section('title', 'Katalog Alat')

@section('header-title', 'Katalog Alat')

@section('content')

<div class="space-y-6">

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- Pesan error --}}
    @if(session('error'))
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    {{-- Header --}}
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">
                Katalog Alat Tersedia
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Pilih alat yang ingin kamu pinjam.
            </p>
        </div>
    </div>

    {{-- Form Peminjaman --}}
    <form action="{{ route('peminjam.peminjaman.ajukan') }}" method="POST">
        @csrf

        <div class="bg-white rounded-xl shadow-sm border border-gray-200">

            {{-- Bagian tanggal --}}
            <div class="p-6 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Rencana Tanggal Kembali
                </label>

                <input
                    type="date"
                    name="tgl_kembali_plan"
                    required
                    class="w-full md:w-80 border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            {{-- Tabel alat --}}
            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left">

                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="py-3 px-4 text-center font-semibold text-gray-700">
                                Pilih
                            </th>

                             <th class="py-3 px-4 text-center font-semibold text-gray-700">
                                Gambar
                            </th>
                            <th class="py-3 px-4 font-semibold text-gray-700">
                                Nama Alat
                            </th>

                            <th class="py-3 px-4 font-semibold text-gray-700">
                                Kategori
                            </th>

                            <th class="py-3 px-4 text-center font-semibold text-gray-700">
                                Stok
                            </th>

                            <th class="py-3 px-4 text-center font-semibold text-gray-700">
                                Jumlah
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($alats as $index => $alat)

                            <tr class="border-b border-gray-100 hover:bg-gray-50">

                                {{-- Checkbox --}}
                                <td class="py-3 px-4 text-center">
                                    <input
                                        type="checkbox"
                                        name="alat_id[]"
                                        value="{{ $alat->id }}"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                    >
                                    <td class="py-3 px-4 text-center">
                                        @if($alat->gambar)
                                            <img
                                                src="{{ asset('storage/' . $alat->gambar) }}"
                                                alt="{{ $alat->nama_alat }}"
                                                class="w-16 h-16 object-cover rounded-lg mx-auto border border-gray-200"
                                            >
                                        @else
                                            <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center mx-auto">
                                                <span class="text-xs text-gray-400">Tidak ada</span>
                                            </div>
                                        @endif
                                    </td>
                                </td>

                                {{-- Nama alat --}}
                                <td class="py-3 px-4 font-medium text-gray-800">
                                    {{ $alat->nama_alat }}
                                </td>

                                {{-- Kategori --}}
                                <td class="py-3 px-4 text-gray-600">
                                    {{ $alat->kategori->nama_kategori ?? '-' }}
                                </td>

                                {{-- Stok --}}
                                <td class="py-3 px-4 text-center">
                                    <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                        {{ $alat->stok }}
                                    </span>
                                </td>

                                {{-- Jumlah --}}
                                <td class="py-3 px-4">
                                    <input
                                        type="number"
                                        name="jumlah[]"
                                        value="1"
                                        min="1"
                                        max="{{ $alat->stok }}"
                                        class="w-24 mx-auto block border border-gray-300 rounded-lg px-2 py-1.5 text-center focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    >
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="py-10 text-center text-gray-500">
                                    Tidak ada alat yang tersedia saat ini.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- Footer --}}
            <div class="p-6 border-t border-gray-200 flex justify-end">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg font-medium transition"
                >
                    Ajukan Peminjaman
                </button>

            </div>

        </div>

    </form>

</div>

@endsection