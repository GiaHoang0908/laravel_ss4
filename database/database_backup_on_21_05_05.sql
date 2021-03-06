

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL DEFAULT '0',
  `desc` mediumtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `amount` int(11) NOT NULL DEFAULT '0',
  `sold` int(11) NOT NULL DEFAULT '0',
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



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

INSERT INTO migrations (`id`, `migration`, `batch`) VALUES 
('12','2021_04_16_100902_add_slug_to_products_table','5');

INSERT INTO migrations (`id`, `migration`, `batch`) VALUES 
('14','2021_04_20_083148_add_deleted_at_to_products_table','6');

INSERT INTO migrations (`id`, `migration`, `batch`) VALUES 
('16','2021_04_21_144355_add_view_to_products_table','7');

INSERT INTO products (`id`, `name`, `slug`, `price`, `desc`, `image`, `view`, `amount`, `sold`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('1','Set kem m???t t??i sinh Ohui The First Geniture Eye Cream Edition Grand Blue','set-kem-mat-tai-sinh-ohui-the-first-geniture-eye-cream-edition-grand-blue','4140000','<p><br></p>','83-1586781803-myphamohui-lgvina.png','0','0','0','4','','2021-04-20 08:35:43','');

INSERT INTO products (`id`, `name`, `slug`, `price`, `desc`, `image`, `view`, `amount`, `sold`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('2','Set s???a r???a m???t Ohui Thefirst t??i sinh','set-sua-rua-mat-ohui-thefirst-tai-sinh','2700000','<p><br></p>','83-1586773435-myphamohui-lgvina.png','0','0','0','4','','2021-04-20 08:35:37','');

INSERT INTO products (`id`, `name`, `slug`, `price`, `desc`, `image`, `view`, `amount`, `sold`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('3','Set d?????ng tr???ng Ohui Extreme White','set-duong-trang-ohui-extreme-white','1080000','<p><br></p>','83-1576213241-myphamohui-lgvina.png','0','0','0','3','','2021-04-20 08:35:30','');

INSERT INTO products (`id`, `name`, `slug`, `price`, `desc`, `image`, `view`, `amount`, `sold`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('4','S???a r???a m???t d?????ng tr???ng Ohui Extreme White Foam Snowvitamin','sua-rua-mat-duong-trang-ohui-extreme-white-foam-snowvitamin','7290000','<p><br></p>','83-1574768095-myphamohui-lgvina.png','0','0','0','3','','2021-04-20 08:35:22','');

INSERT INTO products (`id`, `name`, `slug`, `price`, `desc`, `image`, `view`, `amount`, `sold`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('5','Kem ch???ng l??o h??a h???ng nhu???n Whoo Bicheop Ja Yoon Cream','kem-chong-lao-hoa-hong-nhuan-whoo-bicheop-ja-yoon-cream','4095000','<p><br></p>','73-1572670473-myohui.png','0','0','0','8','','2021-04-20 08:35:15','');

INSERT INTO products (`id`, `name`, `slug`, `price`, `desc`, `image`, `view`, `amount`, `sold`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('6','Tinh ch???t v??ng Whoo Cheogidan Radiant Regenerating Gold Concentrate','tinh-chat-vang-whoo-cheogidan-radiant-regenerating-gold-concentrate','6390000','<p><br></p>','73-1573461432-myohui.png','0','0','0','8','','2021-04-20 08:34:57','');

INSERT INTO products (`id`, `name`, `slug`, `price`, `desc`, `image`, `view`, `amount`, `sold`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('7','Set kem ch???ng l??o h??a Whoo Ja Yoon Cream','set-kem-chong-lao-hoa-whoo-ja-yoon-cream','4950000','<p><br></p>','83-1574924693-myphamohui-lgvina.png','0','0','0','9','','2021-04-20 08:34:48','');

INSERT INTO products (`id`, `name`, `slug`, `price`, `desc`, `image`, `view`, `amount`, `sold`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('8','demo1','demo1','1234124','<p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p><br></p>','1618905925-myphamohui-lgvina.jpg','0','0','0','3','2021-04-16 10:30:43','2021-04-20 08:52:06','2021-04-20 08:52:06');

INSERT INTO products (`id`, `name`, `slug`, `price`, `desc`, `image`, `view`, `amount`, `sold`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('9','S???n ph???m m???i11','san-pham-moi11','1234124','<p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p><br></p>','1618906106-myphamohui-lgvina.jpg','0','0','0','3','2021-04-20 07:44:20','2021-04-20 08:52:10','2021-04-20 08:52:10');

INSERT INTO products (`id`, `name`, `slug`, `price`, `desc`, `image`, `view`, `amount`, `sold`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('11','ewred1','ewred1','930000','<p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p><br></p>','1618906160-myphamohui-lgvina.jpg','0','0','0','3','2021-04-20 08:09:20','2021-04-24 15:40:18','');

INSERT INTO users (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES 
('1','Gia Ho??ng','abc@gmail.com','','$2y$10$Icy2Sdgq/IfRru8hrbxysO.ghJNeubC5lPyePle2CE.kXcikuwzly','XMzyNBPOEc72084cqpiSjNojEQ6jyH8HPTBfWmk0np7iiodzeW85y9YrFe1S','2021-04-12 16:18:27','2021-04-12 16:18:27');

INSERT INTO users (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES 
('2','Ph???m Gia Ho??ng','abc123@gmail.com','','$2y$10$tHMwTYLWKYoEYj5mLeVyW.LO0Ht/2rnH.4Hcfzw1ggYvHsnq/YVkq','','2021-04-12 16:19:29','2021-04-12 16:19:29');

INSERT INTO users (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES 
('3','Gia Ho??ng','kaitoubinn@gmail.com','','$2y$10$EMHgtU3qheSsYVimSYSjdOUSYtWtUlNU14gZ9JFb7opElXpKP2JL.','','2021-04-12 16:20:48','2021-04-12 16:20:48');

INSERT INTO users (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES 
('4','huynh','huynhmyname@gmail,com','','$2y$10$9XgWSIjmCDLOqq36eoqgBesRWQdG4A/uxlH492EVPic9UmNlyNxaG','','2021-04-16 01:00:09','2021-04-16 01:00:09');

INSERT INTO categories (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('1','Ohui','ohui','0','2021-04-13 11:08:04','2021-04-14 01:13:08','');

INSERT INTO categories (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('3','Ohui D?????ng Tr???ng','ohui-duong-trang','1','2021-04-13 11:22:22','2021-04-15 16:07:35','');

INSERT INTO categories (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('4','Ohui Thefirst T??i Sinh','ohui-thefirst-tai-sinh','1','2021-04-15 12:13:44','2021-04-15 12:13:44','');

INSERT INTO categories (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('5','Ohui Prime Advancer','ohui-prime-advancer','1','2021-04-15 12:13:54','2021-04-15 12:13:54','');

INSERT INTO categories (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('6','Ohui D?????ng ???m','ohui-duong-am','1','2021-04-15 12:14:04','2021-04-16 01:05:48','');

INSERT INTO categories (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('7','Whoo','whoo','0','2021-04-15 12:17:06','2021-04-15 12:17:06','');

INSERT INTO categories (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('8','Whoo Bichup','whoo-bichup','7','2021-04-15 12:17:30','2021-04-15 12:17:30','');

INSERT INTO categories (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES 
('9','Whoo D?????ng Tr???ng Tr??? N??m','whoo-duong-trang-tri-nam','7','2021-04-15 12:17:40','2021-04-15 12:17:40','');
