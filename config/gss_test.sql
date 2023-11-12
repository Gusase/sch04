-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 12, 2023 at 10:49 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_crud`
--
CREATE DATABASE IF NOT EXISTS `db_crud` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `db_crud`;

-- --------------------------------------------------------

--
-- Table structure for table `gurus`
--

CREATE TABLE `gurus` (
  `kode_guru` int NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `pendidikan` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prodi` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gurus`
--

INSERT INTO `gurus` (`kode_guru`, `nama_guru`, `pendidikan`, `prodi`) VALUES
(0, 'hanako.ogaki', 'Magister', 'Ilmu Biologi'),
(1, 'taro.saito', 'Sarjana Ilmu Biologi', 'Perhotelan'),
(2, 'yoko51', 'SMA', 'Farmasi'),
(3, 'idaka.yuta', 'SMA', 'Ilmu Politik'),
(4, 'kondo.hiroshi', 'Sarjana Kedokteran', 'Ilmu Politik'),
(5, 'chiyo.takahashi', 'Sarjana Seni Rupa', 'Ilmu Keperawatan'),
(6, 'naoko90', 'Sarjana Pendidikan Bahasa Inggris', 'Seni Rupa'),
(7, 'wyamaguchi', 'Sarjana Ekonomi Islam', 'Ilmu Keperawatan'),
(8, 'zkudo', 'Sarjana Ekonomi Islam', 'Teknik Informatika'),
(9, 'shota.aoyama', 'Sarjana Ilmu Kimia', 'Hubungan Internasional'),
(10, 'hideki48', 'SMP', 'Teknik Perminyakan'),
(11, 'nomura.satomi', 'Sarjana Teknik Mesin', 'Ilmu Ekonomi'),
(12, 'oyoshida', 'S3', 'Ilmu Sejarah'),
(13, 'yosuke41', 'Sarjana Ilmu Komunikasi', 'Teknik Elektro'),
(14, 'suzuki.chiyo', 'Sarjana Farmasi', 'Agribisnis'),
(15, 'eharada', 'Sarjana Psikologi', 'Filsafat'),
(16, 'atsushi.suzuki', 'Diploma', 'Ilmu Politik'),
(17, 'manabu21', 'D2', 'Ilmu Biologi'),
(18, 'akato', 'Sarjana Ilmu Fisika', 'Teknik Sipil'),
(19, 'dito', 'D4', 'Filsafat'),
(20, 'ttanabe', 'Sarjana Ilmu Fisika', 'Ilmu Politik'),
(21, 'rei92', 'Sarjana Psikologi', 'Ilmu Keperawatan'),
(22, 'yamaguchi.naoki', 'S2', 'Ilmu Kimia'),
(23, 'kumiko22', 'SMP', 'Pariwisata'),
(24, 'soutaro.nakamura', 'Sarjana Hubungan Internasional', 'Ilmu Komputer'),
(25, 'kazuya.tanaka', 'Sarjana Seni Rupa', 'Ilmu Politik'),
(26, 'kumiko.ishida', 'SMA', 'Hubungan Internasional'),
(27, 'idaka.hanako', 'Sarjana Sastra Jepang', 'Farmasi'),
(28, 'hideki.hamada', 'Magister Administrasi Publik', 'Filsafat'),
(29, 'pkanou', 'SD', 'Psikologi'),
(30, 'fujimoto.kenichi', 'Sarjana Ilmu Fisika', 'Ilmu Sejarah'),
(31, 'kobayashi.soutaro', 'Sarjana Ilmu Komunikasi', 'Ilmu Keperawatan'),
(32, 'minoru.tanabe', 'Sarjana Pendidikan Bahasa Inggris', 'Teknik Informatika'),
(33, 'cyamagishi', 'Sarjana Ilmu Komunikasi', 'Hubungan Internasional'),
(34, 'ishida.kaori', 'D2', 'Perhotelan'),
(35, 'youichi.uno', 'Sarjana Ilmu Keperawatan', 'Sastra Jepang'),
(36, 'kmatsumoto', 'Magister Manajemen', 'Sastra Jepang'),
(37, 'hamada.yoko', 'Sarjana Ekonomi', 'Agribisnis'),
(38, 'taota', 'Sarjana Ilmu Komputer', 'Ilmu Kimia'),
(39, 'kyosuke.wakamatsu', 'Sarjana Pendidikan Bahasa Inggris', 'Manajemen'),
(40, 'ishida.takuma', 'D1', 'Seni Rupa'),
(41, 'hiroshi.sato', 'Sarjana Psikologi', 'Arsitektur'),
(42, 'yoshida.yui', 'Sarjana Hukum', 'Ilmu Biologi'),
(43, 'gmiyazawa', 'Sarjana Hukum', 'Ilmu Biologi'),
(44, 'rkondo', 'Doktor', 'Seni Rupa'),
(45, 'harada.atsushi', 'Ahli Madya', 'Seni Rupa'),
(46, 'matsumoto.rika', 'Magister', 'Hukum'),
(47, 'yoshida.akira', 'Magister Administrasi Publik', 'Hukum'),
(48, 'kumiko76', 'Magister Kesehatan Masyarakat', 'Kedokteran'),
(49, 'jun.koizumi', 'Sarjana Kedokteran', 'Ilmu Kimia');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int NOT NULL,
  `nama` varchar(10) DEFAULT NULL,
  `kapasitas` int DEFAULT NULL,
  `kode_guru` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `kapasitas`, `kode_guru`) VALUES
(89047200, 'TAV 3', 30, NULL),
(90254266, 'TITL 3', 32, NULL),
(90671033, 'TAV 2', 33, NULL),
(91404352, 'RPL 1', 31, NULL),
(91404553, 'TGB 2', 29, NULL),
(91638904, 'RPL 2', 30, NULL),
(91697310, 'OA 3', 31, NULL),
(91912706, 'TPB 2', 31, NULL),
(93022510, 'TKJ 2', 29, NULL),
(93191295, 'OA 1', 32, 0),
(93199995, 'OA 2', 29, 5),
(93344760, 'TKJ 1', 29, NULL),
(93972096, 'TITL 1', 31, NULL),
(93975010, 'TGB 1', 32, NULL),
(94474940, 'TPB 1', 32, NULL),
(94574911, 'TGB 3', 33, NULL),
(95474959, 'TAV 1', 31, NULL),
(96089847, 'TKJ 3', 32, 11),
(96918984, 'RPL 3', 31, NULL),
(98964721, 'TITL 2', 30, NULL),
(99762217, 'TPB 3', 30, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `kode_mapel` varchar(30) NOT NULL,
  `nama_mapel` varchar(60) NOT NULL,
  `jp` varchar(200) NOT NULL,
  `kode_guru` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`kode_mapel`, `nama_mapel`, `jp`, `kode_guru`) VALUES
('12005785', 'Pertanian', '01:07', 23),
('13856379', 'Sosiologi', '11:06', 24),
('13977395', 'Bahasa Mandarin', '10:08', 19),
('14137506', 'Fisika', '10:01', 15),
('16890044', 'Sejarah Indonesia', '12:15', 12),
('17591785', 'Manajemen Perhotelan', '10:08', 16),
('19735225', 'Kejuruan TKJ', '06:12', 10),
('21979117', 'Pemrograman', '06:27', 9),
('27073763', 'Prakarya dan Kewirausahaan', '04:17', 10),
('27591041', 'Geografi', '10:05', 9),
('33042909', 'Pendidikan Agama', '03:13', 3),
('33145911', 'Kejuruan TAV', '10:16', 11),
('34963614', 'Bahasa Inggris', '10:15', 18),
('38572599', 'Pengelasan', '09:06', 1),
('42720131', 'Biologi', '08:23', 10),
('43990711', 'Bahasa Jepang', '04:30', 23),
('44172166', 'Seni Budaya', '03:02', 11),
('44676407', 'Manajemen Usaha Mikro dan Kecil', '08:14', 22),
('50045437', 'Bahasa Sunda', '04:21', 21),
('55711984', 'Akuntansi', '05:25', 23),
('57127732', 'Otomotif', '09:13', 10),
('58061943', 'Bahasa Arab', '12:27', 16),
('60585569', 'Ekonomi', '01:13', 23),
('63331296', 'Desain Grafis', '12:02', 12),
('64764328', 'Bisnis dan Kewirausahaan', '06:09', 8),
('65825421', 'Matematika', '12:15', 16),
('67426610', 'Pendidikan Jasmani', '09:02', 9),
('68627791', 'Pemeliharaan Peralatan Komputer', '02:17', 7),
('83030400', 'Teknik Permesinan', '10:07', 18),
('83174913', 'Bahasa Indonesia', '07:30', 4),
('87105235', 'Pendidikan Kewarganegaraan', '01:28', 15),
('89062016', 'Kimia', '03:08', 2),
('95734973', 'Kejuruan RPL', '02:05', 23),
('99471834', 'Pemrograman Web', '08:01', 9);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `kd_nilai` int NOT NULL,
  `nis_siswa` int DEFAULT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `kd_mapel` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `kehadiran` decimal(10,0) DEFAULT NULL,
  `tugas` decimal(10,0) DEFAULT NULL,
  `formatif` decimal(10,0) DEFAULT NULL,
  `uts` decimal(10,0) DEFAULT NULL,
  `uas` decimal(10,0) DEFAULT NULL,
  `nilai_akhir` decimal(10,0) DEFAULT NULL,
  `grade` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`kd_nilai`, `nis_siswa`, `kelas`, `kd_mapel`, `kehadiran`, `tugas`, `formatif`, `uts`, `uas`, `nilai_akhir`, `grade`) VALUES
(44, 72367620, '', '59554704', '5', '100', '100', '100', '100', '405', 'A'),
(45, 21743310, NULL, '64494784', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 81934007, '', '19660782', '5', '100', '100', '100', '50', '355', 'A'),
(47, 72367620, '', '78942346', '5', '87', '90', '89', '82', '353', 'A'),
(48, 81934007, NULL, '59554704', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 72367620, '', '21979117', '0', '32', '22', '19', '12', '15', 'F'),
(50, 72367620, '', '95734973', '4', '90', '89', '78', '88', '349', 'A'),
(51, 81934007, NULL, '43990711', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 72367620, '', '99471834', '3', '8', '88', '88', '78', '265', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `nis` int NOT NULL,
  `id_kelas` int DEFAULT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`nis`, `id_kelas`, `nama_lengkap`, `tgl_lahir`, `jk`, `alamat`, `telp`, `agama`, `jurusan`) VALUES
(10328542, 93344760, 'eaoyama', '2022-08-25', 'l', '2492413  福井県高橋市東区松本町浜田3-7-4', '06651-3-0151', 'Konghucu', 'Teknik Komputer dan Jaringan'),
(11567171, 93191295, 'yoko.tsuda', '1984-11-04', 'p', '3801300  岩手県中島市北区西之園町田辺5-5-7 コーポ杉山109号', '015-279-2535', 'Katolik', 'Rekayasa Perangkat Lunak'),
(15645787, 93972096, 'jsasada', '1995-02-13', 'l', '7329446  滋賀県小林市南区渡辺町田辺4-6-1 ハイツ大垣108号', '008-519-2483', 'Katolik', 'Teknik Instalasi Tenaga Listrik'),
(16703171, 95474959, 'matsumoto.minoru', '1993-02-04', 'l', '6817360  愛知県工藤市東区山本町杉山10-4-4 ハイツ笹田101号', '0648-87-0558', 'Hindu', 'Teknik Pemesinan'),
(21743310, 91638904, 'byamaguchi', '1991-05-18', 'l', '9668381  石川県加納市西区桐山町杉山2-6-9 ハイツ村山103号', '0640-281-838', 'Islam', 'Teknik Pemesinan'),
(22350539, 93191295, 'idaka.mai', '1979-06-15', 'p', '3913463  三重県青田市南区山口町小泉10-5-1', '090-4986-5868', 'Kristen Protestan', 'Teknik Instalasi Tenaga Listrik'),
(24346900, 93199995, 'mikako96', '1995-08-08', 'p', '5437467  群馬県井高市西区中島町山口8-9-3 コーポ近藤103号', '00335-0-5122', 'Konghucu', 'Teknik Gambar Bangunan'),
(24585945, 91404553, 'vkijima', '2021-09-16', 'l', '5385233  宮城県中村市東区田辺町渚3-10-1 コーポ桐山103号', '053-129-1921', 'Kristen Protestan', 'Teknik Pemesinan'),
(25510843, 89047200, 'xnakajima', '1976-02-01', 'p', '5713284  滋賀県桐山市西区津田町青田4-9-10', '094-960-6175', 'Hindu', 'Teknik Komputer dan Jaringan'),
(27345703, 90671033, 'sayuri.saito', '1972-01-15', 'l', '1126013  神奈川県原田市南区鈴木町吉田8-3-8', '080-972-8888', 'Buddha', 'Teknik Audio Video'),
(28363181, 96918984, 'kaori.nakamura', '1998-03-16', 'p', '7364028  岩手県小泉市西区青山町山岸3-8-7', '09-0825-9572', 'Hindu', 'Teknik Audio Video'),
(28837012, 89047200, 'kanou.yoko', '1980-09-08', 'l', '2664633  新潟県杉山市西区山本町山本6-5-5 ハイツ田中103号', '080-9814-2830', 'Kristen Protestan', 'Teknik Instalasi Tenaga Listrik'),
(29340557, 91638904, 'nsuzuki', '1971-05-24', 'p', '7844772  岡山県吉田市東区山岸町山田5-9-5 コーポ渚101号', '00-8021-4399', 'Islam', 'Teknik Komputer dan Jaringan'),
(31580541, 93972096, 'kana23', '1980-09-09', 'l', '1643071  奈良県松本市西区田中町桐山8-7-4 コーポ桐山103号', '080-6058-1809', 'Konghucu', 'Teknik Pemesinan'),
(32404265, 90671033, 'saito.tomoya', '2010-10-10', 'l', '1892750  宮崎県浜田市南区桐山町小林7-3-2', '080-1264-9727', 'Konghucu', 'Teknik Instalasi Tenaga Listrik'),
(36517069, 93022510, 'kazuya.kijima', '1986-04-05', 'l', '5553949  広島県井上市西区西之園町宇野9-1-10', '068-833-5893', 'Buddha', 'Teknik Pemesinan'),
(36839416, 96089847, 'tyamaguchi', '1980-01-08', 'l', '9166052  北海道近藤市南区江古田町山本8-4-8 ハイツ原田105号', '045-183-1370', 'Katolik', 'Teknik Komputer dan Jaringan'),
(40968668, 93199995, 'htakahashi', '1986-12-15', 'l', '4687539  東京都野村市南区井高町中村8-4-8', '01180-3-0238', 'Kristen Protestan', 'Teknik Instalasi Tenaga Listrik'),
(41284377, 93191295, 'rika76', '1985-01-09', 'l', '2397169  和歌山県斉藤市西区加藤町田中9-3-3', '090-6428-0368', 'Islam', 'Rekayasa Perangkat Lunak'),
(42585903, 91912706, 'hiroshi22', '1974-07-20', 'l', '2302629  岩手県近藤市北区桐山町田中8-7-3 コーポ田中107号', '060-144-8418', 'Kristen Protestan', 'Teknik Gambar Bangunan'),
(53813793, 93344760, 'yoko.watanabe', '1997-08-27', 'l', '6922011  鳥取県村山市東区山口町山田5-4-9 コーポ木村106号', '054-124-6669', 'Kristen Protestan', 'Office Administration'),
(53935158, 90254266, 'yosuke.ekoda', '2011-03-17', 'p', '7507260  山口県佐藤市中央区小泉町西之園4-6-10', '06193-2-3080', 'Buddha', 'Office Administration'),
(54156835, 98964721, 'atsushi36', '1988-12-26', 'l', '4703253  岐阜県廣川市中央区斉藤町渚9-7-7', '0670-19-5376', 'Konghucu', 'Teknik Audio Video'),
(56402716, 89047200, 'itakahashi', '2004-06-08', 'l', '6576528  神奈川県村山市中央区吉本町喜嶋9-8-5', '090-0156-4944', 'Kristen Protestan', 'Teknik Instalasi Tenaga Listrik'),
(57302150, 96089847, 'manabu.kimura', '2012-01-20', 'p', '7924315  東京都村山市東区山田町山田6-6-8', '090-2976-2351', 'Buddha', 'Teknik Instalasi Tenaga Listrik'),
(59741231, 93191295, 'naoko57', '1988-12-21', 'p', '5381375  山梨県鈴木市南区桐山町田中6-3-2 ハイツ佐藤102号', '021-693-7075', 'Katolik', 'Teknik Instalasi Tenaga Listrik'),
(60667597, 90671033, 'sayuri78', '1979-09-04', 'l', '7038645  鳥取県大垣市中央区西之園町小林4-9-1 ハイツ浜田109号', '08-2102-3355', 'Islam', 'Teknik Komputer dan Jaringan'),
(60922557, 91404553, 'yasuhiro.nishinosono', '1995-12-05', 'p', '7237908  広島県中島市西区青田町加納3-8-4 コーポ青田104号', '03599-4-7933', 'Buddha', 'Teknik Komputer dan Jaringan'),
(61031186, 93199995, 'cyoshida', '2017-08-19', 'p', '7263584  富山県小林市中央区近藤町浜田2-8-1 コーポ近藤110号', '080-3897-6036', 'Katolik', 'Office Administration'),
(63442534, 93972096, 'tomoya27', '1996-08-18', 'p', '8384452  広島県佐々木市南区山口町杉山8-6-3', '0801-61-0346', 'Hindu', 'Teknik Pemesinan'),
(66004878, 96918984, 'skobayashi', '1997-02-05', 'p', '7444628  岡山県渚市中央区坂本町中島2-9-4 コーポ杉山110号', '0970-001-852', 'Buddha', 'Office Administration'),
(66906725, 93022510, 'mai.tanaka', '1970-10-21', 'l', '6378449  長崎県近藤市西区鈴木町浜田6-3-8', '0920-061-861', 'Hindu', 'Rekayasa Perangkat Lunak'),
(66980062, 91404352, 'yamagishi.ryosuke', '2009-02-12', 'l', '4233975  和歌山県山田市東区井上町浜田1-8-9', '00-6471-1534', 'Islam', 'Teknik Pemesinan'),
(66986072, 93022510, 'harada.naoto', '2019-06-08', 'p', '3863810  山梨県鈴木市中央区坂本町野村3-1-9', '063-056-0630', 'Konghucu', 'Teknik Instalasi Tenaga Listrik'),
(70886024, 91638904, 'nakajima.soutaro', '2020-11-13', 'l', '5203861  北海道桐山市西区津田町宮沢3-8-9', '05863-9-1845', 'Konghucu', 'Teknik Komputer dan Jaringan'),
(71163625, 96089847, 'hanako36', '2019-10-16', 'l', '1894869  滋賀県坂本市東区山岸町村山8-9-9 コーポ高橋104号', '0042-84-6616', 'Kristen Protestan', 'Teknik Komputer dan Jaringan'),
(71699383, 99762217, 'kondo.yui', '2010-06-30', 'p', '7536072  山形県高橋市南区坂本町斉藤8-6-4 コーポ加納110号', '080-1723-1414', 'Konghucu', 'Teknik Gambar Bangunan'),
(72367620, 96089847, 'akemi.sugiyama', '2019-07-06', 'p', '1533647  埼玉県石田市西区佐藤町山田4-6-6', '061-545-0843', 'Konghucu', 'Office Administration'),
(74199913, 90254266, 'kazuya.miyazawa', '2019-07-14', 'p', '1507701  千葉県加納市南区坂本町野村4-8-4', '080-9096-6874', 'Katolik', 'Rekayasa Perangkat Lunak'),
(74264429, 94474940, 'hanako.sugiyama', '1973-07-21', 'p', '6393480  滋賀県江古田市東区西之園町工藤5-9-3', '0042-99-6642', 'Kristen Protestan', 'Teknik Komputer dan Jaringan'),
(81255268, 93975010, 'yumiko.kijima', '2016-05-03', 'p', '4157694  山梨県浜田市東区高橋町喜嶋9-7-5', '080-2696-3594', 'Buddha', 'Teknik Pemesinan'),
(81934007, 91697310, 'fujimoto.soutaro', '1981-01-17', 'l', '5908434  富山県小林市南区工藤町村山3-5-3 ハイツ加藤109号', '0204-21-1541', 'Katolik', 'Rekayasa Perangkat Lunak'),
(84139728, 96089847, 'yuta.idaka', '1974-05-31', 'p', '4543093  茨城県青田市北区野村町加藤2-9-1', '0810-262-500', 'Hindu', 'Teknik Audio Video'),
(85083325, 93199995, 'nakamura.shota', '1996-04-12', 'l', '8448843  三重県笹田市西区中村町中村1-10-2', '080-8649-6221', 'Konghucu', 'Office Administration'),
(85591409, 99762217, 'vyamada', '1981-12-01', 'l', '7774954  神奈川県若松市西区青田町三宅2-5-4', '080-5819-1408', 'Kristen Protestan', 'Teknik Gambar Bangunan'),
(85649309, 94474940, 'nagisa.momoko', '1995-06-28', 'p', '9411017  滋賀県杉山市中央区西之園町村山7-10-7', '015-403-2876', 'Kristen Protestan', 'Teknik Audio Video'),
(89227875, 89047200, 'soutaro.sasada', '1993-03-12', 'p', '2429164  青森県伊藤市中央区青田町石田10-8-1 コーポ青田108号', '0300-200-425', 'Buddha', 'Teknik Gambar Bangunan'),
(92908773, 91404553, 'gnakamura', '2022-11-30', 'l', '9012634  神奈川県渚市東区中村町宇野2-7-9', '0850-326-208', 'Konghucu', 'Rekayasa Perangkat Lunak'),
(97850554, 94574911, 'uyamamoto', '1981-04-17', 'p', '5306643  宮城県山岸市南区若松町大垣10-5-9', '02557-7-2223', 'Katolik', 'Teknik Gambar Bangunan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`kode_guru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_guru` (`kode_guru`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kode_mapel`),
  ADD KEY `mapel_ibfk_1` (`kode_guru`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kd_nilai`),
  ADD KEY `nis_siswa` (`nis_siswa`),
  ADD KEY `kd_mapel` (`kd_mapel`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99762218;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `kd_nilai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`kode_guru`) REFERENCES `gurus` (`kode_guru`) ON DELETE SET NULL ON UPDATE RESTRICT;

--
-- Constraints for table `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`kode_guru`) REFERENCES `gurus` (`kode_guru`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`kd_mapel`) REFERENCES `mapel` (`kode_mapel`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`nis_siswa`) REFERENCES `siswas` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
