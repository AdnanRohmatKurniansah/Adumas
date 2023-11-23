@extends('layouts.dashboard')

@section('content')
<div class="container grid px-6 mx-auto">
    <h4 class="my-6 text-lg font-semibold text-gray-600 dark:text-gray-300">Data Pengaduan</h4>
    <div class="mb-4">
        <div class="generate">
            <form action="/dashboard/pengaduan/generate" method="post">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <label class="block mt-2 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Dari
                        </span>
                        <input required value="{{ old('dari') }}" class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 focus:outline-none form-input @error('dari') is-invalid @enderror" type="date" name="dari"/>
                        @error('dari')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>
                    <label class="block mt-2 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Sampai
                        </span>
                        <input required value="{{ old('sampai') }}" class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 focus:outline-none form-input @error('sampai') is-invalid @enderror" type="date" name="sampai"/>
                        @error('sampai')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>
                </div>
                <button type="submit" class="px-4 mt-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">Generate laporan</button>
            </form>
        </div>
    </div>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Foto</th>
                        <th class="px-4 py-3">Judul</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Tgl pengaduan</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($pengaduans as $pengaduan) 
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <img class="rounded-md" src="{{ asset('storage/' . $pengaduan->foto) }}" width="100px" alt="">
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $pengaduan->judul }}
                            </td>
                            <td class="px-4 py-3 text-sm">
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
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $pengaduan->created_at->format('d M Y h:i') }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="/dashboard/pengaduan/{{ $pengaduan->slug }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                        <svg
                                            class="w-5 h-5"
                                            aria-hidden="true"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                            ></path>
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M2 12s3-6 10-6 10 6 10 6"
                                            ></path>
                                        </svg>
                                    </a>
                                    <button @click="openModal" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>    
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>    
        </div>

    </div>
    <div class="mt-4 flex justify-center">
        {{ $pengaduans->links() }}
    </div>
</div>

    <div
      x-show="isModalOpen"
      x-transition:enter="transition ease-out duration-150"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
      <!-- Modal -->
      <div
        x-show="isModalOpen"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform translate-y-1/2"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0  transform translate-y-1/2"
        @click.away="closeModal"
        @keydown.escape="closeModal"
        class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
        role="dialog"
        id="modal">
        <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
        <!-- Modal body -->
        <form action="/dashboard/tanggapan/proses" method="post">
        @method('put')
        @csrf
        <div class="mt-4 mb-6">
          <!-- Modal title -->
          <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
            Proses laporan masyarakat
          </p>
          <label class="block mt-2 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
              Status pengaduan
            </span>
            <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id }}">
            <select name="status" required value="{{ old('status') }}" class="block @error('status') is-invalid @enderror w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
              <option value="0" {{ old('status', $pengaduan->status) == '0' ? 'selected' : '' }}>Belum diproses</option>
              <option value="proses" {{ old('status', $pengaduan->status) == 'proses' ? 'selected' : '' }}>Proses</option>
              <option value="selesai" {{ old('status', $pengaduan->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </label>
        </div>
        <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
          <button
            @click="closeModal"
            type="button"
            class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">Cancel</button>
          <button type="submit" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Ubah</button>
        </footer>
        </form>
      </div>
    </div>

@endsection