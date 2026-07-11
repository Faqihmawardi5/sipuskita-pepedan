<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Koleksi Buku - SIPUSKITA</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets_style/image/logo_perpus.png') ?>">

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="assets_style/bootstrap-5.3.8/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets_style/landing/css/styles2.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets_style/landing/css/styles5.css') ?>" rel="stylesheet" />
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
        <h1>Koleksi Buku</h1>
        <p class="lead">Temukan koleksi buku terbaik untuk Anda baca dan pelajari.</p>

        <!-- Search Bar -->
        <div class="search-bar mb-3">
            <form action="<?= base_url('koleksi') ?>" method="get" class="d-flex">
                <input type="text" name="q" class="form-control form-control-lg" placeholder="Cari judul, pengarang, penerbit...">
                <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-search"></i> Cari</button>
            </form>
        </div>
    </div>
</header>

<!-- Tabel Koleksi Buku -->
<section class="py-5">
    <div class="koleksi-table-container">
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle" id="bukuTable">

                <thead class="text-center table-primary">
                    <tr>
                        <th>No</th>
                        <th>Sampul</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($buku)) : ?>

                        <?php $no = 1; ?>
                        <?php foreach($buku as $index => $b) : ?>

                            <tr class="buku-row" <?= ($index >= 3) ? 'style="display:none;"' : ''; ?>>

                                <td class="text-center">
                                    <?= $no++ ?>
                                </td>

                                <td class="text-center">
                                    <?php if(!empty($b->sampul) && $b->sampul != "0") : ?>

                                        <img
                                            src="<?= base_url('assets_style/image/buku/'.$b->sampul) ?>"
                                            class="sampul-img"
                                            alt="<?= $b->title ?>"
                                        >

                                    <?php else : ?>

                                        <i class="bi bi-image text-secondary" style="font-size:28px;"></i>
                                        <div class="small text-muted">
                                            No Cover
                                        </div>

                                    <?php endif; ?>
                                </td>

                                <td>
                                    <strong><?= $b->title ?></strong>
                                </td>

                                <td>
                                    <?= $b->pengarang ?>
                                </td>

                                <td>
                                    <?= $b->penerbit ?>
                                </td>

                                <td class="text-center">
                                    <span class="badge bg-primary">
                                        <?= $b->thn_buku ?>
                                    </span>
                                </td>

                                <td class="text-center">
                                    <a href="<?= base_url('koleksi/detail/'.$b->id_buku) ?>"
                                    class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else : ?>

                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="bi bi-book fs-1 d-block mb-2"></i>
                                    Buku tidak tersedia
                                </div>
                            </td>
                        </tr>

                    <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>

        <!-- Tombol show more -->
        <?php if (!empty($buku) && count($buku) > 3) : ?>
            <div class="text-center mt-3">
                <button type="button" id="showMoreBtn" class="btn btn-outline-primary">
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

<script>
document.querySelector('input[name="q"]').addEventListener('keyup', function () {
    let filter = this.value.toLowerCase();
    document.querySelectorAll('#bukuTable tbody tr').forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(filter) ? '' : 'none';
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const rows = document.querySelectorAll('#bukuTable tbody .buku-row');
    const showMoreBtn = document.getElementById('showMoreBtn');
    const searchInput = document.querySelector('input[name="q"]');

    const initialLimit = 3;

    // tampilkan hanya 3 data pertama
    rows.forEach((row, index) => {
        if (index >= initialLimit) {
            row.style.display = 'none';
        }
    });

    // tombol show more
    if (showMoreBtn) {
        showMoreBtn.addEventListener('click', function () {
            rows.forEach(row => {
                row.style.display = '';
            });

            showMoreBtn.style.display = 'none';
        });
    }

    // pencarian
    if (searchInput) {
        searchInput.addEventListener('keyup', function () {

            let filter = this.value.toLowerCase();

            rows.forEach(row => {
                const match = row.innerText.toLowerCase().includes(filter);
                row.style.display = match ? '' : 'none';
            });

            // sembunyikan tombol saat search aktif
            if (showMoreBtn) {
                showMoreBtn.style.display = 'none';
            }
        });
    }

    // animasi counter (kalau ada)
    const counters = document.querySelectorAll('.counter');

    if (counters.length > 0) {
        counters.forEach(counter => {
            let target = parseInt(counter.innerText) || 0;
            let count = 0;
            let step = target / 100;

            function animate() {
                count += step;

                if (count < target) {
                    counter.innerText = Math.ceil(count);
                    requestAnimationFrame(animate);
                } else {
                    counter.innerText = target;
                }
            }

            animate();
        });
    }

});
</script>

</body>
</html>