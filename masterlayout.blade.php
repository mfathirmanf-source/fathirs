<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UTS Pem Web</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid px-4">
            <a class="navbar-brand" href="/">UTS Pem Web</a>

            <div class="navbar-nav ms-auto me-2">
                <a class="nav-link active" href="/">Home</a>
                <a class="nav-link" href="#">Features</a>
                <a class="nav-link" href="#">M.fathirman, Ridho </a>
                <a class="nav-link disabled" href="#">24010110217, 24010110207 </a>
            </div>
        </div>
    </nav>

    <!-- Konten Halaman -->
    <main class="container py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="container mt-5">

        <div class="d-flex justify-content-center gap-3 py-4">
            <a href="/" class="text-secondary text-decoration-none">Home</a>
            <a href="#" class="text-secondary text-decoration-none">Features</a>
            <a href="#" class="text-secondary text-decoration-none">Pricing</a>
            <a href="#" class="text-secondary text-decoration-none">FAQs</a>
            <a href="#" class="text-secondary text-decoration-none">About</a>
        </div>

        <hr>

        <p class="text-center text-secondary py-2">
            © 2025 Dibuat Sejujurnya Oleh Team (Masukkan Nama ketua)
            dan (Masukkan Nama Anggota) Tanpa Mencontek dari Tim Lain
        </p>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>