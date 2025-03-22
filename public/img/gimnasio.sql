-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-03-2025 a las 04:33:40
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gimnasio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `fecha_hora` timestamp NULL DEFAULT NULL,
  `metodo_registro` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id`, `usuario_id`, `fecha_hora`, `metodo_registro`, `created_at`, `updated_at`) VALUES
(3, 26, '2025-03-12 06:32:26', 'numero', '2025-03-15 06:32:26', '2025-03-15 12:32:26'),
(4, 26, '2025-02-12 06:32:59', 'numero', '2025-03-15 06:32:59', '2025-03-15 15:32:59'),
(5, 26, '2025-03-15 06:34:55', 'numero', '2025-03-15 06:34:55', '2025-03-15 16:34:55'),
(6, 26, '2025-03-15 06:35:16', 'manual', '2025-03-15 06:35:16', '2025-03-15 06:35:16'),
(7, 26, '2025-03-15 06:38:22', 'numero', '2025-03-15 06:38:22', '2025-03-15 06:38:22'),
(8, 26, '2025-03-15 06:41:39', 'numero', '2025-03-15 06:41:39', '2025-03-15 06:41:39'),
(9, 26, '2025-03-15 07:02:52', 'numero', '2025-03-15 07:02:52', '2025-03-15 07:02:52'),
(10, 26, '2025-03-15 07:47:16', 'numero', '2025-03-15 07:47:16', '2025-03-15 07:47:16'),
(11, 26, '2025-01-15 19:09:39', 'numero', '2025-03-15 19:09:39', '2025-03-15 19:09:39'),
(12, 26, '2025-03-15 20:00:06', 'numero', '2025-03-15 20:00:06', '2025-03-15 20:00:06'),
(13, 26, '2025-03-15 20:00:10', 'numero', '2025-03-15 20:00:10', '2025-03-15 20:00:10'),
(14, 28, '2025-03-15 20:29:58', 'numero', '2025-03-15 20:29:58', '2025-03-15 20:29:58'),
(15, 26, '2025-03-16 15:37:40', 'numero', '2025-03-16 15:37:40', '2025-03-16 15:37:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `membresias`
--

CREATE TABLE `membresias` (
  `id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `tipo` enum('mensual','trimestral','anual') NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` enum('activa','inactiva') DEFAULT 'activa',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `membresias`
--

INSERT INTO `membresias` (`id`, `usuario_id`, `tipo`, `precio`, `fecha_inicio`, `fecha_fin`, `estado`, `created_at`, `updated_at`) VALUES
(19, 26, 'mensual', 400.00, '2025-03-15', '2025-04-15', 'activa', '2025-03-15 06:03:48', '2025-03-15 06:41:29'),
(20, 28, 'mensual', 350.00, '2025-03-15', '2025-04-15', 'activa', '2025-03-15 20:30:40', '2025-03-15 20:32:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_09_055555_add_timestamps_to_usuarios_table', 2),
(5, '2025_02_09_073204_add_timestamps_to_rutinas_entrenamiento', 3),
(6, '2025_02_09_073355_add_timestamps_to_rutinas_usuarios', 4),
(7, '2025_02_09_074847_add_timestamps_to_asistencias_table', 5),
(8, '2025_02_10_032645_add_timestamps_to_membresias', 6),
(9, '2025_02_11_215424_add_columns_to_pagos_table', 7),
(10, '2025_02_11_222053_add_timestamps_to_notificaciones_table', 8),
(11, '2025_02_11_222308_add_entregada_to_notificaciones_table', 9),
(12, '2025_02_14_060932_add_fechainscripcion_to_usuarios_table', 10),
(13, '2025_02_21_053739_add_numero_to_usuarios_table', 11),
(14, '2025_02_21_063754_update_metodo_registro_in_asistencias_table', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `tipo` enum('pago','rutina','cumpleaños','promocion') NOT NULL,
  `mensaje` text NOT NULL,
  `fecha_envio` datetime DEFAULT CURRENT_TIMESTAMP,
  `estado` enum('enviado','pendiente') DEFAULT 'pendiente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `entregada` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha_pago` date NOT NULL,
  `metodo_pago` enum('efectivo','tarjeta','transferencia') NOT NULL,
  `estado` enum('pagado','pendiente') DEFAULT 'pendiente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `usuario_id`, `monto`, `fecha_pago`, `metodo_pago`, `estado`, `created_at`, `updated_at`) VALUES
(7, 26, 1400.00, '2025-03-15', 'efectivo', 'pagado', '2025-03-15 20:15:55', '2025-03-15 20:15:55'),
(8, 28, 350.00, '2025-03-15', 'efectivo', 'pagado', '2025-03-15 20:31:50', '2025-03-15 20:31:50'),
(9, 26, 100.00, '2025-02-18', 'efectivo', 'pagado', '2025-03-19 04:36:35', '2025-03-19 04:36:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutinas_entrenamiento`
--

CREATE TABLE `rutinas_entrenamiento` (
  `id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `nivel` enum('principiante','intermedio','avanzado') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `rutinas_entrenamiento`
--

INSERT INTO `rutinas_entrenamiento` (`id`, `nombre`, `descripcion`, `nivel`, `created_at`, `updated_at`) VALUES
(3, 'Pecho y Tríceps', 'Press de Banca (Pecho)\r\n\r\nSeries: 4\r\nRepeticiones: 8-12\r\nDescripción: Acostado en un banco plano, empuja la barra hacia arriba desde el pecho.\r\nAperturas con Mancuernas (Pecho)\r\n\r\nSeries: 3\r\nRepeticiones: 10-12\r\nDescripción: Recuéstate en un banco plano y abre los brazos con las mancuernas hacia los lados, luego cierra.\r\nFondos en Paralelas (Tríceps)\r\n\r\nSeries: 4\r\nRepeticiones: 8-10\r\nDescripción: Usando barras paralelas, baja el cuerpo y empuja hacia arriba enfocándote en los tríceps.\r\nExtensión de Tríceps en Polea Alta\r\n\r\nSeries: 3\r\nRepeticiones: 12-15\r\nDescripción: En una máquina de polea alta, jala la cuerda hacia abajo extendiendo los brazos.\r\nPress de Banca con Agarre Cerrado (Tríceps)\r\n\r\nSeries: 3\r\nRepeticiones: 8-12\r\nDescripción: Similar al press de banca convencional, pero con las manos más juntas para activar los tríceps.\r\nPullover con Mancuerna (Pecho)\r\n\r\nSeries: 3\r\nRepeticiones: 10-12\r\nDescripción: En un banco plano, con una mancuerna, lleva los brazos hacia atrás y regresa al frente.', 'principiante', '2025-02-14 12:00:51', '2025-02-14 12:00:51'),
(4, 'Espalda y Bíceps', 'Pull-up o Dominadas (Espalda)\r\n\r\nSeries: 4\r\nRepeticiones: 6-10\r\nDescripción: Usando una barra fija, tira del cuerpo hacia arriba hasta que la barbilla pase la barra.\r\nRemo con Barra (Espalda)\r\n\r\nSeries: 4\r\nRepeticiones: 8-12\r\nDescripción: De pie, con la barra frente a ti, inclina el torso hacia adelante y rema hacia el abdomen.\r\nJalón al Pecho (Espalda)\r\n\r\nSeries: 4\r\nRepeticiones: 10-12\r\nDescripción: En una máquina de polea, jala la barra hacia abajo hasta el nivel del pecho.\r\nCurl con Barra (Bíceps)\r\n\r\nSeries: 4\r\nRepeticiones: 8-12\r\nDescripción: De pie, con la barra, realiza flexiones de brazo llevando la barra hacia los hombros.\r\nCurl Martillo con Mancuernas (Bíceps)\r\n\r\nSeries: 3\r\nRepeticiones: 10-12\r\nDescripción: Realiza un curl manteniendo las mancuernas en posición neutral (palmas hacia adentro).\r\nCurl de Bíceps en Banco Inclinado (Bíceps)\r\n\r\nSeries: 3\r\nRepeticiones: 10-12\r\nDescripción: Recuéstate en un banco inclinado y realiza curls de bíceps con mancuernas.', 'principiante', '2025-02-14 12:01:45', '2025-02-14 12:01:45'),
(5, 'Piernas y Hombros', 'Sentadillas (Piernas)\r\n\r\nSeries: 4\r\nRepeticiones: 8-12\r\nDescripción: Realiza sentadillas con barra manteniendo la espalda recta y los pies a la altura de los hombros.\r\nPrensa de Piernas (Piernas)\r\n\r\nSeries: 4\r\nRepeticiones: 10-12\r\nDescripción: En la máquina de prensa de pierna, empuja la plataforma con los pies.\r\nElevación de Talones (Gemelos)\r\n\r\nSeries: 4\r\nRepeticiones: 15-20\r\nDescripción: De pie, eleva los talones lo más alto posible para trabajar los gemelos.\r\nPress Militar con Barra (Hombros)\r\n\r\nSeries: 4\r\nRepeticiones: 8-12\r\nDescripción: Empuja la barra hacia arriba desde el nivel de los hombros hasta extender los brazos por completo.\r\nElevaciones Laterales con Mancuernas (Hombros)\r\n\r\nSeries: 3\r\nRepeticiones: 12-15\r\nDescripción: De pie, eleva las mancuernas hacia los lados hasta que los brazos estén paralelos al suelo.\r\nPájaro con Mancuernas (Hombros)\r\n\r\nSeries: 3\r\nRepeticiones: 10-12\r\nDescripción: Inclínate hacia adelante y eleva las mancuernas hacia los lados, enfocándote en la parte posterior de los hombros.', 'principiante', '2025-02-14 12:03:13', '2025-02-14 12:03:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutinas_usuarios`
--

CREATE TABLE `rutinas_usuarios` (
  `id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `rutina_id` int NOT NULL,
  `fecha_envio` datetime DEFAULT CURRENT_TIMESTAMP,
  `estado` enum('enviado','pendiente') DEFAULT 'pendiente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `rutinas_usuarios`
--

INSERT INTO `rutinas_usuarios` (`id`, `usuario_id`, `rutina_id`, `fecha_envio`, `estado`, `created_at`, `updated_at`) VALUES
(18, 26, 3, '2025-03-15 13:57:32', 'enviado', '2025-03-15 19:57:32', '2025-03-15 19:57:32'),
(19, 28, 4, '2025-03-15 14:33:16', 'enviado', '2025-03-15 20:33:16', '2025-03-15 20:33:16'),
(20, 26, 3, '2025-03-18 23:05:30', 'enviado', '2025-03-19 05:05:30', '2025-03-19 05:05:30'),
(21, 28, 4, '2025-03-18 23:07:44', 'enviado', '2025-03-19 05:07:44', '2025-03-19 05:07:44'),
(22, 28, 5, '2025-03-18 23:22:08', 'enviado', '2025-03-19 05:22:08', '2025-03-19 05:22:08'),
(23, 26, 3, '2025-03-18 23:28:28', 'enviado', '2025-03-19 05:28:28', '2025-03-19 05:28:28'),
(24, 26, 3, '2025-03-18 23:32:06', 'enviado', '2025-03-19 05:32:06', '2025-03-19 05:32:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('fwGGIsE93XSaO5noSnNNacfZb9wjuvLtL1puNFhG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoickFZRUN2U1ByOTVoWFUwOVhNZ1V3Z0dCN1I3M3U4RkxFS2p4U2puNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYWciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742081825),
('OmUiuXyZSYQ4tb7pyJEXhQBRqdhZhubqZt8naEHM', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNjhkOU9rMXRvNXRreExhRHBocUt6UG1oV3BxZXM0OVU0SlZGV3czVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c3Vhcmlvcy9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742363035),
('QJ2KKdKVpFILPWbyKSq2prh6K8Kh06iojBo1ZKpg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMmVldnhSbEJ4eGVFcHRxaTlPRDNUd090Y1N5ckJ5RVNubTRjaTFOQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYWciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742139504),
('RnJxsWrWnprB9OMwSHMRlsxuHIEQ50bFJyk9cuuc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZzYwcVdWejVkYmpMSG9ZWTV4Sjc4R3NCWnF4cGlPeFJYUzY2TXRMZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYWciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742082103),
('uoVAy6xHgy4SYBQoBmVm73EvyZuEi0vBzzBlYlum', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOWxrQUZiRnF5a1Q4WjFKQnVFYTZXMUdmVVF5NHdhenZPdjJnVnlBQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c3VhcmlvcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742444760),
('V7Ou5XRH6sTfJVRFmX8M1bqAtpvDO7ggs3rykSp9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRDJ5WVp0WW40S2toRWp6cndrdmQ4MXdvazZNYUVSSVhOMGtUMzB2cyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742139299);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` text,
  `fecha_nacimiento` date DEFAULT NULL,
  `contraseña` varchar(255) NOT NULL,
  `estado` enum('activo','inactivo') DEFAULT 'activo',
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fechainscripcion` date DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `contraseña`, `estado`, `fecha_creacion`, `fecha_actualizacion`, `created_at`, `updated_at`, `fechainscripcion`, `numero`) VALUES
(26, 'jorge', 'morales', 'admin@decur.com', '9931125602', 'el mulato', '2002-07-01', '$2y$12$5xkLlTnvQ.OLWsM5Mk.soedsIbSW5KwnEd/mOUgaS/tlls4AArSJS', 'activo', '2025-03-15 06:03:34', '2025-03-15 06:03:34', '2025-03-15 06:03:34', '2025-03-15 06:03:34', NULL, '1'),
(27, 'Juan', 'Juan', 'eljuan@gmail.com', '9931125602', 'el mulato', '2002-03-01', '$2y$12$d//LCYjYlewCCGNH6WdA1OihEkh3ksgQm3W5XtvLaGOf6VeQzuRrK', 'activo', '2025-03-15 07:24:38', '2025-03-15 07:24:38', '2025-03-15 07:24:38', '2025-03-15 07:24:38', NULL, '2'),
(28, 'Valeria', 'Morales', 'valeria@gmail.com', '9932285445', 'el bosque', '2009-01-08', '$2y$12$n81ysN5WoHQQj1uPykJ1Y.ZOF2jWvkjmbYtmjR/50.BqvuJzvjAUe', 'activo', '2025-03-15 20:29:31', '2025-03-19 05:07:18', '2025-03-15 20:29:31', '2025-03-19 05:07:18', NULL, '3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `membresias`
--
ALTER TABLE `membresias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `rutinas_entrenamiento`
--
ALTER TABLE `rutinas_entrenamiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rutinas_usuarios`
--
ALTER TABLE `rutinas_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `rutina_id` (`rutina_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `membresias`
--
ALTER TABLE `membresias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `rutinas_entrenamiento`
--
ALTER TABLE `rutinas_entrenamiento`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rutinas_usuarios`
--
ALTER TABLE `rutinas_usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencias_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `membresias`
--
ALTER TABLE `membresias`
  ADD CONSTRAINT `membresias_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `rutinas_usuarios`
--
ALTER TABLE `rutinas_usuarios`
  ADD CONSTRAINT `rutinas_usuarios_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rutinas_usuarios_ibfk_2` FOREIGN KEY (`rutina_id`) REFERENCES `rutinas_entrenamiento` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
