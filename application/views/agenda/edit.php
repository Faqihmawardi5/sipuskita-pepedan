<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $title_web; ?></h1>
    </section>

    <section class="content">
        <?= $this->session->flashdata('pesan'); ?>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Edit Agenda</h3>
            </div>
            <form action="<?= base_url('data/agenda_proses') ?>" method="post">

                <input type="hidden" name="edit" value="<?= $edit_agenda->id_agenda; ?>">

                <div class="box-body">

                    <div class="form-group">
                        <label>Judul Agenda</label>
                        <input type="text" name="judul" class="form-control"
                            value="<?= htmlspecialchars($edit_agenda->judul) ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4" required><?= htmlspecialchars($edit_agenda->deskripsi) ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control"
                            value="<?= $edit_agenda->tgl ?>" required>
                    </div>

                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Update
                    </button>

                    <a href="<?= base_url('data/agenda') ?>" class="btn btn-danger">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

                </form>
        </div>
    </section>
</div>