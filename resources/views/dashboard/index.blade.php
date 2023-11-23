@extends('layouts.dashboard')

@section('content')

<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Dashboard</h2>
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
            ></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Masyarakat</p>
          @php
              $masyarakat = \App\Models\Masyarakat::count();
          @endphp
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            {{ $masyarakat }}
          </p>
        </div>
      </div>
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
              fill-rule="evenodd"
              d="M10 0a4 4 0 100 8 4 4 0 000-8zm0 10c-2.67 0-8 1.34-8 4v2a1 1 0 001 1h14a1 1 0 001-1v-2c0-2.66-5.33-4-8-4zm8-1a1 1 0 110-2 1 1 0 010 2z"
            ></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Petugas
          </p>
          @php
              $petugas = \App\Models\Petugas::count();
          @endphp
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            {{ $petugas }}
          </p>
        </div>
      </div>      
      
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
              fill-rule="evenodd"
              d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Laporan
          </p>
          @php
              $laporan = \App\Models\Pengaduan::count()
          @endphp
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            {{ $laporan }}
          </p>
        </div>
      </div>
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5" fill="#3498db">
            <rect width="24" height="24" rx="4" fill="none"/>
            <g>
              <path d="M9 16.17L6.84 14l-1.42 1.41L9 18 21 6l-1.41-1.42L9 16.17z"/>
            </g>
          </svg>          
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Laporan selesai
          </p>
          @php
              $selesai = \App\Models\Pengaduan::where('status', 'selesai')->count();
          @endphp
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            {{ $selesai }}
          </p>
        </div>
      </div>
    </div>
    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
      <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">Jumlah pengaduan per bulan</h4>
      <canvas id="bars"></canvas>
      <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
        <!-- Chart legend -->
        <div class="flex items-center">
          <span
            class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"
          ></span>
          <span>Pengaduan</span>
        </div>
      </div>
    </div>
</div>

<script>
  var chartColors = {
      red: 'rgb(255, 99, 132)',
      orange: 'rgb(255, 159, 64)',
      yellow: 'rgb(255, 205, 86)',
      green: 'rgb(75, 192, 192)',
      info: '#41B1F9',
      blue: '#3245D1',
      purple: 'rgb(153, 102, 255)',
      grey: '#EBEFF6'
  };

  var ctxBar = document.getElementById("bars")
  var pengaduans = JSON.parse('{!! json_encode($pengaduans) !!}');
  console.log(pengaduans)
  var labels = pengaduans.map(pengaduan => pengaduan.date); 
  var counts = pengaduans.map(pengaduan => pengaduan.count);
  var myBar = new Chart(ctxBar, {
  type: 'bar',
  data: {
          labels: labels,
          datasets: [{
              label: 'Jumlah Pengaduan',
              data: counts,
              backgroundColor: chartColors.blue,
              barPercentage: 0.3,
              categoryPercentage: 0.3
          }]
      },
  options: {
      responsive: true,
      barRoundness: 1,
      title: {
      display: false,
      text: "Chart.js - Bar Chart with Rounded Tops (drawRoundedTopRectangle Method)"
      },
      legend: {
      display:false
      },
      scales: {
      yAxes: [{
          ticks: {
          beginAtZero: true,
          suggestedMax: 100,
          padding: 10,
          },
          gridLines: {
          drawBorder: false,
          }
      }],
      xAxes: [{
              gridLines: {
                  display:false,
                  drawBorder: false
              }
          }]
      }
  }
  });

</script>

@endsection