-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2022 a las 22:19:17
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_peliss`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int NOT NULL,
  `comentario` varchar(1500) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idpelicula` int NOT NULL,
  `idusuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidora`
--

CREATE TABLE `distribuidora` (
  `iddistribuidora` int NOT NULL,
  `nombre_empresa` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `distribuidora`
--

INSERT INTO `distribuidora` (`iddistribuidora`, `nombre_empresa`) VALUES
(1, 'Warner Bros. Pictures'),
(2, 'STX Films'),
(3, 'Walt Disney Pictures'),
(4, 'CJ Entertainment'),
(5, '20th Century Studios'),
(6, 'Pantelion films'),
(7, 'Universal Pictures'),
(8, 'Sony Pictures Entertainment'),
(9, 'Netflix'),
(10, 'Buena Vista International'),
(11, 'CBS Films');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idgenero` int NOT NULL,
  `nombre_genero` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idgenero`, `nombre_genero`) VALUES
(1, 'Terror'),
(2, 'Acción'),
(3, 'Aventuras'),
(4, 'Ciencia Ficción'),
(5, 'Drama'),
(6, 'Fantasía'),
(7, 'Musical'),
(8, 'Suspenso'),
(9, 'Comedia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id` int NOT NULL,
  `pelid` int NOT NULL,
  `userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `idpais` int NOT NULL,
  `nombre_pais` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idpais`, `nombre_pais`) VALUES
(1, 'EEUU'),
(2, 'Argentina'),
(3, 'México'),
(4, 'Corea del Sur');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id` int NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `descripcion` varchar(1500) NOT NULL,
  `url_imagen` varchar(1500) NOT NULL,
  `anio_estreno` year NOT NULL,
  `director` varchar(45) NOT NULL,
  `url_trailer` varchar(1500) NOT NULL,
  `genero_idgenero` int NOT NULL,
  `idpais` int NOT NULL,
  `iddistribuidora` int NOT NULL,
  `likes` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id`, `titulo`, `descripcion`, `url_imagen`, `anio_estreno`, `director`, `url_trailer`, `genero_idgenero`, `idpais`, `iddistribuidora`, `likes`) VALUES
(1, 'Kung Fu Panda III', 'En esta tercera aventura panda, Po deberá enfrentar dos desafíos épicos: uno, de origen sobrenatural, y el otro, muy cerca de su hogar, con la aparición de quien dice ser su padre biológico.', 'https://images-na.ssl-images-amazon.com/images/S/pv-target-images/e2df9e2741d3cdaafa0c21922b560ad50e3a3beedd589c043140a639841bee8c._RI_V_TTW_.jpg', 2016, 'Jennifer Yuh', 'https://www.youtube.com/watch?v=G3bAnQ7YP7E', 3, 1, 1, 0),
(2, 'August Rush', 'Un niño (Freddie Highmore) usa sus prodigiosos talentos musicales para encontrar a sus padres (Keri Russell, Jonathan Rhys Meyers), ignorando que ellos han iniciado un viaje similar para encontrarlo.', 'https://m.media-amazon.com/images/I/51ldIfb+pAL._AC_SY580_.jpg', 2007, 'Kirsten Sheridan', 'https://www.youtube.com/watch?v=VREnHiJx2po', 7, 1, 1, 0),
(3, 'It 2', 'En el misterioso pueblo de Derry, un malvado payaso llamado Pennywise vuelve 27 años después para atormentar a los ya adultos miembros del Club de los Perdedores, que ahora están más alejados unos de otros.', './img/poster/it.jpg', 2019, 'Andrés Muschiett', 'https://www.youtube.com/watch?v=o1sQbtZpsic', 1, 1, 1, 0),
(4, 'Matar o morir', 'Riley despierta del coma con una obsesión: vengar los asesinatos de su marido e hija. Frustrada porque el sistema judicial defiende a los asesinos, Riley se convierte en una luchadora implacable embarcada en una cruzada violenta.', './img/poster/matarMorir.jpg', 2018, 'Pierre Morel', 'https://www.youtube.com/watch?v=TYG5iS2irbk&t=2s', 2, 1, 2, 0),
(5, 'Piratas del Caribe 5', 'El capitán Salazar comanda un ejército de piratas fantasma con el que pretende exterminar a todos los piratas vivos de la Tierra, pero Jack Sparrow se opone a él y busca el Tridente de Poseidón, lo único que puede detener a Salazar.', './img/poster/piratas.jpg', 2017, 'Espen Sandberg', 'https://www.youtube.com/watch?v=azjsS0wxTA8&t=2s', 3, 1, 3, 0),
(6, 'Identidad sustituta', 'En un futuro cercano los humanos viven libres de dolor, peligro y complicaciones a través de representaciones robóticas denominadas sustitutos. Cuando el primer asesinato en más de una década sacude a este mundo casi perfecto, el agente del FBI Greer descubre una gran conspiración que le obliga a abandonar a su propio sustituto y poner su vida en peligro para resolver el crimen.', './img/poster/identidad.jpg', 2009, 'Jonathan Mostow', 'https://www.youtube.com/watch?v=kTjHVyK7tNY&t=1s', 4, 1, 1, 0),
(7, 'Parásitos', 'Tanto Gi Taek como su familia están sin trabajo. Cuando su hijo mayor, Gi Woo, empieza a recibir clases particulares en la adinerada casa de Park, las dos familias, que tienen mucho en común pese a pertenecer a dos mundos totalmente distintos, comienzan una relación de resultados imprevisibles.', './img/poster/parasitos.jpg', 2019, 'Bong Joon-ho', 'https://www.youtube.com/watch?v=Z7SiFLgoFQM&t=2s', 5, 4, 4, 1),
(8, 'El gran showman', 'En el siglo XIX, P.T. Barnum es un visionario que surge de la nada y crea un fascinante espectáculo que se convertirá en una sensación mundial, el llamado Ringling Bros. and Barnum & Bailey Circus.', './img/poster/granShowman.jpg', 2017, 'Michael Gracey', 'https://www.youtube.com/watch?v=bjKA55NV0qs', 7, 1, 5, 0),
(9, 'Encanto', 'En lo alto de las montañas de Colombia hay un lugar encantado llamado Encanto. Aquí, en una casa mágica, vive la extraordinaria familia Madrigal donde todos tienen habilidades fantásticas.', './img/poster/encanto.jpg', 2021, 'Byron Howard', 'https://www.youtube.com/watch?v=E4dCY_DvT-4', 6, 1, 3, 0),
(10, 'Mente siniestra', 'Para ayudar a su hija de nueve años a recuperarse del golpe que significó el suicidio de su madre, un psicoanalista neoyorquino deja la ciudad y se va a con la niña a vivir a una casa en el bosque.', './img/poster/menteSiniestra.jpg', 2005, 'John Polson', 'https://www.youtube.com/watch?v=4BbNbcjkkdA&t', 8, 1, 5, 0),
(11, 'No manches Frida', 'Cuenta la historia de Ezequiel \"Zequi\" Alcántara (Omar Chaparro), un ladrón quien tras salir de la cárcel decide regresar al terreno baldío donde su cómplice enterró el dinero, pero para sorpresa de él, el terreno se había vuelto en el gimnasio de la preparatoria Frida Kahlo.', './img/poster/frida.jpg', 2016, 'Nacho G. Velilla', 'https://www.youtube.com/watch?v=iG68gwg1Bs0', 9, 3, 6, 1),
(12, 'El teléfono negro', 'Un homicida sádico y enmascarado mantiene a Finney, un niño de 13 años, secuestrado en un sótano incomunicado. A través de un teléfono averiado que hay en la pared, Finney se comunica con otras víctimas del criminal, quienes quieren ayudarlo.', './img/poster/telefono.jpg', 2022, 'Scott Derrickson', 'https://www.youtube.com/watch?v=kQ3EMxTAwXY', 1, 1, 7, 0),
(13, 'Punto de quiebre', 'Remake del film \'Le llaman Bodhi\' de 1991. Johnny es un joven rebelde que, tras dejar atrás su pasado, pasa a formar parte del FBI como agente especial. Un complicado caso de robos en serie le lleva a California donde deberá infiltrarse en un equipo de atletas de élite. Durante la investigación, conocerá a Bodhi, un joven que cambiará su visión sobre la vida, y a Tyler, una bella muchacha de la que acabará enamorándose.', './img/poster/puntoQuiebre.jpg', 2015, 'Ericson Core', 'https://www.youtube.com/watch?v=xumjLk5xMas&t', 2, 1, 1, 0),
(14, 'La máscara del Zorro', 'Después de estar preso 20 años, el Zorro original, Don Diego de la Vega, recibe noticias de que su viejo enemigo ha vuelto. Don Diego escapa y vuelve para entrenar a Alejandro Murrieta, un bandolero con un tortuoso pasado, para ser su sucesor.', './img/poster/zorro.jpg', 1998, 'Martin Campbell', 'https://www.youtube.com/watch?v=B7g2Ko_3mHI', 3, 3, 8, 0),
(15, 'Avatar', 'Entramos en el mundo Avatar de la mano de Jake Sully, un ex-Marine en silla de ruedas, que ha sido reclutado para viajar a Pandora, donde existe un mineral raro y muy preciado que puede solucionar la crisis energética existente en la Tierra.', './img/poster/avatar.jpg', 2009, 'James Cameron', 'https://www.youtube.com/watch?v=g5deg0HgCmY', 4, 1, 5, 0),
(16, 'Corazón de León', 'Ivana es una exitosa abogada que un día pierde su móvil y entonces recibe una llamada de la persona que lo encontró. El hombre es León Godoy, un arquitecto famoso con una personalidad arrolladora. En la charla telefónica se crea una gran empatía y los dos sienten un inmediato interés. Los dos quedan al siguiente día para devolverse el móvil, pero cuando Ivana ve a León queda perpleja: el hombre es todo lo que ella percibió, pero mide 1,35 metros.', './img/poster/corazonLeon.jpg', 2013, 'Marcos Carnevale', 'https://www.youtube.com/watch?v=C8aTANaXqG0', 5, 2, 5, 0),
(17, 'Si decido quedarme', 'Lo que debería haber sido una tranquila excursión familiar en coche cambia en el instante en que tienen un accidente y ahora la vida de Mia Hall pende de un hilo, atrapada entre la vida y la muerte.', './img/poster/decidoQuedarme.jpg', 2014, 'R. J. Cutler', 'https://www.youtube.com/watch?v=CFzzqPsVI24', 7, 1, 1, 0),
(18, 'El Rey Arturo', 'Arturo fue robado al nacer y tuvo una educación espartana en una zona conflictiva de la ciudad, pero cuando extrae la espada Excalibur de la piedra en la que estaba clavada, la profecía se cumple y acepta el destino de liderar a su pueblo.', './img/poster/reyArturo.jpg', 2017, 'Guy Ritchie', 'https://www.youtube.com/watch?v=cAKUObrfCAA', 6, 1, 1, 1),
(19, 'A ciegas', 'Cinco años después de una aterradora presencia invisible que lleva a la sociedad al suicidio, una madre y sus dos hijos hacen un intento desesperado por llegar a un lugar seguro. Con la esperanza de llegar al santuario, la familia vive con los ojos vendados para protegerse.', './img/poster/ciegas.jpg', 2018, 'Susanne Bier', 'https://www.youtube.com/watch?v=UAeZdEQxWt4', 8, 1, 9, 0),
(20, 'Mamá se fue de viaje', 'Vera, agobiada por la vida doméstica, decide tomarse unas vacaciones alejada de su familia, y Víctor, que vive absorbido por su trabajo y ajeno a la actividad de su mujer en casa, debe hacer frente a todo lo que hacía en el día a día su mujer, lo que provoca el comienzo de diversos problemas.', './img/poster/mamaViaje.jpg', 2017, 'Ariel Winograd', 'https://www.youtube.com/watch?v=dBopvALCm2o', 9, 2, 10, 0),
(21, 'La monja', 'Una monja se suicida en una abadía rumana y el Vaticano envía a un sacerdote y una novicia a investigar lo sucedido. Lo que ambos encuentran allí es un secreto perverso que los enfrentará cara a cara con el mal en su esencia más pura.', './img/poster/monja.jpg', 2018, 'Corin Hardy', 'https://www.youtube.com/watch?v=eqVjGwYFVqQ', 1, 1, 1, 0),
(22, 'El príncipe de Persia', 'En el medio oriente, un príncipe persa se alía con la princesa de un reino vecino para proteger el secreto de las Arenas del Tiempo y también para capturar al asesino del rey de Persia, el cual pretende retroceder en el tiempo.', './img/poster/principePersia.jpg', 2010, 'Ericson Core', 'https://www.youtube.com/watch?v=BBVW-F2nKT4', 2, 1, 3, 0),
(23, 'Aquaman', 'Mitad humano, mitad atlante, Arthur Curry es un habitante del poderoso reino subacuático de la Atlántida criado por un hombre humano y considerado un paria por los suyos. Arthur emprenderá un viaje que le ayudará a descubrir si es digno de cumplir con su destino: ser rey y convertirse en Aquaman.', './img/poster/aquaman.jpg', 2018, 'James Wan', 'https://www.youtube.com/watch?v=LS7qSSjSmjw', 3, 1, 1, 0),
(24, 'WALL-E', 'Tras cientos de años haciendo aquello para lo que fue construido: limpiar el planeta de basura, el pequeño robot Wall-e tiene una nueva misión cuando conoce a Eva.', './img/poster/wally.jpg', 2008, 'Andrew Stanton', 'https://www.youtube.com/watch?v=IYPe2oWBV_w', 4, 1, 3, 0),
(25, 'Un sueño posible', 'Basada en hechos reales. Michael Oher, un joven negro sin hogar, es acogido por una familia blanca, dispuesta a darle todo su apoyo para que pueda triunfar tanto como jugador de fútbol americano como en su vida privada. Por su parte Oher también influirá con su presencia en la vida de la familia Touhy.', './img/poster/sueño.jpg', 2009, 'John Lee Hancock', 'https://www.youtube.com/watch?v=gGYmcqbp0uk', 5, 1, 1, 0),
(26, 'Valiente', 'Merida es una joven arquera, hija del rey Fergus y de la reina Elinor. Decidida a forjar su propio camino en la vida, Merida desafía una antigua costumbre de los señores de la tierra, desencadenando el caos en el reino.', './img/poster/valiente.jpg', 2012, 'Brenda Chapman', 'https://www.youtube.com/watch?v=0t4uTlcsJl4', 6, 1, 3, 0),
(27, 'Winchester', 'Sarah Winchester vive en una mansión demencial, de siete alturas y diseñada como un laberinto. La vivienda está construida para detener a los espíritus de los asesinados por el arma que inventó su antepasado, el creador de los rifles Winchester. Con 160 habitaciones, escaleras que no llevan a ninguna parte y puertas que al abrirse descubren un muro, Sarah intenta esquivar a los seres del otro mundo.', './img/poster/winchester.jpg', 2018, 'Michael Spierig', 'https://www.youtube.com/watch?v=zu9VFOwxrkQ', 8, 1, 11, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `userid` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comentarios_pelicula1_idx` (`idpelicula`),
  ADD KEY `fk_comentarios_user1_idx` (`idusuario`);

--
-- Indices de la tabla `distribuidora`
--
ALTER TABLE `distribuidora`
  ADD PRIMARY KEY (`iddistribuidora`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idgenero`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_likes_pelicula1_idx` (`pelid`),
  ADD KEY `fk_likes_user1_idx` (`userid`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`idpais`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pelicula_genero1_idx` (`genero_idgenero`),
  ADD KEY `fk_pelicula_pais1_idx` (`idpais`),
  ADD KEY `fk_pelicula_distribuidora1_idx` (`iddistribuidora`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `distribuidora`
--
ALTER TABLE `distribuidora`
  MODIFY `iddistribuidora` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `idgenero` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `idpais` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `userid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_comentarios_pelicula1` FOREIGN KEY (`idpelicula`) REFERENCES `pelicula` (`id`),
  ADD CONSTRAINT `fk_comentarios_user1` FOREIGN KEY (`idusuario`) REFERENCES `user` (`userid`);

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_likes_pelicula1` FOREIGN KEY (`pelid`) REFERENCES `pelicula` (`id`),
  ADD CONSTRAINT `fk_likes_user1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `fk_pelicula_distribuidora1` FOREIGN KEY (`iddistribuidora`) REFERENCES `distribuidora` (`iddistribuidora`),
  ADD CONSTRAINT `fk_pelicula_genero1` FOREIGN KEY (`genero_idgenero`) REFERENCES `genero` (`idgenero`),
  ADD CONSTRAINT `fk_pelicula_pais1` FOREIGN KEY (`idpais`) REFERENCES `pais` (`idpais`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
