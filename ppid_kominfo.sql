-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2023 at 08:04 AM
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
(1, 'Cabang Dinas ESDM Wilayah Solo', 'cabang-dinas-esdm-wilayah-solo', 'assets/hall/aUCSXcpdPhdwYW51mvSPpd66vICEpiCOOFCDDaZF.jpg', '<p style=\"text-align: center; margin-bottom: 1rem; line-height: 1.8; color: rgb(78, 78, 78); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(247, 247, 247);\"><span style=\"font-size: 24px;\"><b>CABANG DINAS ENERGI DAN SUMBER DAYA MINERAL </b></span></p><p style=\"text-align: center; margin-bottom: 1rem; line-height: 1.8; color: rgb(78, 78, 78); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(247, 247, 247);\"><span style=\"font-size: 24px;\"><b>WILAYAH SOLO</b></span></p><p style=\"text-align: justify; margin-bottom: 1rem; line-height: 1.8; color: rgb(78, 78, 78); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(247, 247, 247);\">Berdasarkan&nbsp;<span>Peraturan Gubernur No. 28 tahun 2018</span>&nbsp;tentang Organisasi dan Tata Kerja Cabang Dinas pada Dinas ESDM Provinsi Jawa Tengah,&nbsp;<span lang=\"IN\">Cabang Dinas Energi dan Sumber Daya Mineral Wilayah Solo mempunyai tugas&nbsp;</span>membantu Kepala Dinas dalam melaksanakan sebagian tugas dinas di bidang energi dan sumber daya mineral di wilayah kerjanya.</p><p style=\"text-align: justify; margin-bottom: 1rem; line-height: 1.8; color: rgb(78, 78, 78); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(247, 247, 247);\"><span style=\"font-weight: bolder;\">Wilayah Kerja Cabang Dinas ESDM Wilayah Solo :</span><span style=\"font-weight: bolder;\">&nbsp;</span></p><p style=\"text-align: justify; margin-bottom: 1rem; line-height: 1.8; color: rgb(78, 78, 78); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(247, 247, 247);\">1. Kota Surakarta</p><p style=\"text-align: justify; margin-bottom: 1rem; line-height: 1.8; color: rgb(78, 78, 78); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(247, 247, 247);\">2. Kabupaten Karanganyar</p><p style=\"text-align: justify; margin-bottom: 1rem; line-height: 1.8; color: rgb(78, 78, 78); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(247, 247, 247);\">3. Kabupaten Sragen</p><p style=\"text-align: justify; margin-bottom: 1rem; line-height: 1.8; color: rgb(78, 78, 78); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(247, 247, 247);\"><b>Dalam pelaksanaan tugas, Cabang Dinas Energi dan Sumber Daya Mineral&nbsp;Wilayah Solo mempunyai fungsi:</b><br></p><ol style=\"margin-bottom: 1rem; padding-left: 2rem; color: rgb(78, 78, 78); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(247, 247, 247);\"><li style=\"text-align: justify;\"><span>Penyusunan rencana teknis operasional sub-urusan bidang energi dan sumber daya mineral;</span></li><li style=\"text-align: justify; \"><span>Koordinasi dan pelayanan teknis operasional sub-urusan bidang energi dan sumber daya mineral;</span></li><li style=\"text-align: justify;\"><span>Evaluasi dan pelaporan di bidang pengendalian pelaksanaan sub-urusan bidang energi dan sumber daya mineral;</span></li><li style=\"text-align: justify;\"><span>Pengelolaan ketatausahaan; dan</span></li><li style=\"text-align: justify;\"><span>Pelaksanaan tugas lain yang diberikan Kepala Dinas sesuai tugas dan fungsinya.</span></li></ol><p style=\"text-align: justify; margin-bottom: 1rem; line-height: 1.8; color: rgb(78, 78, 78); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(247, 247, 247);\"><span><b>Cabang Dinas Energi dan Sumber Daya Mineral&nbsp;Wilayah Solo terdiri dari:</b></span></p><ul style=\"margin-bottom: 1rem; padding-left: 2rem; color: rgb(78, 78, 78); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(247, 247, 247);\"><li style=\"text-align: justify;\"><span>Kepala Cabang Dinas : Abdul Charis, S.H., M.H.</span></li><li style=\"text-align: justify;\"><span>Subbagian Tata Usaha : Dhona Safitri, S.Sos</span></li><li style=\"text-align: justify;\"><span>Seksi Geologi, Mineral dan Batubara : Agus Dwi Ibnu Wibowo,S.T.,M.T.&nbsp;</span></li><li style=\"text-align: justify;\"><span>Seksi Energi : Taufan Riza Pahlevi, S.T.</span></li></ul><p style=\"text-align: justify; margin-bottom: 1rem; line-height: 1.8; color: rgb(78, 78, 78); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(247, 247, 247);\"><b><span style=\"font-size: 14px;\">Cabang Dinas ESDM Wilayah Solo terletak di Jl Balekambang Lor No 3, Kel. Manahan, Kec. Banjarsari, Kota Surakarta, 57139.<br></span></b></p><p></p>', '02717382801', 'besdm.solo@gmail.com', '089503262635', '2023-10-27 00:57:09', '2023-11-25 23:50:03');

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
(7, 'assets/infographic/gXf5DTwWALCIz6qFzvF5aFOllW99O2uzEwoZNXW8.jpg', '2023-11-26 21:53:22', '2023-11-26 21:53:22'),
(8, 'assets/infographic/NzHw963fOOhO7k9ZBpyu2pFriZ0b3RXiTFEbOnlt.jpg', '2023-11-26 21:57:03', '2023-11-26 21:57:03'),
(9, 'assets/infographic/b5d4ltCsTxIIlMPVA0NffB1MaocHNLlDlNBP8fpK.jpg', '2023-11-26 21:57:08', '2023-11-26 21:57:08'),
(10, 'assets/infographic/WHXbIohx6muq1VAAVoRDrLKsD29llKPg9i1b8U1a.jpg', '2023-11-26 21:58:23', '2023-11-26 21:58:23'),
(11, 'assets/infographic/vkb7qsou5qdy0Urs3KCT151clsSpftNCP0LIAvff.jpg', '2023-11-26 21:59:03', '2023-11-26 21:59:03');

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
(1, 'Bimbingan Teknis Pemanfaatan Media Sosial Dalam Pengembangan Produk Usaha Masyarakat Desa', 'bimbingan-teknis-pemanfaatan-media-sosial-dalam-pengembangan-produk-usaha-masyarakat-desa', '<p>Dalam Rangka&nbsp; Pelaksanaan Desa Dampingan Dinas Energi dan Sumber Daya\r\n Mineral Provinsi Jawa Tengah Tahun 2023 . Untuk meningkatkan \r\nkesejahteraan masyarakat Desa Karangcegak, Kecamatan Kutasari, Kabupaten\r\n Purbalingga</p><p>Kegiatan dihadiri Kepala Cabang Dinas ESDM Wilayah \r\nSerayu Tengah, Camat Kutasari, Kepala Desa Karangcegak serta warga \r\nmasyarakat Desa Karangcegak peserta bimtek sebanyak 20 orang peserta<br><br>Narasumber\r\n dari Dinas Koperasi dan UMKM Kabupaten Purbalingga Sdr. Rafika Adi \r\nHafara S.Pd.,&nbsp; Dari Desa Karangcegak Sdr. Eko Rastono dan Pendamping \r\nUMKM Kecamatan Kutasari Sdri. Shulasi Dengan Moderator Ibu Ambar.<br></p><p></p>', 'admin', '2023-10-31', '9:27 AM', 'Aula Kantor Desa Karangcegak', '2023-10-31 01:45:25', '2023-10-31 01:45:25'),
(3, 'coba', 'coba', '<p>testing<br></p>', 'user', '2023-11-14', '1:50 PM', 'pati', '2023-11-25 23:50:46', '2023-11-25 23:50:46');

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

--
-- Dumping data for table `ma_contacts`
--

INSERT INTO `ma_contacts` (`id`, `name`, `email`, `message`, `time`, `ip_address`, `access_from`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Tika Nur Laili Latifah', 'admin.comp@ptecolaundry.com', 'Assalamu\'alaikum wr wb\r\nSelamat pagi,\r\n\r\nMohon infonya untuk pengajuan SLO Genset untuk perusahaan kami bagaimana prosedur nya:\r\nGenset merk Cummins Inc, Type MD 15 No seri FR 10401 tahun pembuatan 2015 kapasitas/daya 350 KVA', '2023-11-26 06:59:50', '103.145.31.50', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '02718200200', '2023-11-26 06:59:50', '2023-11-26 06:59:50');

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
(2, 'Peta Cekungan Air Tanah Kendal', 'Peta Cekungan Air Tanah Kendal', 'assets/download/K2awRwOBVQU8R1nRirsyhbC6CCP7jlWX7svOgnVL.pdf', '2023-11-01 00:52:59', '2023-11-26 23:45:17'),
(4, 'Data Sektoral 2022', 'Data Sektoral 2022', 'assets/download/P5NDdWBHVv1ZwexoGuGiiIa3E4aaTwIKTWvWtcb5.pdf', '2023-11-26 23:42:14', '2023-11-26 23:42:14'),
(5, 'Peta Cekungan Air Tanah Bumiayu', 'Peta Cekungan Air Tanah Bumiayu', 'assets/download/7VtHLs3pxmRSxhghmpsAFuHjba0h4bI1qMius50w.pdf', '2023-11-26 23:44:06', '2023-11-26 23:44:06');

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
(4, 'Rapat Uji Konsekuensi dan Penyusunan Daftar Informasi Publik Tahun 2023', 'rapat-uji-konsekuensi-dan-penyusunan-daftar-informasi-publik-tahun-2023', '2023-10-30 23:40:00', '2023-10-30 23:40:00'),
(6, 'HOME', 'home', '2023-11-26 21:03:42', '2023-11-26 21:03:42');

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
(5, 4, 'assets/imagegallery/VoD4RI2haSg1ug583PHLKdlBYznXPhw4Kvq24ufQ.png', '2023-10-30 23:51:01', '2023-10-30 23:51:01'),
(9, 6, 'assets/imagegallery/pvMMoW3kE5lwtTO2rgnT9Tdv4wxtQFLWUNbPw1tF.jpg', '2023-11-26 21:11:21', '2023-11-26 21:11:21'),
(10, 6, 'assets/imagegallery/xs4krzR9HYP0Tv9sGVZCwyMkDa7BZinljQMFCeEH.jpg', '2023-11-26 21:11:35', '2023-11-26 21:11:35'),
(11, 6, 'assets/imagegallery/MFbZV2pbbtBr8UBuaYny6EMS9qD5x4wSP57yh8gY.jpg', '2023-11-26 21:11:40', '2023-11-26 21:11:40'),
(12, 6, 'assets/imagegallery/sTIybvcf8ovdsw4rrhMgTZIpeOBvgIuoHht8cvbE.jpg', '2023-11-26 21:11:46', '2023-11-26 21:11:46'),
(13, 6, 'assets/imagegallery/tRlX8R3WiKnuqYQsTI5Y3aRQl0U2677i2yc5zK7p.jpg', '2023-11-26 21:11:51', '2023-11-26 21:11:51'),
(14, 6, 'assets/imagegallery/k1v0EFSuP5TZbj5ZlyL8jk76EdPJXhabuCoFRSdK.jpg', '2023-11-26 21:11:57', '2023-11-26 21:11:57');

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
(1, 'Kementerian ESDM RI asdasd', 'www.esdm.go.id/', 'assets/link/Z5JHX7wVG7ME8dq9pal0ceyuSYbg7zyDXKaLvt0s.png', '2023-11-02 01:00:54', '2023-11-26 20:26:53'),
(3, 'Pemerintah Provinsi Jawa Tengah', 'jatengprov.go.id', 'assets/link/JxLNKr6zhJlEmdGcPauaXfsl5eQD9GQh3NP3VoCc.png', '2023-11-26 20:27:12', '2023-11-26 20:27:12'),
(4, 'LPSE Provinsi Jawa Tengah', 'lpse.jatengprov.go.id', 'assets/link/lvX9yAW6WI2LU3YoYpDMBitpooP0NyAsvYJW7kQo.png', '2023-11-26 20:27:29', '2023-11-26 20:27:29'),
(5, 'BPS Provinsi Jawa Tengah', 'jateng.bps.go.id', 'assets/link/FdDHPSM95X5u9EI07QiC0vnJutyhfuVQgy35xOWd.png', '2023-11-26 20:27:47', '2023-11-26 20:27:47'),
(6, 'Tanggap Covid 19 Provinsi Jawa Tengah', 'corona.jatengprov.go.id', 'assets/link/oFy7IpMBiz5k2GfvwOLNbDbawWEU53e3ZAKbZ200.png', '2023-11-26 20:28:07', '2023-11-26 20:28:07'),
(7, 'Lapor Gub', 'www.laporgub.jatengprov.go.id/', 'assets/link/wx8rf31r9wTBZsXlY1ergRNCxmipVt1Pkq9kcAzn.png', '2023-11-26 20:28:31', '2023-11-26 20:28:31'),
(8, 'Open Data ESDM Provinsi Jawa Tengah', 'data.jatengprov.go.id/organization/dinas-energi-dan-sumber-daya-mineral-provinsi-jawa-tengah', 'assets/link/bhNNnUaVwtMYVY9tJkNVsvwyvNvwKXkhcySrYO8e.png', '2023-11-26 20:29:00', '2023-11-26 20:29:00'),
(9, 'PPID Provinsi Jawa Tengah', 'ppid.jatengprov.go.id/', 'assets/link/AGR95BxqtAepZgyl80CxblJxJ3Qzqhx2BxxrjwaM.png', '2023-11-26 20:29:20', '2023-11-26 20:29:20');

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
(1, 'TIM PERTIMBANGAN', 'PPID Pelaksana ESDM Jateng', 'assets/officialppidprofile/2g38MQkNdpOxBtlGaetBuC5RHTYgGsevc2voZhru.jpg', '2023-10-30 18:51:17', '2023-11-18 22:23:28'),
(3, 'ENDRO HUDIYONO, AP, SH, MM', 'PPID Pelaksana', 'assets/officialppidprofile/pARq9qSpMZ4ITCKU2jq7qOGzu2FCQIR9Xz0f3zmM.jpg', '2023-11-18 22:25:35', '2023-11-18 22:25:42'),
(4, 'BOEDYO DHARMAWAN, ST, MT', 'Atasan PPID Pelaksana', 'assets/officialppidprofile/pHYbO6WscRNebAu6ZxtpLJn41GscrERyU8pzyRMI.jpg', '2023-11-18 22:26:00', '2023-11-18 22:26:00');

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
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ma_options`
--

INSERT INTO `ma_options` (`id`, `title`, `seo`, `value`, `file`, `type`, `created_at`, `updated_at`) VALUES
(2, 'Profile', 'profile', '<p></p><p class=\"MsoNormal\"><span><br></span></p><p class=\"MsoNormal\">Selamat Datang di Website Dinas Energi dam Sumber Daya Mineral Provinsi Jawa Tengah</p><p class=\"MsoNormal\">Bismillahirrahmanirrahim</p><p class=\"MsoNormal\">Assalamu\'alaikum, Wr. Wb</p><p class=\"MsoNormal\"><br></p><p class=\"MsoNormal\">Pertama\r\n mari kita panjatkan puji syukur ke hadirat Allah SWT., Tuhan Yang Maha \r\nKuasa, karena berkat cucuran rahmat dan nikmat-Nya, Dinas Energi dan \r\nSumber Daya Mineral, sebagai salah satu Perangkat Daerah di Pemerintah \r\nProvinsi Jawa Tengah, masih bisa dan terus berupaya untuk eksis dalam \r\nmendukung terwujudnya visi dan misi&nbsp; Provinsi Jawa Tengah, yakni, \r\n“Mempercepat reformasi birokrasi serta memperluas sasaran ke Pemerintah \r\nKabupaten/Kota”, khususnya melalui transparansi dan keterbukaan \r\ninformasi publik.</p><p class=\"MsoNormal\"><br></p><p class=\"MsoNormal\">Kehadiran\r\n website ini memang dimaksudkan sebagai sarana publikasi untuk \r\nmemberikan informasi dan gambaran, bukan saja tentang Dinas Energi dan \r\nSumber Daya Mineral, tetapi juga mengenai kebijakan, program dan \r\nkegiatan Pemerintah Provinsi Jawa Tengah. Untuk itu, segenap masyarakat \r\ndan stakeholder di Jawa Tengah khususnya dapat memanfaatkan website ini \r\nguna memperoleh informasi seperti program dan kegiatan yang \r\ndilaksanakan.&nbsp;</p><p class=\"MsoNormal\"><br></p><p class=\"MsoNormal\">“Beri\r\n kami data dan seuntai kata, akan kami tulis dan kabarkan jadi berita”. \r\nItulah harapkan dan tekad seluruh pegawai di Dinas Energi dan Sumber \r\nDaya Mineral, khususnya rekan sejawat yang mengelola website ini, untuk \r\ntetap dan memberikan pelayanan terbaik dalam memenuhi hak-hak masyarakat\r\n akan informasi publik.</p><p class=\"MsoNormal\"><br></p><p class=\"MsoNormal\">“Tak\r\n ada gading yang tak retak, tak ada tebu yang tak beruas”, begitu kata \r\nsebuah ungkapan bijak. Untuk itu, kritik dan saran terhadap berbagai \r\nkekurangan yang ada sangat kami harapkan guna penyempurnaan website ini,\r\n sehingga bukan hanya kuantitas tetapi juga kualitasnya dapat kami \r\ntingkatkan.</p><p class=\"MsoNormal\"><br></p><p class=\"MsoNormal\">Terima\r\n kasih atas kunjungannya ke laman online Dinas Energi dan Sumber Daya \r\nMineral Provinsi Jawa Tengah ini. Semoga website ini memberikan manfaat \r\nbagi kita semua. Aamiin ya Rabbal Alamin.</p><p class=\"MsoNormal\"><br></p><p class=\"MsoNormal\">Kepala Dinas ESDM Provinsi Jawa Tengah</p><p class=\"MsoNormal\">Dr. Ir. SUJARWANTO DWIATMOKO, MSi</p><p class=\"MsoNormal\"><br></p><p class=\"MsoNormal\"><br></p><h4 style=\"color: rgb(0, 0, 0);\"><span style=\"font-weight: 700;\">CABANG DINAS/ UPT</span>&nbsp;:</h4><ol><li><a href=\"https://esdm.jatengprov.go.id/balai/profil/1/cabang-dinas-esdm-wilayah-solo\">&nbsp;Cabang Dinas ESDM Wilayah Solo</a></li><li><a href=\"https://esdm.jatengprov.go.id/balai/profil/2/cabang-dinas-esdm-wilayah-serayu-utara\">&nbsp;Cabang Dinas ESDM Wilayah&nbsp;Serayu Utara</a></li><li><a href=\"https://esdm.jatengprov.go.id/balai/profil/3/cabang-dinas-esdm-wilayah-serayu-selatan\">&nbsp;Cabang Dinas ESDM Wilayah Serayu Selatan</a></li><li><a href=\"https://esdm.jatengprov.go.id/balai/profil/11/cabang-dinas-esdm-wilayah-serayu-tengah\">&nbsp;Cabang Dinas ESDM Wilayah Serayu Tengah</a></li><li><a href=\"https://esdm.jatengprov.go.id/balai/profil/4/cabang-dinas-esdm-wilayah-ungaran-telomoyo\" style=\"background-color: rgb(255, 255, 255);\">&nbsp;Cabang Dinas ESDM Wilayah&nbsp;Ungaran Telomoyo</a><br></li><li><a href=\"https://esdm.jatengprov.go.id/balai/profil/5/cabang-dinas-esdm-wilayah-slamet-utara\">&nbsp;Cabang Dinas ESDM Wilayah&nbsp;Slamet Utara&nbsp;</a></li><li><a href=\"https://esdm.jatengprov.go.id/balai/profil/7/cabang-dinas-esdm-wilayah-slamet-selatan\">&nbsp;Cabang Dinas ESDM Wilayah Slamet Selatan</a></li><li><a href=\"https://esdm.jatengprov.go.id/balai/profil/6/cabang-dinas-esdm-wilayah-kendeng-muria\">&nbsp;Cabang Dinas ESDM Wilayah Kendeng Muria</a></li><li><a href=\"https://esdm.jatengprov.go.id/balai/profil/9/cabang-dinas-esdm-wilayah-kendeng-selatan\">&nbsp;Cabang Dinas ESDM Wilayah Kendeng Selatan</a></li><li><a href=\"https://esdm.jatengprov.go.id/balai/profil/8/cabang-dinas-esdm-wilayah-sewu-lawu\">&nbsp;Cabang Dinas ESDM Wilayah Sewu Lawu</a></li><li><a href=\"https://esdm.jatengprov.go.id/balai/profil/10/cabang-dinas-esdm-wilayah-merapi\">&nbsp;Cabang Dinas ESDM Wilayah&nbsp; Merapi</a></li><li><a href=\"https://esdm.jatengprov.go.id/balai/profil/12/cabang-dinas-esdm-wilayah-semarang-demak\">&nbsp;Cabang Dinas ESDM Wilayah Semarang - Demak</a></li><li><a href=\"https://esdm.jatengprov.go.id/balai/profil/13/upt-laboratorium-esdm\">&nbsp;UPT Laboratorium ESDM</a></li></ol>', NULL, 'profile', '2023-11-25 21:48:07', '2023-11-25 22:09:22'),
(3, 'Sejarah Dinas', 'sejarah-dinas', '<p class=\"MsoNormal\"><span><b><span>Sejarah\r\nDinas ESDM Provinsi Jawa Tengah Jawa Tengah</span></b></span></p><p class=\"MsoNormal\"><span>Dengan ditetapkan dan diundangkannya Peraturan Pemerintah\r\nNomor 37 Tahun 1986 tentang Penyerahan Sebagian Urusan Pemerintah di Bidang\r\nPertambangan Kepada Pemerintah Tingakat I, meliputi kebijaksanaan, mengatur,\r\nmengurus dan mengembangkan usaha pertambangan bahan galian golongan C sepanjang\r\ntidak terletak di lepas pantai dan atau dalam rangka PMA dan tugas pembantuan\r\ndi bidang Air Bawah Tanah (ABT).</span></p><p class=\"MsoNormal\"><span>Berdasarkan Surat Mentari Dalam Negeri tanggal 1 Januri\r\n1986 Nomor 061.1/11818/SJ perihal Pembentukan Dinas Pertambangan Daerah, Dewan\r\nPerwakilan Rakyat Daerah Tingkat I Jawa Tengah menetapkan Peraturan Daerah\r\nPropinsi Daerah Tingkat I Jawa Tengah Nomor 9 Tahun 1988 tentang Pembentukan\r\nOrganisasi dan Tata Kerja Dinas Pertambangan Propinsi Jawa Tengah. Seiring dengan\r\nperkembangan waktu, Dinas Pertambangan Propinsi Tingkat I Jawa Tengah sesuai\r\nPerda Prov. jateng No. 1 tahun 2002 berubah nama menjadi Dinas Pertambangan dan\r\nEnergi Provinsi Jawa Tengah. Dengan berubahnya nama tersebut, maka kewenangan\r\ndan tupoksinya makin bertambah selain menangani bidang pertambangan dan ABT\r\njuga menangani bidang geologi, panas bumi, ketenagalistrikan dan migas.<br></span></p><p class=\"MsoNormal\"><span>Selanjutnya dengan telah diterbitkannya PP No.41 Tahun\r\n2007 tentang Organisasi Perangkat Daerah, maka dalam rangka optimalisasi tugas\r\nDinas ESDM di Kabupaten/Kota sebagai unsur pelaksanaan otonomi daerah telah\r\nditerbitkan Perda Provinsi Jawa Tengah No. 6 Tahun 2008 tentang Organisasi dan\r\nTata Kerja Dinas Provinsi Jawa Tengah, dimana dalam pembentukan dinas baru\r\ntersebut Dinas Pertambangan dan Energi Provinsi Jawa Tengah berganti menjadi\r\nDinas Energi dan Sumber Daya Mineral Provinsi Jawa Tengah yang kemudian\r\ndiperkuat dengan adanya Peraturan Gubernur Jawa Tengah No. 74 Tahun 2008\r\ntentang Penjabaran Tupoksi dan Tata Kerja Dinas ESDM Provinsi Jawa Tengah.</span></p><p class=\"MsoNormal\"><span>Untuk melaksanakan sebagian tugas teknis operasional\r\ndan/atau kegiatan teknis penunjang dalam rangka melaksanakan kewenangan\r\nPemerintah Provinsi Jawa Tengah yang berada di Kabupaten/Kota, keberadaan\r\nfungsinya dalam memenuhi pelayanan kepada masyarakat semakin meningkat, maka\r\nberdasarkan Perda Provinsi Jawa Tengah No. 5 Tahun 2006, Dinas Pertambangan dan\r\nEnergi Provinsi Jawa Tengah memiliki unit pelaksana teknis sebagai berikut :</span></p><ol><li><span>Balai Pengelola Pertambangan\r\ndan Energi Wilayah Solo;</span></li><li><span>Balai Pengelola\r\nPertambangan dan Energi Wilayah Kendeng Muria;</span></li><li><span>Balai Pengelola\r\nPertambangan dan Energi Wilayah Serayu.</span></li></ol><p class=\"MsoNormal\"><span>&nbsp;</span>Seiring dengan diberlakukannya Peraturan Daerah Provinsi\r\nJawa Tengah No. 6 Tahun 2008, maka unit pelaksana teknis pada Dinas ESDM\r\nProvinsi Jawa Tengah mengalami perubahan sesuai Peraturan Gubernur Jawa Tengah\r\nNo. 46 Tahun 2008 tentang Organisasi dan Tata Kerja Unit Pelaksana Teknis pada\r\nDinas ESDM Provinsi Jawa Tengah sebagai berikut :</p><ol><li><span>Balai Energi dan Sumber\r\nDaya Mineral Wilayah Serayu Utara;</span></li><li><span>Balai Energi dan Sumber\r\nDaya Mineral Wilayah Serayu Selatan;</span></li><li><span>Balai Energi dan Sumber\r\nDaya Mineral Wilayah Kendeng Muria;</span></li><li><span>Balai Energi dan Sumber\r\nDaya Mineral Wilayah Solo.</span></li></ol><p class=\"MsoNormal\"><span>&nbsp;</span>Selanjutnya pada tahun 2016 Dinas ESDM Provinsi Jawa Tengah struktur\r\norganisasinya mengalami perubahan nomenklatur sesuai Perda Provinsi Jawa Tengah\r\nNomor 78 Tahun 2016 tentang Organisasi Dan Tata Kerja Dinas Energi Dan Sumber\r\nDaya Mineral Provinsi Jawa Tengah dengan susunan terdiri dari :</p><ol><li><span>Kepala Dinas</span><span></span></li><li><span>Sekretariat; </span><span></span></li><li><span>Bidang Geologi Dan Air Tanah; </span><span></span></li><li><span>Bidang Mineral Dan Batubara; </span><span></span></li><li><span>Bidang Ketenagalistrikan; </span><span></span></li><li><span>Bidang Energi Baru Terbarukan; </span><span></span></li><li><span>UPT Dinas; &nbsp;</span><span></span></li></ol><p class=\"MsoNormal\"><span>Sedang untuk UPT diatur dalam Peraturan\r\nGubernur Jawa Tengah </span><span>Nomor 29 Tahun 2018 tentang Organisasi\r\nDan Tata Kerja Unit Pelaksana Teknis Daerah Pada Dinas Energi Dan Sumber Daya\r\nMineral Provinsi Jawa Tengah.</span></p><p class=\"MsoNormal\"><span>Dalam Pergub tersebut telah dibentuk UPTD\r\nLaboratorium Energi Dan Sumber Daya Mineral Kelas A yang susunan organisasinya\r\nterdiri dari :</span><span></span></p><ol><li><span>Kepala\r\nLaboratorium; </span><span></span></li><li><span>Subbagian\r\nTata Usaha; </span><span></span></li><li><span>Seksi\r\nPengujian Air; </span><span></span></li><li><span>Seksi\r\nPengujian Geologi Dan Mineral; dan</span><span></span></li><li><span>Kelompok\r\nJabatan Fungsional.</span><span></span></li></ol><p class=\"MsoNormal\"><span>U</span><span>ntuk melaksanakan\r\nsebagian tugas Dinas di bidang energi dan sumber daya mineral pada Dinas Energi\r\nDan Sumber Daya Mineral Provinsi Jawa Tengah telah dibentuk Cabang Dinas ESDM sesuai\r\nPeraturan Gubernur Jawa Tengah</span><span> Nomor 28 Tahun 2018 tentang </span><span>Organisasi\r\nDan Tata Kerja Cabang Dinas Pada Dinas Energi Dan Sumber Daya Mineral Provinsi\r\nJawa Tengah.</span></p><p class=\"MsoNormal\"><span>Adapun Cabang Dinas yang telah dibentuk\r\nsesuai Pergub tersebut Kelas A terdiri dari atas :</span><span></span></p><ol><li><span>Cabang\r\nDinas Energi Dan Sumber Daya Mineral Wilayah Solo; </span><span></span></li><li><span>Cabang\r\nDinas Energi Dan Sumber Daya Mineral Wilayah Kendeng Muria; </span><span></span></li><li><span>Cabang\r\nDinas Energi Dan Sumber Daya Mineral Wilayah Serayu Utara; </span><span></span></li><li><span>Cabang\r\nDinas Energi Dan Sumber Daya Mineral Wilayah Serayu Selatan; </span><span></span></li><li><span>Cabang\r\nDinas Energi Dan Sumber Daya Mineral Wilayah Slamet Utara; </span><span></span></li><li><span>Cabang Dinas Energi Dan Sumber Daya\r\nMineral Wilayah Ungaran Telomoyo; </span><span></span></li><li><span>Cabang\r\nDinas Energi Dan Sumber Daya Mineral Wilayah Kendeng Selatan; </span><span></span></li><li><span>Cabang\r\nDinas Energi Dan Sumber Daya Mineral Wilayah Sewu Lawu; </span><span></span></li><li><span>Cabang Dinas Energi Dan Sumber Daya\r\nMineral Wilayah Slamet Selatan ; </span><span></span></li><li><span>Cabang Dinas Energi Dan Sumber Daya\r\nMineral Wilayah Serayu Tengah ; </span><span></span></li><li><span>Cabang\r\nDinas Energi Dan Sumber Daya Mineral Wilayah Merapi ; </span><span></span></li><li><span>Cabang Dinas Energi Dan Sumber Daya Mineral\r\nWilayah Semarang – Demak.</span><br></li></ol><p></p>', NULL, 'history', '2023-11-25 21:53:18', '2023-11-25 21:53:18'),
(4, 'Visi Misi', 'visi-misi', '<div>&nbsp;<b>VISI :</b></div><p class=\"MsoNormal\"></p>\r\n\r\n<p class=\"MsoNormal\"><b><i><span>“Menuju Jawa Tengah Sejahtera dan Berdikari” “Tetep Mboten\r\nKorupsi, Mboten Ngapusi”</span> </i></b></p>\r\n\r\n<p class=\"MsoNormal\">Visi Pembangunan Provinsi Jawa Tengah ini diharapkan akan mewujudkan\r\nkeinginan dan amanat masyarakat Provinsi Jawa Tengah dengan tetap mengacu pada\r\npencapaian tujuan nasional seperti diamanatkan dalam Pembukaan UUD 1945\r\nkhususnya bagi masyarakat Provinsi Jawa Tengah, selaras dengan RPJM Nasional\r\nTahun 2014-2019, dan RPJPD Provinsi Jawa Tengah Tahun 2005- 2025. </p>\r\n\r\n<p class=\"MsoNormal\">Visi Pembangunan Provinsi Jawa Tengah tersebut harus dapat diukur\r\nkeberhasilannya dalam rangka mewujudkan Provinsi Jawa Tengah yang Sejahtera dan\r\nBerdikari. Makna yang terkandung dalam Visi tersebut dijabarkan sebagai berikut\r\n: </p>\r\n\r\n<p class=\"MsoNormal\"><b>Sejahtera </b></p>\r\n\r\n<p class=\"MsoNormal\">Masyarakat Jawa Tengah Sejahtera adalah masyarakat yang\r\ntercukupi segala kebutuhan dasarnya secara adil dan merata berprinsip pada\r\nperikemanusiaan dan perikeadilan. Masyarakat sejahtera juga terbebas dari\r\nketidakmerdekaan, kebodohan, kesakitan, kelaparan, serta ancaman dari perlakuan\r\natau tindak kekerasan fisik maupun non fisik. </p>\r\n\r\n<p class=\"MsoNormal\">Dalam lingkungan masyarakat yang sejahtera akan tercipta\r\nhubungan sosial yang nyaman dan aman, tanpa adanya diskriminasi SARA, serta\r\ntercipta relasi yang dinamis, saling menghargai, saling pengertian, dan\r\ntoleransi yang tinggi. Ketercukupan kebutuhan masyarakat juga didukung dengan\r\npemenuhan prasarana dan sarana dasar, pelayanan publik, ruang publik,\r\ntransportasi, serta teknologi yang harus disediakan secara cukup dan menerus,\r\nuntuk mencapai kemajuan dan perkembangan kehidupan masyarakat yang lebih baik\r\ndan sejahtera. </p>\r\n\r\n<p class=\"MsoNormal\"><b>Berdikari </b></p>\r\n\r\n<p class=\"MsoNormal\">Berdikari merupakan sebuah tujuan agar masyarakat mampu\r\nmemenuhi segala kebutuhan dasarnya secara mandiri dan cukup. Dengan begitu,\r\nberdikari menjadi sebuah metode untuk mewujudkan kesejahteraan masyarakat dan\r\nlingkungan hidupnya berbasis modal pokok milik sendiri, baik sumberdaya alam,\r\nmanusia, sosial, budaya, ekonomi, dan politik. </p>\r\n\r\n<p class=\"MsoNormal\">Sedangkan sumberdaya yang berasal dari luar merupakan\r\ntambahan apabila diperlukan. Perwujudan masyarakat Jawa Tengah yang sejahtera\r\ndan berdikari dilandasi semangat dan nilai utama Mboten Korupsi, Mboten\r\nNgapusi. Nilai ini dimanifestasi dalam sikap, tindakan, dan laku seluruh\r\nmasyarakat Jawa Tengah untuk dapat bersama mencapai kesejahteraan yang\r\nberdikari.</p>\r\n\r\n<p class=\"MsoNormal\">Menuju Jawa Tengah Sejahtera dan Berdikari “Tetep Mboten\r\nKorupsi, Mboten Ngapusi” merupakan instrumen untuk menciptakan nilai-nilai\r\nkesejahteraan yang setara (equal) bagi segenap komponen masyarakat Jawa Tengah\r\ndan mewujudkan kondisi Jawa Tengah yang berdaulat secara politik, berdikari\r\nsecara ekonomi, dan berkepribadian secara sosial budaya, yang dapat\r\ndimanifestasikan dalam bentuk sikap maupun perbuatan, dengan tindakan dan\r\nperilaku “Mboten Korupsi, Mboten Ngapusi”. </p>\r\n\r\n<p class=\"MsoNormal\">Guna mewujudkan harapan/keinginan Rakyat Jawa Tengah menjadi\r\nsejahtera tentunya diperlukan kerja keras dari seluruh komponen, baik dari\r\npihak pemerintah daerah maupun dari seluruh lapisan masyarakat yang ada di\r\nProvinsi Jawa Tengah untuk dapat mendayagunakan dan mengoptimalkan segenap\r\npotensi sumber daya alam yang dimiliki dengan tetap mengacu pada prinsip\r\npembangunan yang berkelanjutan dan ramah lingkungan.</p><p class=\"MsoNormal\"><br></p><p class=\"MsoNormal\"><b>MISI :</b></p><p class=\"MsoNormal\">1) Membangun masyarakat Jawa Tengah yang religius, toleran,\r\ndan guyub untuk menjaga Negara Kesatuan Republik Indonesia. </p><p class=\"MsoNormal\">2) Mempercepat reformasi birokrasi yang dinamis serta\r\nmemperluas sasaran ke pemerintah Kabupaten/Kota. </p><p class=\"MsoNormal\">3) Memperkuat kapasitas ekonomi rakyat dan membuka lapangan\r\nkerja baru untuk mengurangi kemiskinan dan pengangguran. </p><p class=\"MsoNormal\">\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\">4) Mejadikan rakyat Jawa Tengah lebih sehat, lebih pintar,\r\nlebih berbudaya dan mencintai lingkungan.</p><p class=\"MsoNormal\"><br></p><p class=\"MsoNormal\">Sumber : Renstra Dinas ESDM Provinsi Jawa Tengah 2018-2023</p><p></p>', NULL, 'vision', '2023-11-25 21:53:35', '2023-11-25 21:53:35'),
(5, 'Tupoksi', 'tupoksi', '<p><b><span>DASAR HUKUM</span></b></p><p>Dinas\r\n ESDM Provinsi Jawa Tengah dibentuk berdasarkan Peraturan Gubernur Jawa \r\nTengah Nomor 27 Tahun 2018 tentang Organisasi dan Tata Kerja Dinas \r\nEnergi dan Sumber Daya Mineral Provinsi Jawa Tengah. Struktur organisasi\r\n ini merupakan hasil penataan kembali SOTK berdasarkan rekomendasi \r\nevaluasi oleh Mendagri dengan surat nomor 061/9383/SJ tanggal 27 \r\nDesember 2017.<br></p><p>Perubahan organisasi perangkat \r\ndaerah ini dimaksudkan untuk meningkatkan produktivitas organisasi, \r\nmengoptimalkan nilai pelayanan, mencapai hasil yang lebih maksimal, \r\nmengkonsolidasikan fungsi-fungsi, menghilangkan tingkatan dan pekerjaan \r\nyang tidak perlu, sehingga organisasi mampu memberi pelayanan optimal \r\ndalam rangka pelayanan, pemberdayaan dan pengembangan ekonomi \r\nmasyarakat.</p><blockquote><p><b>Dinas ESDM \r\nProvinsi Jawa Tengah merupakan unsur pelaksana otonomi daerah di bidang \r\nenergi dan sumber daya mineral yang berkedudukan di bawah dan \r\nbertanggung jawab kepada Gubernur melalui Sekretaris Daerah</b>.</p></blockquote><p>Dinas\r\n ESDM Provinsi Jawa Tengah mempunyai tugas pokok membantu Gubernur \r\nmelaksanakan urusan pemerintahan bidang energi dan sumber daya mineral \r\nyang menjadi kewenangan Daerah dan Tugas Pembantuan yang ditugaskan \r\nkepada Daerah.</p><p>Dalam melaksanakan tugas pokok sebagaimana tersebut di atas, Dinas Energi Dan Sumber Daya Mineral menyelenggarakan fungsi:</p><ol><li>perumusan kebijakan bidang geologi dan air tanah, mineral dan batubara, ketenagalistrikan, energi baru terbarukan;</li><li>pelaksanaan kebijakan bidang geologi dan air tanah, mineral dan batubara, ketenagalistrikan, energi baru terbarukan;</li><li>pelaksanaan\r\n evaluasi dan pelaporan bidang geologi dan air tanah, mineral dan \r\nbatubara, ketenagalistrikan, energi baru terbarukan;</li><li>pelaksanaan dan pembinaan administrasi kepada seluruh unit kerja di lingkungan Dinas;</li><li>pelaksanaan fungsi kedinasan lain yang diberikan oleh Gubernur, sesuai tugas dan fungsinya;</li></ol><p>Berdasarkan susunan organisasi, rincian komposisi Dinas ESDM Provinsi Jawa Tengah adalah sebagai berikut:</p><ol><li>Kepala Dinas;</li><li>Sekretaris;</li><li>Bidang Geologi dan Air Tanah;</li><li>Bidang Mineral dan Batubara;</li><li>Bidang Ketenagalistrikan;</li><li>Bidang Energi Baru Terbarukan;</li><li>Cabang Dinas;</li><li>UPT Dinas; dan</li><li>Kelompok Jabatan Fungsional.</li></ol><p>Susunan\r\n Organisasi dan Tata Kerja Dinas Energi dan Sumber Daya Mineral Provinsi\r\n Jawa Tengah secara jelas digambarkan jenjangjenjang struktural yang \r\nterdiri dari Kepala Dinas sebagai unsur pimpinan sampai kepada jenjang \r\nyang berada dibawahnya sebagai unsur pelaksana. Hal ini memperlihatkan \r\nbahwa adanya pembagian tugas yang dilaksanakan secara menyeluruh.</p><p>Berdasarkan\r\n Struktur Organisasi dan Tata Kerja, komposisi jabatan struktural di \r\nDinas Energi dan Sumber Daya Mineral Provinsi Jawa Tengah yang terdiri \r\ndari :</p><ol><li>1 (satu) Pejabat Eselon II,</li><li>5 (lima) Pejabat Eselon III/a,</li><li>13 (tiga belas) Pejabat Eselon III/b dan</li><li>42 (empat puluh dua) Pejabat Eselon IV/a,</li></ol><p>sampai\r\n dengan kondisi bulan Desember 2018 jabatan terisi semua. Dinas ESDM \r\nProvinsi Jawa Tengah memiliki 12 (dua belas ) Cabang Dinas setingkat \r\neselon III/b yaitu :</p><ol><li>Cabang Dinas ESDM Wilayah Solo,</li><li>Cabang Dinas ESDM Wilayah Kendeng Muria,</li><li>Cabang Dinas ESDM Wilayah Serayu Utara,</li><li>Cabang Dinas ESDM Wilayah Serayu Selatan,</li><li>Cabang Dinas ESDM Wilayah Slamet Utara,</li><li>Cabang Dinas ESDM Wilayah Ungaran Telomoyo,</li><li>Cabang Dinas ESDM Wilayah Kendeng Selatan,</li><li>Cabang Dinas ESDM Wilayah Sewu Lawu,</li><li>Cabang Dinas ESDM Wilayah Slamet Selatan,</li><li>Cabang Dinas ESDM Wilayah Semarang Demak,</li><li>Cabang Dinas ESDM Wilayah Merapi dan</li><li>Cabang Dinas ESDM Wilayah Serayu Tengah.</li></ol><p><br></p><h4><b>TUGAS POKOK</b> :</h4><p>Dinas\r\n Energi Dan Sumber Daya Mineral mempunyai tugas pokok membantu Gubernur \r\nmelaksanakan urusan pemerintahan bidang energi dan sumber daya mineral \r\nyang menjadi kewenangan Daerah dan Tugas Pembantuan yang ditugaskan \r\nkepada Daerah.</p><p><br></p><h4><b>FUNGSI</b> :</h4><p>Dalam melaksanakan tugas pokok sebagaimana tersebut di atas, Dinas Energi Dan Sumber Daya Mineral menyelenggarakan fungsi:</p><ol><li>perumusan kebijakan bidang geologi dan air tanah, mineral dan batubara, ketenagalistrikan, energi baru terbarukan;</li><li>pelaksanaan kebijakan bidang geologi dan air tanah, mineral dan batubara, ketenagalistrikan, energi baru terbarukan;</li><li>pelaksanaan\r\n evaluasi dan pelaporan bidang geologi dan air tanah, mineral dan \r\nbatubara, ketenagalistrikan, energi baru terbarukan;</li><li>pelaksanaan dan pembinaan administrasi kepada seluruh unit kerja di lingkungan Dinas;</li><li>pelaksanaan fungsi kedinasan lain yang diberikan oleh Gubernur, sesuai tugas dan fungsinya.</li></ol><p></p>', NULL, 'tupoksi', '2023-11-25 21:53:45', '2023-11-25 21:53:45'),
(6, 'Organisasi', 'organisasi', '<p><b>Struktur Organisasi Dinas Energi Dan Sumber Daya Mineral Provinsi Jawa Tengah</b></p><p></p>', 'assets/profile/z6JKOpmxo1ha3TT1472Dv5mT6IwLXERIrIVpvEWE.pdf', 'organization', '2023-11-25 21:55:52', '2023-11-25 21:55:52'),
(7, 'Profile Pejabat', 'profile-pejabat', '<p><b>Profil Pejabat</b></p><p><b><br></b></p><iframe src=\"https://drive.google.com/file/d/1GtErkO6fUD-t9LyBlNAcS0KK6rrYJD-_/preview\" width=\"100%\" height=\"680\"></iframe>', 'undefined', 'official', '2023-11-25 22:02:16', '2023-11-25 22:08:53');

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

--
-- Dumping data for table `ma_pollings`
--

INSERT INTO `ma_pollings` (`id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `vote1`, `vote2`, `vote3`, `vote4`, `created_at`, `updated_at`) VALUES
(1, 'Bagaimana Tampilan Website ini?', 'Sangat Baik', 'Baik', 'Biasa', 'Kurang Menarik', 1, 1, 0, 0, '2023-11-27 01:40:54', '2023-11-26 19:00:09');

-- --------------------------------------------------------

--
-- Table structure for table `ma_posts`
--

CREATE TABLE `ma_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hall_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ma_hall_menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hall_menu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_post` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_hall` int(11) DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_publish` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `type` enum('0','1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ma_posts`
--

INSERT INTO `ma_posts` (`id`, `hall_id`, `ma_hall_menu_id`, `hall_menu`, `title`, `seo`, `description`, `image`, `link`, `tag_post`, `day`, `date`, `is_hall`, `username`, `phone`, `is_publish`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '', 'Catat! Mulai besok, ribuan izin pertambangan diambil alih Pemerintah Pusat', 'catat-mulai-besok-ribuan-izin-pertambangan-diambil-alih-pemerintah-pusat', '<p>KONTAN.CO.ID – JAKARTA. Pemerintah pusat melalui Kementerian Energi dan Sumber Daya Mineral (ESDM) akan mengambil alih semua perizinan pertambangan dari tangan pemerintah provinsi. Merujuk pada jadwal, pengalihan kewenangan tersebut akan berlangsung mulai 11 Desember 2020 besok.</p><p>Direktur Pembinaan dan Pengusahaan Batubara Kementerian ESDM Sujatmiko mengungkapkan, berdasarkan Undang-Undang Nomor 3 Tahun 2020 alias UU Mineral dan Batubara (Minerba), setelah 6 bulan diundangkan, maka kewenangan perizinan diambil alih dari pemerintah daerah ke pemerintah pusat.</p><p>“Terhadap jumlah IUP (Izin Usaha Pertambangan) saya nggak hafal. Namun sebagai gambaran bahwa UU No.3/2020 mengamanatkan enam bulan setelah diundangkan maka kewenangan perizinan di pemerintah pusat, dalam hal ini Kementerian ESDM,” kata Sujatmiko dalam acara Webinar Virtual Expo yang digelar Kamis (10/12).</p><p>Sujatmiko bilang, pihaknya juga sudah berkirim surat kepada para Gubernur untuk menyerahkan seluruh perizinan di daerah. “Sehingga 11 Desember ke depan pemerintah akan mengelola perizinan nasional dan nanti begitu PP (Peraturan Pemerintah) terbit, kami akan tugaskan,” sambungnya.</p><p>Asal tahu saja, UU Minerba resmi diundangkan dan ditandatangani oleh Presiden Joko Widodo pada 10 Juni 2020 lalu. Dalam Pasal 35 (1) UU minerba baru itu, disebutkan bahwa usaha pertambangan dilaksanakan berdasarkan Perizinan Berusaha dari Pemerintah Pusat.</p><p>Namun pada Pasal 35 (4) dinyatakan bahwa pemerintah pusat dapat mendelegasikan kewenangan pemberian perizinan berusaha kepada pemerintah daerah provinsi sesuai dengan ketentuan peraturan perundang-undangan.</p><p>Sujatmiko belum membeberkan jumlah perizinan aktual pertambangan minerba. Yang pasti, merujuk pada data dari Direktorat Minerba Kementerian ESDM, per 10 Maret 2020, terdapat 3.372 Izin Usaha Pertambangan (IUP) provinsi dan 132 IUP Pusat.</p><p>Selain IUP, ada juga 31 Kontrak Karya (KK), 67 PKP2B, 692 Izin Usaha Jasa Pertambangan (IUJP), 52 IUP OPK Olah Murni, 718 OPK Angkut Jual, 16 Izin Pertambangan Rakyat (IPR), dan 2 Izin Usaha Pertambangan Khusus (IUPK).</p><p><br></p><p>Reporter: Ridwan Nanda Mulyana | Editor: Wahyu T.Rahmawati<br>Sumber: https://industri.kontan.co.id/</p>', 'assets/news/WeOyajaIIkRGfLU0SvEeUjMmDmFeZYTboLKUxDFE.jpg', 'asdsad', 'asdasd,jajal ,gajelas memang', 'Senin', '2023-10-30 01:54:21', NULL, 'admin', 'asda', 'Y', '1', '2023-10-30 01:54:21', '2023-11-26 04:13:18'),
(3, 1, 1, '', 'Ganjar Minta Pemerintah Pusat Tak Asal Beri Izin Penambangan', 'ganjar-minta-pemerintah-pusat-tak-asal-beri-izin-penambangan', '<p>SEMARANG - Gubernur Jawa Tengah, Ganjar Pranowo meminta pemerintah pusat tidak asal memberikan izin penambangan. Sebab akibatnya, pemerintah daerah yang terkena dampak kerusakan lingkungan akibat izin-izin itu.</p><p>Hal itu disampaikan Ganjar saat di depan sejumlah pejabat dari Kementerian ESDM, para kepala dinas ESDM se Indonesia yang tergabung dalam APESDMPI dan pejabat terkait dalam rapat koordinasi dinas-dinas ESDM di kantor Dinas ESDM Jateng, Jumat (3/11).<br></p><p>\"Sekarang perizinan penambangan diambil pusat dengan Online Single Submission (OSS). Itu memang bagus, usahanya cepet banget dan masyarakat pasti puas. Tapi akibatnya, kami di daerah yang pusing,\" katanya.<br></p><p>Ia mencontohkan, di sekitar lereng Gunung Merapi tepatnya di Klaten, dulu hanya ada delapan penambang resmi yang memiliki izin. Mereka bisa dikontrol dan diawasi. Tapi setelah perizinan ditarik ke pusat, saat ini ada banyak izin penambangan bermunculan.<br></p><p>\"Dari hanya delapan, sekarang sudah ada 100 lebih. Bayangkan 100 lebih, pasti di sana akan rusak,\" tegasnya.<br></p><p>Ganjar meminta agar antara pemerintah pusat dan pemerintah daerah duduk bersama. Dengan begitu, maka soal perizinan penambangan bisa dikelola dengan baik.<br></p><p>\"Mana yang bisa ditambang, mana yang tidak merusak itu bisa dikendalikan. Ternyata cepat saja tidak cukup, pasti akan sangat eksploitatif dan merusak lingkungan,\" ucapnya.<br></p><p>Untuk itu, dalam forum asosisasi dinas-dinas pengelola ESDM seluruh Indonesia itu, Ganjar meminta agar ada pembahasan serius terkait pengelolaan penambangan sumber daya mineral. Di tengah pertumbuhan jumlah penduduk dan eksplorasi, maka lingkungan akan terancam.<br></p><p>\"Hari ini saya senang, asosiasi dinas-dinas ESDM seluruh Indonesia berkumpul. Isunya menarik, tentang bagaimana mengelola sumber daya mineral di Indonesia untuk kemakmuran rakyat,\" imbuhnya.<br></p><p>Ganjar juga berpesan kepada kepala dinas ESDM untuk terus menjunjung tinggi integritas. Pasalnya, persoalan ESDM ini banyak terjadi praktik korupsi karena sumber uang besar ada di sana.<br></p><p>\"Maka teman-teman asosiasi bertemu untuk mereview tentang berbagai persoalan yang ada. Saya titip, ayo kita jaga integritas di dunia ke ESDM-an ini,\" pungkasnya.<br></p><p>Acara tersebut digelar secara hybrid, ada yang hadir langsung dan ada yang tatap muka. Sejumlah kepala dinas ESDM di Indonesia ikut hadir secara langsung di Semarang, diantaranya dari Papua, Kalimantan Selatan, Kalimantan Timur, Jawa Timur, Jawa Barat, DIY, Bangka Belitung dan lain sebagainya.<br></p>', 'assets/news/IUxAL23BxDwFqKs2QE4g9k2OPhISs59um48T78xj.png', 'asdasd', 'ange ,asda,oke', 'Senin', '2023-10-30 02:38:26', NULL, 'admin', 'asdasd', 'Y', '2', '2023-10-30 02:38:26', '2023-11-26 04:12:23'),
(6, 1, 3, '', 'Bahas Penanggulangan Kemiskinan Ekstrim, Taj Yasin Minta Camat dan Kades Terus Update Data', 'bahas-penanggulangan-kemiskinan-ekstrim-taj-yasin-minta-camat-dan-kades-terus-update-data', '<p>Banyumas - Wakil Gubernur Jawa Tengah, Taj Yasin Maimoen, mengingatkan kepada seluruh Camat dan Kades di Kabupaten Banjarnegara Banyumas, dan Kebumen untuk segera memperbarui Data Terpadu Kesejahteraan Sosial (DTKS).<br></p><p>Hal itu dia sampaikan saat mengikuti rapat koordinasi Penanggulangan Kemiskinan Ekstrim Penyelesaian Sambungan Listrik Bagi Rumah Tangga Kurang Mampu di Kabupaten Banyumas, Banjarnegara dan Kebumen, di Hotel Grand Kanaya, Banyumas, Rabu (1/12/2021).<br></p><p>\"Bagaimana kita bisa membantu kalau datanya tidak valid? Maka itu saya minta ayo, Pak Camat, Pak Kades saya titip, datanya diperbarui,\" kata Taj Yasin.<br></p><p>Dia menambahkan, bahwa setelah melakukan verifikasi dan validasi, data tersebut harus dimasukkan ke dalam aplikasi yang telah disediakan. Dengan demikian, lanjutnya, input data tersebut akan meminimalisir perbedaan data antara daerah dengan pusat.<br></p><p>\"Caranya ya input data sendiri di aplikasi. Minta orang IT melakukannya. Nanti Pak Camat, dampingi semua Kadesnya. Kalau perlu dikeroyok bareng-bareng input datanya, biar bisa saling evaluasi lagi. Supaya bisa lebih cepat,\" tandasnya.<br></p><p>Salah satu kepala desa dari Desa Sokaraja, Jamhar, mengaku kepada Taj Yasin kalau data yang dia peroleh dari pusat keliru. Saat menerima data tersebut, dia melakukan kroscek dan ternyata nama-nama yang ada di dalam data tersebut sebagian termasuk orang yang mampu.<br></p><p>\"Data yang dari pusat itu yang masuk ke desa kami itu istilahnya sudah mampu. Saya sebagai kepala desa kan bingung,\" kata Jamhar.<br></p><p>Jamhar menambahkan, pihaknya akan segera menindaklanjuti arahan Wagub. Awalnya dia mengaku kebingungan bagaimana caranya memperbaiki data yang dia peroleh dari pusat.<br></p><p>\"Saya akan mengusahakan, (data) orang yang sudah mampu akan saya hapus. Saya akan minta bagian IT saya untuk memasukkan data yang sesuai,\" tambahnya.<br></p>', 'assets/news/0bjO4WqE2ICus5YeoRtSxcQrhdIqQxlmVaLmesZP.png', 'asdasd', 'sdasasd', 'Rabu', '2023-11-01 04:44:45', NULL, 'admin', 'asdasd', 'Y', '3', '2023-11-01 04:44:45', '2023-11-26 04:12:57'),
(7, NULL, NULL, '', 'Tinjauan Lapangan Kejadian Gerakan Tanah di Dusun Nerangan, Desa Kajoran, Kabupaten Magelang', 'tinjauan-lapangan-kejadian-gerakan-tanah-di-dusun-nerangan-desa-kajoran-kabupaten-magelang', '<p><span>Pada hari Kamis (30/12/2021)\r\nTim dari Cabang Dinas ESDM Wilayah Merapi melalukan tinjauan lapangan kejadian\r\ngerakan tanah di Dusun Nerangan, Desa Kajoran, Kabupaten Magelang. Kejadian\r\ntersebut mengakibatkan rusaknya talud dan satu rumah rusak ringan serta\r\nmengancam satu rumah.</span><br></p><p class=\"MsoNormal\"><span lang=\"IN\">Gerakan tanah terjadi pada\r\nhari Selasa (28/12/2021) pukul 02.00 akibat hujan intensitas sedang yang\r\nterjadi pada Hari Senin (27/12/2021) pukul 12.00 WIB hingga sore hari. </span>Kejadian\r\ntersebut menyebabkan 1 (satu) rumah milik Bpk.Risyanto, 60th (1 KK 3 jiwa)\r\nrusak ringan dan mengancam rumah milik Bpk.Nur Hidayat, 40 th (2 KK 6 jiwa).<span lang=\"IN\"> Kondisi terakhir, lokasi telah dipasang\r\nterpal untuk meminimalisir masuknya air ke dinding lereng. Hasil pengamatan\r\nvisual, longsoran berdimensi lebar ± 10 meter dan tinggi lereng longsor ± 7\r\nmeter, dimana pada kaki lereng talud terdapat rumah warga (Bpk. Nur Hidayat)\r\ndan tidak memiliki sistem drainase yang baik. Pada bagian atas lereng talud\r\nterdapat rumah Bpk. Risyanto, dimana kamar mandi mengalami kerusakan ringan\r\n(lantai menggantung).</span></p><p class=\"MsoNormal\">&nbsp;</p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span lang=\"IN\">Dari hasil tinjauan lapangan\r\nyang telah dilakukan oleh Tim Cabdin Merapi selanjutnya dibuat rekomendasi\r\nterkait mitigasi darurat dan mitigasi lanjutan yang akan disampaikan ke Bupati\r\nMagelang.</span></p><p></p>', 'assets/news/TdK95l68folH1bqB017z5CbU0JAR2yDL9B4tOyaY.jpg', NULL, NULL, 'Minggu', '2023-11-26 11:30:35', NULL, 'admin', NULL, 'Y', '5', '2023-11-26 11:30:35', '2023-11-26 11:30:35'),
(8, NULL, NULL, '', 'APLIKASI SISTEM INFORMASI RUMAH TANGGA BELUM BERLISTRIK (SIRULI)', 'aplikasi-sistem-informasi-rumah-tangga-belum-berlistrik-siruli', 'Berdasarkan Undang-Undang Nomor 30 Tahun 2009 tentang Ketenagalistrikan dan Undang-Undang Nomor 23 Tahun 2014 tentang Pemerintah Daerah, bahwa untuk penyediaan tenaga listrik, pemerintah pusat serta pemerintah Provinsi menyediakan dana untuk kelompok masyarakat tidak mampu, pembangunan sarana penyediaan tenaga listrik belum berkembang, daerah terpencil dan pedesaan.<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Berdasarkan RPJMD Provinsi Jawa Tengah Tahun 2018-2023, pada tahun 2018 masih terdapat 1,85 persen rumah tangga (RT) yang sebagian besar berasal dari rumah tangga miskin serta&nbsp; terdapat di wilayah pedesaan terpencil belum berlistrik/ belum dapat mengakses listrik listrik secara mandiri (masih menyalur/ levering) di Provinsi Jawa Tengah.<br><br>Sejak tahun 2019 sampai dengan tahun 2022 sebanyak 65.863 rumah tangga kurang mampu di Provinsi Jawa Tengah telah mendapatkan bantuan sambungan listrik gratis bersubsidi melalui berbagai sumber pendanaan baik APBN, APBD Provinsi, maupun melalui CSR. Dalam rangka pemenuhan akses listrik bagi masyarakat miskin menghadapi banyak tantangan, diantaranya adalah dinamika data terpadu kesejahteraan sosial (DTKS) yang diampu oleh Pusdatin Kemensos RI serta ketidaksinkronan data rumah tangga yang berhak mendapatkan subsidi listrik yang diacu oleh PLN dengan data DTKS.<br><br>Menghadapi tantangan tersebut Cabang Dinas ESDM Wilayah Serayu Utara mempunyai tugas membantu Kepala Dinas ESDM dalam melaksanakan sebagian tugas dinas di bidang energi dan sumber daya mineral di wilayah Kota Pekalongan, Kabupaten Pekalongan dan Kabupaten Batang memperkenalkan “Aplikasi Sistem Informasi Rumah Tangga Belum Berlistrik (SIRULI)” yang berfungsi untuk pengelolaan database Rumah Tangga Tidak Mampu belum berlistrik serta validasi data calon penerima bantuan usulan bantuan sambungan listrik gratis bersubsidi berbasis teknologi digital. Aplikasi tersebut merupakan satu ide/ gagasan dari Sdr. Tunggul Purwono Adi, ST selaku Kepala Seksi Energi pada Cabang Dinas ESDM Wilayah Serayu Utara yang saat ini sedang melaksanakan implementasi Aksi Perubahan yang menjadi salah satu syarat kelulusan pada Diklat Pelatihan Kepemimpinan Pengawas yang sedang dijalani.<br><br>Peluncuran sekaligus sosialisasi dan pelatihan aplikasi tersebut dilaksanakan pada hari Rabu tanggal 20 September 2023 pada 2 (dua) wilayah kecamatan yang menjadi pilot project yaitu di Kecamatan Kesesi serta Kecamatan Siwalan, Kabupaten Pekalongan. Acara dihadiri oleh OPD terkait dari Kabupaten Pekalongan, PT. PLN UP3 Pekalongan, Manager PLN ULP Wiradesa, Manager PLN ULP Kedungwuni, Pemerintah Kecamatan Kesesi dan Siwalan serta seluruh pemerintah desa di wilayah Kec. Kesesi dan Siwalan.<br><br>Aplikasi ini dapat diakses melalui alamat website https://siruli-serayuutara.properku.my.id. Website ini juga dapat diakses dengan mudah oleh masyarakat dan khusus untuk user-password pengaplikasian dapat di akses mulai dari tingkat desa/kelurahan hingga kabupaten hingga PT. PLN sebagai penyedia listriknya. Harapan dengan dibangunya aplikasi SIRULI ini adalah untuk mendukung visi dan misi bapak gubernur dalam hal penanganan rumah tangga miskin yang belum berlistrik.<br><br>Di tempat terpisah Bapak Kepala Dinas ESDM Provinsi Jawa Tengah Bapak Boedyo Dharmawan, ST. MT menyatakan mendukung pembuatan aplikasi SIRULI ini yang diharapkan dapat membantu secara cepat untuk melakukan verifikasi tentang data BNBA calon penerima bantuan sambungan listrik dalam program Penanganan Kemiskinan Ekstrim sehingga pelaksanaan kegiatan bantuan sambungan listrik gratis bersubsidi bisa optimal.<br><br>Salah satu anggota DPRD Jateng Komisi D yaitu Bapak Agung Satria N, SH, MH juga menyambut baik adanya aplikasi SIRULI ini merupakan hal yang sangat bagus dan inovatif sekali di era globalisasi dan kemajuan teknologi yang sangat cepat ini. Bapak Agung juga menambahkan bahwa melalui pengembangan Aplikasi Siruli ini dapat menyentuh masyarakat dan daopat dirasakan oleh masyarakat dengan cepat dan tepat, semoga menjadi terobosan teknologi yang ada kemanfaatannya.<br>&nbsp;Sdr Tunggul Purwono Adi, ST selaku project leader mengharapkan aplikasi SIRULI ini dapat bermanfaat dalam mendukung pemerintah dalam pemenuhan sambungan listrik gratis bukan hanya di wilayah Cabang Dinas ESDM Wilayah Serayu Utara, akan tetapi dapat dikembangkan untuk wilayah Cabang Dinas ESDM&nbsp; lainnya di Provinsi Jawa Tengah.<br>', 'assets/news/EQGWJ4vLQhdtjKKervgYqVCQG8Fj14ZKJQFGbwht.jpg', NULL, NULL, 'Minggu', '2023-11-26 11:45:52', NULL, 'admin', NULL, 'Y', '5', '2023-11-26 11:45:52', '2023-11-26 05:18:50'),
(9, NULL, NULL, '', 'Tim Pertimbangan PPID Pelaksana ESDM Jateng', 'tim-pertimbangan-ppid-pelaksana-esdm-jateng', 'Pada hari ini Jumat, 8 September 2023, Rapat evaluasi kegiatan bulan Agustus dan sekalian pembentukan tim Pertimbangan PPID Dinas ESDM Provinsi Jawa Tengah bersama Kepala Dinas ESDM Provinsi Jawa Tengah.<br>', 'assets/news/eg4k0us5cCt7lhpYupsnvcLZiaOP7OsfufyiqkAN.jpg', NULL, NULL, 'Minggu', '2023-11-26 11:47:34', NULL, 'admin', NULL, 'Y', '5', '2023-11-26 11:47:34', '2023-11-26 05:08:21'),
(10, NULL, NULL, '', 'Hasil Kolaborasi dengan PPSDM Geominerba Kementerian ESDM RI, APPATINDO Jateng dan Departemen Teknik Geologi UNDIP, Dinas ESDM Prov Jateng selenggarakan Diklat Juru Bor Air Tanah', 'hasil-kolaborasi-dengan-ppsdm-geominerba-kementerian-esdm-ri-appatindo-jateng-dan-departemen-teknik-geologi-undip-dinas-esdm-prov-jateng-selenggarakan-diklat-juru-bor-air-tanah', '<p>Sesuai pada Peraturan Pemerintah No. 22 Tahun 2020 Pasal 29 Ayat (5) \r\nmengenai Jasa Konstruksi, sistem serti?kasi kompetensi kerja \r\ndilaksanakan oleh Lembaga Serti?kasi Profesi (LSP) yang diawasi langsung\r\n oleh Kementerian Pekerjaan Umum dan Perumahan Rakyat (PUPR). LSP dapat \r\ndibentuk oleh Lembaga Pelatihan Kerja yang sudah teregistrasi oleh LPJK,\r\n Lembaga Pendidikan yang sudah terakreditasi oleh LPJK, dan Asosiasi \r\nProfesi yang terakreditasi oleh LPJK.&nbsp;</p><p>Namun untuk Serti?kasi \r\nKompetensi Juru Bor Air Tanah saat ini belum memiliki SKKNI (Standar \r\nKompetensi Kerja Nasional Indonesia) yang merupakan rumusan kemampuan \r\nkerja yang mencakup aspek pengetahuan, keterampilan, dan/atau keahlian \r\nserta sikap kerja yang relevan dengan pelaksanaan tugas dan syarat \r\njabatan yang ditetapkan. Sehingga belum ada LSP manapun yang dapat \r\nmenerbitkan sertifikat kompetensi tersebut.&nbsp;</p><p><br></p><p>Menanggapi\r\n kondisi tersebut, Dinas ESDM Provinsi Jawa Tengah melalui Diklat Juru \r\nBor Air Tanah ini, berusaha memberikan stimulus untuk meningkatkan \r\nkompetensi sumber daya manusia yang ada, terutama di Jawa Tengah. Dengan\r\n sasaran peserta adalah para juru pengeboran air tanah yang sudah \r\nmemiliki pengalaman dilapangan. Diklat ini merupakan hasil kerjasama \r\ndengan PPSDM Geominerba Kementerian ESDM. Kegiatan dilaksanakan di \r\nSemarang pada tanggal 21-25 Agustus 2023, berkolaborasi dengan Asosiasi \r\nPerusahaan Pengeboran Air Tanah Indonesia (APPATINDO) Jawa Tengah untuk \r\npelaksanaan pengeboran dan Departemen Teknik Geologi, Universitas \r\nDiponegoro, Semarang dalam pelaksanaan uji pemompaan air tanah.</p><p><br></p><p>Dengan\r\n kegiatan ini, diharapkan peserta mampu meningkatkan pengetahuan, \r\nketerampilan dan profesionalisme juru pengeboran air tanah dalam \r\nmenunjang profesinya. Selanjutnya, setelah menyelesaikan diklat ini, \r\npeserta diharapkan dapat mengaplikasikan kompetensi tentang Juru \r\nPengeboran Air Tanah yang selalu mengutamakan keselamatan dan Kesehatan \r\ndalam bekerja, serta dapat membantu Pemerintah dalam mewujudkan \r\npengelolaan air tanah yang baik.</p>', 'assets/news/mvVICGPwjTVyfIfaNpHLYY2CEwIL5nHPymbXKX0Y.jpg', NULL, NULL, 'Minggu', '2023-11-26 11:48:55', NULL, 'admin', NULL, 'Y', '5', '2023-11-26 11:48:55', '2023-11-26 11:48:55');

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
(3, 'testing regulasi', 'testing-regulasi', NULL, '0', '2023-11-01 21:15:25', '2023-11-24 20:43:25'),
(4, 'Undang Undang', 'undang-undang', NULL, '1', '2023-11-26 23:31:35', '2023-11-26 23:31:35'),
(5, 'Peraturan Pemerintah', 'peraturan-pemerintah', NULL, '1', '2023-11-26 23:32:36', '2023-11-26 23:32:36'),
(6, 'Peraturan Daerah', 'peraturan-daerah', NULL, '1', '2023-11-26 23:32:43', '2023-11-26 23:32:43'),
(7, 'Peraturan Menteri', 'peraturan-menteri', NULL, '1', '2023-11-26 23:32:50', '2023-11-26 23:32:50'),
(8, 'Peraturan Gubernur', 'peraturan-gubernur', NULL, '1', '2023-11-26 23:32:56', '2023-11-26 23:32:56'),
(9, 'Keputusan Gubernur', 'keputusan-gubernur', NULL, '1', '2023-11-26 23:33:02', '2023-11-26 23:33:02'),
(10, 'SK Kepala Dinas', 'sk-kepala-dinas', NULL, '1', '2023-11-26 23:33:09', '2023-11-26 23:33:09');

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
-- Table structure for table `ma_reviews`
--

CREATE TABLE `ma_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ma_reviews`
--

INSERT INTO `ma_reviews` (`id`, `name`, `image`, `review`, `created_at`, `updated_at`) VALUES
(1, 'Galih', 'assets/review/Sl31MbGxjSZfmoiZunN0AuTyqSWbRCkJx4ZHDLEa.jpg', 'Situs Kominfo sangat informatif dan mudah dinavigasi. Konten yang terupdate memberikan wawasan mendalam mengenai perkembangan teknologi informasi. Sangat direkomendasikan bagi para pelajar dan profesional.', '2023-11-24 21:03:01', '2023-11-26 06:55:29'),
(3, 'gilang', 'assets/review/yBtaNoiuJYuIgaw08uQVbbRvpv3oP2i1iDs4RkRf.jpg', 'Website Kominfo memberikan pemahaman yang jelas mengenai kebijakan teknologi informasi di Indonesia. Fitur interaktifnya membuat pengalaman pengguna lebih menarik dan edukatif.', '2023-11-26 06:51:46', '2023-11-26 06:54:01'),
(4, 'Marchel', 'assets/review/eGXllE9zUP5iBgFQOiPcwH8bGBxYxvsOmW0huUCa.jpg', 'Navigasi yang sederhana dan tampilan yang bersih membuat situs Kominfo sangat ramah pengguna. Berita dan kebijakan terbaru seputar teknologi informasi Indonesia dapat diakses dengan cepat dan mudah', '2023-11-26 06:53:04', '2023-11-26 06:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `ma_settings`
--

CREATE TABLE `ma_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `web_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_tag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_tag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maps_location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application` int(11) DEFAULT NULL,
  `granted` int(11) DEFAULT NULL,
  `rejected` int(11) DEFAULT NULL,
  `objected` int(11) DEFAULT NULL,
  `ikm` int(11) DEFAULT NULL,
  `is_online` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT 'Y',
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ma_settings`
--

INSERT INTO `ma_settings` (`id`, `web_name`, `web_description`, `about`, `home_text`, `home_image`, `home_tag`, `web_tag`, `web_phone`, `web_email`, `web_address`, `maps_location`, `web_logo`, `application`, `granted`, `rejected`, `objected`, `ikm`, `is_online`, `facebook`, `twitter`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(4, 'Dinas Energi dan Sumber Daya Mineral Provinsi Jawa Tengah', '-', '<p><span style=\"font-family: &quot;Source Sans Pro&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; letter-spacing: normal;\">Peran Dinas Energi dan Sumber Daya Mineral (ESDM) Provinsi Jawa Tengah menjadi semakin penting sebagai salah satu komponen untuk mewujudkan program peningkatan ekonomi dan penguatan infrastruktur guna memperkuat kehidupan perekonomian rakyat.</span><br></p>', NULL, NULL, NULL, 'Dinas Energi dan Sumber Daya Mineral,ESDM,ESDM Jateng', '+6224 7608203', 'esdm@jatengprov.go.id', 'Jl. Madukoro AA-BB No.44 Semarang 50144', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31682.425587773974!2d110.38185591303082!3d-6.973587810201888!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70f4c6a1903aeb:0xc9375164cd84a6b8!2sDinas Energi dan Sumber Daya Mineral Provinsi Jawa Tengah!5e0!3m2!1sid!2sid!4v1625555001306!5m2!1sid!2sid', 'undefined', 61, 49, 12, 0, 1457, 'Y', 'https://www.facebook.com/ESDMJateng', 'https://twitter.com/ESDMJateng', 'https://www.instagram.com/esdm_jateng/', 'https://www.youtube.com/channel/UC0D2l2SLd8jP7rEM0GieMUA', '2023-11-13 01:55:59', '2023-11-19 06:50:22');

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
(1, 1, 'ESDM Provinsi Jateng', 'assets/slide/fgsebNNweoLKBpDqjDLwVmFfcQOW6Dx0fysJj0TV.png', '-', 'Y', '2023-10-24 22:00:49', '2023-11-18 21:39:01'),
(2, 2, '11 capacity building', 'assets/slide/k72s3sGxlOBzrNxQ1Hd6fU0r49WCI8AEDiM8ycso.jpg', '-', 'Y', '2023-11-18 21:31:53', '2023-11-18 21:34:36'),
(3, 3, 'Tim Pertimbangan PPID Dinas ESDM', 'assets/slide/XiNh4ZUSUWmNwFzCD3n32Vf8C8OHYcC2tn961PHT.jpg', '-', 'Y', '2023-11-18 21:32:15', '2023-11-18 21:34:41');

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
(35, '2023_10_23_015042_create_custom_templates_table', 1),
(37, '2023_11_25_034656_create_ma_reviews_table', 2);

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
(2, 'homeanggaran', 'Ringkasan RKO', NULL, 'Rencana Kerja Operasional Pelaksanaan APBD Dinas Energi Dan Sumber Daya Mineral Provinsi Jawa Tengah', NULL, 'drive.google.com/file/d/1puSwUYMfp30BTmRsc_UcpHhm_l9CriJB/view', NULL, NULL, 'Y', '2023-10-29 23:24:12', '2023-10-29 23:24:12'),
(5, 'homeanggaran', 'Ringkasan DPA', NULL, 'Ringkasan Dokumen Pelaksanaan Anggaran (DPA) Bidang dan Balai Dinas Energi Dan Sumber Daya Mineral Provinsi Jawa Tengah', NULL, 'drive.google.com/file/d/1AUuoCbmvzjSXrsIlj7JL20nusGUCb4vP/view', NULL, NULL, 'Y', '2023-11-18 22:13:55', '2023-11-18 22:13:55'),
(6, 'homeanggaran', 'Ringkasan RKA', NULL, 'Rencana Kerja Dan Anggaran (RKA) Bidang dan Balai Dinas Energi Dan Sumber Daya Mineral Provinsi Jawa Tengah', NULL, 'drive.google.com/file/d/1pg1ASqdoxTgUIFPz78r4ye_l1l83QOl9/view', NULL, NULL, 'Y', '2023-11-18 22:14:21', '2023-11-18 22:14:21'),
(7, 'homeanggaran', 'Neraca', NULL, 'Neraca/ Laporan Posisi Keuangan (Balance Sheet atau Statement of Financial Position) Dinas ESDM Provinsi Jawa Tengah', NULL, 'drive.google.com/file/d/13UBbs4uxSEvSQw7RhuyiDgF1_MV34WVj/view', NULL, NULL, 'Y', '2023-11-18 22:14:38', '2023-11-18 22:14:38'),
(8, 'homeanggaran', 'Aset & Investasi', NULL, 'Aset atau Aktiva dan Investasi sebagai Sumber Daya atau Kekayaan yang dimiliki oleh Dinas ESDM Provinsi Jawa Tengah', NULL, 'drive.google.com/file/d/16cuZjapYRnnWmdN9y1l5G8pkJQhTxxuz/view', NULL, NULL, 'Y', '2023-11-18 22:15:06', '2023-11-18 22:15:06'),
(9, 'homeanggaran', 'Laporan Ekuitas', NULL, 'Hak Residual atas Aktiva Perusahaan setelah dikurangi semua kewajiban dalam neraca Dinas ESDM Provinsi Jawa Tengah', NULL, 'drive.google.com/file/d/13u-SiLR8d5V306k9f0zGZ2w_kc5oeXJd/view', NULL, NULL, 'Y', '2023-11-18 22:15:33', '2023-11-18 22:15:33'),
(10, 'homeanggaran', 'CALK', NULL, 'Laporan Realisasi Anggaran (LRA), Neraca dan Laporan Arus Kas (LAK) dalam rangka pengungkapan yang memadai.', NULL, 'drive.google.com/file/d/1bttlUIUfZn4kb69znvUJH2zoH9at_0SM/view', NULL, NULL, 'Y', '2023-11-18 22:15:54', '2023-11-18 22:15:54'),
(11, 'homeanggaran', 'RFK', NULL, 'Laporan Realisasi Keuangan Bulanan Dinas ESDM Provinsi Jawa Tengah', NULL, 'drive.google.com/file/d/1DO6Pxb5vGKBJzLIXE-8dVB4tBSXBoLp1/view', NULL, NULL, 'Y', '2023-11-18 22:16:09', '2023-11-18 22:16:09'),
(12, 'homeanggaran', 'Realisasi Pendapatan', NULL, 'Realisasi Pendapatan Dinas ESDM Provinsi Jawa Tengah', NULL, 'drive.google.com/file/d/1mvr6hIE7OEy7r9B9seMmLsVILg9WcOAV/view', NULL, NULL, 'Y', '2023-11-18 22:16:29', '2023-11-18 22:16:29'),
(13, 'homeanggaran', 'LRA', NULL, 'Laporan Realisasi Anggaran Dinas ESDM Provinsi Jawa Tengah', NULL, 'https://drive.google.com/file/d/1VqPH4n60JMtpjuF2GVfWjaVDxNu5SLfW/view?usp=sharing', NULL, NULL, 'Y', '2023-11-18 22:16:49', '2023-11-18 22:16:49'),
(14, 'homeanggaran', 'Restra', NULL, 'Rencana Strategis Dinas ESDM Provinsi Jawa Tengah Tahun 2018-2023', NULL, 'drive.google.com/file/d/1X5yiLYjNb7_cdhUbuS_62rHvL400HK0j/view?usp=sharing', NULL, NULL, 'Y', '2023-11-18 22:17:10', '2023-11-18 22:17:10');

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
(1, 'admin', 'admin', NULL, '$2y$10$uTGazv/Ug9AmAzXMg1ZuGetX1hN0bQTDBVtIoIOCWwkKF1pd1GZa6', NULL, 1, '2023-11-25 22:21:42', 'Y', NULL, '2023-10-24 01:43:53', '2023-11-25 22:21:42'),
(2, 'admin2 oke oke', 'admin2', NULL, '$2y$10$suEg5MharXTkU1b/5usFHOXBe7sTzeKA.yjRfkTiFKrvmSZf5cV6G', NULL, 2, '2023-11-03 02:57:45', 'Y', NULL, '2023-10-24 01:46:21', '2023-11-02 20:12:55'),
(3, 'user', 'user', NULL, '$2y$10$yigeE5nUtokVQAH7Bv0TgOiG4dagSm2iZ2KFqhpbWIIZU67OHKWoa', 1, 2, '2023-11-25 23:10:20', 'Y', NULL, '2023-10-24 01:46:45', '2023-11-25 23:10:20'),
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
-- Indexes for table `ma_reviews`
--
ALTER TABLE `ma_reviews`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lhkpns`
--
ALTER TABLE `lhkpns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ma_agendas`
--
ALTER TABLE `ma_agendas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ma_categories`
--
ALTER TABLE `ma_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ma_contacts`
--
ALTER TABLE `ma_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ma_downloads`
--
ALTER TABLE `ma_downloads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ma_galleries`
--
ALTER TABLE `ma_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ma_hall_menus`
--
ALTER TABLE `ma_hall_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ma_image_galleries`
--
ALTER TABLE `ma_image_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ma_links`
--
ALTER TABLE `ma_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ma_main_regulations`
--
ALTER TABLE `ma_main_regulations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ma_official_ppid_profiles`
--
ALTER TABLE `ma_official_ppid_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ma_pollings`
--
ALTER TABLE `ma_pollings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ma_posts`
--
ALTER TABLE `ma_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ma_profiles`
--
ALTER TABLE `ma_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ma_regulations`
--
ALTER TABLE `ma_regulations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT for table `ma_reviews`
--
ALTER TABLE `ma_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ma_settings`
--
ALTER TABLE `ma_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ma_slides`
--
ALTER TABLE `ma_slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ma_videos`
--
ALTER TABLE `ma_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
