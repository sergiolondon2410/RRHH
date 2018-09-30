-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2018 a las 04:14:44
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `thebew_genteok`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accomplishments`
--

CREATE TABLE `accomplishments` (
  `id` int(10) UNSIGNED NOT NULL,
  `observation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `award_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `giver_id` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `accomplishments`
--

INSERT INTO `accomplishments` (`id`, `observation`, `award_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`, `giver_id`) VALUES
(1, 'Prueba', 1, 11, NULL, '2018-09-04 03:00:00', '2018-09-04 03:00:00', 1),
(2, 'vzvfvdfvd', 3, 10, NULL, '2018-09-10 03:00:00', '2018-09-10 03:00:00', 8),
(3, 'fdffgfd', 3, 13, NULL, '2018-09-10 03:00:00', '2018-09-10 03:00:00', 8),
(4, 'Eres un líder positivo, sigue así', 5, 14, NULL, '2018-09-10 03:00:00', '2018-09-11 19:12:41', 8),
(5, 'Felicitaciones!! conservas bien tu puesto de trabajo', 7, 9, NULL, '2018-09-11 18:49:55', '2018-09-11 18:49:55', 8),
(6, 'Ccadada', 3, 10, '2018-09-11 19:24:55', '2018-09-11 19:23:07', '2018-09-11 19:24:55', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answers`
--

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `measure_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `application_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `answers`
--

INSERT INTO `answers` (`id`, `measure_id`, `created_at`, `updated_at`, `application_id`, `description`, `question_id`) VALUES
(4, 1, '2018-09-28 23:28:48', '2018-09-28 23:28:48', 2, NULL, 1),
(5, 2, '2018-09-28 23:29:30', '2018-09-28 23:29:30', 2, NULL, 2),
(6, 4, '2018-09-28 23:30:02', '2018-09-28 23:30:02', 2, NULL, 5),
(7, 1, '2018-09-28 23:30:18', '2018-09-28 23:30:18', 2, NULL, 3),
(8, 3, '2018-09-28 23:30:31', '2018-09-28 23:30:31', 2, NULL, 4),
(9, 1, '2018-09-28 23:30:47', '2018-09-28 23:30:47', 2, NULL, 6),
(10, 3, '2018-09-28 23:30:55', '2018-09-28 23:30:55', 2, NULL, 7),
(11, 3, '2018-09-28 23:31:13', '2018-09-28 23:31:13', 2, NULL, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplications`
--

CREATE TABLE `aplications` (
  `id` int(10) UNSIGNED NOT NULL,
  `implementation_id` int(10) UNSIGNED NOT NULL,
  `evaluator_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `aplications`
--

INSERT INTO `aplications` (`id`, `implementation_id`, `evaluator_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 3, '2018-04-20 09:37:52', '2018-04-20 09:37:52'),
(2, 1, 2, 3, '2018-04-20 09:55:29', '2018-04-20 09:55:29'),
(3, 1, 2, 3, '2018-04-20 09:57:20', '2018-04-20 09:57:20'),
(4, 1, 2, 3, '2018-04-20 12:13:45', '2018-04-20 12:13:45'),
(5, 1, 2, 3, '2018-04-20 12:16:10', '2018-04-20 12:16:10'),
(6, 1, 2, 3, '2018-04-20 12:16:55', '2018-04-20 12:16:55'),
(7, 1, 2, 3, '2018-04-20 12:30:53', '2018-04-20 12:30:53'),
(8, 1, 2, 3, '2018-04-20 12:31:40', '2018-04-20 12:31:40'),
(9, 1, 2, 3, '2018-04-20 12:32:35', '2018-04-20 12:32:35'),
(10, 1, 2, 3, '2018-04-20 19:06:20', '2018-04-20 19:06:20'),
(11, 1, 2, 3, '2018-04-20 21:12:09', '2018-04-20 21:12:09'),
(12, 1, 2, 3, '2018-06-19 10:28:41', '2018-06-19 10:28:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `applications`
--

CREATE TABLE `applications` (
  `id` int(10) UNSIGNED NOT NULL,
  `evaluator_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'uninitialized',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `evaluation_id` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `applications`
--

INSERT INTO `applications` (`id`, `evaluator_id`, `status`, `deleted_at`, `created_at`, `updated_at`, `user_id`, `evaluation_id`) VALUES
(1, 10, 'uninitialized', NULL, '2018-08-29 03:00:00', '2018-08-29 03:00:00', 10, 1),
(2, 8, 'completed', NULL, '2018-08-29 03:00:00', '2018-09-28 23:31:13', 10, 1),
(3, 9, 'uninitialized', NULL, '2018-09-21 01:30:44', '2018-09-21 01:30:44', 10, 1),
(4, 12, 'uninitialized', NULL, '2018-09-21 01:48:51', '2018-09-21 01:48:51', 13, 1),
(5, 14, 'uninitialized', NULL, '2018-09-21 01:50:59', '2018-09-21 01:50:59', 9, 1),
(6, 9, 'uninitialized', NULL, '2018-09-21 01:50:59', '2018-09-21 01:50:59', 9, 1),
(7, 8, 'uninitialized', NULL, '2018-09-21 04:34:32', '2018-09-29 03:05:44', 8, 1),
(8, 12, 'uninitialized', NULL, '2018-09-25 01:34:37', '2018-09-25 01:34:37', 12, 1),
(9, 13, 'uninitialized', NULL, '2018-09-25 01:37:05', '2018-09-25 01:37:05', 13, 1),
(10, 13, 'uninitialized', NULL, '2018-09-25 04:27:47', '2018-09-25 04:27:47', 13, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `application_evaluation`
--

CREATE TABLE `application_evaluation` (
  `id` int(10) UNSIGNED NOT NULL,
  `application_id` int(11) NOT NULL,
  `evaluation_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `application_evaluation`
--

INSERT INTO `application_evaluation` (`id`, `application_id`, `evaluation_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2018-09-18 03:00:00', '2018-09-18 03:00:00'),
(2, 2, 1, NULL, '2018-09-18 03:00:00', '2018-09-18 03:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assignations`
--

CREATE TABLE `assignations` (
  `id` int(10) UNSIGNED NOT NULL,
  `tested_id` int(10) UNSIGNED NOT NULL,
  `evaluation_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `assignations`
--

INSERT INTO `assignations` (`id`, `tested_id`, `evaluation_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 5, 1, NULL, '2018-08-28 05:00:00', '2018-08-29 03:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `awards`
--

CREATE TABLE `awards` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resource_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `organization_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `awards`
--

INSERT INTO `awards` (`id`, `name`, `description`, `resource_id`, `organization_id`, `created_at`, `updated_at`, `creator_id`) VALUES
(1, 'Premio al desempeño', 'Busca premiar a la persona que mantuvo su desempeño por más de 3 meses seguidos', 1, 1, '2018-09-03 20:03:00', '2018-09-03 20:04:00', 4),
(2, 'Premio Adidas', 'Prueba Adidas', 7, 7, '2018-09-03 20:49:00', '2018-09-03 20:49:00', 1),
(3, 'Héroe de la puntualidad', 'Este premio de ofrece a la persona que llegó temprano más por más de seis meses seguidos', 16, 2, '2018-09-04 01:13:12', '2018-09-04 01:42:11', 1),
(4, 'Medalla al emprendimiento', 'Este premio se otorga jkjk', 18, 1, '2018-09-04 16:57:48', '2018-09-04 16:57:48', 1),
(5, 'Liderazgo', 'El premio al liderazgo .....', 5, 2, '2018-09-04 17:06:50', '2018-09-04 17:06:50', 1),
(6, 'Premio creador', 'Premio que muestra quien fue su creador', 25, 1, '2018-09-07 18:44:39', '2018-09-07 18:44:39', 4),
(7, 'Medalla al orden del puesto de trabajo', 'Se otorga a la persona que mantiene su puesto de trabajo en óptimas condiciones, previniendo así accidentes y conservando la armonía de la empresa.', 36, 2, '2018-09-11 18:38:37', '2018-09-11 18:38:37', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `award_resources`
--

CREATE TABLE `award_resources` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `award_resources`
--

INSERT INTO `award_resources` (`id`, `name`, `uri`, `created_at`, `updated_at`) VALUES
(1, 'Medalla estrella', '/badges/001-medal.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(2, 'Escudo estrella', '/badges/002-shield.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(3, 'Listón estrella', '/badges/003-star.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(4, 'Escudo uno', '/badges/004-one.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(5, 'Copa estrella', '/badges/005-trophy.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(6, 'Copa mundial', '/badges/006-soccer.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(7, 'Premio uno', '/badges/007-award.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(8, 'Premio estrellas', '/badges/008-award-1.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(9, 'Estatuilla estrella dorada', '/badges/009-award-2.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(10, 'Premio estrella', '/badges/010-award-3.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(11, 'Estatuilla alas', '/badges/011-award-4.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(12, 'Premio diamante', '/badges/012-diamond.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(13, 'Estatuilla estrella plateada', '/badges/013-star-1.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(14, 'Estatuilla academia', '/badges/014-oscar.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(15, 'Estatuilla uno', '/badges/015-trophy-1.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(16, 'Cinturón estrella', '/badges/016-champion-belt.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(17, 'Trofeo estrella', '/badges/017-trophy-2.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(18, 'Trofeo cohete', '/badges/018-award-5.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(19, 'Copa Sonrisa', '/badges/019-champion.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(20, 'Trofeo globo', '/badges/020-golden-globe.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(21, 'Trofeo rubí', '/badges/021-trophy-3.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(22, 'Medalla militar estrella roja', '/badges/022-medal-1.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(23, 'Emblema estrella', '/badges/023-badge.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(24, 'Listón uno', '/badges/024-one-1.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(25, 'Botón OK', '/badges/025-best.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(26, 'Listón uno rojo', '/badges/026-one-2.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(27, 'Escudo tres estrellas', '/badges/027-medal-2.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(28, 'Medalla militar estrella verde', '/badges/028-medal-3.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(29, 'Medalla militar circulo gris', '/badges/029-medal-4.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(30, 'Medalla militar circulo check', '/badges/030-medal-5.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(31, 'Medalla militar circulo estrella', '/badges/031-medal-6.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(32, 'Estrella uno', '/badges/032-star-2.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(33, 'Medalla militar cruz', '/badges/033-badge-1.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(34, 'Listón', '/badges/034-ribbon.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(35, 'Trofeo corazón', '/badges/035-reward.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(36, 'Listón tierra', '/badges/036-reward-1.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `badges`
--

CREATE TABLE `badges` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_uri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `badges`
--

INSERT INTO `badges` (`id`, `created_at`, `updated_at`, `name`, `image_uri`) VALUES
(1, '2018-08-07 03:00:00', '2018-08-07 03:00:00', 'Medalla estrella', '001-medal.png'),
(2, '2018-08-07 03:00:00', '2018-08-07 03:00:00', 'Escudo estrella', '002-shield.png'),
(3, '2018-08-07 03:00:00', '2018-08-07 03:00:00', 'premio estrella', '003-star.png'),
(4, '2018-08-07 03:00:00', '2018-08-07 03:00:00', 'Escudo uno', '004-one.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competences`
--

CREATE TABLE `competences` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `competence_type_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `competences`
--

INSERT INTO `competences` (`id`, `name`, `description`, `created_at`, `updated_at`, `color`, `competence_type_id`) VALUES
(1, 'Asistencia y Puntualidad', 'Evalúa la puntualidad y el compromiso...', '2018-04-19 05:00:00', '2018-04-19 05:00:00', '#f44242', 1),
(3, 'Cumplimiento de Normas disciplinarias y de seguridad', 'Evalúa el cumplimiento de Normas disciplinarias instauradas en la organización...', '2018-04-19 05:00:00', '2018-04-19 05:00:00', '#3bb8f7', 1),
(4, 'Competencia 1', 'Texto de prueba 1', '2018-06-19 09:59:01', '2018-06-19 09:59:01', '#cb53ef', 1),
(5, 'Competencia 2', 'Texto 2', '2018-06-19 10:03:37', '2018-06-19 10:03:37', '#f78a36', 1),
(6, 'Indicador 1', 'Texto indicador 1', '2018-06-19 11:03:47', '2018-06-19 11:03:47', '#0fdb75', 2),
(7, 'Trabajo en equipo', 'hjvdjhdvhjcsdcvsdsc', '2018-06-19 21:35:17', '2018-06-19 21:35:17', '#3bb8f7', 1),
(8, 'Competencia', 'descripción', '2018-08-31 06:36:31', '2018-09-04 16:52:20', '#3bb8f7', 2),
(9, 'Sensibilidad interpersonal y vocación del servicio', 'Es el sentimiento compartido de orgullo de hacer parte de la compañía, que va acompañado de la responsabilidad y compromiso', '2018-09-21 20:48:49', '2018-09-21 20:48:49', '#f44242', 1),
(10, 'Credibilidad', 'Los miembros de la familia Inser, se encuentran comprometidos con generar credibilidad y confianza en la gestión e información que se deriva de su labor, por eso se esfuerzan cada día...', '2018-09-21 20:50:24', '2018-09-21 20:50:24', '#3bb8f7', 1),
(11, 'Actitud innovadora', 'Es la disposición permanente de la familia Inser a adquirir nuevos aprendizajes y enfrentar los retos cotidianos con una disposición optimista y recursiva...', '2018-09-21 20:51:47', '2018-09-21 20:51:47', '#cb53ef', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competence_types`
--

CREATE TABLE `competence_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `competence_types`
--

INSERT INTO `competence_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Competencias', '2018-06-19 05:00:00', '2018-06-19 05:00:00'),
(2, 'Indicadores de productividad', '2018-06-19 05:00:00', '2018-06-19 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluations`
--

CREATE TABLE `evaluations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `evaluation_type_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `process_id` int(10) UNSIGNED NOT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `evaluations`
--

INSERT INTO `evaluations` (`id`, `name`, `description`, `evaluation_type_id`, `created_at`, `updated_at`, `process_id`, `creator_id`) VALUES
(1, 'Evaluación de desempeño', 'Evalúa el desempeño durante un periodo determinado de un empleado en la organización', 1, '2018-04-19 05:00:00', '2018-09-25 04:34:20', 1, 1),
(2, 'Entrevista de retiro', 'Entrevista de retiro blabla', 3, '2018-06-18 22:17:47', '2018-06-18 22:17:47', 1, 1),
(3, 'Evaluación de prueba', 'Otra descripción', 1, '2018-09-12 04:03:07', '2018-09-17 23:10:24', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluation_question`
--

CREATE TABLE `evaluation_question` (
  `id` int(10) UNSIGNED NOT NULL,
  `evaluation_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `evaluation_question`
--

INSERT INTO `evaluation_question` (`id`, `evaluation_id`, `question_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2018-09-12 03:00:00', '2018-09-12 03:00:00'),
(2, 1, 2, NULL, '2018-09-12 03:00:00', '2018-09-12 03:00:00'),
(3, 3, 1, NULL, '2018-09-12 03:00:00', '2018-09-12 03:00:00'),
(4, 3, 3, NULL, '2018-09-12 03:00:00', '2018-09-12 03:00:00'),
(5, 1, 5, NULL, NULL, NULL),
(6, 1, 3, NULL, NULL, NULL),
(7, 1, 6, NULL, NULL, NULL),
(8, 1, 7, NULL, NULL, NULL),
(9, 1, 8, NULL, NULL, NULL),
(10, 1, 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluation_types`
--

CREATE TABLE `evaluation_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `evaluation_types`
--

INSERT INTO `evaluation_types` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Evaluación de desempeño', 'Es un instrumento que se utiliza para gerenciar la gestión del personal, que busca: 1) El desarrollo personal y profesional de lo colaboradores. 2) La mejora permanente de los resultados de la organización. 3) El aprovechamiento adecuado de los recursos', '2018-04-19 05:00:00', '2018-09-21 20:46:00'),
(2, 'Encuesta 1', 'Lorem ipsum', '2018-06-18 05:00:00', '2018-09-01 07:39:16'),
(3, 'Evaluación periodo de prueba', 'Descripción seria', '2018-06-18 05:00:00', '2018-09-12 07:40:13'),
(4, 'Tipo de evaluación de prueba', 'jdfklsd sydboibsdiocysaoidysñoo', '2018-09-01 06:54:35', '2018-09-01 06:54:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `implementations`
--

CREATE TABLE `implementations` (
  `id` int(10) UNSIGNED NOT NULL,
  `evaluation_id` int(10) UNSIGNED NOT NULL,
  `process_id` int(10) UNSIGNED NOT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `implementations`
--

INSERT INTO `implementations` (`id`, `evaluation_id`, `process_id`, `creator_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2018-04-19 05:00:00', '2018-04-19 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `implementation_questions`
--

CREATE TABLE `implementation_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `implementation_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `implementation_questions`
--

INSERT INTO `implementation_questions` (`id`, `implementation_id`, `question_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-04-19 05:00:00', '2018-04-19 05:00:00'),
(2, 1, 2, '2018-04-19 05:00:00', '2018-04-19 05:00:00'),
(3, 1, 3, '2018-04-19 05:00:00', '2018-04-19 05:00:00'),
(4, 1, 4, '2018-04-19 05:00:00', '2018-04-19 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `measures`
--

CREATE TABLE `measures` (
  `id` int(10) UNSIGNED NOT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `numeric_value` double(8,2) NOT NULL,
  `scale_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `measures`
--

INSERT INTO `measures` (`id`, `qualification`, `alias`, `description`, `numeric_value`, `scale_id`, `created_at`, `updated_at`) VALUES
(1, 'A', 'Siempre', 'Representa el comportamiento habitual del evaluado. \r\n“Siempre se comporta de ese modo”', 1.00, 1, '2018-04-19 05:00:00', '2018-09-28 01:18:14'),
(2, 'B', 'Frecuentemente', 'Representa el comportamiento frecuente del evaluado.', 0.75, 1, '2018-04-19 05:00:00', '2018-09-28 01:18:05'),
(3, 'C', 'Algunas Veces', 'Representa el comportamiento eventual.', 0.50, 1, '2018-04-20 05:00:00', '2018-09-28 01:17:50'),
(4, 'D', 'Ocasionalmente', 'Representa el comportamiento particularmente ocasional del evaluado', 0.25, 1, '2018-04-20 05:00:00', '2018-09-28 01:17:34'),
(5, '1', 'Uno', 'Valor numérico de uno', 1.20, 4, '2018-08-31 04:21:00', '2018-08-31 04:21:00'),
(6, '2', 'Dos', 'Valor dos', 2.45, 4, '2018-08-31 04:22:42', '2018-08-31 05:21:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_04_16_224853_create_user_types_table', 1),
(2, '2018_04_16_225243_create_organizations_table', 1),
(3, '2018_04_16_225648_create_users_table', 1),
(4, '2018_04_16_234026_create_scales_table', 1),
(5, '2018_04_16_235906_create_evaluation_types_table', 1),
(6, '2018_04_16_235936_create_evaluations_table', 1),
(7, '2018_04_17_011539_create_competences_table', 1),
(8, '2018_04_17_015202_create_processes_table', 1),
(9, '2018_04_17_042539_create_implementations_table', 1),
(10, '2018_04_17_042918_create_questions_table', 1),
(11, '2018_04_17_043233_create_aplications_table', 1),
(12, '2018_04_19_232159_create_measure_table', 2),
(13, '2018_04_20_002208_create_implementation_question_table', 3),
(14, '2018_04_20_004709_create_measures_table', 4),
(15, '2018_04_20_004725_create_implementation_questions_table', 4),
(16, '2018_04_20_004739_create_answers_table', 4),
(17, '2018_06_14_230523_user_add_delete', 5),
(18, '2018_06_14_231252_modify_organization_table', 6),
(19, '2018_06_18_215443_add_color_competence_table', 7),
(20, '2018_06_19_051524_create_competence_types_table', 8),
(21, '2018_08_07_044745_create_badges_table', 9),
(22, '2018_08_07_203510_add_level_user_table', 10),
(23, '2018_08_27_203222_drop_delete_at_column_user_table', 11),
(24, '2018_08_29_135518_drop_evaluation_id_column_from_competences_table', 12),
(25, '2018_08_29_154454_add_process_id_column_to_evaluations_table', 13),
(26, '2018_08_29_155821_add_scale_id_column_to_questions_table', 14),
(27, '2018_08_29_161722_add_evaluation_type_id_column_to_questions_table', 15),
(28, '2018_08_29_162724_create_assignations_table', 16),
(29, '2018_08_29_194225_add_creator_id_column_to_evaluations_table', 17),
(30, '2018_08_29_194509_create_evaluation_questions_table', 18),
(32, '2018_08_29_204932_modify_answers_table', 19),
(33, '2018_09_03_015604_add_status_column_to_processes_table', 20),
(34, '2018_09_03_155950_create_award_resources_table', 21),
(35, '2018_09_03_165851_create_awards_table', 22),
(36, '2018_09_03_224328_create_accomplishments_table', 23),
(37, '2018_09_07_151649_add_creator_id_column_to_awards_table', 24),
(38, '2018_09_07_195247_add_giver_id_column_to_accomplishments_table', 25),
(40, '2018_09_12_034233_create_evaluation_question_table', 26),
(41, '2018_09_18_020350_modify_applications_table', 27),
(43, '2018_09_19_025709_create_application_evaluation_table', 28),
(44, '2018_09_20_202236_add_evaluation_id_column_to_applications_table', 29),
(45, '2018_09_21_152934_add_question_column_to_answers_table', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizations`
--

CREATE TABLE `organizations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `logo_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo.jpg',
  `taxes_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `organizations`
--

INSERT INTO `organizations` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `logo_url`, `taxes_id`, `phone`, `employee_quantity`) VALUES
(1, 'Gente OK', '2018-04-17 05:00:00', '2018-04-17 05:00:00', NULL, 'logo.jpg', '63497826398-1', '2314322', '5 - 20'),
(2, 'Kent', '2018-04-18 05:00:00', '2018-04-19 05:00:00', NULL, 'logo.jpg', '8754973293-2', '3324554', '> 100'),
(3, 'Avianca', '2018-06-18 04:32:55', '2018-06-18 04:32:55', NULL, 'logo.jpg', '1238734673-2', '2222222', '> 100'),
(4, 'BBVA', '2018-06-18 08:59:39', '2018-06-18 08:59:39', NULL, 'logo.jpg', '124555656756-0', '12476755', '51 - 100'),
(5, 'RCN', '2018-06-18 09:02:24', '2018-06-18 09:02:24', NULL, 'logo.jpg', '8572455799-7', '6463254', '21 - 50'),
(6, 'Vamos', '2018-06-18 09:05:42', '2018-06-18 09:05:42', NULL, 'logo.jpg', '23466879890-4', '2231242', '21 - 50'),
(7, 'Adidas', '2018-06-18 09:24:11', '2018-06-18 09:24:11', NULL, 'empresa-7.png', '23462311120-4', '2223312', '> 100'),
(8, 'Bancolombia', '2018-06-18 09:42:35', '2018-06-18 09:42:35', NULL, 'empresa-8.jpg', '6534244563-8', '223311998', '> 100'),
(9, 'Servientrega', '2018-06-18 09:47:08', '2018-06-18 09:47:08', NULL, 'empresa-9.png', '3326754654-3', '8696454', '> 100'),
(10, 'Google', '2018-06-18 09:53:00', '2018-06-18 09:53:00', NULL, 'empresa-10.png', '76327326545', '1222111', '5 - 20'),
(11, 'Club Atlético Nacional', '2018-06-18 09:58:01', '2018-06-18 09:58:01', NULL, 'empresa-11.png', '653424423-8', '31123122', '51 - 100'),
(12, 'Exito', '2018-06-18 10:13:38', '2018-06-18 10:13:38', NULL, 'empresa-12.jpg', '4334535678-9', '341116545', '> 100'),
(13, 'Bavaria S.A.', '2018-06-19 21:25:50', '2018-06-19 21:25:50', NULL, 'empresa-13.png', '312421322', '76776484', '> 100'),
(14, 'Inser - instituto de fertilidad humana', '2018-09-21 20:53:43', '2018-09-21 20:53:43', NULL, 'empresa-14.png', '12234445', '+57(4) 268 8000', '51 - 100');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `processes`
--

CREATE TABLE `processes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `processes`
--

INSERT INTO `processes` (`id`, `name`, `description`, `organization_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Proceso de evaluación del clima laboral Kent', 'Proceso de evaluación para la empresa Kent', 2, '2018-04-19 05:00:00', '2018-09-17 23:09:53', 'activo'),
(2, 'Proceso de prueba', 'Proceso de evaluación para Bancolombia', 8, '2018-09-03 06:12:54', '2018-09-03 06:12:54', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `competence_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `scale_id` int(10) UNSIGNED NOT NULL,
  `evaluation_type_id` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `questions`
--

INSERT INTO `questions` (`id`, `text`, `competence_id`, `created_at`, `updated_at`, `scale_id`, `evaluation_type_id`) VALUES
(1, 'Llega con anticipación al lugar de trabajo', 1, '2018-04-19 05:00:00', '2018-04-19 05:00:00', 1, 1),
(2, 'Asiste de manera regular a trabajar (Ausentismo)', 1, '2018-04-19 05:00:00', '2018-04-19 05:00:00', 1, 1),
(3, 'Cumple con las instrucciones y asignaciones de los superiores', 3, '2018-04-19 05:00:00', '2018-04-19 05:00:00', 1, 1),
(4, 'Cumple con las normas y reglamentos propios del área y el equipo de trabajo', 3, '2018-04-19 05:00:00', '2018-04-19 05:00:00', 1, 1),
(5, 'Se muestra disponible para ejecutar tareas asignadas, por fuera del horario de trabajo', 1, '2018-06-19 13:33:20', '2018-06-19 13:33:20', 1, 1),
(6, 'Demuestra en su gestualidad y comportamiento cotidiano, una disposición optimista y empática, empleando expresiones que favorecen la sana interacción con los demás', 7, '2018-06-19 21:40:15', '2018-06-19 21:40:15', 1, 1),
(7, 'Consolida relaciones empáticas con los miembros de la organización, favoreciendo un buen clima de trabajo', 7, '2018-06-19 21:40:32', '2018-06-19 21:40:32', 1, 1),
(8, 'Gestiona con agilidad las solicitudes de los demás compañeros, favoreciendo la satisfacción de las demandas de los clientes internos y externos', 7, '2018-06-19 21:42:59', '2018-06-19 21:42:59', 1, 1),
(9, 'Mire para arriba y luego para abajo', 5, '2018-09-03 02:33:15', '2018-09-03 04:48:03', 3, 2),
(10, 'Fgdfgsfgdfgdfgdfgd', 1, '2018-09-04 16:54:43', '2018-09-04 16:54:43', 2, 1),
(11, 'Pregunta método', 4, '2018-09-12 02:11:31', '2018-09-12 02:11:31', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `scales`
--

CREATE TABLE `scales` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `scales`
--

INSERT INTO `scales` (`id`, `name`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Frecuencia de conducta', 'Numérica', 'Dá respuesta a la pregunta: ¿Con qué frecuencia presenta esa conducta?\r\nDa un rango de A a D siendo A siempre, B frecuentemente, C algunas veces y D Ocasionalmente.', '2018-04-19 05:00:00', '2018-09-28 01:35:36'),
(2, 'Uno a Cinco', 'Numérica', 'Escala numérica entera de 1 a 5', '2018-06-18 05:00:00', '2018-06-18 05:00:00'),
(3, 'Libre', 'Libre', 'Respuesta escrita libre', '2018-08-29 03:00:00', '2018-08-29 03:00:00'),
(4, 'Prueba', 'Subjetiva', 'Escala de pruebas', '2018-08-30 19:19:02', '2018-09-04 17:30:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type_id` int(10) UNSIGNED NOT NULL,
  `organization_id` int(10) UNSIGNED DEFAULT NULL,
  `document` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_in` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boss_id` int(10) UNSIGNED NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `password`, `user_type_id`, `organization_id`, `document`, `position`, `area`, `date_in`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `profile_img`, `boss_id`, `level`) VALUES
(1, 'Sergio', 'Londoño', 'sergio@mail.com', '123', 2, 1, '1128444449', 'ingeniero', 'tecno', '2017-06-19 05:00:00', NULL, '2018-04-17 05:00:00', '2018-08-22 00:38:26', NULL, 'perfil-1_1534887506.png', 1, 1),
(2, 'Juan', 'Pérez', 'jp@mail.com', '123', 5, 2, '12634563464', 'Operario', NULL, NULL, NULL, NULL, '2018-08-23 05:15:51', '2018-08-23 05:15:51', 'profile_image.png', 1, 0),
(3, 'Pepe', 'Mora', 'pepe@mail.com', '$2y$10$sOcAWdz79xkrm8T6punExOBUOI43u/xC22YdDXT2imIAfLg9tnj8u', 5, 2, '1234567', 'Asistente operativo', NULL, '2016-03-15 05:00:00', 'g4V5sVf3nEVD7nQTLWEM0B0o6N3VfRuRQPcofnVy3mXaMu6YhTIljanwdDKz', '2018-04-19 10:48:08', '2018-08-22 23:14:08', '2018-08-22 23:14:08', 'profile_image.png', 1, 0),
(4, 'SuperAdministrador', 'Gente', 'admin@mail.com', '$2y$10$sOcAWdz79xkrm8T6punExOBUOI43u/xC22YdDXT2imIAfLg9tnj8u', 1, 1, '9876382', 'Auxiliar contable', NULL, NULL, 'Ps7OJwJEf8QWLwb24REPn9KEjMTmi2XbnrE2fH1BwoVqQhYpIyEI6ZNqu3b9', '2018-04-19 22:41:42', '2018-04-19 22:41:42', NULL, 'profile_image.png', 1, 0),
(5, 'Rosa', 'Gómez', 'rosa@mail.com', '$2y$10$B5BoRHsrJsjTvwCAdV2L6.4SiexqWiy8va4MnwfVm5iqXjcobgjM.', 5, 2, '1256784', 'Jefe de área', NULL, NULL, NULL, '2018-04-20 03:53:56', '2018-08-23 05:45:54', '2018-08-23 05:45:54', 'profile_image.png', 1, 0),
(6, 'Maria', 'Pino', 'maria@mail.com', '$2y$10$0nZiuXGNT1VyO4mud2JY3es7L6.AY6Ix3vUWbeCRBcrzymgLyPndy', 5, 2, '125678422', 'Cajero', NULL, NULL, NULL, '2018-04-20 04:02:40', '2018-08-22 23:12:04', '2018-08-22 23:12:04', 'profile_image.png', 1, 0),
(7, 'Brito', 'Ventura', 'brito@mail.com', '$2y$10$Ff9LGKW8btZeRfQfwSqg2OdMqA.q/FvFALgAWX/NYLzB4cb7cI3H6', 5, 2, '8766251', 'Gerente de sucursal', NULL, NULL, NULL, '2018-04-20 04:04:16', '2018-08-22 23:05:34', '2018-08-22 23:05:34', 'profile_image.png', 1, 0),
(8, 'Diana', 'Herrera', 'diana@mail.com', '$2y$10$WmtXDGj/VR9M/EQrquKgJuqIu1C2BPcY48jBWEXtmZU4mBg1T2NuS', 5, 2, '123456667', 'Gerente', 'Administrativa', NULL, 'Xrd2Px0G0i6yVYqOltyg2gXyyGxzsZWmLYILtvae4KwOmuEYpi2R9PKQXFlv', '2018-04-20 19:30:43', '2018-09-24 05:52:30', NULL, 'perfil-8_1537757510.png', 1, 0),
(9, 'Halle', 'Berry', 'halle.b@mail.com', '$2y$10$OEhz2hV9IN9U8qpNzMaIG.3eTRC.VPRmx4C.74iwJVmDtwmw1L4e2', 5, 2, '1037777722', NULL, NULL, NULL, NULL, '2018-07-24 05:08:25', '2018-08-22 00:37:50', NULL, 'perfil-9_1534887470.png', 1, 0),
(10, 'Brad', 'Peters', 'brad@mail.com', '$2y$10$F78jzaSZMhJWH/JBzJZXSOF/2SpagfmIXl9bZehs/q.UURm3BnfBW', 5, 2, '70223122', 'Empleado', 'Operativa', NULL, 'SwFE3NE3ElB8Soq1diWCk9BF7iFbdVLpi3rX1C6uL3bKjshZHCNkDfkqk9Xd', '2018-07-24 05:12:28', '2018-09-24 19:24:00', NULL, 'perfil-10.png', 1, 0),
(11, 'Administrador', 'Prueba', 'administrador-prueba@mail.com', '$2y$10$SlNWsiexFyUop740J/rSje3U9kSjx0yQM/iUnClh.Cd5QSGQrAd3C', 2, 1, '112233', NULL, NULL, NULL, NULL, '2018-08-10 07:42:06', '2018-08-10 07:42:06', NULL, 'perfil-11.png', 1, 1),
(12, 'Supervisor', 'Apellido', 'super@mail.com', '$2y$10$sPqJim0szaxeKPR8JIwf2uclwrb.HE3SehY4kMNQ/1iLPaH43i2Iq', 4, 2, '1234566', 'Supervisor', 'Operativa', NULL, 'Upjd5NwMWDRhgvKT5KqevC2U5sFnPe8idyKK2IF7xHwLfC61HeolVO8V7AOz', '2018-08-15 23:16:51', '2018-09-25 01:31:11', NULL, 'perfil-12.png', 1, 1),
(13, 'Empleado', 'Apellido', 'empleado@mail.com', '$2y$10$XPnulUqOMMFrq1uulv7pQerO1DnmJaDDKgZnsLjWK.otkl5xGuVy2', 5, 2, '12345', 'Empleado', 'Operativa', NULL, 'LHHYWo5ypRc8egBvLiaJtcURp1p96Pjt2cIkZ35UKMCtyaz9DAQqIaZQqG5g', '2018-08-15 23:34:34', '2018-09-25 04:27:03', NULL, 'perfil-13_1537827109.png', 1, 1),
(14, 'Prueba', 'Tres', 'prueba3@gmail.com', '$2y$10$iGHV9CDHCatD1.X0oZPIGeVKHbHXEHbMWF613IAoWnImZ6W/vFpZq', 5, 2, '1037976435', NULL, NULL, NULL, 'jRX9s33jOdIGFHIWVKCzoHaZR8jXwH3umlBA9zE6Ul06IiS0ZeBsvaQzrtGi', '2018-08-21 23:04:27', '2018-09-11 02:26:47', NULL, 'perfil-14_1534887126.png', 1, 1),
(15, 'Prueba', 'Cuatro', 'prueba4@gmail.com', '$2y$10$dvHpzi6zkX589qqlGWrqqelg.1uIGsqKZZlEXLt9GMyyqA8BWzvhW', 5, 7, '123456', NULL, NULL, NULL, NULL, '2018-08-21 23:40:10', '2018-08-21 23:47:41', NULL, 'profile_image.png', 1, 1),
(16, 'Angie Carolina', 'Forero Buitrago', 'administracion.bogota@inser.com.co', '$2y$10$OJPduJCXCf02JioJZhF6aOf.Iyq4qRdmrqwtWJZNFhB3Z9EJlDMhC', 5, 14, '1023011562', 'Administradora', 'Administrativa', NULL, 'NUUY3zSlrLv5c6e9n5dECME5UYhetRl0YvPuCrUquFmQ3rnTNCh7rYmv2NfV', '2018-09-21 21:04:02', '2018-09-24 05:02:12', NULL, 'perfil-16_1537553043.png', 1, 1),
(17, 'Gilma Patricia', 'Rubiano Useda', 'enfermeria.bogota@inser.com.co', '$2y$10$LU9q6zw0CSXippQjI2JAD.irFwHhjH7oT.F1xQcnaD3Mr4CmWP8QK', 5, 14, '1033705388', 'Empleada', 'Enfermería', NULL, NULL, '2018-09-24 04:12:11', '2018-09-24 05:03:17', NULL, 'profile_image.png', 1, 1),
(18, 'Katherine Gisell', 'Hernández Osorio', 'laboratorio.bogota@inser.com.co', '$2y$10$5QJ4QvRsQYmmcYh0gqponuB7t8kIz7fqUKQgmQqKg8VA15TcIqsZC', 5, 14, '1012321484', 'Empleado', 'Laboratorio', NULL, NULL, '2018-09-24 04:35:17', '2018-09-26 04:31:16', NULL, 'profile_image.png', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_types`
--

CREATE TABLE `user_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Superadministrador', '2018-04-17 05:00:00', '2018-04-17 05:00:00'),
(2, 'Administrador', '2018-06-01 05:00:00', '2018-06-18 05:00:00'),
(3, 'Empresa', '2018-06-18 05:00:00', '2018-06-18 05:00:00'),
(4, 'Supervisor', '2018-06-18 05:00:00', '2018-06-18 05:00:00'),
(5, 'Empleado', '2018-06-18 05:00:00', '2018-06-18 05:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accomplishments`
--
ALTER TABLE `accomplishments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accomplishments_award_id_foreign` (`award_id`),
  ADD KEY `accomplishments_user_id_foreign` (`user_id`),
  ADD KEY `accomplishments_giver_id_foreign` (`giver_id`);

--
-- Indices de la tabla `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `answers_application_id_question_id_unique` (`application_id`,`question_id`),
  ADD KEY `answers_measure_id_foreign` (`measure_id`),
  ADD KEY `answers_question_id_foreign` (`question_id`);

--
-- Indices de la tabla `aplications`
--
ALTER TABLE `aplications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aplications_implementation_id_foreign` (`implementation_id`),
  ADD KEY `aplications_evaluator_id_foreign` (`evaluator_id`),
  ADD KEY `aplications_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `applications_evaluator_id_evaluation_id_user_id_unique` (`evaluator_id`,`evaluation_id`,`user_id`),
  ADD KEY `applications_user_id_foreign` (`user_id`),
  ADD KEY `applications_evaluation_id_foreign` (`evaluation_id`);

--
-- Indices de la tabla `application_evaluation`
--
ALTER TABLE `application_evaluation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `application_evaluation_application_id_evaluation_id_unique` (`application_id`,`evaluation_id`);

--
-- Indices de la tabla `assignations`
--
ALTER TABLE `assignations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignations_tested_id_foreign` (`tested_id`),
  ADD KEY `assignations_evaluation_id_foreign` (`evaluation_id`);

--
-- Indices de la tabla `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `awards_resource_id_foreign` (`resource_id`),
  ADD KEY `awards_organization_id_foreign` (`organization_id`),
  ADD KEY `awards_creator_id_foreign` (`creator_id`);

--
-- Indices de la tabla `award_resources`
--
ALTER TABLE `award_resources`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `competence_types`
--
ALTER TABLE `competence_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluations_evaluation_type_id_foreign` (`evaluation_type_id`),
  ADD KEY `evaluations_process_id_foreign` (`process_id`),
  ADD KEY `evaluations_creator_id_foreign` (`creator_id`);

--
-- Indices de la tabla `evaluation_question`
--
ALTER TABLE `evaluation_question`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `evaluation_question_evaluation_id_question_id_unique` (`evaluation_id`,`question_id`);

--
-- Indices de la tabla `evaluation_types`
--
ALTER TABLE `evaluation_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `implementations`
--
ALTER TABLE `implementations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `implementations_evaluation_id_foreign` (`evaluation_id`),
  ADD KEY `implementations_process_id_foreign` (`process_id`),
  ADD KEY `implementations_creator_id_foreign` (`creator_id`);

--
-- Indices de la tabla `implementation_questions`
--
ALTER TABLE `implementation_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `implementation_questions_implementation_id_foreign` (`implementation_id`),
  ADD KEY `implementation_questions_question_id_foreign` (`question_id`);

--
-- Indices de la tabla `measures`
--
ALTER TABLE `measures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `measures_scale_id_foreign` (`scale_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `processes`
--
ALTER TABLE `processes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `processes_organization_id_foreign` (`organization_id`);

--
-- Indices de la tabla `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_competence_id_foreign` (`competence_id`),
  ADD KEY `questions_scale_id_foreign` (`scale_id`),
  ADD KEY `questions_evaluation_type_id_foreign` (`evaluation_type_id`);

--
-- Indices de la tabla `scales`
--
ALTER TABLE `scales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_document_unique` (`document`),
  ADD KEY `users_user_type_id_foreign` (`user_type_id`),
  ADD KEY `users_organization_id_foreign` (`organization_id`);

--
-- Indices de la tabla `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accomplishments`
--
ALTER TABLE `accomplishments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `aplications`
--
ALTER TABLE `aplications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `application_evaluation`
--
ALTER TABLE `application_evaluation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `assignations`
--
ALTER TABLE `assignations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `award_resources`
--
ALTER TABLE `award_resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `badges`
--
ALTER TABLE `badges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `competences`
--
ALTER TABLE `competences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `competence_types`
--
ALTER TABLE `competence_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `evaluation_question`
--
ALTER TABLE `evaluation_question`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `evaluation_types`
--
ALTER TABLE `evaluation_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `implementations`
--
ALTER TABLE `implementations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `implementation_questions`
--
ALTER TABLE `implementation_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `measures`
--
ALTER TABLE `measures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `processes`
--
ALTER TABLE `processes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `scales`
--
ALTER TABLE `scales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accomplishments`
--
ALTER TABLE `accomplishments`
  ADD CONSTRAINT `accomplishments_award_id_foreign` FOREIGN KEY (`award_id`) REFERENCES `awards` (`id`),
  ADD CONSTRAINT `accomplishments_giver_id_foreign` FOREIGN KEY (`giver_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `accomplishments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_application_id_foreign` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`),
  ADD CONSTRAINT `answers_measure_id_foreign` FOREIGN KEY (`measure_id`) REFERENCES `measures` (`id`),
  ADD CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Filtros para la tabla `aplications`
--
ALTER TABLE `aplications`
  ADD CONSTRAINT `aplications_evaluator_id_foreign` FOREIGN KEY (`evaluator_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `aplications_implementation_id_foreign` FOREIGN KEY (`implementation_id`) REFERENCES `implementations` (`id`),
  ADD CONSTRAINT `aplications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_evaluation_id_foreign` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluations` (`id`),
  ADD CONSTRAINT `applications_evaluator_id_foreign` FOREIGN KEY (`evaluator_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `assignations`
--
ALTER TABLE `assignations`
  ADD CONSTRAINT `assignations_evaluation_id_foreign` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluations` (`id`),
  ADD CONSTRAINT `assignations_tested_id_foreign` FOREIGN KEY (`tested_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `awards`
--
ALTER TABLE `awards`
  ADD CONSTRAINT `awards_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `awards_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`),
  ADD CONSTRAINT `awards_resource_id_foreign` FOREIGN KEY (`resource_id`) REFERENCES `award_resources` (`id`);

--
-- Filtros para la tabla `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `evaluations_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `evaluations_evaluation_type_id_foreign` FOREIGN KEY (`evaluation_type_id`) REFERENCES `evaluation_types` (`id`),
  ADD CONSTRAINT `evaluations_process_id_foreign` FOREIGN KEY (`process_id`) REFERENCES `processes` (`id`);

--
-- Filtros para la tabla `implementations`
--
ALTER TABLE `implementations`
  ADD CONSTRAINT `implementations_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `implementations_evaluation_id_foreign` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluations` (`id`),
  ADD CONSTRAINT `implementations_process_id_foreign` FOREIGN KEY (`process_id`) REFERENCES `processes` (`id`);

--
-- Filtros para la tabla `implementation_questions`
--
ALTER TABLE `implementation_questions`
  ADD CONSTRAINT `implementation_questions_implementation_id_foreign` FOREIGN KEY (`implementation_id`) REFERENCES `implementations` (`id`),
  ADD CONSTRAINT `implementation_questions_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Filtros para la tabla `measures`
--
ALTER TABLE `measures`
  ADD CONSTRAINT `measures_scale_id_foreign` FOREIGN KEY (`scale_id`) REFERENCES `scales` (`id`);

--
-- Filtros para la tabla `processes`
--
ALTER TABLE `processes`
  ADD CONSTRAINT `processes_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`);

--
-- Filtros para la tabla `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_competence_id_foreign` FOREIGN KEY (`competence_id`) REFERENCES `competences` (`id`),
  ADD CONSTRAINT `questions_evaluation_type_id_foreign` FOREIGN KEY (`evaluation_type_id`) REFERENCES `evaluation_types` (`id`),
  ADD CONSTRAINT `questions_scale_id_foreign` FOREIGN KEY (`scale_id`) REFERENCES `scales` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`),
  ADD CONSTRAINT `users_user_type_id_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
