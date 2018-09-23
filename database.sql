-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.35 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping structure for table rsroyal_surabaya.barang
DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT '0',
  `expired_date` date DEFAULT '0000-00-00',
  `purchasing_date` date DEFAULT '0000-00-00',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `kategori_id` varchar(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- Dumping data for table rsroyal_surabaya.barang: ~8 rows (approximately)
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` (`id`, `nama`, `stok`, `harga`, `expired_date`, `purchasing_date`, `status`, `kategori_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(10, 'DiaTabs', 45, 2500, '2024-01-03', '2018-05-10', 1, '4', '2018-08-12 03:25:37', '2018-08-12 14:20:47', NULL),
	(11, 'Paracetamol', 300, 1500, '2023-08-09', '2017-06-01', 1, '4', '2018-08-11 15:15:17', '2018-08-12 04:31:33', NULL),
	(12, 'Paracetamol', NULL, 0, '0000-00-00', '0000-00-00', 1, '4', '2018-08-11 15:17:09', '2018-08-11 15:17:09', '2018-08-12 09:36:43'),
	(17, 'Kursi Roda', 15, 5000000, '0000-00-00', '2018-08-11', 1, '1', '2018-08-12 02:31:48', '2018-08-12 13:28:34', NULL),
	(18, 'Perban', 198, 5000, '2025-09-09', '2018-08-10', 1, '1', '2018-08-12 03:25:21', '2018-08-12 12:54:19', NULL),
	(19, 'Ranitidine', NULL, 9000, '2025-09-17', '2018-08-10', 1, '4', '2018-08-12 02:38:52', '2018-08-12 02:38:52', NULL),
	(20, 'Renovit', NULL, 11000, '2023-05-20', '2018-08-18', 0, '6', '2018-08-12 02:40:24', '2018-08-12 02:40:24', NULL),
	(21, 'Promagh', 1320, 2900, '2025-09-09', '2018-02-20', 1, '4', '2018-08-12 03:50:29', '2018-08-12 04:31:42', '2018-08-12 04:33:57'),
	(22, 'Promil', 36, 60000, '2026-02-06', '2018-03-07', 1, '5', '2018-08-12 04:33:38', '2018-08-12 04:33:38', NULL),
	(23, 'Metronidazol', 20, 80000, '2024-01-03', '2018-08-10', 1, '4', '2018-08-12 15:56:08', '2018-08-12 15:56:08', NULL);
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;

-- Dumping structure for table rsroyal_surabaya.kategori
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table rsroyal_surabaya.kategori: ~6 rows (approximately)
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` (`id`, `nama`) VALUES
	(1, 'Alat Kesehatan'),
	(2, 'Obat Langka'),
	(4, 'Obat Generik'),
	(5, 'Ibu dan Anak'),
	(6, 'Suplemen'),
	(7, 'Perawatan Tubuh'),
	(8, 'Herbal');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

-- Dumping structure for table rsroyal_surabaya.transaksi
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_transaksi` tinyint(4) NOT NULL DEFAULT '0',
  `jumlah_barang` int(11) NOT NULL DEFAULT '0',
  `stok_akhir` int(11) DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `barang_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table rsroyal_surabaya.transaksi: ~12 rows (approximately)
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` (`id`, `jenis_transaksi`, `jumlah_barang`, `stok_akhir`, `date_time`, `barang_id`) VALUES
	(1, 1, 10, NULL, '2018-08-12 09:40:59', 10),
	(2, 0, 1, NULL, '2018-08-12 10:32:08', 17),
	(3, 1, 2, NULL, '2018-08-12 10:32:43', 18),
	(4, 0, 1, 0, '2018-08-12 12:52:24', 17),
	(5, 0, 5, 195, '2018-08-12 12:53:42', 18),
	(6, 1, 3, 198, '2018-08-12 12:54:19', 18),
	(7, 1, 20, 20, '2018-08-12 13:18:24', 17),
	(8, 0, 3, 17, '2018-08-12 13:18:40', 17),
	(9, 0, 2, 15, '2018-08-12 13:28:34', 17),
	(10, 1, 20, 45, '2018-08-12 13:28:51', 10),
	(11, 1, 5000, 5045, '2018-08-12 14:20:27', 10),
	(12, 0, 5000, 45, '2018-08-12 14:20:47', 10);
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
