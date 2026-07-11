<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Agenda - SIPUSKITA</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets_style/image/logo_perpus.png') ?>">

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="assets_style/bootstrap-5.3.8/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets_style/landing/css/styles2.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets_style/landing/css/styles4.css') ?>" rel="stylesheet" />
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="background: rgba(0,0,0,0.8); z-index:100;">
    <div class="container">
        <!-- Logo dan Judul -->
        <a class="navbar-brand d-flex align-items-center" href="<?= base_url('') ?>">
        <img src="<?= base_url('assets_style/image/logo_desa.png') ?>" alt="Logo Desa" style="width:30px; height:30px;" class="me-2">
        SIPUSKITA
        </a>

        <!-- Marquee -->
        <div class="d-none d-lg-block" style="max-width: 400px; overflow:hidden;">
        <marquee behavior="scroll" direction="left" scrollamount="5" class="text-light">
            Sistem Informasi Perpustakaan Pustaka Kita Desa Pepedan
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
            <a class="nav-link text-light" href="<?= base_url('') ?>">Tentang</a>
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

<!-- Header / Hero -->
<header class="masthead slideshow-header d-flex align-items-center justify-content-center">
        <div class="overlay"></div> <!-- Optional overlay for better readability -->
    <div class="header-content container">
        <h1>Agenda Perpustakaan</h1>
        <p class="lead">
            Informasi kegiatan dan agenda terbaru di perpustakaan desa.
        </p>

        <!-- Search Bar -->
        <div class="search-bar mb-3">

            <form action="<?= base_url('agenda') ?>" method="get" class="d-flex gap-2">

                <input 
                    type="text" 
                    name="q"
                    class="form-control form-control-lg"
                    placeholder="Cari judul atau deskripsi agenda..."
                    value="<?= isset($keyword) ? $keyword : '' ?>"
                >

                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="bi bi-search"></i> Cari
                </button>

            </form>

        </div>
    </div>
</header>

<!-- Tabel Agenda -->
<section class="py-5">
    <div class="agenda-container">
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle" id="agendaTable">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Agenda</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                 <tbody>
                    <?php if (!empty($agenda)) : ?>
                        <?php $no = 1; ?>
                        <?php foreach($agenda as $index => $a) : ?>
                            <tr class="agenda-row" <?= ($index >= 3) ? 'style="display:none;"' : ''; ?>>

                                <td class="text-center">
                                    <?= $no++ ?>
                                </td>

                                <td class="text-center">
                                    <span class="badge bg-primary">
                                        <?= date('d M Y', strtotime($a->tgl)) ?>
                                    </span>
                                </td>

                                <td>
                                    <strong><?= $a->judul ?></strong>
                                </td>

                                <td>
                                    <?= $a->deskripsi ?>
                                </td>

                            </tr>
                        <?php endforeach; ?>

                    <?php else : ?>
                        <tr>
                            <td colspan="4" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="bi bi-calendar-x fs-1 d-block mb-2"></i>
                                    Agenda tidak ditemukan
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Show More -->
        <?php if (!empty($agenda) && count($agenda) > 3) : ?>
            <div class="text-center mt-3">
                <button id="showMoreBtn" class="btn btn-outline-primary">
                    Tampilkan Semua
                </button>
            </div>
        <?php endif; ?>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/landing/js/scripts.js') ?>"></script>
<script>
// Search
document.getElementById('searchAgenda').addEventListener('keyup', function () {
    let val = this.value.toLowerCase();
    document.querySelectorAll('.agenda-row').forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(val) ? '' : 'none';
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {

    const btn = document.getElementById('showMoreBtn');

    if (btn) {
        btn.addEventListener('click', function() {

            document.querySelectorAll('.agenda-row').forEach(function(row) {
                row.style.display = '';
            });

            btn.style.display = 'none';
        });
    }

});
</script>

</body>
</html>