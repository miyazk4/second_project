-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 13-Out-2019 às 23:47
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sabrinacarpenter`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`category_id`, `parent_id`, `name`) VALUES
(1, 0, 'Apparel'),
(2, 0, 'Accessories'),
(3, 0, 'Music'),
(4, 0, 'Shop All');

-- --------------------------------------------------------

--
-- Estrutura da tabela `countries`
--

CREATE TABLE `countries` (
  `country_id` int(10) UNSIGNED NOT NULL,
  `country_code` varchar(2) NOT NULL,
  `country` varchar(32) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `countries`
--

INSERT INTO `countries` (`country_id`, `country_code`, `country`, `priority`) VALUES
(1, 'US', 'United States', 1),
(2, 'PT', 'Portugal', 0),
(3, 'ES', 'Spain', 0),
(4, 'IT', 'Italy', 0),
(5, 'BR', 'Brazil', 0),
(6, 'AU', 'Australia', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `discography`
--

CREATE TABLE `discography` (
  `discography_id` int(10) UNSIGNED NOT NULL,
  `release_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(32) DEFAULT NULL,
  `production` varchar(200) DEFAULT NULL,
  `engineer` varchar(50) DEFAULT NULL,
  `label` varchar(32) DEFAULT NULL,
  `recorded_at` varchar(64) DEFAULT NULL,
  `image` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `discography`
--

INSERT INTO `discography` (`discography_id`, `release_date`, `name`, `production`, `engineer`, `label`, `recorded_at`, `image`) VALUES
(1, '2018-11-09 00:00:00', 'Singular - Act I', 'Various', NULL, 'Hollywood Records', 'The Stellar House, Borgen Studios, Chumba Meadows, Studio Nation', 'singularact1.jpg'),
(2, '2018-06-06 13:56:33', 'Almost Love', NULL, NULL, 'Hollywood Records', NULL, 'almostlove.jpg'),
(3, '2018-03-16 14:56:26', 'Alien', 'Jonas Blue', NULL, 'Hollywood Records', NULL, 'alien.jpg'),
(4, '2019-09-13 13:56:28', 'Evolution', 'Ido Zmishlany, Steve Mac, Jimmy Robbins, Halatrax, Ryan Ogren, Rob Persaud, DJ Daylight, Nonfiction', 'Various', 'Hollywood Records', NULL, 'evolution.jpg'),
(5, '2015-04-14 13:56:30', 'Eyes Wide Open', 'Dan Book, Brian Malouf, Jim McGorman, Robb Vallier, Steven Solomon, Captain Cuts, Matthew Tishler, Jon Ingoldsby, Jon Levine, Jordan Higgins, Scott Harris*, Steve Tippeconnic, Julie Frost', 'Various', 'Hollywood Records', NULL, 'eyeswideopen.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `membership`
--

CREATE TABLE `membership` (
  `membership_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(128) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `perks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `membership`
--

INSERT INTO `membership` (`membership_id`, `image`, `price`, `perks`) VALUES
(1, 'SCA-2018_Free_membership-5x3.jpg', '0.00', '<li>Subscription to the official Sabrina Carpenter e-Newsletter</li><li>Access to select promotions & special offers</li>'),
(2, 'SCA-2018_Standard_package-5x3.jpg', '25.00', '<li>Access to exclusive preferred ticket presales (8-ticket limit per membership)</li>     <li>Exclusive 2-pin set, inspired by \"Almost Love\" (please allow 4-6 wks for delivery)</li><li>Subscription to the Sabrina Carpenter Fan Club newsletter</li><li>Ongoing 10% discount in the official Sabrina Carpenter Online Store</li><li>Members-only offers & giveaways</li>'),
(3, 'SCA-2018_Premium_package-5x3.jpg', '45.00', '<li>Access to exclusive preferred ticket presales (8-ticket limit per membership)</li>\r\n<li>Exclusive 2-Pin Set, inspired by \"Almost Love\"</li>\r\n<li>\"SABRINA - FAN CLUB 2018\" Member t-shirt (unisex, adult size)</li>\r\n<li>Subscription to the Sabrina Carpenter Fan Club newsletter</li>\r\n<li>Ongoing 10% discount in the official Sabrina Carpenter Online Store\r\n</li>\r\n<li>Members-only offers & giveaways</li>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `news`
--

CREATE TABLE `news` (
  `news_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(200) NOT NULL,
  `news_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `detail` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `news`
--

INSERT INTO `news` (`news_id`, `image`, `news_date`, `title`, `description`, `detail`) VALUES
(1, 'kellynryan2017.jpg', '2017-06-14 23:00:00', 'Watch Sabrina On Kelly & Ryan', 'Check out Sabrina\'s performance of her new hit, \"Why,\" on Live With Kelly & Ryan!', '<p>If you haven\'t had the opportunity, now\'s your chance to check out Sabrina\'s live performance of her new single, \"Why\" on <a href=\"https://kellyandryan.com/video/sabrina-carpenter-why/\">Live With Kelly & Ryan.</a></p><div class=videoContainer>\r\n	<iframe src=\"https://www.youtube.com/embed/vyesfq8EO2k\" width=\"560\" height=\"315\" sandbox=\"allow-scripts allow-same-origin\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n</div>\r\n'),
(2, 'whyvideo.jpg', '2017-07-18 23:00:00', 'Official \"Why\" Music Video - Watch Now!', 'We\'re excited to present Sabrina\'s official music video for her latest hit, \"Why.\"', '<p>The official music video for \"Why\" just came out. Directed by Jay Martin and featuring Sabrina and co-star Casey Cott, it\'s available for your viewing pleasure. Enjoy!</p><div class=videoContainer>\r\n	<iframe src=\"https://www.youtube.com/embed/4qeaBFFq3to\" width=\"560\" height=\"315\" sandbox=\"allow-scripts allow-same-origin\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n</div>'),
(3, 'newconcertsoctober2017.jpg', '2017-08-01 23:00:00', 'New Concerts Announced For October', 'Fans in the Texas and South Carolina areas, get your tickets for new shows in October.', '\r\n\r\n<p>Sabrina has announced two new shows for October! On October 21, she will headline the 6th annual Brazos Valley Fair & Rodeo in Bryan, Texas. On October 22, Sabrina will be featured on the Pepsi Grandstand at the South Carolina State Fair in Columbia. If you are in the area, be sure to you get your tickets!</p>\r\n\r\n<p>Visit the TOUR page for links to the ticketing windows.</p>\r\n'),
(4, 'whybehindscenes.jpg', '2017-09-04 23:00:00', 'Behind The Scenes: \"Why\" Video Shoot', 'Watch an inside look at the making of Sabrina\'s \"Why\" video.', '<p>This special behind-the-scenes segement captures the making of Sabrina\'s \"Why\" video. You\'ll see commentary from director Jay Martin, co-star Casey Cott, and Sabrina about the concept behind the video.</p>\r\n<div class=videoContainer>\r\n	<iframe src=\"https://www.youtube.com/embed/Mu3swxc-2LI\"\" width=\"560\" height=\"315\" sandbox=\"allow-scripts allow-same-origin\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n</div>'),
(5, 'japantour2018.jpg', '2017-11-28 00:00:00', 'Sabrina announces Japan Tour for February 2018', 'Sabrina is making her long-awaited return to Japan this coming February. The Sabrina Carpenter Fan Club presale will begin December 6!', '<p>I am coming back to Japan for three concerts in Osaka, Nagoya and Tokyo in February 2018!</p>\r\n \r\n\r\n<p><strong>Official Sabrina Carpenter Fan Club members will have early access to concert tickets in our exclusive member presale, scheduled for Wednesday, December 6, from 10am to 11:59pm JST.</strong> If you are not yet a member, JOIN NOW so you can secure preferred concert tickets!</p><div class=btnContainer>\r\n	<a href=\"https://www.sabrinacarpenter.com/tour\" class=\"downloadLink\">View tour dates</a>\r\n</div>'),
(6, 'japanlastcall.jpg', '2018-01-09 00:00:00', 'Last-call Presale for Japan 2018 Tour', 'Are you still looking to secure preferred tickets for Sabrina\'s Japan tour in February? You\'re in luck because we have scheduled a last-call presale on Thursday, January 11!', '<p>To our Sabrina fans in Japan! If you have not yet secured your tickets for Sabrina’s upcoming concerts in Japan, or if you have friends who are looking to get tickets early before the public on-sales, be sure to join the Sabrina Carpenter Fan Club so you can access our <strong>Last-call Fan Club Presale on Thursday, January 11, 10:00 - 23:59 JST!</strong></p><div class=\"presaleContainer\">\r\n\r\n	<h3 class=\"presaleTitle\">Helpful info - Please read:</h3>\r\n\r\n	<ul class=\"presaleList\">\r\n\r\n		<li>You must be registered on the e+ (<a href=\"https://eplus.jp/\">eplus.jp</a>) website in order to purchase tickets. For details, <a href=\"https://member.eplus.jp/register-member\">CLICK HERE</a>. If you do not yet have an e+ account, we highly recommend that you register in advance so you will be ready once our presale begins on January 11 @ 10:00 JST.</li>\r\n\r\n    		<li>When our presale begins, visit the <a href=\"www.sabrinacarpenter.com/tour\">TOUR</a> page, and you will see the special fan club code displayed above the BUY TICKETS link.</li>\r\n\r\n    		<li>Each member may purchase up to 8 tickets with our fan club code.</li>\r\n\r\n    		<li>Credit card payment only.</li>\r\n\r\n    		<li>Our Last-call Presale will end on January 11 @ 23:59 JST</ço>\r\n\r\n	</ul>\r\n\r\n</div><div class=btnContainer>\r\n	<a href=\"https://www.sabrinacarpenter.com/subscribe\" class=\"downloadLink\">Join now for access\"</a>\r\n</div>\r\n'),
(7, 'aliendownload.jpg', '2018-03-16 00:00:00', 'Download \"Alien\" Now', '\"Alien\" is available now! Watch the vertical video on Spotify, stream it on your fave music service, or download it to your music collection.', '<p><strong>\"Alien,\" Sabrina\'s brand new single with Jonas Blue, is out now.</strong> You have a few ways to enjoy this new track: watch the special vertical video on Spotify, stream it on your favorite music service or download it so you can play it non-stop!</p>\r\n\r\n<div class=btnContainer>\r\n\r\n	<a href=\"https://www.youtube.com/watch?v=4ughEPQGd8w\" class=\"downloadLink\">Watch \"Alien\"</a>\r\n\r\n</div><div class=btnContainer>\r\n	<a href=\"https://sabrinajonas.lnk.to/Alien\" class=\"downloadLink\">Listen to \"Alien\"</a>\r\n</div>'),
(8, 'alienvideo.jpg', '2018-03-28 23:00:00', 'Watch the official \"Alien\" Music Video', 'Watch the \"Alien\" official music video now!', '<p>The \"Alien\" official music video is available for viewing on your favorite music channels!</p>\r\n\r\n<div class=btnContainer>\r\n\r\n	<a href=\"https://apple.co/AlienVid\" class=\"downloadLink\">Watch on Apple Music</a>\r\n\r\n</div><div class=btnContainer>\r\n	<a href=\"https://www.youtube.com/watch?v=4ughEPQGd8w&feature=youtu.be\" class=\"downloadLink\">Watch on Youtube</a>\r\n</div>'),
(9, 'alienmerch.jpg', '2018-03-29 23:00:00', '\"Alien\" Merch Has Arrived', 'Shop the Sabrina Online Store for brand new \"Alien\" apparel and accessories.', '<p>\"Alien\" styles have just arrived in the Sabrina Online Store! Shop the new selection of apparel and accessories for the perfect items to update your wardrobe collection.</p>\r\n<div class=btnContainer>\r\n	<a href=\"https://shop.sabrinacarpenter.com/\" class=\"downloadLink\">Shop now</a>\r\n</div>'),
(10, 'alienverticalvideo.jpg', '2018-04-10 23:00:00', 'New \"Alien\" Vertical Video - Watch Now', 'Watch Sabrina\'s new \"Alien\" vertical video on YouTube.', '<p>Enjoy the new \"Alien\" vertical video from Sabrina!</p>\r\n\r\n\r\n\r\n<div class=videoContainer>\r\n\r\n	<iframe src=\"https://www.youtube.com/embed/p9J2lrgxSoE\" width=\"560\" height=\"315\" sandbox=\"allow-scripts allow-same-origin\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n\r\n</div>'),
(11, 'billboardhot100.jpg', '2018-04-11 23:00:00', 'Sabrina to appear at Billboard Hot 100 Music Festival', 'Don\'t miss Sabrina at the 2018 Billboard Hot 100 Music Festival, this August at Jones Beach Theater, in Long Island, NY!', '<p>Sabrina will be performing at this year\'s <strong>Billboard Hot 100 Music Festival</strong>, this August at Jones Beach Theater, in Long Island, New York. The two-day festival, running August 18 & 19, also will feature DJ Snake, Future, and Rae Sremmurd, among other music hitmakers. Sabrina\'s set will take place on Auguest 19.</p>\r\n\r\n<p>2-Day Passes go on sale to the general public on Friday, April 13 @ 10am ET at Ticketmaster.</p>\r\n<div class=btnContainer>\r\n	<a href=\"https://www1.ticketmaster.com/event/1D0054859C9A3338\" class=\"downloadLink\">Ticket info</a>\r\n</div>\r\n\r\n<div class=\"billboardImg\">\r\n		<img src=\"../images/newsImages/sca-bbd_hot100_fest-1134x783.jpg\" alt=\"Billboard music festival\">\r\n</div>'),
(12, 'wangotango.jpg', '2018-05-10 23:00:00', 'Sabrina appearing at KIIS FM Wango Tango, June 2nd', 'Sabrina will perform at KIIS FM Wango Tango on June 2 in Los Angeles. Get your tickets now!', '<p>Guys!! Excited to finally start announcing everything!! I will be performing on the 102.7 KIIS-FM Wango Tango stage and li\'l six-year-old Sabrina is very happy today. Thank you for always being there for her. <strong>I love u so much.</strong> I’ll see u there!</p>\r\n<div class=altImage>\r\n	<a href=\"https://www.axs.com/artists/121306/iheartradio-kiis-fm-wango-tango-tickets\">\r\n		<img src=\"../images/newsImages/wango_tango_jun02-get_tix-3x176.gif\" alt=\"Get Wango Tango Tickets\">\r\n	</a>\r\n</div>'),
(13, 'almostlovenewsingle.jpg', '2018-05-12 23:00:00', 'New single, \"Almost Love,\" available 6/6', 'Sabrina\'s new single, \"Almost Love,\" is available for streaming and download!', '<p>Sabrina\'s new single, \"Almost Love,\" is available now for streaming and download!</p>\r\n<div class=btnContainer>\r\n	<a href=\"http://hollywoodrecs.co/almostlove\" class=\"downloadLink\">Listen & download</a>\r\n</div>'),
(14, 'grammymuseum.jpg', '2018-06-05 23:00:00', 'Sabrina Performing At Grammy Museum, 7/9', 'See an intimate peformance by Sabrina at the Grammy Museum on July 9 in L.A. AMEX presale 6/7, public on-sale 7/14.', '<p>Sabrina Carpenter will appear at the Grammy Museum\'s Clive Davis Theater on July 19 in L.A., for an intimate performance and conversation with Grammy Museum Executive Director Scott Goldman.</p>\r\n\r\n<p>American Express will host a cardholder presale from Thursday, June 7 at 10:30 AM PT thru Thursday, June 14 at 11:00 AM. PT</p>\r\n\r\n<p>Tickets go on sale to the general public on Thursday, June 14 @ 12-noon PT.</p>\r\n<div class=btnContainer>\r\n	<a href=\"https://www.grammymuseum.org/events/detail/sabrina-carpenter\" class=\"downloadLink\">More info</a>\r\n</div>\r\n'),
(15, 'almostlovemerch.jpg', '2018-06-13 23:00:00', 'New \"Almost Love\" Merchandise', 'Shop the line of exclusive \"Almost Love\" merch, inspired by Sabrina\'s latest hit song. ', '<p>Check out new \"Almost Love\" merchandise, just added to the Sabrina Carpenter Online Store. Select from two new t-shirt designs, plus a hoodie featuring the single\'s covert art. Add these to your summer collection!</p>\r\n<div class=btnContainer>\r\n	<a href=\"https://shop.sabrinacarpenter.com/\" class=\"downloadLink\">Shop now</a>\r\n</div>\r\n<p><strong>Sabrina Fan Club members:</strong> Login to the site first, then click the SHOP button to activate your 10% discount on these exclusive designs. Not yet a member? Get more details now!</p>'),
(16, 'almostlovevideo.jpg', '2018-07-11 23:00:00', '\"Almost Love\" Official Music Video', 'Watch the official video for Sabrina\'s latest hit single. ', '<p>The official music video for \"Almost Love\" is streaming now. Watch and find out why MTV is obsessed with Sabrina\'s new hit single.</p>\r\n<div class=btnContainer>\r\n	<a href=\"https://www.youtube.com/watch?v=JudqK1hL18w&feature=youtu.be\" class=\"downloadLink\">Watch \"Almost Love\"</a>\r\n</div>'),
(17, 'almostloverehab.jpg', '2018-07-11 23:01:00', '\"Almost Love\" R3Hab Remix - Get it!', '\"Almost Love\" gets the R3hab treatment. Download it now!', '<p>Just in time for the weekend — and for the summer — R3hab has dropped his \"Almost Love\" remix! Download Sabrina\'s latest jam and get ready to bop.</p>\r\n<div class=btnContainer>\r\n	<a href=\"http://hollywoodrecs.co/AlmostLoveR3HAB\" class=\"downloadLink\">Get \"Almost Love\" R3HAB Remix</a>\r\n</div>\r\n'),
(18, 'jingleballtour.jpg', '2018-10-11 23:02:00', 'Sabrina performing on 2018 Jingle Ball Tour', 'Don\'t miss Sabrina on the <strong>2018 Jingle Ball Tour Presented By Capital One</strong> this holiday season!', '<p>The <strong>2018 iHeartRadio Jingle Ball Tour Presented by Capital One</strong> is back! This December, Sabrina Carpenter, along with fellow music stars will be making stops across the country to celebrate the holiday season with all of their fans.</p>\r\n\r\n<p>Get ready — tickets go on sale to the general public on Monday, October 15 @ 12-noon local time! Set your plans and get your tickets to see Sabrina in concert this holiday season.</p>\r\n<div class=btnContainer>\r\n	<a href=\"https://www.sabrinacarpenter.com/tour\" class=\"downloadLink\">See tour dates</a>\r\n</div>'),
(19, 'singularact1.jpg', '2018-11-09 00:00:00', 'SINGULAR - ACT I Available Now!', 'Sabrina\'s new album, <strong>Singular - Act I</strong>, is available now for download and streaming!', '<p>Sabrina\'s third studio album, <a href=\"http://hollywoodrecs.co/SingularAct\">Singular - Act I</a>, is officially released and available for download and streaming! The album contains hits you know and love, like \"Almost Love,\" \"Paris\" and \"Bad Time,\" along with other new tracks that you\'ll be adding to your playlist immediately.</p>\r\n<div class=btnContainer>\r\n	<a href=\" https://hollywoodrecs.co/SingularAct\" class=\"downloadLink\">Download now</a>\r\n</div>\r\n<p>And remember to visit the <strong>Singular Store</strong>, featuring Singular-inspired apparel and accessories. Each purchase comes with a download of Singular - Act I, plus access to ticket presales for a headline tour. Shop now, the limited edition merch goes away after November 16th!</p>\r\n<div class=btnContainer>\r\n	<a href=\"https://shop.sabrinacarpenter.com/\" class=\"downloadLink\">Shop now</a>\r\n</div>'),
(20, 'suemevideo.jpg', '2018-11-19 00:00:00', 'Watch Sabrina\'s music video for \'Sue Me\'', 'The official music video for Sabrina\'s new hit, \'Sue Me,\' is out. Watch it now!', '<p>Sabrina\'s released the official music video for her second hit off of Singular - Act I, her latest studio album!</p>\r\n\r\n<p>The video, directed by Lauren Dunn, playfully communicates the song\'s message of empowerment. Says Sabrina, \"it\'s confidence, it\'s being comfortable with yourself regardless of what anybody thinks.\" Also featured in the video is fellow actor, Joey King.</p>\r\n<div class=\"videoContainer\">\r\n	<iframe src=\"https://www.youtube.com/embed/7w4Udbys4O4\" width=\"560\" height=\"315\" sandbox=\"allow-scripts allow-same-origin\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n</div>\r\n'),
(21, 'parisvideo.jpg', '2018-12-20 00:00:00', 'Watch Sabrina\'s \"Paris Video\"', 'Here\'s Sabrina\'s official music video for her single, \"Paris\" - enjoy!', '<p>\r\n\r\n	my holiday gift to u\r\n\r\n	<br>\r\n\r\n	i\'m taking u guys to paris,\r\n\r\n	<br>\r\n\r\n	all expenses paid.\r\n\r\n</p>\r\n\r\n<div class=\"videoContainer\">\r\n\r\n	<iframe src=\"https://www.youtube.com/embed/COt5MibFxMs\" width=\"560\" height=\"315\" sandbox=\"allow-scripts allow-same-origin\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n\r\n</div>\r\n\r\n'),
(22, 'singulartourasia2.jpg', '2018-12-20 00:00:01', 'Sabrina announces 2019 Asia Tour', 'The Singular Tour is officially coming in 2019. Check out the dates, and get details on ticket presales for Japan!', '<p><strong>The Singular Tour is officially coming in 2019. Asia, you\'re first!</strong></p>\r\n\r\n\r\n\r\n<p>Sabrina Carpenter fan club members will have early access to preferred tickets for the shows in Japan on Saturday, December 22 @ 12-noon - 11:59 p.m. JST. If you are not yet a member, join now to take part in our exclusive member presales!</p>\r\n\r\n<div class=btnContainer>\r\n\r\n	<a href=\" https://www.sabrinacarpenter.com/subscribe\" class=\"downloadLink\">Join now</a>\r\n\r\n</div><div class=\"presaleContainer\">\r\n	<h3 class=\"presaleTitle\">Helpful info for Japan presales - Please read:</h3>\r\n	<ul class=\"presaleList\">\r\n		       <li>* You must be registered on the e+ (<a href=\"eplus.jp\">eplus.jp</a>) website in order to purchase tickets. For details, <a href=\"https://member.eplus.jp/register-member\">CLICK HERE</a>. If you do not have an e+ account, we highly recommend that you register in advance so you will be ready once our presale begins on December 22 @ 12-noon JST.</li>\r\n    <li>* When our presale begins, visit the TOUR page, and you will see the special fan club code displayed above the BUY TICKETS link.</li>\r\n    <li>* Each member may purchase up to 8 tickets with our fan club code.</li>\r\n    <li>* Please note only credit cards issued in Japan are acceptable for the payment.</li>\r\n   <li> * Our member presale will end on December 22 @ 23:59 JST.</li>\r\n	</ul>\r\n</div>\r\n<div class=\"presaleContainer\">\r\n	<h3 class=\"presaleTitle\">Singular tour 2019 - Asia leg</h3>\r\n	<ul class=\"presaleList\">\r\n		      <li>April 1st: Osaka, Japan - Namba Hatch</li>\r\n<li>April 2nd: Nagoya, Japan - Diamond Hall</li>\r\n<li>April 4th: Tokyo, Japan - EX Theater Roppongi</li>\r\n<li>April 6th: Seoul, South Korea - YES24 Live Hall</li>\r\n<li>April 9th: Manila, Philippines - New Frontier Theater</li>\r\n	</ul>\r\n<p>Stay tuned for more information on presales for Seoul and Manila!</p>\r\n</div>\r\n'),
(23, 'singulartourasia.jpg', '2019-01-21 00:00:00', 'Seoul and Manila Presales Scheduled', 'Friends in Seoul and Manila, get your preferred tickets early to see Sabrina\'s Singular Tour!', '<p>We are excited to announce new ticket presales for two shows on <strong>Sabrina\'s Singular Tour of Asia</strong>: April 6 in Seoul at 24 Live Hall, and April 9 in Manila at New Frontier Theater! Don\'t miss Sabrina in concert where she will perform hits from her new album, Singular Act I, plus fan favorites from her music catalog.</p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<p>Sabrina Carpenter fan club members will have early access to preferred tickets beginning on Wednesday, January 23 at 23-noon KST for Seoul, and then Friday, January 25 @ 10 a.m. PHT for Manila. If you are not yet a member, join now to take part in our exclusive member presales!</p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<div class=btnContainer>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n	<a href=\" https://www.sabrinacarpenter.com/subscribe\" class=\"downloadLink\">Join now</a>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</div>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<div class=\"presaleContainer\">\r\n\r\n\r\n\r\n	<h3 class=\"presaleTitle\">Important presale info: Please read:</h3>\r\n\r\n\r\n\r\n	<div class=\"presaleDate\"><span>April 6 - Seoul Presale</span></div>\r\n\r\n\r\n\r\n	<div class=\"presaleDate\"><span>Jan.23 @ 12-noon KST</span></div>\r\n\r\n\r\n\r\n	<ul class=\"presaleList\">\r\n\r\n\r\n\r\n		    <li>* You must be registered on the Yes24 Ticket website (<a href=\"https://ticket.yes24.com\">Yes24.com</a>) in order to purchase tickets. For details, <a href=\"https://ticket.yes24.com/Pages/English/Member/FnSignUp.aspx\">CLICK HERE</a>. If you do not yet have an Yes24.com account, we highly recommend that you register in advance so you will be ready once our presale begins on January 23 @ 12-noon local time.</li>\r\n\r\n\r\n\r\n    <li>* When our presale begins, visit the TOUR page, and you will see the special fan club code displayed above the BUY TICKETS link.</li>\r\n\r\n\r\n\r\n    <li>* Each member may purchase up to 4 tickets with our fan club code.</li>\r\n\r\n\r\n\r\n    <li>* Our Seoul presale will end on January 25 @ 8:59 a.m. KST.</li>\r\n\r\n\r\n\r\n	</ul>\r\n\r\n\r\n\r\n</div>\r\n\r\n\r\n\r\n<div class=\"presaleContainer\">\r\n\r\n\r\n\r\n	<div class=\"presaleDate\"><span>April 9 - Manila Presale</span></div>\r\n\r\n\r\n\r\n	<div class=\"presaleDate\"><span>Jan.25 @ 10 A.M. PHT</span></div>\r\n\r\n\r\n\r\n	<ul class=\"presaleList\">\r\n\r\n\r\n\r\n		       <li>* When our presale begins, visit the TOUR page, and you will see the special fan club code displayed above the BUY TICKETS link.</li>\r\n\r\n\r\n\r\n    			<li>* Each member may purchase up to 4 tickets with our fan club code.</li>\r\n\r\n\r\n\r\n    <li>* Our Manila presale will end on January 25 @ 11:59 p.m. PHT.</li>\r\n\r\n\r\n\r\n	</ul>\r\n\r\n\r\n<p>Members, if you have questions regarding your membership, please use our HELP form to contact our Fan Support Team.</p>\r\n</div>\r\n\r\n\r\n\r\n'),
(24, 'singulartour.jpg', '2019-01-28 00:00:00', 'Singular North American Tour Announced!', 'Sabrina will tour North America in March! Get first access to preferred tickets and VIP Packages in our exclusive member presales beginning Tues., Jan. 29th!', '<p>Sabrina is proud to announce her Singular Tour of North America! Don\'t miss Sabrina when she visits your city, performing songs from her new album, Singular Act I, plus fan favorites from her music catalog. Check out the TOUR section for a full schedule of dates.</p>\r\n<p>Tickets go on sale to the public on Friday, February 1st, but Sabrina Carpenter fan club members will have FIRST access to preferred tickets and VIP Packages beginning tomorrow, January 29 at 10 a.m. local time. If you are not yet a member, join now to take part in our exclusive member presales!</p>\r\n<div class=btnContainer>\r\n	<a href=\"https://www.sabrinacarpenter.com/subscribe\" class=\"downloadLink\">Join now</a>\r\n</div>\r\n<div class=\"presaleContainer\">\r\n	<h3 class=\"presaleTitle\">Singular Tour Presale Info - Please read:</h3>\r\n	<ul class=\"presaleList\">\r\n		<li><strong>*Our member presale begins Tuesday, January 29 @ 10 a.m. local time.</strong></li>\r\n    		<li><strong>*Members, remember login for Sabrina\'s site is now: registered EMAIL + current password!</strong></li>\r\n    		<li>*You must have a current paid membership to participate in our member presales. MORE INFO.</li>\r\n    		<li>*Members, when our presale begins, visit the TOUR page, and you will see your unique presale code displayed at the top of the page.</li>\r\n    		<li>*Scroll down and click the GET TICKETS link for your show date to reach the ticketing site.</li>\r\n   		<li>*Each member may purchase up to 8 tickets with a fan club code. The code is valid for all show dates on sale, up to your 8-ticket limit (example: 8 tix to one show; 4 tix each to two shows, etc.)</li>\r\n   		<li>*Our fan club presales will end on Thursday, January 31 @ 10 p.m. local time.</li><li><strong>*March 2 - Orlando</strong>: Presale access is not available for this show. Tickets for this event are included with admission into Universal Studios Florida. You may purchase a VIP UPGRADE after purchasing a park pass.</li>\r\n		<li><strong>*March 10 - Washington DC</strong>: VIP Packages are not available for purchase on the ticketing site. You may purchase a VIP UPGRADE after purchasing your concert tickets for the DC show.</li>\r\n	</ul>\r\n</div>'),
(25, 'pushing.jpg', '2019-03-08 00:00:00', '\"Pushing 20\" is out now!', 'Here\'s Sabrina\'s latest single, \"Pushing 20\"! Listen to and download the track now.', '<p>For the next couple of months you\'ll be getting new music until the release of <strong>Singular Act 2!</strong></p>\r\n<div class=btnContainer>\r\n	<a href=\"http://hollywoodrecs.co/Pushing20\" class=\"downloadLink\"><strong>Download \"Pushing 20\"</strong> </a>\r\n</div>\r\n<div class=\"videoContainer\">\r\n	<iframe src=\"https://www.youtube.com/embed/dxZk3f7LH9I\" width=\"560\" height=\"315\" sandbox=\"allow-scripts allow-same-origin\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n</div>\r\n'),
(26, 'alanwalker.jpg', '2019-03-22 00:00:00', 'New song, \"On My Way,\" out now', 'Hear, watch and download Sabrina\'s new song, \"On My Way,\" with Alan Walker and Farruko!', '<p>New song, \"On My Way,\" with Alan Walker and Farruko is available now!</p>\r\n<p>Streaming Link <a href=\"https://lnk.to/AWOMW\">HERE</a></p>\r\n<p>Watch the video below:</p>\r\n<div class=\"videoContainer\">\r\n	<iframe src=\"https://www.youtube.com/embed/dhYOPzcsbGM\" width=\"560\" height=\"315\" sandbox=\"allow-scripts allow-same-origin\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n</div>'),
(27, 'exhale.jpg', '2019-05-21 23:00:00', 'Watch the \"Exhale\" music video', 'Check out the music video to \"Exhale\" and download the track today!', '<p>Sabrina\'s new single, \"Exhale,\" is available for streaming and download.</p>\r\n<p>Streaming Link <a href=\"https://sabrina.lnk.to/ExhaleglobalWE\">HERE</a></p><p>Watch the video:</p>\r\n<div class=\"videoContainer\">\r\n	<iframe src=\"https://www.youtube.com/embed/3gqu8ZTEM1k\" width=\"560\" height=\"315\" sandbox=\"allow-scripts allow-same-origin\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n</div>\r\n'),
(28, 'singularact2.jpg', '2019-06-06 23:00:00', 'Pre-order Singular - Act II', 'Pre-order Sabrina\'s upcoming album, Singular - Act II!', '<p>Singular - Act II arrives on July 19. Be sure to <a href=\"http://hollywoodrecs.co/SingularActII\">pre-order your copy now!</a></p>\r\n'),
(29, 'inmybed.jpg', '2019-06-27 23:00:00', 'Check out Sabrina\'s \"In my Bed\" video', 'Watch the official music video to \"In My Bed\"!', '<p>Watch the official music video for Sabrina\'s latest single, \"In My Bed\";</p>\r\n<div class=\"videoContainer\">\r\n	<iframe src=\"https://www.youtube.com/embed/FN3bTP84GCU\" width=\"560\" height=\"315\" sandbox=\"allow-scripts allow-same-origin\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n</div>\r\n'),
(30, 'singularact2.jpg', '2019-07-19 22:57:21', '\'Singular - Act II\' available now!', 'Stream and download Sabrina\'s brand new album, <strong>Singular - Act II</strong>!', '<p>The wait is over ר Singular - Act II is out now! CLICK HERE to stream and download the full album on your favorite music service and enjoy Sabrina\'s latest, including \"I\'m Faking,\" \"In My Bed,\" \"Exhale,\" \"Pushing 20,\" and more new music you\'ll want to add onto your summertime playlist!</p>\r\n<p>Also check out <a href=\"https://people.com/music/sabrina-carpenter-releases-album-singular-act-ii/\">People.com</a> where Sabrina breaks down every track on Singular - Act II!</p>\r\n<div class=btnContainer>\r\n	<a href=\"http://hollywoodrecs.co/SingularActII\" class=\"downloadLink\">Download Singular Act II</a>\r\n</div>\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `payment_date`) VALUES
(1, 1, '2019-10-10 17:12:19', '0000-00-00 00:00:00'),
(2, 1, '2019-10-10 17:16:35', '0000-00-00 00:00:00'),
(3, 1, '2019-10-10 17:17:27', '0000-00-00 00:00:00'),
(4, 1, '2019-10-10 17:17:59', '0000-00-00 00:00:00'),
(5, 1, '2019-10-10 17:19:58', '0000-00-00 00:00:00'),
(6, 1, '2019-10-10 17:22:38', '2019-10-10 17:22:38'),
(7, 1, '2019-10-10 17:23:47', '0000-00-00 00:00:00'),
(8, 1, '2019-10-10 17:25:31', '0000-00-00 00:00:00'),
(9, 1, '2019-10-10 17:37:28', '2019-10-10 17:37:28'),
(10, 1, '2019-10-10 17:38:53', '2019-10-10 17:38:53'),
(11, 1, '2019-10-10 17:40:50', '2019-10-10 17:40:50'),
(12, 1, '2019-10-10 17:43:59', '2019-10-10 17:43:59'),
(13, 1, '2019-10-10 18:14:57', '2019-10-10 18:14:57'),
(14, 1, '2019-10-10 18:15:47', '2019-10-10 18:15:47'),
(15, 1, '2019-10-10 18:18:49', '2019-10-10 18:18:49'),
(16, 1, '2019-10-10 18:19:07', '2019-10-10 18:19:07'),
(17, 1, '2019-10-10 18:24:31', '2019-10-10 18:24:31'),
(18, 1, '2019-10-10 18:24:55', '2019-10-10 18:24:55'),
(19, 1, '2019-10-10 19:09:14', '2019-10-10 19:09:14'),
(20, 1, '2019-10-10 19:09:52', '2019-10-10 19:09:52'),
(21, 1, '2019-10-10 19:12:51', '2019-10-10 19:12:51'),
(22, 1, '2019-10-10 19:14:50', '2019-10-10 19:14:50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `price` decimal(10,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `quantity`, `price`) VALUES
(3, 5, 1, '20.00'),
(4, 4, 1, '25.00'),
(4, 5, 1, '20.00'),
(5, 4, 1, '25.00'),
(5, 8, 1, '30.00'),
(6, 4, 1, '25.00'),
(7, 4, 1, '25.00'),
(7, 5, 1, '20.00'),
(8, 4, 1, '25.00'),
(9, 5, 1, '20.00'),
(10, 5, 2, '40.00'),
(11, 5, 1, '20.00'),
(11, 8, 1, '30.00'),
(12, 5, 1, '20.00'),
(12, 8, 1, '30.00'),
(13, 4, 1, '25.00'),
(13, 5, 1, '20.00'),
(14, 4, 1, '25.00'),
(14, 5, 14, '280.00'),
(15, 4, 1, '25.00'),
(16, 5, 1, '20.00'),
(16, 8, 1, '30.00'),
(17, 5, 3, '60.00'),
(18, 4, 1, '25.00'),
(18, 5, 1, '20.00'),
(19, 4, 1, '25.00'),
(19, 5, 1, '20.00'),
(20, 4, 1, '25.00'),
(20, 5, 1, '20.00'),
(21, 4, 1, '25.00'),
(21, 5, 1, '20.00'),
(22, 5, 1, '20.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(200) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `description` text NOT NULL,
  `shop_name` varchar(64) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `preorder_info` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `date_added`, `image`, `name`, `description`, `shop_name`, `price`, `preorder_info`) VALUES
(1, 2, '2019-09-13 00:33:22', 'SCA89770_abf99e19-bd25-4a56-93c9-8c3c82976c21_1024x1024@2x.png', 'Singular Act II Poster', '<p class=\"description\">Singular Act II Album Cover Artwork is printed on a 16 x 20\" poster.</p>\r\n<p class=\"description\">Your digital album Singular Act II will be delivered via email.</p>\r\n<p class=\"description\">Please note, digital downloads are only available in the U.S.</p>', 'Singular Act II Poster & Digital Download', '20.00', '<p class=\"preorderItem\">This is a pre-order item. The merchandise will ship in 4-5 weeks. Your digital download will be delivered on checkout.</p>'),
(2, 1, '2019-09-13 01:19:39', 'SCA89922_e763d122-e13e-4416-9f2a-0df82bca5986_1024x1024@2x.png', 'Singular Act II Sweatshirt', '<p class=\"description\">80% Cotton/20% polyester blend fleece featuring Singular Act II artwork on the front and a photo of Sabrina on the back.</p>\r\n<p class=\"description\">Your digital album Singular Act II will be delivered via email. Please note, digital downloads are only available in the U.S. </p>', 'Singular Act II Crewneck Sweatshirt & Digital Download', '60.00', '<p class=\"preorderItem\">This is a pre-order item. The merchandise will ship in 4-5 weeks. Your digital download will be delivered on checkout.</p>'),
(3, 1, '2019-09-13 01:17:48', 'SCA89923_7ce2ed75-1c16-4e0c-8781-86c02f020f4b_1024x1024@2x.png', 'Portrait T-Shirt', '<p class=\"description\">Black 100% cotton shirt featuring a photo of Sabrina on the front and Singular Act II on the back.</p>\r\n<p class=\"description\">Your digital album Singular Act II will be delivered via email. Please note, digital downloads are only available in the U.S. </p>', 'Singular Act II Tee & Digital Download', '30.00', NULL),
(4, 2, '2019-08-09 03:53:25', 'sca-Act2-tote-SCA89771.png', 'Singular Tote Bag', '\r\n\r\n<p class=\"description\">Singular Act II artwork is printed on a Natural Tote Bag.</p>\r\n<p  class=\"description\">Your digital album Singular Act II will be delivered via email.</p>\r\n<p  class=\"description\">Please note, digital downloads are only available in the U.S.</p>\r\n', 'Singular Act II Tote Bag & Digital Download', '25.00', '<p class=\"preorderItem\">This is a pre-order item. The merchandise will ship in 4-5 weeks. Your digital download will be delivered on checkout.</p>'),
(5, 2, '2019-08-09 04:13:37', '4559_5A.CG06v3_188857b0-ddd2-4020-a769-04396fe027b4_1024x1024@2x.png', NULL, '<p class=\"description\">Sticker Sheet with over 15 individual stickers inspired by Singular Act II artwork.</p>\r\n\r\n<p class=\"description\">Your digital album Singular Act II will be delivered via email. Please note, digital downloads are only available in the U.S.</p>', 'Singular Act II Sticker Set & Digital Download', '20.00', '<p class=\"preorderItem\">This is a pre-order item. The merchandise will ship in 4-5 weeks. Your digital download will be delivered on checkout.</p>'),
(6, 1, '2019-08-09 04:13:37', '4559_5A.DB01v15_1024x1024@2x.png', NULL, '<p class=\"description\">PRE-ORDER - Singular Artwork is printed on the front of this Charcoal oversized 100% cotton tee.</p>\r\n\r\n \r\n\r\n<p class=\"description\">*Will ship in 2-3 weeks</p>', 'Singular Photo Oversized Tee', '25.00', NULL),
(7, 1, '2019-08-09 04:20:59', '4559_5A.DM01V5_1024x1024@2x.png', NULL, '<p class=\"description\">PRE-ORDER - Natural Boxer shorts featuring In My Bed printed down the right leg and Singular Sabrina Carpenter on the left leg near the cuff. Constructed out of 3.5 oz. poly cotton fabric</p>\r\n', 'In My Bed Boxer Shorts', '35.00', NULL),
(8, 2, '2019-08-09 04:20:59', '4559_5A.KL04V1_1024x1024@2x.png', NULL, '<p class=\"description\">PRE-ORDER - Singular Album Song & Artwork collage sublimated onto a 20\" x 30\" standard pillowcase.</p>\r\n<p class=\"description\">*Will ship in 5-6 weeks</p>', 'Singular Pillowcase', '30.00', NULL),
(10, 1, '2019-08-09 04:27:10', 'Paris_Tee_1024x1024@2x.png', NULL, '<ul class=\"description descriptionList\"><li>Long Sleeve</li><li>Crewneck</li><li>100% Cotton</li></ul>', 'Paris Long Sleeve Tee', '45.00', NULL),
(11, 1, '2019-08-09 04:26:47', 'SCA_Duel_Tee_1024x1024@2x.png', NULL, '<p class=\"description\">Concert tour tee from Sabrina\'s 2019 US Singular tour. </p>', 'Singular Tour Tee', '35.00', NULL),
(12, 1, '2019-08-09 04:26:47', '1800-Badtime-1_1024x1024@2x.png', NULL, '<p class=\"description\">\r\n\r\nA soft purple tee featuring \"Bad Time\" graphics\r\n</p>', 'Bad Time Tee', '30.00', NULL),
(13, 1, '2019-09-13 01:03:11', 'MANY_FACES_FT_1024x1024@2x.png', NULL, '<p class=\"description\">\"Many Faces\" sublimated tour tee from Sabrina\'s 2019 tour. </p>', 'Many Faces Tee', '50.00', NULL),
(14, 1, '2019-09-13 01:05:59', '7ICM004_1024x1024@2x.png', NULL, '<p class=\"description\">Tan \"Singular\" hoodie</p>', 'Singular Hoodie', '50.00', NULL),
(15, 1, '2019-09-13 01:07:59', '7ICT002_1024x1024@2x.png', NULL, '<p class=\"description\">Green \"Singular\" long sleeve t-shirt, featuring album artwork and track list.</p>', 'Singular Long Sleeve', '35.00', NULL),
(16, 1, '2019-09-13 01:08:34', 'Singular_tracklist_Duel_1024x1024@2x.png', NULL, '<p class=\"description\">  A soft white tee featuring the track list from Sabrina Carpenter\'s 3rd album, Singular.</p>', 'Singular Tee', '30.00', NULL),
(17, 1, '2019-09-13 01:13:23', 'Paris_Hoodie_1200x1200_B_1024x1024@2x.png', NULL, '<p class=\"description\">Celebrate track 2 from Singular with this black \"Paris\" hoodie.</p>', 'Paris Hoodie', '50.00', NULL),
(18, 1, '2019-09-13 01:14:33', 'SCA81137_1024x1024@2x.jpg', NULL, '<p class=\"description\">White crewneck tee featuring an abstract design for Sabrina Carpenter\'s new single, \"Almost Love\". </p> ', 'ALMOST LOVE TEE', '25.00', NULL),
(19, 1, '2019-09-13 01:14:37', 'SCA78674_1024x1024@2x.jpg', NULL, '<p class=\"description\">Stay warm in this cozy hoodie featuring a black & white photo of Sabrina in Japan. </p>', 'JAPAN PULLOVER HOODIE(GRAY)', '50.00', NULL),
(20, 1, '2019-09-13 01:14:40', 'SCA78675_1024x1024@2x.jpg', NULL, '<p class=\"description\">A cotton tee featuring a polaroid photograph of Sabrina on the streets of Japan.</p>', 'JAPAN POLAROID TEE', '25.00', NULL),
(21, 1, '2019-09-13 01:14:43', 'SCA79481_1024x1024@2x.jpg', NULL, '<p class=\"description\">An alien graphic tee, individually hand-dipped to achieve unique bleach patters. Due to the unique bleach process, no two will be the same. </p>', 'ALIEN TEE', '35.00', NULL),
(22, 1, '2019-09-13 01:16:40', 'SCA77321_1024x1024@2x.jpg', NULL, '<p class=\"description\">Get cozy in this red hooded onesie featuring \"Sabrina\" and \"SC\" Old English graphics for a personality punch. </p>', 'HOODED ONESIE(RED)', '80.00', NULL),
(23, 1, '2019-09-13 01:16:40', 'sca_sublimated_tee_1200x1200_f3a9ec33-f3f8-497f-b0ef-ded1d30379dd_1024x1024@2x.png', NULL, '<p class=\"description\">Wear Sabrina wherever you go with this sublimated crewneck tee, featuring tour stops from the 2017 \"The De-Tour\" tour. </p>', 'Sublimated Tour Tee', '35.00', NULL),
(24, 1, '2019-09-13 01:34:04', 'detour_polaroid_duel_1024x1024@2x.png', NULL, '<p class=\"description\">Celebrate Sabrina\'s 2017 tour, \"The De-Tour\", with this super-soft black tee, featuring a black and white polaroid photo on the front and all North American tour stops printed on the back.</p>', 'DE-TOUR POLAROID TOUR TEE', '25.00', NULL),
(25, 1, '2019-09-13 01:34:04', 'SCA73745_1024x1024@2x.jpg', NULL, '<p class=\"description\">A black long sleeve, crewneck tee featuring a \"Sabrina\" chest graphic and \"King and Queen of Nowhere\" back graphic in red.</p>\r\n', 'SABRINA LONG SLEEVE TEE (BLACK)', '30.00', NULL),
(26, 1, '2019-09-13 01:34:04', 'SCA73746_1024x1024@2x.jpg', NULL, '<p class=\"description\">A short sleeve crewneck tee featuring a black and white photo of Sabrina Carpenter.</p>', 'BLACK & WHITE PORTRAIT TEE', '25.00', NULL),
(27, 1, '2019-09-13 01:35:20', 'SCA70450_1024x1024@2x.jpg', NULL, '<p class=\"description\">A hand-drawn portrait of Sabrina Carpenter by Dana Veraldi of DEERDANA, printed on a 100% cotton white t-shirt. </p>', 'BLUE EYES DEERDANA PORTRAIT TEE', '30.00', NULL),
(28, 1, '2019-09-13 01:35:20', 'all_we_have_is_love_flannel_1024x1024@2x.png', NULL, '<p class=\"description\">Perfect your outfit with this men\'s cut black and red flannel shirt, featuring lyrics from Sabrina\'s hit song \"All We Have is Love\". </p>', 'ALL WE HAVE IS LOVE FLANNEL', '50.00', NULL),
(29, 2, '2019-09-13 01:49:17', 'Singular_Temp_Tats_1024x1024@2x.png', NULL, '<p class=\"description\">Get your hands on Sabrina\'s temporary tattoos.</p>', 'Singular Temporary Tattoos', '10.00', NULL),
(30, 2, '2019-09-13 01:49:17', '7ICH003_1024x1024@2x.png', NULL, '<p class=\"description\"> \"Sue Me\" pink trucker hat </p>', 'Sue Me Trucker Hat', '30.00', NULL),
(31, 2, '2019-09-13 01:50:53', 'SCA_TOURMOMHAT_1024x1024@2x.png', NULL, '<p class=\"description\"> A white dad cap featuring an embroidered \"Singular Tour Dad\" at the front  and \"Sabrina Carpenter Stan\" embroidered on the back. Cap features an adjustable strap. </p>', 'Tour Mom Cap', '25.00', NULL),
(32, 2, '2019-09-13 01:50:53', 'Almost_Love_Camera_1200x1200_088611de-b322-4be1-a0df-2caa6383968d_1024x1024@2x.png', NULL, '<p class=\"description\">\"Almost Love\" disposable camera </p>', 'Almost Love Camera', '25.00', NULL),
(33, 2, '2019-09-13 01:50:53', '7IAM002_1024x1024@2x.png', NULL, '<p class=\"description\">\"Sue Me\" pink fanny pack </p>', 'Sue Me Fanny Pack', '20.00', NULL),
(34, 2, '2019-09-13 01:52:22', 'SCA74009_1024x1024@2x.jpg', NULL, '<p class=\"description\">Sabrina Carpenter 18\" x 24\" 2017 poster.</p>', 'PORTRAIT POSTER', '10.00', NULL),
(35, 2, '2019-09-13 01:52:22', 'SCA78676_1024x1024@2x.jpg', NULL, '<p class=\"description\">Photograph poster of Sabrina Carpenter. 18\" x 24\". </p>', 'SABRINA CARPENTER POSTER', '10.00', NULL),
(36, 2, '2019-09-13 01:52:22', 'SCA69985_1024x1024@2x.jpg', NULL, '<p class=\"description\">Customize your laptop with this Sabrina Carpenter black laptop sticker!</p>', 'Sabrina Carpenter Laptop Sticker', '8.00', NULL),
(37, 2, '2019-09-13 01:53:21', 'SCA74397_1024x1024@2x.jpg', NULL, '<p class=\"description\">DE-Tour Blue LED light glow necklace. Three different light modes.</p>', 'DE-TOUR LED NECKLACE', '20.00', NULL),
(38, 2, '2019-09-13 01:53:21', 'SCA70442_1024x1024@2x.jpg', NULL, '<p class=\"description\">Black velvet choker, with a heart pendant engraved with \"All We Have is Love\" on the front and \"Sabrina Carpenter\" on the back.</p>', 'ALL WE HAVE IS LOVE CHOKER', '15.00', NULL),
(39, 3, '2019-09-13 01:57:27', 'SCA69989_1024x1024@2x.jpg', NULL, '<p class=\"description\">The sophomore album from singer-songwriter, Sabrina Carpenter.</p>\r\n\r\n<h2>Track List:</h2>\r\n  <ul class=\"description trackList\">\r\n    <li>1. On purpose</li>\r\n    <li>2. Feels like loneliness</li>\r\n    <li>3. Thumbs</li>\r\n    <li>4. No words</li>\r\n    <li>5. Run and hide</li>\r\n    <li>6. Mirage</li>\r\n    <li>7. Don\'t want it back</li>\r\n    <li>8. Shadows</li>\r\n    <li>9. Space</li>\r\n    <li>10. All we have is love</li>\r\n</ul>', 'EVOLution CD', '11.00', NULL),
(40, 3, '2019-09-13 01:57:27', '71hHhYRjWSL._SL1200_-2_1024x1024@2x.jpg', NULL, '<ul class=\"description trackList\">\r\n    <li>1. Almost Love</li>\r\n    <li>2. Paris</li>\r\n    <li>3. Hold Tight</li>\r\n    <li>4. Sue Me</li>\r\n    <li>5. Prfct</li>\r\n    <li>6. Bad Time</li>\r\n    <li>7. Mona Lisa</li>\r\n    <li>8. Diamonds Are Forever</li>\r\n</ul>', 'Singular CD', '10.00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sizes`
--

CREATE TABLE `sizes` (
  `size_id` int(10) UNSIGNED NOT NULL,
  `size` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sizes`
--

INSERT INTO `sizes` (`size_id`, `size`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL'),
(6, 'XXL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `social_media`
--

CREATE TABLE `social_media` (
  `social_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `class` varchar(32) NOT NULL,
  `link` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `social_media`
--

INSERT INTO `social_media` (`social_id`, `name`, `class`, `link`) VALUES
(1, 'facebook', 'fab fa-facebook-square', 'https://www.facebook.com/sabrinacarpenter/'),
(2, 'twitter', 'fab fa-twitter', 'https://twitter.com/SabrinaAnnLynn'),
(3, 'youtube', 'fab fa-youtube', 'https://www.youtube.com/sabrinacarpenter/'),
(4, 'instagram', 'fab fa-instagram', 'https://www.instagram.com/sabrinacarpenter/'),
(5, 'apple', 'fab fa-apple', 'https://itunes.apple.com/us/artist/sabrina-carpenter/id390647681'),
(6, 'spotify', 'fab fa-spotify', 'https://open.spotify.com/artist/74KM79TiuVKeVCqs8QtB0B'),
(7, 'imdb', 'fab fa-imdb', 'https://www.imdb.com/name/nm4248775/?ref_=nv_sr_1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `stocks`
--

CREATE TABLE `stocks` (
  `stock_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED DEFAULT NULL,
  `stock` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `stocks`
--

INSERT INTO `stocks` (`stock_id`, `product_id`, `size_id`, `stock`) VALUES
(1, 1, NULL, 4),
(2, 2, 2, 5),
(3, 3, 1, 7),
(4, 4, NULL, 1),
(5, 5, NULL, 10),
(6, 6, 1, 63),
(7, 7, 2, 123),
(8, 8, NULL, 10),
(9, 10, 0, 10),
(10, 11, NULL, 0),
(11, 12, 1, 12),
(12, 13, 1, 23),
(13, 14, 3, 31),
(14, 15, 3, 10),
(15, 16, 4, 3),
(16, 17, 1, 8),
(17, 18, 2, 34),
(18, 25, 3, 24),
(19, 20, NULL, 0),
(20, 21, 2, 43),
(21, 22, 1, 21),
(22, 23, 4, 30),
(23, 24, 3, 5),
(24, 25, NULL, 0),
(25, 26, 2, 6),
(26, 27, 1, 18),
(27, 28, 1, 10),
(28, 29, NULL, 4),
(29, 30, NULL, 5),
(30, 31, 4, 11),
(31, 32, 5, 4),
(32, 14, 4, 5),
(33, 28, 5, 26),
(34, 3, 2, 36),
(35, 25, 6, 18),
(36, 6, 2, 14),
(37, 7, 3, 19),
(38, 2, 3, 24),
(39, 7, 4, 17),
(40, 2, 4, 14),
(41, 17, 3, 25),
(42, 24, 4, 43),
(43, 17, 2, 56),
(44, 3, 3, 47),
(45, 16, 5, 23),
(46, 23, 6, 11),
(47, 15, 4, 27),
(48, 26, 3, 21),
(49, 25, 4, 14),
(50, 2, 5, 7),
(51, 28, 6, 3),
(52, 19, 2, 67),
(53, 18, 3, 56),
(54, 29, NULL, 15),
(55, 19, 3, 36),
(56, 19, 4, 30),
(57, 2, 6, 29),
(58, 22, 2, 50),
(59, 21, 3, 46),
(60, 3, 4, 107),
(61, 27, 2, 86),
(62, 22, 3, 68),
(63, 15, 5, 10),
(64, 15, 6, 15),
(65, 30, NULL, 0),
(66, 31, NULL, 6),
(67, 32, NULL, 17),
(68, 33, NULL, 13),
(69, 34, NULL, 0),
(70, 35, NULL, 21),
(71, 36, NULL, 16),
(72, 37, NULL, 27),
(73, 38, NULL, 0),
(74, 39, NULL, 50),
(75, 40, NULL, 55),
(76, 17, 5, 61);

-- --------------------------------------------------------

--
-- Estrutura da tabela `track_list`
--

CREATE TABLE `track_list` (
  `track_id` int(10) UNSIGNED NOT NULL,
  `discography_id` int(10) UNSIGNED NOT NULL,
  `track_number` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `track_list`
--

INSERT INTO `track_list` (`track_id`, `discography_id`, `track_number`, `name`) VALUES
(1, 1, 1, 'Almost Love'),
(2, 1, 2, 'Paris'),
(3, 1, 3, 'Hold Tight'),
(4, 1, 4, 'Sue Me'),
(5, 1, 5, 'prfct'),
(6, 1, 6, 'Bad Time'),
(7, 1, 7, 'Mona Lisa'),
(8, 1, 8, 'Diamonds are Forever'),
(9, 2, NULL, 'Almost Love'),
(10, 3, NULL, 'Alien'),
(11, 4, 1, 'On Purpose'),
(12, 4, 2, 'Feels Like Loneliness'),
(13, 4, 3, 'Thumbs'),
(14, 4, 4, 'No Words'),
(15, 4, 5, 'Run And Hide'),
(16, 4, 6, 'Mirage'),
(17, 4, 7, 'Don\'t Want It Back'),
(18, 4, 8, 'Shadows'),
(19, 4, 9, 'Space'),
(20, 4, 10, 'All We Have Is Love'),
(21, 5, 1, 'Eyes Wide Open'),
(22, 5, 2, 'Can\'t Blame a Girl for Trying'),
(23, 5, 3, 'The Middle of Starting Over'),
(24, 5, 4, 'We\'ll Be The Stars'),
(25, 5, 5, 'Two Young Hearts'),
(26, 5, 6, 'Your Love\'s Like'),
(27, 5, 7, 'Too Young'),
(28, 5, 8, 'Seamless'),
(29, 5, 9, 'Right Now'),
(30, 5, 10, 'Darling I\'m a Mess'),
(31, 5, 11, 'White Flag'),
(32, 5, 12, 'Best Thing I Got');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(252) NOT NULL,
  `username` varchar(20) NOT NULL,
  `address` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `postal_code` varchar(16) NOT NULL,
  `birthday` varchar(12) NOT NULL,
  `country_code` varchar(3) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(4) NOT NULL,
  `admin` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `email`, `username`, `address`, `password`, `postal_code`, `birthday`, `country_code`, `registration_date`, `active`, `admin`) VALUES
(1, 'joana@coisooo.com', '123', 'Rua João e Tal', '$2y$10$A68HGW.mhggo0FRb51UIuujmMkAS.hdWe5h6Nk.QJNFXxeJ5YbESi', 'coisas', '1997-04-02', 'US', '2019-10-11 13:50:08', 1, 0),
(2, 'coiso@coiso.com', 'miyazk45', 'Rua das hortencias', '$2y$10$S04XYe6fM1qF.r/tWhaI9O/huo2bBeOo4jAMDTxe2c55N7aX5hxtG', '2910-4011', '1997-04-02', 'US', '2019-10-11 14:00:39', 1, 0),
(3, 'admin@admin.com', 'admin', 'Rua dos Administradores', '123456789', '2900-300', '1997-04-02', 'PT', '2019-10-11 14:54:46', 1, 1),
(4, 'admin@admin.pt', 'teste', 'rua das cores', '$2y$10$dXxWlSs0T5xT/wet/GG6p.hfPaTgGqe57CK077uUZ94PdcWB2J14O', '2900-411', '02-04-97', 'US', '2019-10-11 14:56:29', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `discography`
--
ALTER TABLE `discography`
  ADD PRIMARY KEY (`discography_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`membership_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`social_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `product_id` (`stock`),
  ADD KEY `size_id` (`size_id`) USING BTREE;

--
-- Indexes for table `track_list`
--
ALTER TABLE `track_list`
  ADD PRIMARY KEY (`track_id`),
  ADD KEY `discography_id` (`discography_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `discography`
--
ALTER TABLE `discography`
  MODIFY `discography_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `membership_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `social_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `stock_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `track_list`
--
ALTER TABLE `track_list`
  MODIFY `track_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
