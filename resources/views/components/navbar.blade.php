<div class="navbar bg-[#FBFDFE]">
    <div class="navbar-start">
      <div class="dropdown">
        <label tabindex="0" class="btn btn-ghost lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
        </label>
        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-[#FBFDFE] rounded-box w-52">
          <li><a href="#step">Tata cara</a></li>
          <li><a href="#laporan">Pengaduan</a></li>
        </ul>
      </div>
      <a href="/" class="btn btn-ghost text-xl">Adumas</a>
    </div>
    <div class="navbar-center hidden lg:flex">
      <ul class="menu menu-horizontal px-1">
        <li><a href="#step">Proses Pengaduan</a></li>
        <li><a href="#laporan">Pengaduan</a></li>
      </ul>
    </div>
    <div class="navbar-end">
      @if (Auth::guard('masyarakat')->check() || Auth::guard('petugas')->check())
      <form action="/auth/logout" method="post">
        @csrf
        <button type="submit" class="inline-flex text-white bg-gray-500 border-0 py-2 px-6 focus:outline-none hover:bg-gray-600 rounded text-lg">Logout</button>
      </form>
      @else
        <a href="/auth/login" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Login</a>
      @endif
    </div>
</div>