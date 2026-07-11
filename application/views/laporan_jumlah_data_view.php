<?php
// 🔥 Default agar tidak undefined
$filter = $filter ?? 'bulanan';
$bulan  = $bulan ?? date('m');
$tahun  = $tahun ?? date('Y');
?>

<div class="content-wrapper">
    <section class="content-header"><br>
        <h1><?= $title_web; ?></h1>
    </section>

    <section class="content">
        <div class="box">

            <!-- 🔥 FILTER -->
            <div class="box-header with-border">
                <form method="GET" action="">
                    <div class="row">

                        <!-- JENIS LAPORAN -->
                        <div class="col-md-3">
                            <label>Jenis Laporan</label>
                            <select name="filter" class="form-control" id="filter">
                                <option value="bulanan" <?= ($filter=='bulanan'?'selected':''); ?>>Bulanan</option>
                                <option value="tahunan" <?= ($filter=='tahunan'?'selected':''); ?>>Tahunan</option>
                                <option value="total" <?= ($filter=='total'?'selected':''); ?>>Total</option>
                            </select>
                        </div>

                        <!-- BULAN -->
                        <div class="col-md-3">
                            <label>Bulan</label>
                            <select name="bulan" id="bulan" class="form-control" <?= ($filter!='bulanan'?'disabled':''); ?>>
                                <?php for($i=1;$i<=12;$i++): ?>
                                    <option value="<?= $i; ?>" <?= ($i==$bulan?'selected':''); ?>>
                                        <?= date('F', mktime(0,0,0,$i,1)); ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                        </div>

                        <!-- TAHUN -->
                        <div class="col-md-3">
                            <label>Tahun</label>
                            <select name="tahun" id="tahun" class="form-control" <?= ($filter=='total'?'disabled':''); ?>>
                                <?php for($t=2020;$t<=date('Y');$t++): ?>
                                    <option value="<?= $t; ?>" <?= ($t==$tahun?'selected':''); ?>>
                                        <?= $t; ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                        </div>

                        <!-- BUTTON -->
                        <div class="col-md-3" style="margin-top:25px;">
                            <button type="submit" class="btn btn-primary">
                                <i class="glyphicon glyphicon-filter"></i> Filter
                            </button>
                        </div>

                    </div>
                </form>

                <br>

                <!-- CETAK -->
                <a href="<?= base_url('laporan/cetak_jumlah_data?filter='.$filter.'&bulan='.$bulan.'&tahun='.$tahun); ?>"
                   target="_blank"
                   class="btn btn-danger">
                    <i class="glyphicon glyphicon-print"></i> <b>Cetak</b>
                </a>
            </div>

            <!-- 🔥 BODY -->
            <div class="box-body">

                <!-- INFO FILTER -->
                <div class="alert alert-info">
                    <?php if($filter == 'bulanan'): ?>
                        Menampilkan <b>Laporan Bulanan</b> bulan 
                        <b><?= date('F', mktime(0,0,0,$bulan,1)); ?> <?= $tahun; ?></b>

                    <?php elseif($filter == 'tahunan'): ?>
                        Menampilkan <b>Laporan Tahunan</b> tahun 
                        <b><?= $tahun; ?></b>

                    <?php else: ?>
                        Menampilkan <b>Laporan Total Keseluruhan Data</b>
                    <?php endif; ?>
                </div>

                <!-- TABEL -->
                <table class="table table-bordered table-striped">
                    <tr>
                        <th width="40%">Keterangan</th>
                        <th>Jumlah</th>
                    </tr>

                    <tr>
                        <td>Jumlah Buku</td>
                        <td><?= $count_buku; ?></td>
                    </tr>

                    <tr>
                        <td>Jumlah Anggota</td>
                        <td><?= $count_anggota; ?></td>
                    </tr>

                    <tr>
                        <td>Buku Dipinjam</td>
                        <td><?= $count_pinjam; ?></td>
                    </tr>

                    <tr>
                        <td>Buku Dikembalikan</td>
                        <td><?= $count_kembali; ?></td>
                    </tr>

                    <tr>
                        <td>Pengunjung Laki-laki</td>
                        <td><?= $count_pengunjung_laki; ?></td>
                    </tr>

                    <tr>
                        <td>Pengunjung Perempuan</td>
                        <td><?= $count_pengunjung_perempuan; ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Pengunjung</td>
                        <td><?= $count_pengunjung; ?></td>
                    </tr>
                </table>

            </div>
        </div>
    </section>
</div>

<!-- 🔥 JS UX -->
<script>
document.getElementById('filter').addEventListener('change', function(){
    const val = this.value;

    const bulan = document.getElementById('bulan');
    const tahun = document.getElementById('tahun');

    // Reset disable
    bulan.disabled = true;
    tahun.disabled = true;

    if(val === 'bulanan'){
        bulan.disabled = false;
        tahun.disabled = false;
    } 
    else if(val === 'tahunan'){
        tahun.disabled = false;
    }
});
</script>