<div class="content-wrapper">
    <section class="content-header">
        <h1>Tambah Kegiatan</h1>
    </section>

    <section class="content">
        <?= $this->session->flashdata('pesan'); ?>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Tambah Agenda</h3>
            </div>
            <form action="<?= base_url('data/agenda_proses') ?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label>Judul Agenda</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                </div>
                <div class="box-footer" style="display: flex; justify-content: flex-end; gap: 10px;">
                    <a href="<?= base_url('data/agenda') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
                    <button type="submit" name="tambah" value="1" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </section>
</div>