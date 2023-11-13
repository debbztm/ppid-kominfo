-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 08, 2023 at 03:16 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppid_kominfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_templates`
--

CREATE TABLE `custom_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo_header_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topbar_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_templates`
--

INSERT INTO `custom_templates` (`id`, `logo_header_color`, `topbar_color`, `sidebar_color`, `bg_color`, `created_at`, `updated_at`) VALUES
(1, 'dark2', 'dark2', 'dark2', 'dark', '2023-10-25 23:52:13', '2023-11-02 19:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE `halls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`id`, `name`, `seo`, `image`, `profile`, `phone`, `email`, `whatsapp`, `created_at`, `updated_at`) VALUES
(1, 'Cabang Dinas ESDM Wilayah Solo', 'cabang-dinas-esdm-wilayah-solo', 'assets/hall/LbNsjyiDoKemuExqDaHXLAJWwc8U03eB5PHA5nPD.jpg', '<p style=\"text-align: center; margin-bottom: 1rem; line-height: 1.8; color: rgb(78, 78, 78); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(247, 247, 247);\"><span style=\"font-size: 24px;\"><b>CABANG DINAS ENERGI DAN SUMBER DAYA MINERAL </b></span></p><p style=\"text-align: center; margin-bottom: 1rem; line-height: 1.8; color: rgb(78, 78, 78); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(247, 247, 247);\"><span style=\"font-size: 24px;\"><b>WILAYAH SOLO</b></span></p><p style=\"text-align: justify; margin-bottom: 1rem; line-height: 1.8; color: rgb(78, 78, 78); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(247, 247, 247);\">Berdasarkan&nbsp;<span>Peraturan Gubernur No. 28 tahun 2018</span>&nbsp;tentang Organisasi dan Tata Kerja Cabang Dinas pada Dinas ESDM Provinsi Jawa Tengah,&nbsp;<span lang=\"IN\">Cabang Dinas Energi dan Sumber Daya Mineral Wilayah Solo mempunyai tugas&nbsp;</span>membantu Kepala Dinas dalam melaksanakan sebagian tugas dinas di bidang energi dan sumber daya mineral di wilayah kerjanya.</p><p style=\"text-align: justify; margin-bottom: 1rem; line-height: 1.8; color: rgb(78, 78, 78); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(247, 247, 247);\"><span style=\"font-weight: bolder;\">Wilayah Kerja Cabang Dinas ESDM Wilayah Solo :</span><span style=\"font-weight: bolder;\">&nbsp;</span></p><p style=\"text-align: justify; margin-bottom: 1rem; line-height: 1.8; color: rgb(78, 78, 78); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(247, 247, 247);\">1. Kota Surakarta</p><p style=\"text-align: justify; margin-bottom: 1rem; line-height: 1.8; color: rgb(78, 78, 78); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(247, 247, 247);\">2. Kabupaten Karanganyar</p><p style=\"text-align: justify; margin-bottom: 1rem; line-height: 1.8; color: rgb(78, 78, 78); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(247, 247, 247);\">3. Kabupaten Sragen</p><p style=\"text-align: justify; margin-bottom: 1rem; line-height: 1.8; color: rgb(78, 78, 78); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(247, 247, 247);\"><b>Dalam pelaksanaan tugas, Cabang Dinas Energi dan Sumber Daya Mineral&nbsp;Wilayah Solo mempunyai fungsi:</b><br></p><ol style=\"margin-bottom: 1rem; padding-left: 2rem; color: rgb(78, 78, 78); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(247, 247, 247);\"><li style=\"text-align: justify;\"><span>Penyusunan rencana teknis operasional sub-urusan bidang energi dan sumber daya mineral;</span></li><li style=\"text-align: justify; \"><span>Koordinasi dan pelayanan teknis operasional sub-urusan bidang energi dan sumber daya mineral;</span></li><li style=\"text-align: justify;\"><span>Evaluasi dan pelaporan di bidang pengendalian pelaksanaan sub-urusan bidang energi dan sumber daya mineral;</span></li><li style=\"text-align: justify;\"><span>Pengelolaan ketatausahaan; dan</span></li><li style=\"text-align: justify;\"><span>Pelaksanaan tugas lain yang diberikan Kepala Dinas sesuai tugas dan fungsinya.</span></li></ol><p style=\"text-align: justify; margin-bottom: 1rem; line-height: 1.8; color: rgb(78, 78, 78); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(247, 247, 247);\"><span><b>Cabang Dinas Energi dan Sumber Daya Mineral&nbsp;Wilayah Solo terdiri dari:</b></span></p><ul style=\"margin-bottom: 1rem; padding-left: 2rem; color: rgb(78, 78, 78); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(247, 247, 247);\"><li style=\"text-align: justify;\"><span>Kepala Cabang Dinas : Abdul Charis, S.H., M.H.</span></li><li style=\"text-align: justify;\"><span>Subbagian Tata Usaha : Dhona Safitri, S.Sos</span></li><li style=\"text-align: justify;\"><span>Seksi Geologi, Mineral dan Batubara : Agus Dwi Ibnu Wibowo,S.T.,M.T.&nbsp;</span></li><li style=\"text-align: justify;\"><span>Seksi Energi : Taufan Riza Pahlevi, S.T.</span></li></ul><p style=\"text-align: justify; margin-bottom: 1rem; line-height: 1.8; color: rgb(78, 78, 78); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(247, 247, 247);\"><b><span style=\"font-size: 14px;\">Cabang Dinas ESDM Wilayah Solo terletak di Jl Balekambang Lor No 3, Kel. Manahan, Kec. Banjarsari, Kota Surakarta, 57139.</span></b></p><p></p>', '0271738280', 'besdm.solo@gmail.com', '089503262635', '2023-10-27 00:57:09', '2023-10-27 01:14:12');

-- --------------------------------------------------------

--
-- Table structure for table `infographics`
--

CREATE TABLE `infographics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `infographics`
--

INSERT INTO `infographics` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'assets/infographic/RYZC7uIFlbIyrnr31RPitFii2vx0r4KKlpZ1pQkg.jpg', '2023-10-30 01:17:05', '2023-10-30 01:17:05'),
(2, 'assets/infographic/Lwf7LEgDQ2IQShAnpHXGwUnWTEp69OVYDTdEnWhY.jpg', '2023-10-30 01:20:50', '2023-10-30 01:20:50'),
(5, 'assets/infographic/SnyT6PJ8MFGdNaaLFoxwXFEBRMGTgsZgCFCRJYSU.png', '2023-10-30 01:29:55', '2023-10-30 01:29:55'),
(6, 'assets/infographic/R2sXueKDyZUu1I9gCPVfFPkMH2vYHImuXY8x85CK.png', '2023-10-30 01:34:44', '2023-10-30 01:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `lhkpns`
--

CREATE TABLE `lhkpns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ma_agendas`
--

CREATE TABLE `ma_agendas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` date NOT NULL,
  `hour` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ma_agendas`
--

INSERT INTO `ma_agendas` (`id`, `title`, `seo`, `description`, `username`, `time`, `hour`, `place`, `created_at`, `updated_at`) VALUES
(1, 'Bimbingan Teknis Pemanfaatan Media Sosial Dalam Pengembangan Produk Usaha Masyarakat Desa', 'bimbingan-teknis-pemanfaatan-media-sosial-dalam-pengembangan-produk-usaha-masyarakat-desa', '<p>Dalam Rangka&nbsp; Pelaksanaan Desa Dampingan Dinas Energi dan Sumber Daya\r\n Mineral Provinsi Jawa Tengah Tahun 2023 . Untuk meningkatkan \r\nkesejahteraan masyarakat Desa Karangcegak, Kecamatan Kutasari, Kabupaten\r\n Purbalingga</p><p>Kegiatan dihadiri Kepala Cabang Dinas ESDM Wilayah \r\nSerayu Tengah, Camat Kutasari, Kepala Desa Karangcegak serta warga \r\nmasyarakat Desa Karangcegak peserta bimtek sebanyak 20 orang peserta<br><br>Narasumber\r\n dari Dinas Koperasi dan UMKM Kabupaten Purbalingga Sdr. Rafika Adi \r\nHafara S.Pd.,&nbsp; Dari Desa Karangcegak Sdr. Eko Rastono dan Pendamping \r\nUMKM Kecamatan Kutasari Sdri. Shulasi Dengan Moderator Ibu Ambar.<br></p><p></p>', 'admin', '2023-10-31', '9:27 AM', 'Aula Kantor Desa Karangcegak', '2023-10-31 01:45:25', '2023-10-31 01:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `ma_categories`
--

CREATE TABLE `ma_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `save_date` datetime NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ma_contacts`
--

CREATE TABLE `ma_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip_address` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ma_downloads`
--

CREATE TABLE `ma_downloads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ma_downloads`
--

INSERT INTO `ma_downloads` (`id`, `title`, `description`, `file`, `created_at`, `updated_at`) VALUES
(1, 'testing oke di testing', 'testing aja<br>', 'assets/download/ynnUZcVTpuazVhnqpXf3z7XJjxT1Omp4nYEKTANV.png', '2023-11-01 00:51:56', '2023-11-01 00:52:29'),
(2, 'asdasdsa', 'asdasdasd', 'assets/download/s5Jwr8VbXHac6Cf4w1QJ5c5LwgaOZ7gfkqTEcHee.png', '2023-11-01 00:52:59', '2023-11-01 00:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `ma_galleries`
--

CREATE TABLE `ma_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ma_galleries`
--

INSERT INTO `ma_galleries` (`id`, `title`, `seo`, `created_at`, `updated_at`) VALUES
(1, 'Rapat Koordinasi pengendalian dan Pelaksanaan Kegiatan APBD tahun 2023', 'rapat-koordinasi-pengendalian-dan-pelaksanaan-kegiatan-apbd-tahun-2023', '2023-10-30 19:18:36', '2023-10-30 19:18:36'),
(4, 'Rapat Uji Konsekuensi dan Penyusunan Daftar Informasi Publik Tahun 2023', 'rapat-uji-konsekuensi-dan-penyusunan-daftar-informasi-publik-tahun-2023', '2023-10-30 23:40:00', '2023-10-30 23:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `ma_hall_menus`
--

CREATE TABLE `ma_hall_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hall_id` bigint(20) UNSIGNED DEFAULT NULL,
  `menu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ma_hall_menus`
--

INSERT INTO `ma_hall_menus` (`id`, `hall_id`, `menu`, `information`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Informasi Ketenaga Listrikan', NULL, '2023-10-26 02:06:09', '2023-10-26 02:06:09'),
(2, NULL, 'Informasi Geologi Mineral dan Batubara', NULL, '2023-10-26 02:06:09', '2023-10-26 02:06:09'),
(3, NULL, 'Informasi Bagian Tata Usaha', NULL, '2023-10-26 02:06:09', '2023-10-26 02:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `ma_image_galleries`
--

CREATE TABLE `ma_image_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_gallery_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ma_image_galleries`
--

INSERT INTO `ma_image_galleries` (`id`, `ma_gallery_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'assets/imagegallery/AQxNBCi2IVPdmddcwosNp8sOVXIm1Du4epKWEmgl.jpg', '2023-10-30 23:35:39', '2023-10-30 23:35:39'),
(4, 4, 'assets/imagegallery/BQ4nq5ram4LiiuBoos48r33laTkKVxJOKqXRJWjx.png', '2023-10-30 23:47:45', '2023-10-30 23:47:45'),
(5, 4, 'assets/imagegallery/VoD4RI2haSg1ug583PHLKdlBYznXPhw4Kvq24ufQ.png', '2023-10-30 23:51:01', '2023-10-30 23:51:01');

-- --------------------------------------------------------

--
-- Table structure for table `ma_links`
--

CREATE TABLE `ma_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ma_links`
--

INSERT INTO `ma_links` (`id`, `title`, `url`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Kementerian ESDM RI asdasd', 'www.esdm.go.id/', 'assets/link/iWcfIz4aqSy3xRGx3M1sHADC1zSWkpkhklh41aNC.png', '2023-11-02 01:00:54', '2023-11-02 01:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `ma_main_regulations`
--

CREATE TABLE `ma_main_regulations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_regulation_category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ma_official_ppid_profiles`
--

CREATE TABLE `ma_official_ppid_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title2` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ma_official_ppid_profiles`
--

INSERT INTO `ma_official_ppid_profiles` (`id`, `title1`, `title2`, `image`, `created_at`, `updated_at`) VALUES
(1, 'TIM PERTIMBANGAN', 'PPID Pelaksana ESDM Jateng', 'assets/officialppidprofile/txy8317DsJsasvaTqQMMLOz1y3x5gEPGaONXLBZN.jpg', '2023-10-30 18:51:17', '2023-10-30 18:51:17');

-- --------------------------------------------------------

--
-- Table structure for table `ma_official_profiles`
--

CREATE TABLE `ma_official_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `work_unit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ma_official_profile_lists`
--

CREATE TABLE `ma_official_profile_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_official_profile_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diklat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lhkpn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ma_options`
--

CREATE TABLE `ma_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ma_pollings`
--

CREATE TABLE `ma_pollings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vote1` int(11) NOT NULL,
  `vote2` int(11) NOT NULL,
  `vote3` int(11) NOT NULL,
  `vote4` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ma_posts`
--

CREATE TABLE `ma_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hall_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ma_hall_menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hall_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_post` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_hall` int(11) DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_publish` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `type` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ma_posts`
--

INSERT INTO `ma_posts` (`id`, `hall_id`, `ma_hall_menu_id`, `hall_menu`, `title`, `seo`, `description`, `image`, `link`, `tag_post`, `day`, `date`, `is_hall`, `username`, `phone`, `is_publish`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '', 'testing', 'testing', 'uji coba lagi<br>', 'assets/news/MyWK0eSKDML47w2ffe6kd7C3Vq8CEOvca62uaIwR.png', 'asdsad', 'asdasd,jajal ,gajelas memang', 'Senin', '2023-10-30 01:54:21', NULL, 'admin', 'asda', 'Y', '1', '2023-10-30 01:54:21', '2023-10-29 19:29:24'),
(3, 1, 1, '', 'asdasd', 'asdasd', '<p>halah abot banget iki<br></p>', 'assets/news/IUxAL23BxDwFqKs2QE4g9k2OPhISs59um48T78xj.png', 'asdasd', 'ange ,asda,oke', 'Senin', '2023-10-30 02:38:26', NULL, 'admin', 'asdasd', 'Y', '1', '2023-10-30 02:38:26', '2023-10-31 21:30:12'),
(6, 1, 3, '', 'asdasdcasdasdasdasdasd', 'asdasdcasdasdasdasdasd', 'asdasd', 'assets/news/0bjO4WqE2ICus5YeoRtSxcQrhdIqQxlmVaLmesZP.png', 'asdasd', 'sdasasd', 'Rabu', '2023-11-01 04:44:45', NULL, 'admin', 'asdasd', 'Y', '1', '2023-11-01 04:44:45', '2023-11-02 22:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `ma_profiles`
--

CREATE TABLE `ma_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ma_regulations`
--

CREATE TABLE `ma_regulations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_url` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ma_regulations`
--

INSERT INTO `ma_regulations` (`id`, `title`, `seo`, `url`, `is_url`, `created_at`, `updated_at`) VALUES
(3, 'neww', 'neww', NULL, '0', '2023-11-01 21:15:25', '2023-11-01 21:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `ma_regulation_categories`
--

CREATE TABLE `ma_regulation_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ma_regulation_files`
--

CREATE TABLE `ma_regulation_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_regulation_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ma_regulation_files`
--

INSERT INTO `ma_regulation_files` (`id`, `ma_regulation_id`, `title`, `description`, `file`, `created_at`, `updated_at`) VALUES
(4, 3, 'asdsa oki', 'asdsad', 'assets/regulationfile/ibtIHmtV7tl88Y6TdkidJjIatFY9rkfZNFMdOiwR.png', '2023-11-01 21:16:41', '2023-11-01 21:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `ma_settings`
--

CREATE TABLE `ma_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `web_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_tag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_tag` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `web_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maps_location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `web_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application` int(11) DEFAULT NULL,
  `granted` int(11) DEFAULT NULL,
  `rejected` int(11) DEFAULT NULL,
  `objected` int(11) DEFAULT NULL,
  `ikm` int(11) DEFAULT NULL,
  `is_online` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ma_slides`
--

CREATE TABLE `ma_slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_publish` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ma_slides`
--

INSERT INTO `ma_slides` (`id`, `order`, `title`, `image`, `link`, `is_publish`, `created_at`, `updated_at`) VALUES
(1, 2, 'test', 'assets/slide/cU32Nu6ysjZwSQv0GNiaiaOBqxXOCWALWxrdaRnp.png', 'asdad', 'Y', '2023-10-24 22:00:49', '2023-10-29 19:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `ma_videos`
--

CREATE TABLE `ma_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ma_videos`
--

INSERT INTO `ma_videos` (`id`, `title`, `link`, `created_at`, `updated_at`) VALUES
(1, 'SILATURAHMI DAN MOHON DIRI GUBERNUR DAN WAKIL GUBERNUR PROV. JATENG 2018 - 2023', '9ViVh3uKXNI', '2023-10-31 00:17:30', '2023-10-31 00:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_19_063944_create_roles_table', 1),
(6, '2023_10_19_064441_create_halls_table', 1),
(7, '2023_10_19_064916_add_columns_to_users', 1),
(8, '2023_10_19_071819_create_contacts_table', 1),
(9, '2023_10_19_072337_create_infographics_table', 1),
(10, '2023_10_19_072843_create_ma_agendas_table', 1),
(11, '2023_10_19_073245_create_ma_contacts_table', 1),
(12, '2023_10_19_073711_create_ma_downloads_table', 1),
(13, '2023_10_19_073857_create_ma_galleries_table', 1),
(14, '2023_10_19_074059_create_ma_image_galleries_table', 1),
(15, '2023_10_19_074511_create_ma_categories_table', 1),
(16, '2023_10_19_075020_create_ma_regulation_categories', 1),
(17, '2023_10_19_075312_create_ma_lhkpns_table', 1),
(18, '2023_10_19_075422_create_ma_links_table', 1),
(19, '2023_10_19_075619_create_ma_hall_menus_table', 1),
(20, '2023_10_19_075853_create_ma_options_table', 1),
(21, '2023_10_19_080353_create_ma_main_regulations_table', 1),
(22, '2023_10_19_080710_create_ma_pollings_table', 1),
(23, '2023_10_19_081845_create_ma_posts_table', 1),
(24, '2023_10_19_083135_create_ma_profiles_table', 1),
(25, '2023_10_19_083330_create_ma_official_profiles_table', 1),
(26, '2023_10_19_083440_create_ma_official_profile_lists_table', 1),
(27, '2023_10_19_083558_create_ma_official_ppid_profiles_table', 1),
(28, '2023_10_19_083713_create_ma_regulations_table', 1),
(29, '2023_10_19_083726_create_ma_regulation_files_table', 1),
(30, '2023_10_19_084040_create_ma_settings_table', 1),
(31, '2023_10_19_084255_create_ma_slides_table', 1),
(32, '2023_10_19_084258_create_ma_videos_table', 1),
(33, '2023_10_19_084302_create_pages_table', 1),
(34, '2023_10_19_084308_create_portal_datas_table', 1),
(35, '2023_10_23_015042_create_custom_templates_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_publish` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `category`, `title`, `seo`, `description`, `image`, `url`, `type`, `username`, `is_publish`, `created_at`, `updated_at`) VALUES
(1, 'homeanggaran', 'Realisasi APBD', NULL, 'Laporan Perkembangan Pelaksanaan Kegiatan APBD Provinsi Jawa Tengah Dinas ESDM Provinsi Jawa Tengah', NULL, 'drive.google.com/file/d/1bttlUIUfZn4kb69znvUJH2zoH9at_0SM/view?usp=sharing', NULL, NULL, 'Y', '2023-10-29 23:18:31', '2023-10-29 23:23:29'),
(2, 'homeanggaran', 'Ringkasan RKO', NULL, 'Rencana Kerja Operasional Pelaksanaan APBD Dinas Energi Dan Sumber Daya Mineral Provinsi Jawa Tengah', NULL, 'drive.google.com/file/d/1puSwUYMfp30BTmRsc_UcpHhm_l9CriJB/view', NULL, NULL, 'Y', '2023-10-29 23:24:12', '2023-10-29 23:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portal_datas`
--

CREATE TABLE `portal_datas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portal_datas`
--

INSERT INTO `portal_datas` (`id`, `title`, `url`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Open Data Dinas ESDM', 'https://data.jatengprov.go.id/organization/dinas-energi-dan-sumber-daya-mineral-provinsi-jawa-tengah', 'N', '2023-10-30 02:02:53', '2023-10-30 02:03:19'),
(2, 'Ina One Map', 'http://tanahair.indonesia.go.id/portal-web', 'Y', '2023-10-30 02:04:14', '2023-10-30 02:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` enum('ADMIN','USER') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USER',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', '2023-10-24 01:43:51', '2023-10-24 01:43:51'),
(2, 'USER', '2023-10-24 01:43:51', '2023-10-24 01:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hall_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email_verified_at`, `password`, `hall_id`, `role_id`, `last_login`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, '$2y$10$uTGazv/Ug9AmAzXMg1ZuGetX1hN0bQTDBVtIoIOCWwkKF1pd1GZa6', NULL, 1, '2023-11-07 00:44:02', 'Y', NULL, '2023-10-24 01:43:53', '2023-11-07 00:44:02'),
(2, 'admin2 oke oke', 'admin2', NULL, '$2y$10$suEg5MharXTkU1b/5usFHOXBe7sTzeKA.yjRfkTiFKrvmSZf5cV6G', NULL, 2, '2023-11-03 02:57:45', 'Y', NULL, '2023-10-24 01:46:21', '2023-11-02 20:12:55'),
(3, 'user', 'user', NULL, '$2y$10$yigeE5nUtokVQAH7Bv0TgOiG4dagSm2iZ2KFqhpbWIIZU67OHKWoa', NULL, 2, '2023-10-24 08:46:45', 'N', NULL, '2023-10-24 01:46:45', '2023-10-24 01:46:45'),
(4, 'asd', 'asd', NULL, '$2y$10$P4nlfVz.MR2t8A14zuyCgOQ3/j/vWd5qDu0OpxUZiKziHhBWx1wsO', NULL, 2, '2023-10-24 08:47:11', 'N', NULL, '2023-10-24 01:47:11', '2023-10-24 01:47:11'),
(5, 'asd1', 'asdasd', NULL, '$2y$10$2CQUeUq1DrG.rhxiEBOQ7eyiepnze.5/2utO4f4E10DtHLU5v7cHO', NULL, 2, '2023-10-24 08:48:01', 'N', NULL, '2023-10-24 01:48:01', '2023-10-24 01:48:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_templates`
--
ALTER TABLE `custom_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infographics`
--
ALTER TABLE `infographics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lhkpns`
--
ALTER TABLE `lhkpns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ma_agendas`
--
ALTER TABLE `ma_agendas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ma_categories`
--
ALTER TABLE `ma_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `ma_contacts`
--
ALTER TABLE `ma_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ma_downloads`
--
ALTER TABLE `ma_downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ma_galleries`
--
ALTER TABLE `ma_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ma_hall_menus`
--
ALTER TABLE `ma_hall_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_hall_menus_hall_id_foreign` (`hall_id`);

--
-- Indexes for table `ma_image_galleries`
--
ALTER TABLE `ma_image_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_image_galleries_ma_gallery_id_foreign` (`ma_gallery_id`);

--
-- Indexes for table `ma_links`
--
ALTER TABLE `ma_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ma_main_regulations`
--
ALTER TABLE `ma_main_regulations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_main_regulations_ma_regulation_category_id_foreign` (`ma_regulation_category_id`);

--
-- Indexes for table `ma_official_ppid_profiles`
--
ALTER TABLE `ma_official_ppid_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ma_official_profiles`
--
ALTER TABLE `ma_official_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ma_official_profile_lists`
--
ALTER TABLE `ma_official_profile_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_official_profile_lists_ma_official_profile_id_foreign` (`ma_official_profile_id`);

--
-- Indexes for table `ma_options`
--
ALTER TABLE `ma_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ma_pollings`
--
ALTER TABLE `ma_pollings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ma_posts`
--
ALTER TABLE `ma_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_posts_hall_id_foreign` (`hall_id`),
  ADD KEY `ma_posts_ma_hall_menu_id_foreign` (`ma_hall_menu_id`);

--
-- Indexes for table `ma_profiles`
--
ALTER TABLE `ma_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ma_regulations`
--
ALTER TABLE `ma_regulations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ma_regulation_categories`
--
ALTER TABLE `ma_regulation_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ma_regulation_files`
--
ALTER TABLE `ma_regulation_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_regulation_files_ma_regulation_id_foreign` (`ma_regulation_id`);

--
-- Indexes for table `ma_settings`
--
ALTER TABLE `ma_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ma_slides`
--
ALTER TABLE `ma_slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ma_videos`
--
ALTER TABLE `ma_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `portal_datas`
--
ALTER TABLE `portal_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_hall_id_foreign` (`hall_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_templates`
--
ALTER TABLE `custom_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `infographics`
--
ALTER TABLE `infographics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lhkpns`
--
ALTER TABLE `lhkpns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ma_agendas`
--
ALTER TABLE `ma_agendas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ma_categories`
--
ALTER TABLE `ma_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ma_contacts`
--
ALTER TABLE `ma_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ma_downloads`
--
ALTER TABLE `ma_downloads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ma_galleries`
--
ALTER TABLE `ma_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ma_hall_menus`
--
ALTER TABLE `ma_hall_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ma_image_galleries`
--
ALTER TABLE `ma_image_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ma_links`
--
ALTER TABLE `ma_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ma_main_regulations`
--
ALTER TABLE `ma_main_regulations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ma_official_ppid_profiles`
--
ALTER TABLE `ma_official_ppid_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ma_official_profiles`
--
ALTER TABLE `ma_official_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ma_official_profile_lists`
--
ALTER TABLE `ma_official_profile_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ma_options`
--
ALTER TABLE `ma_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ma_pollings`
--
ALTER TABLE `ma_pollings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ma_posts`
--
ALTER TABLE `ma_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ma_profiles`
--
ALTER TABLE `ma_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ma_regulations`
--
ALTER TABLE `ma_regulations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ma_regulation_categories`
--
ALTER TABLE `ma_regulation_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ma_regulation_files`
--
ALTER TABLE `ma_regulation_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ma_settings`
--
ALTER TABLE `ma_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ma_slides`
--
ALTER TABLE `ma_slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ma_videos`
--
ALTER TABLE `ma_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portal_datas`
--
ALTER TABLE `portal_datas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ma_categories`
--
ALTER TABLE `ma_categories`
  ADD CONSTRAINT `ma_categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ma_hall_menus`
--
ALTER TABLE `ma_hall_menus`
  ADD CONSTRAINT `ma_hall_menus_hall_id_foreign` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ma_image_galleries`
--
ALTER TABLE `ma_image_galleries`
  ADD CONSTRAINT `ma_image_galleries_ma_gallery_id_foreign` FOREIGN KEY (`ma_gallery_id`) REFERENCES `ma_galleries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ma_main_regulations`
--
ALTER TABLE `ma_main_regulations`
  ADD CONSTRAINT `ma_main_regulations_ma_regulation_category_id_foreign` FOREIGN KEY (`ma_regulation_category_id`) REFERENCES `ma_regulation_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ma_official_profile_lists`
--
ALTER TABLE `ma_official_profile_lists`
  ADD CONSTRAINT `ma_official_profile_lists_ma_official_profile_id_foreign` FOREIGN KEY (`ma_official_profile_id`) REFERENCES `ma_official_profiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ma_posts`
--
ALTER TABLE `ma_posts`
  ADD CONSTRAINT `ma_posts_hall_id_foreign` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ma_posts_ma_hall_menu_id_foreign` FOREIGN KEY (`ma_hall_menu_id`) REFERENCES `ma_hall_menus` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ma_regulation_files`
--
ALTER TABLE `ma_regulation_files`
  ADD CONSTRAINT `ma_regulation_files_ma_regulation_id_foreign` FOREIGN KEY (`ma_regulation_id`) REFERENCES `ma_regulations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_hall_id_foreign` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
