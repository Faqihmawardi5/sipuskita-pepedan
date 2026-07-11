<!-- File: application/views/index.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SIPUSKITA PEPEDAN | Sistem Informasi Perpustakaan Pustaka Kita Desa Pepedan</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets_style/image/logo_perpus.png') ?>" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <link href="<?= base_url('assets_style/landing/css/styles.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets_style/landing/css/styles2.css') ?>" rel="stylesheet" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="background: rgba(0,0,0,0.8); z-index:100;">
    <div class="container">
        <!-- Logo dan Judul -->
        <a class="navbar-brand d-flex align-items-center" href="<?= base_url('') ?>">
        <img src="<?= base_url('assets_style/image/logo_desa.png') ?>" alt="Logo Desa" style="width:30px; height:30px;" class="me-2">
        <b>SIPUSKITA</b>
        </a>

        <!-- Marquee -->
        <div class="d-none d-lg-block" style="max-width: 400px; overflow:hidden;">
        <marquee behavior="scroll" direction="left" scrollamount="5" class="text-light">
            <b>PERPUSTAKAAN PUSTAKA KITA DESA PEPEDAN NPP: 3329063D0000009</b>
        </marquee>
        </div>

        <!-- Toggler untuk mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link text-light" href="<?= base_url('') ?>">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light" href="#tentang">Tentang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="<?= base_url('koleksi') ?>">Koleksi Buku</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light active" href="<?= base_url('agenda') ?>">Agenda</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light" href="<?= base_url('bukutamu') ?>">Buku Tamu</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light" href="<?= base_url('login') ?>">Login</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <!-- Header -->
    <header class="masthead slideshow-header d-flex align-items-center justify-content-center">
        <div class="overlay"></div> <!-- Optional overlay for better readability -->
        <div class="container text-white text-center position-relative z-index-1">
            <h1 class="mb-4">Selamat Datang di SIPUSKITA</h1>
            <h3>Sistem Informasi Perpustakaan Pustaka Kita Desa Pepedan</h3>
            <p class="lead">Mari membaca, belajar, dan tumbuh bersama melalui koleksi buku terbaik untuk semua kalangan.</p>
            <a href="<?= base_url('koleksi') ?>" class="btn btn-primary btn-lg mt-3">Koleksi Buku</a>
        </div>
    </header>

    <!-- Tentang -->
    <section id="tentang" class="about-section text-center py-5" style="background-color:#f0f8ff;">
        <div class="container">
            <h2 class="mb-4">Tentang SIPUSKITA Desa Pepedan</h2>
            <p class="lead mb-5">
            SIPUSKITA merupakan sistem informasi perpustakaan Desa Pepedan yang dirancang untuk memberikan kemudahan dalam mencari, meminjam, dan mengelola koleksi buku. Melalui sistem ini, masyarakat dapat mengakses berbagai informasi buku secara cepat, praktis, dan dapat dilakukan kapan saja serta di mana saja.
            </p>
            <div class="row">
                <div class="col-lg-4">
                    <div class="about-item mx-auto mb-5">
                        <div class="about-icon d-flex">
                            <i class="bi bi-journal-bookmark-fill m-auto text-primary" style="font-size: 2rem;"></i>
                        </div>
                        <h4>Koleksi Buku Lengkap</h4>
                        <p>Berbagai jenis buku tersedia untuk semua kalangan usia dan minat.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="about-item mx-auto mb-5">
                        <div class="about-icon d-flex">
                            <i class="bi bi-people-fill m-auto text-primary" style="font-size: 2rem;"></i>
                        </div>
                        <h4>Layanan Ramah</h4>
                        <p>Petugas siap membantu Anda dalam pencarian dan peminjaman buku.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="about-item mx-auto mb-5">
                        <div class="about-icon d-flex">
                            <i class="bi bi-clock-history m-auto text-primary" style="font-size: 2rem;"></i>
                        </div>
                        <h4>Akses Mudah</h4>
                        <p>Sistem online memudahkan pencarian dan pengajuan peminjaman buku.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Statistik Pengunjung -->
<section class="stats-section text-center py-5" style="background: linear-gradient(90deg, #e0f7fa 0%, #80deea 100%);">
    <div class="container">
        <h3 class="mb-5 fw-bold">Statistik Pengunjung</h3>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="stat-item p-4 bg-white rounded shadow-sm hover-shadow">
                    <i class="bi bi-people-fill fs-1 text-primary mb-2"></i>
                    <h4 class="counter"><?= $pengunjung_hari_ini ?></h4>
                    <p class="text-muted">Pengunjung Hari Ini</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat-item p-4 bg-white rounded shadow-sm hover-shadow">
                    <i class="bi bi-calendar-month-fill fs-1 text-info mb-1"></i>
                    <h4 class="counter"><?=$pengunjung_bulan_ini ?></h4>
                    <p class="text-muted">Pengunjung Bulan Ini</p>
                </div>
            </div>        

            <div class="col-md-3">
                <div class="stat-item p-4 bg-white rounded shadow-sm hover-shadow">
                    <i class="bi bi-person-check-fill fs-1 text-success mb-2"></i>
                    <h4 class="counter"><?= $total_pengunjung ?></h4>
                    <p class="text-muted">Total Pengunjung</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-item p-4 bg-white rounded shadow-sm hover-shadow">
                    <i class="bi bi-journal-bookmark-fill fs-1 text-warning mb-2"></i>
                    <h4 class="counter"><?= $total_koleksi ?></h4>
                    <p class="text-muted">Total Koleksi Buku</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dokumentasi Kegiatan -->  
<section class="bg-light py-5" id="dokumentasi">  
    <div class="container">  
        
        <div class="text-center mb-5">
            <h3 class="fw-bold">GALERI KEGIATAN</h3>  
            <p class="text-muted">
                Dokumentasi kegiatan literasi, pelatihan, dan layanan perpustakaan
            </p>  
        </div>

        <div class="row g-4">  
            <?php if (!empty($kegiatan)): ?>  
                <?php foreach($kegiatan as $row): ?>  
                    
                    <div class="col-md-4 col-sm-6">
                        <div class="card border-0 shadow-sm h-100 galeri-card">
                            
                            <!-- Gambar -->
                            <div class="galeri-img-wrapper">
                                <img src="<?= base_url('assets_style/image/kegiatan/'.$row->gambar) ?>" 
                                     alt="<?= $row->judul ?>" 
                                     class="card-img-top galeri-img">
                            </div>

                            <!-- Konten -->
                            <div class="card-body text-center">
                                <h6 class="fw-semibold mb-1">
                                    <?= $row->judul ?>
                                </h6>
                            </div>

                        </div>
                    </div>

                <?php endforeach; ?>  
            <?php else: ?>  
                <div class="col-12 text-center">  
                    <p class="text-muted">Belum ada dokumentasi kegiatan.</p>  
                </div>  
            <?php endif; ?>  
        </div>  

    </div>  
</section>

    <!-- Footer -->
    <footer class="footer text-light" style="background-color: #0000ff; padding: 40px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-start my-auto">
                <p>Jl. KH. Anshor Desa Pepedan, Kecamatan Tonjong, Kabupaten Brebes</p>
                    <p class="small mb-4 mb-lg-0">&copy; SIPUSKITA - Perpustakaan Desa Pepedan 2026</p>
                </div>
                <div class="col-lg-6 text-center text-lg-end my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-4">
                            <a href="http://www.facebook.com/profile.php?id=61563339069000" class="text-white">
                                <i class="bi-facebook fs-3"></i>
                            </a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a href="http://www.instagram.com/pemdes.pepedan?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="text-white">
                                <i class="bi-instagram fs-3"></i>
                            </a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a href="mailto:kantordesapepedan2018@gmail.com" class="text-white">
                                <i class="bi-envelope fs-3"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://wa.me/6282324389815" target="_blank" class="text-white">
                                <i class="bi-whatsapp fs-3"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/landing/js/scripts.js') ?>"></script>
    <script>
    // Animasi counter naik
    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll('.counter');
        counters.forEach(counter => {
            const updateCount = () => {
                const target = +counter.innerText;
                let count = 0;
                const increment = target / 100; // 100 step

                const animate = () => {
                    count += increment;
                    if(count < target) {
                        counter.innerText = Math.ceil(count);
                        requestAnimationFrame(animate);
                    } else {
                        counter.innerText = target;
                    }
                }
                animate();
            }
            updateCount();
        });
    });
    </script>
</body>

</html>
