

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` mediumtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `sold` int(11) NOT NULL DEFAULT '0',
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO categories (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('1','Ohui','ohui','0','2021-04-13 11:08:04','2021-04-14 01:13:08','');

INSERT INTO categories (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('3','Ohui Dưỡng Trắng','ohui-duong-trang','1','2021-04-13 11:22:22','2021-04-15 16:07:35','');

INSERT INTO categories (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('4','Ohui Thefirst Tái Sinh','ohui-thefirst-tai-sinh','1','2021-04-15 12:13:44','2021-04-15 12:13:44','');

INSERT INTO categories (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('5','Ohui Prime Advancer','ohui-prime-advancer','1','2021-04-15 12:13:54','2021-04-15 12:13:54','');

INSERT INTO categories (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('6','Ohui Dưỡng Ẩm','ohui-duong-am','1','2021-04-15 12:14:04','2021-04-16 01:05:48','');

INSERT INTO categories (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('7','Whoo','whoo','0','2021-04-15 12:17:06','2021-04-15 12:17:06','');

INSERT INTO categories (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('8','Whoo Bichup','whoo-bichup','7','2021-04-15 12:17:30','2021-04-15 12:17:30','');

INSERT INTO categories (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('9','Whoo Dưỡng Trắng Trị Nám','whoo-duong-trang-tri-nam','7','2021-04-15 12:17:40','2021-04-15 12:17:40','');

INSERT INTO migrations (`id`, `migration`, `batch`) VALUES 
('1','2014_10_12_000000_create_users_table','1');

INSERT INTO migrations (`id`, `migration`, `batch`) VALUES 
('2','2014_10_12_100000_create_password_resets_table','1');

INSERT INTO migrations (`id`, `migration`, `batch`) VALUES 
('3','2019_08_19_000000_create_failed_jobs_table','1');

INSERT INTO migrations (`id`, `migration`, `batch`) VALUES 
('5','2021_04_13_082524_create_categories_table','2');

INSERT INTO migrations (`id`, `migration`, `batch`) VALUES 
('7','2021_04_13_135639_add_deleted_at_catrgories_table','3');

INSERT INTO migrations (`id`, `migration`, `batch`) VALUES 
('9','2021_04_15_105051_create_products_table','4');

INSERT INTO products (`id`, `name`, `price`, `desc`, `image`, `amount`, `sold`, `category_id`, `created_at`, `updated_at`) VALUES 
('1','Set kem mắt tái sinh Ohui The First Geniture Eye Cream Edition Grand Blue','4,140,000','','83-1586781803-myphamohui-lgvina.png','0','0','4','','');

INSERT INTO products (`id`, `name`, `price`, `desc`, `image`, `amount`, `sold`, `category_id`, `created_at`, `updated_at`) VALUES 
('2','Set sữa rửa mặt Ohui Thefirst tái sinh','2,700,000','','83-1586773435-myphamohui-lgvina.png','0','0','4','','');

INSERT INTO products (`id`, `name`, `price`, `desc`, `image`, `amount`, `sold`, `category_id`, `created_at`, `updated_at`) VALUES 
('3','Set dưỡng trắng Ohui Extreme White','1,080,000','','83-1576213241-myphamohui-lgvina.png','0','0','3','','');

INSERT INTO products (`id`, `name`, `price`, `desc`, `image`, `amount`, `sold`, `category_id`, `created_at`, `updated_at`) VALUES 
('4','Sữa rửa mặt dưỡng trắng Ohui Extreme White Foam Snow
vitamin','7,290,000','','83-1574768095-myphamohui-lgvina.png','0','0','3','','');

INSERT INTO products (`id`, `name`, `price`, `desc`, `image`, `amount`, `sold`, `category_id`, `created_at`, `updated_at`) VALUES 
('5','Kem chống lão hóa hồng nhuận Whoo Bicheop Ja Yoon Cream','4,095,000','','73-1572670473-myohui.png','0','0','8','','');

INSERT INTO products (`id`, `name`, `price`, `desc`, `image`, `amount`, `sold`, `category_id`, `created_at`, `updated_at`) VALUES 
('6','Tinh chất vàng Whoo Cheogidan Radiant Regenerating Gold Concentrate','6,390,000','','73-1573461432-myohui.png','0','0','8','','');

INSERT INTO products (`id`, `name`, `price`, `desc`, `image`, `amount`, `sold`, `category_id`, `created_at`, `updated_at`) VALUES 
('7','Set kem chống lão hóa Whoo Ja Yoon Cream','4,950,000','','83-1574924693-myphamohui-lgvina.png','0','0','9','','');

INSERT INTO users (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES 
('1','Gia Hoàng','abc@gmail.com','','$2y$10$Icy2Sdgq/IfRru8hrbxysO.ghJNeubC5lPyePle2CE.kXcikuwzly','XMzyNBPOEc72084cqpiSjNojEQ6jyH8HPTBfWmk0np7iiodzeW85y9YrFe1S','2021-04-12 16:18:27','2021-04-12 16:18:27');

INSERT INTO users (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES 
('2','Phạm Gia Hoàng','abc123@gmail.com','','$2y$10$tHMwTYLWKYoEYj5mLeVyW.LO0Ht/2rnH.4Hcfzw1ggYvHsnq/YVkq','','2021-04-12 16:19:29','2021-04-12 16:19:29');

INSERT INTO users (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES 
('3','Gia Hoàng','kaitoubinn@gmail.com','','$2y$10$EMHgtU3qheSsYVimSYSjdOUSYtWtUlNU14gZ9JFb7opElXpKP2JL.','','2021-04-12 16:20:48','2021-04-12 16:20:48');

INSERT INTO users (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES 
('4','huynh','huynhmyname@gmail,com','','$2y$10$9XgWSIjmCDLOqq36eoqgBesRWQdG4A/uxlH492EVPic9UmNlyNxaG','','2021-04-16 01:00:09','2021-04-16 01:00:09');
