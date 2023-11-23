@extends('layouts.main')

@section('content')
<section class="text-gray-600 bg-[#EDF2F7] body-font overflow-hidden">
    <div class="container px-5 py-24 mx-auto">
      <div class="lg:w-4/5 mx-auto flex flex-wrap">
        <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="{{ asset('storage/' . $pengaduan->foto) }}">
        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
            <div class="flex">
                <h2 class="text-md title-font text-gray-500 tracking-widest">{{ $pengaduan->masyarakat->nama }}</h2>
                <span class="ml-3 text-black">{{ $pengaduan->created_at->format('d M Y h:i') }}</span>
            </div>
          <h1 class="text-gray-900 text-2xl title-font font-medium mb-1">{{ $pengaduan->judul }}</h1>
          @if ($pengaduan->status == '0')
            <div class="badge mt-2 badge-error text-white">{{ $pengaduan->status }}</div>
          @elseif ($pengaduan->status == 'proses')
            <div class="badge mt-2 badge-warning text-white">{{ $pengaduan->status }}</div>
          @else 
            <div class="badge mt-2 badge-primary text-white">{{ $pengaduan->status }}</div>
          @endif
          <p class="leading-relaxed mt-2">{{ $pengaduan->isi_laporan }}</p>
        </div>
    </div>
    <div class="grid grid-cols-1 mx-0 md:mx-32 md:grid-cols-2 gap-10 mb-6">
      <div class="tanggapan">
          <h4 class="mt-16 text-lg font-semibold text-gray-600 dark:text-gray-300">Tanggapan</h4>
          @if ($tanggapans->count() > 0)
              @foreach ($tanggapans as $tanggapan)
                  <div class="list mt-4 p-3 border border-gray-400 rounded-lg">
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
                          <textarea id="tanggapan" class="textarea textarea-bordered @error('tanggapan') is-invalid @enderror block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" required name="tanggapan" rows="3" placeholder="Masukkan tanggapan anda">{{ old('tanggapan') }}</textarea>
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
</section>
@endsection
