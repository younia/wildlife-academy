-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.myweborchard.com
-- Generation Time: May 01, 2013 at 09:57 AM
-- Server version: 5.1.39
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `newc_academy`
--
CREATE DATABASE `newc_academy` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `newc_academy`;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(10) unsigned NOT NULL,
  `value` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `value`) VALUES
(26, 10, 'answer 1'),
(27, 11, 'answer'),
(43, 18, 'bdghnhn'),
(44, 18, 'rbdgtngfhjm'),
(45, 18, 'rbtdthnfg m'),
(46, 19, 'etbhrthyndthyujn'),
(47, 19, 'setbhreynjthdum'),
(48, 19, 'etgbhdthnjdhtm'),
(59, 25, 'syrjstykmutk'),
(60, 25, 'setjtyjktusk'),
(61, 25, 'aethatykyu,liy'),
(62, 26, 'ethstukmrf]il'),
(63, 27, 'ukygu'),
(64, 27, 'yukygik'),
(65, 28, 'yjdty'),
(72, 34, 'a. Invertebrates and vertebrates'),
(73, 34, 'b. Birds and mammals'),
(74, 34, 'c. Fishes and mammals'),
(75, 34, 'd. Carnivores and herbivores'),
(76, 35, 'a. Food digests much faster'),
(77, 35, 'b. It frees the animal from a need for steady food intake'),
(78, 35, 'c. The animal can go to any environment or habitat and still stay comfortable'),
(79, 35, 'd.  Predators can detect them readily'),
(80, 36, 'a. Needs a constant supply of oxygen'),
(81, 36, 'b. Needs no oxygen to fuel itself'),
(82, 36, 'c. Is located on predators only'),
(83, 36, 'd. Is located on prey species only'),
(84, 37, 'a. Are biologically paired, you can’t have one without the other'),
(85, 37, 'b. Can occur separately, some warm-blooded animals have both fast twitch and slow twitch muscle in their bodies'),
(86, 37, 'c. Are phenomena that never occur together'),
(87, 37, 'd. Are traits that disprove evolution'),
(88, 38, 'a. Comes in several forms, some are behavioral, some are biochemical'),
(89, 38, 'b. Allows cold-blooded animals to occur in varying habitats all around the world'),
(90, 38, 'c. Is always a chemical process that is dictated by the pituitary'),
(91, 38, 'd. Frees warm-blooded animals from a constant need for seeking food'),
(96, 41, 'yjfuyj'),
(97, 42, 'dbzfgn'),
(98, 43, 'fxnmgh'),
(99, 44, 'fgjf'),
(100, 45, 'gnfg');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `course_name` varchar(125) NOT NULL,
  `course_description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_description`) VALUES
(1, 'Field Natural History Course', 'This is a course that instructs participants how to investigate and interpret a series of habitats and their distinctive features. 10 Units'),
(2, 'Comparative Anatomy & Physiology', 'This course looks at how various animal types are put together, concentrating on the commonalities and differences of taxonomic groups. 10 units'),
(7, 'Wildlife Rehabilitation Course   ', 'This course demonstrates and teaches participants the basic skill and knowledge sets to care for common wildlife species. 7 units'),
(11, 'Raccoons', 'This 5 session course looks at the specific biology of one of the most common and beloved wildlife species of North America.'),
(12, 'Principles of Sustainability', 'This course looks at the overall principles of living in a sustainable world with a view towards understanding the politics, demographics and economies in a climate-changing world.  10 units  '),
(13, 'Descriptions of Local Natural Areas for Teachers', 'This 10 session course will look at a variety of parks, schoolyards, neighborhoods and facilities that will aid teachers in educating their students about nature, biology and habitats.  Individual sessions are in the planning sessions but will include teaching aids and techniques for sites like the New England Wildlife Center, Malibu Beach , Blue Hills, Great Esker Park, etc.');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE IF NOT EXISTS `lessons` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(8) NOT NULL,
  `lesson_content` longtext NOT NULL,
  `lesson_description` text NOT NULL,
  `lesson_name` varchar(125) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `course_id`, `lesson_content`, `lesson_description`, `lesson_name`) VALUES
(1, 1, 'Coming soon!', 'Local Habitats of interest – upland woodland, fields, meadows, estuaries, lowland swamps, ponds and streams\r\n', 'Session #1'),
(18, 1, 'Coming soon!', 'How to identify New England trees and shrubs, lore and natural history\r\n', 'Session #2'),
(19, 1, 'Coming soon!', 'How to identify wildflowers, lore and natural history\r\n', 'Session #3'),
(26, 1, 'Coming soon!', 'Macro invertebrates from various habitat types – aquatic, marine, estuarine, terrestrial\r\n', 'Session #4'),
(27, 1, 'Coming soon!', 'Insects and spiders\r\n', 'Session #5'),
(28, 1, 'Coming soon!', 'Marine and estuary invertebrates\r\n', 'Session #6'),
(29, 1, 'New Lesson Content ', 'Wildlife species and webs\r\n', 'Session #7'),
(30, 1, 'New Lesson Content', 'Geology of local area glacial, fluvial, sloeline, bedrock, and puddingstone histories\r\n', 'Session #8'),
(31, 1, 'New Lesson Content ', 'Putting it all together. How to read the landscape.\r\n', 'Session #9'),
(32, 1, 'New Lesson Content ', 'Understanding signs of health and disease in habitats.\r\n', 'Session #10'),
(37, 2, 'New Lesson Content ', 'The cell – organelles!  Mitochondria, golgi apparatus,  the membrane, endoplasmic reticulum, etc.\r\n', 'Session #1'),
(38, 2, 'New Lesson Content ', 'How cells go together. Tissue types: nervous, muscle, connective and epidermis\r\n', 'Session #2'),
(39, 2, 'New Lesson Content ', 'Organs and organ systems\r\n', 'Session #3'),
(40, 2, '<h4>Cold-blooded and warm-blooded</h4>\r\n<p>Animals have two basic strategies for coping with the temperature changes on earth.  The first to evolve was cold-bloodedness, the second was warm bloodedness.  Both have advantages and disadvantages in how and where an animal survives. The term bloodedness is confusing.  The temperature of a body influences all of the body and all of its tissues, not just the blood. So every cell in a body needs to stay within particular temperature ranges in order for each cell to do its individual action most efficiently.</p>\r\n  <p>Cold-blooded is a term that refers to the act of thermoregulation by its placement in the environment.   An individual animal may choose where it sits or lives or it may be chosen for it by the acts of other organisms.  For instance a tent caterpillar moth may not have the choice of where it lives; this having been chosen by its mother when she laid her eggs.  The caterpillar after hatching may choose to sit on the warm side of the tree or the cool side of the tree, depending on what other biological forces are driving it.</p>\r\n	<p>A turtle will come out of a burrow and sit directly in the sun in order to warm its body. It probably does this because it feels good to bask.  That behavior has important biological outcomes.  Growth, metabolism and reproduction are all driven in part by the warmth the animal achieves by sitting where it feels good.  When internal temperatures rise too far the turtle may walk to the shade or even submerge in water.  Thermoregulation in a cold-blooded animal is an act of behavior. It requires energy and resources at particular decision points when the animal decides to thermoregulate by changing position in the environment.</p>\r\n	<p>Warm-blooded is devoid of behavioral decision making on the part of the animal.  It is true that a warm-blooded animal may mimic and derive benefit by positioning itself in the environment but the primary mechanism for thermoregulation is a biochemical and ultimately a physiological one. </p>\r\n 	<p>It requires a steady flow of energy to maintain a constant temperature.  As a result warm blooded animals have a constant requirement for taking in food supplies, whereas cold-blooded animals are freed from eating except when they are active.  Although warm-blooded animals are required to maintain a steady intake of food, they are relatively free to go in search of that food in places where temperatures may become extreme.</p>\r\n\r\n<h4>Fast twitch and slow twitch muscle</h4>\r\n        <p>The unit of fuel within the individual cell of the body is a substance called ATP (adenotriphosphate).  There are two major ways to convert raw resource into ATP.  One way requires a large, steady supply of oxygen (this is why we have lungs and breathe). The other way does not.  The muscles of the body that require oxygen for the development of ATP are called slow twitch muscle (or red muscle); the muscles that require little oxygen are fast twitch muscle (or white muscle.)</p>\r\n	<p>Fish, amphibians, and many reptiles have a large proportion of fast twitch (white) muscle.  They require little oxygen for movement and function.  Birds and mammals are built of mostly aerobic (oxygen requiring) muscle.  Slow twitch muscle requires a steady flow of oxygen (constant breathing). Fast twitch muscle performs much faster than slow twitch muscle. For instance a rattlesnake can strike much faster than you can move your leg away. Rattlesnakes are comprised of mostly fast twitch, low oxygen requiring muscle.  Humans are mostly comprised of slow twitch, oxygen requiring muscle.  But these phenomena are not exclusive to one group of vertebrates or another.</p>\r\n	<p>Lots of animals have some proportion of both slow twitch and fast twitch in their bodies.  For instance a chicken has fast twitch muscle in its breast, hence the white meat because fewer blood vessels carrying oxygen to the muscle is required.  The legs, the dark meat, are slow twitch aerobic muscle with a high proportion of blood vessels.  Chickens walk around a lot, and fly with only a fast burst of wing flapping when they are trying to get away from a predator.</p>\r\n<h4>Links</h4>\r\n<a href="http://en.wikipedia.org/wiki/Warm-blooded" target="_blank">Wikipedia Warm-blooded</a>\r\n<p>Wikipedia and Cool Cosmos out of Caltech both have articles that accurately explore the concepts of warm- and cold-bloodedness.  Search Google under Warm-blooded.</p>\r\n<p>Fast-twitch and slow-twitch muscles are explained further in an article in Wikipedia about Muscle.</p>\r\n', 'Cold blooded vs. warm blooded. Fast twitch vs. slow twitch.\r\n', 'Session #4'),
(41, 2, 'New Lesson Content ', 'Reptile bodies, turtle construct, snakes, lizards\r\n', 'Session #5'),
(42, 2, 'New Lesson Content ', 'Bird bodies, wings, feathers, air sacs, and hollow bores\r\n', 'Session #6'),
(43, 2, 'New Lesson Content ', 'Mammals  warm blooded - furry and amniotic\r\n', 'Session #7'),
(44, 2, 'New Lesson Content ', 'Blood comparison – nucleated RBC’s vs. non-nucleated. White blood cells from clam to dog.\r\n', 'Session #8'),
(45, 2, 'New Lesson Content ', 'Medical procedure differences – how to get blood from a snake, a dog and a porcupine.\r\n', 'Session #9'),
(46, 2, 'New Lesson Content ', 'Medical therapy differences: e.g. what drugs can you use on a turtle vs. a conure. ', 'Session #10'),
(47, 0, 'New Lesson Content ', 'New Lesson Description', 'New Lesson Name ');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quiz_id` int(10) unsigned NOT NULL,
  `question` longtext NOT NULL,
  `correct` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `question`, `correct`) VALUES
(18, 18, 'fgbdghnfhj', 43),
(19, 18, 'rsbndthnyhjm yjm', 46),
(25, 21, 'yjdtykmdutk,d', 59),
(26, 21, 'rynjstumkdyu,kidj,ld', 62),
(27, 23, 'ujyuk', 63),
(28, 24, 'fghtyj', 65),
(34, 29, 'There are two major groups of animals that are warm-blooded.  What are they?', 73),
(35, 29, '2. The advantage of being cold-blooded is that:', 77),
(36, 29, '3. Fast-twitch muscle ', 81),
(37, 29, '4. Cold-blooded and slow twitch muscle', 85),
(38, 29, '5. Thermoregulation', 88),
(41, 32, 'fghfjyuk', 96),
(42, 34, 'fbzdgb', 97),
(43, 35, 'fchftyj', 98),
(44, 36, 'ytjty', 99),
(45, 37, 'fbhfxg', 100);

-- --------------------------------------------------------

--
-- Table structure for table `quizes`
--

CREATE TABLE IF NOT EXISTS `quizes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quiz_name` varchar(150) NOT NULL,
  `lesson_id` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `quizes`
--

INSERT INTO `quizes` (`id`, `quiz_name`, `lesson_id`) VALUES
(18, 'jkrgbsrbynb', 21),
(21, 'New Quirthtyjtukdukz Name', 25),
(23, 'New Quiz Name', 33),
(24, 'New Quiz Name', 34),
(25, 'New Quiz Name', 35),
(26, 'New Quiz Name', 36),
(29, 'Session #4 Quiz', 40),
(32, 'Quiz 3', 19),
(33, 'Quiz 4', 26),
(34, 'Quiz', 1),
(35, 'Quiz', 18),
(36, 'quiz 5', 27),
(37, 'Quiz 6', 28);

 
