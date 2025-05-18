<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>VELOCITI Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <style>
    body {
      background: url('/assets/img/login.jpg') no-repeat center center fixed;
      background-size: cover;
      font-family: 'Inter', sans-serif;
    }
    .role-option:checked + label {
      @apply ring-2 ring-purple-600 bg-purple-600 text-white;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center px-6 bg-black bg-opacity-80">
  <div class="flex max-w-4xl w-full bg-white/10 backdrop-blur-lg rounded-xl shadow-xl border border-white/20 overflow-hidden">
    
    <!-- Kiri: Deskripsi -->
<div class="w-1/2 p-8 flex flex-col justify-center text-white bg-black/70">
  <h1 class="text-3xl font-bold mb-4 tracking-wide">
    Welcome to <span class="text-purple-400">VELOCITI</span>
  </h1>

  <p class="text-sm leading-relaxed text-gray-100 mb-4">
    <strong>VELOCITI</strong> adalah sistem parkir digital kekinian yang siap bantu kamu buat urusan parkir makin gampang,
    <span class="text-purple-300 font-semibold">cepat</span>, dan
    <span class="text-purple-300 font-semibold">terkontrol</span>.
  </p>

  <p class="text-sm text-gray-100 mb-4">
    Admin bisa pantau, atur, dan cek laporan parkir secara real-time. Petugas juga bisa catat kendaraan masuk & keluar dengan praktis dan akurat.
  </p>

  <p class="text-sm font-medium text-purple-300">
    Pilih peranmu dan rasakan kemudahan ngatur parkir bareng VELOCITI!
  </p>
</div>

    <!-- Kanan: Login Form -->
    <div class="w-1/2 p-6 bg-white/10 text-white">
      <h2 class="text-xl font-semibold mb-5 text-center">
        <i class="fas fa-sign-in-alt text-purple-400 mr-2"></i> Login Panel
      </h2>

      <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
        @csrf

        <input type="text" name="username" placeholder="Username" required
          class="w-full px-3 py-2 rounded bg-white/10 text-white placeholder-white focus:ring-2 focus:ring-purple-500 outline-none"/>

        <input type="password" name="password" placeholder="Password" required
          class="w-full px-3 py-2 rounded bg-white/10 text-white placeholder-white focus:ring-2 focus:ring-purple-500 outline-none"/>

        <!-- Role Icons -->
        <div class="flex justify-center gap-6 mt-3">
          <input type="radio" id="admin" name="role" value="admin" class="hidden peer/admin role-option" required />
          <label for="admin"
            class="cursor-pointer border border-white/30 rounded-xl p-4 text-center peer-checked/admin:bg-purple-600 peer-checked/admin:ring-2 peer-checked/admin:ring-purple-400 transition hover:bg-white/20">
            <i class="fas fa-user-shield text-3xl mb-1 block"></i>
            <span class="text-sm">Admin</span>
          </label>

          <input type="radio" id="petugas" name="role" value="petugas" class="hidden peer/petugas role-option" />
          <label for="petugas"
            class="cursor-pointer border border-white/30 rounded-xl p-4 text-center peer-checked/petugas:bg-purple-600 peer-checked/petugas:ring-2 peer-checked/petugas:ring-purple-400 transition hover:bg-white/20">
            <i class="fas fa-user text-3xl mb-1 block"></i>
            <span class="text-sm">Petugas</span>
          </label>
        </div>

        <button type="submit"
          class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 rounded-lg transition duration-200 font-semibold">
          Login
        </button>

        @if(session('error'))
          <p class="text-center text-red-700 text-sm mt-2">{{ session('error') }}</p>
        @endif
      </form>
    </div>
  </div>
</body>
</html>
