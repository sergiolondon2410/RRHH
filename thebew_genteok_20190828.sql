-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2019 a las 03:05:19
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
(11, 3, '2018-09-28 23:31:13', '2018-09-28 23:31:13', 2, NULL, 8),
(14, 1, '2018-10-16 22:43:28', '2018-10-16 22:43:28', 1, NULL, 1),
(15, 3, '2018-10-16 22:48:04', '2018-10-16 22:48:04', 1, NULL, 2),
(16, 2, '2018-10-16 23:24:03', '2018-10-16 23:24:03', 1, NULL, 5),
(17, 1, '2018-10-16 23:31:31', '2018-10-16 23:31:31', 1, NULL, 3),
(18, 2, '2018-10-17 00:44:20', '2018-10-17 00:44:20', 1, NULL, 4),
(19, 1, '2018-10-17 00:44:35', '2018-10-17 00:44:35', 1, NULL, 6),
(20, 3, '2018-10-17 00:44:40', '2018-10-17 00:44:40', 1, NULL, 7),
(21, 2, '2018-10-17 00:44:44', '2018-10-17 00:44:44', 1, NULL, 8),
(22, 1, '2018-10-19 01:31:53', '2018-10-19 01:31:53', 15, NULL, 1),
(23, 2, '2018-10-19 01:31:57', '2018-10-19 01:31:57', 15, NULL, 2),
(24, 3, '2018-10-19 01:32:01', '2018-10-19 01:32:01', 15, NULL, 5),
(25, 4, '2018-10-19 01:32:05', '2018-10-19 01:32:05', 15, NULL, 3),
(26, 3, '2018-10-19 01:32:11', '2018-10-19 01:32:11', 15, NULL, 4),
(27, 2, '2018-10-19 01:32:15', '2018-10-19 01:32:15', 15, NULL, 6),
(28, 1, '2018-10-19 01:32:18', '2018-10-19 01:32:18', 15, NULL, 7),
(29, 2, '2018-10-19 01:32:21', '2018-10-19 01:32:21', 15, NULL, 8);

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
(1, 10, 'completed', NULL, '2018-08-29 03:00:00', '2018-10-17 00:44:44', 10, 1),
(2, 8, 'completed', NULL, '2018-08-29 03:00:00', '2018-09-28 23:31:13', 10, 1),
(3, 9, 'uninitialized', NULL, '2018-09-21 01:30:44', '2018-09-21 01:30:44', 10, 1),
(4, 12, 'uninitialized', NULL, '2018-09-21 01:48:51', '2018-09-21 01:48:51', 13, 1),
(5, 14, 'uninitialized', NULL, '2018-09-21 01:50:59', '2018-09-21 01:50:59', 9, 1),
(6, 9, 'uninitialized', NULL, '2018-09-21 01:50:59', '2018-09-21 01:50:59', 9, 1),
(7, 8, 'uninitialized', NULL, '2018-09-21 04:34:32', '2018-09-29 03:05:44', 8, 1),
(8, 12, 'uninitialized', NULL, '2018-09-25 01:34:37', '2018-09-25 01:34:37', 12, 1),
(9, 13, 'uninitialized', NULL, '2018-09-25 01:37:05', '2018-09-25 01:37:05', 13, 1),
(10, 13, 'uninitialized', NULL, '2018-09-25 04:27:47', '2018-09-25 04:27:47', 13, 2),
(11, 13, 'uninitialized', NULL, '2018-10-02 00:18:58', '2018-10-02 00:20:45', 10, 1),
(12, 13, 'started', NULL, '2018-10-02 00:19:10', '2018-10-02 01:54:44', 8, 1),
(13, 13, 'uninitialized', NULL, '2018-10-02 00:19:41', '2018-10-02 00:19:41', 14, 1),
(14, 13, 'uninitialized', NULL, '2018-10-02 00:19:50', '2018-10-02 00:19:50', 12, 1),
(15, 10, 'completed', NULL, '2018-10-19 01:30:36', '2018-10-19 01:32:22', 8, 1),
(16, 10, 'uninitialized', NULL, '2018-10-19 01:31:01', '2018-10-19 01:31:01', 13, 1),
(17, 10, 'uninitialized', NULL, '2018-11-06 14:01:48', '2018-11-06 14:01:48', 10, 2);

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
(7, 'Trabajo en equipo', 'hjvdjhdvhjcsdcvsdsc', '2018-06-19 21:35:17', '2018-06-19 21:35:17', '#3bb8f7', 2),
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
(1, 'Competencia', '2018-06-19 05:00:00', '2018-06-19 05:00:00'),
(2, 'Indicador de productividad', '2018-06-19 05:00:00', '2018-06-19 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compromises`
--

CREATE TABLE `compromises` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `validator_id` int(10) UNSIGNED DEFAULT NULL,
  `activity` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `observation` mediumtext COLLATE utf8mb4_unicode_ci,
  `ending` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compromises`
--

INSERT INTO `compromises` (`id`, `user_id`, `validator_id`, `activity`, `observation`, `ending`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 11, 'Llegar temprano', 'Segunda oportunidad', '2019-03-21 20:57:23', 'achieved', NULL, '2018-10-15 22:10:37', '2018-10-15 22:10:37'),
(2, 8, 9, 'Leer el manual del empleado', '', '2018-11-02 09:06:36', 'pending', NULL, '2018-10-16 09:06:36', '2018-10-16 09:06:36'),
(3, 12, 8, 'Realizar el curso virtual de excel', 'Obtener el certificado entregado por la academia virtual', '2019-05-31 19:40:13', 'achieved', NULL, '2018-10-16 09:11:30', '2019-03-31 19:40:13'),
(4, 8, 12, 'Enviar los reportes de final de día', 'Realizar esta acción todos los días de este mes', '2019-03-21 20:58:00', 'unsuccessful', NULL, '2018-10-16 09:13:27', '2018-10-16 09:13:27'),
(5, 1, 4, 'rgtgegr', 'bbfunyfhgdv', '2018-10-20 09:19:12', 'pending', NULL, '2018-10-16 09:19:12', '2018-10-16 09:19:12'),
(6, 1, 4, 'fgsdgdsfgdg', 'fgdfgdbfgv', '2018-10-26 11:51:01', 'pending', NULL, '2018-10-16 11:51:01', '2018-10-16 11:51:01'),
(7, 8, 12, 'xbcxcv', '', '2018-12-15 11:52:16', 'pending', NULL, '2018-10-16 11:52:16', '2018-10-16 11:52:16'),
(8, 11, 1, 'dsfdsfdfdf', 'sdfsdfssd', '2018-10-25 11:53:47', 'pending', NULL, '2018-10-16 11:53:47', '2018-10-16 11:53:47'),
(10, 10, 8, 'Leer', 'Trabajo en equipo', '2019-04-30 21:28:42', 'pending', NULL, '2018-10-22 17:46:02', '2019-03-27 21:28:42'),
(11, 10, 12, 'Actividades', 'Trabajo en equipo', '2018-11-04 02:21:20', 'pending', NULL, '2018-10-24 02:21:20', '2018-10-24 02:21:20'),
(12, 10, 9, 'Llegar temprano', 'Asistencia y Puntualidad', '2018-12-10 02:23:23', 'pending', NULL, '2018-10-24 02:23:23', '2018-10-24 02:23:23'),
(13, 10, 8, 'Usar correctamente el uniforme', 'Cumplimiento de Normas disciplinarias y de seguridad', '2018-11-05 02:25:42', 'pending', NULL, '2018-10-24 02:25:42', '2018-10-24 02:25:42'),
(14, 10, 14, 'Acciones x, y, z', 'Aspecto x', '2019-05-31 20:19:22', 'pending', NULL, '2019-03-27 20:19:22', '2019-03-27 20:19:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compromise_alerts`
--

CREATE TABLE `compromise_alerts` (
  `id` int(10) UNSIGNED NOT NULL,
  `compromise_id` int(10) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compromise_alerts`
--

INSERT INTO `compromise_alerts` (`id`, `compromise_id`, `date`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, '2018-10-20 09:06:36', 'pending', NULL, '2018-10-16 09:06:36', '2018-10-16 09:06:36'),
(2, 3, '2018-11-24 09:11:30', 'pending', NULL, '2018-10-16 09:11:30', '2018-10-16 09:11:30'),
(3, 5, '2018-10-19 09:19:12', 'pending', NULL, '2018-10-16 09:19:12', '2018-10-16 09:19:12'),
(4, 6, '2018-10-13 11:51:01', 'pending', NULL, '2018-10-16 11:51:01', '2018-10-16 11:51:01'),
(6, 10, '2018-10-31 17:46:03', 'pending', NULL, '2018-10-22 17:46:03', '2018-10-22 17:46:03'),
(7, 11, '2018-11-03 02:21:20', 'pending', NULL, '2018-10-24 02:21:20', '2018-10-24 02:21:20'),
(8, 13, '2018-10-30 02:25:42', 'pending', NULL, '2018-10-24 02:25:42', '2018-10-24 02:25:42');

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
(45, '2018_09_21_152934_add_question_column_to_answers_table', 30),
(46, '2018_10_14_154637_create_compromises_table', 31),
(47, '2018_10_14_160436_create_compromise_alerts_table', 32),
(48, '2018_10_25_140758_create_recognition_resources_table', 33),
(49, '2018_10_25_141231_create_recognitions_table', 34),
(51, '2018_10_29_203744_create_trainings_table', 35);

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
(14, 'Inser - instituto de fertilidad humana', '2018-09-21 20:53:43', '2018-09-21 20:53:43', NULL, 'empresa-14.png', '12234445', '+57(4) 268 8000', '51 - 100'),
(15, 'Centro Sur', '2019-05-13 12:54:37', '2019-05-13 12:54:37', NULL, 'empresa-15.png', '811037405-1', '3177804800', '21 - 50'),
(17, 'Plaza Mayor Medellín', '2019-08-27 19:46:22', '2019-08-27 19:46:22', NULL, 'empresa-17.png', '890909297-2', '01 8000 424 100', '> 100');

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
(2, 'Proceso evaluativo gente ok', 'Proceso de prueba', 1, '2018-12-10 18:45:44', '2018-12-10 18:45:44', 'activo');

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
(9, 'Mire para arriba y luego para abajo', 7, '2018-09-03 02:33:15', '2018-09-03 04:48:03', 3, 2),
(10, 'Fgdfgsfgdfgdfgdfgd', 1, '2018-09-04 16:54:43', '2018-09-04 16:54:43', 2, 1),
(11, 'Pregunta método', 4, '2018-09-12 02:11:31', '2018-09-12 02:11:31', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recognitions`
--

CREATE TABLE `recognitions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resource_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `grantter_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `recognitions`
--

INSERT INTO `recognitions` (`id`, `name`, `observation`, `resource_id`, `user_id`, `grantter_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Super Puntualidad', 'Llega temprano siempre', 17, 10, 12, NULL, '2018-10-26 01:54:22', '2019-03-31 22:12:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recognition_resources`
--

CREATE TABLE `recognition_resources` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `recognition_resources`
--

INSERT INTO `recognition_resources` (`id`, `name`, `uri`, `created_at`, `updated_at`) VALUES
(1, 'Escudo estrella', '/badges/002-shield.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(2, 'Listón estrella', '/badges/003-star.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(3, 'Escudo uno', '/badges/004-one.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(4, 'Copa estrella', '/badges/005-trophy.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(5, 'Copa mundial', '/badges/006-soccer.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(6, 'Premio uno', '/badges/007-award.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(7, 'Premio estrellas', '/badges/008-award-1.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(8, 'Estatuilla estrella dorada', '/badges/009-award-2.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(9, 'Premio estrella', '/badges/010-award-3.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(10, 'Estatuilla alas', '/badges/011-award-4.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(11, 'Premio diamante', '/badges/012-diamond.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(12, 'Estatuilla estrella plateada', '/badges/013-star-1.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(13, 'Estatuilla academia', '/badges/014-oscar.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(14, 'Estatuilla uno', '/badges/015-trophy-1.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(15, 'Cinturón estrella', '/badges/016-champion-belt.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(16, 'Trofeo estrella', '/badges/017-trophy-2.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(17, 'Trofeo cohete', '/badges/018-award-5.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(18, 'Copa Sonrisa', '/badges/019-champion.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(19, 'Trofeo globo', '/badges/020-golden-globe.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(20, 'Trofeo rubí', '/badges/021-trophy-3.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(21, 'Medalla militar estrella roja', '/badges/022-medal-1.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(22, 'Emblema estrella', '/badges/023-badge.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(23, 'Listón uno', '/badges/024-one-1.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(24, 'Botón OK', '/badges/025-best.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(25, 'Listón uno rojo', '/badges/026-one-2.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(26, 'Escudo tres estrellas', '/badges/027-medal-2.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(27, 'Medalla militar estrella verde', '/badges/028-medal-3.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(28, 'Medalla militar circulo gris', '/badges/029-medal-4.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(29, 'Medalla militar circulo check', '/badges/030-medal-5.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(30, 'Medalla militar circulo estrella', '/badges/031-medal-6.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(31, 'Estrella uno', '/badges/032-star-2.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(32, 'Medalla militar cruz', '/badges/033-badge-1.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(33, 'Listón', '/badges/034-ribbon.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(34, 'Trofeo corazón', '/badges/035-reward.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00'),
(35, 'Listón tierra', '/badges/036-reward-1.png', '2018-09-03 16:17:00', '2018-09-03 16:18:00');

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
-- Estructura de tabla para la tabla `trainings`
--

CREATE TABLE `trainings` (
  `id` int(10) UNSIGNED NOT NULL,
  `observation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `trainings`
--

INSERT INTO `trainings` (`id`, `observation`, `status`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Manejo de Excel y google sheets.', 'unsuccessful', 10, NULL, '2018-10-30 02:22:24', '2019-03-31 20:11:34');

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
(2, 'Juan', 'Pérez', 'jp@mail.com', '123', 5, 2, '12634563464', 'Operario', 'Operativa', NULL, NULL, NULL, '2018-08-23 05:15:51', '2018-08-23 05:15:51', 'profile_image.png', 1, 0),
(3, 'Pepe', 'Mora', 'pepe@mail.com', '$2y$10$sOcAWdz79xkrm8T6punExOBUOI43u/xC22YdDXT2imIAfLg9tnj8u', 5, 2, '1234567', 'Asistente operativo', 'Operativa', '2016-03-15 05:00:00', 'g4V5sVf3nEVD7nQTLWEM0B0o6N3VfRuRQPcofnVy3mXaMu6YhTIljanwdDKz', '2018-04-19 10:48:08', '2018-08-22 23:14:08', '2018-08-22 23:14:08', 'profile_image.png', 1, 0),
(4, 'SuperAdministrador', 'Gente', 'admin@mail.com', '$2y$10$sOcAWdz79xkrm8T6punExOBUOI43u/xC22YdDXT2imIAfLg9tnj8u', 1, 1, '9876382', 'Auxiliar contable', 'Operativa', NULL, 'NNZpbv8Q4F1TccgJwqmeBWddiO6SOf3Lre32XMjbC1KrTiuqvxqijACizv87', '2018-04-19 22:41:42', '2018-04-19 22:41:42', NULL, 'profile_image.png', 1, 0),
(5, 'Rosa', 'Gómez', 'rosa@mail.com', '$2y$10$B5BoRHsrJsjTvwCAdV2L6.4SiexqWiy8va4MnwfVm5iqXjcobgjM.', 5, 2, '1256784', 'Jefe de área', 'Operativa', NULL, NULL, '2018-04-20 03:53:56', '2018-08-23 05:45:54', '2018-08-23 05:45:54', 'profile_image.png', 1, 0),
(6, 'Maria', 'Pino', 'maria@mail.com', '$2y$10$0nZiuXGNT1VyO4mud2JY3es7L6.AY6Ix3vUWbeCRBcrzymgLyPndy', 5, 2, '125678422', 'Cajero', 'Operativa', NULL, NULL, '2018-04-20 04:02:40', '2018-08-22 23:12:04', '2018-08-22 23:12:04', 'profile_image.png', 1, 0),
(7, 'Brito', 'Ventura', 'brito@mail.com', '$2y$10$Ff9LGKW8btZeRfQfwSqg2OdMqA.q/FvFALgAWX/NYLzB4cb7cI3H6', 5, 2, '8766251', 'Gerente de sucursal', 'Operativa', NULL, NULL, '2018-04-20 04:04:16', '2018-08-22 23:05:34', '2018-08-22 23:05:34', 'profile_image.png', 1, 0),
(8, 'Diana', 'Herrera', 'diana@mail.com', '$2y$10$WmtXDGj/VR9M/EQrquKgJuqIu1C2BPcY48jBWEXtmZU4mBg1T2NuS', 5, 2, '123456667', 'Gerente', 'Administrativa', NULL, 'X3pt21xSXDuoX7iNTYVJL7jP2E1leBKdtENsFj09ss8NxpCb53Z4h7w4j7W5', '2018-04-20 19:30:43', '2018-09-24 05:52:30', NULL, 'perfil-8_1537757510.png', 1, 0),
(9, 'Halle', 'Berry', 'halle.b@mail.com', '$2y$10$OEhz2hV9IN9U8qpNzMaIG.3eTRC.VPRmx4C.74iwJVmDtwmw1L4e2', 5, 2, '1037777722', 'Empleado', 'Operativa', NULL, NULL, '2018-07-24 05:08:25', '2018-08-22 00:37:50', NULL, 'perfil-9_1534887470.png', 1, 0),
(10, 'Brad', 'Peters', 'brad@mail.com', '$2y$10$F78jzaSZMhJWH/JBzJZXSOF/2SpagfmIXl9bZehs/q.UURm3BnfBW', 5, 2, '70223122', 'Empleado', 'Operativa', NULL, 'ztxKoHyVNub2apnSneQoPYvjdhK6nCxAYudTbgSd9scuW3SeZylRouxgptye', '2018-07-24 05:12:28', '2018-09-24 19:24:00', NULL, 'perfil-10.png', 1, 0),
(11, 'Administrador', 'Prueba', 'administrador-prueba@mail.com', '$2y$10$SlNWsiexFyUop740J/rSje3U9kSjx0yQM/iUnClh.Cd5QSGQrAd3C', 2, 1, '112233', 'Empleado', 'Operativa', NULL, NULL, '2018-08-10 07:42:06', '2018-08-10 07:42:06', NULL, 'perfil-11.png', 1, 1),
(12, 'Supervisor', 'Apellido', 'super@mail.com', '$2y$10$sPqJim0szaxeKPR8JIwf2uclwrb.HE3SehY4kMNQ/1iLPaH43i2Iq', 4, 2, '1234566', 'Supervisor', 'Operativa', NULL, 'Upjd5NwMWDRhgvKT5KqevC2U5sFnPe8idyKK2IF7xHwLfC61HeolVO8V7AOz', '2018-08-15 23:16:51', '2018-09-25 01:31:11', NULL, 'perfil-12.png', 1, 1),
(13, 'Empleado', 'Apellido', 'empleado@mail.com', '$2y$10$XPnulUqOMMFrq1uulv7pQerO1DnmJaDDKgZnsLjWK.otkl5xGuVy2', 5, 2, '12345', 'Empleado', 'Operativa', NULL, 'Dd46V8o36JzJgK2ZSy00OSS6KFDLa1P888RyAvy9jTplYJSo28va4f7wUlzj', '2018-08-15 23:34:34', '2018-09-25 04:27:03', NULL, 'perfil-13_1537827109.png', 1, 1),
(14, 'Prueba', 'Tres', 'prueba3@gmail.com', '$2y$10$iGHV9CDHCatD1.X0oZPIGeVKHbHXEHbMWF613IAoWnImZ6W/vFpZq', 5, 2, '1037976435', 'Empleado', 'Operativa', NULL, 'jRX9s33jOdIGFHIWVKCzoHaZR8jXwH3umlBA9zE6Ul06IiS0ZeBsvaQzrtGi', '2018-08-21 23:04:27', '2018-09-11 02:26:47', NULL, 'perfil-14_1534887126.png', 1, 1),
(15, 'Prueba', 'Cuatro', 'prueba4@gmail.com', '$2y$10$dvHpzi6zkX589qqlGWrqqelg.1uIGsqKZZlEXLt9GMyyqA8BWzvhW', 5, 7, '123456', 'Empleado', 'Operativa', NULL, NULL, '2018-08-21 23:40:10', '2018-08-21 23:47:41', NULL, 'profile_image.png', 1, 1),
(16, 'Angie Carolina', 'Forero Buitrago', 'administracion.bogota@inser.com.co', '$2y$10$OJPduJCXCf02JioJZhF6aOf.Iyq4qRdmrqwtWJZNFhB3Z9EJlDMhC', 5, 14, '1023011562', 'Administradora', 'Administrativa', NULL, 'NUUY3zSlrLv5c6e9n5dECME5UYhetRl0YvPuCrUquFmQ3rnTNCh7rYmv2NfV', '2018-09-21 21:04:02', '2018-09-24 05:02:12', NULL, 'perfil-16_1537553043.png', 1, 1),
(17, 'Gilma Patricia', 'Rubiano Useda', 'enfermeria.bogota@inser.com.co', '$2y$10$LU9q6zw0CSXippQjI2JAD.irFwHhjH7oT.F1xQcnaD3Mr4CmWP8QK', 5, 14, '1033705388', 'Empleada', 'Enfermería', NULL, NULL, '2018-09-24 04:12:11', '2018-09-24 05:03:17', NULL, 'profile_image.png', 1, 1),
(18, 'Katherine Gisell', 'Hernández Osorio', 'laboratorio.bogota@inser.com.co', '$2y$10$5QJ4QvRsQYmmcYh0gqponuB7t8kIz7fqUKQgmQqKg8VA15TcIqsZC', 5, 14, '1012321484', 'Empleado', 'Laboratorio', NULL, NULL, '2018-09-24 04:35:17', '2018-09-26 04:31:16', NULL, 'profile_image.png', 1, 1),
(19, 'Pepito', 'Pérez', 'pepito@mimail.com', '$2y$10$KyQyjsivO1xLLIHKO0YcNOYXu7uuNJG/80hu7NyxgtH6dnYT7/Cy6', 4, 3, '70119231', 'Gerente', 'Administrativa', NULL, NULL, '2019-04-01 20:55:58', '2019-04-01 20:55:58', NULL, 'profile_image.png', 1, 1),
(20, 'Juana María', 'Alzate', 'juanaal@mail.com', '$2y$10$soR02AFn8nXmyM7GJBKg9uLaYWJV6xYiiecZgKuQfTsooppOeba5K', 5, 3, '43440551', 'Auxiliar contable', 'Contable', NULL, NULL, '2019-04-01 20:56:01', '2019-04-01 20:56:01', NULL, 'profile_image.png', 1, 1),
(21, 'Adriana Milena', 'Aarón Rincón ', 'adriana.aaron@plazamayor.com.co', '$2y$10$ztrUJWdwCYytr6PxefL/.eUSaSl4ChCk9XO6rWOpxFdYtXTYSu5LW', 5, 17, '1128274353', 'Analista de Causacion', 'Gerencia Administrativa y Financiera', NULL, NULL, '2019-08-27 19:57:37', '2019-08-27 19:57:37', NULL, 'Analista de Causacion', 1, 1),
(22, 'Daniela ', 'Alvarez Olaya ', 'daniela.alvarez@plazamayor.com.co', '$2y$10$K5lWBzTuqd.mBgX52MI9.eAYeyk5U41HDpgiQZkeeKvVr0cWmA3y.', 5, 17, '1037618717', 'Auxiliar de Compras', 'Gerencia Administrativa y Financiera', NULL, NULL, '2019-08-27 19:57:37', '2019-08-27 19:57:37', NULL, 'Auxiliar de Compras', 1, 1),
(23, 'Lina Marcela', 'Alvarez Villegas ', 'lina.alvarez@plazamayor.com.co', '$2y$10$IMXnssHO9qhpLupLfB.8JOBOOBNbDWV8MmyqEUhxX/V9yT/1LISoy', 5, 17, '43627820', 'Ejecutiva de Servicio al Cliente y Fidelización', 'Gerencia General', NULL, NULL, '2019-08-27 19:57:38', '2019-08-27 19:57:38', NULL, 'Ejecutiva de Servicio al Cliente y Fidelización', 1, 1),
(24, 'Danilo Eduardo', 'Alvis Montes', 'danilo.alvis@plazamayor.com.co', '$2y$10$4Ly14wnEvJgW85NGsHoPV.Rn/JZZUsbY4G7D1gy7PuG9dgvt50S72', 5, 17, '1050958273', 'Auxiliar Salud y seguridad en el trabajo', 'Gerencia Administrativa y Financiera', NULL, NULL, '2019-08-27 19:57:38', '2019-08-27 19:57:38', NULL, 'Auxiliar Salud y seguridad en el trabajo', 1, 1),
(25, 'Mary Luz', 'Alzate Zuluaga', 'mary.alzate@plazamayor.com.co', '$2y$10$yTOmORlhX/4Snj3ZB5R0Segl.ePiroOYCgEoGaqKlYulrRMlBIFyu', 5, 17, '1017199090', 'Auxiliar Contable Junior', 'Gerencia Administrativa y Financiera', NULL, NULL, '2019-08-27 19:57:38', '2019-08-27 19:57:38', NULL, 'Auxiliar Contable Junior', 1, 1),
(26, 'Elizabeth', 'Arango Arango ', 'elizabeth.arango@plazamayor.com.co', '$2y$10$JLe8kK/IELZA1RLeXPICUOuF5WYGwh5n7FOJxG7ynXXhaNfPHxS5W', 5, 17, '43163872', 'Gerente Administrativa y Financiera', 'Gerencia Administrativa y Financiera', NULL, NULL, '2019-08-27 19:57:39', '2019-08-27 19:57:39', NULL, 'Gerente Administrativa y Financiera', 1, 1),
(27, 'Sandra Yaneth', 'Arango Bedoya ', 'sandra.arango@plazamayor.com.co', '$2y$10$3n0GE5qKmzlkv7an7rGLFuyi2HxA3mlYSZYkZSoxXeFBbJ5Z152MC', 5, 17, '43641136', 'Auxiliar de Servicio   ', 'Gerencia de Servicio y Operaciones', NULL, NULL, '2019-08-27 19:57:39', '2019-08-27 19:57:39', NULL, 'Auxiliar de Servicio   ', 1, 1),
(28, 'Ofir Alexandra', 'Arango Manrique ', 'alexandra.arango@plazamayor.com.co', '$2y$10$5RXlVo3cK.SQQvQAkfJuteU94HlL9iFpfmANGvtYVJGRdHV/ppuHe', 5, 17, '43905630', 'Auxiliar de Tesoreria', 'Gerencia Administrativa y Financiera', NULL, NULL, '2019-08-27 19:57:39', '2019-08-27 19:57:39', NULL, 'Auxiliar de Tesoreria', 1, 1),
(29, 'Paola Andrea', 'Arango Monsalve ', 'paola.arango@plazamayor.com.co', '$2y$10$g.lQpVYkGwRxc67CnFCBxOV2eVi9S2SnCU54kF5fUjqpL1YnDQq1S', 5, 17, '32296543', 'Directora de Auditoria ', 'Gerencia General', NULL, NULL, '2019-08-27 19:57:39', '2019-08-27 19:57:39', NULL, 'Directora de Auditoria ', 1, 1),
(30, 'Juan David', 'Arango Pelaez', 'juan.arango@plazamayor.com.co', '$2y$10$RRWQ.T0CrcyE5OeIun1b3eEENgvtKDqBOZoMWrnk8mgNJ/5iM2d2S', 5, 17, '8102228', 'Director Juridico', 'Secretaria General', NULL, NULL, '2019-08-27 19:57:40', '2019-08-27 19:57:40', NULL, 'Director Juridico', 1, 1),
(31, 'Diana Yasmin', 'Arango Pineda ', 'diana.arango@plazamayor.com.co', '$2y$10$S90GScQ.ieAu7sHZ2XfdOOe9Lffe8cuvwFcdqPDnGNSPeJE3VokwG', 5, 17, '52325727', 'Auxiliar Soporte Operativo', 'Gerencia Comercial', NULL, NULL, '2019-08-27 19:57:40', '2019-08-27 19:57:40', NULL, 'Auxiliar Soporte Operativo', 1, 1),
(32, 'Cindy Johana', 'Arango Roman', 'cindy.arango@plazamayor.com.co', '$2y$10$ccTGjOAkwTYMQr62A1.AouTpk7mAgXCuU.JGIcv5vU/uxwXTUSmP2', 5, 17, '1128402341', 'Analista Tecnico', 'Gerencia de Servicio y Operaciones', NULL, NULL, '2019-08-27 19:57:40', '2019-08-27 19:57:40', NULL, 'Analista Tecnico', 1, 1),
(33, 'Geisy Lorena', 'Arango Usuga ', 'lorena.arango@plazamayor.com.co', '$2y$10$Cedx6QYREgDu/qW.GVO..OMqXpaxRSpvgykfKRKJnKsAtqhB81uvm', 5, 17, '1037608874', 'Auxiliar Soporte Operativo', 'Gerencia Comercial', NULL, NULL, '2019-08-27 19:57:40', '2019-08-27 19:57:40', NULL, 'Auxiliar Soporte Operativo', 1, 1),
(34, 'Lina Maria', 'Arboleda Arcila ', 'lina.arboleda@plazamayor.com.co', '$2y$10$CkxjHUjCPfiyoNNOg9LnzOi8SAxYEoLpqkRUDK3wVUpJuhvul1176', 5, 17, '1152437533', 'Analista Financiera', 'Gerencia Administrativa y Financiera', NULL, NULL, '2019-08-27 19:57:41', '2019-08-27 19:57:41', NULL, 'Analista Financiera', 1, 1),
(35, 'Sandra Milena', 'Arenas Valencia ', 'sandra.arenas@plazamayor.com.co', '$2y$10$ZbtDIbCkGBDBogpwmIczmuhY1WM/8SZWWPL8cQe1MQytm54BDXYPu', 5, 17, '43759270', 'Analista de Servicios Adicionales', 'Gerencia de Servicio y Operaciones', NULL, NULL, '2019-08-27 19:57:41', '2019-08-27 19:57:41', NULL, 'Analista de Servicios Adicionales', 1, 1),
(36, 'Elizabeth', 'Arenas Villa ', 'elizabeth.arenas@plazamayor.com.co', '$2y$10$94f9.0nhhIB3TLpH2QXq0OlMRoyhK1tkjG0YLTjS5/FYkKULY6bN.', 5, 17, '1037582817', 'Abogado', 'Secretaria General', NULL, NULL, '2019-08-27 19:57:41', '2019-08-27 19:57:41', NULL, 'Abogado', 1, 1),
(37, 'David', 'Arias Jaramillo ', 'david.arias@plazamayor.com.co', '$2y$10$6ra7ei/hPxOxuXE1pAPBCOJht/uXZebQdtS.zGBdzHuyvfrNNRczG', 5, 17, '71787785', 'Gerente de Servicio y Operaciones', 'Gerencia de Servicio y Operaciones', NULL, NULL, '2019-08-27 19:57:42', '2019-08-27 19:57:42', NULL, 'Gerente de Servicio y Operaciones', 1, 1),
(38, 'Maria Fernanda', 'Arroyave Valencia ', 'maria.arroyave@plazamayor.com.co', '$2y$10$6uiDa7yGOtDPmYhv8F0/guT3LR4AchzyWCCJQJ0CAR.l4cej3hsXi', 5, 17, '1017148535', 'Analista de Compras', 'Gerencia Administrativa y Financiera', NULL, NULL, '2019-08-27 19:57:42', '2019-08-27 19:57:42', NULL, 'Analista de Compras', 1, 1),
(39, 'Yusleidi Viviana', 'Atehortua Muñeton ', 'viviana.atehortua@plazamayor.com.co', '$2y$10$Ma93oSdjFrU/JjYFnU56yerif4Gq7SU0o2c0k498.u9MHm5KtYJ2i', 5, 17, '32184003', 'Ejecutivo Comercial Sector Privado', 'Gerencia Comercial', NULL, NULL, '2019-08-27 19:57:42', '2019-08-27 19:57:42', NULL, 'Ejecutivo Comercial Sector Privado', 1, 1),
(40, 'Juan Pablo', 'Avendaño Muñoz ', 'juan.avendano@plazamayor.com.co', '$2y$10$8QTNrXkLANJD5MIgktSVSu5KiobjIEOYolRIkVfP2gXks4S2.Hoia', 5, 17, '15342088', 'Ejecutivo Comercial Eventos Propios', 'Gerencia Comercial', NULL, NULL, '2019-08-27 20:08:16', '2019-08-27 20:08:16', NULL, 'profile_image.png', 1, 1),
(41, 'Jovam Alexander', 'Benalcazar Castro ', 'jovam.benalcazar@plazamayor.com.co', '$2y$10$zcVVULtFBXPdr.99Efg7WOyON3Qit8RKVAjkQLGb8B9KUru9LMOC6', 5, 17, '71290749', 'Auxiliar de Almacén', 'Gerencia de Servicio y Operaciones', NULL, NULL, '2019-08-27 20:08:16', '2019-08-27 20:08:16', NULL, 'profile_image.png', 1, 1),
(42, 'Marcela Maria', 'Bermudez Monsalve ', 'marcela.bermudez@plazamayor.com.co', '$2y$10$SXOKeAB90Em0uuUlbx7UpeClsoDsXnkJtIbHQyd4DY.or.grgHmZu', 5, 17, '1128387688', 'Analista de Compras', 'Gerencia Administrativa y Financiera', NULL, NULL, '2019-08-27 20:08:16', '2019-08-27 20:08:16', NULL, 'profile_image.png', 1, 1),
(43, 'Madelin Del Carmen', 'Bolaño Lopez ', 'madelin.bolano@plazamayor.com.co', '$2y$10$MGqAV.pUHIzArIHXt9zDv.fsA7FJU7qLSzZ7A28sCKerioQgWjGvu', 5, 17, '39048751', 'Ejecutivo Comercial Sector Gobierno', 'Gerencia Comercial', NULL, NULL, '2019-08-27 20:08:17', '2019-08-27 20:08:17', NULL, 'profile_image.png', 1, 1),
(44, 'Juan Jose Rogelio', 'Builes Velasquez', 'juan.builes@plazamayor.com.co', '$2y$10$sMZWUMzKPu1CcDoyb32ao.Ltt2IqO4oXu6mu0Ehkyj9.mknGqGLcG', 5, 17, '71336201', 'Director de Ventas', 'Gerencia Comercial', NULL, NULL, '2019-08-27 20:08:17', '2019-08-27 20:08:17', NULL, 'profile_image.png', 1, 1),
(45, 'Viviana Andrea', 'Bustamante Cano', 'viviana.bustamante@plazamayor.com.co', '$2y$10$vBirL4KP4chsgWzIb/1JaeeM.w2MYvUF8lbP9LM3IRll1pGIvubry', 5, 17, '32207438', 'Productor Junior', 'Gerencia de Servicio y Operaciones', NULL, NULL, '2019-08-27 20:08:17', '2019-08-27 20:08:17', NULL, 'profile_image.png', 1, 1),
(46, 'Diana Carolina', 'Cadavid Villegas ', 'diana.cadavid@plazamayor.com.co', '$2y$10$q9dqAnE0PM62GqwHcWuH7uzvF0Hh9mb.GtgpR2YXXMQ03Qxg4dmP2', 5, 17, '1128267871', 'Ejecutiva Comercial Sector Privado', 'Gerencia Comercial', NULL, NULL, '2019-08-27 20:08:18', '2019-08-27 20:08:18', NULL, 'profile_image.png', 1, 1),
(47, 'Daniela', 'Cardenas Marin ', 'daniela.cardenas@plazamayor.com.co', '$2y$10$Y/dObdtUgl4e5thXj0ZVceDvj/CPjqXNtH071MN15SqBqDJTeH/dS', 5, 17, '1035428891', 'Ejecutiva Junior Eventos Propios', 'Gerencia Comercial', NULL, NULL, '2019-08-27 20:08:18', '2019-08-27 20:08:18', NULL, 'profile_image.png', 1, 1),
(48, 'Mauricio', 'Cardenas Castañeda', 'mauricio.cardenas@plazamayor.com.co', '$2y$10$u7vZY27rx2iJ8Oe25edz7OxyGdVcI2zKwg7CHBhzcG.N76TxGhaiu', 5, 17, '79580571', 'Jefe de Seguridad', 'Gerencia de Servicio y Operaciones', NULL, NULL, '2019-08-27 20:08:18', '2019-08-27 20:08:18', NULL, 'profile_image.png', 1, 1),
(49, 'Debora Elizabeth', 'Cardona  Giraldo ', 'debora.cardona@plazamayor.com.co', '$2y$10$3eENxVr5Lrl2L1970f1rwuv5W/rBwje6k/6QIJDyWF51RQdBeLb0a', 5, 17, '43976249', 'Director de Servicio', 'Gerencia de Servicio y Operaciones', NULL, NULL, '2019-08-27 20:08:19', '2019-08-27 20:08:19', NULL, 'profile_image.png', 1, 1),
(50, 'Juliana', 'Cardona Quiros', 'juliana.cardona@plazamayor.com.co', '$2y$10$3k1Y2VdZsH2BfK3/Z/klmO6UnFFlxtfnv7ZI.A4eQ5Yg3dJZT.tDe', 5, 17, '21527034', 'Gerente General', 'Gerencia General', NULL, NULL, '2019-08-27 20:08:19', '2019-08-27 20:08:19', NULL, 'profile_image.png', 1, 1),
(51, 'Alejandra', 'Casabianca Fernandez ', 'alejandra.casabianca@plazamayor.com.co', '$2y$10$DRVkbdMEHHx9vk2HYJ1yKO7BYn0oj5t1xeIQu3cA/3mvnMADFOfSi', 5, 17, '32241951', 'Productor Master', 'Gerencia de Servicio y Operaciones', NULL, NULL, '2019-08-27 20:08:19', '2019-08-27 20:08:19', NULL, 'profile_image.png', 1, 1),
(52, 'Edison Emilio', 'Castro Tabares ', 'edison.castro@plazamayor.com.co', '$2y$10$stosBR6Q0AUNaUS2y5UmK.LKne/VDPLSul6WeTYrGQohEJLYH25vG', 5, 17, '15387140', 'Coordinador de Costos y Presupuesto', 'Gerencia Administrativa y Financiera', NULL, NULL, '2019-08-27 20:08:20', '2019-08-27 20:08:20', NULL, 'profile_image.png', 1, 1),
(53, 'Santiago León', 'Ciro Molina', 'santiago.ciro@plazamayor.com.co', '$2y$10$R/adM6gqsGjVQmLynE7eVOMvxWScOgKJJVMVHxllvlAksJD2EgVQS', 5, 17, '1152188727', 'Analista de Auditoria ', 'Gerencia General', NULL, NULL, '2019-08-27 20:08:20', '2019-08-27 20:08:20', NULL, 'profile_image.png', 1, 1),
(54, 'Melisa', 'Davila Alzate ', 'melisa.davila@plazamayor.com.co', '$2y$10$XNlv1Ic3SbmyRipBwtcjmuPdyYCAMTRdlmQHRsBKnP9XkLZVj0hoS', 5, 17, '43978866', 'Auxiliar Operativo ', 'Gerencia de Servicio y Operaciones', NULL, NULL, '2019-08-27 20:08:20', '2019-08-27 20:08:20', NULL, 'profile_image.png', 1, 1),
(55, 'Tatiana', 'De Vivero Acevedo', 'tatiana.devivero@plazamayor.com.co', '$2y$10$QLzNmgbRPIktbWwnvrh3SeOXYtQD/8IsL1tVslQEEykvHUx0B9pEy', 5, 17, '43220107', 'Coordinador de Talento Humano', 'Gerencia Administrativa y Financiera', NULL, NULL, '2019-08-27 20:08:20', '2019-08-27 20:08:20', NULL, 'profile_image.png', 1, 1),
(56, 'Jessica Maria', 'Díaz Celis ', 'jessica.diaz@plazamayor.com.co', '$2y$10$CSpfbO9xfypI0fpe495OS.CfCfNL7q7dKSo5Kx1edJpd5RiUUGy0u', 5, 17, '1037592592', 'Ejecutivo Comercial Sector Gobierno', 'Gerencia Comercial', NULL, NULL, '2019-08-27 20:08:21', '2019-08-27 20:08:21', NULL, 'profile_image.png', 1, 1),
(57, 'Juan Felipe', 'Dominguez Sanchez ', 'juan.dominguez@plazamayor.com.co', '$2y$10$CRj.ntoWbOQvbU0IGJk.W.cpLmuLUNuYQLjaNIR6Ng3wIG7Ha0Wnu', 5, 17, '98620812', 'Coordinador de Mantenimiento e infraestructura', 'Gerencia de Servicio y Operaciones', NULL, NULL, '2019-08-27 20:08:21', '2019-08-27 20:08:21', NULL, 'profile_image.png', 1, 1),
(58, 'Hernan Alberto', 'Echavarria Duque ', 'hernan.echavarria@plazamayor.com.co', '$2y$10$JpZ.mEhOvykZL2nvJBTcLub.AHAgml5ol9lS2RtUyZlbhypEiugoO', 5, 17, '4583785', 'Coordinador de TIC', 'Gerencia de Servicio y Operaciones', NULL, NULL, '2019-08-27 20:08:21', '2019-08-27 20:08:21', NULL, 'profile_image.png', 1, 1),
(59, 'Nancy Astrid', 'Echeverri Alvaran ', 'nancy.echeverri@plazamayor.com.co', '$2y$10$VX1h3Cuzm1z.rHKIVgvjou34chmumSPIMgfEto026.783aFPe4zZi', 5, 17, '43679487', 'Auxiliar Soporte Operativo', 'Gerencia Comercial', NULL, NULL, '2019-08-27 20:08:22', '2019-08-27 20:08:22', NULL, 'profile_image.png', 1, 1),
(60, 'Isabel Cristina', 'Estrada Vasquez ', 'isabel.estrada@plazamayor.com.co', '$2y$10$qLVqLq3zafYG44NC3Z.ErOWhMOSd5pt1e.SX4OjiNKujCsRUWO/5C', 5, 17, '43061263', 'Auxiliar Soporte Operativo', 'Gerencia Comercial', NULL, NULL, '2019-08-27 20:08:22', '2019-08-27 20:08:22', NULL, 'profile_image.png', 1, 1),
(61, 'Laura Juliana', 'Franco Molina ', 'laura.franco@plazamayor.com.co', '$2y$10$g0IrPbnV3c9hVl4RbGW/h.uSdneq3.7yoh.ZejkvBGcEOCal8KeiW', 5, 17, '1039446623', 'Directora Eventos Propios', 'Gerencia Comercial', NULL, NULL, '2019-08-27 20:08:22', '2019-08-27 20:08:22', NULL, 'profile_image.png', 1, 1),
(62, 'Dayanna', 'Fernandez Florez', 'dayanna.fernandez@plazamayor.com.co', '$2y$10$4YMsj/Nf0xoSGqPKXn06TeNKG0eY3vHKLdlYl1ZI77b4gq5VdCpB2', 5, 17, '1026159518', 'Auxiliar de Planeacion', 'Gerencia General', NULL, NULL, '2019-08-27 20:08:22', '2019-08-27 20:08:22', NULL, 'profile_image.png', 1, 1),
(63, 'Johanna', 'Galeano Hernandez', 'johanna.galeano@plazamayor.com.co', '$2y$10$0CvgDM89t7HBf8jn8VqpI.XR7XOBSf0DvXdal5.AgGrV5N9LR1s8e', 5, 17, '1017122242', 'Directora Comercial Sector Gobierno', 'Gerencia Comercial', NULL, NULL, '2019-08-27 20:08:23', '2019-08-27 20:08:23', NULL, 'profile_image.png', 1, 1),
(64, 'Mauricio Humberto', 'Gamboa Zapata', 'mauricio.gamboa@plazamayor.com.co', '$2y$10$k2ki5VweA1LC5Crnt/uywOtwanDSqnWty7CxpUkfWqobwy/X5NEIK', 5, 17, '1017128814', 'Analista de Costos', 'Gerencia Administrativa y Financiera', NULL, NULL, '2019-08-27 20:08:23', '2019-08-27 20:08:23', NULL, 'profile_image.png', 1, 1),
(65, 'Daniela', 'Garcia Galeano', 'daniela.garcia@plazamayor.com.co', '$2y$10$cyqGp.sjdn8E4ibmcU2EeOd6Gzsx1IjsGSrbckF9NwQ8KkGmTYyla', 5, 17, '1037605535', 'Auxiliar Jurídico ', 'Secretaria General', NULL, NULL, '2019-08-27 20:08:23', '2019-08-27 20:08:23', NULL, 'profile_image.png', 1, 1),
(66, 'Camilo', 'Garcia Villa ', 'camilo.garcia@plazamayor.com.co', '$2y$10$fSf8/cXSzr8kgbQoqSDOo.zbX5bDWlsZLdgYjj2Y0KOr2bNlP0gvy', 5, 17, '1039457066', 'Ejecutivo Junior Eventos Propios', 'Gerencia Comercial', NULL, NULL, '2019-08-27 20:08:24', '2019-08-27 20:08:24', NULL, 'profile_image.png', 1, 1),
(67, 'Maria Isabel', 'Gaviria Rengifo', 'maria.gaviria@plazamayor.com.co', '$2y$10$fkh.bu61tk5QllZPXF0D4u4PhJ/lBd4nNJ5nidGKMZ.yiZjRW5liK', 5, 17, '42826908', 'Directora de Planeación y Desarrollo Organizacional', 'Gerencia General', NULL, NULL, '2019-08-27 20:08:24', '2019-08-27 20:08:24', NULL, 'profile_image.png', 1, 1),
(68, 'Carlos Mario', 'Gil Rodriguez ', 'mario.gil@plazamayor.com.co', '$2y$10$PgndXP5aOYVcLK3xB5FaDe0Rbo.p.dgfm4vD0TJ98srennznsX0C2', 5, 17, '8408751', 'Tecnico Electromecanico', 'Gerencia de Servicio y Operaciones', NULL, NULL, '2019-08-27 20:08:24', '2019-08-27 20:08:24', NULL, 'profile_image.png', 1, 1),
(69, 'Kelly Yohana', 'Gomez Morales ', 'kelly.gomez@plazamayor.com.co', '$2y$10$V2dRWNSwmLYhF322RYRlauNHk969BeM9NZJV9UfRApaqqGgtNZEgC', 5, 17, '1128437911', 'Ejecutiva Comercial Sector Gobierno', 'Gerencia Comercial', NULL, NULL, '2019-08-27 20:08:24', '2019-08-27 20:08:24', NULL, 'profile_image.png', 1, 1),
(70, 'Camilo Andres', 'Gomez Mosquera ', 'camilo.gonoz@plazamayor.abm.ab', '$2y$10$b/dJcL793Re7KRiXRVPFgOObPpl4fT8O7go7EqpvfIughN5Ux7w5.', 5, 17, '1037606179', 'Abogado ', 'Secretaria General', NULL, NULL, '2019-08-27 20:08:25', '2019-08-27 20:08:25', NULL, 'profile_image.png', 1, 1),
(71, 'Yovanny Arturo', 'Gonzalez Cardona ', 'arturo.gonzalez@plazamayor.com.co', '$2y$10$gZBuEHrVzr5f.ZW0doiVoOl1wxC/gALEkWlxeA.EMU7V3Rva7GwD2', 5, 17, '98589230', 'Productor Senior', 'Gerencia de Servicio y Operaciones', NULL, NULL, '2019-08-27 20:08:25', '2019-08-27 20:08:25', NULL, 'profile_image.png', 1, 1),
(72, 'Luis Eduardo', 'Guerra Restrepo ', 'luis.guerra@plazamayor.com.co', '$2y$10$xo3jopZvdIht2oWo5LTKH.UQVBWZsBM7XJfyW26LPCldRPuXPthNq', 5, 17, '71641873', 'Coordinador de Compras', 'Gerencia Administrativa y Financiera', NULL, NULL, '2019-08-27 20:08:25', '2019-08-27 20:08:25', NULL, 'profile_image.png', 1, 1),
(73, 'Maria Fernanda', 'Guerrero Echavarria ', 'maria.guerrero@plazamayor.com.co', '$2y$10$bmp0YrnNcR28XhjwpXbHSeYpv8k3.qGwoN9V84D1BHwmi35zxO5Iu', 5, 17, '44005167', 'Analista de Procesos y Riesgos', 'Gerencia General', NULL, NULL, '2019-08-27 20:08:26', '2019-08-27 20:08:26', NULL, 'profile_image.png', 1, 1),
(74, 'Lizeht Beronica', 'Guisao Aldana ', 'beronica.guisao@plazamayor.com.co', '$2y$10$Y.vqQCw/z5TQaf5q0FFKC.fsl16F0FNmQhVOgnL2lZw2w5JSRjJ4a', 5, 17, '1036633439', 'Auxiliar Contable', 'Gerencia Administrativa y Financiera', NULL, NULL, '2019-08-27 20:08:26', '2019-08-27 20:08:26', NULL, 'profile_image.png', 1, 1),
(75, 'Alid Libeth', 'Gutierrez Duran ', 'alid.gutierrez@plazamayor.com.co', '$2y$10$ZICen5L..3tFjehY/KeN7u1I7J6vftLUxH5KZU9wrK13HjHdyHin2', 5, 17, '37370963', 'Analista de Tesoreria', 'Gerencia Administrativa y Financiera', NULL, NULL, '2019-08-27 20:08:26', '2019-08-27 20:08:26', NULL, 'profile_image.png', 1, 1),
(76, 'Luis Fernando', 'Gúzman Soto', 'luis.guzman@plazamayor.com.co', '$2y$10$qhOL9OVNOXmFPjUEJ3VxHeSid.vpL9EIw8SD4bC8Za18jpsRT0fxm', 5, 17, '98530687', 'Mensajero', 'Gerencia Administrativa y Financiera', NULL, NULL, '2019-08-27 20:08:27', '2019-08-27 20:08:27', NULL, 'profile_image.png', 1, 1),
(77, 'Tatiana Sofía', 'Henao Avendaño ', 'tatiana.henao@plazamayor.com.co', '$2y$10$vFJihWzphFQSBGUKqP0nO.Y8HDCFiIjo04jbg9Cuf8HjQk2JZGhGK', 5, 17, '1128431480', 'Analista de Compras', 'Gerencia Administrativa y Financiera', NULL, NULL, '2019-08-27 20:08:27', '2019-08-27 20:08:27', NULL, 'profile_image.png', 1, 1),
(78, 'Edwar Andres', 'Herrera Vargas ', 'edwar.herrera@plazamayor.com.co', '$2y$10$.umT3QNTjIZTPLupV2qG.OmDUQa5QfbGhrau16vvW8T7xxXzRK2UC', 5, 17, '1040036447', 'Auxiliar Operativo Zona Franca', 'Gerencia de Servicio y Operaciones', NULL, NULL, '2019-08-27 20:08:27', '2019-08-27 20:08:27', NULL, 'profile_image.png', 1, 1),
(79, 'Santiago', 'Hidalgo López', 'santiago.hidalgo@plazamayor.com.co', '$2y$10$DI0BeiXbuoB2EqsMyq1Dcug8GYnEVuHByMVBkpc3PMnF8bDwhBe2y', 5, 17, '1152212437', 'Analista de Auditoria ', 'Gerencia General', NULL, NULL, '2019-08-27 20:08:27', '2019-08-27 20:08:27', NULL, 'profile_image.png', 1, 1);

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
-- Indices de la tabla `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `answers_application_id_question_id_unique` (`application_id`,`question_id`),
  ADD KEY `answers_measure_id_foreign` (`measure_id`),
  ADD KEY `answers_question_id_foreign` (`question_id`);

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
-- Indices de la tabla `compromises`
--
ALTER TABLE `compromises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compromises_user_id_foreign` (`user_id`),
  ADD KEY `compromises_validator_id_foreign` (`validator_id`);

--
-- Indices de la tabla `compromise_alerts`
--
ALTER TABLE `compromise_alerts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compromise_alerts_compromise_id_foreign` (`compromise_id`);

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
-- Indices de la tabla `recognitions`
--
ALTER TABLE `recognitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recognitions_resource_id_foreign` (`resource_id`),
  ADD KEY `recognitions_user_id_foreign` (`user_id`),
  ADD KEY `recognitions_grantter_id_foreign` (`grantter_id`);

--
-- Indices de la tabla `recognition_resources`
--
ALTER TABLE `recognition_resources`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `scales`
--
ALTER TABLE `scales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainings_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT de la tabla `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `application_evaluation`
--
ALTER TABLE `application_evaluation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT de la tabla `compromises`
--
ALTER TABLE `compromises`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `compromise_alerts`
--
ALTER TABLE `compromise_alerts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- AUTO_INCREMENT de la tabla `recognitions`
--
ALTER TABLE `recognitions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `recognition_resources`
--
ALTER TABLE `recognition_resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `scales`
--
ALTER TABLE `scales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_application_id_foreign` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`),
  ADD CONSTRAINT `answers_measure_id_foreign` FOREIGN KEY (`measure_id`) REFERENCES `measures` (`id`),
  ADD CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Filtros para la tabla `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_evaluation_id_foreign` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluations` (`id`),
  ADD CONSTRAINT `applications_evaluator_id_foreign` FOREIGN KEY (`evaluator_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `compromises`
--
ALTER TABLE `compromises`
  ADD CONSTRAINT `compromises_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `compromises_validator_id_foreign` FOREIGN KEY (`validator_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `compromise_alerts`
--
ALTER TABLE `compromise_alerts`
  ADD CONSTRAINT `compromise_alerts_compromise_id_foreign` FOREIGN KEY (`compromise_id`) REFERENCES `compromises` (`id`);

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
-- Filtros para la tabla `recognitions`
--
ALTER TABLE `recognitions`
  ADD CONSTRAINT `recognitions_grantter_id_foreign` FOREIGN KEY (`grantter_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `recognitions_resource_id_foreign` FOREIGN KEY (`resource_id`) REFERENCES `recognition_resources` (`id`),
  ADD CONSTRAINT `recognitions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `trainings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
