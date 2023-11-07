-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3316
-- Generation Time: Nov 07, 2023 at 09:06 AM
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
-- Database: `gss_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `gurus`
--

CREATE TABLE `gurus` (
  `kode_guru` int NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `pendidikan` varchar(4) NOT NULL,
  `prodi` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gurus`
--

INSERT INTO `gurus` (`kode_guru`, `nama_guru`, `pendidikan`, `prodi`) VALUES
(0, 'hideki.wakamatsu', 'Ltd', 'Aliquid dolor hic.'),
(1, 'kobayashi.shota', 'Ltd', 'Quis hic temporibus.'),
(2, 'akira.miyake', 'Ltd', 'Velit dolores harum.'),
(3, 'taro.fujimoto', 'Ltd', 'Dolor dolore quae.'),
(4, 'nagisa.yoko', 'Ltd', 'Est accusantium et.'),
(6, 'mikako70', 'Ltd', 'Quis occaecati.'),
(7, 'ryosuke.yamamoto', 'Ltd', 'Vero ut rerum.'),
(8, 'nanami06', 'Ltd', 'Eaque rerum.'),
(9, 'sasaki.kyosuke', 'Ltd', 'Qui eligendi.'),
(10, 'gyamamoto', 'Ltd', 'Omnis ea et.'),
(11, 'momoko.sasada', 'Ltd', 'Unde aut aut labore.'),
(12, 'qaota', 'Ltd', 'Sed rerum fugit.'),
(13, 'fkobayashi', 'Ltd', 'Quibusdam ratione.'),
(14, 'yosuke59', 'Ltd', 'Et iste est.'),
(15, 'soutaro21', 'Ltd', 'Officiis dolores.'),
(16, 'nakamura.takuma', 'Ltd', 'Saepe voluptas ex.'),
(17, 'tanaka.hideki', 'Ltd', 'Non reprehenderit.'),
(18, 'satomi00', 'Ltd', 'Dicta et autem quae.'),
(19, 'pkanou', 'Ltd', 'Quam quaerat.'),
(20, 'rika.ekoda', 'Ltd', 'Autem velit.'),
(21, 'omurayama', 'Ltd', 'Ratione qui.'),
(22, 'mikako71', 'Ltd', 'Commodi aspernatur.'),
(23, 'fujimoto.sayuri', 'Ltd', 'Inventore.'),
(24, 'ogaki.jun', 'Ltd', 'Ea sed maxime fugit.'),
(25, 'mikako23', 'Ltd', 'Itaque facere sed.'),
(26, 'yuki.nishinosono', 'Ltd', 'Voluptatem rerum.'),
(27, 'naoto.ito', 'Ltd', 'Sit quo sint veniam.'),
(28, 'nomura.shuhei', 'Ltd', 'Unde quod fugit aut.'),
(29, 'cyoshida', 'Ltd', 'Ea ratione rerum.'),
(30, 'yasuhiro83', 'Ltd', 'Vel omnis ipsam et.'),
(31, 'taichi.saito', 'Ltd', 'Voluptate minus.'),
(32, 'tsubasa24', 'Ltd', 'Velit minus illum.'),
(33, 'kazuya21', 'Ltd', 'Reprehenderit.'),
(34, 'okanou', 'Ltd', 'Atque natus.'),
(36, 'smatsumoto', 'Ltd', 'Ratione ut odit.'),
(37, 'sayuri48', 'Ltd', 'Quidem molestias.'),
(38, 'msuzuki', 'Ltd', 'Illum laborum.'),
(39, 'yuki53', 'Ltd', 'Quia magni voluptas.'),
(40, 'rmiyake', 'Ltd', 'Deleniti eos.'),
(41, 'hiroshi57', 'Ltd', 'Sit error ex nam.'),
(42, 'miyake.tomoya', 'Ltd', 'Sed qui.'),
(43, 'kenichi33', 'Ltd', 'Veniam culpa.'),
(44, 'qsugiyama', 'Ltd', 'Aperiam dolores.'),
(45, 'tomoya.kato', 'Ltd', 'Odio laboriosam.'),
(46, 'takuma.sasaki', 'Ltd', 'Magni vel quis.'),
(47, 'kiriyama.kumiko', 'Ltd', 'Iusto non nam hic.'),
(48, 'nanami77', 'Ltd', 'Facere minima.'),
(49, 'nakajima.chiyo', 'Ltd', 'Quia quisquam.'),
(55211739, 'Ahmad', 'S1', 'saksaaz'),
(76519300, 'GGGGGg', 'sa', 'sadasds');

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
(25992899, 'RPL 1', 32, 4),
(34259334, 'RPL 4', 32, 10),
(50583089, 'RPL 3', 32, 9),
(73439618, 'RPL 2', 32, 3);

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
('26043183', ' Bahasa Inggris ', '09:53', NULL),
('82570772', 'B.Indonesia', '03:03', NULL),
('93721186', 'Praktek', '12:12', NULL);

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
(30, 38799529, NULL, '26043183', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 44270279, NULL, '26043183', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 42916408, NULL, '26043183', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 10510331, '', '26043183', '4', '10', '70', '30', '40', '84', 'B'),
(34, 14302773, NULL, '82570772', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 14302773, NULL, '93721186', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 42916408, NULL, '93721186', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 48213510, NULL, '26043183', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 53080579, NULL, '26043183', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 48213510, NULL, '82570772', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 17661692, 'RPL 4', '26043183', '36', '10', '70', '30', '40', '116', 'A');

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
(10510331, 25992899, 'momoko91', '1998-12-27', 'l', '7142519  山梨県佐藤市中央区原田町山口8-8-6 コーポ青山102号', '56922093', 'islam', 'Rekayasa Perangkat Lunak'),
(14302773, 34259334, 'zmurayama', '2007-07-16', 'l', '1552681  京都府小泉市東区村山町田中3-5-2 ハイツ野村105号', '79506565', 'islam', 'otomotif'),
(17571776, 50583089, 'ekoda.miki', '1984-03-23', 'p', '3356347  鹿児島県大垣市中央区青田町佐々木6-6-7', '15390438', 'kristen', 'Rekayasa Perangkat Lunak'),
(17629725, 34259334, 'kaori.tanabe', '1986-11-06', 'p', '7144896  佐賀県中津川市西区山口町田辺6-6-1', '39770065', 'islam', 'otomotif'),
(17661692, 34259334, 'Rei', '2019-09-27', 'p', '9282614  宮城県原田市中央区津田町中島3-7-3 コーポ若松104号', '61459397', 'kristen', 'Rekayasa Perangkat Lunak'),
(22644505, NULL, 'naoto.kato', '2011-05-08', 'l', '2252695  沖縄県山本市南区高橋町加納2-9-3 コーポ吉本110号', '53877141', 'islam', 'otomotif'),
(23549415, NULL, 'taro78', '2008-08-01', 'l', '2388031  兵庫県小林市東区野村町中村2-4-1 コーポ宮沢107号', '39613591', 'islam', 'otomotif'),
(23637693, NULL, 'kazuya31', '1971-05-29', 'l', '6372955  神奈川県青田市北区吉本町大垣3-9-7 コーポ井高105号', '91229913', 'kristen', 'Rekayasa Perangkat Lunak'),
(27338004, NULL, 'kkijima', '2003-06-13', 'p', '8807365  石川県石田市西区工藤町松本8-3-8', '50966111', 'kristen', 'Rekayasa Perangkat Lunak'),
(32640410, NULL, 'mikako87', '2004-02-23', 'p', '6354693  三重県松本市西区吉本町三宅10-2-2 ハイツ近藤107号', '31971566', 'kristen', 'Rekayasa Perangkat Lunak'),
(35487339, NULL, 'aoyama.tsubasa', '2020-09-25', 'l', '8352453  滋賀県小林市南区村山町中津川10-8-3 コーポ渚109号', '33220835', 'islam', 'otomotif'),
(38270612, NULL, 'sasaki.kenichi', '2010-02-24', 'p', '6366647  栃木県小泉市東区中島町喜嶋6-1-6 ハイツ高橋103号', '42838179', 'kristen', 'otomotif'),
(38799529, NULL, 'nagisa.mai', '2011-09-01', 'l', '9246212  京都府佐々木市西区斉藤町佐藤7-6-7', '78487019', 'kristen', 'Rekayasa Perangkat Lunak'),
(40179039, NULL, 'yuta.nakajima', '2014-03-12', 'l', '9444431  福岡県中津川市北区山田町宇野3-6-5 コーポ中村108号', '39752919', 'islam', 'Rekayasa Perangkat Lunak'),
(41399300, NULL, 'asuka.nishinosono', '1987-12-29', 'p', '2443913  京都府松本市南区吉田町江古田7-3-9 コーポ杉山110号', '45970744', 'kristen', 'Rekayasa Perangkat Lunak'),
(42916408, NULL, 'asuka99', '1976-06-22', 'p', '6185601  埼玉県斉藤市中央区青田町加藤8-10-1 コーポ小林102号', '42605423', 'islam', 'otomotif'),
(44270279, NULL, 'aota.rei', '2013-09-27', 'p', '8798380  青森県井高市西区高橋町原田8-3-4', '41554541', 'islam', 'otomotif'),
(44805442, NULL, 'kaori.kudo', '2019-01-24', 'l', '8538487  東京都大垣市南区津田町田辺2-5-1 ハイツ原田107号', '44036382', 'islam', 'otomotif'),
(48213510, NULL, 'yoshida.taichi', '1971-10-03', 'l', '2677980  奈良県坂本市東区宮沢町山口8-2-2 ハイツ山岸107号', '35272400', 'islam', 'Rekayasa Perangkat Lunak'),
(48845734, NULL, 'tsuda.atsushi', '2011-04-06', 'p', '6213852  宮崎県青山市西区青山町原田1-3-9 コーポ青山107号', '54518423', 'kristen', 'Rekayasa Perangkat Lunak'),
(49885825, NULL, 'tsuda.maaya', '1989-03-07', 'l', '5705247  新潟県田中市南区中津川町浜田2-4-1', '88552679', 'kristen', 'Rekayasa Perangkat Lunak'),
(50372975, NULL, 'soutaro35', '1998-05-15', 'l', '1222144  鹿児島県井高市西区小泉町中村3-10-7', '16368443', 'islam', 'Rekayasa Perangkat Lunak'),
(52230617, NULL, 'kimura.naoko', '2003-11-27', 'l', '1541690  大分県小林市東区大垣町中島6-3-2', '64368852', 'kristen', 'Rekayasa Perangkat Lunak'),
(53080579, NULL, 'xnakatsugawa', '1976-03-13', 'l', '4546001  宮崎県笹田市南区浜田町小泉4-10-4 コーポ加納110号', '48234248', 'islam', 'otomotif'),
(54701934, NULL, 'jsasaki', '1999-10-26', 'l', '9322215  大阪府渚市中央区大垣町山田9-2-2', '86689484', 'kristen', 'otomotif'),
(56670917, NULL, 'maaya02', '2016-11-14', 'p', '5323912  三重県中村市中央区宇野町渡辺10-8-5', '90710892', 'kristen', 'otomotif'),
(57522885, NULL, 'yoko.sakamoto', '1994-01-06', 'l', '2199580  香川県廣川市南区中島町原田1-3-4 コーポ山田103号', '47826941', 'kristen', 'otomotif'),
(58716108, NULL, 'hirokawa.ryohei', '2017-05-03', 'l', '4288664  北海道近藤市東区木村町小林6-9-2', '86215072', 'kristen', 'Rekayasa Perangkat Lunak'),
(59795630, NULL, 'hirokawa.asuka', '1984-06-08', 'l', '8734525  広島県坂本市北区吉本町大垣7-3-6', '31214735', 'kristen', 'Rekayasa Perangkat Lunak'),
(59898670, NULL, 'yamaguchi.kana', '2007-11-05', 'l', '2869244  山口県田中市中央区桐山町村山6-3-6', '58477812', 'islam', 'otomotif'),
(61804583, NULL, 'dsasada', '2019-06-12', 'p', '4571458  佐賀県小林市中央区伊藤町佐藤7-9-8 ハイツ藤本106号', '73003632', 'islam', 'otomotif'),
(62473638, NULL, 'kazuya.harada', '2007-10-14', 'l', '4275503  鹿児島県野村市東区若松町原田5-8-1 コーポ小林109号', '31067330', 'kristen', 'Rekayasa Perangkat Lunak'),
(64026580, NULL, 'laota', '2005-08-20', 'p', '9391588  埼玉県井上市西区大垣町渚8-10-4', '58367112', 'islam', 'otomotif'),
(65376284, NULL, 'yuki.kondo', '1996-06-22', 'p', '2451976  宮崎県藤本市北区中津川町渡辺3-3-9 コーポ中津川103号', '32734379', 'islam', 'otomotif'),
(65883147, NULL, 'watanabe.yui', '1970-02-13', 'l', '9576967  宮城県津田市西区廣川町青山7-4-10', '75559807', 'kristen', 'Rekayasa Perangkat Lunak'),
(67466325, NULL, 'jun74', '1985-05-30', 'p', '1155716  長崎県田辺市東区高橋町笹田7-5-5', '52329580', 'kristen', 'Rekayasa Perangkat Lunak'),
(67872575, NULL, 'sato.shuhei', '2008-08-23', 'l', '5592246  千葉県渚市西区村山町西之園7-5-7 ハイツ宇野110号', '61948746', 'kristen', 'otomotif'),
(67890207, NULL, 'kobayashi.mai', '1973-07-19', 'p', '3663562  山梨県宮沢市東区渚町江古田7-4-4', '46198494', 'kristen', 'otomotif'),
(70590683, NULL, 'mai35', '1991-10-09', 'l', '5221883  奈良県井高市西区田中町村山1-9-9', '99672505', 'kristen', 'Rekayasa Perangkat Lunak'),
(72236241, NULL, 'isasada', '2009-06-04', 'l', '3272641  奈良県村山市西区青山町工藤4-1-5 ハイツ山本104号', '42661790', 'kristen', 'otomotif'),
(75175954, NULL, 'taichi.harada', '1998-11-29', 'l', '2081616  島根県鈴木市西区工藤町松本10-10-3 ハイツ杉山107号', '69853516', 'islam', 'Rekayasa Perangkat Lunak'),
(82011570, NULL, 'qyoshimoto', '1982-12-11', 'p', '7562078  大分県村山市中央区山田町工藤7-9-6 コーポ中津川101号', '25448168', 'kristen', 'otomotif'),
(85815468, NULL, 'naoki17', '1990-06-15', 'l', '5115753  徳島県渡辺市中央区佐藤町石田5-3-4 コーポ鈴木104号', '35580041', 'kristen', 'Rekayasa Perangkat Lunak'),
(86364848, NULL, 'kondo.minoru', '1987-02-12', 'l', '3839321  岩手県坂本市南区若松町井上1-8-6', '65794694', 'kristen', 'otomotif'),
(86861063, NULL, 'yuta23', '1971-02-09', 'l', '9716379  宮城県山田市北区斉藤町吉田9-9-2', '41734664', 'islam', 'otomotif'),
(86925014, NULL, 'naoko.nagisa', '2008-07-01', 'p', '2975989  沖縄県宮沢市東区山口町中村10-10-8 ハイツ桐山110号', '57615230', 'islam', 'Rekayasa Perangkat Lunak'),
(91072234, NULL, 'momoko24', '1979-05-21', 'p', '3656742  三重県中村市西区中島町石田6-2-1 コーポ浜田101号', '47039576', 'islam', 'otomotif'),
(92411688, NULL, 'fkobayashi', '1981-10-31', 'l', '8122149  埼玉県佐々木市西区村山町山岸7-10-4 ハイツ坂本110号', '24171675', 'islam', 'otomotif'),
(93044006, NULL, 'tomoya76', '2020-04-28', 'p', '3945815  熊本県江古田市北区工藤町笹田2-9-1', '89510801', 'kristen', 'otomotif'),
(99267241, NULL, 'hiroshi.suzuki', '1980-09-08', 'l', '8513720  沖縄県井高市東区小泉町原田4-5-5 コーポ藤本109号', '22352179', 'islam', 'otomotif');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98925264;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `kd_nilai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`kode_guru`) REFERENCES `gurus` (`kode_guru`);

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
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`nis_siswa`) REFERENCES `siswas` (`nis`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
