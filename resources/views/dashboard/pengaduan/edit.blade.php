@extends('layouts.dashboard')

@section('content')
<div class="container grid px-6 mx-auto">
    <h4 class="my-6 text-lg font-semibold text-gray-600 dark:text-gray-300">Edit pengaduan</h4>
    <form action="/dashboard/pengaduan/{{ $pengaduan->slug }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" style="max-width: 900px">
            <label class="block mt-2 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Judul
                </span>
                <input id="judul" required value="{{ old('judul', $pengaduan->judul ) }}" class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 focus:outline-none form-input @error('judul') is-invalid @enderror" type="text" name="judul" placeholder="Judul"/>
                @error('judul')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </label>
            <label class="block mt-2 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Slug
                </span>
                <input id="slug" required value="{{ old('slug', $pengaduan->slug) }}" class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 focus:outline-none form-input @error('slug') is-invalid @enderror" type="text" name="slug" placeholder="Slug"/>
                @error('slug')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </label>
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Isi laporan</span>
                <textarea id="isi_laporan" class="@error('isi_laporan') is-invalid @enderror block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" required name="isi_laporan" rows="3" placeholder="Isi laporan">{{ old('isi_laporan', $pengaduan->isi_laporan) }}</textarea>
                @error('isi_laporan')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
              </label>
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Foto
                </span>
                <input type="hidden" name="oldFoto" value="{{ $pengaduan->foto }}">
                @if ($pengaduan->foto)
                    <img src="{{ asset('storage/' . $pengaduan->foto) }}" class="foto-preview mb-3" style="max-width: 400px">
                @else
                    <img class="foto-preview mb-3" style="max-width: 400px">
                @endif
                <input class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 focus:outline-none form-input @error('foto') is-invalid @enderror" type="file" id="foto" name="foto" onchange="previewFoto()"/>
                @error('foto')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </label>
            <button type="submit" class="px-4 py-2 mt-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Submit</button>
        </div>
    </form>
</div>

<script>
    const judul = document.querySelector('#judul')
    const slug = document.querySelector('#slug')
    
    judul.addEventListener('change', function() {
        fetch('/dashboard/pengaduan/checkSlug?judul=' + judul.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    function previewFoto() {
      const foto = document.querySelector('#foto');
      const fotoPreview = document.querySelector('.foto-preview');
      fotoPreview.style.display = 'block';
      const oFReader = new FileReader();
      oFReader.readAsDataURL(foto.files[0]);
      oFReader.onload = function(oFREvent) {
        fotoPreview.src = oFREvent.target.result;
      }
    }
    </script>

@endsection