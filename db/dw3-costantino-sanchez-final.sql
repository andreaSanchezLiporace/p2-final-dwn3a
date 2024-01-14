-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2023 a las 22:37:57
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dw3-costantino-sanchez`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discos`
--

CREATE TABLE `discos` (
  `discos_id` int(10) UNSIGNED NOT NULL,
  `origen_fk` int(10) UNSIGNED NOT NULL,
  `genero_fk` tinyint(3) UNSIGNED NOT NULL,
  `formato_fk` tinyint(3) UNSIGNED NOT NULL,
  `album` varchar(255) NOT NULL,
  `artista` varchar(255) NOT NULL,
  `lanzamiento` year(4) NOT NULL,
  `sinopsis` text NOT NULL,
  `precio` int(10) UNSIGNED NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `imagen_descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `discos`
--

INSERT INTO `discos` (`discos_id`, `origen_fk`, `genero_fk`, `formato_fk`, `album`, `artista`, `lanzamiento`, `sinopsis`, `precio`, `imagen`, `imagen_descripcion`) VALUES
(13, 2, 1, 1, 'The Wall Remastered', 'Pink Floyd', 2016, 'Con \'The Wall\' los Pink Floyd hicieron una radiografía completa de la situación que se vivía en la Gran Bretaña durante el periodo de Tatcher. \r\nSus letras son dardos sutilmente cargados de veneno dirigidos a las altas estancias de poder que rigen un país; el estado, el ejercito, y el poder judicial.', 7190, '20211220020044_pink_floyd_the_wall.jpg', 'Contratapa de \'The Wall Remastered\' de \'Pink Floyd\''),
(14, 1, 1, 1, 'Clics Modernos', 'Charly García', 2020, 'Segundo álbum como solista de Charly García, fue concebido, grabado y lanzado en los meses anteriores a que la última dictadura argentina se retirara del poder. \r\nEl ritmo bailable de las canciones, el estilo new wave y varias de sus letras se relacionan con ese momento histórico para la Argentina, que dejaba atrás décadas de pesadilla y terrorismo de Estado e \r\nintentaba consolidarse en el sistema democrático, un proceso que sufrió interrupciones violentas al menos desde 1930. Considerado por la edición argentina de la revista Rolling Stone como el \r\nsegundo mejor disco de la historia del rock argentino​ y por la revista estadounidense Alborde como el tercero entre los 250 mejores de la historia del rock iberoamericano.', 3500, '20211220020131_charly_garcia_clics_modernos.jpg', 'Contratapa de \'Clics Modernos\' de \'Charly García\''),
(37, 1, 1, 1, 'Doble Vida', 'Soda Stereo', 1988, 'Doble Vida marcó el fin de la primera etapa de Soda Stereo, que consistía en una imagen exótica, y abrió camino a la \r\nmadurez de la banda.​ Este álbum está cargado de una fuerte influencia de la música afroamericana, con una marcada presencia en particular del funk, y también \r\ntoques de soul,​ disco, R&B, y hasta un rap en el tema «En el borde». Marcó la conquista de Soda Stereo del mercado de Estados Unidos, convirtiéndose en la \r\nprimera banda de Latinoamérica en conseguirlo.', 4900, '20211220020145_soda_stereo_doble_vida.jpg', 'Tapa frontal de \'Doble Vida\' de \'Soda Stereo\''),
(40, 2, 1, 1, 'Power Up', 'Ac Dc', 2020, 'Power Up es el decimoséptimo álbum de la banda, que se lanzó en Australia y el decimosexto que se lanzó internacionalmente. Marca el regreso del vocalista Brian Johnson, el baterista Phil Rudd y el bajista Cliff Williams, quienes dejaron AC/DC la banda en en 2014. Este también será el primer álbum de la banda desde la muerte de su guitarrista rítmico original Malcolm Young en 2017', 6490, '20211220020153_ac_dc_power_up.jpg', 'Contratapa de Power Up de Ac Dc'),
(41, 1, 1, 1, 'Vida', 'Sui Generis', 2015, 'Vida es el primer álbum de estudio de Sui Generis, dúo de rock argentino integrado por Charly García y Nito Mestre. Según Nito y Charly, Vida es un disco puro e inocente, que -en su opinión- evidencia algunos defectos musicales y técnicos. Canciones cortas pero efectivas como \'Amigo, vuelve a casa pronto\' o \'Canción para mi muerte\', muestran la solidez que ya poseía el grupo, por entonces muy influenciado por la estética del folk rock', 4900, '20211220020206_sui_generis_vida.jpg', 'Contratapa de \'Vida\' de \'Sui Generis\''),
(42, 1, 1, 1, 'Seru 92', 'Serú Girán', 2017, 'Serú \'92 es el quinto y último álbum de estudio de la banda argentina de rock Serú Girán lanzado en el año 1992. Fue un éxito comercial, con ventas que superaron las 200 000 copias. La banda presentó el disco en 1992 con dos recitales en el estadio Antonio Vespucio Liberti ante aproximadamente 160 000 personas, marcando un récord para una banda de rock nacional hasta ese momento.', 4900, '20211220020213_seru_giran_92.jpg', 'Tapa frontal de \'Seru 92\' de \'Serú Girán\''),
(43, 2, 2, 1, 'A tribute to Jack Johnson', 'Miles Davis', 2020, 'El álbum fue concebido por Davis para el documental homónimo de Bill Cayton, sobre la vida del boxeador Jack Johnson. Para crear las dos pistas de más de 25 minutos, Davis se inspiró en el subtexto político y racial de la saga de Johnson, así como en los sonidos del hard rock y el funk de su propia época', 4990, '20211220020221_miles_davis_tribute_jack_johnson.jpg', 'Tapa frontal de \'A tribute to Jack Johnson\' de \'Miles Davis\''),
(44, 2, 2, 1, 'Frank', 'Amy Winehouse', 2011, 'Frank fue el álbum debut de la cantante británica Amy Winehouse lanzado por Island Records en octubre de 2003 en el Reino Unido. Recibió dos nominaciones para los Brit Awards y fue pre-seleccionada para un Mercury Music Prize. El título del disco es una referencia al desaparecido cantante Frank Sinatra.', 6490, '20211220020230_amy_winehouse_frank.jpg', 'Tapa frontal de \'Frank\' de \'Amy Winehouse\''),
(45, 2, 3, 1, 'The Clash', 'The Clash', 2018, 'The Clash es el nombre del álbum debut lanzado por la banda punk británica The Clash. Fue publicado en dos diferentes versiones, la original editada en 1977 en Gran Bretaña y Europa, y una distinta lanzada en el mercado estadounidense en 1979. El álbum es musicalmente muy variado para una banda punk ya que contiene canciones con influencias reggae, dub y pop.', 6990, '20211220020238_the_clash.jpg', 'Tapa frontal de \'The Clash\' de \'The Clash\''),
(46, 1, 3, 1, 'Ramones', 'Ramones', 2020, 'Ramones es el primer álbum del grupo estadounidense de punk rock Ramones. En el disco presenta las primeras corrientes de este género musical. Las canciones están inspiradas en experiencias personales, surf, y películas de miedo de Clase B, siendo producto de la rebeldía juvenil y del marginamiento que la banda sufría. Los miembros de la banda crearon una música rápida, distorsionada, violenta, aunque a su vez dulce por las influencias del pop. Este álbum es comúnmente considerado uno de los que más influyó en el punk y el rock en general. En el 2003, ocupó el puesto trigésimo tercero (33º) en la lista de Los 500 Mejores Álbumes de Todos los Tiempos de la revista Rolling Stone y se posicionó como el segundo mejor álbum debut de todos los tiempos.', 3990, '20211220020246_ramones.jpg', 'Tapa frontal de \'Ramones\' de \'Ramones\'');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formato`
--

CREATE TABLE `formato` (
  `formato_id` tinyint(3) UNSIGNED NOT NULL,
  `nombre_formato` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `formato`
--

INSERT INTO `formato` (`formato_id`, `nombre_formato`) VALUES
(1, 'Físico'),
(2, 'Vinilo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `genero_id` tinyint(3) UNSIGNED NOT NULL,
  `nombre_genero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`genero_id`, `nombre_genero`) VALUES
(2, 'Jazz'),
(3, 'Punk'),
(1, 'Rock');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_carrito`
--

CREATE TABLE `historial_carrito` (
  `usuarios_fk` int(10) UNSIGNED NOT NULL,
  `discos_fk` int(10) UNSIGNED NOT NULL,
  `cantidad` int(10) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historial_carrito`
--

INSERT INTO `historial_carrito` (`usuarios_fk`, `discos_fk`, `cantidad`, `fecha`) VALUES
(7, 13, 1, '2022-07-03 11:44:48'),
(7, 14, 1, '2022-07-03 11:44:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `origen`
--

CREATE TABLE `origen` (
  `origen_id` int(10) UNSIGNED NOT NULL,
  `pais` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `origen`
--

INSERT INTO `origen` (`origen_id`, `pais`) VALUES
(3, 'Afganistán'),
(5, 'Albania'),
(6, 'Alemania'),
(7, 'Andorra'),
(8, 'Angola'),
(9, 'Anguilla'),
(10, 'Antártida'),
(11, 'Antigua y Barbuda'),
(12, 'Antillas Holandesas'),
(13, 'Arabia Saudí'),
(14, 'Argelia'),
(1, 'Argentina'),
(15, 'Armenia'),
(16, 'Aruba'),
(17, 'Australia'),
(18, 'Austria'),
(19, 'Azerbaiyán'),
(20, 'Bahamas'),
(21, 'Bahréin'),
(22, 'Bangladesh'),
(23, 'Barbados'),
(25, 'Bélgica'),
(26, 'Belice'),
(27, 'Benin'),
(28, 'Bermudas'),
(29, 'Bhután'),
(24, 'Bielorrusia'),
(30, 'Bolivia'),
(31, 'Bosnia y Herzegovina'),
(32, 'Botsuana'),
(34, 'Brasil'),
(35, 'Brunéi'),
(36, 'Bulgaria'),
(37, 'Burkina Faso'),
(38, 'Burundi'),
(39, 'Cabo Verde'),
(41, 'Camboya'),
(42, 'Camerún'),
(43, 'Canadá'),
(45, 'Chad'),
(47, 'Chile'),
(48, 'China'),
(49, 'Chipre'),
(50, 'Colombia'),
(51, 'Congo'),
(52, 'Corea del Norte'),
(53, 'Corea del Sur'),
(54, 'Costa de Marfil'),
(55, 'Costa Rica'),
(56, 'Croacia'),
(57, 'Cuba'),
(58, 'Dinamarca'),
(60, 'Ecuador'),
(61, 'Egipto'),
(62, 'El salvador'),
(63, 'Emiratos Árabes Unidos'),
(64, 'Eritrea'),
(65, 'Eslovaquia'),
(66, 'España'),
(2, 'Estados Unidos'),
(67, 'Estonia'),
(68, 'Etiopía'),
(70, 'Filipinas'),
(71, 'Finlandia'),
(72, 'Francia'),
(73, 'Grecia'),
(74, 'Groenlandia'),
(75, 'Hungría'),
(76, 'India'),
(77, 'Indonesia'),
(78, 'Irlanda'),
(33, 'Isla Bouvet'),
(79, 'Islandia'),
(40, 'Islas Caimán'),
(69, 'Islas Feore'),
(4, 'Islas Gland'),
(80, 'Israel'),
(81, 'Italia'),
(82, 'Jamaica'),
(83, 'Japón'),
(84, 'Jordania'),
(85, 'Letonia'),
(86, 'Lituania'),
(87, 'Luxemburgo'),
(88, 'Marruecos'),
(89, 'México'),
(90, 'Nicaragua'),
(91, 'Nigeria'),
(92, 'Noruega'),
(93, 'Nueva Zelanda'),
(94, 'Paises Bajos'),
(95, 'Panamá'),
(96, 'Paraguay'),
(97, 'Perú'),
(98, 'Polonia'),
(99, 'Portugal'),
(100, 'Puerto Rico'),
(101, 'Reino Unido'),
(44, 'República Centroafricana'),
(46, 'República Checa'),
(59, 'República Dominicana'),
(102, 'Rusia'),
(103, 'Suecia'),
(104, 'Suiza'),
(105, 'Taiwán'),
(106, 'Turquía'),
(107, 'Ucrania'),
(108, 'Uruguay'),
(109, 'Venezuela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reestablecer_password`
--

CREATE TABLE `reestablecer_password` (
  `usuarios_id` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `fecha_expiracion_password` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `roles_id` tinyint(3) UNSIGNED NOT NULL,
  `nombre_rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`roles_id`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuarios_id` int(10) UNSIGNED NOT NULL,
  `roles_fk` tinyint(3) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuarios_id`, `roles_fk`, `email`, `password`, `nombre`) VALUES
(7, 1, 'admin@admin.com', '$2y$10$ImbZRb7fPWevlyN7SV4zZu5g7pEK6pEflMxYr5l0qgoKq.fzxxlp2', 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_tienen_discos`
--

CREATE TABLE `usuarios_tienen_discos` (
  `usuarios_fk` int(10) UNSIGNED NOT NULL,
  `discos_fk` int(10) UNSIGNED NOT NULL,
  `cantidad` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios_tienen_discos`
--

INSERT INTO `usuarios_tienen_discos` (`usuarios_fk`, `discos_fk`, `cantidad`) VALUES
(7, 13, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `discos`
--
ALTER TABLE `discos`
  ADD PRIMARY KEY (`discos_id`),
  ADD KEY `fk_discos_origen1_idx` (`origen_fk`),
  ADD KEY `fk_discos_generos1_idx` (`genero_fk`),
  ADD KEY `fk_discos_formato1_idx` (`formato_fk`);

--
-- Indices de la tabla `formato`
--
ALTER TABLE `formato`
  ADD PRIMARY KEY (`formato_id`),
  ADD UNIQUE KEY `nombre_formato_UNIQUE` (`nombre_formato`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`genero_id`),
  ADD UNIQUE KEY `nombre_genero_UNIQUE` (`nombre_genero`);

--
-- Indices de la tabla `historial_carrito`
--
ALTER TABLE `historial_carrito`
  ADD PRIMARY KEY (`usuarios_fk`,`discos_fk`,`fecha`),
  ADD KEY `fk_historial_carrito_discos_id_idx` (`discos_fk`);

--
-- Indices de la tabla `origen`
--
ALTER TABLE `origen`
  ADD PRIMARY KEY (`origen_id`),
  ADD UNIQUE KEY `pais_UNIQUE` (`pais`);

--
-- Indices de la tabla `reestablecer_password`
--
ALTER TABLE `reestablecer_password`
  ADD PRIMARY KEY (`usuarios_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roles_id`),
  ADD UNIQUE KEY `nombre_rol_UNIQUE` (`nombre_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuarios_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_usuarios_roles1_idx` (`roles_fk`);

--
-- Indices de la tabla `usuarios_tienen_discos`
--
ALTER TABLE `usuarios_tienen_discos`
  ADD PRIMARY KEY (`usuarios_fk`,`discos_fk`),
  ADD KEY `fk_usuarios_tienen_discos_discos_idx` (`discos_fk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `discos`
--
ALTER TABLE `discos`
  MODIFY `discos_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `formato`
--
ALTER TABLE `formato`
  MODIFY `formato_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `genero_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `origen`
--
ALTER TABLE `origen`
  MODIFY `origen_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `roles_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuarios_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial_carrito`
--
ALTER TABLE `historial_carrito`
  ADD CONSTRAINT `fk_historial_carrito_discos_id` FOREIGN KEY (`discos_fk`) REFERENCES `discos` (`discos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_historial_carrito_usuarios_fk` FOREIGN KEY (`usuarios_fk`) REFERENCES `usuarios` (`usuarios_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios_tienen_discos`
--
ALTER TABLE `usuarios_tienen_discos`
  ADD CONSTRAINT `fk_usuarios_tienen_discos_discos` FOREIGN KEY (`discos_fk`) REFERENCES `discos` (`discos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_tienen_discos_usuarios` FOREIGN KEY (`usuarios_fk`) REFERENCES `usuarios` (`usuarios_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
