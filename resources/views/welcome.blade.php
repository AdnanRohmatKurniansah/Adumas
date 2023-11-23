@extends('layouts.main')

@section('content')
  <div class="hero bg-[#EDF2F7]">
    <section class="text-gray-600 body-font">
      <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
        <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
          <h1 class="title-font sm:text-5xl text-3xl mb-4 font-medium text-gray-900">Layanan <span class="text-indigo-500">Pengaduan</span> Masyarakat</h1>
          <p class="mb-8 text-xl leading-relaxed">Sampaikan laporan masalah anda di sini, kami akan memprosesnya dengan cepat.</p>
          <div class="flex justify-center">
            <a href="/auth/login" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Laporkan</a>
          </div>
        </div>
        <div class="lg:max-w-lg lg:w-full md:w-1/3 w-4/6">
          <img class="object-cover object-center rounded" alt="hero" src="/assets/img/illustration.png">
        </div>
      </div>
    </section>
  </div>
  <div id="step" class="step bg-[#FBFDFE]">
    <section class="text-gray-600 body-font">
      <div class="container px-5 py-24 mx-auto">
        <div class="text-center mb-20">
          <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">Proses Pengaduan</h1>
          <div class="flex mt-6 justify-center">
            <div class="w-16 h-1 rounded-full bg-indigo-500 inline-flex"></div>
          </div>
        </div>
        <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">
          <div class="p-4 md:w-1/4 flex flex-col text-center items-center">
            <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="100" height="100" fill="#3498db">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M17 1.01L15.99 0H4a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h2v4l4-4h7a4 4 0 0 0 4-4V3a2 2 0 0 0-2-1zm-1 15H8v-2h8v2zm1-4H8v-2h9v2zm0-4H8V6h9v2z"/>
              </svg>              
            </div>
            <div class="flex-grow">
              <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Tulis Laporan</h2>
              <p class="leading-relaxed text-base">Laporkan keluhan anda kepada kami dengan jelas.</p>
            </div>
          </div>
          <div class="p-4 md:w-1/4 flex flex-col text-center items-center">
            <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 96 96" id="check-order"><path fill="#c37f50" d="M67,8.47H12.78a3.67,3.67,0,0,0-3.67,3.68V91.32A3.67,3.67,0,0,0,12.78,95H67a3.68,3.68,0,0,0,3.68-3.68V12.15A3.68,3.68,0,0,0,67,8.47ZM65.37,89.69H14.42V13.78h51Z"></path><path fill="#af6650" d="M65.37,60.5V89.69H43.5V95H67a3.68,3.68,0,0,0,3.68-3.68V60.5Z"></path><rect width="5.31" height="22.85" x="65.37" y="48" fill="#af6650"></rect><rect width="5.31" height="22.85" x="65.37" y="48" fill="#af6650"></rect><path fill="#dca764" d="M65.37,33.6h5.31V12.15A3.67,3.67,0,0,0,67,8.47H12.79a3.68,3.68,0,0,0-3.68,3.68V32.83h5.31v-19h51Z"></path><rect width="32.33" height="5.31" x="23.72" y="8.47" fill="#c37f50"></rect><rect width="50.95" height="75.91" x="14.42" y="13.78" fill="#cfd6ff"></rect><rect width="42.95" height="40.55" x="18.42" y="17.78" fill="#e8efff" rx="1.24"></rect><rect width="25.76" height="7.92" x="27.01" y="65.38" fill="#e8efff" rx="1.24"></rect><path fill="#7481a9" d="M53.91,8v4.44a1.3,1.3,0,0,1-1.29,1.3H27.18a1.3,1.3,0,0,1-1.3-1.3V8a1.3,1.3,0,0,1,1.3-1.3h3.95a3.24,3.24,0,0,0,3.25-3.25V2.36A1.36,1.36,0,0,1,35.75,1h8.3a1.36,1.36,0,0,1,1.36,1.36V3.49a3.25,3.25,0,0,0,3.25,3.25h4A1.3,1.3,0,0,1,53.91,8Z"></path><path fill="#889fc2" d="M53.91,8v2.51a1.29,1.29,0,0,1-1.29,1.29H27.18a1.3,1.3,0,0,1-1.3-1.29V8a1.3,1.3,0,0,1,1.3-1.3h3.95a3.24,3.24,0,0,0,3.25-3.25V2.36A1.36,1.36,0,0,1,35.75,1h8.3a1.36,1.36,0,0,1,1.36,1.36V3.49a3.25,3.25,0,0,0,3.25,3.25h4A1.3,1.3,0,0,1,53.91,8Z"></path><rect width="21.25" height="21.25" x="29.27" y="24" fill="#ff9d50" rx="1.47"></rect><path fill="#ffb15f" d="M48.94,25.42V41.78a1.32,1.32,0,0,1-1.13,1.43H32.49a1.31,1.31,0,0,1-1.13-1.43V25.42A1.3,1.3,0,0,1,32.49,24H47.81A1.31,1.31,0,0,1,48.94,25.42Z"></path><path fill="#ffde82" d="M48.94,26v-.59A1.31,1.31,0,0,0,47.81,24H32.49a1.3,1.3,0,0,0-1.13,1.42V26Z"></path><rect width="7.31" height="8.47" x="36.24" y="24" fill="#ff703c"></rect><rect width="7.31" height="2.02" x="36.24" y="24" fill="#ff8941"></rect><path fill="#fff" d="M41.26,36H38.52a.81.81,0,0,1-.81-.81.82.82,0,0,1,.81-.81h2.74a.81.81,0,1,1,0,1.62Z"></path><path fill="#4c5472" d="M42.09,39.56h-4.4a1,1,0,0,1,0-2h4.4a1,1,0,0,1,0,2Z"></path><path fill="#3a3c51" d="M55.52 57.87H24.27a1 1 0 010-2H55.52a1 1 0 010 2zM55.52 63.75H24.27a1 1 0 110-2H55.52a1 1 0 110 2zM55.52 69.62H24.27a1 1 0 110-2H55.52a1 1 0 110 2zM50.52 75.5H24.27a1 1 0 110-2H50.52a1 1 0 110 2zM38.84 81.37H24.27a1 1 0 110-2H38.84a1 1 0 010 2z"></path><circle cx="72.65" cy="80.75" r="14.24" fill="#50b981"></circle><path fill="#fff" d="M69.07,86.44,64.56,83A2,2,0,0,1,67,79.8l3.16,2.43,8-7.54A2,2,0,0,1,80.9,77.6l-9.24,8.71A2,2,0,0,1,69.07,86.44Z"></path></svg>
            </div>
            <div class="flex-grow">
              <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Proses Verifikasi</h2>
              <p class="leading-relaxed text-base">Tunggu sampai laporan anda kami verifikasi</p>
            </div>
          </div>
          <div class="p-4 md:w-1/4 flex flex-col text-center items-center">
            <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="screwdriver"><path fill="#898b99" d="M5.1 11.1h14v2h-14z" transform="rotate(45.001 12.05 12.136)"></path><path fill="#898b99" d="M5 7.9L2.9 5.8 5.7 3l2.1 2.1c.4.4.4 1 0 1.4L6.4 7.9c-.4.4-1 .4-1.4 0z"></path><path fill="#e67144" d="M20.5 17.8c-.4-.4-.4-1 0-1.4l-1.4 1.4-.7.7-2.1 2.1c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l2.1-2.1.7-.7 1.4-1.4c-.3.4-1 .4-1.4 0z"></path><path fill="#ff9e68" d="M24.1 28.4L17.7 22l4.2-4.2 6.4 6.4c.8.8.8 2 0 2.8l-1.4 1.4c-.8.8-2 .8-2.8 0z"></path><path fill="#ff9e68" d="M14.7 16.8h6v2h-6z" transform="rotate(-45.001 17.707 17.793)"></path><path fill="#5a5d70" d="M27.9 7.6l-2.8 2.8-2.8-.7-.7-2.8 2.8-2.8L23 2.7l-3.7 3.7.9 3.3-4.6 4.6 2.1 2.1-1.4 1.4-2.1-2.1-4.5 4.5-3.3-.9L2.7 23l1.4 1.4 2.8-2.8 2.8.7.7 2.8-2.8 2.8L9 29.3l3.7-3.7-.9-3.3 10.5-10.5 3.3.9L29.3 9z"></path><path fill="#40455a" d="M25.5 27.5c-.1 0-.3 0-.4-.1l-4.9-5c-.2-.2-.2-.5 0-.7.2-.2.5-.2.7 0l4.9 5c.2.2.2.5 0 .7-.1 0-.2.1-.3.1zM26.9 26.1c-.1 0-.3 0-.4-.1l-4.9-5c-.2-.2-.2-.5 0-.7.2-.2.5-.2.7 0l4.9 5c.2.2.2.5 0 .7-.1 0-.2.1-.3.1z"></path><path fill="#40455a" d="M25.5 29.5c-.6 0-1.3-.2-1.8-.7l-6.4-6.4c-.1-.1-.1-.2-.1-.4s.1-.3.1-.4l4.2-4.2c.2-.2.5-.2.7 0l6.4 6.4c.5.5.7 1.1.7 1.8s-.3 1.3-.7 1.8l-1.4 1.4c-.4.4-1.1.7-1.7.7zM18.4 22l6 6c.6.6 1.5.6 2.1 0l1.4-1.4c.3-.3.4-.7.4-1.1 0-.4-.2-.8-.4-1.1l-6-6-3.5 3.6zM16.3 18.3c-.1 0-.3 0-.4-.1L6 8.2c-.2-.1-.2-.5 0-.7l1.4-1.4c.2-.2.5-.2.7 0L18 16c.2.2.2.5 0 .7l-1.4 1.4c-.1.1-.2.2-.3.2zM7.1 7.9l9.2 9.2.7-.7-9.2-9.2-.7.7z"></path><path fill="#40455a" d="M9 29.8c-.1 0-.3 0-.4-.1l-1.4-1.4c-.2-.2-.2-.5 0-.7L9.9 25l-.6-2.2-2.3-.7-2.6 2.6c-.2.2-.5.2-.7 0l-1.4-1.4c-.1-.1-.1-.2-.1-.4s.1-.3.1-.4L6 18.9c.1-.1.3-.2.5-.1l3 .8 4.3-4.3c.2-.2.5-.2.7 0l1.8 1.8.7-.7-1.8-1.8c-.2-.2-.2-.5 0-.7l4.4-4.4-.8-3c0-.2 0-.4.1-.5l3.7-3.7c.2-.2.5-.2.7 0l1.4 1.4c.2.2.2.5 0 .7L22.1 7l.6 2.2 2.3.7 2.6-2.6c.2-.2.5-.2.7 0l1.4 1.4c.1.1.1.2.1.4s-.1.3-.1.4L26 13.1c-.1.1-.3.2-.5.1l-3-.8-10.1 10 .8 3c0 .2 0 .4-.1.5l-3.7 3.7c-.1.2-.2.2-.4.2zm-.7-1.9l.7.7 3.2-3.2-.8-3c0-.2 0-.4.1-.5l4.1-4.1-1.4-1.4-4.1 4.1c-.1.1-.3.2-.5.1l-3-.8L3.4 23l.7.7 2.4-2.4c.1-.1.3-.2.5-.1l2.8.7c.2 0 .3.2.4.4l.7 2.8c0 .2 0 .4-.1.5l-2.5 2.3zm8-13.6l1.4 1.4 4.2-4.2c.1-.1.3-.2.5-.1l3 .8L28.6 9l-.7-.7-2.4 2.4c-.1.1-.3.2-.5.1l-2.8-.7c-.2 0-.3-.2-.4-.4L21.1 7c0-.2 0-.4.1-.5l2.4-2.4-.6-.7-3.2 3.2.8 3c0 .2 0 .4-.1.5l-4.2 4.2zM5.7 8.7c-.4 0-.8-.1-1.1-.4L2.5 6.1c-.1-.1-.1-.2-.1-.3s.1-.3.1-.4l2.8-2.8c.1-.1.2-.1.4-.1.1 0 .3.1.4.1l2.1 2.1c.2.3.4.7.4 1.1 0 .4-.2.8-.4 1.1L6.7 8.2c-.2.3-.6.5-1 .5zM3.6 5.8l1.8 1.8c.2.2.5.2.7 0l1.4-1.4c0-.2.1-.3.1-.4 0-.1-.1-.3-.1-.4L5.7 3.7 3.6 5.8z"></path><path fill="#40455a" d="M17.7 22.5c-.1 0-.3 0-.4-.1-.2-.2-.2-.5 0-.7.1-.1.1-.2.1-.3 0-.1-.1-.3-.1-.4-.2-.2-.5-.2-.7 0-.2.2-.5.2-.7 0-.1-.1-.1-.2-.1-.4s0-.3.1-.4l4.2-4.2c.2-.2.5-.2.7 0 .1.1.1.2.1.4s0 .3-.1.4c-.2.2-.2.5 0 .7.2.2.5.2.7 0 .2-.2.5-.2.7 0s.2.5 0 .7L18 22.4c0 .1-.2.1-.3.1zm-.1-2.5c.1.1.3.2.4.3.1.1.2.3.3.4l2.2-2.2c-.1-.1-.3-.2-.4-.3-.1-.1-.2-.3-.3-.4L17.6 20z"></path><path fill="#40455a" d="M16.3 21.1c-.1 0-.3 0-.4-.1l-1.4-1.4c-.2-.2-.2-.5 0-.7l4.2-4.2c.2-.2.5-.2.7 0l1.4 1.4c.2.2.2.5 0 .7L16.6 21c-.1.1-.2.1-.3.1zm-.7-1.9l.7.7 3.5-3.5-.7-.7-3.5 3.5z"></path></svg>
            </div>
            <div class="flex-grow">
              <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Tindakan Lanjut</h2>
              <p class="leading-relaxed text-base">Laporan anda akan kami tindak lanjuti</p>
            </div>
          </div>
          <div class="p-4 md:w-1/4 flex flex-col text-center items-center">
            <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="checklist"><g data-name="Layer 2"><path fill="#64c1e2" d="M22,12a10,10,0,0,1-11.99,9.8H9.99a10.005,10.005,0,0,1,0-19.6h.02A10,10,0,0,1,22,12Z"></path><path fill="#81d4fa" d="M18,12a10.035,10.035,0,0,1-7.99,9.8H9.99a10.005,10.005,0,0,1,0-19.6h.02A10.035,10.035,0,0,1,18,12Z"></path><path fill="#fff" d="M11,15.5a.99676.99676,0,0,1-.707-.293l-2-2A.99989.99989,0,0,1,9.707,11.793L11,13.08594l3.293-3.293A.99989.99989,0,0,1,15.707,11.207l-4,4A.99676.99676,0,0,1,11,15.5Z"></path><path fill="#1b1a3d" d="M12,22A10,10,0,1,1,22,12,10.01146,10.01146,0,0,1,12,22ZM12,4a8,8,0,1,0,8,8A8.00917,8.00917,0,0,0,12,4Z"></path></g></svg>
            </div>
            <div class="flex-grow">
              <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Selesai</h2>
              <p class="leading-relaxed text-base">Laporan anda sudah selesai kami tindak lanjuti</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <div id="laporan" class="laporan bg-[#FBFDFE]">
    <section class="text-gray-600 body-font">
      <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap w-full mb-20">
          <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Laporan Dari Masyarakat</h1>
            <div class="h-1 w-20 bg-indigo-500 rounded"></div>
          </div>
          <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Berikut ini adalah laporan yang telah diberikan oleh masyarakat. Laporan-laporan ini memberikan gambaran yang komprehensif tentang tantangan yang dihadapi oleh masyarakat, dan menjadi dasar untuk menyusun strategi penyelesaian masalah yang lebih efektif.</p>
        </div>
        <div class="flex flex-wrap -m-4">
          @foreach ($pengaduans as $pengaduan)
            <div class="xl:w-1/3 md:w-1/2 p-4">
              <div class="shadow shadow-md p-6 rounded-lg">
                <img class="h-40 rounded w-full object-cover object-center mb-6" src="{{ asset('storage/' . $pengaduan->foto) }}" style="min-height: 200px" alt="content">
                <div class="flex">
                  <h1 class="tracking-widest text-indigo-500 text-md font-medium title-font">{{ $pengaduan->masyarakat->nama }}</h1>
                  <small class="tracking-widest ml-2 mt-1  font-medium title-font">{{ $pengaduan->created_at->format('d M Y h:i') }}</small>
                </div>
                <h2 class="text-lg text-gray-900 font-medium title-font mb-4">{{ $pengaduan->judul }}</h2>
                <p class="leading-relaxed text-base">
                  {{ strlen($pengaduan->isi_laporan) > 70 ? substr($pengaduan->isi_laporan, 0, 70) . '...' : $pengaduan->isi_laporan }}
                </p> 
                <a href="/pengaduan/{{ $pengaduan->slug }}" class="inline-flex mt-4 text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Detail</a href="/dashboard">             
              </div>
            </div>
          @endforeach
        </div>
      </div>
      <div class="mt-4 pb-10 flex p-5 justify-center">
        {{ $pengaduans->links() }}
      </div>      
    </section>
  </div>
  <div class="info bg-[#EDF2F7]">
    <section class="text-gray-600 body-font">
      <div class="container px-5 py-24 mx-auto flex flex-wrap">
        <h2 class="sm:text-3xl text-2xl text-gray-900 font-medium title-font mb-2 md:w-2/5">Ingin menyampaikan laporan terkait keluhan anda ?</h2>
        <div class="md:w-3/5 md:pl-6">
          <p class="leading-relaxed text-base">Silahkan login terlebih dahulu supaya kami dapat memproses laporan Anda dengan lebih mudah. Dengan login, Anda akan memiliki akses ke fitur-fitur tambahan yang memungkinkan manajemen laporan Anda secara efisien.</p>
          <div class="flex md:mt-4 mt-6">
            <a href="/auth/login" class="inline-flex text-white bg-indigo-500 border-0 py-1 px-4 focus:outline-none hover:bg-indigo-600 rounded">Login</a>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection