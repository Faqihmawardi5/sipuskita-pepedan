<?php if(! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-edit" style="color:green"></i> <?= $title_web;?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
      <li class="active"><i class="fa fa-file-text"></i>&nbsp; <?= $title_web;?></li>
    </ol>
  </section>

  <section class="content">
    <?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');} ?>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <?php if($this->session->userdata('level') == 'Petugas'){ ?>
              <a href="<?= base_url('data/bukutambah');?>">
                <button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Buku</button>
              </a>

              <div class="btn">
                <button onclick="printBuku()" class="btn btn-danger">
                  <i class="glyphicon glyphicon-print"></i><b> Cetak</b>
                </button>
              </div>
            <?php } ?>
          </div>

          <div class="box-body table-responsive">
            <table id="bukuTable" class="table table-bordered table-striped table" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Sampul</th>
                  <th>ISBN</th>
                  <th>Judul</th>
                  <th>Penerbit</th>
                  <th>Tahun Buku</th>
                  <th>Stok Buku</th>
                  <th>Dipinjam</th>
                  <th>Tanggal Masuk</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach($buku->result_array() as $isi){ ?>
                <tr>
                  <td><?= $no;?></td>
                  <td>
                    <center>
                      <?php if(!empty($isi['sampul']) && $isi['sampul'] !== "0"){ ?>
                        <img src="<?= base_url('assets_style/image/buku/'.$isi['sampul']);?>" style="height:auto;width:100px;" />
                      <?php } else { ?>
                        <i class="fa fa-book fa-3x" style="color:#333;"></i><br/><br/>Tidak Ada Sampul
                      <?php } ?>
                    </center>
                  </td>
                  <td><?= $isi['isbn'];?></td>
                  <td><?= $isi['title'];?></td>
                  <td><?= $isi['penerbit'];?></td>
                  <td><?= $isi['thn_buku'];?></td>
                  <td><?= $isi['jml'];?></td>
                  <td>
                    <?php
                      $id = $isi['buku_id'];
                      $dd = $this->db->query("SELECT * FROM tbl_pinjam WHERE buku_id='$id' AND status='Dipinjam'");
                      echo ($dd->num_rows() > 0) ? $dd->num_rows() : '0';
                    ?>
                  </td>
                  <td><?= $isi['tgl_masuk'];?></td>
                  <td <?php if($this->session->userdata('level') == 'Petugas'){?>style="width:17%;"<?php }?>>
                    <?php if($this->session->userdata('level') == 'Petugas'){ ?>
                      <a href="<?= base_url('data/bukuedit/'.$isi['id_buku']);?>">
                        <button class="btn btn-success"><i class="fa fa-edit"></i></button>
                      </a>
                      <a href="<?= base_url('data/bukudetail/'.$isi['id_buku']);?>">
                        <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Detail</button>
                      </a>
                      <a href="<?= base_url('data/prosesbuku?buku_id='.$isi['id_buku']);?>" onclick="return confirm('Anda yakin Buku ini akan dihapus ?');">
                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                      </a>
                    <?php } else { ?>
                      <a href="<?= base_url('data/bukudetail/'.$isi['id_buku']);?>">
                        <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Detail</button>
                      </a>
                    <?php } ?>
                  </td>
                </tr>
                <?php $no++; } ?>
              </tbody>
            </table>
          </div> <!-- /.box-body -->
        </div> <!-- /.box -->
      </div> <!-- /.col -->
    </div> <!-- /.row -->
  </section>
</div>

<script>
function printBuku() {
    // Ambil tabel asli
    var table = document.getElementById('bukuTable').outerHTML;
    
    // Hapus kolom Sampul (index 1) dan Aksi (index terakhir) dari copy tabel
    var tempDiv = document.createElement('div');
    tempDiv.innerHTML = table;
    var rows = tempDiv.querySelectorAll('tr');

    rows.forEach(function(row){
        // Hapus kolom Sampul (2nd td/th) dan Aksi (last td/th)
        if(row.children.length > 2){
            row.removeChild(row.children[1]); // Sampul
            row.removeChild(row.children[row.children.length-1]); // Aksi
        }
    });

    var cleanedTable = tempDiv.innerHTML.replace('table table-bordered table-striped table','data');

    // Buka window baru untuk cetak
    var win = window.open('', '_blank');
    win.document.write(`
    <html>
    <head>
        <title>Daftar Buku Perpustakaan</title>
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

        <h4 style="text-align:center;">DAFTAR BUKU PERPUSTAKAAN</h4>

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