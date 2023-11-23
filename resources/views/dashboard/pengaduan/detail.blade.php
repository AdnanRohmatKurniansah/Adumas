@extends('layouts.dashboard')

@section('content')
<div class="container grid px-6 mx-auto">
    <h4 class="my-6 text-lg font-semibold text-gray-600 dark:text-gray-300">Detail Pengaduan</h4>
    <div class="mb-4">
        <a href="/dashboard/pengaduan" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Kembali</a>
    </div>
    <div class="px-5 py-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="image">
                <img src="{{ asset('storage/' . $pengaduan->foto) }}" alt="">
            </div>
            <div class="desc">
                <h1 class="title text-md"><span class="font-bold">Judul:</span> {{ $pengaduan->judul }}</h1>
                <div class="status text-md mt-4">
                    <span class="font-bold">Status: </span>
                    @if ($pengaduan->status == '0')
                        <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                            Belum diproses
                        </span>
                    @elseif ($pengaduan->status == 'proses')
                        <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:bg-orange-700 dark:text-orange-100">
                            {{ $pengaduan->status }}
                        </span>
                    @else 
                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                            {{ $pengaduan->status }}
                        </span>
                    @endif
                </div>
                <div class="tgl">
                    <h1 class="text-md mt-4"><span class="font-bold">Pelapor:</span> {{ $pengaduan->masyarakat->nama }}</h1>
                </div>
                <div class="pelapor">
                    <h1 class="text-md mt-4"><span class="font-bold">Tanggal pengaduan:</span> {{ $pengaduan->created_at->format('d M Y h:i') }}</h1>
                </div>
            </div>
        </div>
        <p class="text-md mt-4"><span class="font-bold">Isi laporan:</span> {{ $pengaduan->isi_laporan }}</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="tanggapan">
                <h4 class="mt-16 text-lg font-semibold text-gray-600 dark:text-gray-300">Tanggapan</h4>
                @if ($tanggapans->count() > 0)
                    @foreach ($tanggapans as $tanggapan)
                        <div class="list mt-4 p-3 border border-gray-100">
                            <div class="flex">
                                <h1 class="text-md"><span class="font-bold">{{ $tanggapan->petugas->nama_petugas }}</span></h1>
                                <small class="ml-2 mt-1">{{ $tanggapan->created_at->format('d M Y h:i') }}</small>
                            </div>
                            <p class="text-md mt-2">"{{ $tanggapan->tanggapan }}"</p>
                        </div>
                    @endforeach
                @else
                    <div class="text-center mt-16 ">
                        <h1>Belum ada tanggapan yang diberikan</h1>
                    </div>
                @endif
            </div>            
            @if (Auth::guard('petugas')->check())
                <div class="beri-tanggapan">
                    <h4 class="mt-16 text-lg font-semibold text-gray-600 dark:text-gray-300">Berikan tanggapan</h4>
                    <div class="max-w-xl">
                        <form action="/dashboard/tanggapan/berikan" method="post">
                            @csrf
                            <label class="block mt-4 text-sm">
                                <input type="hidden" value="{{ $pengaduan->id }}" name="id_pengaduan">
                                <textarea id="tanggapan" class="@error('tanggapan') is-invalid @enderror block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" required name="tanggapan" rows="3" placeholder="Masukkan tanggapan anda">{{ old('tanggapan') }}</textarea>
                                @error('tanggapan')
                                    <span class="text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </label>
                            <button type="submit" class="px-4 py-2 mt-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Submit</button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection