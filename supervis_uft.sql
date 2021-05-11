-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2021 at 05:16 PM
-- Server version: 5.7.33-cll-lve
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supervis_uft`
--

-- --------------------------------------------------------

--
-- Table structure for table `decan`
--

CREATE TABLE `decan` (
  `id` int(255) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `decan_name` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `decan`
--

INSERT INTO `decan` (`id`, `name`, `decan_name`, `document`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(10, 'Ingenieria', 'Dra. Rebeca Rivas', '7352108', '04245219499', 'decanato@gmail.com', '2021-04-18 11:39:53', '2021-04-18 11:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `lapse`
--

CREATE TABLE `lapse` (
  `id` int(255) NOT NULL,
  `lapse` varchar(100) DEFAULT NULL,
  `date_range` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lapse`
--

INSERT INTO `lapse` (`id`, `lapse`, `date_range`, `created_at`, `updated_at`) VALUES
(5, '2020/04', '01/04/2021 - 20/08/2021', '2021-04-18 11:41:59', '2021-04-18 11:41:59'),
(6, '2021/01', '02/05/2021 - 09/07/2021', '2021-04-18 11:42:24', '2021-04-18 11:42:24');

-- --------------------------------------------------------

--
-- Table structure for table `parameter`
--

CREATE TABLE `parameter` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `subject_id` int(255) NOT NULL,
  `lapse_id` int(255) NOT NULL,
  `decan_id` int(255) DEFAULT NULL,
  `school_id` int(255) DEFAULT NULL,
  `stage_id` int(255) NOT NULL,
  `section_id` int(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `perfil` varchar(255) DEFAULT '-',
  `forum_info` varchar(255) DEFAULT '-',
  `welcome_course` varchar(255) DEFAULT '-',
  `welcome_video` varchar(255) DEFAULT '-',
  `folder` varchar(255) DEFAULT '-',
  `forum_info_use` varchar(255) DEFAULT '-',
  `forum_doubts` varchar(255) DEFAULT '-',
  `delivery_notes` varchar(255) DEFAULT '-',
  `tools_use` varchar(255) DEFAULT '-',
  `interaction` varchar(255) DEFAULT '-',
  `feedback` varchar(255) DEFAULT '-',
  `final_notes` varchar(255) DEFAULT '-',
  `updated` varchar(255) DEFAULT '-',
  `extracathedral` varchar(255) DEFAULT '-',
  `accomplish` varchar(255) DEFAULT '-',
  `comments` varchar(255) DEFAULT '-',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parameter`
--

INSERT INTO `parameter` (`id`, `user_id`, `subject_id`, `lapse_id`, `decan_id`, `school_id`, `stage_id`, `section_id`, `unit`, `perfil`, `forum_info`, `welcome_course`, `welcome_video`, `folder`, `forum_info_use`, `forum_doubts`, `delivery_notes`, `tools_use`, `interaction`, `feedback`, `final_notes`, `updated`, `extracathedral`, `accomplish`, `comments`, `created_at`, `updated_at`) VALUES
(35, 41, 9, 5, 10, 9, 1, 6, 'algo', 'no', 'si', 'si', 'no', 'si', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', NULL, '2021-04-18 11:49:43', '2021-04-18 11:49:43'),
(36, 41, 9, 5, 10, 9, 1, 6, 'algo', 'no', 'si', 'si', 'no', 'si', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', NULL, '2021-04-18 11:50:09', '2021-04-18 11:50:09'),
(37, 41, 9, 5, 10, 9, 2, 6, 'algo', '-', '-', '-', '-', '-', 'si', 'si', 'si', 'si', 'no', 'si', 'no', '-', '-', '-', NULL, '2021-04-18 11:51:19', '2021-04-18 11:51:19'),
(38, 41, 9, 5, 10, 9, 3, 6, 'algo', '-', '-', '-', '-', '-', 'no', 'no', 'no', 'no', 'no', 'no', 'si', '-', '-', '-', NULL, '2021-04-18 11:51:48', '2021-04-18 11:51:48'),
(39, 41, 9, 5, 10, 9, 4, 6, 'algo', '-', '-', '-', '-', '-', 'si', 'si', 'si', 'si', 'si', 'no', 'no', '-', '-', '-', NULL, '2021-04-18 11:52:10', '2021-04-18 11:52:10'),
(40, 41, 9, 5, 10, 9, 5, 6, 'algo', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'si', 'si', 'si', NULL, '2021-04-18 11:52:28', '2021-04-18 11:52:28');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('pedro@gmail.com', '$2y$10$DgC2.jQge08xDn/rk4uOuuc/TxSygnVfUrvugCa75r1Rule0ver8e', '2021-03-22 10:25:20'),
('rosa@gmail.com', '$2y$10$NHIisNk3iC8vDsMJ62qvnO.ifslIorFHQ7z8Gdv0r9Fug2eHyyqxe', '2021-04-05 02:00:30'),
('admin@gmail.com', '$2y$10$nzx.WmK6CR1vycQ0BNM9EuYZfWbtSweEV1C4XkjbI3TYCPbKP4RZO', '2021-04-05 04:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2021-03-08 16:40:13', '2021-03-08 16:40:13'),
(2, 'director', '2021-03-08 16:40:13', '2021-03-08 16:40:13'),
(3, 'operativo', '2021-03-08 16:40:13', '2021-03-08 16:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(100) NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(18, 1, 1, '2021-03-21 18:40:26', '2021-03-21 18:40:26'),
(41, 38, 2, '2021-04-12 02:42:00', '2021-04-12 02:42:00'),
(44, 41, 3, '2021-04-18 15:38:44', '2021-04-18 15:38:44');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(255) NOT NULL,
  `decan_id` int(255) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `decan_id`, `code`, `name`, `school_name`, `document`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(9, 10, '001', 'Computacion', 'Ing. Rosa Nubia Contreras', '7543761', '04245219499', 'nubia@gmail.com', '2021-04-18 11:43:15', '2021-04-18 11:43:15'),
(10, 10, '002', 'Telecomunicaciones', 'Msc. Ydaury Flores.', '7654123', '04245219499', 'flores@gmail.com', '2021-04-18 11:44:16', '2021-04-18 11:44:16');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(255) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `name`, `created_at`, `updated_at`) VALUES
(6, 'SAIA A', '2021-04-18 11:45:58', '2021-04-18 11:45:58'),
(7, 'SAIA B', '2021-04-18 11:46:09', '2021-04-18 11:46:09'),
(8, 'SAIA C', '2021-04-18 11:46:14', '2021-04-18 11:46:14');

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

CREATE TABLE `stage` (
  `id` int(255) NOT NULL,
  `stage` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stage`
--

INSERT INTO `stage` (`id`, `stage`, `created_at`, `updated_at`) VALUES
(1, 'Bloque cero', '2021-03-06 14:43:39', '2021-03-06 14:43:39'),
(2, 'Corte I', '2021-03-06 14:43:39', '2021-03-06 14:43:39'),
(3, 'Corte II', '2021-03-06 14:43:39', '2021-03-06 14:43:39'),
(4, 'Corte III', '2021-03-06 14:43:39', '2021-03-06 14:43:39'),
(5, 'Final', '2021-03-06 14:43:39', '2021-03-06 14:43:39');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(255) NOT NULL,
  `school_id` int(255) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `school_id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(9, 9, 'COI233', 'Computacion para Ingeniero.', '2021-04-18 11:44:51', '2021-04-18 11:44:51'),
(10, 9, 'INI212', 'Introducción a la Computación', '2021-04-18 11:45:19', '2021-04-18 11:45:19'),
(11, 9, 'ANA233', 'Analisis de Algoritmo', '2021-04-18 11:45:45', '2021-04-18 11:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `subject_user`
--

CREATE TABLE `subject_user` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `subject_id` int(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_user`
--

INSERT INTO `subject_user` (`id`, `user_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(16, 41, 9, '2021-04-18 11:47:20', '2021-04-18 11:47:20'),
(17, 41, 10, '2021-04-18 11:47:26', '2021-04-18 11:47:26'),
(18, 41, 11, '2021-04-18 11:47:33', '2021-04-18 11:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `lastname`, `phone`, `email`, `password`, `document`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Admin', 'admin', '04121503739', 'admin@gmail.com', '$2y$10$FZqvre7OxNd5UqpW6NiS/e4is81ehnOp4vw.ZdT5ifff.wQE6ZHbW', '4791987', '2021-03-06 14:04:24', '2021-04-12 01:54:45', '4ZMLN1cW2HczDDH1ZBc6T2y8J4hMdKPo99UJcCIcYHCuHaMMSmWHg6aSFAYO'),
(38, 'prueba', 'prueba', '04145802987', 'director@gmail.com', '$2y$10$a9VcjE0OiZQDL7U0EV2OKezncS1TS68GLB50/H8Tlw3UDFurKxJ86', '9842185', '2021-04-11 22:42:00', '2021-04-11 22:42:00', '9o4XvcFV6vQReJdsMHvla7pn15OWkGj1IxmfrpfMZF2khQRbq0738Mau33xe'),
(41, 'Tania', 'Segnini', '04245219499', 'segletty@gmail.com', '$2y$10$/sZDKWQTARqkrwmwod8VSOP1oXpaE2WgN/oZOLHy3ENaFtg7e1dAG', '6850158', '2021-04-18 11:38:44', '2021-04-18 11:38:44', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `decan`
--
ALTER TABLE `decan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lapse`
--
ALTER TABLE `lapse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_parameter_user` (`user_id`),
  ADD KEY `fk_parameter_subject` (`subject_id`),
  ADD KEY `fk_parameter_lapse` (`lapse_id`),
  ADD KEY `fk_parameter_section` (`section_id`),
  ADD KEY `fk_parameter_stage` (`stage_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `fk_role_user_id` (`user_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_school_decan` (`decan_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_subject_school` (`school_id`);

--
-- Indexes for table `subject_user`
--
ALTER TABLE `subject_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_school_user` (`user_id`),
  ADD KEY `fk_school_subject` (`subject_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `decan`
--
ALTER TABLE `decan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lapse`
--
ALTER TABLE `lapse`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `parameter`
--
ALTER TABLE `parameter`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stage`
--
ALTER TABLE `stage`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subject_user`
--
ALTER TABLE `subject_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parameter`
--
ALTER TABLE `parameter`
  ADD CONSTRAINT `fk_parameter_lapse` FOREIGN KEY (`lapse_id`) REFERENCES `lapse` (`id`),
  ADD CONSTRAINT `fk_parameter_section` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`),
  ADD CONSTRAINT `fk_parameter_stage` FOREIGN KEY (`stage_id`) REFERENCES `stage` (`id`),
  ADD CONSTRAINT `fk_parameter_subject` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`),
  ADD CONSTRAINT `fk_parameter_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `fk_role_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `school`
--
ALTER TABLE `school`
  ADD CONSTRAINT `fk_school_decan` FOREIGN KEY (`decan_id`) REFERENCES `decan` (`id`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `fk_subject_school` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`);

--
-- Constraints for table `subject_user`
--
ALTER TABLE `subject_user`
  ADD CONSTRAINT `fk_school_subject` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`),
  ADD CONSTRAINT `fk_school_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
