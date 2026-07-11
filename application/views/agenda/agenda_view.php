<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $title_web; ?></h1>
    </section>

    <section class="content">
        <?= $this->session->flashdata('pesan'); ?>

        <?php if ($this->session->userdata('level') == 'Petugas'): ?>
            <a href="<?= base_url('data/agenda_tambah') ?>" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> Tambah Agenda
            </a>
            <button onclick="printAgenda()" class="btn btn-danger btn-sm">
                <i class="fa fa-print"></i> Cetak
            </button>
        <?php else: ?>
            <button onclick="printAgenda()" class="btn btn-danger btn-sm">
                <i class="fa fa-print"></i> Cetak
            </button>
        <?php endif; ?>

        <br><br>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Daftar Agenda</h3>
            </div>
            <div class="box-body table-responsive">
                <table id="agendaTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th width="100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($agenda->num_rows() > 0): ?>
                            <?php $no = 1; foreach($agenda->result() as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlentities($row->judul) ?></td>
                                <td><?= htmlentities($row->deskripsi) ?></td>
                                <td><?= date('d-m-Y', strtotime($row->tgl)) ?></td>
                                <td>
                                    <?php if($this->session->userdata('level') == 'Petugas'): ?>
                                        <a href="<?= base_url('data/agenda_edit/' . $row->id_agenda) ?>" class="btn btn-warning btn-xs" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('data/agenda_proses?hapus=' . $row->id_agenda) ?>" onclick="return confirm('Hapus agenda ini?')" class="btn btn-danger btn-xs" title="Hapus">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">Belum ada agenda.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<script>
function printAgenda() {
    var table = document.getElementById('agendaTable').outerHTML;

    // Hapus kolom Aksi (kolom terakhir) untuk cetak
    var tempDiv = document.createElement('div');
    tempDiv.innerHTML = table;
    var rows = tempDiv.querySelectorAll('tr');
    rows.forEach(function(row){
        if(row.children.length > 1){
            row.removeChild(row.children[row.children.length-1]); // hapus kolom Aksi
        }
    });
    var cleanedTable = tempDiv.innerHTML.replace('table table-bordered table-striped','data');

    var win = window.open('', '_blank');
    win.document.write(`
    <html>
    <head>
        <title>Daftar Agenda Perpustakaan</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 30px; font-size: 12px; }
            .kop { width: 100%; border-bottom: 3px solid #000; padding-bottom: 10px; margin-bottom: 20px; }
            .kop td { vertical-align: middle; }
            .kop img { width: 80px; }
            .kop .judul { text-align: center; font-weight: bold; font-size: 15px; line-height: 1.4; }
            .kop .alamat { font-size: 11px; text-align: center; }
            table.data { width: 100%; border-collapse: collapse; margin-top: 15px; }
            table.data th, table.data td { border: 1px solid #000; padding: 6px; }
            table.data th { text-align: center; }
            .ttd { margin-top: 50px; }
        </style>
    </head>
    <body onload="window.print()">

    <!-- KOP SURAT -->
        <table class="kop" width="100%">
            <tr>
                <td width="15%">
                    <img src="<?= base_url('assets_style/image/logo_perpus.png'); ?>">
                </td>
                <td width="70%">
                    <div class="judul">
                        PERPUSTAKAAN "SIPUSKITA"<br>
                        DESA PEPEDAN KECAMATAN TONJONG
                    </div>
                    <div class="alamat">
                    Jl. KH. Anshor Pepedan, Tonjong, Brebes, Jawa Tengah 52271<br>
                        Email: kantordesapepedan2018@gmail.com | Telp: 082324389815
                    </div>
                </td>
                <td width="15%" align="right">
                    <img src="<?= base_url('assets_style/image/logo_desa.png'); ?>">
                </td>
            </tr>
        </table>

        <h4 style="text-align:center;">DAFTAR KEGIATAN PERPUSTAKAAN</h4>

        <!-- TABEL DATA -->
        ${cleanedTable}

        <!-- TANDA TANGAN -->
        <table class="ttd" width="100%">
            <tr>
                <td width="60%"></td>
                <td align="center">
                    Pepedan, <?= date('d M Y') ?><br>
                    Kepala Perpustakaan<br><br><br><br>
                    <strong><u>ADE NURDIYAN, MH.</u></strong>
                </td>
            </tr>
        </table>

    </body>
    </html>
    `);

    win.document.close();
}
</script>