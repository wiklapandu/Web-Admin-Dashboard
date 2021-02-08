-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Feb 2021 pada 11.55
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginci4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-01-17-075229', 'App\\Database\\Migrations\\User', 'default', 'App', 1610870962, 1),
(2, '2021-01-17-080451', 'App\\Database\\Migrations\\UserRole', 'default', 'App', 1610870963, 1),
(3, '2021-01-17-133712', 'App\\Database\\Migrations\\UserMenu', 'default', 'App', 1610890758, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` varchar(256) NOT NULL,
  `it_active` varchar(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `it_active`, `created_at`, `updated_at`) VALUES
(1, 'Wikla Pandu', 'wiklapandu2503@gmail.com', 'image1.jpg', '$2y$10$fTTaXoksi8XByCr/M4hsPOiiqxZ6qKYpI6f5m7vvztlGo3n9ScK.e', '3', '1', '2021-01-17 04:21:54', '2021-02-01 06:58:30'),
(2, 'budi', 'budi@gmail.com', 'default.jpg', '$2y$10$/B37her3IGM0uybpwTZXrenhbTyWSTyz4UCY4dlFRBJkzuIwK8HHa', '2', '1', '2021-01-17 04:32:18', '2021-01-17 04:32:18'),
(16, 'Ilyas Niyaga Putra', 'laila.melani@padmasari.in', 'default.jpg', '$2y$10$hNrIFIl/RCR8MLjbd4AmmuxjLT6ENVCvymN4SfT88aVt0y8M7sHBi', '2', '0', NULL, NULL),
(17, 'Zahra Mayasari', 'raden78@rajasa.ac.id', 'default.jpg', '$2y$10$r35/wL2Rqz9KKfMhxTxhhODRnln7OrZ8fkRG5oWTipqkut3GUeBre', '2', '0', NULL, NULL),
(18, 'Emin Cawisadi Sihotang', 'mangunsong.rahmi@rahmawati.my.id', 'default.jpg', '$2y$10$97MRB0CfPfzYwFJaFOUWeuGSuWY/SOAnB7H1Jo2xxS/N7KpNLeZkK', '2', '0', NULL, NULL),
(19, 'Rizki Prasasta', 'laras.maheswara@wahyuni.co', 'default.jpg', '$2y$10$RV3zBYysHaCr0wxhGwUwSuv9.uXnz.WRUaF2Tg5NUfN2OsXJfE1ii', '2', '0', NULL, NULL),
(20, 'Natalia Novi Wulandari', 'nashiruddin.amelia@saputra.in', 'default.jpg', '$2y$10$RkUA6RGwog.hkwG6OD9aZeK8PvnwBZ2sIEIyKP0QhFe8pl5GaGriS', '2', '0', NULL, NULL),
(21, 'Rahman Danuja Pradana', 'ana34@yahoo.com', 'default.jpg', '$2y$10$VTm9CZkftnM/pkHXhIkiMun7gdutf1lIcGI6nsFwtWpD8xkdjVcdW', '2', '0', NULL, NULL),
(22, 'Yessi Yuliarti', 'danggriawan@yahoo.co.id', 'default.jpg', '$2y$10$/5XS.mD/HUzoXkxlbIpXz.eD1rq6/0fdHrQB6ugCbz2WFec0VBis.', '2', '0', NULL, NULL),
(23, 'Jelita Hassanah S.E.I', 'bakiman.prakasa@winarsih.tv', 'default.jpg', '$2y$10$waBHgOAGNcvRX7/GDjmUIePLVBjDDjmrosS5CDGQv5bR9PN.jk07e', '2', '0', NULL, NULL),
(24, 'Cemeti Wardi Sinaga S.Farm', 'makara68@yahoo.co.id', 'default.jpg', '$2y$10$BbeVJIS3XdEk2k.0F7R0l.VuFNfwteiCdPatpfgtYfurYmbsrHhse', '2', '0', NULL, NULL),
(25, 'Edward Ramadan S.Pd', 'prahayu@simbolon.or.id', 'default.jpg', '$2y$10$ZkEsfaRW8lHvOG9rq6O93OFwlmc2tX4FgRV2FaxAOAKhppUrnTVEC', '2', '0', NULL, NULL),
(26, 'Naradi Irsad Tarihoran', 'gsirait@gmail.com', 'default.jpg', '$2y$10$AGKMDpXjD2MY4slCfS0TkOoQeCiVEr8AGe4AFiBYfuedXGIRaqIqO', '2', '0', NULL, NULL),
(27, 'Juli Indah Hasanah S.I.Kom', 'tpuspita@gmail.com', 'default.jpg', '$2y$10$cTJHzQxnQjVTdFjJAxfVie4PR6QFT5Fgk4aqpxZdz6zB/fFNfAqc.', '2', '0', NULL, NULL),
(28, 'Darmaji Hidayat', 'ilsa.suryatmi@gmail.co.id', 'default.jpg', '$2y$10$GJQ9F0GmEfi6zmsDS6HNveaD7nZL.QqKEN8Y5Smrde/UHxQtmvaN.', '2', '0', NULL, NULL),
(29, 'Qori Fathonah Aryani M.Kom.', 'agustina.aurora@wahyudin.ac.id', 'default.jpg', '$2y$10$0ezdq2K1U5Irr61JgRvB8el4Qy0Ei2GDlW0xaHUBtX8jJPOlQeU3S', '2', '0', NULL, NULL),
(30, 'Balamantri Setiawan M.Kom.', 'ufarida@sihotang.desa.id', 'default.jpg', '$2y$10$kqHp2UTV95OBgigKhlhgAOJl/XVr2ktUp1/eVql1jD4GlOcz44bG.', '2', '0', NULL, NULL),
(31, 'Manah Dabukke', 'najmudin.olga@mahendra.web.id', 'default.jpg', '$2y$10$yvZjZY3vAX3fYMOcNd9hw.F785hUQ8uk221IQA/.iNJiwQLS4bh4K', '2', '0', NULL, NULL),
(32, 'Kayun Hasim Thamrin S.Pt', 'cawisadi33@gmail.com', 'default.jpg', '$2y$10$yzGdWz7FXw3Zr.sqOSOFGOf6qtrNFkOM50175FjGfB1Vux93hsT/i', '2', '0', NULL, NULL),
(33, 'Wani Yuliarti', 'vinsen33@gmail.co.id', 'default.jpg', '$2y$10$5VuE0wXhEfzpiBGLRWmCPe78o.tyUMYpIPxhT0QxWKUJuc461RAtK', '2', '0', NULL, NULL),
(34, 'Victoria Mulyani M.Pd', 'hani.mandasari@marbun.co.id', 'default.jpg', '$2y$10$vG5gDljB82r0VLgjhOyOseg4lbN0aqOntFKT5vG5BkFqdAiAGqqQ6', '2', '0', NULL, NULL),
(35, 'Paulin Najwa Mayasari', 'laksmiwati.yuliana@saefullah.biz', 'default.jpg', '$2y$10$nS4UEHejJjm2nI88j/OIKOq23CG4QQC0p8VOtAWLlIDRLgdeG4y7.', '2', '0', NULL, NULL),
(36, 'Emong Gaman Hakim S.IP', 'tira89@iswahyudi.com', 'default.jpg', '$2y$10$2FFCsSx6V8avNlCEMwCwcOVIaT80NMWxP3bq6o3PNocxbizurzPdO', '2', '0', NULL, NULL),
(37, 'Raden Wawan Adriansyah M.Kom.', 'lintang25@yahoo.co.id', 'default.jpg', '$2y$10$OtGgLXnBjXSCI8Tq1vCMyu.Rd1tsVQeIXREydtpnBt/SVv7op5lsS', '2', '0', NULL, NULL),
(38, 'Soleh Gangsar Kurniawan M.TI.', 'satya.anggraini@gmail.co.id', 'default.jpg', '$2y$10$aDIwKjhBt7ed0cBlxUYzIeYdEChdr4y7vujmPNk/xLZa9kEbrIdX.', '2', '0', NULL, NULL),
(39, 'Zalindra Winarsih', 'lukita.dabukke@yahoo.com', 'default.jpg', '$2y$10$fCMV85iadl37Qfm9mm7HKulO2jHJI0u1PrSBoRi.ec4i3ZJ7vahfK', '2', '0', NULL, NULL),
(40, 'Ulva Melani', 'ypurwanti@rahimah.in', 'default.jpg', '$2y$10$yQltnI1aX.USVnQZyFJgWOC5tJTM3Is7blbqqQJSNl3scJfUr15C.', '2', '0', NULL, NULL),
(41, 'Jumari Nasab Mahendra', 'kamaria.marpaung@gmail.com', 'default.jpg', '$2y$10$gQykHndPA2sfFDonkzlC0eT5oKP1OQEdMfSzT7rTNklgXcvo2UUry', '2', '0', NULL, NULL),
(42, 'Muni Irawan', 'surya.yuniar@hutagalung.sch.id', 'default.jpg', '$2y$10$byL76/5cCRQ2tPX/KK9dE.4GilN2brGKRcJV5xEGmSWoWEZwMnJUK', '2', '0', NULL, NULL),
(43, 'Cindy Yulianti', 'pratiwi.ida@gmail.com', 'default.jpg', '$2y$10$4bgJKQUu7fpv0xXNbsRXPOqoecbQ7SoEY6wzZwlmhApDBgVVI1SxG', '2', '0', NULL, NULL),
(44, 'Daliono Darimin Prasasta S.Ked', 'tari56@maulana.id', 'default.jpg', '$2y$10$N7tQOvj4NrPE7mCqz19loe/Xx4vMnyoYlGaGbuHEh5zrRvadlhTly', '2', '0', NULL, NULL),
(45, 'Digdaya Purwadi Tamba', 'wsantoso@pudjiastuti.mil.id', 'default.jpg', '$2y$10$gFeh5soKbO2G35pYqiOwkuRd4TAHxIG9KV63SbB7q0RLtyeBgY7bO', '2', '0', NULL, NULL),
(46, 'Jasmin Nurdiyanti', 'yuliana99@gmail.co.id', 'default.jpg', '$2y$10$r3W7xcZFo6byu0EQR9L5D.jtdRe6D5IGVJqSjnU3Moz/LQli/uubS', '2', '0', NULL, NULL),
(47, 'Kani Kuswandari', 'lestari.amalia@mandasari.asia', 'default.jpg', '$2y$10$2sFQyMImOR2ZgD7IEJI7kOPLMNuPi4.AnyvM4yxzLMa5LbJ9cWs1W', '2', '0', NULL, NULL),
(48, 'Langgeng Kunthara Iswahyudi', 'gmaryadi@gmail.co.id', 'default.jpg', '$2y$10$Ir9AmTsXtrIMym49ZPGv1eOgoK6/TT6akcz5NioqkALizt72tc54a', '2', '0', NULL, NULL),
(49, 'Cici Yuliarti', 'caket39@yahoo.com', 'default.jpg', '$2y$10$OIiWNmdB4oEOjZzsFY9iC.P8ZQki8k94oJW4lLNrCRkth145Zq7R2', '2', '0', NULL, NULL),
(50, 'Dewi Sabrina Namaga S.E.I', 'usada.restu@gmail.com', 'default.jpg', '$2y$10$WSvy4AylyfCpwE47CUY6YOfrTEeOaxRmNSI9dYCZumFp9DTw0tVqy', '2', '0', NULL, NULL),
(51, 'Ami Janet Widiastuti', 'bbudiman@yahoo.com', 'default.jpg', '$2y$10$AUb.3hC2DyQEg0nvzbbimeiptQVnDmLZpPYQhd1X5/1a2dlcvSINe', '2', '0', NULL, NULL),
(52, 'Chandra Saragih', 'mayasari.tina@gmail.com', 'default.jpg', '$2y$10$oZMUNI2UtbmMgyl1aFdi1ObAnTgQvxdGVZSKrdjIj0cQr/Q0fYn/O', '2', '0', NULL, NULL),
(53, 'Elma Uyainah', 'permata.gambira@habibi.mil.id', 'default.jpg', '$2y$10$fTTd0xf.uD1CWXQ5IbIFdODDsEaTqHqObx9o8HA.eBOfd37jOEtVe', '2', '0', NULL, NULL),
(54, 'Septi Oktaviani', 'nmardhiyah@gmail.com', 'default.jpg', '$2y$10$0l81lmYYc26EuXI5/6cuJedOs9oDyYEWYQaW/ELuYPH58Eb7gfcQ6', '2', '0', NULL, NULL),
(55, 'Saka Utama', 'pratiwi.dwi@nurdiyanti.sch.id', 'default.jpg', '$2y$10$dsMED24f8Y8ewngpmz0HeOpv9kKvMJrDPyrwK3HY1cPTMWSUQhZGO', '2', '0', NULL, NULL),
(56, 'Purwanto Xanana Wahyudin S.Psi', 'muhammad52@gmail.com', 'default.jpg', '$2y$10$ReCEhpwn8/b8okBce2RBu.vI2IBPSK5Zs0x1UNtu8OUu0nRgf7Nr.', '2', '0', NULL, NULL),
(57, 'Ian Nashiruddin M.M.', 'elma53@maryadi.tv', 'default.jpg', '$2y$10$draYIC93xwenFp.Ca.jSXOftMBDXnoCzB10aK65LXhTythiFx.jA6', '2', '0', NULL, NULL),
(58, 'Jail Siregar S.Psi', 'rsuryatmi@hartati.com', 'default.jpg', '$2y$10$Z2.5QL/UZ4lq2N7b4wVXeujTHkLCfyw6jPJ5h4ECcbyguOywwEnMK', '2', '0', NULL, NULL),
(59, 'Laila Keisha Usamah S.IP', 'puspita.prabawa@hidayanto.asia', 'default.jpg', '$2y$10$pom3Uf26HG/BwRvH.jT3s.4IylQ2lo66gmFCkg6VSFq9W.a3YotDK', '2', '0', NULL, NULL),
(60, 'Gandi Bagiya Putra', 'mpratama@gmail.co.id', 'default.jpg', '$2y$10$rYukwaCkvoWlbwgD8tdnFuboI1VhxTrb.ARPfqZeJwOYSFMk5eVHe', '2', '0', NULL, NULL),
(61, 'Alika Wulandari', 'vanya.thamrin@saragih.tv', 'default.jpg', '$2y$10$mtKnP8YiSctX9LMbjKsnzerxIkw.20SbR.Xga1yK77QiO61eq4AXK', '2', '0', NULL, NULL),
(62, 'Yono Zulkarnain', 'oliva32@lazuardi.id', 'default.jpg', '$2y$10$QJFiofH2ucIVhTga/vdQUelOQx2Ti9dp3BdHgM2mXS.reKYo7JN7y', '2', '0', NULL, NULL),
(63, 'Elisa Mila Namaga S.Pt', 'bsaragih@yahoo.com', 'default.jpg', '$2y$10$Db5FvOm9/ksq.DCuJS..hub6W07bn0JFhN.mSJa7RJOSwdJn4sCg6', '2', '0', NULL, NULL),
(64, 'Tira Jane Aryani M.Ak', 'rahayu.laras@mulyani.or.id', 'default.jpg', '$2y$10$Ua4MVkLMQTViEQWVIhC21.gshAN0aQyb89opVs26A9dOR7t.DmFH2', '2', '0', NULL, NULL),
(65, 'Nardi Bahuwirya Mansur S.Pd', 'mwinarno@mustofa.mil.id', 'default.jpg', '$2y$10$nzlka9pbQ8z7BnbsIN6z8uuw1jPJIhxkZpY5LVtRuuR3VL2/4T0xS', '2', '0', NULL, NULL),
(66, 'Ade Laksita', 'rsetiawan@nasyidah.asia', 'default.jpg', '$2y$10$FV5Qib5QK9BKYGJpzPplH.lVQqdd7XqFTdWJSZF7IjLBtXNbuOoDK', '2', '0', NULL, NULL),
(67, 'Humaira Salimah Nurdiyanti', 'musamah@yahoo.co.id', 'default.jpg', '$2y$10$/YcujWhu/47RJu5UCgUUXOsNbEZCeE9VjuFD6sxnsVPKZzZcIprzi', '2', '0', NULL, NULL),
(68, 'Jessica Mandasari', 'asman10@yahoo.com', 'default.jpg', '$2y$10$fPrjveVddGv7bprAP85GSeksGxcq7FJ2YLEdMmOBVxCSBzFm4DdAS', '2', '0', NULL, NULL),
(69, 'Uchita Oktaviani', 'wisnu.purwanti@yahoo.com', 'default.jpg', '$2y$10$XBUqziNTGcXsu1oQAdbm0O9v/zm9pJ6gkrNsqvgnJsRBiTrZXzgKC', '2', '0', NULL, NULL),
(70, 'Violet Suartini', 'cakrawangsa15@yahoo.co.id', 'default.jpg', '$2y$10$NphNEZpNTq18YNVKl2iHZ.wl0XtbEdhQbAvPpC/4DXZYNrF5jGvWC', '2', '0', NULL, NULL),
(71, 'Ratih Suryatmi', 'puji.pertiwi@kusmawati.desa.id', 'default.jpg', '$2y$10$G/UhMicEm96HTtJwP2JiluSoRJ6TK/AgklmqLVzXOOxYn.7RIzMUq', '2', '0', NULL, NULL),
(72, 'Legawa Sinaga', 'cici75@gmail.com', 'default.jpg', '$2y$10$rKm7Ix4fLJQFHXKLhqvWBuX70RZ/FOt9hz2EJC9SQMaom6yXXE73G', '2', '0', NULL, NULL),
(73, 'Raina Pudjiastuti S.E.I', 'siregar.yuni@tampubolon.go.id', 'default.jpg', '$2y$10$UNDD7hS8oCOdJDOJRaT9l.CZqyOpf4chq58h3s8jeTYTWGf4301N6', '2', '0', NULL, NULL),
(74, 'Imam Pranowo', 'srajasa@yuliarti.co', 'default.jpg', '$2y$10$LWmPNV00lbcus33knrsCI.yXJrOFLW.MD3K4Kr.j86Oi6RtAOeMHW', '2', '0', NULL, NULL),
(75, 'Mulyono Kairav Rajata', 'ilestari@putra.my.id', 'default.jpg', '$2y$10$7o792T9tvU9h6EtyU3Da1ekyR1CdwTSTsIAEoOEA4oyNFSDx3cfTm', '2', '0', NULL, NULL),
(77, 'Pandu Wanso', 'panduwanso@gmail.com', 'default.jpg', '$2y$10$jQu4QsCAHMNZLF7clAr1qeVCy8zhx6xVVqvbpmIt35Z3XXQBa.c1u', '2', '1', '2021-02-03 10:34:20', '2021-02-03 10:34:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(6, 2, 3),
(25, 1, 5),
(28, 1, 3),
(29, 1, 2),
(31, 3, 3),
(32, 3, 1),
(33, 3, 6),
(34, 3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Author'),
(2, 'Admin'),
(3, 'User'),
(6, 'Menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Author');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 2, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 3, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 3, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 6, 'Menu Management', 'menu', 'fas fa-folder fa-fw', 1),
(5, 6, 'Submenu Management', 'menu/submenu', 'fas fa-folder-open fa-fw', 1),
(11, 2, 'Role', 'admin/role', 'fas fa-fw fa-user', 1),
(13, 2, 'Charts', 'admin/charts', 'fas fa-fw fa-chart-area', 1),
(14, 3, 'Change Password', 'user/changepassword', 'fas fa-key fa-fw', 1),
(15, 1, 'Users', 'author', 'fas fa-users fa-fw', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
