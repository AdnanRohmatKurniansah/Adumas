<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Adumas</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/assets/css/tailwind.output.css" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="/assets/js/init-alpine.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    @include('vendor.alert')
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div class="flex-1 h-full mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800" style="max-width: 500px;">
        <div class="flex flex-col">
          <div class="flex items-center justify-center p-6 sm:p-12">
            <div class="w-full">
              <h1
                class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
              >
                Register
              </h1>
              <form action="/auth/register" method="post">
                @csrf
                <label class="block text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Nik</span>
                  <input value="{{ old('nik') }}" type="text" name="nik" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input @error('nik') is-invalid @enderror" placeholder="Nik"/>
                  @error('nik')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                  @enderror
                </label>
                <label class="block text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Nama</span>
                  <input value="{{ old('nama') }}" type="text" name="nama" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input @error('nama') is-invalid @enderror" placeholder="Nama"/>
                  @error('nama')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                  @enderror
                </label>
                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Username</span>
                  <input value="{{ old('username') }}" type="text" name="username" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input @error('username') is-invalid @enderror" placeholder="Username"/>
                  @error('username')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                  @enderror
                </label>
                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">No telp</span>
                  <input value="{{ old('telp') }}" type="text" name="telp" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input @error('telp') is-invalid @enderror" placeholder="No telp"/>
                  @error('telp')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                  @enderror
                </label>
                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Password</span>
                  <input name="password" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input @error('password') is-invalid @enderror" placeholder="***************" type="password"/>
                  @error('password')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                  @enderror
                </label>
                <button class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Register</button>
              </form>
              <hr class="my-8" />
              <p class="mt-4">
                <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="/auth/login">
                  Sudah punya akun? login sekarang
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
