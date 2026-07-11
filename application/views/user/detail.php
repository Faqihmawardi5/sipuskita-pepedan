<?php
// Format tanggal
$tgl_lahir = isset($tgl_lahir) ? tgl_indo($tgl_lahir, $bulan) : 'Tanggal lahir tidak tersedia';
$tgl_bergabung = isset($tgl_bergabung) ? tgl_indo($tgl_bergabung, $bulan) : 'Tanggal bergabung tidak tersedia';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title_web; ?></title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets_style/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets_style/assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets_style/css/kartu.css">
    <link rel="icon" type="image/png" href="<?= base_url('assets_style/image/logo_desa.png') ?>">
</head>
<body>

<div class="noprint">
    <button id="download-btn" class="btn btn-primary" data-userid="<?= $user->anggota_id; ?>">
        <i class="fa fa-download"></i> Unduh Kartu
    </button>
</div>

<div id="kartu-anggota" class="page">
    <!-- Kartu Depan -->
    <div class="panel-body" style="background-image: url('<?= base_url(); ?>assets_style/image/kartu_depan.png');">
        <div class="row">
        <div class="col-sm-8">
            <table class="table table-borderless" style="font-size: 16px; margin-left: 30px; margin-top:70px; line-height: 1.5;">
                <tr>
                    <td><strong>NIA</strong></td>
                    <td>:</td>
                    <td><?= $user->anggota_id; ?></td>
                </tr>
                <tr>
                    <td><strong>Nama</strong></td>
                    <td>:</td>
                    <td><?= $user->nama; ?></td>
                </tr>
                <tr>
                    <td><strong>TTL</strong></td>
                    <td>:</td>
                    <td><?= $user->tempat_lahir; ?>, <?= tgl_indo($user->tgl_lahir); ?></td>
                </tr>
                <tr>
                    <td><strong>Alamat</strong></td>
                    <td>:</td>
                    <td><?= $user->alamat; ?></td>
                </tr>
                <tr>
                    <td><strong>Bergabung</strong></td>
                    <td>:</td>
                    <td><?= tgl_indo($user->tgl_bergabung); ?></td>
                </tr>
            </table>
        </div>
            <div class="col-sm-4 text-center">
                <img src="<?= base_url(); ?>assets_style/image/<?= $user->foto; ?>" class="foto-anggota">
                <br><br>
                <svg id="barcode"></svg>
            </div>
        </div>
    </div><br></br>

    <!-- Kartu Belakang -->
    <div class="panel-body" style="background-image: url('<?= base_url(); ?>assets_style/image/kartu.png');">
        <div style="color: #000;">
            <h4 style="text-align: center; margin-top: 75px;"><strong>TATA TERTIB ANGGOTA:</strong></h4><br>
            <ul style="font-size: 14px; margin-left: 30px;">
                <li>Wajib menjaga dan mengembalikan buku tepat waktu.</li>
                <li>Dilarang meminjamkan kartu kepada orang lain.</li>
                <li>Apabila kehilangan kartu, segera lapor ke petugas.</li>
                <li>Penyalahgunaan kartu dapat dikenakan sanksi.</li>
            </ul>
            <br>
            <p style="font-size: 14px; text-align: center; margin-top: 10px">
                <strong>PERPUSTAKAAN PUSTAKA KITA DESA PEPEDAN</strong><br>
                Jl. KH. Anshor Desa Pepedan, Kecamatan Tonjong, Kabupaten Brebes,<br>
                Telp: 082324389815, Email: kantordesapepedan2018@gmail.com
            </p>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
<script src="<?= base_url(); ?>assets_style/js/kartu.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const nia = "<?= $user->anggota_id; ?>";

    JsBarcode("#barcode", nia, {
        format: "CODE128",   // Format barcode
        lineColor: "#000",   // Warna garis barcode
        width: 1,            // Ketebalan garis
        height: 20,          // Tinggi barcode
        displayValue: true,  // Menampilkan angka
        fontSize: 12,        // Ukuran font angka di bawah barcode
        margin: 0            // Jarak barcode dengan angka
    });
    
});
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const btn = document.getElementById("download-btn");

    btn.addEventListener("click", function () {
        const element = document.getElementById("kartu-anggota");

        html2canvas(element, {
            scale: 2, // biar hasil lebih tajam
            useCORS: true
        }).then(canvas => {
            const imgData = canvas.toDataURL("image/png");

            const { jsPDF } = window.jspdf;

            // ukuran A4 portrait
            const pdf = new jsPDF("p", "mm", "a4");

            const pageWidth = pdf.internal.pageSize.getWidth();
            const pageHeight = pdf.internal.pageSize.getHeight();

            // hitung rasio agar pas halaman
            const imgWidth = pageWidth;
            const imgHeight = (canvas.height * imgWidth) / canvas.width;

            let position = 0;

            pdf.addImage(imgData, "PNG", 0, position, imgWidth, imgHeight);

            pdf.save("kartu-anggota.pdf");
        });
    });
});
</script>    
</body>
</html>
