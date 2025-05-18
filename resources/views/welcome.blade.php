<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>When to Park</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
    <style>
      body {
        font-family: 'Inter', sans-serif;
      }
    </style>
  </head>
  
  <body class="bg-white text-gray-900">
    <!-- Navbar -->
    <header class="flex justify-between items-center px-6 py-4 bg-black text-white">
      <div class="text-xl font-bold tracking-widest">VELOCITI</div>
      <a href="{{ route('login') }}">
        <button class="border px-4 py-2 rounded-full hover:bg-white hover:text-black transition">
          Login
        </button>
      </a>
    </header>

    <!-- Hero Section -->
    <section class="bg-black text-white text-center py-20 relative">
      <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
        Sistem Manajemen Parkir<br> All in One Touch
      </h1>

      <!-- Car Image -->
      <div class="flex justify-center px-4">
        <img
          src="/assets/img/mobil.png"
          alt="Car Illustration"
          class="w-full max-w-sm mx-auto object-contain"
        />
      </div>

      <!-- Ikon fitur -->
  <div 
    class="bg-white text-black shadow-lg p-2 rounded-xl w-full max-w-3xl mx-auto absolute -bottom-8 left-1/2 transform -translate-x-1/2 z-10 flex justify-center"
  >
    <div class="grid grid-cols-2 md:grid-cols-5 gap-1 items-center justify-items-center w-full">
      <div class="flex flex-col items-center" data-aos="zoom-in" data-aos-delay="100">
        <i class="fas fa-user text-xl mb-1 transition-transform duration-300 hover:scale-125"></i>
        <span class="text-xs font-semibold">Pengguna</span>
        <span class="text-[10px] text-gray-400 mt-0.5">Petugas/Admin</span>
      </div>
      <div class="flex flex-col items-center" data-aos="zoom-in" data-aos-delay="200">
        <i class="fas fa-map-marker-alt text-xl mb-1 transition-transform duration-300 hover:scale-125"></i>
        <span class="text-xs font-semibold">Lokasi</span>
        <span class="text-[10px] text-gray-400 mt-0.5">Area Parkir</span>
      </div>
      <div class="flex flex-col items-center" data-aos="zoom-in" data-aos-delay="300">
        <i class="fas fa-parking text-xl mb-1 transition-transform duration-300 hover:scale-125"></i>
        <span class="text-xs font-semibold">Slot</span>
        <span class="text-[10px] text-gray-400 mt-0.5">Tersedia</span>
      </div>
      <div class="flex flex-col items-center" data-aos="zoom-in" data-aos-delay="400">
        <i class="fas fa-clock text-xl mb-1 transition-transform duration-300 hover:scale-125"></i>
        <span class="text-xs font-semibold">Jam</span>
        <span class="text-[10px] text-gray-400 mt-0.5">Operasional</span>
      </div>
      <div class="flex flex-col items-center" data-aos="zoom-in" data-aos-delay="500">
        <i class="fas fa-car text-xl mb-1 transition-transform duration-300 hover:scale-125"></i>
        <span class="text-xs font-semibold">Kendaraan</span>
        <span class="text-[10px] text-gray-400 mt-0.5">Masuk/Keluar</span>
      </div>
    </div>
  </div>
    </section>

    <div class="h-20"></div> <!-- Spacer -->

    <!-- Cara Kerja Sistem -->
<section class="py-20 px-6 bg-white">
  <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center gap-10">
    
    <!-- Kiri: Teks & Ikon -->
    <div class="flex-1 space-y-6">
      <h2 class="text-3xl font-bold mb-4 text-gray-800" data-aos="fade-right">Cara Kerja</h2>
      <p class="text-gray-600" data-aos="fade-right" data-aos-delay="100">
        Sistem manajemen parkir kami memberdayakan petugas dan admin untuk mencatat, memantau, dan menganalisis aktivitas parkir.
      </p>

      <div class="grid sm:grid-cols-2 gap-4 mt-4">
        <!-- Kartu 1 -->
        <div class="flex gap-4 items-start p-4 bg-white border rounded-lg shadow transition duration-300 hover:scale-105 hover:border-purple-500" data-aos="fade-up" data-aos-delay="100">
          <div class="text-2xl">📝</div>
          <div>
            <h3 class="font-semibold">Kendaraan Masuk</h3>
            <p class="text-sm text-gray-600">Petugas langsung mencatat kendaraan melalui sistem digital.</p>
          </div>
        </div>
        
        <!-- Kartu 2 -->
        <div class="flex gap-4 items-start p-4 bg-white border rounded-lg shadow transition duration-300 hover:scale-105 hover:border-purple-500" data-aos="fade-up" data-aos-delay="200">
          <div class="text-2xl">💰</div>
          <div>
            <h3 class="font-semibold">Kendaraan Keluar</h3>
            <p class="text-sm text-gray-600">Sistem secara otomatis menghitung durasi parkir dan biaya.</p>
          </div>
        </div>

        <!-- Kartu 3 -->
        <div class="flex gap-4 items-start p-4 bg-white border rounded-lg shadow transition duration-300 hover:scale-105 hover:border-purple-500 col-span-2" data-aos="fade-up" data-aos-delay="300">
          <div class="text-2xl">📊</div>
          <div>
            <h3 class="font-semibold">Pantau Laporan</h3>
            <p class="text-sm text-gray-600">Admin dapat memantau transaksi harian hingga bulanan.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Kanan: Gambar -->
    <div class="flex-1 text-center" data-aos="zoom-in" data-aos-delay="300">
      <img src="/assets/img/how.png" alt="Ilustrasi Parkir" class="w-full max-w-md mx-auto" />
    </div>
  </div>
</section>


    <section class="bg-black text-white py-20 px-6">
  <div class="max-w-6xl mx-auto text-center">
    <h2 class="text-4xl md:text-5xl font-extrabold mb-12">FITUR & KEUNGGULAN</h2>

    <div class="grid md:grid-cols-3 gap-8">
      
      <!-- Fitur A -->
      <div class="bg-gray-900 rounded-xl p-6 hover:shadow-lg transition-all duration-300 hover:scale-105 hover:border hover:border-purple-600" data-aos="flip-left" data-aos-delay="100">
        <div class="text-6xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500 mb-4">
          A
        </div>
        <h4 class="text-lg font-semibold mb-2">Sistem Real-Time</h4>
        <p class="text-gray-400 text-sm mb-6">
          Semua data kendaraan & slot langsung tercatat otomatis.
        </p>
      </div>

      <!-- Fitur B -->
      <div class="bg-gray-900 rounded-xl p-6 hover:shadow-lg transition-all duration-300 hover:scale-105 hover:border hover:border-purple-600" data-aos="flip-left" data-aos-delay="200">
        <div class="text-6xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500 mb-4">
          B
        </div>
        <h4 class="text-lg font-semibold mb-2">Tampilan Simpel</h4>
        <p class="text-gray-400 text-sm mb-6">
          UI dirancang agar navigasi mudah digunakan siapa pun, baik petugas maupun admin.
        </p>
      </div>

      <!-- Fitur G -->
      <div class="bg-gray-900 rounded-xl p-6 hover:shadow-lg transition-all duration-300 hover:scale-105 hover:border hover:border-purple-600" data-aos="flip-left" data-aos-delay="300">
        <div class="text-6xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500 mb-4">
          G
        </div>
        <h4 class="text-lg font-semibold mb-2">Analisis Laporan</h4>
        <p class="text-gray-400 text-sm mb-6">
          Data harian, mingguan, hingga bulanan bisa dipantau untuk keperluan pengambilan keputusan.
        </p>
      </div>

    </div>
  </div>
</section>




<section class="bg-white text-gray-900 py-16 px-4">
  <div class="max-w-6xl mx-auto">
    
    <!-- Judul -->
    <div class="text-center mb-12 animate__animated animate__fadeInDown">
      <h2 class="text-2xl md:text-3xl font-bold">
        KATA DEVELOPER <span class="text-purple-600 transition">TENTANG VELOCITI</span> KHUSUS 
        <span class="text-purple-600">UNTUK KAMU</span>
      </h2>
      <p class="text-gray-600 mt-3 max-w-2xl mx-auto text-sm md:text-base">
        VELOCITI dikembangkan untuk menjawab kebutuhan yang terus meningkat akan manajemen parkir yang efisien, transparan, dan berbasis data di lingkungan perkotaan modern. Dengan memanfaatkan solusi digital, platform ini bertujuan untuk menyederhanakan alur kerja operasional, memastikan integrasi antara kebutuhan bisnis dan perkembangan teknologi yang terus berubah.
      </p>
    </div>

    <!-- Kartu Testimoni -->
<div class="grid md:grid-cols-3 gap-6">

  <!-- Kartu 1: Developer (Anda) -->
  <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-md hover:shadow-lg transition-transform duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="100">
    <div class="text-indigo-500 text-4xl mb-2">“</div>
    <h4 class="font-bold text-lg mb-2">BANGUN SISTEM YANG BERPIKIR UNTUK KITA.</h4>
    <p class="text-sm text-gray-700 mb-4">
      Saya selalu menjadi penggemar teknologi, bagi saya seorang developer tidak hanya menulis kode, tapi menciptakan sudut pandang dan kehidupan baru dari hasil karyanya.
    </p>
    <div class="flex items-center gap-3 mt-4">
      <div>
        <p class="font-semibold">Aurelia Christy</p>
        <p class="text-sm text-gray-500">Software Engineer Student</p>
      </div>
    </div>
  </div>

  <!-- Kartu 2: Master Cheng Yen -->
  <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-md hover:shadow-lg transition-transform duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="200">
    <div class="text-indigo-500 text-4xl mb-2">“</div>
    <h4 class="font-bold text-lg mb-2">KETIKA PIKIRAN TENANG, KEBIJAKSANAAN MUNCUL.</h4>
    <p class="text-sm text-gray-700 mb-4">
      Hanya melalui pengamatan yang tenang kita dapat memperbaiki dunia di sekitar kita. Biarkan kasih sayang dan kejernihan membimbing setiap inovasi.
    </p>
    <div class="flex items-center gap-3 mt-4">
      <div>
        <p class="font-semibold">Master Cheng Yen</p>
        <p class="text-sm text-gray-500">Pendiri, Tzu Chi Foundation</p>
      </div>
    </div>
  </div>

  <!-- Kartu 3: Pebisnis (misal Elon Musk) -->
  <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-md hover:shadow-lg transition-transform duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
    <div class="text-indigo-500 text-4xl mb-2">“</div>
    <h4 class="font-bold text-lg mb-2">SAYA TIDAK MEMBUAT PERUSAHAAN HANYA UNTUK SEKEDARNYA.</h4>
    <p class="text-sm text-gray-700 mb-4">
      Saya membangun untuk memecahkan masalah yang dihadapi orang-orang. Jika tidak membantu kemanusiaan untuk maju, maka itu tidak layak dilakukan.
    </p>
    <div class="flex items-center gap-3 mt-4">
      <div>
        <p class="font-semibold">Elon Musk</p>
        <p class="text-sm text-gray-500">CEO, Tesla & SpaceX</p>
      </div>
    </div>
  </div>

</div>

  </div>
</section>



    <!-- Jeda antara testimoni dan footer -->
    <div class="h-10"></div>

    <!-- Bagian Kontak Footer -->
    <footer class="bg-black text-white py-10 px-6">
  <div class="container mx-auto max-w-4xl">
    <div class="flex flex-col md:flex-row justify-between items-center gap-8">
      <div class="mb-6 md:mb-0 text-center md:text-left">
        <h3 class="text-xl font-bold mb-2 flex items-center justify-center md:justify-start">
          <i class="fas fa-parking mr-2"></i>VELOCITI
      
        </h3>
        <p class="text-gray-400 text-sm max-w-xs">
          Solusi digital untuk pengelolaan, pencatatan, serta akses data parkir.
        </p>
      </div>
      <div class="mb-6 md:mb-0 text-center md:text-left">
        <h4 class="font-semibold mb-2">Kontak</h4>
        <ul class="text-gray-300 text-sm space-y-2">
          <li>
            <i class="fas fa-map-marker-alt mr-2"></i>
            Sekolah Cinta Kasih Tzu Chi
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<!-- ...existing code... -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    once: true, // animasi hanya sekali saat masuk viewport
    duration: 800, // durasi animasi
    offset: 120, // jarak sebelum animasi dimulai
  });
</script>
<!-- ...existing code... -->
  </body>