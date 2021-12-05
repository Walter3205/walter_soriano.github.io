-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2021 a las 04:29:10
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dymstudio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `cliente_url` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `name`, `image`, `cliente_url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'boss shipping', 'images/clients/bossshipping.png', '', '2021-02-21 10:56:41', '2021-02-21 10:56:41', NULL),
(2, 'covers', 'images/clients/covers.png', NULL, '2021-02-21 10:56:41', '2021-02-21 10:56:41', NULL),
(3, 'el nylon', 'images/clients/elnylon.png', NULL, '2021-02-21 10:56:41', '2021-02-21 10:56:41', NULL),
(4, 'luminare', 'images/clients/luminare.png', NULL, '2021-02-21 10:56:41', '2021-02-21 10:56:41', NULL),
(5, 'nielsenpharma', 'images/clients/nielsenpharma.png', NULL, '2021-02-21 11:02:03', '2021-02-21 11:02:04', NULL),
(6, 'volta', 'images/clients/volta.png', NULL, '2021-02-21 11:02:04', '2021-02-21 11:02:04', NULL),
(7, 'servirepuestos', 'images/clients/1613952906_450e67fdfbd22c8703ba.png', NULL, '2021-02-21 11:02:04', '2021-02-21 11:02:04', NULL),
(8, 'ewannas', 'images/clients/ewannas.png', NULL, '2021-02-21 11:02:04', '2021-02-21 11:02:04', NULL),
(9, 'intermovil', 'images/clients/intermovil.png', NULL, '2021-02-21 11:02:04', '2021-02-21 11:02:04', NULL),
(10, 'corpherc', 'images/clients/corpherc.png', NULL, '2021-02-21 11:02:04', '2021-02-21 11:02:04', NULL),
(11, 'ish', 'images/clients/ish.png', NULL, '2021-02-21 11:02:04', '2021-02-21 11:02:04', NULL),
(12, 'icad', 'images/clients/icad.png', NULL, '2021-02-21 11:02:04', '2021-02-21 11:02:04', NULL),
(13, 'rb', 'images/clients/rb.png', NULL, '2021-02-21 11:02:04', '2021-02-21 11:02:04', NULL),
(14, 'Prueba', 'images/clients/1613956284_81392ce005dbe956bf25.png', '', NULL, NULL, '2021-02-21 19:20:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `readed` varchar(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `readed`, `created_at`, `deleted_at`) VALUES
(1, 'Walter Alfonso Soriano', 'walter123asg@gmail.com', 'Correo de ejemplo', 'sgfdgfdbsdfb gdnbeg hnsgdnbgdsz  e gsdfgsdg sdfsd d sgdfgg fdg sdgsfgf g d gfdgds bb  bd fghshgsdfgb fd bvs bvbs gbsnb sgn sn sgbsnsgnsg ', 'F', '2021-03-07 20:25:41', NULL),
(2, 'Pruba', 'prueba@prueba.conm', 'Otro correo de prueba', ' fgdb sb nbf fnnv b nsn bvcsdn gnfnfb nsdgb dsvng nwgndv bfg nfbnfbnfbnfsg nfg n', 'F', '2021-03-09 09:16:02', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimientos`
--

CREATE TABLE `mantenimientos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `text` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mantenimientos`
--

INSERT INTO `mantenimientos` (`id`, `name`, `image`, `text`, `created_at`, `update_at`, `deleted_at`) VALUES
(1, 'Background_image', 'images/1613845461_5dc902d11417e44b6c75.jpg', '', NULL, NULL, NULL),
(2, 'Welcome', NULL, 'Salvadoreños. Pioneros en firma electrónica en Guatemala', NULL, NULL, NULL),
(3, 'Logo', 'images/logo_transparent V2.png', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `extract` text DEFAULT NULL,
  `body` longtext DEFAULT NULL,
  `status` enum('1','2') NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `catregory_id` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts_tags`
--

CREATE TABLE `posts_tags` (
  `id` bigint(20) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `tag_id` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '2021-02-13 18:52:51', '2021-02-13 18:52:51', '0000-00-00 00:00:00'),
(3, 'Bloger', '2021-02-13 20:53:24', '2021-02-13 20:53:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `image600` text NOT NULL,
  `image1200` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trabajos`
--

INSERT INTO `trabajos` (`id`, `name`, `image`, `image600`, `image1200`, `url`, `categoria`, `descripcion`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ewannas', 'images/portfolio/gallery/ewannas.png', 'images/portfolio/600_ewannas.jpg', 'images/portfolio/1200_ewannas.jpg', 'https://www.ewannas.com/', 'Desarrollo Web', 'Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.', '2021-02-21 21:05:05', '2021-02-21 21:05:05', NULL),
(2, 'Corporación Hércules', 'images/portfolio/gallery/corporacion-hercules.png', 'images/portfolio/600_corporacion-hercules.jpg', 'images/portfolio/1200_corporacion-hercules.jpg', 'https://www.corporacionhercules.net', 'Desarrollo Web', 'Página desarrollada', '2021-02-21 21:05:05', '2021-02-21 21:05:05', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime NOT NULL,
  `role_id` int(11) NOT NULL,
  `last_login` date NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `image`, `created_at`, `updated_at`, `deleted_at`, `role_id`, `last_login`, `deleted`) VALUES
(1, 'Walter', 'Soriano', 'walter123asg@gmail.com', 'aLcf3Z8Y7Hx1VDAHYrLcQL1puqjosJoM8rcRwLg4GllfbnJ0dD4/nNyqn1hCPTVLLKiPkv/QmviTQ3rmfh+ub0SlHRvM4G8g4/JnmzRTYX6/qbGv', 'images/avatars/1613845835_0555aecfd4dd550d62cb.jpg', '2021-02-22 21:00:13', '2021-02-22 21:00:13', '0000-00-00 00:00:00', 1, '0000-00-00', 0),
(2, 'Yimy', 'Hércules', 'yimyhercules@hotmail.com', '7bHd+k0vXhM0z0yZ9hEpNXQSVAn47PMRCDFwXBIQAyRSp4md1vnEGK9EHJANKqxgp9m/jFfRzEjOQYg+3+zBFoTCW9bOtgYhZtYmjPMHlNxhMW9d+Q9VCg==', 'images/avatars/1614219331_cf8efa5218fc895bee20.png', '2021-02-24 19:15:31', '2021-02-24 19:15:31', '0000-00-00 00:00:00', 1, '0000-00-00', 0),
(3, 'Usuario', 'Prueba', 'prueba@prueba.com', '9TFgT1z+joN2SaKJKqBVQavEw+zQSq8m0L0aRmugNnpzw8WDxbVDmpWDrWqbnIJci9OtfbvhLSJpK81D/DIPScO8W1NwrDWYkixqYEA1UFUDANk=', NULL, '2021-03-01 08:28:09', '2021-03-01 08:28:09', '0000-00-00 00:00:00', 3, '0000-00-00', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_posts_id_foreign` (`post_id`);

--
-- Indices de la tabla `mantenimientos`
--
ALTER TABLE `mantenimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`catregory_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `posts_tags`
--
ALTER TABLE `posts_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mantenimientos`
--
ALTER TABLE `mantenimientos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `posts_tags`
--
ALTER TABLE `posts_tags`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Categoría de prueba Editada', 'categoria-de-prueba-editada', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-07-17 20:05:20'),
(2, 'Categoría de prueba', 'categoria-de-prueba', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'sdasdfsgs', 'sdasdfsgs', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Nueva Categoría', 'nueva-categoria', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `extract` text DEFAULT NULL,
  `body` longtext DEFAULT NULL,
  `tipo` enum('imagen','video') NOT NULL,
  `miniatura` char(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `name`, `slug`, `extract`, `body`, `tipo`, `miniatura`, `status`, `user_id`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Post de prueba', 'post-de-prueba', 'Este es un extracto más normal con texto.', '<figure class=\"table\"><table><tbody><tr><td><p>function pagination($sql_total_row, $post_per_page,$current_page=1, $url=\'\', $lasturl = \'\', $parameter =\'paging\') {    $number_page = ceil($sql_total_row / $post_per_page);if($number_page<=1) return false;    $uls =\'</p><ul><li>\'.$n.\'</li><li>\' : \'</li><li><a href=\"\'.$link.\'\">\'.$n.\'</a></li><li>...</li><li>\'.$urls;        }    }    for ($i = $current_page+1; $i < $number_page; $i++){        if($i<$l or $i > $number_page - $distanc)            $urls .= $li($i,$url.$i.$lasturl,$current_page);        else{            $i = $number_page - $distanc;            $urls.= \'</li><li>...</li><li>\';        }    }    return $uls.$urls.\'</li></ul><p>\'; }</p></td></tr></tbody></table></figure>', 'imagen', 'images/blog/1628292636_b88d965618188d0b1199.jpg', '1', 1, 4, '0000-00-00 00:00:00', '2021-08-06 19:22:41', '0000-00-00 00:00:00'),
(2, 'webOS', 'webos', 'You say that you fixed the problem by moving the variables to the constructor and assigning them to the class, which is a good strategy, but does not solve your initial problem.', '<p>You say that you fixed the problem by moving the variables to the constructor and assigning them to the class, which is a good strategy, but does not solve your initial problem. The reason your var_dump was showing NULL, was because you weren\'t returning anything in your function, instead you were only using echo, which prints directly to the page. The reason that your problem was solved is because you changed all the echo calls to a return :) – <a href=\"https://stackoverflow.com/users/4519644/thijs-riezebeek\">Thijs Riezebeek</a> <a href=\"https://stackoverflow.com/questions/18868143/php-return-an-pagination-object-and-displaying-the-links-when-called#comment56221050_18890138\">Dec 12 \'15 at 11:40</a></p>', 'imagen', 'images/blog/1628291036_c5186d4438f025d3cf73.png', '1', 1, 2, '0000-00-00 00:00:00', '2021-08-06 19:27:32', '0000-00-00 00:00:00'),
(3, 'Prueba 2', 'prueba-2', 'extracto del post', '<p>contenido del post</p>', 'video', 'https://www.youtube.com/embed/9Jht-yljeaE', '1', 1, 3, '2021-07-18 12:27:10', '2021-08-06 19:30:05', '0000-00-00 00:00:00'),
(4, 'prueba 3', 'prueba-3', '<p>sdsd</p>', '<p>sdsd</p>', '', NULL, '0', 1, 3, '2021-07-18 12:33:19', '2021-07-18 12:42:58', '2021-07-18 13:42:58'),
(5, '08-0106-0920', '08-0106-0920', '<figure class=\"table\"><table><tbody><tr><td>asas</td><td>asas</td><td>heee</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table></figure>', '<p><i>zcxxcxc</i></p>', '', NULL, '0', 1, 4, '2021-07-18 16:58:08', '2021-07-18 16:58:08', '0000-00-00 00:00:00'),
(6, '01-0813-0444 222', '01-0813-0444-222', '<p>fgfgfg</p>', '<p>fgfgfgdfg</p>', 'imagen', '', '0', 1, 2, '2021-07-18 16:59:52', '2021-07-18 16:59:52', '0000-00-00 00:00:00'),
(7, '02-0528-0029', '02-0528-0029', '', '', 'video', 'https://hackstore.net/descargar-beastars-temporada-2-latino/', '0', 1, 2, '2021-07-18 17:14:07', '2021-07-18 17:14:07', '0000-00-00 00:00:00'),
(8, 'Prueba 4', 'prueba-4', 'Weeee ahhhhhhhhhhh', '<p><strong>Weeee </strong>ahhhhhhhhhhh</p>', 'imagen', 'images/blog/1626875562_901653372aabb6b47f9d.jpg', '1', 1, 2, '2021-07-21 07:52:42', '2021-08-06 19:33:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts_tags`
--

CREATE TABLE `posts_tags` (
  `id` bigint(20) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `tag_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `posts_tags`
--

INSERT INTO `posts_tags` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 3, '2021-07-18 08:51:08', '2021-08-06 19:27:32', '2021-08-06 19:27:32'),
(2, 3, 4, '2021-07-18 12:27:10', '2021-08-06 19:30:05', '2021-08-06 19:30:05'),
(3, 4, 3, '2021-07-18 12:33:19', '2021-07-18 12:33:19', '0000-00-00 00:00:00'),
(4, 5, 2, '2021-07-18 16:58:08', '2021-07-18 16:58:08', '0000-00-00 00:00:00'),
(5, 5, 3, '2021-07-18 16:58:08', '2021-07-18 16:58:08', '0000-00-00 00:00:00'),
(6, 5, 4, '2021-07-18 16:58:08', '2021-07-18 16:58:08', '0000-00-00 00:00:00'),
(7, 6, 2, '2021-07-18 16:59:52', '2021-07-18 16:59:52', '2021-07-18 23:19:45'),
(8, 6, 3, '2021-07-18 16:59:52', '2021-07-18 16:59:52', '2021-07-18 23:19:45'),
(9, 7, 3, '2021-07-18 17:14:07', '2021-07-18 17:14:07', '0000-00-00 00:00:00'),
(10, 6, 2, '2021-07-18 22:19:45', '2021-07-18 22:19:45', '0000-00-00 00:00:00'),
(11, 6, 4, '2021-07-18 22:19:45', '2021-07-18 22:19:45', '0000-00-00 00:00:00'),
(12, 8, 3, '2021-07-21 07:52:42', '2021-08-06 19:33:54', '2021-08-06 19:33:54'),
(13, 2, 3, '2021-07-31 19:04:36', '2021-08-06 19:27:32', '2021-08-06 19:27:32'),
(14, 2, 4, '2021-07-31 19:04:36', '2021-08-06 19:27:32', '2021-08-06 19:27:32'),
(15, 8, 3, '2021-08-01 18:10:34', '2021-08-06 19:33:54', '2021-08-06 19:33:54'),
(16, 3, 4, '2021-08-01 18:18:25', '2021-08-06 19:30:05', '2021-08-06 19:30:05'),
(17, 3, 5, '2021-08-01 18:18:25', '2021-08-06 19:30:05', '2021-08-06 19:30:05'),
(18, 3, 7, '2021-08-01 18:18:25', '2021-08-06 19:30:05', '2021-08-06 19:30:05'),
(19, 3, 4, '2021-08-01 18:20:49', '2021-08-06 19:30:05', '2021-08-06 19:30:05'),
(20, 3, 5, '2021-08-01 18:20:49', '2021-08-06 19:30:05', '2021-08-06 19:30:05'),
(21, 3, 7, '2021-08-01 18:20:49', '2021-08-06 19:30:05', '2021-08-06 19:30:05'),
(22, 3, 4, '2021-08-04 23:07:42', '2021-08-06 19:30:05', '2021-08-06 19:30:05'),
(23, 3, 5, '2021-08-04 23:07:42', '2021-08-06 19:30:05', '2021-08-06 19:30:05'),
(24, 3, 7, '2021-08-04 23:07:42', '2021-08-06 19:30:05', '2021-08-06 19:30:05'),
(25, 3, 4, '2021-08-04 23:12:02', '2021-08-06 19:30:05', '2021-08-06 19:30:05'),
(26, 3, 5, '2021-08-04 23:12:02', '2021-08-06 19:30:05', '2021-08-06 19:30:05'),
(27, 3, 7, '2021-08-04 23:12:03', '2021-08-06 19:30:05', '2021-08-06 19:30:05'),
(28, 3, 4, '2021-08-05 09:56:51', '2021-08-06 19:30:05', '2021-08-06 19:30:05'),
(29, 3, 5, '2021-08-05 09:56:51', '2021-08-06 19:30:05', '2021-08-06 19:30:05'),
(30, 3, 7, '2021-08-05 09:56:51', '2021-08-06 19:30:05', '2021-08-06 19:30:05'),
(31, 3, 4, '2021-08-05 09:57:30', '2021-08-06 19:30:05', '2021-08-06 19:30:05'),
(32, 3, 5, '2021-08-05 09:57:30', '2021-08-06 19:30:05', '2021-08-06 19:30:05'),
(33, 3, 7, '2021-08-05 09:57:30', '2021-08-06 19:30:05', '2021-08-06 19:30:05'),
(34, 2, 3, '2021-08-06 18:03:56', '2021-08-06 19:27:32', '2021-08-06 19:27:32'),
(35, 2, 4, '2021-08-06 18:03:56', '2021-08-06 19:27:32', '2021-08-06 19:27:32'),
(36, 1, 2, '2021-08-06 18:07:01', '2021-08-06 19:22:41', '2021-08-06 19:22:41'),
(37, 1, 2, '2021-08-06 18:16:15', '2021-08-06 19:22:41', '2021-08-06 19:22:41'),
(38, 1, 2, '2021-08-06 18:20:51', '2021-08-06 19:22:41', '2021-08-06 19:22:41'),
(39, 1, 2, '2021-08-06 18:22:03', '2021-08-06 19:22:41', '2021-08-06 19:22:41'),
(40, 1, 2, '2021-08-06 18:25:55', '2021-08-06 19:22:41', '2021-08-06 19:22:41'),
(41, 1, 2, '2021-08-06 18:26:30', '2021-08-06 19:22:41', '2021-08-06 19:22:41'),
(42, 1, 2, '2021-08-06 18:30:36', '2021-08-06 19:22:41', '2021-08-06 19:22:41'),
(43, 1, 2, '2021-08-06 18:31:02', '2021-08-06 19:22:41', '2021-08-06 19:22:41'),
(44, 1, 2, '2021-08-06 19:22:41', '2021-08-06 19:22:41', '0000-00-00 00:00:00'),
(45, 2, 3, '2021-08-06 19:27:32', '2021-08-06 19:27:32', '0000-00-00 00:00:00'),
(46, 2, 4, '2021-08-06 19:27:32', '2021-08-06 19:27:32', '0000-00-00 00:00:00'),
(47, 3, 4, '2021-08-06 19:30:05', '2021-08-06 19:30:05', '0000-00-00 00:00:00'),
(48, 3, 5, '2021-08-06 19:30:05', '2021-08-06 19:30:05', '0000-00-00 00:00:00'),
(49, 3, 7, '2021-08-06 19:30:05', '2021-08-06 19:30:05', '0000-00-00 00:00:00'),
(50, 8, 3, '2021-08-06 19:33:54', '2021-08-06 19:33:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tag de pru', 'tag-de-pru', NULL, NULL, '2021-07-17 22:12:51'),
(2, 'Etiqueta 2', 'etiqueta-2', '2021-07-17 21:17:30', '2021-07-17 21:17:30', NULL),
(3, 'Etiqueta 3', 'etiqueta-3', '2021-07-17 21:21:19', '2021-07-31 21:20:01', NULL),
(4, 'Etiqueta 4', 'etiqueta-4', '2021-07-17 21:21:32', '2021-07-17 21:21:32', NULL),
(5, 'Etiqueta 5', 'etiqueta-5', '2021-07-31 15:26:30', '2021-07-31 15:26:30', NULL),
(6, 'Etiqueta 6', 'etiqueta-6', '2021-07-31 15:29:37', '2021-07-31 17:06:19', '2021-07-31 17:06:19'),
(7, 'Etiqueta 8', 'etiqueta-8', '2021-07-31 17:07:56', '2021-07-31 20:06:17', NULL),
(8, 'Etiqueta 7', 'etiqueta-7', '2021-07-31 17:08:44', '2021-07-31 17:27:31', '2021-07-31 17:27:31'),
(9, 'Etiqueta 7', 'etiqueta-7', '2021-07-31 17:10:37', '2021-07-31 17:27:20', '2021-07-31 17:27:20'),
(10, 'Etiqueta 9', 'etiqueta-9', '2021-07-31 20:16:42', '2021-07-31 20:24:46', '2021-07-31 20:24:46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `posts_tags`
--
ALTER TABLE `posts_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `posts_tags`
--
ALTER TABLE `posts_tags`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
