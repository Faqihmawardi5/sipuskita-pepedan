<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Buku Tamu - SIPUSKITA</title>

    <!-- Icon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets_style/image/logo_perpus.png') ?>">

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="<?= base_url('assets_style/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets_style/bootstrap-5.3.8/css/bootstrap.min.css') ?>">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- CSS Tambahan -->
    <link href="<?= base_url('assets_style/landing/css/styles2.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets_style/landing/css/styles4.css') ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets_style/css/custom.css') ?>">
</head>

<body style="background: url('<?= base_url('assets_style/image/Buku-1.jpg') ?>') no-repeat center center fixed; background-size: cover;">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="background: rgba(0,0,0,0.8); z-index:100;">
    <div class="container">
        
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="<?= base_url('') ?>">
            <img src="<?= base_url('assets_style/image/logo_desa.png') ?>" style="width:30px; height:30px;" class="me-2">
            SIPUSKITA
        </a>

        <!-- Marquee -->
        <div class="d-none d-lg-block" style="max-width: 400px; overflow:hidden;">
            <marquee behavior="scroll" direction="left" scrollamount="5" class="text-light">
                Sistem Informasi Perpustakaan Pustaka Kita Desa Pepedan
            </marquee>
        </div>

        <!-- Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" href="<?= base_url('') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="<?= base_url('') ?>">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="<?= base_url('koleksi') ?>">Koleksi Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="<?= base_url('agenda') ?>">Agenda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('bukutamu') ?>">Buku Tamu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="<?= base_url('login') ?>">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Content -->
<div class="container py-5">
    <br><br><br>

    <!-- Alert -->
    <?php if($this->session->flashdata('pesan')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill"></i>
            <?= $this->session->flashdata('pesan'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Form -->
    <div class="d-flex justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-sm border-primary" style="background: rgba(255,255,255,0.9);">
                
                <div class="text-center mt-4">
                    <img src="<?= base_url('assets_style/image/logo_desa.png') ?>" style="width:80px; height:80px;">
                    <br><br>
                    <h5>Daftar Hadir Pengunjung</h5>
                </div>

                <div class="card-body">

                    <form action="<?= base_url('bukutamu/simpan') ?>" method="POST">

                        <!-- Nama -->
                        <div class="mb-3">
                            <label>Nama :</label>
                            <input type="text" 
                                   name="nama" 
                                   class="form-control" 
                                   placeholder="Masukkan nama lengkap"
                                   required>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="mb-3">
                            <label class="d-block">Jenis Kelamin :</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input"
                                       type="radio"
                                       name="jk"
                                       id="laki"
                                       value="Laki-laki"
                                       required>

                                <label class="form-check-label" for="laki">
                                    Laki-laki
                                </label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input"
                                       type="radio"
                                       name="jk"
                                       id="perempuan"
                                       value="Perempuan">

                                <label class="form-check-label" for="perempuan">
                                    Perempuan
                                </label>
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="mb-3">
                            <label>Alamat :</label>
                            <input type="text" 
                                   name="alamat" 
                                   class="form-control"
                                   placeholder="Masukkan alamat"
                                   required>
                        </div>

                        <!-- Keperluan -->
                        <div class="mb-3">
                            <label>Keperluan :</label>
                            <textarea name="keperluan"
                                      class="form-control"
                                      rows="3"
                                      placeholder="Masukkan keperluan kunjungan"
                                      required></textarea>
                        </div>

                        <!-- Tombol -->
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-send-fill"></i> 
                            <b>Submit</b>
                        </button>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Script -->
<script src="<?= base_url('assets_style/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<script>
setTimeout(function() {
    let alert = document.querySelector('.alert');
    if(alert){
        alert.classList.remove('show');
        alert.classList.add('fade');

        setTimeout(() => {
            alert.remove();
        }, 500);
    }
}, 3000);
</script>

</body>
</html>