-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2020 at 12:58 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `renova_dl_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoryUserID` int(11) NOT NULL,
  `categoryDescription` text COLLATE utf8_unicode_ci NOT NULL,
  `categoryDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`, `categoryUserID`, `categoryDescription`, `categoryDate`) VALUES
(4, 'index', 33, 'All main content pages. Pages that are shown in the front end!', '2019-12-02 00:59:59'),
(8, 'about', 43, 'About Pages', '2020-11-17 00:24:21'),
(9, 'contact', 43, 'Contact Pages', '2020-11-17 00:24:50'),
(10, 'gallery', 43, 'Gallery Pages', '2020-11-17 00:25:09'),
(11, 'admin', 43, 'Admin Pages', '2020-11-17 00:29:51');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `galleryID` int(11) NOT NULL,
  `galleryUserID` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `galleryDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`galleryID`, `galleryUserID`, `link`, `source`, `galleryDate`) VALUES
(101, 1, '', '13308739_123076661446153_1710020747922376703_o.jpg', '2020-11-18 01:01:50'),
(102, 33, '', '13346999_120690638351422_8817029860360234183_n.jpg', '2020-11-18 01:01:50'),
(103, 43, '', '13442406_144434552643697_1471726405075142745_n.jpg', '2020-11-18 01:01:50'),
(104, 1, '', '13450916_144434625977023_51008956962497837_n.jpg', '2020-11-18 01:01:50'),
(105, 33, '', '15025401_237611846659300_7697294529079215255_o.jpg', '2020-11-18 01:01:50'),
(106, 43, '', '15068272_238445143242637_3169937917681250018_o.jpg', '2020-11-18 01:01:50'),
(107, 1, '', '15135944_240879452999206_4942332296936199582_n.jpg', '2020-11-18 01:01:50'),
(108, 33, '', '15135970_240879486332536_3394037569004148068_n.jpg', '2020-11-18 01:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pageID` int(11) NOT NULL,
  `pageCategoryID` int(11) NOT NULL,
  `pageUserID` int(11) NOT NULL,
  `pageName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pageContent` text COLLATE utf8_unicode_ci NOT NULL,
  `pageTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pageLanguage` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'AL',
  `pageStatus` int(11) NOT NULL DEFAULT '0',
  `pageDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pageID`, `pageCategoryID`, `pageUserID`, `pageName`, `pageContent`, `pageTitle`, `pageLanguage`, `pageStatus`, `pageDate`) VALUES
(1, 10, 1, 'gallery', '&lt;h1 class=&quot;font-weight-bold&quot;&gt;&lt;span class=&quot;black-border&quot;&gt;FOTO&lt;/span&gt; GALERIA&lt;/h1&gt;', 'GALERIA E FOTOVE', 'FR', 1, '2019-12-28 19:11:58'),
(8, 9, 33, 'contact', '&lt;div class=&quot;d-flex bd-highlight mt-4&quot;&gt;\r\n                &lt;h2 class=&quot;font-weight-bold&quot;&gt;ADRESA&lt;/h2&gt;\r\n            &lt;/div&gt;\r\n            &lt;hr class=&quot;mt-0&quot;&gt;\r\n            &lt;p class=&quot;lead&quot;&gt;\r\n                &lt;span&gt;&lt;i class=&quot;fas fa-map-marker-alt&quot;&gt;&lt;/i&gt;&lt;/span&gt;&lt;br /&gt;\r\n                &lt;span&gt;INTER-TRANS Medi dooel &lt;/span&gt;&lt;br /&gt;\r\n                &lt;span&gt;rruga 101 bb,&lt;/span&gt; &lt;br /&gt;\r\n                &lt;span&gt;1227 Çelopek Brvenicë&lt;/span&gt; &lt;br /&gt;\r\n                &lt;iframe frameborder=&quot;0&quot; style=&quot;border:0&quot; src=&quot;https://www.google.com/maps/embed/v1/place?q=place_id:ChIJmYAnPYD5UxMROYp1z8eo790&amp;key=AIzaSyCLyjpFsQaQqlXrWYm7DL_0cBPznxnY0LU&quot; allowfullscreen&gt;&lt;/iframe&gt;&lt;br /&gt;\r\n\r\n                &lt;i class=&quot;fas fa-phone-square-alt&quot;&gt;&lt;/i&gt;&lt;strong class=&quot;pl-1&quot;&gt;Tel: &lt;/strong&gt;&lt;a href=&quot;tel:+38970256213&quot;&gt;+38970256213&lt;/a&gt;&lt;br /&gt;\r\n                &lt;i class=&quot;fas fa-phone-square-alt&quot;&gt;&lt;/i&gt;&lt;strong class=&quot;pl-1&quot;&gt;Tel: &lt;/strong&gt;&lt;a href=&quot;tel:+38970290642&quot;&gt;+38970290642&lt;/a&gt;&lt;br /&gt;\r\n                &lt;i class=&quot;fas fa-envelope&quot;&gt;&lt;/i&gt;&lt;small class=&quot;pl-1&quot;&gt;&lt;strong&gt;E-Mail:&lt;/strong&gt; &lt;a href=&quot;mailto:office@inter-trans.mk&quot;&gt;office@inter-trans.mk&lt;/a&gt;&lt;/small&gt;\r\n            &lt;/p&gt;\r\n            &lt;div class=&quot;d-flex bd-highlight mt-4&quot;&gt;\r\n                &lt;h2 class=&quot;font-weight-bold&quot;&gt;NA KONTAKTONI&lt;/h2&gt;\r\n            &lt;/div&gt;', 'Kontakti', 'FR', 1, '2020-01-03 12:19:38'),
(21, 8, 43, 'about', '&lt;!-- Content section1 --&gt;\r\n&lt;section class=&quot;py-3&quot;&gt;\r\n    &lt;div class=&quot;container&quot;&gt;\r\n        &lt;h1 class=&quot;font-weight-bold&quot;&gt;&lt;span class=&quot;black-border&quot;&gt;RETH&lt;/span&gt; NESH&lt;/h1&gt;\r\n        &lt;hr /&gt;\r\n        &lt;div class=&quot;row pb-3 text-center&quot;&gt;\r\n            &lt;div class=&quot;col-12&quot;&gt;\r\n                &lt;img class=&quot;w-100 shadow border border-light p-1&quot; src=&quot;&lt;?php echo APPURL; ?&gt;/public/img/landing.jpg&quot; alt=&quot;&quot;&gt;\r\n            &lt;/div&gt;\r\n        &lt;/div&gt;\r\n        &lt;p class=&quot;font-weight-light text-justify&quot;&gt;\r\n            Inter-Trans është një kompani transporti lider me kapital të plotë privat e themeluar nga\r\n            M. Berzati me bazë në Tetovë, Maqedonia e Veriut. Kompania Inter-Trans operon në tregun vendor dhe\r\n            atë ndërkombëtar prej vitit 1996. Përmes rrjetit tonë, partnerëve dhe zyrave përfaqësuese, ne jemi të\r\n            mirëpozicionuar në fushën e transporteve rrugore dhe ofrojmë një cilësi shërbimi të lartë e me çmime më\r\n            konkuruese në treg. &lt;br /&gt;&lt;br /&gt;\r\n\r\n            Kompania Inter-Trans është një ndër kompanitë e transportit në Maqedoninë e Veriut që ofron transport\r\n            mallrash dhe shumë shërbime të tjera në lidhje me fushën e transportit. Ne vëmë në dispozicion për\r\n            klientët tanë një gamë mjetesh të ndryshme.&lt;br /&gt;\r\n            Ajo që e bënë kompaninë Inter-Trans më të veçantë nga kompanitë e tjera të transportit rrugor është\r\n            korrektësia e plotë ndaj klientëve të saj me shërbimet e shumta. Shërbimet e kompanisë Inter-Trans janë\r\n            me një kualitet tepër cilësor, të shpejta dhe të sigurta.&lt;br /&gt;\r\n            Një ndër aktivitetet kryesore të kompanis Inter-Trans është transporti rrugor kombëtar dhe ndrërkombëtar,\r\n            Brenda Maqedonisë së Veriut operojmë me rreth 40% të aktivitetit tonë, ndërsa në transportin ndërkombetar\r\n            operojmë me 60%. &lt;br /&gt;&lt;br /&gt;\r\n\r\n            Inter-Trans ofron shërbime cilësore në varësi të nevojave tuaja : Transport mallrash, transferime të\r\n            ndryshme mallrash për bizneset tuaja, siguracion transporti, asistencë doganore, etj. Ne ju garantojmë\r\n            shërbim cilësor dhe të shpejtë nga çdo cep të Maqedonissë së Veriut dhe Europës për t\'iu përgjigjur sa më\r\n            mirë nevojave tuaja. &lt;br /&gt;&lt;br /&gt;\r\n        &lt;/p&gt;\r\n    &lt;/div&gt;\r\n&lt;/section&gt;\r\n\r\n&lt;!-- Content section2 --&gt;\r\n&lt;section class=&quot;pt-4 bg-dark text-white&quot;&gt;\r\n    &lt;div class=&quot;container&quot;&gt;\r\n        &lt;h4 class=&quot;font-weight-bold&quot;&gt;Automjetet &lt;/h4&gt;\r\n        &lt;hr class=&quot;bg-light&quot;&gt;\r\n        &lt;h5 class=&quot;font-weight-bold&quot;&gt;* Kamion mallrash trailer&lt;/h5&gt;\r\n        &lt;p class=&quot;font-weight-light text-justify&quot;&gt;\r\n            Kamion transporti është mjet i rëndë transportuese nga 23 deri në 26 ton ngarkesë. Këto mjete mundësojnë transportimin e tonazhit të lartë. Kjo kategori mundëson transportimin e paletave dhe të objekteve të ndryshme me tonazh të lartë. Janë ideale për transportet ndërkombëtare, por edhe kombëtare në distancat e largëta me tonazh të lartë.\r\n            Trailer i transportit është një nga mjetet më të mëdha i autorizuar në akset rrugore.\r\n        &lt;/p&gt;\r\n        &lt;div class=&quot;row pb-5 text-center&quot;&gt;\r\n            &lt;div class=&quot;col-12&quot;&gt;\r\n                &lt;img class=&quot;w-100 shadow border border-light p-1&quot; src=&quot;&lt;?php echo APPURL; ?&gt;/public/img/permasat_e_ngarkeses.png&quot; alt=&quot;&quot;&gt;\r\n            &lt;/div&gt;\r\n        &lt;/div&gt;\r\n    &lt;/div&gt;\r\n&lt;/section&gt;\r\n\r\n&lt;!-- Content section3 --&gt;\r\n&lt;section class=&quot;pt-4&quot;&gt;\r\n    &lt;div class=&quot;container&quot;&gt;\r\n        &lt;h5 class=&quot;font-weight-bold&quot;&gt;* Kamion vetshkarkues apo kipper&lt;/h5&gt;\r\n        &lt;div class=&quot;row py-3 text-center&quot;&gt;\r\n            &lt;div class=&quot;col-12&quot;&gt;\r\n                &lt;img class=&quot;w-100 shadow border border-light p-1&quot; src=&quot;&lt;?php echo APPURL; ?&gt;/public/img/kamion_vetshkarkues_apo_kipper.jpg&quot; alt=&quot;&quot;&gt;\r\n            &lt;/div&gt;\r\n        &lt;/div&gt;\r\n        &lt;p class=&quot;font-weight-light text-justify&quot;&gt;\r\n            Kamion kipper mundësojnë transportin e cfarëdolloj volumi refuz për vetë shkarkim; peshat mbajtëse të këtij lloj mjeti janë shumë të favorshme për ngarkesat e rënda dhe për mallrat refuz. Inter-Trans ofron shërbime cilësore në varësi të nevojave tuaja me kamiona kipper.\r\n        &lt;/p&gt;\r\n    &lt;/div&gt;\r\n&lt;/section&gt;', 'Reth Nesh', 'FR', 1, '2020-02-25 21:06:42'),
(22, 8, 1, 'about', '&lt;!-- Content section1 --&gt;\r\n&lt;section class=&quot;py-3&quot;&gt;\r\n    &lt;div class=&quot;container&quot;&gt;\r\n        &lt;h1 class=&quot;font-weight-bold&quot;&gt;&lt;span class=&quot;black-border&quot;&gt;ABOUT&lt;/span&gt; US&lt;/h1&gt;\r\n        &lt;hr /&gt;\r\n        &lt;div class=&quot;row pb-3 text-center&quot;&gt;\r\n            &lt;div class=&quot;col-12&quot;&gt;\r\n                &lt;img class=&quot;w-100 shadow border border-light p-1&quot; src=&quot;&lt;?php echo APPURL; ?&gt;/public/img/landing.jpg&quot; alt=&quot;&quot;&gt;\r\n            &lt;/div&gt;\r\n        &lt;/div&gt;\r\n        &lt;p class=&quot;font-weight-light text-justify&quot;&gt;\r\n            Inter-Trans is a leading private equity transport company established by\r\n            M. Berzati based in Tetovo, Northern Macedonia. Inter-Trans operates in the local market and\r\n            international since 1996. Through our network, partners and representative offices, we are\r\n            well-positioned in the field of road transport and we offer a high quality service at more prices\r\n            competitive in the market. &lt;br /&gt;&lt;br /&gt;\r\n\r\n            Inter-Trans is one of the transport companies in Northern Macedonia that offers transportation\r\n            freight and many other services related to the field of transport. We make available for\r\n            our customers a range of different tools. &lt;br /&gt;\r\n            What makes Inter-Trans more special than other road transport companies is\r\n            full correctness to its customers with multiple services. Inter-Trans company services are\r\n            with a very high quality, fast and safe quality. &lt;br /&gt;\r\n            One of the main activities of the company Inter-Trans is the national and international road transport,\r\n            Within Northern Macedonia we operate with about 40% of our activity, while in international transport\r\n            we operate at 60%. &lt;br /&gt;&lt;br /&gt;\r\n\r\n            Inter-Trans offers quality services depending on your needs: Freight transport, transfers\r\n            various goods for your businesses, transport insurance, customs assistance, etc. We guarantee you\r\n            quality and fast service from every corner of northern Macedonia and Europe to respond as much as possible\r\n            well your needs. &lt;br /&gt;&lt;br /&gt;\r\n        &lt;/p&gt;\r\n    &lt;/div&gt;\r\n&lt;/section&gt;\r\n\r\n&lt;!-- Content section2 --&gt;\r\n&lt;section class=&quot;pt-4 bg-dark text-white&quot;&gt;\r\n    &lt;div class=&quot;container&quot;&gt;\r\n        &lt;h4 class=&quot;font-weight-bold&quot;&gt;OUR TRANSPORT&lt;/h4&gt;\r\n        &lt;hr class=&quot;bg-light&quot;&gt;\r\n        &lt;h5 class=&quot;font-weight-bold&quot;&gt;* Freight truck trailer&lt;/h5&gt;\r\n        &lt;p class=&quot;font-weight-light text-justify&quot;&gt;\r\n            The transport truck is a heavy transport vehicle from 23 to 26 tons of cargo. These vehicles enable the transport of high tonnage. This category enables the transportation of pallets and various objects with high tonnage. They are ideal for international but also national transport over long distances with high tonnage.\r\n            The transport trailer is one of the largest vehicles authorized on road axes.\r\n        &lt;/p&gt;\r\n        &lt;div class=&quot;row pb-5 text-center&quot;&gt;\r\n            &lt;div class=&quot;col-12&quot;&gt;\r\n                &lt;img class=&quot;w-100 shadow border border-light p-1&quot; src=&quot;&lt;?php echo APPURL; ?&gt;/public/img/permasat_e_ngarkeses_en.png&quot; alt=&quot;&quot;&gt;\r\n            &lt;/div&gt;\r\n        &lt;/div&gt;\r\n    &lt;/div&gt;\r\n&lt;/section&gt;\r\n\r\n&lt;!-- Content section3 --&gt;\r\n&lt;section class=&quot;pt-4&quot;&gt;\r\n    &lt;div class=&quot;container&quot;&gt;\r\n        &lt;h5 class=&quot;font-weight-bold&quot;&gt;* Self-loading truck or kipper&lt;/h5&gt;\r\n        &lt;div class=&quot;row py-3 text-center&quot;&gt;\r\n            &lt;div class=&quot;col-12&quot;&gt;\r\n                &lt;img class=&quot;w-100 shadow border border-light p-1&quot; src=&quot;&lt;?php echo APPURL; ?&gt;/public/img/kamion_vetshkarkues_apo_kipper.jpg&quot; alt=&quot;&quot;&gt;\r\n            &lt;/div&gt;\r\n        &lt;/div&gt;\r\n        &lt;p class=&quot;font-weight-light text-justify&quot;&gt;\r\n            Kipper trucks enable the transport of any volume rejected for self-discharge; the bearing weights of this type of tool are very favorable for heavy loads and for refusing goods. Inter-Trans offers quality services depending on your needs with kipper trucks.\r\n        &lt;/p&gt;\r\n    &lt;/div&gt;\r\n&lt;/section&gt;', 'About Us', 'DE', 1, '2020-04-10 13:04:03'),
(24, 4, 1, 'index', '&lt;!-- Header --&gt;\r\n&lt;header class=&quot;py-5 bg-image-full&quot;&gt;\r\n    &lt;div class=&quot;container h-100&quot;&gt;\r\n        &lt;div class=&quot;row h-100 align-items-center&quot;&gt;\r\n            &lt;div class=&quot;col-12 text-left&quot;&gt;\r\n                &lt;div id=&quot;homeBox&quot;&gt;\r\n                    &lt;h1 class=&quot;home-h1-bold&quot;&gt;Renova Sàrl&lt;/h1&gt;\r\n                    &lt;hr class=&quot;bg-light&quot;&gt;\r\n                    &lt;p class=&quot;home-h3-bold&quot;&gt;Votre partenaire de confiance&lt;/p&gt;\r\n                    &lt;a href=&quot;&lt;?php echo APPURL; ?&gt;/about&quot; class=&quot;btn btn-info mt-5&quot;&gt;\r\n                        &lt;span class=&quot;mehr-button&quot;&gt;Lexo më tepër &lt;i class=&quot;fas fa-caret-right&quot; style=&quot;vertical-align: middle;&quot;&gt;&lt;/i&gt;&lt;/span&gt;\r\n                    &lt;/a&gt;\r\n                    &lt;!-- &lt;div class=&quot;mt-4&quot;&gt;\r\n                        &lt;a href=&quot;https://www.facebook.com/profile.php?id=100012314591998&quot; target=&quot;_blank&quot;&gt;\r\n                            &lt;img class=&quot;bg-white fb-find-us&quot; src=&quot;&lt;?php echo APPURL; ?&gt;/public/img/facebook.png&quot; width=&quot;150px&quot; alt=&quot;&quot;&gt;\r\n                        &lt;/a&gt;\r\n                    &lt;/div&gt; --&gt;\r\n                &lt;/div&gt;\r\n            &lt;/div&gt;\r\n        &lt;/div&gt;\r\n    &lt;/div&gt;\r\n&lt;/header&gt;\r\n\r\n&lt;!-- Content section1 --&gt;\r\n&lt;section class=&quot;py-5 bg-dark text-white&quot;&gt;\r\n    &lt;div class=&quot;container&quot;&gt;\r\n        &lt;h1 class=&quot;font-weight-bold&quot;&gt;RETH NESH&lt;/h1&gt;\r\n        &lt;hr class=&quot;mr-5 bg-light&quot;&gt;\r\n        &lt;p class=&quot;font-weight-light&quot;&gt;\r\n            Inter-Trans menaxhohet nga një staf profesional me përvojë dhe njohuri teknike, si dhe një shërbim logjistik të provuar dhe shumë të kualifikuar të cilët bindin shumë klientë dhe partnerë vendas dhe të huaj. &lt;br /&gt;&lt;br /&gt;\r\n\r\n            Në fillim kemi filluar me një mjet transportues dhe me një menaxher të vetëm me vizion qartë drejt zhvillimit në mënyr që shërbimet e transportit ti kryejm në mënyrë cilsore. Sot dhe jemi rritur në një kompani të rëndësishme dhe të njohur, e cila është e vetëdijshme për përgjegjësinë e saj ndaj shoqërisë dhe klientëve. Ne kurrë nuk vëmë në dyshim zhvillimin, përkundrazi - ai është bërë një konstante e jetës sonë të përditshme. &lt;br /&gt;&lt;br /&gt;\r\n\r\n            Ne besojmë se ndershmëria dhe përpikshmëria janë shtylla kryesore y kompanisë sonë që na çojnë neve drejt qëllimeve që i vendosëm në fillim kur u themeluam dhe kjo na bënë që sot të jemi një ndërmarje moderne dhe e zhvilluar. &lt;br /&gt;&lt;br /&gt;\r\n\r\n            Qëllimi ynë është shërbimi cilësor ndaj klientve dhe transporti i sigurt i mallrave, përsosmëria e këtij qëllimi është themeli mbi të cilin ne ekzistojmë.\r\n        &lt;/p&gt;\r\n        &lt;a href=&quot;&lt;?php echo APPURL; ?&gt;/about&quot; class=&quot;btn btn-info mt-3&quot;&gt;\r\n            &lt;span class=&quot;mehr-button&quot;&gt;Lexo më tepër &lt;i class=&quot;fas fa-caret-right&quot; style=&quot;vertical-align: middle;&quot;&gt;&lt;/i&gt;&lt;/span&gt;\r\n        &lt;/a&gt;\r\n    &lt;/div&gt;\r\n&lt;/section&gt;\r\n\r\n&lt;!-- Content section2 --&gt;\r\n&lt;section class=&quot;py-5&quot;&gt;\r\n    &lt;div class=&quot;container&quot;&gt;\r\n        &lt;h1 class=&quot;font-weight-bold&quot;&gt;&lt;span class=&quot;black-border&quot;&gt;NE&lt;/span&gt; OFROJMË&lt;/h1&gt;\r\n        &lt;hr /&gt;\r\n        &lt;p class=&quot;lead&quot;&gt;\r\n            Ne mbajmë përgjegjësi për mallrat nga pika e ngarkimit deri në pikën e fundit të shkarkimit. Për transportin e mallrave me rrugë lidhëse vajtje ardhje ne ofrojmë çmime deri në 40% më lirë se konkurrenca.\r\n        &lt;/p&gt;\r\n        &lt;h4&gt;Shërbimet kryesore që ne ofrojmë janë: &lt;/h4&gt;\r\n        &lt;ul&gt;\r\n            &lt;li&gt;Transport mallrash brenda Maqedonisë së Veriut&lt;/li&gt;\r\n            &lt;li&gt;Logjistikë për transport brenda dhe jashtë vendit&lt;/li&gt;\r\n            &lt;li&gt;Transport Ndërkombëtar&lt;/li&gt;\r\n        &lt;/ul&gt;\r\n\r\n        &lt;div class=&quot;row text-center text-lg-left mt-4&quot;&gt;\r\n            &lt;div class=&quot;col-lg-3 col-md-6 col-sm-6 col-12 mb-4&quot;&gt;\r\n                &lt;img class=&quot;img-fluid img-thumbnail galleryImg&quot; src=&quot;&lt;?php echo APPURL; ?&gt;/public/img/ne_ofrojme1.jpg&quot; alt=&quot;&quot;&gt;\r\n            &lt;/div&gt;\r\n            &lt;div class=&quot;col-lg-3 col-md-6 col-sm-6 col-12 mb-4&quot;&gt;\r\n                &lt;img class=&quot;img-fluid img-thumbnail galleryImg&quot; src=&quot;&lt;?php echo APPURL; ?&gt;/public/img/ne_ofrojme2.jpg&quot; alt=&quot;&quot;&gt;\r\n            &lt;/div&gt;\r\n            &lt;div class=&quot;col-lg-3 col-md-6 col-sm-6 col-12 mb-4&quot;&gt;\r\n                &lt;img class=&quot;img-fluid img-thumbnail galleryImg&quot; src=&quot;&lt;?php echo APPURL; ?&gt;/public/img/ne_ofrojme3.jpg&quot; alt=&quot;&quot;&gt;\r\n            &lt;/div&gt;\r\n            &lt;div class=&quot;col-lg-3 col-md-6 col-sm-6 col-12 mb-4&quot;&gt;\r\n                &lt;img class=&quot;img-fluid img-thumbnail galleryImg&quot; src=&quot;&lt;?php echo APPURL; ?&gt;/public/img/ne_ofrojme4.jpg&quot; alt=&quot;&quot;&gt;\r\n            &lt;/div&gt;\r\n        &lt;/div&gt;\r\n    &lt;/div&gt;\r\n&lt;/section&gt;\r\n\r\n&lt;!-- Content section3 --&gt;\r\n&lt;section class=&quot;py-5 bg-dark text-white text-left&quot;&gt;\r\n    &lt;div class=&quot;container&quot;&gt;\r\n        &lt;h1 class=&quot;font-weight-bold&quot;&gt;Partnerët tanë&lt;/h1&gt;\r\n        &lt;hr class=&quot;mr-5 bg-light&quot;&gt;\r\n        &lt;p class=&quot;font-weight-light&quot;&gt;\r\n            * Halk Insurance, siguron automjete e kompanisë Inter-Trans dhe siguron mallrat e klientave me vlerë reale &lt;br /&gt;&lt;br /&gt;\r\n            * Motocentar, angazhohet për sigurinë e punonjësve si dhe të mallrave të klientëve, për këtë arsye përdor vetëm goma të cilësisë së lartë (Michelin). &lt;br /&gt;&lt;br /&gt;\r\n            * Dadi Oil, furnizues karburanti, mundëson koston më të ulët për transportin dhe angazhohet për mbrojtjen e mjedisit si dhe ekologjinë e vendit &lt;br /&gt;&lt;br /&gt;\r\n            * Bibaj Grup, furnizues me vaj, antifriz dhe kumullatora &lt;br /&gt;&lt;br /&gt;\r\n            * GarageCentar Beqiri, angazhohet për riparimin dhe rregullimin e automjeteve që të jemi më të sigurt për klientët tanë &lt;br /&gt;&lt;br /&gt;\r\n            * MegaAuto, furnizues autopjesësh që angazhohen për sigurin e automjeteve &lt;br /&gt;&lt;br /&gt;\r\n            * AB Novoselski, furnizues autopjesësh që angazhohen për sigurin e automjeteve &lt;br /&gt;&lt;br /&gt;\r\n            * Neshat Ademi, partneri yne besnik në fushën e marketingut\r\n        &lt;/p&gt;\r\n    &lt;/div&gt;\r\n&lt;/section&gt;\r\n\r\n&lt;!-- Content section4 --&gt;\r\n&lt;section class=&quot;py-5 text-center&quot;&gt;\r\n    &lt;div class=&quot;container&quot;&gt;\r\n        &lt;h1 class=&quot;font-weight-bold&quot;&gt;&lt;span class=&quot;black-border&quot;&gt;GALERIA&lt;/span&gt; E FOTOVE&lt;/h1&gt;\r\n        &lt;hr class=&quot;w-50&quot;&gt;\r\n\r\n        &lt;div class=&quot;row text-center text-lg-left mt-5&quot;&gt;\r\n            &lt;?php\r\n            // Get facebook userPhotos from the API\r\n            // $data = getUserPhotosFromFacebook(12);\r\n\r\n            // Get facebook userPhotos from database\r\n            $data = getGalleryPhotosFromDB(4);\r\n\r\n            // echo &quot;&lt;pre&gt;&quot;;\r\n            // print_r($data);\r\n            // echo date(\'d/m/Y H:i:s\', $data[0][\'created_time\']);\r\n\r\n            for ($i = 0; $i &lt; count($data); $i++) {\r\n                echo \'&lt;div class=&quot;col-lg-3 col-md-6 col-sm-6 col-12 mb-4&quot;&gt;\r\n                            &lt;img class=&quot;img-fluid img-thumbnail galleryImg&quot; src=&quot;\' . APPURL . \'/public/img/gallery/\' . $data[$i][\'source\'] . \'&quot; alt=&quot;&quot;&gt;\r\n                    &lt;/div&gt;\';\r\n            }\r\n            ?&gt;\r\n        &lt;/div&gt;\r\n\r\n        &lt;a href=&quot;&lt;?php echo APPURL; ?&gt;/gallery&quot; class=&quot;btn btn-danger&quot;&gt;\r\n            &lt;span class=&quot;mehr-button&quot;&gt;MË TEPËR...&lt;/span&gt;\r\n        &lt;/a&gt;\r\n    &lt;/div&gt;\r\n&lt;/section&gt;', 'INTER-TRANS - Transport Mallrash', 'FR', 1, '2020-04-10 17:32:58'),
(26, 4, 33, 'index', '&lt;!-- Header --&gt;\r\n&lt;header class=&quot;py-5 bg-image-full&quot;&gt;\r\n    &lt;div class=&quot;container h-100&quot;&gt;\r\n        &lt;div class=&quot;row h-100 align-items-center&quot;&gt;\r\n            &lt;div class=&quot;col-12 text-left&quot;&gt;\r\n                &lt;div id=&quot;homeBox&quot;&gt;\r\n                    &lt;h1 class=&quot;home-h1-bold&quot;&gt;Renova Sàrl&lt;/h1&gt;\r\n                    &lt;hr class=&quot;bg-light&quot;&gt;\r\n                    &lt;p class=&quot;home-h3-bold&quot;&gt;Ihr vertrauenswürdiger Partner&lt;/p&gt;\r\n                    &lt;a href=&quot;&lt;?php echo APPURL; ?&gt;/about&quot; class=&quot;btn btn-info mt-5&quot;&gt;\r\n                        &lt;span class=&quot;mehr-button&quot;&gt;Read more &lt;i class=&quot;fas fa-caret-right&quot; style=&quot;vertical-align: middle;&quot;&gt;&lt;/i&gt;\r\n                        &lt;/span&gt;\r\n                    &lt;/a&gt;\r\n                    &lt;!-- &lt;div class=&quot;mt-4&quot;&gt;\r\n                        &lt;a href=&quot;https://www.facebook.com/profile.php?id=100012314591998&quot; target=&quot;_blank&quot;&gt;\r\n                            &lt;img class=&quot;bg-white fb-find-us&quot; src=&quot;&lt;?php echo APPURL; ?&gt;/public/img/facebook.png&quot; width=&quot;150px&quot; alt=&quot;&quot;&gt;\r\n                        &lt;/a&gt;\r\n                    &lt;/div&gt; --&gt;\r\n                &lt;/div&gt;\r\n            &lt;/div&gt;\r\n        &lt;/div&gt;\r\n    &lt;/div&gt;\r\n&lt;/header&gt;\r\n\r\n&lt;!-- Content section1 --&gt;\r\n&lt;section class=&quot;py-5 bg-dark text-white&quot;&gt;\r\n    &lt;div class=&quot;container&quot;&gt;\r\n        &lt;h1 class=&quot;font-weight-bold&quot;&gt;ABOUT US&lt;/h1&gt;\r\n        &lt;hr class=&quot;mr-5 bg-light&quot;&gt;\r\n        &lt;p class=&quot;font-weight-light&quot;&gt;\r\n            Inter-Trans is managed by a professional staff with experience and technical knowledge, as well as a proven and highly qualified logistics service that convince many local and foreign clients and partners. &lt;br /&gt;&lt;br /&gt;\r\n\r\n            At the beginning we started with a means of transport and with a single manager with a clear vision towards development so that we can perform the transport services qualitatively. Today and we have grown into an important and well-known company, which is aware of its responsibility to society and customers. We never question development, on the contrary - it has become a constant of our daily lives. &lt;br /&gt;&lt;br /&gt;\r\n\r\n            We believe that honesty and punctuality are the main pillars of our company that lead us to the goals we set in the beginning when we were founded and that made us today a modern and developed enterprise. &lt;br /&gt;&lt;br /&gt;\r\n\r\n            Our goal is quality customer service and safe transportation of goods, the perfection of this goal is the foundation on which we exist.\r\n        &lt;/p&gt;\r\n        &lt;a href=&quot;&lt;?php echo APPURL; ?&gt;/about&quot; class=&quot;btn btn-info mt-3&quot;&gt;\r\n            &lt;span class=&quot;mehr-button&quot;&gt;Read more &lt;i class=&quot;fas fa-caret-right&quot; style=&quot;vertical-align: middle;&quot;&gt;&lt;/i&gt;&lt;/span&gt;\r\n        &lt;/a&gt;\r\n    &lt;/div&gt;\r\n&lt;/section&gt;\r\n\r\n&lt;!-- Content section2 --&gt;\r\n&lt;section class=&quot;py-5&quot;&gt;\r\n    &lt;div class=&quot;container&quot;&gt;\r\n        &lt;h1 class=&quot;font-weight-bold&quot;&gt;&lt;span class=&quot;black-border&quot;&gt;WE &lt;/span&gt; OFFER&lt;/h1&gt;\r\n        &lt;hr /&gt;\r\n        &lt;p class=&quot;lead&quot;&gt;\r\n            We are responsible for the goods from the point of loading to the last point of discharge. For the transport of goods by road connecting back and forth we offer prices up to 40% cheaper than the competition.\r\n        &lt;/p&gt;\r\n\r\n        &lt;h4&gt;The main services we offer are:&lt;/h4&gt;\r\n        &lt;ul&gt;\r\n            &lt;li&gt;Freight transport within Northern Macedonia&lt;/li&gt;\r\n            &lt;li&gt;Logistics for transport in and out of the country&lt;/li&gt;\r\n            &lt;li&gt;International Transport&lt;/li&gt;\r\n        &lt;/ul&gt;\r\n\r\n        &lt;div class=&quot;row text-center text-lg-left mt-4&quot;&gt;\r\n            &lt;div class=&quot;col-lg-3 col-md-6 col-sm-6 col-12 mb-4&quot;&gt;\r\n                &lt;img class=&quot;img-fluid img-thumbnail galleryImg&quot; src=&quot;&lt;?php echo APPURL; ?&gt;/public/img/ne_ofrojme1.jpg&quot; alt=&quot;&quot;&gt;\r\n            &lt;/div&gt;\r\n            &lt;div class=&quot;col-lg-3 col-md-6 col-sm-6 col-12 mb-4&quot;&gt;\r\n                &lt;img class=&quot;img-fluid img-thumbnail galleryImg&quot; src=&quot;&lt;?php echo APPURL; ?&gt;/public/img/ne_ofrojme2.jpg&quot; alt=&quot;&quot;&gt;\r\n            &lt;/div&gt;\r\n            &lt;div class=&quot;col-lg-3 col-md-6 col-sm-6 col-12 mb-4&quot;&gt;\r\n                &lt;img class=&quot;img-fluid img-thumbnail galleryImg&quot; src=&quot;&lt;?php echo APPURL; ?&gt;/public/img/ne_ofrojme3.jpg&quot; alt=&quot;&quot;&gt;\r\n            &lt;/div&gt;\r\n            &lt;div class=&quot;col-lg-3 col-md-6 col-sm-6 col-12 mb-4&quot;&gt;\r\n                &lt;img class=&quot;img-fluid img-thumbnail galleryImg&quot; src=&quot;&lt;?php echo APPURL; ?&gt;/public/img/ne_ofrojme4.jpg&quot;  alt=&quot;&quot;&gt;\r\n            &lt;/div&gt;\r\n        &lt;/div&gt;\r\n    &lt;/div&gt;\r\n&lt;/section&gt;\r\n\r\n&lt;!-- Content section3 --&gt;\r\n&lt;section class=&quot;py-5 bg-dark text-white text-left&quot;&gt;\r\n    &lt;div class=&quot;container&quot;&gt;\r\n        &lt;h1 class=&quot;font-weight-bold&quot;&gt;Our partners&lt;/h1&gt;\r\n        &lt;hr class=&quot;mr-5 bg-light&quot;&gt;\r\n        &lt;p class=&quot;font-weight-light&quot;&gt;\r\n            * Halk Insurance, provides vehicles of the Inter-Trans company and provides real value goods to customers &lt;br /&gt;&lt;br /&gt;\r\n            * Motocentar, engages in employee safety as well as customer goods, therefore uses only high quality tires (Michelin). &lt;br /&gt;&lt;br /&gt;\r\n            * Dadi Oil, a fuel supplier, provides the lowest cost of transport and is committed to protecting the environment and the country\'s ecology &lt;br /&gt;&lt;br /&gt;\r\n            * Bibaj Group, supplier of oil, antifreeze and accumulators &lt;br /&gt;&lt;br /&gt;\r\n            * GarageCentar Beqiri, is committed to repairing and repairing vehicles to be safer for our customers &lt;br /&gt;&lt;br /&gt;\r\n            * MegaAuto, auto parts supplier committed to vehicle safety &lt;br /&gt;&lt;br /&gt;\r\n            * AB Novoselski, auto parts supplier committed to vehicle safety &lt;br /&gt;&lt;br /&gt;\r\n            * Neshat Ademi, our loyal partner in the field of marketing\r\n        &lt;/p&gt;\r\n    &lt;/div&gt;\r\n&lt;/section&gt;\r\n\r\n&lt;!-- Content section4 --&gt;\r\n&lt;section class=&quot;py-5 text-center&quot;&gt;\r\n    &lt;div class=&quot;container&quot;&gt;\r\n        &lt;h1 class=&quot;font-weight-bold&quot;&gt;&lt;span class=&quot;black-border&quot;&gt;PHOTO&lt;/span&gt; GALLERY&lt;/h1&gt;\r\n        &lt;hr class=&quot;w-50&quot;&gt;\r\n\r\n        &lt;div class=&quot;row text-center text-lg-left mt-5&quot;&gt;\r\n            &lt;?php\r\n            // Get facebook userPhotos from the API\r\n            // $data = getUserPhotosFromFacebook(12);\r\n\r\n            // Get facebook userPhotos from database\r\n            $data = getGalleryPhotosFromDB(4);\r\n\r\n            // echo &quot;&lt;pre&gt;&quot;;\r\n            // print_r($data);\r\n            // echo date(\'d/m/Y H:i:s\', $data[0][\'created_time\']);\r\n\r\n            for ($i = 0; $i &lt; count($data); $i++) {\r\n                echo \'&lt;div class=&quot;col-lg-3 col-md-6 col-sm-6 col-12 mb-4&quot;&gt;\r\n					&lt;img class=&quot;img-fluid img-thumbnail galleryImg&quot; src=&quot;\' . APPURL . \'/public/img/gallery/\' . $data[$i][\'source\'] . \'&quot; alt=&quot;&quot;&gt;\r\n			&lt;/div&gt;\';\r\n            }\r\n            ?&gt;\r\n        &lt;/div&gt;\r\n\r\n        &lt;a href=&quot;&lt;?php echo APPURL; ?&gt;/gallery&quot; class=&quot;btn btn-danger&quot;&gt;\r\n            &lt;span class=&quot;mehr-button&quot;&gt;EXPLORE ALL...&lt;/span&gt;\r\n        &lt;/a&gt;\r\n    &lt;/div&gt;\r\n&lt;/section&gt;', 'Home Page', 'DE', 1, '2020-04-13 13:43:10'),
(30, 10, 33, 'gallery', '&lt;h1 class=&quot;font-weight-bold&quot;&gt;&lt;span class=&quot;black-border&quot;&gt;PHOTO&lt;/span&gt; GALLERY&lt;/h1&gt;', 'Photo Gallery', 'DE', 1, '2020-04-13 17:15:08'),
(31, 9, 33, 'contact', '&lt;div class=&quot;d-flex bd-highlight mt-4&quot;&gt;\r\n                &lt;h2 class=&quot;font-weight-bold&quot;&gt;ADDRESS&lt;/h2&gt;\r\n            &lt;/div&gt;\r\n            &lt;hr class=&quot;mt-0&quot;&gt;\r\n            &lt;p class=&quot;lead&quot;&gt;\r\n                &lt;span&gt;&lt;i class=&quot;fas fa-map-marker-alt&quot;&gt;&lt;/i&gt;&lt;/span&gt;&lt;br /&gt;\r\n                &lt;span&gt;INTER-TRANS Medi dooel &lt;/span&gt;&lt;br /&gt;\r\n                &lt;span&gt;rruga 101 bb,&lt;/span&gt; &lt;br /&gt;\r\n                &lt;span&gt;1227 Chelopek Brvenica&lt;/span&gt; &lt;br /&gt;\r\n                &lt;iframe frameborder=&quot;0&quot; style=&quot;border:0&quot; src=&quot;https://www.google.com/maps/embed/v1/place?q=place_id:ChIJmYAnPYD5UxMROYp1z8eo790&amp;key=AIzaSyCLyjpFsQaQqlXrWYm7DL_0cBPznxnY0LU&quot; allowfullscreen&gt;&lt;/iframe&gt;&lt;br /&gt;\r\n\r\n                &lt;i class=&quot;fas fa-phone-square-alt&quot;&gt;&lt;/i&gt;&lt;strong class=&quot;pl-1&quot;&gt;Tel: &lt;/strong&gt;&lt;a href=&quot;tel:+38970256213&quot;&gt;+38970256213&lt;/a&gt;&lt;br /&gt;\r\n                &lt;i class=&quot;fas fa-phone-square-alt&quot;&gt;&lt;/i&gt;&lt;strong class=&quot;pl-1&quot;&gt;Tel: &lt;/strong&gt;&lt;a href=&quot;tel:+38970290642&quot;&gt;+38970290642&lt;/a&gt;&lt;br /&gt;\r\n                &lt;i class=&quot;fas fa-envelope&quot;&gt;&lt;/i&gt;&lt;small class=&quot;pl-1&quot;&gt;&lt;strong&gt;E-Mail:&lt;/strong&gt; &lt;a href=&quot;mailto:office@inter-trans.mk&quot;&gt;office@inter-trans.mk&lt;/a&gt;&lt;/small&gt;\r\n            &lt;/p&gt;\r\n            &lt;div class=&quot;d-flex bd-highlight mt-4&quot;&gt;\r\n                &lt;h2 class=&quot;font-weight-bold&quot;&gt;CONTACT US&lt;/h2&gt;\r\n            &lt;/div&gt;', 'Contact Us', 'DE', 1, '2020-04-13 17:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userEmail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userPassword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userRole` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default',
  `userCreatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userName`, `userEmail`, `userPassword`, `userRole`, `userCreatedAt`) VALUES
(1, 'admin', 'office@renova-dl.ch', '$2y$10$g10L023Dt9NbMOcDjttU9OswP0WJibyyfd/nYnl6xIiiHpphjKdRG', 'admin', '2019-12-28 18:58:35'),
(33, 'support', 'support@renova-sarl.ch', '$2y$10$aR7v7r9Jj9.IQl8BseJhje/vkke1wTW.k9Hn7U3/8mvr8SzSj/oFK', 'default', '2019-11-26 20:19:44'),
(43, 'test', 'test@test.com', '$2y$10$aR7v7r9Jj9.IQl8BseJhje/vkke1wTW.k9Hn7U3/8mvr8SzSj/oFK', 'default', '2019-12-03 01:54:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`galleryID`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pageID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `galleryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
