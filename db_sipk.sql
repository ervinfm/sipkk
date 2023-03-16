-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Nov 2022 pada 12.27
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sipk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` varchar(50) NOT NULL,
  `nip_guru` varchar(50) NOT NULL,
  `nama_guru` varchar(256) NOT NULL,
  `pendidikan_guru` varchar(256) NOT NULL,
  `tugas_guru` varchar(256) NOT NULL,
  `id_user` varchar(50) DEFAULT NULL,
  `updated_guru` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_guru`
--

INSERT INTO `tbl_guru` (`id_guru`, `nip_guru`, `nama_guru`, `pendidikan_guru`, `tugas_guru`, `id_user`, `updated_guru`) VALUES
('9deipxhUNk4T26B8rLCv5Mcmu', '1978042520070320002', 'Herman Fernando, S.Pd.', 'S1 Pendidikan Olahraga', 'Guru Olahraga', '93476226819310058574', '2022-11-06 21:00:17'),
('ISA4Ermv2RLXczPKZgeHnxB9M', '1988071120001204001', 'Bambang Sujadmiko, S.Pd.', 'S1 Pendidikan Matematika', 'Guru Matematika', '18275699064538013742', '2022-11-06 20:57:15'),
('KIi6j0CDY93fgdEa85FMGXUtc', '1983111620080505004', 'Endah Putri, S.H.', 'S1 Ilmu Hukum', 'Guru Pendidikan Kewarganegaraan', '17979253804104658326', '2022-11-06 21:48:55'),
('PMOyRBxiogJES2Dl0KFuATamG', '1985931520040811001', 'Adam Sulaiman, S.Pd.', 'S1 Pendidikan  Fisika', 'Guru Ilmu Pengetahuan Alam', '89520475762368301941', '2022-11-06 20:59:22'),
('pXRFuDwqvs36GSJdZ2LVHmzUW', '1990931520120811001', 'Zidan Mahmud, S.Pd.', 'S1 Pendidikan Bahasa Indonesia', 'Guru Bahasa Indonesia', '15864021840756939732', '2022-11-06 20:59:22'),
('sNICTW7Lu4GfF9QB6VnHz18Ym', '1976022820030925003', 'Jojo Suseno, S.Pd., M.Pd.', 'S2 Pendidikan Bahasa Inggris', 'Guru Bahasa Inggris', '49593634221601878570', '2022-11-06 21:48:55'),
('t2bDNdyBe6W3Rv5aIxcZijJMz', '1978120620100719001', 'Sulastri, S.Ag.', 'S1 Pendidikan Agama Islam', 'Guru Agama Islam', '13382510754286709469', '2022-11-06 20:55:47'),
('u1hRgWV4pQSCfHa7IG3ZeMUqi', '1980120620050925005', 'Mamat Sudrajat, S.Pd', 'S1 Pendidikan Ekonomi', 'Guru Ilmu Pengetahuan Sosial', '05967818352174396420', '2022-11-06 21:48:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` varchar(50) NOT NULL,
  `id_guru` varchar(50) NOT NULL,
  `nama_kelas` varchar(256) NOT NULL,
  `tingkat_kelas` varchar(10) DEFAULT NULL,
  `updated_kelas` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `id_guru`, `nama_kelas`, `tingkat_kelas`, `updated_kelas`) VALUES
('248759', 't2bDNdyBe6W3Rv5aIxcZijJMz', 'VII B', '1', '2022-11-11 00:53:13'),
('999101', 'ISA4Ermv2RLXczPKZgeHnxB9M', 'VII A', '1', '2022-11-06 22:03:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(256) NOT NULL,
  `bobot_kriteria` varchar(10) NOT NULL,
  `updated_kriteria` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `bobot_kriteria`, `updated_kriteria`) VALUES
(1, 'C1', 'Nilai Kehadiran', '25', '2022-11-08 18:41:57'),
(2, 'C2', 'Nilai Tugas', '25', '2022-11-08 18:41:57'),
(3, 'C3', 'Nilai UTS', '25', '2022-11-08 18:41:57'),
(4, 'C4', 'Nilai UAS', '25', '2022-11-08 18:41:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` int(11) NOT NULL,
  `kode_mapel` varchar(50) DEFAULT NULL,
  `nama_mapel` varchar(256) NOT NULL,
  `kelompok_mapel` varchar(10) NOT NULL,
  `updated_mapel` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id_mapel`, `kode_mapel`, `nama_mapel`, `kelompok_mapel`, `updated_mapel`) VALUES
(15, '097', 'Ilmu Pengetahuan Alam (IPA)', 'A', '2022-11-06 23:02:46'),
(16, '100', 'Ilmu Pengetahuan Sosial (IPS)', 'A', '2022-11-06 23:02:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` varchar(50) NOT NULL,
  `nisn_siswa` varchar(50) NOT NULL,
  `nama_siswa` varchar(256) NOT NULL,
  `ttl_siswa` varchar(256) NOT NULL,
  `gender_siswa` int(1) NOT NULL,
  `agama_siswa` varchar(50) DEFAULT NULL,
  `asal_siswa` varchar(256) DEFAULT NULL,
  `orang_tua_siswa` varchar(256) NOT NULL,
  `pekerjaan_ortu_siswa` varchar(256) DEFAULT NULL,
  `telp_ortu_siswa` varchar(20) NOT NULL,
  `alamat_siswa` text DEFAULT NULL,
  `id_user` varchar(50) DEFAULT NULL,
  `updated_siswa` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nisn_siswa`, `nama_siswa`, `ttl_siswa`, `gender_siswa`, `agama_siswa`, `asal_siswa`, `orang_tua_siswa`, `pekerjaan_ortu_siswa`, `telp_ortu_siswa`, `alamat_siswa`, `id_user`, `updated_siswa`) VALUES
('4Y9QuzMIWOVeH81UKP7Z', '5273973163', 'I Johirin', '2010-06-06', 1, 'ISLAM', 'SDN 01 Manado', 'WIYANTO', 'Buruh', '0886331013066', 'Jl BW Lapian 33,Tikala Ares', '12903172654078638954', '2022-11-11 00:53:52'),
('729YlT8nRa54xLV6yhOp', '4934257898', 'Nicolas Wira', '2010-03-14', 1, 'ISLAM', 'SD Plus Islamic Centre', 'BUNGARIP', 'Wiraswasta', '08532973523', 'JL. Tololiu Supit No. 11, Manado', '80207319435576218649', '2022-11-11 00:53:52'),
('IyHlUwD3TB46jO58AF1S', '6842385489', 'Anton Jaelani', '2010-04-11', 1, 'ISLAM', 'SDN 01 Manado', 'WALIYEM', 'Wiraswasta', '0898785608040', 'JL. Piere Tendean Boulevard, Manado', '96530854862711974230', '2022-11-11 00:53:52'),
('N0r3iJMZmV7kjWogBpAh', '7553880905', 'Farqy Noor', '2010-01-28', 1, 'ISLAM', 'SDN 02 Bunaken', 'AZIZ PURWANTORO', 'Wiraswasta', '0876192558889', 'Jl Jambak Jalur VI', '51830425684671790392', '2022-11-11 00:53:52'),
('tFbHmCuLAgiJQ91l2hxS', '4326890157', 'Restia Caroline', '2009-07-16', 0, 'KATOLIK', 'SD Prisai Bangsa', 'NURNING NAWANITA', 'Wiraswasta', '088641305196', 'Jl Wolter Monginsidi', '62753864529078130914', '2022-11-06 17:57:00'),
('zlSJxh1D7ZIfYyig2sbV', '8337357712', 'Abdul Anwar', '2009-05-18', 1, 'ISLAM', 'SD Plus Islamic Centre', 'SAKIYEM', 'PNS/POLRI/TNI', '082163078859', 'JL. 17 Agustus, Bumi Beringin No. 60, Manado', '42478631995080627153', '2022-11-06 17:57:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sub_kriteria`
--

CREATE TABLE `tbl_sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `sub_kriteria` varchar(256) NOT NULL,
  `min_sub_kriteria` decimal(4,1) DEFAULT NULL,
  `max_sub_kriteria` decimal(4,1) DEFAULT NULL,
  `bobot_sub_kriteria` varchar(10) NOT NULL,
  `updated_sub_kriteria` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_sub_kriteria`
--

INSERT INTO `tbl_sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `sub_kriteria`, `min_sub_kriteria`, `max_sub_kriteria`, `bobot_sub_kriteria`, `updated_sub_kriteria`) VALUES
(1, 1, '60.0', '0.0', '60.0', '1', '2022-11-08 19:00:35'),
(2, 1, '70.0', '61.0', '70.0', '2', '2022-11-08 19:00:35'),
(3, 1, '80.0', '71.0', '80.0', '3', '2022-11-08 19:00:35'),
(4, 1, '90.0', '81.0', '90.0', '4', '2022-11-08 19:00:35'),
(7, 1, '99.9', '91.0', '100.0', '5', '2022-11-08 19:31:26'),
(8, 4, '50.0', '0.0', '50.0', '1', '2022-11-10 21:26:13'),
(9, 4, '60.0', '51.0', '60.0', '2', '2022-11-10 21:26:19'),
(10, 4, '70.0', '61.0', '70.0', '3', '2022-11-10 21:26:30'),
(11, 4, '80.0', '71.0', '80.0', '4', '2022-11-10 21:26:37'),
(12, 4, '90.0', '81.0', '100.0', '5', '2022-11-10 21:26:44'),
(13, 3, '50.0', '0.0', '50.0', '1', '2022-11-10 21:27:00'),
(14, 3, '60.0', '51.0', '60.0', '2', '2022-11-10 21:27:08'),
(15, 3, '70.0', '61.0', '70.0', '3', '2022-11-10 21:27:15'),
(16, 3, '80.0', '71.0', '80.0', '4', '2022-11-10 21:27:21'),
(17, 3, '90.0', '81.0', '100.0', '5', '2022-11-10 21:27:31'),
(18, 2, '0.0', '0.0', '20.0', '1', '2022-11-10 21:28:33'),
(19, 2, '20.0', '21.0', '40.0', '2', '2022-11-10 21:28:39'),
(20, 2, '40.0', '41.0', '60.0', '3', '2022-11-10 21:28:45'),
(21, 2, '60.0', '61.0', '80.0', '4', '2022-11-10 21:28:52'),
(22, 2, '80.0', '81.0', '100.0', '5', '2022-11-10 21:28:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tahun_ajaran`
--

CREATE TABLE `tbl_tahun_ajaran` (
  `id_ta` int(11) NOT NULL,
  `nama_ta` varchar(50) NOT NULL,
  `status_ta` int(1) NOT NULL,
  `updated_ta` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_tahun_ajaran`
--

INSERT INTO `tbl_tahun_ajaran` (`id_ta`, `nama_ta`, `status_ta`, `updated_ta`) VALUES
(1, '2021/2022 Genap', 0, '2022-11-07 02:04:11'),
(2, '2021/2022 Ganjil', 0, '2022-11-07 02:04:11'),
(3, '2022/2023 Genap', 0, '2022-11-07 02:04:11'),
(4, '2022/2023 Ganjil', 1, '2022-11-07 02:04:11'),
(5, '2020/2021 Genap', 0, '2022-11-07 17:51:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` varchar(50) NOT NULL,
  `email_user` varchar(256) DEFAULT NULL,
  `username_user` varchar(256) NOT NULL,
  `password_user` varchar(256) NOT NULL,
  `nama_user` varchar(256) NOT NULL,
  `level_user` int(1) NOT NULL,
  `status_user` int(1) NOT NULL,
  `is_online` int(1) NOT NULL,
  `updated_user` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `email_user`, `username_user`, `password_user`, `nama_user`, `level_user`, `status_user`, `is_online`, `updated_user`) VALUES
('05967818352174396420', NULL, '1980120620050925005', '68818ab7a3be9c7a66bae4c0dc007525fc207a12', 'Mamat Sudrajat, S.Pd', 2, 1, 0, '2022-11-06 21:48:55'),
('07650342429381817659', NULL, '4088800255', 'ff989f2f6219bec9c68765eaca2a950a759ea61a', 'Permata Yunika', 3, 1, 0, '2022-11-11 00:53:53'),
('08846973295725061431', NULL, '3857905736', '70a93b77cdd4b2a2807f33066357b229d2338b0b', 'Nurmi Yati', 3, 1, 0, '2022-11-06 17:57:00'),
('100037175835361280', 'admin@mail.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 1, 1, 0, '2022-11-06 14:27:45'),
('12903172654078638954', NULL, '5273973163', '1871fae0d5cf1c8aaba22b044617aa870a1f787d', 'I Johirin', 3, 1, 0, '2022-11-11 00:53:52'),
('13284917606405379528', NULL, '4088800255', 'ff989f2f6219bec9c68765eaca2a950a759ea61a', 'Permata Yunika', 3, 1, 0, '2022-11-06 17:57:00'),
('13382510754286709469', NULL, '1978120620100719001', 'a0c8d5aa37b68f69edeb3002a28f5debdc24eb36', 'Sulastri, S.Ag.', 2, 1, 0, '2022-11-06 20:55:47'),
('14540168799387305622', NULL, '2921151427', 'a1814f5749b07372e7f02f614260a5b1c4f3e48b', 'Agnes Widyatmo', 3, 1, 0, '2022-11-11 00:53:53'),
('15864021840756939732', NULL, '1990931520120811001', 'f8ccafc37cd0ebf76ad76cce2d12f309ace971d5', 'Zidan Mahmud, S.Pd.', 2, 1, 0, '2022-11-06 20:59:22'),
('17979253804104658326', NULL, '1983111620080505004', '66423e0b75c94f71aaff1a443c4aeafe0dedc949', 'Endah Putri, S.H.', 2, 1, 0, '2022-11-06 21:48:55'),
('18275699064538013742', NULL, '1988071120001204001', '6fd0ba7ddc4544040d8f6970fc6ab53abeb45480', 'Bambang Sujadmiko, S.Pd.', 2, 1, 0, '2022-11-06 20:57:15'),
('32612159076073498584', NULL, '7553880905', '02dc32cd81c941c78312c3459786b0206e042d6a', 'Farqy Noor', 3, 1, 0, '2022-11-06 17:57:00'),
('34132560702456871998', NULL, '3857905736', '70a93b77cdd4b2a2807f33066357b229d2338b0b', 'Nurmi Yati', 3, 1, 0, '2022-11-11 00:53:53'),
('39673458011028526794', NULL, '0796052588', '63d6e8ea81b90fcb349aee5c7d9449be23200713', 'Andhika Susanto', 3, 1, 0, '2022-11-06 17:57:00'),
('39706642851792105438', NULL, '8344334131', 'a459fa69ab70c90433999736af8a2258cfe47eab', 'Dede Anwisa', 3, 1, 0, '2022-11-06 17:57:00'),
('42478631995080627153', '', '8337357712', '46c995f177420878be9235cda352279e0ed5ccc1', 'Abdul Anwar Soleh', 3, 1, 0, '2022-11-06 17:57:00'),
('42565062137784190938', NULL, '5376532551', '45e3888f0170c3e14614bd6136d7c3ef49c5f999', 'Rahardianto Puspa', 3, 1, 0, '2022-11-06 17:57:00'),
('43035897612182745690', NULL, '3015435612', 'bb1987f542b93433dff7553209c8b06fe32aea99', 'Garin Sasna', 3, 1, 0, '2022-11-11 00:53:52'),
('44793525068931018276', NULL, '8344334131', 'a459fa69ab70c90433999736af8a2258cfe47eab', 'Dede Anwisa', 3, 1, 0, '2022-11-11 00:53:52'),
('45805601983477621392', NULL, '3965141144', 'b86c11421717ff6a04c1bc36075e3911da4cb6e6', 'Sakura Pertiwi', 3, 1, 0, '2022-11-11 00:53:52'),
('48711360268595743902', NULL, '1542682999', 'eb9cccd92b36dd31e8e8b4aacab3a5a2e9f12445', 'Jeremy Tarigan', 3, 1, 0, '2022-11-11 00:53:52'),
('48713099764610552832', NULL, '5273973163', '1871fae0d5cf1c8aaba22b044617aa870a1f787d', 'I Johirin', 3, 1, 0, '2022-11-06 17:57:00'),
('49593634221601878570', NULL, '1976022820030925003', 'fb1ef33d5f4e650d71056d72035ba9b8741b2f6b', 'Jojo Suseno, S.Pd., M.Pd.', 2, 1, 0, '2022-11-06 21:48:55'),
('51830425684671790392', NULL, '7553880905', '02dc32cd81c941c78312c3459786b0206e042d6a', 'Farqy Noor', 3, 1, 0, '2022-11-11 00:53:52'),
('51869323547040678912', NULL, '5073523391', 'd7548899dc6b285da13fb5c6b142b35bf1426296', 'Ismiranti Natalia', 3, 1, 0, '2022-11-06 17:57:00'),
('52017564401237368899', NULL, '3965141144', 'b86c11421717ff6a04c1bc36075e3911da4cb6e6', 'Sakura Pertiwi', 3, 1, 0, '2022-11-06 17:57:00'),
('58442652963307190817', NULL, '4326890157', 'a9cb25a0b75be76822d1762b07371896f58a39af', 'Restia Caroline', 3, 1, 0, '2022-11-11 00:53:53'),
('58577214402961068393', NULL, '2921151427', 'a1814f5749b07372e7f02f614260a5b1c4f3e48b', 'Agnes Widyatmo', 3, 1, 0, '2022-11-06 17:57:00'),
('59221546670193703488', 'admin2@mail.com', 'admin2', '315f166c5aca63a157f7d41007675cb44a948b33', 'Bambang', 1, 1, 0, '2022-11-06 19:30:44'),
('60655201748394928317', NULL, '5376532551', '45e3888f0170c3e14614bd6136d7c3ef49c5f999', 'Rahardianto Puspa', 3, 1, 0, '2022-11-11 00:53:52'),
('62753864529078130914', NULL, '4326890157', 'a9cb25a0b75be76822d1762b07371896f58a39af', 'Restia Caroline', 3, 1, 0, '2022-11-06 17:57:00'),
('63484715783621902059', NULL, '9401357061', '137e8c818d8f75c5142b510f2b8b5953a77a5c29', 'Nadiya Auzy Nathania', 3, 1, 0, '2022-11-06 17:57:00'),
('71395359724021668084', NULL, '0066677173', '46636f34cc081d4962897e67517f1adf5274d059', 'Nadiya Journalisanda', 3, 1, 0, '2022-11-06 17:57:00'),
('73134268185502694079', NULL, '5073523391', 'd7548899dc6b285da13fb5c6b142b35bf1426296', 'Ismiranti Natalia', 3, 1, 0, '2022-11-11 00:53:53'),
('73176582683259004194', NULL, '3015435612', 'bb1987f542b93433dff7553209c8b06fe32aea99', 'Garin Sasna', 3, 1, 0, '2022-11-06 17:57:00'),
('75441628879130632950', NULL, '6842385489', 'e08e40aeb8378981faddfdee97b80b4f84745e7b', 'Anton Jaelani', 3, 1, 0, '2022-11-06 17:57:00'),
('80207319435576218649', NULL, '4934257898', '9571744879ab5e839654febfdeb5969fae1c55ff', 'Nicolas Wira', 3, 1, 0, '2022-11-11 00:53:52'),
('87252087164594310963', NULL, '1371707557', 'e22b158cc84773feb5c1dbc2f35c8ec5b4872ecb', 'Haikal Nurkhayati', 3, 1, 0, '2022-11-06 17:57:00'),
('88521265704334179690', NULL, '1542682999', 'eb9cccd92b36dd31e8e8b4aacab3a5a2e9f12445', 'Jeremy Tarigan', 3, 1, 0, '2022-11-06 17:57:00'),
('89470160635822153794', NULL, '8337357712', '46c995f177420878be9235cda352279e0ed5ccc1', 'Abdul Anwar', 3, 1, 0, '2022-11-11 00:53:52'),
('89520475762368301941', NULL, '1985931520040811001', '5749921a170ccc159fbde9e2b97f88caabc5232a', 'Adam Sulaiman, S.Pd.', 2, 1, 1, '2022-11-06 20:59:22'),
('93476226819310058574', NULL, '1978042520070320002', '541151edaba316a3e266c6ce82f3be042f2a32d5', 'Herman Fernando, S.Pd.', 2, 1, 0, '2022-11-06 21:00:17'),
('96530854862711974230', NULL, '6842385489', 'e08e40aeb8378981faddfdee97b80b4f84745e7b', 'Anton Jaelani', 3, 1, 0, '2022-11-11 00:53:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_siswa` varchar(50) NOT NULL,
  `id_ta` int(11) DEFAULT NULL,
  `id_mapel` varchar(50) NOT NULL,
  `nilai_tugas` decimal(4,1) DEFAULT NULL,
  `nilai_uts` decimal(4,1) DEFAULT NULL,
  `nilai_uas` decimal(4,1) DEFAULT NULL,
  `nilai_kehadiran` decimal(4,1) DEFAULT NULL,
  `updated_nilai` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `id_siswa`, `id_ta`, `id_mapel`, `nilai_tugas`, `nilai_uts`, `nilai_uas`, `nilai_kehadiran`, `updated_nilai`) VALUES
(1, 'zlSJxh1D7ZIfYyig2sbV', 4, '15', '60.0', '65.0', '83.5', '50.0', '2022-11-10 21:10:00'),
(2, 'tFbHmCuLAgiJQ91l2hxS', 4, '15', '75.4', '70.6', '70.0', '75.0', '2022-11-10 21:10:02'),
(3, 'zlSJxh1D7ZIfYyig2sbV', 4, '16', '80.0', '63.5', '70.0', '65.0', '2022-11-10 21:11:09'),
(4, 'tFbHmCuLAgiJQ91l2hxS', 4, '16', '80.0', '77.0', '60.6', '76.8', '2022-11-10 21:11:20'),
(5, 'N0r3iJMZmV7kjWogBpAh', 4, '15', '35.0', '55.0', '37.0', '46.0', '2022-11-11 20:30:18'),
(6, 'N0r3iJMZmV7kjWogBpAh', 4, '16', '20.0', '25.0', '45.0', '50.0', '2022-11-11 20:30:51'),
(7, 'IyHlUwD3TB46jO58AF1S', 4, '15', '70.0', '50.0', '60.0', '45.0', '2022-11-11 20:32:50'),
(8, '4Y9QuzMIWOVeH81UKP7Z', 4, '15', '90.0', '80.0', '75.0', '95.2', '2022-11-11 20:33:32'),
(9, '729YlT8nRa54xLV6yhOp', 4, '15', '75.0', '75.0', '80.0', '90.0', '2022-11-11 20:34:07'),
(10, 'IyHlUwD3TB46jO58AF1S', 4, '16', '88.0', '90.0', '90.0', '100.0', '2022-11-11 20:35:48'),
(11, '4Y9QuzMIWOVeH81UKP7Z', 4, '16', '89.0', '85.0', '90.0', '95.0', '2022-11-11 20:36:00'),
(12, '729YlT8nRa54xLV6yhOp', 4, '16', '75.0', '90.0', '90.0', '90.0', '2022-11-11 20:36:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengampu`
--

CREATE TABLE `tb_pengampu` (
  `id_pengampu` int(11) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_guru` varchar(50) NOT NULL,
  `id_kelas` varchar(50) NOT NULL,
  `updated_pengampu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengampu`
--

INSERT INTO `tb_pengampu` (`id_pengampu`, `id_ta`, `id_mapel`, `id_guru`, `id_kelas`, `updated_pengampu`) VALUES
(1, 4, 15, 'ISA4Ermv2RLXczPKZgeHnxB9M', '999101', '2022-11-10 21:09:07'),
(2, 4, 16, 'ISA4Ermv2RLXczPKZgeHnxB9M', '999101', '2022-11-10 21:09:07'),
(3, 4, 15, 't2bDNdyBe6W3Rv5aIxcZijJMz', '248759', '2022-11-11 20:31:36'),
(4, 4, 16, 't2bDNdyBe6W3Rv5aIxcZijJMz', '248759', '2022-11-11 20:31:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peserta`
--

CREATE TABLE `tb_peserta` (
  `id_peserta` int(11) NOT NULL,
  `id_kelas` varchar(50) NOT NULL,
  `id_ta` int(11) DEFAULT NULL,
  `id_siswa` varchar(50) NOT NULL,
  `updated_peserta` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_peserta`
--

INSERT INTO `tb_peserta` (`id_peserta`, `id_kelas`, `id_ta`, `id_siswa`, `updated_peserta`) VALUES
(1, '999101', 4, 'zlSJxh1D7ZIfYyig2sbV', '2022-11-10 21:06:59'),
(2, '999101', 4, 'tFbHmCuLAgiJQ91l2hxS', '2022-11-10 21:06:59'),
(3, '248759', 4, 'IyHlUwD3TB46jO58AF1S', '2022-11-11 20:29:17'),
(4, '248759', 4, '4Y9QuzMIWOVeH81UKP7Z', '2022-11-11 20:29:25'),
(5, '248759', 4, '729YlT8nRa54xLV6yhOp', '2022-11-11 20:29:25'),
(6, '999101', 4, 'N0r3iJMZmV7kjWogBpAh', '2022-11-11 20:29:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `nip_guru` (`nip_guru`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `nisn_siswa` (`nisn_siswa`);

--
-- Indeks untuk tabel `tbl_sub_kriteria`
--
ALTER TABLE `tbl_sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`);

--
-- Indeks untuk tabel `tbl_tahun_ajaran`
--
ALTER TABLE `tbl_tahun_ajaran`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `tb_pengampu`
--
ALTER TABLE `tb_pengampu`
  ADD PRIMARY KEY (`id_pengampu`);

--
-- Indeks untuk tabel `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tbl_sub_kriteria`
--
ALTER TABLE `tbl_sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tbl_tahun_ajaran`
--
ALTER TABLE `tbl_tahun_ajaran`
  MODIFY `id_ta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_pengampu`
--
ALTER TABLE `tb_pengampu`
  MODIFY `id_pengampu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_peserta`
--
ALTER TABLE `tb_peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
