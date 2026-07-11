<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cetak Transaksi - <?= $pinjam->pinjam_id; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
        }

        .info-table, .buku-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .info-table th, .info-table td, .buku-table th, .buku-table td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
        .buku-table th {
            background-color: #eee;
        }
        .footer {
            margin-top: 50px;
            width: 100%;
            text-align: right;
        }
    </style>
</head>
<body onload="window.print()">

<table class="info-table">
    <tr>
        <th>No Peminjaman</th>
        <td><?= $pinjam->pinjam_id; ?></td>
    </tr>
    <tr>
        <th>Tgl Peminjaman</th>
        <td><?= $pinjam->tgl_pinjam; ?></td>
    </tr>
    <tr>
        <th>Tgl Harus Kembali</th>
        <td><?= $pinjam->tgl_balik; ?></td>
    </tr>
    <tr>
        <th>Anggota</th>
        <td>
            <?php
            $user = $this->M_Admin->get_tableid_edit('tbl_login','anggota_id',$pinjam->anggota_id);
            if ($user) {
                echo $user->nama . ' (' . $user->anggota_id . ')<br>';
                echo 'Telepon: ' . $user->telepon . '<br>';
                echo 'Alamat: ' . $user->alamat;
            } else {
                echo 'Data anggota tidak ditemukan.';
            }
            ?>
        </td>
    </tr>
    <tr>
        <th>Status</th>
        <td><?= $pinjam->status; ?></td>
    </tr>
        <th>Lama Peminjaman</th>
        <td><?= $pinjam->lama_pinjam; ?> Hari</td>
    </tr>
</table>

<h4>Buku yang dipinjam</h4>
<table class="buku-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penerbit</th>
            <th>Tahun</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $pin = $this->M_Admin->get_tableid('tbl_pinjam','pinjam_id',$pinjam->pinjam_id);
        $no = 1;
        foreach ($pin as $isi) {
            $buku = $this->M_Admin->get_tableid_edit('tbl_buku','buku_id',$isi['buku_id']);
            echo '<tr>
                    <td>'.$no++.'</td>
                    <td>'.$buku->title.'</td>
                    <td>'.$buku->penerbit.'</td>
                    <td>'.$buku->thn_buku.'</td>
                  </tr>';
        }
        ?>
    </tbody>
</table>

<div class="footer">
    <p>Pepedan, <?= date('d-m-Y'); ?></p>
    <br><br><br>
    <p><strong>Petugas</strong></p>
</div>

</body>
</html>
