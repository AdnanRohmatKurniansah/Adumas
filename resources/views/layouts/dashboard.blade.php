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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css?v=3"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js?v=3"
    ></script>
    <link rel="stylesheet" href="/assets/css/tailwind.output.css?v=1" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js?v=3"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets/js/init-alpine.js?v=4"></script>
    {{-- <script src="/assets/js/charts-bars.js?v=1"></script> --}}
    <script src="/assets/js/focus-trap.js"></script>
  </head>
  <body>
    @include('vendor.alert')
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen }"
    >
      @include('components.dashboard.sidebar')
      <div class="flex flex-col flex-1 w-full">
        @include('components.dashboard.header')
        <main class="h-full overflow-y-auto">
          @yield('content')
        </main>
      </div>
    </div>

  </body>
</html>
