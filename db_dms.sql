-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2022 at 08:33 AM
-- Server version: 8.0.29
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dms`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint UNSIGNED NOT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `activity` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `document_id` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int UNSIGNED NOT NULL,
  `document_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `createdby` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updatedby` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document_attachments`
--

CREATE TABLE `document_attachments` (
  `id` bigint UNSIGNED NOT NULL,
  `document_id` int NOT NULL,
  `efile` text COLLATE utf8mb4_unicode_ci,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `createdby` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updatedby` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_types`
--

CREATE TABLE `file_types` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_files` int NOT NULL,
  `labels` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_validations` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_maxsize` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `createdby` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updatedby` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menugroups`
--

CREATE TABLE `menugroups` (
  `id` bigint UNSIGNED NOT NULL,
  `menugroup` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `groupicon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `_index` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `createdby` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updatedby` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menugroups`
--

INSERT INTO `menugroups` (`id`, `menugroup`, `groupicon`, `_index`, `created_at`, `updated_at`, `createdby`, `updatedby`) VALUES
(1, 'MASTER', '', 1, '2022-07-26 02:12:00', NULL, 'sys-admin', ''),
(2, 'SETTINGS', '', 3, '2022-07-26 02:12:09', NULL, 'sys-admin', ''),
(3, 'TRANSACTION', '', 2, '2022-07-26 02:12:09', NULL, 'sys-admin', ''),
(5, 'PROCUREMENT', NULL, 4, '2022-07-26 23:07:03', NULL, 'husnulmub@gmail.com', 'husnulmub@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `menuroles`
--

CREATE TABLE `menuroles` (
  `menuid` int NOT NULL,
  `roleid` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `createdby` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updatedby` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menuroles`
--

INSERT INTO `menuroles` (`menuid`, `roleid`, `created_at`, `updated_at`, `createdby`, `updatedby`) VALUES
(1, 1, '2022-07-26 02:20:34', NULL, 'sys-admin', ''),
(1, 2, '2022-07-26 03:07:15', NULL, 'husnulmub@gmail.com', NULL),
(2, 1, '2022-07-26 02:20:34', NULL, 'sys-admin', ''),
(2, 2, '2022-07-26 03:07:19', NULL, 'husnulmub@gmail.com', NULL),
(3, 1, '2022-07-26 02:21:08', NULL, 'sys-admin', ''),
(4, 1, '2022-07-26 02:21:32', NULL, 'sys-admin', ''),
(5, 1, '2022-07-26 02:21:32', NULL, 'sys-admin', ''),
(6, 1, '2022-07-26 02:21:32', NULL, 'sys-admin', ''),
(6, 2, '2022-07-26 03:07:26', NULL, 'husnulmub@gmail.com', NULL),
(7, 1, '2022-07-26 18:07:53', NULL, 'husnulmub@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menugroup` int DEFAULT NULL,
  `menu_idx` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `createdby` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updatedby` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `route`, `menugroup`, `menu_idx`, `created_at`, `updated_at`, `createdby`, `updatedby`) VALUES
(1, 'Master Approval', 'master/approval', 1, 1, '2022-07-26 02:12:52', NULL, 'sys-admin', ''),
(2, 'Document Type', 'master/doctype', 1, 2, '2022-07-26 02:12:52', NULL, 'sys-admin', ''),
(3, 'Document Area', 'master/docarea', 1, 3, '2022-07-26 02:12:52', NULL, 'sys-admin', ''),
(4, 'Users', 'config/users', 2, 7, '2022-07-26 02:12:52', NULL, 'sys-admin', ''),
(5, 'Roles', 'config/roles', 2, 9, '2022-07-26 02:12:52', NULL, 'sys-admin', ''),
(6, 'Document', 'transaction/document', 3, 4, '2022-07-26 02:12:52', NULL, 'sys-admin', ''),
(7, 'Menus', 'config/menus', 2, 8, '2022-07-26 02:12:52', NULL, 'sys-admin', 'husnulmub@gmail.com');

--
-- Triggers `menus`
--
DELIMITER $$
CREATE TRIGGER `deleteMenuAssignment` AFTER DELETE ON `menus` FOR EACH ROW DELETE FROM menuroles WHERE menuid = OLD.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_06_27_031456_create_file_types_table', 1),
(5, '2022_06_27_035543_create_roles_table', 1),
(6, '2022_06_27_035921_create_menugroups_table', 1),
(7, '2022_06_27_035945_create_menus_table', 1),
(8, '2022_06_27_040346_create_menuroles_table', 1),
(9, '2022_06_27_040422_create_userroles_table', 1),
(10, '2022_06_27_041244_create_activities_table', 1),
(11, '2022_06_27_041402_update_activities_add_field_document_table', 1),
(12, '2022_06_27_041507_create_documents_table', 1),
(13, '2022_06_27_042159_create_document_attachments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `rolename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rolestatus` int NOT NULL,
  `createdby` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updatedby` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `rolename`, `rolestatus`, `createdby`, `updatedby`, `created_at`, `updated_at`) VALUES
(1, 'SYS-ADMIN', 1, 'sys-admin', '', '2022-01-26 02:45:03', NULL),
(2, 'APPROVAL1', 1, 'husnulmub@gmail.com', NULL, '2022-07-26 01:07:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `userid` int NOT NULL,
  `roleid` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `createdby` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updatedby` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`userid`, `roleid`, `created_at`, `updated_at`, `createdby`, `updatedby`) VALUES
(1, 1, '2022-07-26 02:19:44', NULL, 'sys-admin', ''),
(1, 2, '2022-07-26 03:07:08', NULL, 'husnulmub@gmail.com', NULL),
(2, 2, '2022-07-26 03:07:14', NULL, 'husnulmub@gmail.com', NULL),
(3, 2, '2022-07-26 03:07:14', NULL, 'husnulmub@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `createdby` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updatedby` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `createdby`, `updatedby`) VALUES
(1, 'Administrator', 'husnulmub@gmail.com', 'sys-admin', NULL, '$2y$12$YdMPvKhIfJUuAkI32jDIlevVSU1RB.yd5ptte/Y/.5zOBMGRgi3z2', NULL, '2022-07-26 07:36:29', NULL, '', ''),
(2, 'creator1', 'creator1@mail.com', 'creator1', NULL, '$2y$12$mbAxuK4OKofBrtkxHI1Swe/pC87eoBaBPEGQ4tOfjt0NGE6D1rnoy', NULL, NULL, NULL, 'husnulmub@gmail.com', NULL),
(3, 'Approval1 Update', 'approval1@mail.com', 'approval1', NULL, '$2y$12$/wjOyJ1xp8mCYi1ueUW2luwsZqPs00udNqcCPJEGvZCB6W4B0kuZ6', NULL, NULL, NULL, 'husnulmub@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_menuroles`
-- (See below for the actual view)
--
CREATE TABLE `v_menuroles` (
`menuid` int
,`roleid` int
,`rolename` varchar(50)
,`name` varchar(100)
,`menugroup` int
,`group` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_usermenus`
-- (See below for the actual view)
--
CREATE TABLE `v_usermenus` (
`id` bigint unsigned
,`menu_desc` varchar(100)
,`route` varchar(100)
,`menugroup` int
,`menu_idx` int
,`groupname` varchar(50)
,`groupicon` varchar(50)
,`group_idx` int
,`roleid` int
,`rolename` varchar(50)
,`userid` int
,`name_of_user` varchar(100)
,`email` varchar(100)
,`username` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_userroles`
-- (See below for the actual view)
--
CREATE TABLE `v_userroles` (
`roleid` int
,`rolename` varchar(50)
,`userid` int
,`name` varchar(100)
,`email` varchar(100)
,`username` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `v_menuroles`
--
DROP TABLE IF EXISTS `v_menuroles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_menuroles`  AS SELECT `a`.`menuid` AS `menuid`, `a`.`roleid` AS `roleid`, `c`.`rolename` AS `rolename`, `b`.`name` AS `name`, `b`.`menugroup` AS `menugroup`, `d`.`menugroup` AS `group` FROM (((`menuroles` `a` join `menus` `b` on((`a`.`menuid` = `b`.`id`))) join `roles` `c` on((`a`.`roleid` = `c`.`id`))) left join `menugroups` `d` on((`b`.`menugroup` = `d`.`id`))) ORDER BY `a`.`menuid` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `v_usermenus`
--
DROP TABLE IF EXISTS `v_usermenus`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_usermenus`  AS SELECT `a`.`id` AS `id`, `a`.`name` AS `menu_desc`, `a`.`route` AS `route`, `a`.`menugroup` AS `menugroup`, `a`.`menu_idx` AS `menu_idx`, `g`.`menugroup` AS `groupname`, `g`.`groupicon` AS `groupicon`, `g`.`_index` AS `group_idx`, `b`.`roleid` AS `roleid`, `c`.`rolename` AS `rolename`, `d`.`userid` AS `userid`, `f`.`name` AS `name_of_user`, `f`.`email` AS `email`, `f`.`username` AS `username` FROM (((((`menus` `a` join `menuroles` `b` on((`a`.`id` = `b`.`menuid`))) join `roles` `c` on((`b`.`roleid` = `c`.`id`))) join `userroles` `d` on((`b`.`roleid` = `d`.`roleid`))) join `users` `f` on((`d`.`userid` = `f`.`id`))) left join `menugroups` `g` on((`a`.`menugroup` = `g`.`id`))) ORDER BY `a`.`menu_idx` ASC, `g`.`_index` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `v_userroles`
--
DROP TABLE IF EXISTS `v_userroles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_userroles`  AS SELECT `a`.`roleid` AS `roleid`, `c`.`rolename` AS `rolename`, `a`.`userid` AS `userid`, `b`.`name` AS `name`, `b`.`email` AS `email`, `b`.`username` AS `username` FROM ((`userroles` `a` join `users` `b` on((`a`.`userid` = `b`.`id`))) join `roles` `c` on((`a`.`roleid` = `c`.`id`))) ORDER BY `c`.`id` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_created_by_foreign` (`created_by`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_attachments`
--
ALTER TABLE `document_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `file_types`
--
ALTER TABLE `file_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menugroups`
--
ALTER TABLE `menugroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menuroles`
--
ALTER TABLE `menuroles`
  ADD PRIMARY KEY (`menuid`,`roleid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`userid`,`roleid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document_attachments`
--
ALTER TABLE `document_attachments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_types`
--
ALTER TABLE `file_types`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menugroups`
--
ALTER TABLE `menugroups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
