# Gallery

Для запуска приложения необходимо создать таблицы в базе данных MySQL:


CREATE TABLE `albums` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `AlbumName` varchar(100) DEFAULT NULL,
  `AlbumDescription` text,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

CREATE TABLE `image_gallery` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `likes` int DEFAULT '0',
  `dislikes` int DEFAULT '0',
  `AlbumId` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `AlbumId` (`AlbumId`),
  CONSTRAINT `image_gallery_ibfk_1` FOREIGN KEY (`AlbumId`) REFERENCES `albums` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci

CREATE TABLE `image_comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `galleryId` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci

Затем расположить файлы приложения в папке localhost на локальном веб-сервере (Open Server Panel, XAMPP )
После перейти по адресу localhost
