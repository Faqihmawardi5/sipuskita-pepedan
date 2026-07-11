<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Left side column: logo & sidebar -->
<aside class="main-sidebar">
    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php
                    $d = $this->db->query("SELECT * FROM tbl_login WHERE id_login='$idbo'")->row();
                    if (!empty($d->foto)) {
                ?>
                    <img src="<?= base_url('assets_style/image/' . $d->foto); ?>" class="user-image"/>
                <?php } else { ?>
                    <i class="fa fa-user fa-4x"></i>
                <?php } ?>
            </div>

            <div class="pull-left info">
                <p><?= $d->nama; ?></p>
                <p><?= $d->level; ?></p>
                <a href="#"><i class="fa fa-circle"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">

            <!-- ================= PETUGAS ================= -->
            <?php if ($this->session->userdata('level') === 'Petugas') { ?>

            <li class="header">MENU PETUGAS</li>

            <!-- Dashboard -->
            <li class="<?= ($this->uri->uri_string() == 'dashboard') ? 'active' : '' ?>">
                <a href="<?= base_url('dashboard'); ?>">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- MASTER DATA -->
            <li class="treeview <?= (
                $this->uri->segment(1) == 'data' ||
                $this->uri->segment(1) == 'user' ||
                $this->uri->segment(1) == 'pengunjung' ||
                $this->uri->uri_string() == 'berita'
            ) ? 'active' : '' ?>">

                <a href="javascript:void(0);" onclick="return false;">
                    <i class="fa fa-folder"></i>
                    <span>Master Data</span>

                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">

                    <!-- Pengguna -->
                    <li class="<?= ($this->uri->segment(1) == 'user') ? 'active' : '' ?>">
                        <a href="<?= base_url('user'); ?>">
                            <i class="fa fa-user"></i>
                            Data Pengguna
                        </a>
                    </li>

                    <!-- Buku -->
                    <li class="<?= ($this->uri->uri_string() == 'data') ? 'active' : '' ?>">
                        <a href="<?= base_url('data'); ?>">
                            <i class="fa fa-book"></i>
                            Data Buku
                        </a>
                    </li>

                    <!-- Kategori -->
                    <li class="<?= ($this->uri->uri_string() == 'data/kategori') ? 'active' : '' ?>">
                        <a href="<?= base_url('data/kategori'); ?>">
                            <i class="fa fa-tags"></i>
                            Kategori
                        </a>
                    </li>

                    <!-- Rak -->
                    <li class="<?= ($this->uri->uri_string() == 'data/rak') ? 'active' : '' ?>">
                        <a href="<?= base_url('data/rak'); ?>">
                            <i class="fa fa-list"></i>
                            Rak
                        </a>
                    </li>

                    <!-- Kegiatan -->
                    <li class="<?= ($this->uri->uri_string() == 'data/kegiatan') ? 'active' : '' ?>">
                        <a href="<?= base_url('data/kegiatan'); ?>">
                            <i class="fa fa-calendar"></i>
                            Kegiatan
                        </a>
                    </li>

                    <!-- Agenda -->
                    <li class="<?= ($this->uri->uri_string() == 'data/agenda') ? 'active' : '' ?>">
                        <a href="<?= base_url('data/agenda'); ?>">
                            <i class="fa fa-calendar-check-o"></i>
                            Agenda
                        </a>
                    </li>

                    <!-- Daftar Tamu -->
                    <li class="<?= ($this->uri->uri_string() == 'pengunjung/daftar') ? 'active' : '' ?>">
                        <a href="<?= base_url('pengunjung/daftar'); ?>">
                            <i class="fa fa-list"></i>
                            Daftar Tamu
                        </a>
                    </li>

                </ul>
            </li>

            <!-- TRANSAKSI -->
            <li class="treeview <?= (
                $this->uri->segment(1) == 'transaksi' &&
                $this->uri->uri_string() != 'transaksi/denda'
            ) ? 'active' : '' ?>">

                <a href="javascript:void(0);" onclick="return false;">
                    <i class="fa fa-exchange"></i>
                    <span>Transaksi</span>

                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">

                    <!-- Peminjaman -->
                    <li class="<?= ($this->uri->uri_string() == 'transaksi') ? 'active' : '' ?>">
                        <a href="<?= base_url('transaksi'); ?>">
                            <i class="fa fa-upload"></i>
                            Peminjaman
                        </a>
                    </li>

                    <!-- Pengembalian -->
                    <li class="<?= ($this->uri->uri_string() == 'transaksi/kembali') ? 'active' : '' ?>">
                        <a href="<?= base_url('transaksi/kembali'); ?>">
                            <i class="fa fa-download"></i>
                            Pengembalian
                        </a>
                    </li>

                </ul>
            </li>

            <!-- DENDA -->
            <li class="<?= ($this->uri->uri_string() == 'transaksi/denda') ? 'active' : '' ?>">
                <a href="<?= base_url('transaksi/denda'); ?>">
                    <i class="fa fa-money"></i>
                    <span>Denda</span>
                </a>
            </li>

            <!-- LAPORAN -->
            <li class="<?= ($this->uri->segment(1) == 'laporan') ? 'active' : '' ?>">
                <a href="<?= base_url('laporan/jumlah_data'); ?>">
                    <i class="fa fa-download"></i>
                    <span>Laporan</span>
                </a>
            </li>

            <?php } ?>

        <!-- ================= ANGGOTA ================= -->
        <?php if ($this->session->userdata('level') === 'Anggota') { ?>
            <li class="header">MENU ANGGOTA</li>

            <li class="<?= ($this->uri->uri_string() == 'transaksi') ? 'active' : '' ?>">
                <a href="<?= base_url('transaksi'); ?>">
                    <i class="fa fa-upload"></i> <span>Data Peminjaman</span>
                </a>
            </li>

            <li class="<?= ($this->uri->uri_string() == 'transaksi/kembali') ? 'active' : '' ?>">
                <a href="<?= base_url('transaksi/kembali'); ?>">
                    <i class="fa fa-download"></i> <span>Data Pengembalian</span>
                </a>
            </li>

            <li class="<?= ($this->uri->uri_string() == 'data') ? 'active' : '' ?>">
                <a href="<?= base_url('data'); ?>">
                    <i class="fa fa-search"></i> <span>Cari Buku</span>
                </a>
            </li>

            <!--
            <li class="<?= ($this->uri->uri_string() == 'data/agenda') ? 'active' : '' ?>">
                <a href="<?= base_url('data/agenda'); ?>">
                    <i class="fa fa-calendar-check-o"></i> <span>Agenda</span>
                </a>
            </li>
            -->

            <li>
                <a href="<?= base_url('user/edit/' . $this->session->userdata('ses_id')); ?>">
                    <i class="fa fa-user"></i> <span>Data Anggota</span>
                </a>
            </li>

            <li>
                <a href="<?= base_url('user/detail/' . $this->session->userdata('ses_id')); ?>" target="_blank">
                    <i class="fa fa-id-card"></i> <span>Cetak Kartu Anggota</span>
                </a>
            </li>
        <?php } ?>

        </ul>
    </section>
</aside>
