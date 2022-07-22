-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-07-2022 a las 04:35:58
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administratives`
--

CREATE TABLE `administratives` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `surnames` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `curp` varchar(18) COLLATE utf8_spanish2_ci NOT NULL,
  `rfc` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `level_studies` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `occupation` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `observations` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `administratives`
--

INSERT INTO `administratives` (`user`, `name`, `surnames`, `date_of_birth`, `gender`, `curp`, `rfc`, `phone`, `address`, `level_studies`, `occupation`, `observations`, `created_at`, `updated_at`) VALUES
('admin', 'Diego', 'Carmona Bernal', '1997-04-05', 'hombre', 'CABD970405HCSRRG03', 'CABD9704052K5', '9614044227', 'Av. Aquiles Serdán 915, Bienestar Social, 29077, Tuxtla Gutiérrez, Chiapas.', 'Ingenieria', 'Programador', '', '2021-12-05 18:33:37', '2022-05-29 22:22:24'),
('admin-eb405', 'Magnolia', 'Montejo Gómez', '1985-03-16', 'mujer', 'MMGO160385MCSRRG01', 'MMGO160385MCS', '9613459810', 'Av. Tulipanes #132, Bienestar Social, Tuxtla Gutiérrez, Chiapas', 'Licenciatura', 'Administrativo', '', '2021-12-04 02:13:36', '2022-02-05 23:24:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id_group` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `teacher` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `subjects` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `students` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id_group`, `name`, `teacher`, `subjects`, `students`) VALUES
('IDS-A', 'Grupo A', 'tchr-e9408', 'ALGE', 'stdt-9b8b6,stdt-e19f8,stdt-f7107'),
('IDS-B', 'Grupo B', 'tchr-617af', 'DESARROLLO', 'stdt-9b8b6,stdt-f7107'),
('IDS-C', 'Grupo C', 'tchr-e9423', 'CALINT', 'stdt-9b8b6'),
('IDS-D', 'Grupo D', 'tchr-e9423', 'CALINT', 'stdt-9b8b6,stdt-f7107');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `surnames` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `curp` varchar(18) COLLATE utf8_spanish2_ci NOT NULL,
  `rfc` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `career` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `documentation` int(1) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`user`, `name`, `surnames`, `date_of_birth`, `gender`, `curp`, `rfc`, `phone`, `address`, `career`, `documentation`, `admission_date`, `created_at`, `updated_at`) VALUES
('stdt-9b8b6', 'Leonardo Javier', 'Morningstar', '2022-05-11', '', 'KSKKSSSSSSSSSSSSSS', 'KKKKKKKKKKKKK', '1111111111', 'kkkkkkkkkk', 'kkkkkkkkkk', 1, '2022-05-10', '2022-05-10 22:53:51', NULL),
('stdt-e19f8', 'Fernando Daniel', 'Pérez Pérez', '2000-01-01', 'hombre', 'PEPFE030913HCSRRG0', 'PEPFE030913HC', '9687650987', 'Av. Jalisco / Los Mangos y Los chiles, 29076, Chiapas.', 'Sistemas', 1, '2022-04-04', '2022-04-04 22:26:03', '2022-05-29 21:28:30'),
('stdt-f7107', 'Efraín', 'Gómez Rodríguez', '1986-10-10', 'hombre', 'GORE861010HCSRRG01', 'GORE861010HCS', '9686892915', 'Av. Los Tulipanes #27, 29088, Chiapas.', 'Sistemas', 1, '2022-04-04', '2022-04-04 22:15:43', '2022-04-19 05:42:36'),
('student-x', '', '', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subjects`
--

CREATE TABLE `subjects` (
  `subject` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `description` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `video` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `subjects`
--

INSERT INTO `subjects` (`subject`, `name`, `description`, `video`) VALUES
('ALGE', 'Algebra Lineal', 'El álgebra lineal es un área fundamental de la matemática, tanto a nivel teórico como práctico. Son innumerables sus aplicaciones   en   Matemática   Aplicada,   Estadística,   Ingeniería,   Administración,   Negocios,   Economía   y   en   las   diferentes áreas de las ciencias naturales, del comportamiento humano, de la computación y de la salud. Los  temas  centrales  de  este  curso  son  los  espacios  Vectoriales  y  las  transformaciones  lineales,  sin  embargo,  el  curso se inicia  con el estudio de las matrices y los sistemas de ecuaciones. La solución de sistemas de ecuaciones es la herramienta fundamental para resolver problemas que se presentan en el resto de los capítulos; por último se trata el tema de diagonalización y valores propios.', 'https://www.youtube.com/embed/BMBZJwTS7Ks'),
('CALDIF01', 'Calculo Diferencial', 'El calculo diferencial se compone de diferentes temas.', 'youtube.com'),
('CALINT', 'Calculo Integral', 'El cálculo integral, encuadrado en el cálculo infinitesimal, es una rama de las matemáticas en el proceso de integración o antiderivación. Es muy común en la ingeniería y en la ciencia; se utiliza principalmente para el cálculo de áreas y volúmenes de regiones y sólidos de revolución.', 'https://www.youtube.com/embed/E3ECQskKyrU'),
('DESARROLLO', 'Requerimientos de Software', 'El alumno determinará la funcionalidad del proyecto de software a través de métodos de recolección de información, modelado de requerimientos y estudio de factibilidad para generar propuestas de desarrollo de software.\n\nSe desarrollan para un cliente específico, del mismo modo que se hace un traje a la medida de un individuo. También se denominan Sistemas de Propósito Específico.\n\nIncorpora el modelo de negocios de la empresa que encarga por lo que presenta muchas \nimplicaciones al momento de revender el sistema.', 'https://www.youtube.com/embed/0R6LSA2ArFo'),
('EDU_FISC01QR', 'Educación física', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque venenatis lectus at rhoncus faucibus. Etiam sit amet nulla eu tortor luctus semper. Donec egestas leo nisl, at ornare ex tempus id. Nullam at euismod arcu, vitae bibendum risus. Vivamus cursus elit at diam mattis pretium. Maecenas non condimentum justo, et tempor tortor. Nam at mi commodo, euismod enim non, malesuada felis. Proin quis elementum justo. In posuere, nunc vel ultrices sagittis, velit purus viverra augue, posuere scelerisque dolor magna vel nisl. Aliquam in commodo ligula, at mattis ligula. Curabitur et arcu metus. Mauris neque arcu, volutpat quis volutpat a, bibendum ac magna. Duis pellentesque viverra quam eget euismod.\r\n\r\nPhasellus tincidunt posuere faucibus. Sed imperdiet metus ullamcorper enim consequat tempor. Quisque nec lectus facilisis, gravida nisl sit amet, egestas nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae turpis massa. Aenean gravida commodo ante a maximus. Sed eget mi ac ante hendrerit molestie. Vivamus feugiat purus sit amet lobortis tempor. Quisque neque libero, ultrices non ex id, venenatis convallis lorem. Suspendisse malesuada erat vel ornare interdum. In hac habitasse platea dictumst.', 'youtube.com/educacionfisica'),
('INGBAS01', 'Ingles Básico', 'El idioma inglés (English language o English, pronunciado /ˈɪŋɡlɪʃ/) es una lengua germánica occidental que surgió en los reinos anglosajones de Inglaterra y se extendió hasta el Norte en lo que se convertiría en el sudeste de Escocia, bajo la influencia del Reino de Northumbria.', 'youtube.com/ingles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teachers`
--

CREATE TABLE `teachers` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `surnames` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `curp` varchar(18) COLLATE utf8_spanish2_ci NOT NULL,
  `rfc` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `level_studies` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `specialty` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `career` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `teachers`
--

INSERT INTO `teachers` (`user`, `name`, `surnames`, `date_of_birth`, `gender`, `curp`, `rfc`, `phone`, `address`, `level_studies`, `specialty`, `career`, `created_at`, `updated_at`) VALUES
('tchr-50747', 'Moisés', 'Gómez Meléndez', '1996-02-02', 'hombre', 'KSK92992292KSA0000', 'CCCCCCONOCIDO', '9716278838', 'CONOCIDO', 'Ingenieria', 'Cálculo Diferencial', 'IDS,INGPLRA', '2022-02-06 20:37:47', '2022-02-06 20:34:37'),
('tchr-617af', 'Rigoberto', 'Nanguluru Conde', '2022-02-18', 'hombre', 'CLLLS9202JS8KS90SS', 'CCCCCCONOCIDO', '9881877732', 'CONOCIDO', 'Doctorado', 'Maestría en Computación', 'IDS,MATBASICAS', '2022-02-06 20:37:53', '2022-04-03 05:57:35'),
('tchr-a80e12', 'Pamela', 'Sánchez', '2022-02-08', 'mujer', 'ATME980215KMN32221', 'ATME980215KMN', '9991020394', 'Av. Siempre Viva', 'Licenciatura', 'Negocios', 'IDS,INGBIO,MATBASICAS,MTABIOTEC', '2022-02-02 00:47:13', '2022-02-07 12:45:38'),
('tchr-e9408', 'Juanita de la Cruz', 'Nepomuceno', '2022-02-08', 'mujer', 'KSKKS020020219100S', 'JJJJJCONOCIDO', '9672282646', 'CONOCIDO', 'Maestria', 'Enseñanza del Español', 'INGBIO,MATBASICAS', '2022-02-06 20:37:59', '2022-02-06 20:38:44'),
('tchr-e9423', 'Carlos Alberto', 'Marín Roblero', '1987-04-15', 'hombre', 'KSKKS020020219100S', 'KKKKKCONOCIDO', '9613334538', 'CONOCIDO', 'Ingenieria', 'Automatas', 'IDS,IEM,INGBIO,INGPLRA,MATBASICAS,MTABIOTEC', '2022-02-06 20:38:03', '2022-04-03 06:16:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pass` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `permissions` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `image_updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user`, `email`, `pass`, `permissions`, `image`, `image_updated_at`, `created_at`, `updated_at`) VALUES
('admin', 'cbdiegox@gmail.com', 'root', 'admin', 'admin221.png', '2022-02-22 15:18:06', '2021-12-05 18:27:39', '2022-04-19 06:00:18'),
('admin-eb405', 'magnoliamontejogomez@gmail.com', 'admin-eb405', 'admin', 'user.png', NULL, '2021-12-04 02:13:36', '2022-03-13 02:59:59'),
('stdt-9b8b6', NULL, 'stdt-9b8b6', 'student', 'user.png', NULL, '2022-05-10 22:53:51', NULL),
('stdt-e19f8', '', 'root', 'student', 'user.png', NULL, '2022-04-04 22:26:03', '2022-04-19 04:44:35'),
('stdt-f7107', NULL, 'root', 'student', 'user.png', NULL, '2022-04-04 22:15:43', '2022-04-19 04:44:40'),
('student-x', NULL, 'root', 'student', 'user.png', NULL, '2022-05-28 01:21:33', NULL),
('tchr-50747', NULL, 'tchr-50747', 'teacher', 'user.png', NULL, '2022-05-14 19:04:53', NULL),
('tchr-617af', NULL, 'tchr-617af', 'teacher', NULL, NULL, '2022-05-14 19:10:28', NULL),
('tchr-a80e12', NULL, 'tchr-a80e12', 'teacher', NULL, NULL, '2022-05-14 19:10:28', NULL),
('tchr-e9408', NULL, 'tchr-e9408', 'teacher', NULL, NULL, '2022-05-14 19:09:04', NULL),
('tchr-e9423', NULL, 'tchr-e9423', 'teacher', NULL, NULL, '2022-05-14 19:09:04', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administratives`
--
ALTER TABLE `administratives`
  ADD PRIMARY KEY (`user`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id_group`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`user`);

--
-- Indices de la tabla `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject`);

--
-- Indices de la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
