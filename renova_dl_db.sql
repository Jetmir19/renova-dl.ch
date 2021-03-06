-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2020 at 10:11 PM
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
  `userID` int(11) NOT NULL,
  `categoryName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoryDescription` text COLLATE utf8_unicode_ci NOT NULL,
  `categoryDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `userID`, `categoryName`, `categoryDescription`, `categoryDate`) VALUES
(29, 1, 'pages', 'other pages', '2020-11-20 23:09:40'),
(32, 33, 'gallery', 'Gallery with Images, text and description', '2020-11-22 13:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `galleryID` int(11) NOT NULL,
  `subCategoryID` int(11) DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `galleryTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `galleryDescription` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `galleryImage` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `galleryDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`galleryID`, `subCategoryID`, `userID`, `galleryTitle`, `galleryDescription`, `galleryImage`, `galleryDate`) VALUES
(101, 34, 1, 'truck1', '', '13308739_123076661446153_1710020747922376703_o.jpg', '2020-11-18 01:01:50'),
(102, 33, 33, 'truck2', '', '13346999_120690638351422_8817029860360234183_n.jpg', '2020-11-18 01:01:50'),
(103, 34, 43, 'truck3', '', '13442406_144434552643697_1471726405075142745_n.jpg', '2020-11-18 01:01:50'),
(104, 33, 1, 'truck4', '', '13450916_144434625977023_51008956962497837_n.jpg', '2020-11-18 01:01:50'),
(105, 33, 1, 'truck5', '', '15025401_237611846659300_7697294529079215255_o.jpg', '2020-11-18 01:01:50'),
(106, 33, 43, 'truck6', '', '15068272_238445143242637_3169937917681250018_o.jpg', '2020-11-18 01:01:50'),
(107, 34, 1, 'truck7', '', '15135944_240879452999206_4942332296936199582_n.jpg', '2020-11-18 01:01:50'),
(108, 34, 33, 'truck8', '', '15135970_240879486332536_3394037569004148068_n.jpg', '2020-11-18 01:01:50'),
(272, 34, 33, 'test1', '', '5fb7ebe6297a9.jpg', '2020-11-20 17:16:38'),
(273, 34, 1, 'test2', '', '5fb7ec89f3016.jpg', '2020-11-20 17:19:21'),
(279, 33, 1, 'test', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, eligendi, vel animi doloremque quo quas, corrupti recusandae distinctio in non porro! Autem accusantium in sapiente possimus quia distinctio ad blanditiis provident sequi est, quibusdam, incidunt facere voluptas neque? Dolorum ad porro perspiciatis ex, praesentium aut adipisci culpa est error mollitia!', '5fbb29ffc2270.jpg', '2020-11-23 04:18:23'),
(280, 34, 33, 'uuuuu', 'test lorem test ipsum', '5fbb2ce727365.jpg', '2020-11-23 04:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pageID` int(11) NOT NULL,
  `subCategoryID` int(11) DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `pageName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pageContent` text COLLATE utf8_unicode_ci NOT NULL,
  `pageTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pageLanguage` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'FR',
  `pageStatus` int(11) NOT NULL DEFAULT '0',
  `pageDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pageID`, `subCategoryID`, `userID`, `pageName`, `pageContent`, `pageTitle`, `pageLanguage`, `pageStatus`, `pageDate`) VALUES
(1, 35, 1, 'gallery', '...', 'GALERIA E FOTOVE', 'FR', 0, '2019-12-28 19:11:58'),
(8, 35, 33, 'contact', '...', 'Kontakti', 'FR', 0, '2020-01-03 12:19:38'),
(21, 35, 33, 'about', '...', 'Reth Nesh', 'FR', 0, '2020-02-25 21:06:42'),
(22, 35, 1, 'about', '...', 'About Us', 'DE', 0, '2020-04-10 13:04:03'),
(24, 35, 1, 'index', '...', 'INTER-TRANS - Transport Mallrash', 'FR', 0, '2020-04-10 17:32:58'),
(26, 35, 33, 'index', '&lt;!-- Header --&gt;\r\n&lt;header class=&quot;py-5 bg-image-full&quot;&gt;\r\n    &lt;div class=&quot;container h-100&quot;&gt;\r\n        &lt;div class=&quot;row h-100 align-items-center&quot;&gt;\r\n            &lt;div class=&quot;col-12 text-left&quot;&gt;\r\n                &lt;div id=&quot;homeBox&quot;&gt;\r\n                    &lt;h1 class=&quot;home-h1-bold&quot;&gt;Renova Sàrl&lt;/h1&gt;\r\n                    &lt;hr class=&quot;bg-light&quot;&gt;\r\n                    &lt;p class=&quot;home-h3-bold&quot;&gt;Ihr vertrauenswürdiger Partner&lt;/p&gt;\r\n                    &lt;a href=&quot;&lt;?php echo APPURL; ?&gt;/about&quot; class=&quot;btn btn-info mt-5&quot;&gt;\r\n                        &lt;span class=&quot;mehr-button&quot;&gt;Read more &lt;i class=&quot;fas fa-caret-right&quot; style=&quot;vertical-align: middle;&quot;&gt;&lt;/i&gt;\r\n                        &lt;/span&gt;\r\n                    &lt;/a&gt;\r\n                    &lt;!-- &lt;div class=&quot;mt-4&quot;&gt;\r\n                        &lt;a href=&quot;https://www.facebook.com/profile.php?id=100012314591998&quot; target=&quot;_blank&quot;&gt;\r\n                            &lt;img class=&quot;bg-white fb-find-us&quot; src=&quot;&lt;?php echo APPURL; ?&gt;/public/img/facebook.png&quot; width=&quot;150px&quot; alt=&quot;&quot;&gt;\r\n                        &lt;/a&gt;\r\n                    &lt;/div&gt; --&gt;\r\n                &lt;/div&gt;\r\n            &lt;/div&gt;\r\n        &lt;/div&gt;\r\n    &lt;/div&gt;\r\n&lt;/header&gt;\r\n\r\n&lt;!-- Content section1 --&gt;\r\n&lt;section class=&quot;py-5 bg-dark text-white&quot;&gt;\r\n    &lt;div class=&quot;container&quot;&gt;\r\n        &lt;h1 class=&quot;font-weight-bold&quot;&gt;ABOUT US&lt;/h1&gt;\r\n        &lt;hr class=&quot;mr-5 bg-light&quot;&gt;\r\n        &lt;p class=&quot;font-weight-light&quot;&gt;\r\n            Inter-Trans is managed by a professional staff with experience and technical knowledge, as well as a proven and highly qualified logistics service that convince many local and foreign clients and partners. &lt;br /&gt;&lt;br /&gt;\r\n\r\n            At the beginning we started with a means of transport and with a single manager with a clear vision towards development so that we can perform the transport services qualitatively. Today and we have grown into an important and well-known company, which is aware of its responsibility to society and customers. We never question development, on the contrary - it has become a constant of our daily lives. &lt;br /&gt;&lt;br /&gt;\r\n\r\n            We believe that honesty and punctuality are the main pillars of our company that lead us to the goals we set in the beginning when we were founded and that made us today a modern and developed enterprise. &lt;br /&gt;&lt;br /&gt;\r\n\r\n            Our goal is quality customer service and safe transportation of goods, the perfection of this goal is the foundation on which we exist.\r\n        &lt;/p&gt;\r\n        &lt;a href=&quot;&lt;?php echo APPURL; ?&gt;/about&quot; class=&quot;btn btn-info mt-3&quot;&gt;\r\n            &lt;span class=&quot;mehr-button&quot;&gt;Read more &lt;i class=&quot;fas fa-caret-right&quot; style=&quot;vertical-align: middle;&quot;&gt;&lt;/i&gt;&lt;/span&gt;\r\n        &lt;/a&gt;\r\n    &lt;/div&gt;\r\n&lt;/section&gt;\r\n\r\n&lt;!-- Content section2 --&gt;\r\n&lt;section class=&quot;py-5&quot;&gt;\r\n    &lt;div class=&quot;container&quot;&gt;\r\n        &lt;h1 class=&quot;font-weight-bold&quot;&gt;&lt;span class=&quot;black-border&quot;&gt;WE &lt;/span&gt; OFFER&lt;/h1&gt;\r\n        &lt;hr /&gt;\r\n        &lt;p class=&quot;lead&quot;&gt;\r\n            We are responsible for the goods from the point of loading to the last point of discharge. For the transport of goods by road connecting back and forth we offer prices up to 40% cheaper than the competition.\r\n        &lt;/p&gt;\r\n\r\n        &lt;h4&gt;The main services we offer are:&lt;/h4&gt;\r\n        &lt;ul&gt;\r\n            &lt;li&gt;Freight transport within Northern Macedonia&lt;/li&gt;\r\n            &lt;li&gt;Logistics for transport in and out of the country&lt;/li&gt;\r\n            &lt;li&gt;International Transport&lt;/li&gt;\r\n        &lt;/ul&gt;\r\n\r\n        &lt;div class=&quot;row text-center text-lg-left mt-4&quot;&gt;\r\n            &lt;div class=&quot;col-lg-3 col-md-6 col-sm-6 col-12 mb-4&quot;&gt;\r\n                &lt;img class=&quot;img-fluid img-thumbnail galleryImg&quot; src=&quot;&lt;?php echo APPURL; ?&gt;/public/img/ne_ofrojme1.jpg&quot; alt=&quot;&quot;&gt;\r\n            &lt;/div&gt;\r\n            &lt;div class=&quot;col-lg-3 col-md-6 col-sm-6 col-12 mb-4&quot;&gt;\r\n                &lt;img class=&quot;img-fluid img-thumbnail galleryImg&quot; src=&quot;&lt;?php echo APPURL; ?&gt;/public/img/ne_ofrojme2.jpg&quot; alt=&quot;&quot;&gt;\r\n            &lt;/div&gt;\r\n            &lt;div class=&quot;col-lg-3 col-md-6 col-sm-6 col-12 mb-4&quot;&gt;\r\n                &lt;img class=&quot;img-fluid img-thumbnail galleryImg&quot; src=&quot;&lt;?php echo APPURL; ?&gt;/public/img/ne_ofrojme3.jpg&quot; alt=&quot;&quot;&gt;\r\n            &lt;/div&gt;\r\n            &lt;div class=&quot;col-lg-3 col-md-6 col-sm-6 col-12 mb-4&quot;&gt;\r\n                &lt;img class=&quot;img-fluid img-thumbnail galleryImg&quot; src=&quot;&lt;?php echo APPURL; ?&gt;/public/img/ne_ofrojme4.jpg&quot;  alt=&quot;&quot;&gt;\r\n            &lt;/div&gt;\r\n        &lt;/div&gt;\r\n    &lt;/div&gt;\r\n&lt;/section&gt;\r\n\r\n&lt;!-- Content section3 --&gt;\r\n&lt;section class=&quot;py-5 bg-dark text-white text-left&quot;&gt;\r\n    &lt;div class=&quot;container&quot;&gt;\r\n        &lt;h1 class=&quot;font-weight-bold&quot;&gt;Our partners&lt;/h1&gt;\r\n        &lt;hr class=&quot;mr-5 bg-light&quot;&gt;\r\n        &lt;p class=&quot;font-weight-light&quot;&gt;\r\n            * Halk Insurance, provides vehicles of the Inter-Trans company and provides real value goods to customers &lt;br /&gt;&lt;br /&gt;\r\n            * Motocentar, engages in employee safety as well as customer goods, therefore uses only high quality tires (Michelin). &lt;br /&gt;&lt;br /&gt;\r\n            * Dadi Oil, a fuel supplier, provides the lowest cost of transport and is committed to protecting the environment and the country\'s ecology &lt;br /&gt;&lt;br /&gt;\r\n            * Bibaj Group, supplier of oil, antifreeze and accumulators &lt;br /&gt;&lt;br /&gt;\r\n            * GarageCentar Beqiri, is committed to repairing and repairing vehicles to be safer for our customers &lt;br /&gt;&lt;br /&gt;\r\n            * MegaAuto, auto parts supplier committed to vehicle safety &lt;br /&gt;&lt;br /&gt;\r\n            * AB Novoselski, auto parts supplier committed to vehicle safety &lt;br /&gt;&lt;br /&gt;\r\n            * Neshat Ademi, our loyal partner in the field of marketing\r\n        &lt;/p&gt;\r\n    &lt;/div&gt;\r\n&lt;/section&gt;\r\n\r\n&lt;!-- Content section4 --&gt;\r\n&lt;section class=&quot;py-5 text-center&quot;&gt;\r\n    &lt;div class=&quot;container&quot;&gt;\r\n        &lt;h1 class=&quot;font-weight-bold&quot;&gt;&lt;span class=&quot;black-border&quot;&gt;PHOTO&lt;/span&gt; GALLERY&lt;/h1&gt;\r\n        &lt;hr class=&quot;w-50&quot;&gt;\r\n\r\n        &lt;div class=&quot;row text-center text-lg-left mt-5&quot;&gt;\r\n            &lt;?php\r\n            // Get facebook userPhotos from the API\r\n            // $data = getUserPhotosFromFacebook(12);\r\n\r\n            // Get facebook userPhotos from database\r\n            $data = getGalleryPhotosFromDB(4);\r\n\r\n            // echo &quot;&lt;pre&gt;&quot;;\r\n            // print_r($data);\r\n            // echo date(\'d/m/Y H:i:s\', $data[0][\'created_time\']);\r\n\r\n            for ($i = 0; $i &lt; count($data); $i++) {\r\n                echo \'&lt;div class=&quot;col-lg-3 col-md-6 col-sm-6 col-12 mb-4&quot;&gt;\r\n					&lt;img class=&quot;img-fluid img-thumbnail galleryImg&quot; src=&quot;\' . APPURL . \'/public/img/gallery/\' . $data[$i][\'source\'] . \'&quot; alt=&quot;&quot;&gt;\r\n			&lt;/div&gt;\';\r\n            }\r\n            ?&gt;\r\n        &lt;/div&gt;\r\n\r\n        &lt;a href=&quot;&lt;?php echo APPURL; ?&gt;/gallery&quot; class=&quot;btn btn-danger&quot;&gt;\r\n            &lt;span class=&quot;mehr-button&quot;&gt;EXPLORE ALL...&lt;/span&gt;\r\n        &lt;/a&gt;\r\n    &lt;/div&gt;\r\n&lt;/section&gt;', 'Home Page', 'DE', 0, '2020-04-13 13:43:10'),
(30, 35, 33, 'gallery', '....', 'Photo Gallery', 'DE', 0, '2020-04-13 17:15:08'),
(31, 35, 33, 'contact', '...', 'Contact Us', 'DE', 0, '2020-04-13 17:15:46'),
(36, 35, 1, 'projekte', '...', 'Renova DL - Projekte', 'FR', 0, '2020-11-20 23:09:21'),
(37, 35, 1, 'projekte', '...', 'Renova DL - Projekte', 'DE', 0, '2020-11-20 23:10:32'),
(40, 35, 1, 'test', 'test', 'test', 'DE', 0, '2020-11-25 12:49:26');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `subCategoryID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `subCategoryName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subCategoryDescription` text COLLATE utf8_unicode_ci NOT NULL,
  `subCategoryDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`subCategoryID`, `categoryID`, `userID`, `subCategoryName`, `subCategoryDescription`, `subCategoryDate`) VALUES
(33, 32, 1, 'projekte', 'Pages Title, Image and Description', '2020-11-22 22:05:38'),
(34, 32, 1, 'Photo Album', 'desc test', '2020-11-23 04:30:17'),
(35, 29, 1, 'user pages', 'Pages to display in front End', '2020-11-23 04:45:07');

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
(33, 'support', 'support@renova-dl.ch', '$2y$10$aR7v7r9Jj9.IQl8BseJhje/vkke1wTW.k9Hn7U3/8mvr8SzSj/oFK', 'default', '2019-11-26 20:19:44'),
(43, 'test', 'test@test.com', '$2y$10$adoBi2Qk/BpAkaFyZboqHOxL.dk0sX942Jk9fJo27vmZuQfrnIYTK', 'default', '2019-12-03 01:54:32');

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
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`subCategoryID`),
  ADD KEY `categoryID` (`categoryID`);

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
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `galleryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `subCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `categoryID` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
