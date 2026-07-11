-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 02 Jul 2026 pada 18.12
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_agenda`
--

CREATE TABLE `tbl_agenda` (
  `id_agenda` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tgl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tbl_agenda`
--

INSERT INTO `tbl_agenda` (`id_agenda`, `judul`, `deskripsi`, `tgl`) VALUES
(6, 'Belajar Bareng Fandan', 'Kegiatan belajar bersama yang diselenggarakan oleh Forum Anak Desa Pepedan sebagai wadah pengembangan pengetahuan, kreativitas, serta peningkatan minat baca anak-anak melalui diskusi, membaca, dan berbagi ilmu secara interaktif.', '2026-03-14'),
(7, 'Kegiatan PIK-R', 'Diikuti oleh Fandan', '2025-07-01'),
(8, 'Pelatihan Pengelolaan Perpustakaan', 'Oleh Pengurus Perpus dan Dinas Pusda', '2025-06-29'),
(11, 'Donor Darah', 'Bertempat di Perpustakaan Desa Pepedan', '2026-06-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_biaya_denda`
--

CREATE TABLE `tbl_biaya_denda` (
  `id_biaya_denda` int(11) NOT NULL,
  `harga_denda` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL,
  `tgl_tetap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_biaya_denda`
--

INSERT INTO `tbl_biaya_denda` (`id_biaya_denda`, `harga_denda`, `stat`, `tgl_tetap`) VALUES
(9, '500', 'Aktif', '2026-06-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(11) NOT NULL,
  `buku_id` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `sampul` varchar(255) DEFAULT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `thn_buku` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `tgl_masuk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `buku_id`, `id_kategori`, `id_rak`, `sampul`, `isbn`, `lampiran`, `title`, `penerbit`, `pengarang`, `thn_buku`, `isi`, `jml`, `tgl_masuk`) VALUES
(151, 'BK001', 3, 2, '465de97de0bff83e8295e5bfb7aaa3f6.jpg', '978-602-51766-2-3', 'a324d81cae5ee465913821310ee675e0.pdf', 'Kumpulan Rumus Matematika SD', 'Cemerlang', 'Shanti Wahyuni, S.Pd.', '2018', '<p style=\"text-align: center; \"><br></p><table class=\"table table-bordered\" style=\"text-align: center;\"><tbody><tr><td><span style=\"font-weight: 700; text-align: center;\">BANTUAN PERPUSNAS RI</span><br></td></tr><tr><td style=\"text-align: center;\">510</td></tr><tr><td style=\"text-align: center;\">SHA</td></tr><tr><td style=\"text-align: center;\">k</td></tr></tbody></table><p style=\"text-align: center; \"><br></p>', 2, '2026-05-30 21:49:47'),
(152, 'BK00152', 10, 1, 'b5c4ad2de7b600d86f6a6997a2eeb0a9.jpg', '-', NULL, 'Buku Pintar Nahwu', 'Diva Press', 'Muhmmad Zaairul Haq', '2013', '<p style=\"text-align: center; \"><br></p><table class=\"table table-bordered dataTable\" style=\"text-align: center;\" id=\"DataTables_Table_0\"><tbody><tr><td><span style=\"font-weight: 700; text-align: center;\">BANTUAN PERPUSNAS RI</span><br></td></tr><tr><td style=\"text-align: center;\">297.112</td></tr><tr><td style=\"text-align: center;\">MUH</td></tr><tr><td style=\"text-align: center;\">b</td></tr></tbody></table><p style=\"text-align: center; \"><br></p>', 2, '2026-05-30 23:03:50'),
(153, 'BK00153', 8, 4, '4bfefddee30d52e4e23d3319d4f162a2.jpg', '978-602-7949-89-8', NULL, 'Pelangi Dari selatan', 'Gaeudhawaca', 'Kristian Agung Prasetyo', '2016', '', 2, '2026-05-30 23:08:34'),
(154, 'BK00154', 5, 2, '88fd3e5489874cbaba3491f9929b5b0a.jpg', '978-979-055-730-7', NULL, 'Pembela Islam Ahli Surga', 'Sygma creative media corp', 'Syamsu Arramly', '2017', '<p>Bantuan Perpusnas RI</p><p>297.98</p><p>PEM</p>', 3, '2026-06-09 18:54:58'),
(155, 'BK00155', 3, 1, 'd0b4844dd896f9535b15c6b6cb93010d.jpg', '-', NULL, 'Kimia 1', 'Esis', 'Johari, M.Sc.', '2006', '', 1, '2026-06-10 13:37:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_denda`
--

CREATE TABLE `tbl_denda` (
  `id_denda` int(11) NOT NULL,
  `pinjam_id` varchar(255) NOT NULL,
  `denda` varchar(255) NOT NULL,
  `lama_waktu` int(11) NOT NULL,
  `tgl_denda` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_denda`
--

INSERT INTO `tbl_denda` (`id_denda`, `pinjam_id`, `denda`, `lama_waktu`, `tgl_denda`) VALUES
(3, 'PJ001', '0', 0, '2020-05-20'),
(10, 'PJ0017', '0', 0, '2026-06-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Pemrograman'),
(3, 'Pendidikan'),
(4, 'Pedoman'),
(5, 'Cerita'),
(6, 'Majalah'),
(7, 'Buku Anak'),
(8, 'Novel'),
(10, 'Agama'),
(11, 'Biografi'),
(12, 'Pengetahuan Umum'),
(13, 'Pengetahuan Sosial'),
(14, 'Sejarah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `tgl` date NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `judul`, `keterangan`, `tgl`, `gambar`) VALUES
(2, 'Kegiatan PIK-R', 'Diikuti oleh Fandan', '2025-07-01', 'WhatsApp Image 2025-07-03 at 15.59.39 copy.jpeg'),
(3, 'Pelatihan Pengelolaan Perpustakaan', 'Oleh Pengurus Perpus dan Dinas Pusda', '2025-06-29', '8a1f85f82bee72d5a18f48802bee9cd8.jpg'),
(4, 'Belajar Bareng Fandan', 'Kegiatan belajar bersama yang diselenggarakan oleh Forum Anak Desa Pepedan sebagai wadah pengembangan pengetahuan, kreativitas, serta peningkatan minat baca anak-anak melalui diskusi, membaca, dan berbagi ilmu secara interaktif.', '2026-03-14', '16e0e211b42096aa5ccf786f5d7edf80.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id_login` int(11) NOT NULL,
  `anggota_id` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenkel` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tgl_bergabung` date NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_login`
--

INSERT INTO `tbl_login` (`id_login`, `anggota_id`, `user`, `pass`, `level`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenkel`, `alamat`, `telepon`, `email`, `tgl_bergabung`, `foto`) VALUES
(8, 'PPD2025008', 'ade', '202cb962ac59075b964b07152d234b70', 'Petugas', 'Ade Nurdiyan, MH.', 'Brebes', '1999-05-03', 'Laki-Laki', 'Pepedan', '085325478657', 'adenurdian7@gmail.com', '2025-06-03', 'user_1748761667.jpg'),
(20, 'PPD2026001', 'faqih', '202cb962ac59075b964b07152d234b70', 'Anggota', 'M. Faqih Mawardi', 'Tegal', '2003-10-16', 'Laki-Laki', 'Karangjongkeng', '085713428117', 'faqihmawardi5@yahoo.com', '2026-05-30', 'user_1780151880.png'),
(21, 'PPD2026002', 'Dina', '698d51a19d8a121ce581499d7b701668', 'Petugas', 'Dina Fajriatul Aula', 'Brebes', '2008-06-25', 'Perempuan', 'Pepedan', '085640592893', 'dina@gmail.com', '2026-06-09', 'user_1781006011.png'),
(22, 'PPD2026003', 'iza', '202cb962ac59075b964b07152d234b70', 'Anggota', 'lia eliza', 'Brebes', '1987-09-13', 'Perempuan', 'Muncang', '085640592893', 'iza@gmail.com', '2026-06-10', 'user_1781073111.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengunjung`
--

CREATE TABLE `tbl_pengunjung` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `waktu_kunjungan` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tbl_pengunjung`
--

INSERT INTO `tbl_pengunjung` (`id`, `nama`, `jk`, `alamat`, `keperluan`, `tanggal_kunjungan`, `waktu_kunjungan`, `created_at`) VALUES
(1, 'Zaltan', 'Laki-laki', 'Pepedan', 'Baca Buku', '2025-06-01', '16:26:33', '2025-06-01 09:26:33'),
(2, 'Muhammad Faqih Mawardi', 'Laki-laki', 'Karangjongkeng', 'ngoding', '2025-06-02', '15:48:22', '2025-06-02 08:48:22'),
(9, 'Muhammad Faqih Mawardi', 'Laki-laki', 'karangjongkeng', 'ngoding', '2025-06-08', '20:13:13', '2025-06-08 13:13:13'),
(10, 'Yusril Ahzam Maghsyari', 'Laki-laki', 'Karangjongkeng', 'Baca Buku', '2025-06-08', '20:17:10', '2025-06-08 13:17:10'),
(11, 'Faqih', 'Laki-laki', 'Karjo', 'Ngoding', '2026-01-27', '00:23:18', '2026-01-26 17:23:18'),
(12, 'Faqih', 'Laki-laki', 'Karangjongeng', 'Ngoding\r\n', '2026-03-12', '12:30:37', '2026-03-12 05:30:37'),
(13, 'M. ABD. QODIR JAELANI ', 'Laki-laki', 'RT 9', 'Baca Buku', '2026-05-05', '20:36:55', '2026-05-05 13:36:55'),
(14, 'Muhammad Faqih Mawardi', 'Laki-laki', 'Karangjongkeng', 'Baca Buku', '2026-05-07', '11:36:10', '2026-05-07 04:36:10'),
(15, 'Faqih Mawardi', 'Laki-laki', 'Karangjongkeng', 'Ambil 10 sempel buku buat penelitian\r\n', '2026-05-21', '13:08:08', '2026-05-21 06:08:08'),
(16, 'nopi', 'Perempuan', 'pepedan', 'pinjam buku', '2026-06-09', '18:50:35', '2026-06-09 11:50:35'),
(17, 'lia eliza', 'Perempuan', 'Muncang', 'Baca Buku', '2026-06-10', '13:21:04', '2026-06-10 06:21:04'),
(18, 'Riyan', 'Laki-laki', 'Kreteg', 'Baca Buku', '2026-06-10', '19:50:47', '2026-06-10 12:50:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pinjam`
--

CREATE TABLE `tbl_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `pinjam_id` varchar(255) NOT NULL,
  `anggota_id` varchar(255) NOT NULL,
  `buku_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_pinjam` varchar(255) NOT NULL,
  `lama_pinjam` int(11) NOT NULL,
  `tgl_balik` varchar(255) NOT NULL,
  `tgl_kembali` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pinjam`
--

INSERT INTO `tbl_pinjam` (`id_pinjam`, `pinjam_id`, `anggota_id`, `buku_id`, `status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali`) VALUES
(16, 'PJ001', 'PPD2026001', 'BK00153', 'Di Kembalikan', '2026-05-30', 40, '2026-07-09', '2026-06-10'),
(17, 'PJ0017', 'PPD2026003', 'BK00154', 'Di Kembalikan', '2026-06-10', 40, '2026-07-20', '2026-06-10'),
(19, 'PJ0018', 'PPD2026003', 'BK00152', 'Dipinjam', '2026-06-10', 7, '2026-06-17', '0'),
(20, 'PJ0020', 'PPD2026001', 'BK00155', 'Dipinjam', '2026-06-10', 7, '2026-06-17', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rak`
--

CREATE TABLE `tbl_rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_rak`
--

INSERT INTO `tbl_rak` (`id_rak`, `nama_rak`) VALUES
(1, 'Rak 2'),
(2, 'Rak 1'),
(3, 'Rak 3'),
(4, 'Rak 4');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indeks untuk tabel `tbl_biaya_denda`
--
ALTER TABLE `tbl_biaya_denda`
  ADD PRIMARY KEY (`id_biaya_denda`);

--
-- Indeks untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `tbl_denda`
--
ALTER TABLE `tbl_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indeks untuk tabel `tbl_rak`
--
ALTER TABLE `tbl_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_biaya_denda`
--
ALTER TABLE `tbl_biaya_denda`
  MODIFY `id_biaya_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT untuk tabel `tbl_denda`
--
ALTER TABLE `tbl_denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tbl_rak`
--
ALTER TABLE `tbl_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
