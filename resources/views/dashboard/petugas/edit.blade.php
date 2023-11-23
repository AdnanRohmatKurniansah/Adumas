@extends('layouts.dashboard')

@section('content')
<div class="container grid px-6 mx-auto">
    <h4 class="my-6 text-lg font-semibold text-gray-600 dark:text-gray-300">Edit data petugas</h4>
    <form action="/dashboard/petugas/{{ $petugas->id }}" method="post">
        @method('put')
        @csrf
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" style="max-width: 900px">
            <label class="block mt-2 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Nama petugas
                </span>
                <input required value="{{ old('nama_petugas', $petugas->nama_petugas) }}" class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 focus:outline-none form-input @error('nama_petugas') is-invalid @enderror" type="text" name="nama_petugas" placeholder="Nama petugas"/>
                @error('nama_petugas')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </label>
            <label class="block mt-2 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Username
                </span>
                <input required value="{{ old('username', $petugas->username) }}" class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 focus:outline-none form-input @error('username') is-invalid @enderror" type="text" name="username" placeholder="Username"/>
                @error('username')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </label>
            <label class="block mt-2 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    No telp
                </span>
                <input required value="{{ old('telp', $petugas->telp) }}" class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 focus:outline-none form-input @error('telp') is-invalid @enderror" type="text" name="telp" placeholder="No telp"/>
                @error('telp')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </label>
            <label class="block mt-2 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Level
                </span>
                <select name="level" required value="{{ old('level') }}" class="block @error('level') is-invalid @enderror w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                  <option value="admin" {{ old('level', $petugas->level) == 'admin' ? 'selected' : '' }}>Admin</option>
                  <option value="petugas" {{ old('level', $petugas->level) == 'petugas' ? 'selected' : '' }}>Petugas</option>
                </select>
              </label>
            <label class="block mt-2 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Password
                </span>
                <input required value="{{ old('password', $petugas->password) }}" class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 focus:outline-none form-input @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password"/>
                @error('password')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </label>
            <button type="submit" class="px-4 py-2 mt-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Update</button>
        </div>
    </form>
</div>
@endsection