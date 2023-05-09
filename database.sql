-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 26 Octobre 2017 à 13:53
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `simple-mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

CREATE TABLE `item` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `item`
--

INSERT INTO `item` (`id`, `title`) VALUES
(1, 'Stuff'),
(2, 'Doodads');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

USE projet_2;

SELECT * FROM article;
TRUNCATE TABLE article;
DROP TABLE article;

SELECT * FROM admin;
TRUNCATE TABLE admin;
DROP TABLE admin;

-- ADMIN

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
);

INSERT INTO `admin` (`username`, `type`, `password`) VALUES
('Admin2023', 'admin', '$2y$10$xQMlJsK6av7/J5KXFxp6KOb6lPxrbAhARIWmJQ8tCW2XWExF4rbJe');

/* update following changes form articles*/ 


CREATE TABLE article (
id INT PRIMARY KEY AUTO_INCREMENT,
title VARCHAR(255) NOT NULL,
extract VARCHAR(100) NOT NULL,
content TEXT NOT NULL,
photo VARCHAR(255) NOT NULL,

category_id INT NOT NULL,
CONSTRAINT fk_category
FOREIGN KEY (category_id)
REFERENCES category(id),

writer_id INT NOT NULL,
CONSTRAINT fk_writer
FOREIGN KEY (writer_id)
REFERENCES writer(id),
date DATE NOT NULL
);


INSERT INTO ARTICLE (title, extract, content, photo, category_id, writer_id, date) 
VALUES
('Perdu en foret','luctus massa sit amet euismod luctus massa sit amet euismod', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', 'https://picsum.photos/id/28/4928/3264', '1','1', '2023-04-18'),
('Un peu d\'escalade', 'luctus massa sit amet euismod luctus massa sit amet euismod', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', 'https://picsum.photos/id/29/4000/2670', '1','2', '2023-04-16'),
('C\'est calme', 'luctus massa sit amet euismod','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', 'https://picsum.photos/id/135/2560/1920', '2','2', '2023-04-15'),
('Venez elle est bonne', 'luctus massa sit amet euismod ','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', 'https://picsum.photos/id/179/2048/1365', '3','3', '2023-05-13'),
('De nouveaux amis','luctus massa sit amet euismod luctus massa sit amet euismod', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', 'https://picsum.photos/id/28/4928/3264', '1','1', '2023-04-18')
;

SELECT * FROM article
WHERE date <= CURDATE()
ORDER BY date DESC
LIMIT 3;


TRUNCATE TABLE picture;
DROP TABLE picture;


SELECT * FROM picture;


CREATE TABLE picture (
id INT PRIMARY KEY AUTO_INCREMENT,
url VARCHAR(255) NOT NULL,
article_id INT NOT NULL
);

INSERT INTO picture (url, article_id)
VALUES
('https://picsum.photos/id/28/4928/3264', 12),
('https://picsum.photos/id/29/4000/2670', 12),
('https://picsum.photos/id/135/2560/1920', 12),
('https://picsum.photos/id/179/2048/1365', 3)
;

SELECT  a.title, p.url
FROM picture as p
	INNER JOIN article as a on p.article_id=a.id;


CREATE TABLE category (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    url VARCHAR (255) NOT NULL 
);

INSERT INTO category (name , url)
VALUES
('Jurassique','/assets/images/jurassique.jpg'),
('Egypte Antique','/assets/images/egypte-antique.jpg'),
('Renaissance','/assets/images/renaissance.jpg')
;

CREATE TABLE writer (
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(100) NOT NULL,
    presentation VARCHAR (255) NOT NULL 
);

INSERT INTO writer (firstname, presentation)
VALUES
('Laetitia','C\'est moi Laetitia'),
('Baptiste','C\'est moi Baptiste'),
('Ben','C\'est moi Ben')
;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
);


INSERT INTO `admin` (`username`, `type`, `password`) VALUES
('Admin2023', 'admin', '$2y$10$xQMlJsK6av7/J5KXFxp6KOb6lPxrbAhARIWmJQ8tCW2XWExF4rbJe');

INSERT INTO projet_2.article (title,`extract`,content,photo,category_id,`date`,writer_id) VALUES
	 ('Avril au Jurassique','Quelques conseils avant de partir au Jurassique...','<p>Pour partir tranquille au <strong>Jurassique</strong>, nous vous avons pr&eacute;par&eacute; quelques conseils pour organiser votre voyage :&nbsp;</p>
<p>-<strong>&nbsp;</strong><em>Pr&eacute;parez votre &eacute;quipement</em><strong> :</strong> Avant de partir en voyage, il est important de pr&eacute;parer votre &eacute;quipement, notamment en vous assurant d''avoir suffisamment de nourriture, d''eau et de v&ecirc;tements appropri&eacute;s pour affronter les conditions m&eacute;t&eacute;orologiques. Vous pouvez &eacute;galement envisager d''emporter des outils de chasse ou de p&ecirc;che pour vous aider &agrave; obtenir de la nourriture en cours de route.</p>
<p>-&nbsp;<em>Soyez conscient de votre environnement </em>: Lorsque vous voyagez &agrave; l''&eacute;poque de la pr&eacute;histoire, il est important d''&ecirc;tre conscient de votre environnement et des dangers potentiels qui pourraient se pr&eacute;senter. Cela peut inclure des pr&eacute;dateurs, des changements de terrain soudains ou des conditions m&eacute;t&eacute;orologiques extr&ecirc;mes.</p>
<p>-&nbsp;<em>Voyagez en groupe :</em> Voyager en groupe peut offrir plusieurs avantages, notamment en mati&egrave;re de s&eacute;curit&eacute; et de partage des responsabilit&eacute;s. En voyageant avec d''autres personnes, vous pouvez &eacute;galement partager des connaissances et des comp&eacute;tences qui pourraient &ecirc;tre utiles en cours de route.</p>
<p class="MsoNormal">- <em>Suivez les voies migratoires</em> : Les premiers humains ont souvent suivi les migrations des animaux pour trouver de la nourriture et de l''eau. En suivant ces voies migratoires, vous pouvez augmenter vos chances de trouver des sources de nourriture et d''eau.</p>','https://cdn.pixabay.com/photo/2018/07/08/14/56/iguassu-3524054_1280.jpg',1,'2023-04-03',1),
	 ('Les espèces disparues','Vous rêvez de découvrir des espèces disparues...','<p class="MsoNormal">Lors de votre voyage &agrave; travers les vastes paysages de l''&eacute;poque pr&eacute;historique, vous allez rencontrer une grande vari&eacute;t&eacute; de dinosaures mais ils ne sont pas les seuls animaux pr&eacute;sents. Voici un aper&ccedil;u des autres cr&eacute;atures.</p>
<hr>
<p class="MsoNormal"><span class="MsoHyperlink"><span style="color: windowtext; text-decoration: none; text-underline: none;"><strong>Les mammif&egrave;res </strong>: bien qu''ils soient peu nombreux et de petite taille, les mammif&egrave;res sont d&eacute;j&agrave; pr&eacute;sents &agrave; l''&eacute;poque jurassique. Ils ressemblent davantage &agrave; des musaraignes ou &agrave; des &eacute;cureuils qu''aux mammif&egrave;res que nous connaissons aujourd''hui. Ils sont nocturnes et se cachent pour &eacute;viter les dinosaures pr&eacute;dateurs.</span></span></p>
<p class="MsoNormal"><span class="MsoHyperlink"><span style="color: windowtext; text-decoration: none; text-underline: none;"><strong>Les oiseaux</strong> : les oiseaux sont d&eacute;j&agrave; pr&eacute;sents &agrave; l''&eacute;poque jurassique, mais ils sont tr&egrave;s diff&eacute;rents de ceux que nous connaissons aujourd''hui. Ils sont g&eacute;n&eacute;ralement plus petits et ressemblent davantage &agrave; des reptiles volants.&nbsp;</span></span></p>
<p class="MsoNormal"><span class="MsoHyperlink"><span style="color: windowtext; text-decoration: none; text-underline: none;"><strong>Les reptiles marins </strong>: les oc&eacute;ans sont peupl&eacute;s de reptiles marins impressionnants, comme les pl&eacute;siosaures et les ichthyosaures. Les pl&eacute;siosaures sont des pr&eacute;dateurs qui chassent des poissons et d''autres animaux marins avec leurs longs cous et leurs m&acirc;choires dent&eacute;es. Les ichthyosaures, quant &agrave; eux, ressemblent &agrave; des dauphins modernes.</span></span></p>
<p class="MsoNormal"><span class="MsoHyperlink"><span style="color: windowtext; text-decoration: none; text-underline: none;"><strong>Les insectes </strong>: les insectes sont &eacute;galement pr&eacute;sents et beaucoup ressemblent &agrave; des esp&egrave;ces modernes. Les libellules sont particuli&egrave;rement abondantes, ainsi que les moustiques et les fourmis.</span></span></p>
<hr>
<p>&nbsp;</p>','https://cdn.pixabay.com/photo/2017/09/10/13/06/pterosaur-2735500_1280.jpg',1,'2023-04-24',1),
	 ('Découvrir la Laurasie','Des paysages à couper le souffle...','<p class="MsoNormal">La Laurasie &eacute;tait l''un des deux continents qui a r&eacute;sult&eacute; de la s&eacute;paration du supercontinent Pang&eacute;e il y a environ 180 millions d''ann&eacute;es. Ce continent &eacute;tait situ&eacute; dans l''h&eacute;misph&egrave;re nord et comprenait l''Am&eacute;rique du Nord, l''Europe et l''Asie.</p>
<p class="MsoNormal">Les paysages de la Laurasie sont tr&egrave;s vari&eacute;s, avec des plaines, des montagnes, des for&ecirc;ts et des d&eacute;serts.</p>
<p class="MsoNormal">Les plaines de la Laurasie sont vastes et s''&eacute;tendent sur des milliers de kilom&egrave;tres. Ce sont des terres fertiles o&ugrave; pousse une grande vari&eacute;t&eacute; de plantes, comme des herbes, des buissons et des arbres. Les plaines sont parcourues par des rivi&egrave;res et des lacs, qui abritent une grande vari&eacute;t&eacute; de poissons et d''autres cr&eacute;atures aquatiques.</p>
<p class="MsoNormal">Les montagnes de la Laurasie sont majestueuses et imposantes. Ces cha&icirc;nes de montagnes s''&eacute;tendent sur de grandes distances et sont souvent recouvertes de neige. Les montagnes offrent des habitats pour une grande vari&eacute;t&eacute; d''animaux.</p>
<p class="MsoNormal"><img style="display: block; margin-left: auto; margin-right: auto;" src="https://images.unsplash.com/photo-1464039397811-476f652a343b?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1736&amp;q=80" alt="" width="270" height="181"></p>
<p class="MsoNormal">Les for&ecirc;ts de la Laurasie sont denses et vari&eacute;es. Elles sont principalement constitu&eacute;es de conif&egrave;res, mais il y avait &eacute;galement des feuillus et d''autres types d''arbres.</p>
<p class="MsoNormal">Les d&eacute;serts de la Laurasie sont vastes et inhospitaliers. Les temp&eacute;ratures y sont souvent extr&ecirc;mes, avec des journ&eacute;es br&ucirc;lantes et des nuits glaciales. Les d&eacute;serts sont parsem&eacute;s de cactus et d''autres plantes r&eacute;sistantes &agrave; la chaleur, ainsi que de cr&eacute;atures qui ont d&eacute;velopp&eacute; des adaptations pour survivre dans des conditions extr&ecirc;mes.</p>
<p class="MsoNormal">Les paysages de la Laurasie sont donc tr&egrave;s vari&eacute;s et abritent une grande vari&eacute;t&eacute; d''animaux et de plantes.</p>','https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80',1,'2023-04-10',1),
	 ('Explorer l''Egypte Antique...','Avant de partir en Egypte, quelques conseils précieux...','<p>Bienvenue en Egypte Antique, l''une des p&eacute;riodes les plus fascinantes de l''histoire de l''humanit&eacute; !</p>
<p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://images.unsplash.com/photo-1584719866406-c76ddee48493?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1974&amp;q=80" alt="" width="275" height="206"></p>
<p>Si vous pr&eacute;voyez de voyager &agrave; travers le temps pour visiter cette p&eacute;riode de l''histoire, voici quelques conseils pour rendre votre voyage plus agr&eacute;able et s&ucirc;r :</p>
<p class="MsoNormal">- Habillez-vous modestement pour respecter la culture de l''&Eacute;gypte antique. Les &Eacute;gyptiens ont tendance &agrave; porter des v&ecirc;tements en lin et en coton, ainsi que des bijoux.</p>
<p class="MsoNormal">- Apportez suffisamment d''eau et de nourriture pour votre voyage, car les voyages &agrave; travers le temps peuvent &ecirc;tre &eacute;puisants et vous aurez besoin d''&eacute;nergie pour explorer les monuments antiques.</p>
<p class="MsoNormal">- &Eacute;vitez de toucher ou de d&eacute;placer des objets antiques, car ils peuvent &ecirc;tre fragiles ou sacr&eacute;s.</p>
<p class="MsoNormal">- Soyez pr&ecirc;t &agrave; faire face &agrave; des temp&eacute;ratures extr&ecirc;mes. Il peut faire tr&egrave;s chaud pendant la journ&eacute;e et tr&egrave;s froid la nuit, alors apportez des v&ecirc;tements adapt&eacute;s &agrave; ces conditions.</p>
<p class="MsoNormal">En suivant ces conseils simples, vous pourrez profiter au maximum de votre voyage dans l''&Eacute;gypte antique et vivre une exp&eacute;rience inoubliable.</p>','https://img.freepik.com/photos-gratuite/ancien-temple-historique-abou-simbel-ramses-ii-egypte_181624-43854.jpg?w=2000&t=st=1683289979~exp=1683290579~hmac=8430548b74c15217855b1159c0d222f012a79af5fafd68a18e6c6c53a716cdbf',2,'2023-04-10',2),
	 ('Les activités sur le Nil','Le Nil sous l''Egypte Antique...','<p class="MsoNormal">Le Nil est une rivi&egrave;re embl&eacute;matique de l''Egypte antique, un &eacute;l&eacute;ment vital pour la civilisation qui s''est d&eacute;velopp&eacute;e le long de ses rives. Pour les &Eacute;gyptiens, le Nil est bien plus qu''une simple source d''eau, c''est une divinit&eacute;, une force vitale qui apporte la fertilit&eacute; &agrave; leur terre et assure la survie de leur peuple.</p>
<p class="MsoNormal">Le Nil est une source essentielle de nourriture: poissons, grenouilles en &eacute;levage... Les rives du fleuve sont fertiles, id&eacute;ales pour l''agriculture, fournissant des r&eacute;coltes abondantes de c&eacute;r&eacute;ales, de fruits et de l&eacute;gumes.</p>
<p class="MsoNormal">C''est &eacute;galement un moyen de transport vital pour les &Eacute;gyptiens. Les bateaux sont utilis&eacute;s pour transporter des marchandises, des personnes et des animaux le long du fleuve.</p>
<p class="MsoNormal">Des processions religieuses sont &eacute;galement organis&eacute;es sur le Nil pour honorer le dieu et pour s''assurer sa b&eacute;n&eacute;diction sur les r&eacute;coltes et la survie de la communaut&eacute;. Les temples ont &eacute;t&eacute; construits le long du Nil pour servir de lieux de culte et pour recevoir des offrandes.</p>
<p class="MsoNormal">En somme, le Nil est un &eacute;l&eacute;ment vital de la vie Egyptienne Antique. Il fournit nourriture, transport, religion et loisirs &agrave; la population, et est v&eacute;n&eacute;r&eacute; comme une divinit&eacute; essentielle pour la survie de leur civilisation.</p>','https://img.freepik.com/photos-gratuite/plan-large-ocean-plage-sable-fin-montagnes-blanches-sous-ciel-clair_181624-3132.jpg?size=626&ext=jpg',2,'2023-04-30',2),
	 ('Les figures de la Renaissance','Qui n''a pas rêvé de rencontrer...','<p class="MsoNormal">Lors d''un voyage dans le temps &agrave; l''&eacute;poque de la Renaissance, il est essentiel de rencontrer certaines des figures les plus importantes de cette p&eacute;riode fascinante de l''histoire. Voici quelques unes des personnalit&eacute;s &agrave; ne pas manquer:</p>
<p class="MsoNormal"><strong><span style="color: rgb(126, 140, 141);">Leonard de Vinci :</span></strong> C&eacute;l&egrave;bre artiste, scientifique et inventeur, Leonard de Vinci est un personnage incontournable de la Renaissance. Il est connu pour ses &oelig;uvres d''art telles que la Joconde et la C&egrave;ne, mais aussi pour ses inventions comme l''h&eacute;licopt&egrave;re et la voiture &agrave; ressorts.</p>
<p class="MsoNormal"><img style="display: block; margin-left: auto; margin-right: auto;" src="https://cdn.pixabay.com/photo/2013/01/05/21/02/art-74050_1280.jpg" alt="" width="148" height="221"></p>
<p class="MsoNormal"><span style="color: rgb(126, 140, 141);"><strong>Galil&eacute;e : </strong></span>Astronome et physicien italien, Galil&eacute;e est connu pour avoir d&eacute;fendu l''h&eacute;liocentrisme, c''est-&agrave;-dire la th&eacute;orie selon laquelle la Terre tourne autour du Soleil. Il est &eacute;galement connu pour avoir am&eacute;lior&eacute; la lunette astronomique, ce qui lui a permis de d&eacute;couvrir les satellites de Jupiter.</p>
<p class="MsoNormal"><strong><span style="color: rgb(126, 140, 141);">William Shakespeare : </span></strong>&Eacute;crivain anglais de renom, William Shakespeare est consid&eacute;r&eacute; comme l''un des plus grands dramaturges de tous les temps. Ses pi&egrave;ces de th&eacute;&acirc;tre, telles que Rom&eacute;o et Juliette et Hamlet, sont encore jou&eacute;es aujourd''hui et continuent de captiver les spectateurs.</p>
<p class="MsoNormal">Rencontrer ces personnalit&eacute;s lors d''un voyage dans le temps peut &ecirc;tre une exp&eacute;rience inoubliable.&nbsp;</p>','https://images.unsplash.com/photo-1482690205767-61deebe15ef7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80',3,'2023-05-01',1),
	 ('Où aller à la Renaissance?','Quelques lieux interessants à découvrir','<p class="MsoNormal">Voici quelques-uns des lieux les plus int&eacute;ressants &agrave; visiter en Italie si vous choisissez un voyage dans le temps &agrave; la Renaissance :</p>
<p class="MsoNormal">La <strong>ville de Florence</strong>, qui est le centre de la Renaissance et qui abrite des &oelig;uvres d''art c&eacute;l&egrave;bres telles que&nbsp; David de Michel-Ange et la fresque de la chapelle Brancacci.</p>
<p class="MsoNormal">La<strong> ville de Rome</strong>, qui abrite de nombreux sites historiques et artistiques, tels que la Basilique Saint-Pierre et le Vatican, ainsi que des ruines antiques telles que le Colis&eacute;e.</p>
<p class="MsoNormal"><img style="display: block; margin-left: auto; margin-right: auto;" src="https://images.unsplash.com/photo-1511163262182-1b04e5fa4caa?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1673&amp;q=80" alt="" width="208" height="156"></p>
<p class="MsoNormal">Le <strong>Palais des Doges &agrave; Venise</strong>, un magnifique exemple d''architecture Renaissance qui abrite le gouvernement de la ville.</p>
<p class="MsoNormal">Le <strong>Palais Pitti &agrave; Florence</strong>, r&eacute;sidence des M&eacute;dicis.</p>
<p class="MsoNormal">Ces endroits vous donneront une id&eacute;e de l''art, de l''architecture et de la culture de la Renaissance, et vous permettont de vous immerger dans cette p&eacute;riode fascinante de l''histoire.</p>','https://images.unsplash.com/photo-1559722345-0bef499140fb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80',3,'2023-04-17',3);

INSERT INTO projet_2.picture (url,article_id) VALUES
	 ('https://images.unsplash.com/photo-1539768942893-daf53e448371?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2342&q=80',5),
	 ('https://images.unsplash.com/photo-1495833066942-79abe24b0c1f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1714&q=80',5),
	 ('https://images.unsplash.com/photo-1636020833674-e88ba3c3b1bf?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80',5),
	 ('https://images.unsplash.com/photo-1506260408121-e353d10b87c7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1528&q=80',3),
	 ('https://images.unsplash.com/photo-1426604966848-d7adac402bff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80',3),
	 ('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80',3),
	 ('https://images.unsplash.com/photo-1633164051622-4fc773b68e96?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80',5),
	 ('https://images.unsplash.com/photo-1622484766623-55a46a21647b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80',7),
	 ('https://images.unsplash.com/photo-1528834102047-9a6ed16f8d68?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1674&q=80',7),
	 ('https://images.unsplash.com/photo-1585391444413-ec7e04ea7e0b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80',7);
INSERT INTO projet_2.picture (url,article_id) VALUES
	 ('https://images.unsplash.com/photo-1561915511-cd672579326f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80',7)
