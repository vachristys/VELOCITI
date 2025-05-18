<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Panel - Argon Style</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  
 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: #f2f4f8;
      margin: 0;
    }

    .glass-card {
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
      border-radius: 1rem;
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }

    .glass-card:hover {
      transform: scale(1.02);
    }

    .nav-link.active {
      background-color: #e8f0fe;
      font-weight: 600;
    }

    .sidebar {
      width: 250px;
      height: 85vh;
      position: fixed;
      top: 2rem;
      left: 1rem;
      border-radius: 1rem;
    }

    main {
      margin-left: 270px;
      padding: 2rem;
    }

    .banner-img {
      height: 25vh;
      width: 100%;
      object-fit: cover;
      border-radius: 1rem;
      box-shadow: 0 2px 12px rgba(0,0,0,0.15);
    }

    .hover-shadow:hover {
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
    transform: scale(1.03);
    transition: all 0.3s;
}
    .btn[style*="#7c3aed"]:hover {
  background: #5b21b6 !important;
  color: #fff !important;
}
  </style>
</head>
<body class="text-dark">

<div class="d-flex">
  <aside class="bg-white shadow-lg p-4 d-flex flex-column justify-content-between sidebar">
    <div>
      <h1 class="text-purple-700 fw-bold mb-4" style="font-size:2.8rem;">VELOCITI</h1>
      <nav class="nav flex-column mb-4">
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
          <i class="bi bi-speedometer2 me-2 text-primary"></i> Dashboard
        </a>
        <a href="{{ route('admin.user') }}" class="nav-link {{ request()->routeIs('admin.user') ? 'active' : '' }}">
          <i class="bi bi-people-fill me-2 text-success"></i> Petugas
        </a>
        <a href="{{ route('admin.tarif') }}" class="nav-link {{ request()->routeIs('admin.tarif') ? 'active' : '' }}">
          <i class="bi bi-cash-stack me-2 text-warning"></i> Tarif
        </a>
        <a href="{{ route('admin.laporan') }}" class="nav-link {{ request()->routeIs('admin.laporan') ? 'active' : '' }}">
          <i class="bi bi-receipt-cutoff me-2 text-danger"></i> Laporan
        </a>
      </nav>
    </div>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="btn btn-outline-danger w-100">
        <i class="bi bi-box-arrow-right me-2"></i> Logout
      </button>
    </form>
  </aside>

  <main class="flex-grow-1">
    <div class="mb-4">
      <img src="{{ asset('assets/img/ad.png') }}" class="banner-img" alt="Banner">
    </div>

    @yield('content')
  </main>
</div>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 800,
    once: true,
    offset: 120
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    function printCard(cardId) {
        const printContents = document.getElementById(cardId).innerHTML;
        const originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }
</script>
</html>
