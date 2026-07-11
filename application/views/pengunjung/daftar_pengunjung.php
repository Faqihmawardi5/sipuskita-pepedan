<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $title_web; ?></h1>
    </section>

    <section class="content">

        <!-- FILTER -->
        <div class="box">
            <div class="box-body">

                <form method="GET" action="">
                    <div class="row">

                        <div class="col-md-3">
                            <label>Filter</label>
                            <select name="filter" class="form-control" id="filter">
                                <option value="total"
                                    <?= ($this->input->get('filter') == 'total') ? 'selected' : '' ?>>
                                    Total
                                </option>

                                <option value="bulanan"
                                    <?= ($this->input->get('filter') == 'bulanan') ? 'selected' : '' ?>>
                                    Bulanan
                                </option>

                                <option value="tahunan"
                                    <?= ($this->input->get('filter') == 'tahunan') ? 'selected' : '' ?>>
                                    Tahunan
                                </option>
                            </select>
                        </div>

                        <!-- BULAN -->
                        <div class="col-md-3" id="bulanBox">
                            <label>Bulan</label>
                            <select name="bulan" class="form-control">
                                <?php for($i=1;$i<=12;$i++): ?>
                                    <option value="<?= $i ?>"
                                        <?= ($this->input->get('bulan') == $i) ? 'selected' : '' ?>>
                                        <?= date('F', mktime(0,0,0,$i,1)) ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                        </div>

                        <!-- TAHUN -->
                        <div class="col-md-3">
                            <label>Tahun</label>
                            <select name="tahun" class="form-control">
                                <?php for($t=date('Y'); $t>=2020; $t--): ?>
                                    <option value="<?= $t ?>"
                                        <?= ($this->input->get('tahun') == $t) ? 'selected' : '' ?>>
                                        <?= $t ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label>&nbsp;</label><br>
                            <button type="submit" class="btn btn-primary">
                                <i class="glyphicon glyphicon-filter"></i> Filter
                            </button>

                            <button type="button" onclick="printPengunjung()" class="btn btn-danger">
                                <i class="glyphicon glyphicon-print"></i> Cetak
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </div>

        <!-- TABEL -->
        <div class="box">
            <div class="box-body table-responsive">

                <table class="table table-bordered table-striped" id="pengunjungTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Keperluan</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no=1; foreach($pengunjung as $p): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($p->nama); ?></td>
                            <td><?= htmlspecialchars($p->jk); ?></td>
                            <td><?= htmlspecialchars($p->alamat); ?></td>
                            <td><?= htmlspecialchars($p->keperluan); ?></td>
                            <td><?= date('d/m/Y', strtotime($p->tanggal_kunjungan)); ?></td>
                            <td><?= htmlspecialchars($p->waktu_kunjungan); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>

            </div>
        </div>

    </section>
</div>

<script>

function toggleFilter() {

    var filter = document.getElementById('filter').value;
    var bulanBox = document.getElementById('bulanBox');

    if(filter == 'bulanan'){
        bulanBox.style.display = 'block';
    } else {
        bulanBox.style.display = 'none';
    }
}

document.getElementById('filter').addEventListener('change', toggleFilter);

toggleFilter();

function printPengunjung() {

    var table = document.getElementById('pengunjungTable').outerHTML;
    var win = window.open('', '_blank');

    win.document.write(`
    <html>
    <head>
        <title>Laporan Data Pengunjung</title>

        <style>

            body{
                font-family: Arial;
                margin:30px;
                font-size:11px;
            }

            .kop{
                width:100%;
                border-bottom:3px solid #000;
                padding-bottom:10px;
                margin-bottom:20px;
            }

            .kop img{
                width:80px;
            }

            .judul{
                text-align:center;
                font-size:15px;
                font-weight:bold;
            }

            .alamat{
                text-align:center;
                font-size:11px;
            }

            table.data{
                width:100%;
                border-collapse:collapse;
                margin-top:15px;
            }

            table.data th,
            table.data td{
                border:1px solid #000;
                padding:6px;
            }

            .ttd{
                margin-top:50px;
            }

        </style>

    </head>

    <body onload="window.print()">

        <table class="kop">
            <tr>

                <td width="15%">
                    <img src="<?= base_url('assets_style/image/logo_desa.png') ?>">
                </td>

                <td width="70%">
                    <div class="judul">
                        PERPUSTAKAAN "PUSTAKA KITA"<br>
                        DESA PEPEDAN KECAMATAN TONJONG
                    </div>

                    <div class="alamat">
                        Jl. KH. Anshor Pepedan, Tonjong, Brebes, Jawa Tengah
                    </div>
                </td>

                <td width="15%" align="right">
                    <img src="<?= base_url('assets_style/image/logo_perpus.png') ?>">
                </td>

            </tr>
        </table>

        <h4 style="text-align:center;">
            LAPORAN DATA PENGUNJUNG
        </h4>

        ${table.replace('table table-bordered table-striped','data')}

        <table class="ttd" width="100%">
            <tr>
                <td width="60%"></td>

                <td align="center">
                    Pepedan, <?= date('d M Y') ?><br>
                    Kepala Perpustakaan
                    <br><br><br><br>

                    <strong>
                        <u>ADE NURDIYAN, MH.</u>
                    </strong>
                </td>
            </tr>
        </table>

    </body>
    </html>
    `);

    win.document.close();
}

</script>