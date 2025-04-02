-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table sajjad_osano.bals: ~1 rows (approximately)
REPLACE INTO `bals` (`id`, `product_type_id`, `purchase_order_id`, `code`, `name`, `image`, `description`, `is_unpack`, `created_at`, `updated_at`) VALUES
	('c29d43cf-9ddd-42c6-b325-5ee55faaa680', '9587e619-2f07-44c3-8d62-6412552ff088', NULL, 'BAL/001/SJZ/III/2025', 'Bal Sajadah Turki', NULL, NULL, 0, '2025-03-18 14:19:18', '2025-03-18 14:19:18');

-- Dumping data for table sajjad_osano.clients: ~0 rows (approximately)
REPLACE INTO `clients` (`id`, `image`, `name`, `npwp`, `email`, `phone`, `fax`, `description`, `address`, `city`, `postal_code`, `created_at`, `updated_at`) VALUES
	('12a22ce1-d5b3-4e95-86fb-5bcb90398cf2', NULL, 'Canadian Moslem', NULL, 'hello@cadmoslem.com', '21823727', NULL, NULL, 'Cad West 21, PSV 13.', 'KOTA LUAR NEGERI', 1231222, '2025-03-18 18:02:53', '2025-03-18 18:02:53');

-- Dumping data for table sajjad_osano.client_addresses: ~0 rows (approximately)
REPLACE INTO `client_addresses` (`id`, `client_id`, `name`, `address`, `city`, `postal_code`, `description`, `created_at`, `updated_at`) VALUES
	('4be32d9a-13f8-48e8-ac9d-d4aeda6194ec', '12a22ce1-d5b3-4e95-86fb-5bcb90398cf2', 'Project A', 'Canada, Penzalda 12. CKD 232', 'KOTA LUAR NEGERI', 138282, NULL, '2025-03-18 18:03:52', '2025-03-18 18:03:52');

-- Dumping data for table sajjad_osano.client_pics: ~0 rows (approximately)
REPLACE INTO `client_pics` (`id`, `client_id`, `parent_pic_id`, `image`, `name`, `email`, `phone`, `description`, `created_at`, `updated_at`) VALUES
	('6d734253-192e-46fe-b301-c6d9ae948cd2', '12a22ce1-d5b3-4e95-86fb-5bcb90398cf2', NULL, NULL, 'Mr Kwezanda', 'kwezanda@gmail.com', '21282732', NULL, '2025-03-18 18:05:13', '2025-03-18 18:05:13');

-- Dumping data for table sajjad_osano.customers: ~0 rows (approximately)

-- Dumping data for table sajjad_osano.logistics: ~0 rows (approximately)

-- Dumping data for table sajjad_osano.logistic_addresses: ~0 rows (approximately)

-- Dumping data for table sajjad_osano.packs: ~0 rows (approximately)

-- Dumping data for table sajjad_osano.partners: ~0 rows (approximately)
REPLACE INTO `partners` (`id`, `image`, `name`, `npwp`, `email`, `phone`, `fax`, `description`, `address`, `city`, `postal_code`, `created_at`, `updated_at`) VALUES
	('6e531ace-498b-4f47-8516-2c7c59112d0d', NULL, 'Partner Toko Sebelah', NULL, NULL, '628712321232', '76123621', NULL, 'Jl. Mana Aja', 'JAKARTA PUSAT', 712632, '2025-03-18 17:56:33', '2025-03-18 17:56:33');

-- Dumping data for table sajjad_osano.partner_addresses: ~0 rows (approximately)
REPLACE INTO `partner_addresses` (`id`, `partner_id`, `name`, `address`, `city`, `postal_code`, `description`, `created_at`, `updated_at`) VALUES
	('f363934a-5737-4576-b7b5-d138a16a0eb3', '6e531ace-498b-4f47-8516-2c7c59112d0d', 'Toko Utama', 'Jl Mana Aja ya ges', 'ACEH BARAT', 712362, NULL, '2025-03-18 17:57:08', '2025-03-18 17:57:08');

-- Dumping data for table sajjad_osano.partner_pics: ~0 rows (approximately)
REPLACE INTO `partner_pics` (`id`, `partner_id`, `parent_pic_id`, `image`, `name`, `email`, `phone`, `description`, `created_at`, `updated_at`) VALUES
	('87ea4be7-5b29-4642-8658-8311f832c630', '6e531ace-498b-4f47-8516-2c7c59112d0d', NULL, NULL, 'Mas Ridho', NULL, '628971237212', NULL, '2025-03-18 17:57:25', '2025-03-18 17:57:25');

-- Dumping data for table sajjad_osano.principals: ~0 rows (approximately)
REPLACE INTO `principals` (`id`, `image`, `name`, `npwp`, `email`, `phone`, `fax`, `description`, `address`, `city`, `postal_code`, `created_at`, `updated_at`) VALUES
	('27c7e685-d07d-4ed8-a345-dcf074911b9e', NULL, 'Iranian Carpet Praymate', NULL, 'hello@icp.com', '1923812322', '712371', NULL, 'Iranian, West 123.', 'KOTA LUAR NEGERI', 123123, '2025-03-18 17:32:26', '2025-03-18 17:32:26');

-- Dumping data for table sajjad_osano.principal_addresses: ~0 rows (approximately)
REPLACE INTO `principal_addresses` (`id`, `principal_id`, `name`, `address`, `city`, `postal_code`, `description`, `created_at`, `updated_at`) VALUES
	('ed848d3e-b8d6-4f77-961c-025b34948e8d', '27c7e685-d07d-4ed8-a345-dcf074911b9e', 'Factory A', 'Iranian West 213, SGT 213', 'KOTA LUAR NEGERI', 712382, NULL, '2025-03-18 17:40:27', '2025-03-18 17:40:27');

-- Dumping data for table sajjad_osano.principal_pics: ~0 rows (approximately)
REPLACE INTO `principal_pics` (`id`, `principal_id`, `parent_pic_id`, `image`, `name`, `email`, `phone`, `description`, `created_at`, `updated_at`) VALUES
	('00d125b6-81ba-4f70-8671-b7de850cd243', '27c7e685-d07d-4ed8-a345-dcf074911b9e', NULL, 'principals/pics/rLswFkjimjHYaqCuhPk4yvFDA2me78mksymeqfCB.jpg', 'Mr Syakhrukan', 'syahrukan@ipc.com', '12387123722', NULL, '2025-03-18 17:41:21', '2025-03-18 17:41:21');

-- Dumping data for table sajjad_osano.products: ~0 rows (approximately)
REPLACE INTO `products` (`id`, `image`, `code`, `name`, `slug`, `height`, `width`, `description`, `unit_id`, `price_per_unit`, `product_type_id`, `created_at`, `updated_at`) VALUES
	('c16b94fd-04cf-4f2b-9fa5-8ddb83c48e8b', 'products/dOIgBgCy7XqHd0s2WEkTcvzWSDrk9hIzLulInUkj.png', 'CIRN/001/SJZ/III/2025', 'Karpet Iran Rashfur', 'karpet-iran-rashfur', 72, 282, NULL, '7013fd9c-4a56-47a0-bc77-f4dbb8de48e0', 167222.00, '075ffe05-571f-499a-8887-95ab03268cc1', '2025-03-18 06:57:31', '2025-03-18 07:41:53');

-- Dumping data for table sajjad_osano.product_types: ~2 rows (approximately)
REPLACE INTO `product_types` (`id`, `code`, `name`, `image`, `type`, `created_at`, `updated_at`) VALUES
	('075ffe05-571f-499a-8887-95ab03268cc1', 'CIRN', 'Karpet Iran', NULL, 'meteran', '2025-03-18 06:44:28', '2025-03-18 06:44:28'),
	('9587e619-2f07-44c3-8d62-6412552ff088', 'SJTURK', 'Sajadah Turki', 'product_types/LsjFvA6uoZllKnVV0tkZsGBMmGQhoQ4GPDGuHcd0.jpg', 'satuan', '2025-03-18 07:38:36', '2025-03-18 07:38:36');

-- Dumping data for table sajjad_osano.stores: ~2 rows (approximately)
REPLACE INTO `stores` (`id`, `image`, `name`, `email`, `phone`, `fax`, `description`, `address`, `city`, `postal_code`, `created_at`, `updated_at`) VALUES
	('a3d0d65f-f669-4084-ac43-f2b0d2655b8f', 'stores/74wjTXLbmd3I6CsXWhyJEep4j6IpoCT0kZXRfzxt.jpg', 'Toko Utama Tanah Abang', 'store@sajjadzamzami.com', '6289671052051', '2134212', NULL, 'Jl Tanah Abang, Blok Anu, RT 02/RW 02 No.21', 'JAKARTA PUSAT', 81721, '2025-03-18 15:38:12', '2025-03-18 15:40:25');

-- Dumping data for table sajjad_osano.units: ~2 rows (approximately)
REPLACE INTO `units` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
	('0d50d992-a8dc-4471-88ca-d15e13de9cfb', 'pieces', 'pcs', '2025-03-18 06:51:49', '2025-03-18 06:51:49'),
	('7013fd9c-4a56-47a0-bc77-f4dbb8de48e0', 'Meter', 'm', '2025-03-18 06:51:23', '2025-03-18 06:51:23'),
	('f790dbde-7602-42df-b76f-dcaa922e6872', 'centimeter', 'cm', '2025-03-18 06:51:36', '2025-03-18 06:51:36');

-- Dumping data for table sajjad_osano.warehouses: ~0 rows (approximately)
REPLACE INTO `warehouses` (`id`, `image`, `name`, `email`, `phone`, `fax`, `description`, `address`, `city`, `postal_code`, `created_at`, `updated_at`) VALUES
	('c7b783a7-728a-44a6-bfc3-2557c9097fea', 'warehouses/3IwNhx0wErL3Tu0Xm5iLjKRZ4kxL6LNO3UrZ6NCl.jpg', 'Gudang Cirebon', 'wh.cirebon@sajjadzamzami.com', '0871263721', '87123621', NULL, 'Jl Cirebon Kesana, kemari dan tertawa. RT 02/RW 04, no. 21', 'CIREBON', 412322, '2025-03-18 15:24:03', '2025-03-18 15:31:58');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
