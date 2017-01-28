-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 27, 2017 at 06:49 PM
-- Server version: 10.1.20-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id471058_weza`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `enter` longtext NOT NULL,
  `standard` longtext NOT NULL,
  `basic` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `enter`, `standard`, `basic`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. &nbsp;', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. &nbsp;', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. &nbsp;');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` text NOT NULL,
  `admin_pass` text NOT NULL,
  `md_pass` text NOT NULL,
  `admin_mail` text NOT NULL,
  `add` int(11) NOT NULL,
  `edit` int(11) NOT NULL,
  `remove` int(11) NOT NULL,
  `pages` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_pass`, `md_pass`, `admin_mail`, `add`, `edit`, `remove`, `pages`) VALUES
(1, 'monaabdo88', 'b906dec30f65151c5ba75fbe49ee629e', '12122005', 'monaabdo88@gmail.com', 1, 1, 1, 'Main Settings,About Us,Sliders,Countries,Cities,Categories,Brands,Products,Customers,Orders,Partners,Socials,Admins'),
(4, 'samar', '3e84d27586e2e692d2a3c11c79b528fd', '159753', 's_h1112011@yahoo.com', 1, 0, 1, 'Main Settings,About Us,Sliders,Countries,Cities,Categories');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` text NOT NULL,
  `cat_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`, `cat_id`) VALUES
(1, 'Dresses', '1'),
(2, 'MakeUp', '1'),
(5, 'Watches', '1'),
(6, 'Sunglasses', '2'),
(7, 'Dresses', '3'),
(8, 'Toys', '3'),
(9, 'Hats', '3'),
(10, 'Watches', '2'),
(11, 'Perfumes', '2'),
(13, 'Shirts', '2'),
(14, 'Pants', '2'),
(15, 'Jeans', '1'),
(17, 'Coats & Jackets', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_add` varchar(1000) NOT NULL,
  `p_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `chk_ref` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `ip_add`, `p_id`, `quantity`, `price`, `chk_ref`) VALUES
(1, 0, '156.220.137.148', 8, 1, 500, '2017:01:15 02:42:15-638539311'),
(2, 0, '156.220.137.148', 15, 1, 600, '2017:01:15 02:42:15-638539311'),
(3, 0, '156.220.137.148', 7, 1, 600, '2017:01:15 03:11:53-655126818'),
(4, 0, '156.220.137.148', 11, 1, 240, '2017:01:15 03:11:53-655126818'),
(5, 0, '37.106.109.171', 8, 1, 500, '2017:01:24 09:15:18-37506261'),
(6, 0, '37.106.109.171', 8, 1, 500, '2017:01:24 09:15:18-37506261'),
(7, 0, '37.106.109.171', 8, 1, 500, '2017:01:24 09:15:18-37506261'),
(8, 0, '37.106.109.171', 8, 1, 500, '2017:01:24 09:15:18-37506261'),
(9, 0, '37.106.109.171', 8, 1, 500, '2017:01:24 09:15:18-37506261'),
(10, 0, '37.106.109.171', 8, 1, 500, '2017:01:24 09:15:18-37506261'),
(11, 0, '37.106.109.171', 8, 1, 500, '2017:01:24 09:15:18-37506261'),
(12, 0, '37.106.109.171', 8, 1, 500, '2017:01:24 09:15:18-37506261');

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `cat_id` int(11) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`cat_id`, `cat_title`) VALUES
(1, 'Women'),
(2, 'Men'),
(3, 'Babies'),
(4, 'Labtops'),
(5, 'Mobiles'),
(6, 'Tablets');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_title` varchar(255) NOT NULL,
  `country_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_title`, `country_id`) VALUES
(1, 'Cairo', ''),
(2, 'Cairo', '1'),
(3, 'Ismailia', '1'),
(4, 'Aswan', '1'),
(5, '10th of Ramadan', '1'),
(6, 'Alexandria	', '1'),
(7, 'Giza	', '1'),
(8, 'Qalyubia', '1'),
(9, 'Port Said', '1'),
(10, 'Suez', '1'),
(11, 'Gharbia', '1'),
(12, 'Luxor', '1'),
(13, 'Dakahlia', '1'),
(14, 'Gharbia', '1'),
(15, 'Asyut', '1'),
(16, 'Faiyum', '1'),
(17, 'Sharqia', '1'),
(18, 'Damietta', '1'),
(19, 'Minya	', '1'),
(20, 'Minya	', '1'),
(21, 'Beheira', '1'),
(22, 'Jaddha', '2'),
(23, 'Doha', '4'),
(24, 'Dubai', '3'),
(25, 'Beni Suef', ''),
(26, 'Beni Suef', '1'),
(27, 'Red Sea', '1'),
(28, 'Qena', '1'),
(29, 'Sohag', '1'),
(30, 'Monufia', '1'),
(31, 'Qalyubia', '1'),
(32, 'North Sinai', '1'),
(33, 'Riyadh', '2'),
(34, 'Mecca', '2'),
(35, 'Medina', '2'),
(36, 'Hofuf', '2');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_title`) VALUES
(1, 'Egypt'),
(2, 'KSA'),
(3, 'United Arab Emirates (UAE)'),
(4, 'QATAR'),
(5, 'OMAN'),
(6, 'Afghanistan'),
(7, 'Albania'),
(8, 'Algeria'),
(9, 'Andorra'),
(10, 'Angola'),
(11, 'Antigua and Barbuda'),
(12, 'Argentina'),
(13, 'Armenia'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bhutan'),
(26, 'Bolivia'),
(27, 'Bosnia and Herzegovina'),
(28, 'Botswana'),
(29, 'Brazil'),
(30, 'Brunei'),
(31, 'Bulgaria'),
(32, 'Burkina Faso'),
(33, 'Burundi'),
(34, 'Cabo Verde'),
(35, 'Cambodia'),
(36, 'Cameroon'),
(37, 'Canada'),
(38, 'Central African Republic (CAR)'),
(39, 'Chad'),
(40, 'Chile'),
(41, 'China'),
(42, 'Colombia'),
(43, 'Comoros'),
(44, 'Democratic Republic of the Congo'),
(45, 'Republic of the Congo'),
(46, 'Costa Rica'),
(47, 'Cote d\'Ivoire'),
(48, 'Croatia'),
(49, 'Cuba'),
(50, 'Cyprus'),
(51, 'Czech Republic'),
(52, 'Denmark'),
(53, 'Djibouti'),
(54, 'Dominica'),
(55, 'Dominican Republic'),
(56, 'Ecuador'),
(57, 'El Salvador'),
(58, 'Equatorial Guinea'),
(59, 'Eritrea'),
(60, 'Estonia'),
(61, 'Ethiopia'),
(62, 'Fiji'),
(63, 'Finland'),
(64, 'France'),
(65, 'Gabon'),
(66, 'Gambia'),
(67, 'Georgia'),
(68, 'Germany'),
(69, 'Ghana'),
(70, 'Greece'),
(71, 'Grenada'),
(72, 'Guatemala'),
(73, 'Guinea'),
(74, 'Guinea-Bissau'),
(75, 'Guyana'),
(76, 'Haiti'),
(77, 'Honduras'),
(78, 'Hungary'),
(79, 'Iceland'),
(80, 'India'),
(81, 'Indonesia'),
(82, 'Iran'),
(83, 'Iraq'),
(84, 'Ireland'),
(85, 'Italy'),
(86, 'Jamaica'),
(87, 'Japan'),
(88, 'Jordan'),
(89, 'Kazakhstan'),
(90, 'Kenya'),
(91, 'Kiribati'),
(92, 'Kosovo'),
(93, 'Kuwait'),
(94, 'Kyrgyzstan'),
(95, 'Laos'),
(96, 'Latvia'),
(97, 'Lebanon'),
(98, 'Lesotho'),
(99, 'Liberia'),
(100, 'Libya'),
(101, 'Liechtenstein'),
(102, 'Lithuania'),
(103, 'Luxembourg'),
(104, 'Macedonia'),
(105, 'Madagascar'),
(106, 'Malawi'),
(107, 'Malaysia'),
(108, 'Maldives'),
(109, 'Mali'),
(110, 'Malta'),
(111, 'Marshall Islands'),
(112, 'Mauritania'),
(113, 'Mauritius'),
(114, 'Mexico'),
(115, 'Micronesia'),
(116, 'Moldova'),
(117, 'Monaco'),
(118, 'Mongolia'),
(119, 'Montenegro'),
(120, 'Morocco'),
(121, 'Mozambique'),
(122, 'Myanmar (Burma)'),
(123, 'Namibia'),
(124, 'Nauru'),
(125, 'Nepal'),
(126, 'Netherlands'),
(127, 'New Zealand'),
(128, 'Nicaragua'),
(129, 'Niger'),
(130, 'Nigeria'),
(131, 'North Korea'),
(132, 'Norway'),
(133, 'Pakistan'),
(134, 'Palau'),
(135, 'Palestine'),
(136, 'Panama'),
(137, 'Papua New Guinea'),
(138, 'Paraguay'),
(139, 'Peru'),
(140, 'Philippines'),
(141, 'Poland'),
(142, 'Portugal'),
(143, 'Romania'),
(144, 'Russia'),
(145, 'Rwanda'),
(146, 'Saint Kitts and Nevis'),
(147, 'Saint Lucia'),
(148, 'Saint Vincent and the Grenadines'),
(149, 'Samoa'),
(150, 'San Marino'),
(151, 'Sao Tome and Principe'),
(152, 'Saudi Arabia'),
(153, 'Senegal'),
(154, 'Serbia'),
(155, 'Seychelles'),
(156, 'Sierra Leone'),
(157, 'Singapore'),
(158, 'Slovakia'),
(159, 'Slovenia'),
(160, 'Solomon Islands'),
(161, 'Somalia'),
(162, 'South Africa'),
(163, 'South Korea'),
(164, 'South Sudan'),
(165, 'Spain'),
(166, 'Sri Lanka'),
(167, 'Sudan'),
(168, 'Suriname'),
(169, 'Swaziland'),
(170, 'Sweden'),
(171, 'Switzerland'),
(172, 'Syria'),
(173, 'Taiwan'),
(174, 'Tajikistan'),
(175, 'Tanzania'),
(176, 'Thailand'),
(177, 'Timor-Leste'),
(178, 'Togo'),
(179, 'Tonga'),
(180, 'Trinidad and Tobago'),
(181, 'Tunisia'),
(182, 'Turkey'),
(183, 'Turkmenistan'),
(184, 'Tuvalu'),
(185, 'Uganda'),
(186, 'Ukraine'),
(187, 'United Kingdom (UK)'),
(188, 'United States of America (USA)'),
(189, 'Uruguay'),
(190, 'Uzbekistan'),
(191, 'Vanuatu'),
(192, 'Vatican City (Holy See)'),
(193, 'Venezuela'),
(194, 'Vietnam'),
(195, 'Yemen'),
(196, 'Zambia'),
(197, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user_id` int(11) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_mail` text NOT NULL,
  `user_pass` text NOT NULL,
  `user_country` varchar(255) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_contact` text NOT NULL,
  `user_img` text NOT NULL,
  `user_address` text NOT NULL,
  `pass_md` text NOT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `user_ip`, `user_name`, `user_mail`, `user_pass`, `user_country`, `user_city`, `user_contact`, `user_img`, `user_address`, `pass_md`, `user_status`) VALUES
(4, '::1', 'samar', 's_h1112011@yahoo.com', '3e84d27586e2e692d2a3c11c79b528fd', '1', '3', '201159860369', 'templates/images/users/4797_1481788652_2016-11-30 11.36.47.png', 'ELTELL EL KEBIER', '159753', 1),
(6, '::1', 'monaabdo88', 'monaabdo88@gmail.com', 'b906dec30f65151c5ba75fbe49ee629e', '1', '3', '201159860369', 'templates/images/users/6220_1482242042_Untitled-1.jpg', 'ELTELL EL KEBIER', '12122005', 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `img_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_id`, `pro_id`, `type`, `image`) VALUES
(1, 1, 'products', 'templates/images/products/9246_1482849879__13059724.jpg'),
(2, 1, 'products', 'templates/images/products/6169_1482849879__13059799.jpg'),
(3, 1, 'products', 'templates/images/products/7485_1482849879__13059897.jpg'),
(4, 1, 'products', 'templates/images/products/3297_1482849880__13060059.jpg'),
(5, 1, 'products', 'templates/images/products/2282_1482849880__13060060.jpg'),
(6, 3, 'products', 'templates/images/products/3128_1482850207__11635154.jpg'),
(7, 3, 'products', 'templates/images/products/4043_1482850207__11635155.jpg'),
(8, 3, 'products', 'templates/images/products/6705_1482850207__11635156.jpg'),
(9, 3, 'products', 'templates/images/products/395_1482850207__11635157.jpg'),
(10, 3, 'products', 'templates/images/products/4377_1482850207__11635158.jpg'),
(11, 4, 'products', 'templates/images/products/3030_1482850357__12157085.jpg'),
(12, 4, 'products', 'templates/images/products/8890_1482850357__12157087.jpg'),
(13, 4, 'products', 'templates/images/products/8197_1482850357__12157088.jpg'),
(14, 4, 'products', 'templates/images/products/3748_1482850357__12157089.jpg'),
(15, 4, 'products', 'templates/images/products/8009_1482850357__12418694.jpg'),
(16, 5, 'products', 'templates/images/products/9701_1482850950__11238942.jpg'),
(17, 5, 'products', 'templates/images/products/7674_1482850950__11239007.jpg'),
(18, 5, 'products', 'templates/images/products/5919_1482850950__11239068.jpg'),
(19, 5, 'products', 'templates/images/products/9461_1482850951__11239113.jpg'),
(20, 6, 'products', 'templates/images/products/9273_1482851222__100018836.jpg'),
(21, 6, 'products', 'templates/images/products/7600_1482851222__100018857.jpg'),
(22, 6, 'products', 'templates/images/products/3182_1482851222__100018918.jpg'),
(23, 6, 'products', 'templates/images/products/144_1482851222__100026966.jpg'),
(24, 7, 'products', 'templates/images/products/3617_1482851826__12889330.jpg'),
(25, 7, 'products', 'templates/images/products/7266_1482851826__12901181.jpg'),
(26, 7, 'products', 'templates/images/products/7974_1482851826__12901262.jpg'),
(27, 7, 'products', 'templates/images/products/8774_1482851826__12901287.jpg'),
(28, 8, 'products', 'templates/images/products/7443_1482851947__13200532.jpg'),
(29, 8, 'products', 'templates/images/products/7769_1482851947__13200539.jpg'),
(30, 8, 'products', 'templates/images/products/7547_1482851947__13200547.jpg'),
(31, 8, 'products', 'templates/images/products/3208_1482851948__13212207.jpg'),
(32, 9, 'products', 'templates/images/products/5224_1482852064__11471127.jpg'),
(33, 9, 'products', 'templates/images/products/8249_1482852064__11486045.jpg'),
(34, 9, 'products', 'templates/images/products/5341_1482852064__11486173.jpg'),
(35, 9, 'products', 'templates/images/products/8769_1482852064__11486181.jpg'),
(36, 10, 'products', 'templates/images/products/494_1482852873__13013707.jpg'),
(37, 10, 'products', 'templates/images/products/5657_1482852873__13034485.jpg'),
(38, 10, 'products', 'templates/images/products/6355_1482852873__13034587.jpg'),
(39, 10, 'products', 'templates/images/products/1091_1482852873__13034611.jpg'),
(40, 10, 'products', 'templates/images/products/3970_1482852874__13034703.jpg'),
(41, 12, 'products', 'templates/images/products/584_1482861787__10829523.jpg'),
(42, 12, 'products', 'templates/images/products/3126_1482861787__10829526.jpg'),
(43, 13, 'products', 'templates/images/products/9611_1482861935__9914619.jpg'),
(44, 13, 'products', 'templates/images/products/7951_1482861935__9914712.jpg'),
(45, 13, 'products', 'templates/images/products/3121_1482861935__9914717.jpg'),
(46, 14, 'products', 'templates/images/products/198_1482862036__12935752.jpg'),
(47, 14, 'products', 'templates/images/products/2453_1482862036__12937561.jpg'),
(48, 14, 'products', 'templates/images/products/4961_1482862036__12938537.jpg'),
(49, 15, 'products', 'templates/images/products/6464_1483210663__13056537.jpg'),
(50, 15, 'products', 'templates/images/products/8435_1483210663__13058298.jpg'),
(51, 15, 'products', 'templates/images/products/565_1483210663__13058482.jpg'),
(52, 15, 'products', 'templates/images/products/3251_1483210663__13058554.jpg'),
(53, 16, 'products', 'templates/images/products/9853_1483210760__12955060.jpg'),
(54, 16, 'products', 'templates/images/products/2800_1483210760__12957124.jpg'),
(55, 16, 'products', 'templates/images/products/1376_1483210760__12957125.jpg'),
(56, 16, 'products', 'templates/images/products/6601_1483210760__12957126.jpg'),
(57, 17, 'products', 'templates/images/products/2857_1483210907__13486170.jpg'),
(58, 17, 'products', 'templates/images/products/3255_1483210908__100000535.jpg'),
(59, 17, 'products', 'templates/images/products/4500_1483210908__100000566.jpg'),
(60, 17, 'products', 'templates/images/products/8845_1483210908__100000605.jpg'),
(61, 17, 'products', 'templates/images/products/9145_1483210908__100087930.jpg'),
(62, 18, 'products', 'templates/images/products/2788_1485424227__100122753.jpg'),
(63, 19, 'products', 'templates/images/products/2548_1485424347__11035277.jpg'),
(64, 19, 'products', 'templates/images/products/626_1485424347__11035278.jpg'),
(65, 19, 'products', 'templates/images/products/9282_1485424347__11035279.jpg'),
(66, 20, 'products', 'templates/images/products/4224_1485424834__9549136.jpg'),
(67, 20, 'products', 'templates/images/products/6535_1485424834__10640379.jpg'),
(68, 20, 'products', 'templates/images/products/6017_1485424834__10769798.jpg'),
(69, 21, 'products', 'templates/images/products/7438_1485425017__10769772.jpg'),
(70, 21, 'products', 'templates/images/products/5324_1485425017__10769798.jpg'),
(71, 22, 'products', 'templates/images/products/279_1485427077__9457081.jpg'),
(72, 22, 'products', 'templates/images/products/5588_1485427077__9549147.jpg'),
(73, 22, 'products', 'templates/images/products/4869_1485427077__10741256.jpg'),
(74, 22, 'products', 'templates/images/products/7927_1485427077__11308770.jpg'),
(75, 23, 'products', 'templates/images/products/9998_1485427342__10769758.jpg'),
(76, 23, 'products', 'templates/images/products/9908_1485427342__10769765.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE `main` (
  `site_name` varchar(255) NOT NULL,
  `site_url` varchar(255) NOT NULL,
  `site_tags` text NOT NULL,
  `site_disc` text NOT NULL,
  `site_status` varchar(255) NOT NULL,
  `close_msg` text NOT NULL,
  `sub_title` text NOT NULL,
  `id` int(11) NOT NULL,
  `site_mail` text NOT NULL,
  `site_contact` text NOT NULL,
  `site_copyrights` text NOT NULL,
  `about_us` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`site_name`, `site_url`, `site_tags`, `site_disc`, `site_status`, `close_msg`, `sub_title`, `id`, `site_mail`, `site_contact`, `site_copyrights`, `about_us`) VALUES
('Weza', 'https://weza-store.000webhostapp.com/', 'mona,arts,awearts,design,development', 'awearts for webdevelopment', 'Open', '<p><strong>Sorry The Site Is under Repair</strong></p>', 'Welcome To Our <span>Weza Online Store</span> Check Our Latest Products', 1, 'monaabdo88@gmail.com', '<p>monaabdo88@gmail.com</p>', '<p>All CopyRights Resrved to monaabdo88 &nbsp;&amp;&amp; &nbsp;Weza OnlineStore</p>', '<p style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br />Ut enim ad minim veniam, quis nostrud exercitation <br />ullamco laboris nisi ut aliquip ex ea commodo consequat.<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br />Ut enim ad minim veniam, quis nostrud exercitation <br />ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `ref` text NOT NULL,
  `c_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `price`, `ref`, `c_id`, `qty`, `order_date`, `status`) VALUES
(1, 1200, '2017:01:15 02:42:15-638539311', 6, 2, '2017-01-15', 'in Progress'),
(2, 940, '2017:01:15 03:11:53-655126818', 6, 2, '2017-01-15', 'in Progress');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `partner_id` int(11) NOT NULL,
  `partner_img` text NOT NULL,
  `partner_title` text NOT NULL,
  `partner_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`partner_id`, `partner_img`, `partner_title`, `partner_url`) VALUES
(1, 'templates/images/partners/6743_1482855393_bbc-logo.png', 'BBC', 'http://www.bbc.com/'),
(2, 'templates/images/partners/123_1482855520_cnn-logo.png', 'CNN', 'http://edition.cnn.com/'),
(3, 'templates/images/partners/3460_1482855552_forbes.png', 'Forbes', 'http://www.forbes.com/'),
(4, 'templates/images/partners/5208_1482855592_techradar-logo.png', 'techradar', 'http://www.techradar.com/'),
(5, 'templates/images/partners/6712_1482855626_wired.png', 'Wired', 'https://www.wired.com/'),
(6, 'templates/images/partners/6990_1483347937_wsj.png', 'WJS', 'www.wjs.com');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` text NOT NULL,
  `trx_id` text NOT NULL,
  `currency` text NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `amount`, `user_id`, `product_id`, `trx_id`, `currency`, `payment_date`) VALUES
(1, 1200, 6, '2017:01:15 02:42:15-638539311', '51628437LA3446724', 'USD', '2017-01-15'),
(2, 940, 6, '2017:01:15 03:11:53-655126818', '2LK93325T0270361N', 'USD', '2017-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` text NOT NULL,
  `product_image` text NOT NULL,
  `product_cat` varchar(255) NOT NULL,
  `product_brand` varchar(255) NOT NULL,
  `product_disc` longtext NOT NULL,
  `product_price` text NOT NULL,
  `product_keywords` text NOT NULL,
  `product_discount` int(11) NOT NULL,
  `product_delivery` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_image`, `product_cat`, `product_brand`, `product_disc`, `product_price`, `product_keywords`, `product_discount`, `product_delivery`, `product_qty`, `view`) VALUES
(1, 'Imoen Opulent Orient Jacquard Fit & Flare Dress', 'templates/images/products/7610_1482849879__13213081.jpg', '1', '1', '<div style=\"font-size: 12px; line-height: 1.5; color: #393939; font-family: Arial, Helvetica, sans-serif; padding: 0px;\" data-reactid=\".zvmu2k2ha8.0.0.1.4.1.3.1.2.1.0.0.0\">\r\n<h5 style=\"font-size: 1.2rem; line-height: 1.5; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;\"><strong>Graceful tailoring and beautifully gilded floral jacquard combine for a rich cocktail dress classically styled to fit at the cap-sleeve bodice and flare at the above-knee skirt.</strong></h5>\r\n</div>\r\n<ul style=\"margin: 1em 0px; padding: 0px 0px 0px 1.4em; color: #393939; font-family: Arial, Helvetica, sans-serif; font-size: 12px;\" data-reactid=\".zvmu2k2ha8.0.0.1.4.1.3.1.2.1.0.0.1\">\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".zvmu2k2ha8.0.0.1.4.1.3.1.2.1.0.0.1.0:$Exposed back-zip closure\">\r\n<h5>Exposed back-zip closure</h5>\r\n</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".zvmu2k2ha8.0.0.1.4.1.3.1.2.1.0.0.1.0:$Jewel neck\">\r\n<h5>Jewel neck</h5>\r\n</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".zvmu2k2ha8.0.0.1.4.1.3.1.2.1.0.0.1.0:$Cap sleeves\">\r\n<h5>Cap sleeves</h5>\r\n</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".zvmu2k2ha8.0.0.1.4.1.3.1.2.1.0.0.1.0:$Fitted waist\">\r\n<h5>Fitted waist</h5>\r\n</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".zvmu2k2ha8.0.0.1.4.1.3.1.2.1.0.0.1.0:$Lined\">\r\n<h5>Lined</h5>\r\n</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".zvmu2k2ha8.0.0.1.4.1.3.1.2.1.0.0.1.0:$64% polyester, 26% viscose, 10% metallic fibers\">\r\n<h5>64% polyester, 26% viscose, 10% metallic fibers</h5>\r\n</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".zvmu2k2ha8.0.0.1.4.1.3.1.2.1.0.0.1.0:$Dry clean\">\r\n<h5>Dry clean</h5>\r\n</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".zvmu2k2ha8.0.0.1.4.1.3.1.2.1.0.0.1.0:$Imported\">\r\n<h5>Imported</h5>\r\n</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".zvmu2k2ha8.0.0.1.4.1.3.1.2.1.0.0.1.0:$Individualist\">\r\n<h5>Individualist</h5>\r\n</li>\r\n</ul>', '150', '<p>women,dresses,</p>\r\n<h2 style=\"font-size: 1.8rem; color: #393939; font-family: Georgia, Times, serif; font-weight: 400; margin: 0px;\" data-reactid=\".zvmu2k2ha8.0.0.1.4.1.1.0.0.0\"><a style=\"outline: 0px; font-size: 1.8rem; color: #393939; border-bottom: 2px solid transparent; transition: border-color 0.3s; text-decoration: none;\" href=\"http://shop.nordstrom.com/c/ted-baker-london?origin=productBrandLink\" data-reactid=\".zvmu2k2ha8.0.0.1.4.1.1.0.0.0.0\"><span data-reactid=\".zvmu2k2ha8.0.0.1.4.1.1.0.0.0.0.0\">Ted Baker London</span></a></h2>', 0, 25, 150, 3),
(2, 'Short Sleeve Sequin Mesh Gown (Regular & Petite)', 'templates/images/products/1190_1482850062__8812065.jpg', '1', '1', '<div style=\"font-size: 12px; line-height: 1.5; color: #393939; font-family: Arial, Helvetica, sans-serif; padding: 0px;\" data-reactid=\".ktocatvr40.0.0.1.4.1.3.1.2.1.0.0.0\">\r\n<p style=\"font-size: 1.2rem; line-height: 1.5; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;\">Sparkling embellishments swirl around this wildly flattering short-sleeve gown that flares toward the trailing fishtail hem.</p>\r\n</div>\r\n<ul style=\"margin: 1em 0px; padding: 0px 0px 0px 1.4em; color: #393939; font-family: Arial, Helvetica, sans-serif; font-size: 12px;\" data-reactid=\".ktocatvr40.0.0.1.4.1.3.1.2.1.0.0.1\">\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".ktocatvr40.0.0.1.4.1.3.1.2.1.0.0.1.0:$60&quot; regular length, 8&quot; train (size 8); 56 1/2&quot; petite length, 7&quot; train (size 8P)=1\">60\" regular length, 8\" train (size 8); 56 1/2\" petite length, 7\" train (size 8P).</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".ktocatvr40.0.0.1.4.1.3.1.2.1.0.0.1.0:$Hidden back-zip closure=1\">Hidden back-zip closure.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".ktocatvr40.0.0.1.4.1.3.1.2.1.0.0.1.0:$Jewel neck=1\">Jewel neck.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".ktocatvr40.0.0.1.4.1.3.1.2.1.0.0.1.0:$Sheer short sleeves=1\">Sheer short sleeves.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".ktocatvr40.0.0.1.4.1.3.1.2.1.0.0.1.0:$Scooped back=1\">Scooped back.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".ktocatvr40.0.0.1.4.1.3.1.2.1.0.0.1.0:$Slightly stretchy beaded mesh=1\">Slightly stretchy beaded mesh.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".ktocatvr40.0.0.1.4.1.3.1.2.1.0.0.1.0:$Lined=1\">Lined.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".ktocatvr40.0.0.1.4.1.3.1.2.1.0.0.1.0:$100% polyester=1\">100% polyester.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".ktocatvr40.0.0.1.4.1.3.1.2.1.0.0.1.0:$Spot clean=1\">Spot clean.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".ktocatvr40.0.0.1.4.1.3.1.2.1.0.0.1.0:$By Adrianna Papell; imported=1\">By Adrianna Papell; imported.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".ktocatvr40.0.0.1.4.1.3.1.2.1.0.0.1.0:$Special Occasion=1\">Special Occasion.</li>\r\n</ul>', '650', '<p>women,dresses,</p>\r\n<h2 style=\"font-size: 1.8rem; color: #393939; font-family: Georgia, Times, serif; font-weight: 400; margin: 0px;\" data-reactid=\".ktocatvr40.0.0.1.4.1.1.0.0.0\"><a style=\"font-size: 1.8rem; color: #393939; border-bottom: 2px solid transparent; transition: border-color 0.3s; text-decoration: none;\" href=\"http://shop.nordstrom.com/c/adrianna-papell?origin=productBrandLink\" data-reactid=\".ktocatvr40.0.0.1.4.1.1.0.0.0.0\"><span data-reactid=\".ktocatvr40.0.0.1.4.1.1.0.0.0.0.0\">Adrianna Papell</span></a></h2>', 0, 50, 20, 3),
(3, 'Illusion Yoke Lace Gown', 'templates/images/products/7706_1482850206__13021246.jpg', '1', '1', '<div style=\"font-size: 12px; line-height: 1.5; color: #393939; font-family: Arial, Helvetica, sans-serif; padding: 0px;\" data-reactid=\".3tgpg197nk.0.0.1.4.1.3.1.2.1.0.0.0\">\r\n<p style=\"font-size: 1.2rem; line-height: 1.5; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;\">This illusion-yoke lace gown gets its incredibly flattering shape from a scalloped bateau neckline, crisscrossed Empire waist and slenderizing princess seams that flounce toward the flared hem.</p>\r\n</div>\r\n<ul style=\"margin: 1em 0px; padding: 0px 0px 0px 1.4em; color: #393939; font-family: Arial, Helvetica, sans-serif; font-size: 12px;\" data-reactid=\".3tgpg197nk.0.0.1.4.1.3.1.2.1.0.0.1\">\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".3tgpg197nk.0.0.1.4.1.3.1.2.1.0.0.1.0:$62&quot; front length; 69&quot; back length (size 8)=1\">62\" front length; 69\" back length (size 8).</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".3tgpg197nk.0.0.1.4.1.3.1.2.1.0.0.1.0:$Back zip closure=1\">Back zip closure.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".3tgpg197nk.0.0.1.4.1.3.1.2.1.0.0.1.0:$Illusion yoke with bateau neck=1\">Illusion yoke with bateau neck.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".3tgpg197nk.0.0.1.4.1.3.1.2.1.0.0.1.0:$Sheer three-quarter sleeves=1\">Sheer three-quarter sleeves.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".3tgpg197nk.0.0.1.4.1.3.1.2.1.0.0.1.0:$Lined=1\">Lined.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".3tgpg197nk.0.0.1.4.1.3.1.2.1.0.0.1.0:$95% polyester, 5% elastane=1\">95% polyester, 5% elastane.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".3tgpg197nk.0.0.1.4.1.3.1.2.1.0.0.1.0:$Spot clean=1\">Spot clean.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".3tgpg197nk.0.0.1.4.1.3.1.2.1.0.0.1.0:$By Adrianna Papell; imported=1\">By Adrianna Papell; imported.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".3tgpg197nk.0.0.1.4.1.3.1.2.1.0.0.1.0:$Special Occasion=1\">Special Occasion.</li>\r\n</ul>', '700', '<p>women,dresses,</p>\r\n<h2 style=\"font-size: 1.8rem; color: #393939; font-family: Georgia, Times, serif; font-weight: 400; margin: 0px;\" data-reactid=\".3tgpg197nk.0.0.1.4.1.1.0.0.0\"><a style=\"font-size: 1.8rem; color: #393939; border-bottom: 2px solid transparent; transition: border-color 0.3s; text-decoration: none;\" href=\"http://shop.nordstrom.com/c/adrianna-papell?origin=productBrandLink\" data-reactid=\".3tgpg197nk.0.0.1.4.1.1.0.0.0.0\"><span data-reactid=\".3tgpg197nk.0.0.1.4.1.1.0.0.0.0.0\">Adrianna Papell</span></a></h2>', 0, 65, 20, 0),
(4, 'Lace Column Gown (Regular & Petite)', 'templates/images/products/9282_1482850357__12297483.jpg', '1', '1', '<div style=\"font-size: 12px; line-height: 1.5; color: #393939; font-family: Arial, Helvetica, sans-serif; padding: 0px;\" data-reactid=\".jz2oiffi0w.0.0.1.4.1.3.1.2.1.0.0.0\">\r\n<p style=\"font-size: 1.2rem; line-height: 1.5; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;\">Lavish corded lace adds regal power to the figure-skimming silhouette of this illusion-yoke gown.</p>\r\n</div>\r\n<ul style=\"margin: 1em 0px; padding: 0px 0px 0px 1.4em; color: #393939; font-family: Arial, Helvetica, sans-serif; font-size: 12px;\" data-reactid=\".jz2oiffi0w.0.0.1.4.1.3.1.2.1.0.0.1\">\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".jz2oiffi0w.0.0.1.4.1.3.1.2.1.0.0.1.0:$Regular=2 60&quot; front length; 64&quot; back length (size 8)=1\">Regular: 60\" front length; 64\" back length (size 8).</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".jz2oiffi0w.0.0.1.4.1.3.1.2.1.0.0.1.0:$Petite=2 59&quot; front length; 63&quot; back length (size 8P)=1\">Petite: 59\" front length; 63\" back length (size 8P).</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".jz2oiffi0w.0.0.1.4.1.3.1.2.1.0.0.1.0:$Back zip closure=1\">Back zip closure.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".jz2oiffi0w.0.0.1.4.1.3.1.2.1.0.0.1.0:$Midweight slightly stretchy lace=1\">Midweight slightly stretchy lace.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".jz2oiffi0w.0.0.1.4.1.3.1.2.1.0.0.1.0:$Lined=1\">Lined.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".jz2oiffi0w.0.0.1.4.1.3.1.2.1.0.0.1.0:$60% rayon, 20% polyester, 20% nylon=1\">60% rayon, 20% polyester, 20% nylon.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".jz2oiffi0w.0.0.1.4.1.3.1.2.1.0.0.1.0:$Dry clean=1\">Dry clean.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".jz2oiffi0w.0.0.1.4.1.3.1.2.1.0.0.1.0:$By Tadashi Shoji; imported=1\">By Tadashi Shoji; imported.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".jz2oiffi0w.0.0.1.4.1.3.1.2.1.0.0.1.0:$Special Occasion=1\">Special Occasion.</li>\r\n</ul>', '650', '<p>women,dresses,</p>\r\n<section class=\"brand-title\" style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: 10px;\" data-reactid=\".jz2oiffi0w.0.0.1.4.1.1.0.0\">\r\n<h2 style=\"font-size: 1.8rem; color: #393939; font-family: Georgia, Times, serif; font-weight: 400; margin: 0px;\" data-reactid=\".jz2oiffi0w.0.0.1.4.1.1.0.0.0\"><span style=\"font-size: 1.8rem; color: #393939; border-bottom: 2px solid transparent; transition: border-color 0.3s; text-decoration: none;\" data-reactid=\".jz2oiffi0w.0.0.1.4.1.1.0.0.0.0.0\"><a style=\"font-size: 1.8rem; color: #393939; border-bottom: 2px solid transparent; transition: border-color 0.3s; text-decoration: none;\" href=\"http://shop.nordstrom.com/c/tadashi-shoji?origin=productBrandLink\" data-reactid=\".jz2oiffi0w.0.0.1.4.1.1.0.0.0.0\">Tadashi Shoji</a></span></h2>\r\n<p>&nbsp;</p>\r\n</section>\r\n<section class=\"np-product-title\" style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: 10px;\" data-reactid=\".jz2oiffi0w.0.0.1.4.1.1.0.1\"></section>', 0, 25, 100, 0),
(5, 'Beaded Mesh Gown (Regular & Petite)', 'templates/images/products/5785_1482850950__11000603.jpg', '1', '1', '<div style=\"font-size: 12px; line-height: 1.5; color: #393939; font-family: Arial, Helvetica, sans-serif; padding: 0px;\" data-reactid=\".sruvk0oxkw.0.0.1.4.1.3.1.2.1.0.0.0\">\r\n<p style=\"font-size: 1.2rem; line-height: 1.5; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;\">Twinkling beads trace a dazzling diamond motif atop the filmy overlay of a mesh gown. Frosty beads frame the bodice and highlight the waist before the silhouette tapers to a wispy, godet-flared finish.</p>\r\n</div>\r\n<ul style=\"margin: 1em 0px; padding: 0px 0px 0px 1.4em; color: #393939; font-family: Arial, Helvetica, sans-serif; font-size: 12px;\" data-reactid=\".sruvk0oxkw.0.0.1.4.1.3.1.2.1.0.0.1\">\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".sruvk0oxkw.0.0.1.4.1.3.1.2.1.0.0.1.0:$60&quot; regular length (size 8); 56&quot; petite length (size 8P)=1\">60\" regular length (size 8); 56\" petite length (size 8P).</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".sruvk0oxkw.0.0.1.4.1.3.1.2.1.0.0.1.0:$Hidden back zip with hook-and-eye closure; back keyhole closure=1\">Hidden back zip with hook-and-eye closure; back keyhole closure.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".sruvk0oxkw.0.0.1.4.1.3.1.2.1.0.0.1.0:$Fully lined=1\">Fully lined.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".sruvk0oxkw.0.0.1.4.1.3.1.2.1.0.0.1.0:$100% polyester=1\">100% polyester.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".sruvk0oxkw.0.0.1.4.1.3.1.2.1.0.0.1.0:$Spot clean=1\">Spot clean.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".sruvk0oxkw.0.0.1.4.1.3.1.2.1.0.0.1.0:$By Adrianna Papell; imported=1\">By Adrianna Papell; imported.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".sruvk0oxkw.0.0.1.4.1.3.1.2.1.0.0.1.0:$Special Occasion=1\">Special Occasion.</li>\r\n</ul>', '650', '<p>women,dresses,</p>\r\n<section class=\"brand-title\" style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: 10px;\" data-reactid=\".sruvk0oxkw.0.0.1.4.1.1.0.0\">\r\n<h2 style=\"font-size: 1.8rem; color: #393939; font-family: Georgia, Times, serif; font-weight: 400; margin: 0px;\" data-reactid=\".sruvk0oxkw.0.0.1.4.1.1.0.0.0\"><span style=\"font-size: 1.8rem; color: #393939; border-bottom: 2px solid transparent; transition: border-color 0.3s; text-decoration: none;\" data-reactid=\".sruvk0oxkw.0.0.1.4.1.1.0.0.0.0.0\"><a style=\"font-size: 1.8rem; color: #393939; border-bottom: 2px solid transparent; transition: border-color 0.3s; text-decoration: none;\" href=\"http://shop.nordstrom.com/c/adrianna-papell?origin=productBrandLink\" data-reactid=\".sruvk0oxkw.0.0.1.4.1.1.0.0.0.0\">Adrianna Papell</a></span></h2>\r\n<p>&nbsp;</p>\r\n</section>\r\n<section class=\"np-product-title\" style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: 10px;\" data-reactid=\".sruvk0oxkw.0.0.1.4.1.1.0.1\"></section>', 0, 50, 150, 4),
(6, 'Embroidered Lace Gown (Regular & Petite)', 'templates/images/products/2728_1482851222__100018854.jpg', '1', '1', '<div style=\"font-size: 12px; line-height: 1.5; color: #393939; font-family: Arial, Helvetica, sans-serif; padding: 0px;\" data-reactid=\".1saf991lhc0.0.0.1.4.1.3.1.2.1.0.0.0\">\r\n<p style=\"font-size: 1.2rem; line-height: 1.5; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;\">A sheer lace bodice with floral embroidery and corded detailing heightens the romantic charm of this classic evening dress designed with a floor-pooling black skirt.</p>\r\n</div>\r\n<ul style=\"margin: 1em 0px; padding: 0px 0px 0px 1.4em; color: #393939; font-family: Arial, Helvetica, sans-serif; font-size: 12px;\" data-reactid=\".1saf991lhc0.0.0.1.4.1.3.1.2.1.0.0.1\">\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1saf991lhc0.0.0.1.4.1.3.1.2.1.0.0.1.0:$Regular=2 61&quot; front length; 66&quot; back length (size 8)=1\">Regular: 61\" front length; 66\" back length (size 8).</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1saf991lhc0.0.0.1.4.1.3.1.2.1.0.0.1.0:$Petite=2 56 1/2&quot; front length; 61 1/2&quot; back length (size 8P)=1\">Petite: 56 1/2\" front length; 61 1/2\" back length (size 8P).</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1saf991lhc0.0.0.1.4.1.3.1.2.1.0.0.1.0:$Back zip closure=1\">Back zip closure.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1saf991lhc0.0.0.1.4.1.3.1.2.1.0.0.1.0:$Bateau neck=1\">Bateau neck.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1saf991lhc0.0.0.1.4.1.3.1.2.1.0.0.1.0:$Three-quarter sleeves=1\">Three-quarter sleeves.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1saf991lhc0.0.0.1.4.1.3.1.2.1.0.0.1.0:$Midweight, nonstretch fabric=1\">Midweight, nonstretch fabric.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1saf991lhc0.0.0.1.4.1.3.1.2.1.0.0.1.0:$Partially lined=1\">Partially lined.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1saf991lhc0.0.0.1.4.1.3.1.2.1.0.0.1.0:$60% polyester, 40% nylon bodice with 100% polyester skirt=1\">60% polyester, 40% nylon bodice with 100% polyester skirt.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1saf991lhc0.0.0.1.4.1.3.1.2.1.0.0.1.0:$Dry clean=1\">Dry clean.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1saf991lhc0.0.0.1.4.1.3.1.2.1.0.0.1.0:$By Tadashi Shoji; imported=1\">By Tadashi Shoji; imported.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1saf991lhc0.0.0.1.4.1.3.1.2.1.0.0.1.0:$Special Occasion=1\">Special Occasion.</li>\r\n</ul>', '350', '<p>women,dresses,</p>\r\n<h2 style=\"font-size: 1.8rem; color: #393939; font-family: Georgia, Times, serif; font-weight: 400; margin: 0px;\" data-reactid=\".1saf991lhc0.0.0.1.4.1.1.0.0.0\"><a style=\"font-size: 1.8rem; color: #393939; border-bottom: 2px solid transparent; transition: border-color 0.3s; text-decoration: none;\" href=\"http://shop.nordstrom.com/c/tadashi-shoji?origin=productBrandLink\" data-reactid=\".1saf991lhc0.0.0.1.4.1.1.0.0.0.0\"><span data-reactid=\".1saf991lhc0.0.0.1.4.1.1.0.0.0.0.0\">Tadashi Shoji</span></a></h2>', 50, 20, 20, 3),
(7, 'Sequin Bodice Taffeta Ballgown', 'templates/images/products/2022_1482851826__12901215.jpg', '1', '1', '<div style=\"font-size: 12px; line-height: 1.5; color: #393939; font-family: Arial, Helvetica, sans-serif; padding: 0px;\" data-reactid=\".h23jfxro5c.0.0.1.4.1.3.1.2.1.0.0.0\">\r\n<p style=\"font-size: 1.2rem; line-height: 1.5; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;\">Flickering sequins top this classical ballgown crafted with a satiny taffeta skirt perfectly pleated to accentuate your waist.</p>\r\n</div>\r\n<ul style=\"margin: 1em 0px; padding: 0px 0px 0px 1.4em; color: #393939; font-family: Arial, Helvetica, sans-serif; font-size: 12px;\" data-reactid=\".h23jfxro5c.0.0.1.4.1.3.1.2.1.0.0.1\">\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".h23jfxro5c.0.0.1.4.1.3.1.2.1.0.0.1.0:$53 1/2&quot; length (size 6)\">53 1/2\" length (size 6)</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".h23jfxro5c.0.0.1.4.1.3.1.2.1.0.0.1.0:$Back zip closure\">Back zip closure</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".h23jfxro5c.0.0.1.4.1.3.1.2.1.0.0.1.0:$Jewel neck\">Jewel neck</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".h23jfxro5c.0.0.1.4.1.3.1.2.1.0.0.1.0:$Sheer short sleeves\">Sheer short sleeves</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".h23jfxro5c.0.0.1.4.1.3.1.2.1.0.0.1.0:$Side-seam pockets\">Side-seam pockets</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".h23jfxro5c.0.0.1.4.1.3.1.2.1.0.0.1.0:$Scooped back\">Scooped back</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".h23jfxro5c.0.0.1.4.1.3.1.2.1.0.0.1.0:$Lined\">Lined</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".h23jfxro5c.0.0.1.4.1.3.1.2.1.0.0.1.0:$Spot clean\">Spot clean</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".h23jfxro5c.0.0.1.4.1.3.1.2.1.0.0.1.0:$100% polyester\">100% polyester</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".h23jfxro5c.0.0.1.4.1.3.1.2.1.0.0.1.0:$Imported\">Imported</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".h23jfxro5c.0.0.1.4.1.3.1.2.1.0.0.1.0:$Special Occasion\">Special Occasion</li>\r\n</ul>', '850', '<p>women,dresses,</p>\r\n<section class=\"brand-title\" style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: 10px;\" data-reactid=\".h23jfxro5c.0.0.1.4.1.1.0.0\">\r\n<h2 style=\"font-size: 1.8rem; color: #393939; font-family: Georgia, Times, serif; font-weight: 400; margin: 0px;\" data-reactid=\".h23jfxro5c.0.0.1.4.1.1.0.0.0\"><span style=\"font-size: 1.8rem; color: #393939; border-bottom: 2px solid transparent; transition: border-color 0.3s; text-decoration: none;\" data-reactid=\".h23jfxro5c.0.0.1.4.1.1.0.0.0.0.0\"><a style=\"font-size: 1.8rem; color: #393939; border-bottom: 2px solid transparent; transition: border-color 0.3s; text-decoration: none;\" href=\"http://shop.nordstrom.com/c/adrianna-papell?origin=productBrandLink\" data-reactid=\".h23jfxro5c.0.0.1.4.1.1.0.0.0.0\">Adrianna Papell</a></span></h2>\r\n<p>&nbsp;</p>\r\n</section>\r\n<section class=\"np-product-title\" style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: 10px;\" data-reactid=\".h23jfxro5c.0.0.1.4.1.1.0.1\"></section>', 250, 50, 65, 2),
(8, 'Lace & Chiffon Gown (Regular & Petite)', 'templates/images/products/8322_1482851947__12197000.jpg', '1', '1', '<div style=\"font-size: 12px; line-height: 1.5; color: #393939; font-family: Arial, Helvetica, sans-serif; padding: 0px;\" data-reactid=\".wb16btmlmo.0.0.1.4.1.3.1.2.1.0.0.0\">\r\n<p style=\"font-size: 1.2rem; line-height: 1.5; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;\">Built to highlight your every move in elegant, fluttering chiffon, this lace-bodice gown is also comfortable and classic.</p>\r\n</div>\r\n<ul style=\"margin: 1em 0px; padding: 0px 0px 0px 1.4em; color: #393939; font-family: Arial, Helvetica, sans-serif; font-size: 12px;\" data-reactid=\".wb16btmlmo.0.0.1.4.1.3.1.2.1.0.0.1\">\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".wb16btmlmo.0.0.1.4.1.3.1.2.1.0.0.1.0:$60&quot; regular length (size 8); 56&quot; petite length (size 8P)=1\">60\" regular length (size 8); 56\" petite length (size 8P).</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".wb16btmlmo.0.0.1.4.1.3.1.2.1.0.0.1.0:$Back zip closure=1\">Back zip closure.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".wb16btmlmo.0.0.1.4.1.3.1.2.1.0.0.1.0:$Illusion yoke=1\">Illusion yoke.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".wb16btmlmo.0.0.1.4.1.3.1.2.1.0.0.1.0:$Sleeveless=1\">Sleeveless.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".wb16btmlmo.0.0.1.4.1.3.1.2.1.0.0.1.0:$Lined=1\">Lined.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".wb16btmlmo.0.0.1.4.1.3.1.2.1.0.0.1.0:$100% nylon with 100% polyester contrast=1\">100% nylon with 100% polyester contrast.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".wb16btmlmo.0.0.1.4.1.3.1.2.1.0.0.1.0:$Hand wash cold, line dry=1\">Hand wash cold, line dry.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".wb16btmlmo.0.0.1.4.1.3.1.2.1.0.0.1.0:$By Eliza J; imported=1\">By Eliza J; imported.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".wb16btmlmo.0.0.1.4.1.3.1.2.1.0.0.1.0:$Special Occasion=1\">Special Occasion.</li>\r\n</ul>', '550', '<p>women,dresses,</p>\r\n<section class=\"brand-title\" style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: 10px;\" data-reactid=\".wb16btmlmo.0.0.1.4.1.1.0.0\">\r\n<h2 style=\"font-size: 1.8rem; color: #393939; font-family: Georgia, Times, serif; font-weight: 400; margin: 0px;\" data-reactid=\".wb16btmlmo.0.0.1.4.1.1.0.0.0\"><span style=\"outline: 0px; font-size: 1.8rem; color: #393939; border-bottom: 2px solid #393939; transition: border-color 0.3s; text-decoration: none;\" data-reactid=\".wb16btmlmo.0.0.1.4.1.1.0.0.0.0.0\"><a style=\"outline: 0px; font-size: 1.8rem; color: #393939; border-bottom: 2px solid #393939; transition: border-color 0.3s; text-decoration: none;\" href=\"http://shop.nordstrom.com/c/eliza-j?origin=productBrandLink\" data-reactid=\".wb16btmlmo.0.0.1.4.1.1.0.0.0.0\">Eliza J</a></span></h2>\r\n<p>&nbsp;</p>\r\n</section>\r\n<section class=\"np-product-title\" style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: 10px;\" data-reactid=\".wb16btmlmo.0.0.1.4.1.1.0.1\"></section>', 50, 50, 25, 1),
(9, 'Metallic Lace & Jersey Gown (Regular & Petite)', 'templates/images/products/3194_1482852064__11486187.jpg', '1', '1', '<div style=\"font-size: 12px; line-height: 1.5; color: #393939; font-family: Arial, Helvetica, sans-serif; padding: 0px;\" data-reactid=\".2epez927fgg.0.0.1.4.1.3.1.2.1.0.0.0\">\r\n<p style=\"font-size: 1.2rem; line-height: 1.5; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;\">A scalloped sheer neckline flecked with shimmery threads brings an elegant look to this polished evening gown that contours your figure with thoughtful ruching through the long, lean silhouette.</p>\r\n</div>\r\n<ul style=\"margin: 1em 0px; padding: 0px 0px 0px 1.4em; color: #393939; font-family: Arial, Helvetica, sans-serif; font-size: 12px;\" data-reactid=\".2epez927fgg.0.0.1.4.1.3.1.2.1.0.0.1\">\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".2epez927fgg.0.0.1.4.1.3.1.2.1.0.0.1.0:$58&quot; front length (size 8); 53&quot; petite length (size 8P)\">58\" front length (size 8); 53\" petite length (size 8P)</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".2epez927fgg.0.0.1.4.1.3.1.2.1.0.0.1.0:$Back zip closure\">Back zip closure</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".2epez927fgg.0.0.1.4.1.3.1.2.1.0.0.1.0:$Bateau neck\">Bateau neck</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".2epez927fgg.0.0.1.4.1.3.1.2.1.0.0.1.0:$Cap sleeves\">Cap sleeves</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".2epez927fgg.0.0.1.4.1.3.1.2.1.0.0.1.0:$Fully lined\">Fully lined</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".2epez927fgg.0.0.1.4.1.3.1.2.1.0.0.1.0:$70% polyester, 30% metallic fibers with 100% polyester contrast\">70% polyester, 30% metallic fibers with 100% polyester contrast</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".2epez927fgg.0.0.1.4.1.3.1.2.1.0.0.1.0:$Professional spot clean\">Professional spot clean</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".2epez927fgg.0.0.1.4.1.3.1.2.1.0.0.1.0:$Imported\">Imported</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".2epez927fgg.0.0.1.4.1.3.1.2.1.0.0.1.0:$Special Occasion\">Special Occasion</li>\r\n</ul>', '650', '<p>women,dresses,</p>\r\n<section class=\"brand-title\" style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: 10px;\" data-reactid=\".2epez927fgg.0.0.1.4.1.1.0.0\">\r\n<h2 style=\"font-size: 1.8rem; color: #393939; font-family: Georgia, Times, serif; font-weight: 400; margin: 0px;\" data-reactid=\".2epez927fgg.0.0.1.4.1.1.0.0.0\"><span style=\"font-size: 1.8rem; color: #393939; border-bottom: 2px solid transparent; transition: border-color 0.3s; text-decoration: none;\" data-reactid=\".2epez927fgg.0.0.1.4.1.1.0.0.0.0.0\"><a style=\"font-size: 1.8rem; color: #393939; border-bottom: 2px solid transparent; transition: border-color 0.3s; text-decoration: none;\" href=\"http://shop.nordstrom.com/c/xscape?origin=productBrandLink\" data-reactid=\".2epez927fgg.0.0.1.4.1.1.0.0.0.0\">Xscape</a></span></h2>\r\n<p>&nbsp;</p>\r\n</section>\r\n<section class=\"np-product-title\" style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: 10px;\" data-reactid=\".2epez927fgg.0.0.1.4.1.1.0.1\"></section>', 0, 50, 50, 9),
(10, 'Colorblock Lace Gown', 'templates/images/products/3519_1482852873__13053372.jpg', '1', '1', '<div style=\"font-size: 12px; line-height: 1.5; color: #393939; font-family: Arial, Helvetica, sans-serif; padding: 0px;\" data-reactid=\".78rt2qw16o.0.0.1.4.1.3.1.2.1.0.0.0\">\r\n<p style=\"font-size: 1.2rem; line-height: 1.5; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;\">Contrasting lace panels trimmed in scalloped eyelash fringe accentuate and slim all the right areas in this classic fit-and-flare gown.</p>\r\n</div>\r\n<ul style=\"margin: 1em 0px; padding: 0px 0px 0px 1.4em; color: #393939; font-family: Arial, Helvetica, sans-serif; font-size: 12px;\" data-reactid=\".78rt2qw16o.0.0.1.4.1.3.1.2.1.0.0.1\">\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".78rt2qw16o.0.0.1.4.1.3.1.2.1.0.0.1.0:$62&quot; length (size 8)\">62\" length (size 8)</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".78rt2qw16o.0.0.1.4.1.3.1.2.1.0.0.1.0:$Back zip closure\">Back zip closure</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".78rt2qw16o.0.0.1.4.1.3.1.2.1.0.0.1.0:$Jewel neck\">Jewel neck</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".78rt2qw16o.0.0.1.4.1.3.1.2.1.0.0.1.0:$Short sleeves\">Short sleeves</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".78rt2qw16o.0.0.1.4.1.3.1.2.1.0.0.1.0:$Fully lined\">Fully lined</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".78rt2qw16o.0.0.1.4.1.3.1.2.1.0.0.1.0:$74% polyester, 26% nylon\">74% polyester, 26% nylon</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".78rt2qw16o.0.0.1.4.1.3.1.2.1.0.0.1.0:$Dry clean\">Dry clean</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".78rt2qw16o.0.0.1.4.1.3.1.2.1.0.0.1.0:$Imported\">Imported</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".78rt2qw16o.0.0.1.4.1.3.1.2.1.0.0.1.0:$Special Occasion\">Special Occasion</li>\r\n</ul>', '650', '<p>women,dresses,</p>\r\n<section class=\"brand-title\" style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: 10px;\" data-reactid=\".78rt2qw16o.0.0.1.4.1.1.0.0\">\r\n<h2 style=\"font-size: 1.8rem; color: #393939; font-family: Georgia, Times, serif; font-weight: 400; margin: 0px;\" data-reactid=\".78rt2qw16o.0.0.1.4.1.1.0.0.0\"><span style=\"outline: 0px; font-size: 1.8rem; color: #393939; border-bottom: 2px solid #393939; transition: border-color 0.3s; text-decoration: none;\" data-reactid=\".78rt2qw16o.0.0.1.4.1.1.0.0.0.0.0\"><a style=\"outline: 0px; font-size: 1.8rem; color: #393939; border-bottom: 2px solid #393939; transition: border-color 0.3s; text-decoration: none;\" href=\"http://shop.nordstrom.com/c/adrianna-papell?origin=productBrandLink\" data-reactid=\".78rt2qw16o.0.0.1.4.1.1.0.0.0.0\">Adrianna Papell</a></span></h2>\r\n<p>&nbsp;</p>\r\n</section>\r\n<section class=\"np-product-title\" style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: 10px;\" data-reactid=\".78rt2qw16o.0.0.1.4.1.1.0.1\"></section>', 150, 50, 20, 2),
(11, 'Seamed Ponte Sheath Dress (Regular & Petite)', 'templates/images/products/6272_1482861678__13323456.jpg', '1', '1', '<div style=\"font-size: 12px; line-height: 1.5; color: #393939; font-family: Arial, Helvetica, sans-serif; padding: 0px;\" data-reactid=\".1rt198yt1q8.0.0.1.4.1.3.1.2.1.0.0.0\">\r\n<p style=\"font-size: 1.2rem; line-height: 1.5; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;\">Asymmetrical&nbsp;seaming at the waist and hips creates a figure-flattering silhouette for this polished sheath dress cut from a stretchy ponte&nbsp;fabric.</p>\r\n</div>\r\n<ul style=\"margin: 1em 0px; padding: 0px 0px 0px 1.4em; color: #393939; font-family: Arial, Helvetica, sans-serif; font-size: 12px;\" data-reactid=\".1rt198yt1q8.0.0.1.4.1.3.1.2.1.0.0.1\">\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1rt198yt1q8.0.0.1.4.1.3.1.2.1.0.0.1.0:$39&quot; regular length (size 8); 37 1/2&quot; petite length (size 8P)=1\">39\" regular length (size 8); 37 1/2\" petite length (size 8P).</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1rt198yt1q8.0.0.1.4.1.3.1.2.1.0.0.1.0:$Back zip closure=1\">Back zip closure.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1rt198yt1q8.0.0.1.4.1.3.1.2.1.0.0.1.0:$Crewneck=1\">Crewneck.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1rt198yt1q8.0.0.1.4.1.3.1.2.1.0.0.1.0:$Three-quarter sleeves=1\">Three-quarter sleeves.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1rt198yt1q8.0.0.1.4.1.3.1.2.1.0.0.1.0:$Fully lined=1\">Fully lined.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1rt198yt1q8.0.0.1.4.1.3.1.2.1.0.0.1.0:$76% polyester, 21% rayon, 3% spandex=1\">76% polyester, 21% rayon, 3% spandex.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1rt198yt1q8.0.0.1.4.1.3.1.2.1.0.0.1.0:$Machine wash cold, tumble dry low=1\">Machine wash cold, tumble dry low.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1rt198yt1q8.0.0.1.4.1.3.1.2.1.0.0.1.0:$By Ellen Tracy; imported=1\">By Ellen Tracy; imported.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1rt198yt1q8.0.0.1.4.1.3.1.2.1.0.0.1.0:$Available online only=1\">Available online only.</li>\r\n</ul>', '250', '<p>women,dresses,</p>\r\n<section class=\"brand-title\" style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: 10px;\" data-reactid=\".1rt198yt1q8.0.0.1.4.1.1.0.0\">\r\n<h2 style=\"font-size: 1.8rem; color: #393939; font-family: Georgia, Times, serif; font-weight: 400; margin: 0px;\" data-reactid=\".1rt198yt1q8.0.0.1.4.1.1.0.0.0\"><span style=\"font-size: 1.8rem; color: #393939; border-bottom: 2px solid transparent; transition: border-color 0.3s; text-decoration: none;\" data-reactid=\".1rt198yt1q8.0.0.1.4.1.1.0.0.0.0.0\"><a style=\"font-size: 1.8rem; color: #393939; border-bottom: 2px solid transparent; transition: border-color 0.3s; text-decoration: none;\" href=\"http://shop.nordstrom.com/c/ellen-tracy?origin=productBrandLink\" data-reactid=\".1rt198yt1q8.0.0.1.4.1.1.0.0.0.0\">Ellen Tracy</a></span></h2>\r\n<p>&nbsp;</p>\r\n</section>\r\n<section class=\"np-product-title\" style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: 10px;\" data-reactid=\".1rt198yt1q8.0.0.1.4.1.1.0.1\"></section>', 10, 50, 25, 5),
(12, 'Crepe A-Line Dress (Regular & Petite)', 'templates/images/products/8627_1482861787__10829527.jpg', '1', '1', '<div style=\"font-size: 12px; line-height: 1.5; color: #393939; font-family: Arial, Helvetica, sans-serif; padding: 0px;\" data-reactid=\".2e31qmdb18g.0.0.1.4.1.3.1.2.1.0.0.0\">\r\n<p style=\"font-size: 1.2rem; line-height: 1.5; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;\">Smooth crepe is fashioned into an essential dress cut with an elegant bateau neckline, three-quarter sleeves and a subtlety flared silhouette.</p>\r\n</div>\r\n<ul style=\"margin: 1em 0px; padding: 0px 0px 0px 1.4em; color: #393939; font-family: Arial, Helvetica, sans-serif; font-size: 12px;\" data-reactid=\".2e31qmdb18g.0.0.1.4.1.3.1.2.1.0.0.1\">\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".2e31qmdb18g.0.0.1.4.1.3.1.2.1.0.0.1.0:$36 1/2&quot; regular length (size 8); 35&quot; petite length (size 8P)=1\">36 1/2\" regular length (size 8); 35\" petite length (size 8P).</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".2e31qmdb18g.0.0.1.4.1.3.1.2.1.0.0.1.0:$Exposed back-zip closure=1\">Exposed back-zip closure.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".2e31qmdb18g.0.0.1.4.1.3.1.2.1.0.0.1.0:$Front pockets=1\">Front pockets.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".2e31qmdb18g.0.0.1.4.1.3.1.2.1.0.0.1.0:$Midweight, nonstretch crepe=1\">Midweight, nonstretch crepe.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".2e31qmdb18g.0.0.1.4.1.3.1.2.1.0.0.1.0:$Fully lined=1\">Fully lined.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".2e31qmdb18g.0.0.1.4.1.3.1.2.1.0.0.1.0:$68% polyester, 30% rayon, 2% spandex=1\">68% polyester, 30% rayon, 2% spandex.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".2e31qmdb18g.0.0.1.4.1.3.1.2.1.0.0.1.0:$Dry clean=1\">Dry clean.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".2e31qmdb18g.0.0.1.4.1.3.1.2.1.0.0.1.0:$By Vince Camuto; imported=1\">By Vince Camuto; imported.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".2e31qmdb18g.0.0.1.4.1.3.1.2.1.0.0.1.0:$Dresses=1\">Dresses.</li>\r\n</ul>', '450', '<p>women,dresses,</p>\r\n<section class=\"brand-title\" style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: 10px;\" data-reactid=\".2e31qmdb18g.0.0.1.4.1.1.0.0\">\r\n<h2 style=\"font-size: 1.8rem; color: #393939; font-family: Georgia, Times, serif; font-weight: 400; margin: 0px;\" data-reactid=\".2e31qmdb18g.0.0.1.4.1.1.0.0.0\"><span style=\"outline: 0px; font-size: 1.8rem; color: #393939; border-bottom: 2px solid #393939; transition: border-color 0.3s; text-decoration: none;\" data-reactid=\".2e31qmdb18g.0.0.1.4.1.1.0.0.0.0.0\"><a style=\"outline: 0px; font-size: 1.8rem; color: #393939; border-bottom: 2px solid #393939; transition: border-color 0.3s; text-decoration: none;\" href=\"http://shop.nordstrom.com/c/vince-camuto?origin=productBrandLink\" data-reactid=\".2e31qmdb18g.0.0.1.4.1.1.0.0.0.0\">Vince Camuto</a></span></h2>\r\n<p>&nbsp;</p>\r\n</section>\r\n<section class=\"np-product-title\" style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: 10px;\" data-reactid=\".2e31qmdb18g.0.0.1.4.1.1.0.1\"></section>', 50, 50, 25, 3),
(13, 'Tie Dye Print Crepe Midi Sheath Dress', 'templates/images/products/3896_1482861935__11686977.jpg', '1', '1', '<div style=\"font-size: 12px; line-height: 1.5; color: #393939; font-family: Arial, Helvetica, sans-serif; padding: 0px;\" data-reactid=\".14kk8ti6gow.0.0.1.4.1.3.1.2.1.0.0.0\">\r\n<p style=\"font-size: 1.2rem; line-height: 1.5; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;\">A flashy tie-dye print gives eye-catching style to a svelte sheath dress tailored with long sleeves and a midi-length hem.</p>\r\n</div>\r\n<ul style=\"margin: 1em 0px; padding: 0px 0px 0px 1.4em; color: #393939; font-family: Arial, Helvetica, sans-serif; font-size: 12px;\" data-reactid=\".14kk8ti6gow.0.0.1.4.1.3.1.2.1.0.0.1\">\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".14kk8ti6gow.0.0.1.4.1.3.1.2.1.0.0.1.0:$44 1/2&quot; length (size 8)=1\">44 1/2\" length (size 8).</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".14kk8ti6gow.0.0.1.4.1.3.1.2.1.0.0.1.0:$Exposed back-zip closure; back vent=1\">Exposed back-zip closure; back vent.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".14kk8ti6gow.0.0.1.4.1.3.1.2.1.0.0.1.0:$Fully lined=1\">Fully lined.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".14kk8ti6gow.0.0.1.4.1.3.1.2.1.0.0.1.0:$96% polyester, 4% spandex=1\">96% polyester, 4% spandex.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".14kk8ti6gow.0.0.1.4.1.3.1.2.1.0.0.1.0:$Dry clean=1\">Dry clean.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".14kk8ti6gow.0.0.1.4.1.3.1.2.1.0.0.1.0:$By Maggy London; imported=1\">By Maggy London; imported.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".14kk8ti6gow.0.0.1.4.1.3.1.2.1.0.0.1.0:$Dresses=1\">Dresses.</li>\r\n</ul>', '350', '<p>women,dresses,</p>\r\n<section class=\"brand-title\" style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: 10px;\" data-reactid=\".14kk8ti6gow.0.0.1.4.1.1.0.0\">\r\n<h2 style=\"font-size: 1.8rem; color: #393939; font-family: Georgia, Times, serif; font-weight: 400; margin: 0px;\" data-reactid=\".14kk8ti6gow.0.0.1.4.1.1.0.0.0\"><span style=\"font-size: 1.8rem; color: #393939; border-bottom: 2px solid transparent; transition: border-color 0.3s; text-decoration: none;\" data-reactid=\".14kk8ti6gow.0.0.1.4.1.1.0.0.0.0.0\"><a style=\"font-size: 1.8rem; color: #393939; border-bottom: 2px solid transparent; transition: border-color 0.3s; text-decoration: none;\" href=\"http://shop.nordstrom.com/c/maggy-london?origin=productBrandLink\" data-reactid=\".14kk8ti6gow.0.0.1.4.1.1.0.0.0.0\">Maggy London</a></span></h2>\r\n<p>&nbsp;</p>\r\n</section>\r\n<section class=\"np-product-title\" style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: 10px;\" data-reactid=\".14kk8ti6gow.0.0.1.4.1.1.0.1\"></section>', 0, 50, 30, 11),
(14, '\'Emery\' Sequin Midi Dress', 'templates/images/products/5027_1482862036__12935615.jpg', '1', '1', '<div style=\"font-size: 12px; line-height: 1.5; color: #393939; font-family: Arial, Helvetica, sans-serif; padding: 0px;\" data-reactid=\".1h91qn9owlc.0.0.1.4.1.3.1.2.1.0.0.0\">\r\n<p style=\"font-size: 1.2rem; line-height: 1.5; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;\">Dazzling, densely sewn sequins make mesmerizing Art Deco-inspired patterns on a body-hugging dress cut with a high neck, full-length sleeves and a revealing low backline.</p>\r\n</div>\r\n<ul style=\"margin: 1em 0px; padding: 0px 0px 0px 1.4em; color: #393939; font-family: Arial, Helvetica, sans-serif; font-size: 12px;\" data-reactid=\".1h91qn9owlc.0.0.1.4.1.3.1.2.1.0.0.1\">\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1h91qn9owlc.0.0.1.4.1.3.1.2.1.0.0.1.0:$46&quot; length (size Medium)=1\">46\" length (size Medium).</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1h91qn9owlc.0.0.1.4.1.3.1.2.1.0.0.1.0:$Back zip closure=1\">Back zip closure.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1h91qn9owlc.0.0.1.4.1.3.1.2.1.0.0.1.0:$Bateau neck=1\">Bateau neck.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1h91qn9owlc.0.0.1.4.1.3.1.2.1.0.0.1.0:$Long sleeves=1\">Long sleeves.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1h91qn9owlc.0.0.1.4.1.3.1.2.1.0.0.1.0:$Scooped back=1\">Scooped back.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1h91qn9owlc.0.0.1.4.1.3.1.2.1.0.0.1.0:$Back slit=1\">Back slit.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1h91qn9owlc.0.0.1.4.1.3.1.2.1.0.0.1.0:$Fully lined=1\">Fully lined.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1h91qn9owlc.0.0.1.4.1.3.1.2.1.0.0.1.0:$90% polyester, 10% spandex=1\">90% polyester, 10% spandex.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1h91qn9owlc.0.0.1.4.1.3.1.2.1.0.0.1.0:$Dry clean=1\">Dry clean.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1h91qn9owlc.0.0.1.4.1.3.1.2.1.0.0.1.0:$By Dress the Population; made in the USA=1\">By Dress the Population; made in the USA.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1h91qn9owlc.0.0.1.4.1.3.1.2.1.0.0.1.0:$Special Occasion=1\">Special Occasion.</li>\r\n</ul>', '650', '<p>women,dresses,</p>\r\n<section class=\"brand-title\" style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: 10px;\" data-reactid=\".1h91qn9owlc.0.0.1.4.1.1.0.0\">\r\n<h2 style=\"font-size: 1.8rem; color: #393939; font-family: Georgia, Times, serif; font-weight: 400; margin: 0px;\" data-reactid=\".1h91qn9owlc.0.0.1.4.1.1.0.0.0\"><span style=\"font-size: 1.8rem; color: #393939; border-bottom: 2px solid transparent; transition: border-color 0.3s; text-decoration: none;\" data-reactid=\".1h91qn9owlc.0.0.1.4.1.1.0.0.0.0.0\"><a style=\"font-size: 1.8rem; color: #393939; border-bottom: 2px solid transparent; transition: border-color 0.3s; text-decoration: none;\" href=\"http://shop.nordstrom.com/c/dress-the-population?origin=productBrandLink\" data-reactid=\".1h91qn9owlc.0.0.1.4.1.1.0.0.0.0\">Dress the Population</a></span></h2>\r\n<p>&nbsp;</p>\r\n</section>\r\n<section class=\"np-product-title\" style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: 10px;\" data-reactid=\".1h91qn9owlc.0.0.1.4.1.1.0.1\"></section>', 0, 50, 50, 3),
(15, '\'Tapestry Floral\' Belted Print Midi Sheath Dress', 'templates/images/products/957_1483210663__13058667.jpg', '1', '1', '<div style=\"font-size: 12px; line-height: 1.5; color: #393939; font-family: Arial, Helvetica, sans-serif; padding: 0px;\" data-reactid=\".wk8afji03k.0.0.1.4.1.3.1.2.1.0.0.0\">\r\n<p style=\"font-size: 1.2rem; line-height: 1.5; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;\">An artful floral print brushes gorgeous color across the slim midi-length skirt of a lithe stretch-woven sheath featuring a pristine elbow-sleeve bodice and belted waist.</p>\r\n</div>\r\n<ul style=\"margin: 1em 0px; padding: 0px 0px 0px 1.4em; color: #393939; font-family: Arial, Helvetica, sans-serif; font-size: 12px;\" data-reactid=\".wk8afji03k.0.0.1.4.1.3.1.2.1.0.0.1\">\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".wk8afji03k.0.0.1.4.1.3.1.2.1.0.0.1.0:$45 1/2&quot; length (size 3)=1\">45 1/2\" length (size 3).</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".wk8afji03k.0.0.1.4.1.3.1.2.1.0.0.1.0:$Full-length, exposed back-zip closure=1\">Full-length, exposed back-zip closure.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".wk8afji03k.0.0.1.4.1.3.1.2.1.0.0.1.0:$Jewel neck=1\">Jewel neck.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".wk8afji03k.0.0.1.4.1.3.1.2.1.0.0.1.0:$Elbow sleeves=1\">Elbow sleeves.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".wk8afji03k.0.0.1.4.1.3.1.2.1.0.0.1.0:$Attached double-D-ring belt at waist=1\">Attached double-D-ring belt at waist.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".wk8afji03k.0.0.1.4.1.3.1.2.1.0.0.1.0:$Back slit=1\">Back slit.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".wk8afji03k.0.0.1.4.1.3.1.2.1.0.0.1.0:$Stretch lining=1\">Stretch lining.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".wk8afji03k.0.0.1.4.1.3.1.2.1.0.0.1.0:$96% polyester, 4% elastane=1\">96% polyester, 4% elastane.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".wk8afji03k.0.0.1.4.1.3.1.2.1.0.0.1.0:$Hand wash cold, dry flat=1\">Hand wash cold, dry flat.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".wk8afji03k.0.0.1.4.1.3.1.2.1.0.0.1.0:$By Ted Baker London; imported=1\">By Ted Baker London; imported.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".wk8afji03k.0.0.1.4.1.3.1.2.1.0.0.1.0:$Individualist=1\">Individualist.</li>\r\n</ul>', '680', '<p>women,dresses,</p>\r\n<section class=\"brand-title\" style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: 10px;\" data-reactid=\".wk8afji03k.0.0.1.4.1.1.0.0\">\r\n<h2 style=\"font-size: 1.8rem; color: #393939; font-family: Georgia, Times, serif; font-weight: 400; margin: 0px;\" data-reactid=\".wk8afji03k.0.0.1.4.1.1.0.0.0\"><span style=\"font-size: 1.8rem; color: #393939; border-bottom: 2px solid transparent; transition: border-color 0.3s; text-decoration: none;\" data-reactid=\".wk8afji03k.0.0.1.4.1.1.0.0.0.0.0\"><a style=\"font-size: 1.8rem; color: #393939; border-bottom: 2px solid transparent; transition: border-color 0.3s; text-decoration: none;\" href=\"http://shop.nordstrom.com/c/ted-baker-london?origin=productBrandLink\" data-reactid=\".wk8afji03k.0.0.1.4.1.1.0.0.0.0\">Ted Baker London</a></span></h2>\r\n<p>&nbsp;</p>\r\n</section>\r\n<section class=\"np-product-title\" style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: 10px;\" data-reactid=\".wk8afji03k.0.0.1.4.1.1.0.1\"></section>', 80, 50, 100, 13);
INSERT INTO `products` (`product_id`, `product_title`, `product_image`, `product_cat`, `product_brand`, `product_disc`, `product_price`, `product_keywords`, `product_discount`, `product_delivery`, `product_qty`, `view`) VALUES
(16, 'Belted Mock Two-Piece Peplum Body-Con Dress', 'templates/images/products/5713_1483210760__12957136.jpg', '1', '1', '<div style=\"font-size: 12px; line-height: 1.5; color: #393939; font-family: Arial, Helvetica, sans-serif; padding: 0px;\" data-reactid=\".1xn80usv56o.0.0.1.4.1.3.1.2.1.0.0.0\">\r\n<p style=\"font-size: 1.2rem; line-height: 1.5; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;\">Mixed-media construction and a belted peplum bodice enhance the two-piece illusion of a cap-sleeve sheath infused with curve-hugging stretch.</p>\r\n</div>\r\n<ul style=\"margin: 1em 0px; padding: 0px 0px 0px 1.4em; color: #393939; font-family: Arial, Helvetica, sans-serif; font-size: 12px;\" data-reactid=\".1xn80usv56o.0.0.1.4.1.3.1.2.1.0.0.1\">\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1xn80usv56o.0.0.1.4.1.3.1.2.1.0.0.1.0:$Exposed back-zip closure=1\">Exposed back-zip closure.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1xn80usv56o.0.0.1.4.1.3.1.2.1.0.0.1.0:$Jewel neck=1\">Jewel neck.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1xn80usv56o.0.0.1.4.1.3.1.2.1.0.0.1.0:$Cap sleeves=1\">Cap sleeves.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1xn80usv56o.0.0.1.4.1.3.1.2.1.0.0.1.0:$Removable belt=1\">Removable belt.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1xn80usv56o.0.0.1.4.1.3.1.2.1.0.0.1.0:$Back vent=1\">Back vent.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1xn80usv56o.0.0.1.4.1.3.1.2.1.0.0.1.0:$Stretch lining=1\">Stretch lining.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1xn80usv56o.0.0.1.4.1.3.1.2.1.0.0.1.0:$70% cotton, 30% polyester bodice with 67% viscose, 29% polyamide, 4% elastane skirt=1\">70% cotton, 30% polyester bodice with 67% viscose, 29% polyamide, 4% elastane skirt.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1xn80usv56o.0.0.1.4.1.3.1.2.1.0.0.1.0:$Dry clean=1\">Dry clean.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1xn80usv56o.0.0.1.4.1.3.1.2.1.0.0.1.0:$By Ted Baker London; imported=1\">By Ted Baker London; imported.</li>\r\n<li style=\"font-size: 1.2rem; line-height: 1.5;\" data-reactid=\".1xn80usv56o.0.0.1.4.1.3.1.2.1.0.0.1.0:$Individualist=1\">Individualist.</li>\r\n</ul>', '780', '<p>women,dresses,</p>\r\n<section class=\"brand-title\" style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: 10px;\" data-reactid=\".1xn80usv56o.0.0.1.4.1.1.0.0\">\r\n<h2 style=\"font-size: 1.8rem; color: #393939; font-family: Georgia, Times, serif; font-weight: 400; margin: 0px;\" data-reactid=\".1xn80usv56o.0.0.1.4.1.1.0.0.0\"><span style=\"font-size: 1.8rem; color: #393939; border-bottom: 2px solid transparent; transition: border-color 0.3s; text-decoration: none;\" data-reactid=\".1xn80usv56o.0.0.1.4.1.1.0.0.0.0.0\"><a style=\"font-size: 1.8rem; color: #393939; border-bottom: 2px solid transparent; transition: border-color 0.3s; text-decoration: none;\" href=\"http://shop.nordstrom.com/c/ted-baker-london?origin=productBrandLink\" data-reactid=\".1xn80usv56o.0.0.1.4.1.1.0.0.0.0\">Ted Baker London</a></span></h2>\r\n<p>&nbsp;</p>\r\n</section>\r\n<section class=\"np-product-title\" style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: 10px;\" data-reactid=\".1xn80usv56o.0.0.1.4.1.1.0.1\"></section>', 180, 50, 15, 2),
(18, 'Quick \'N\' Easy Natural Glowing Look', 'templates/images/products/508_1485424227__100129149.jpg', '1', '2', '<p>\"Inspired by the off-duty, five minute, celebrity quick-kits that I curated to help stars maintain their red carpet statement and natural glowing day looks on their own and on-the-go, this quick and easy makeup magic will make all the difference to your day.\" &mdash;Charlotte Tilbury</p>\r\n<p><strong>What it is</strong>: A grab-and-go, quick-and-easy makeup kit that contains hyper-intelligent, multi-tasking, best-selling award-winners that work as hard as you do.</p>\r\n<p><strong>What it does</strong>: The Natural Glowing Look is for instant glow and radiance, an effortless day look for when you want to enhance what nature naturally gave you.</p>\r\n<p><strong>Set includes</strong>:</p>\r\n<p>- Mini Wonderglow Instant Beauty Flash (0.51 oz.)</p>\r\n<p>- Mini Legendary Lashes Mascara (0.13 oz.)</p>\r\n<p>- Color Chameleon Color Morphing Eyeshadow Pencil in Amber Haze (0.06 oz.)</p>\r\n<p>- Matte Revolution Lipstick in Very Victoria (0.12 oz.)</p>\r\n<p>- The Beach Stick in Moon Beach (0.23 oz.)</p>\r\n<p><strong>How to use</strong>: The ingredients in these products are so good that they can be applied easily with your fingers. Smooth, slick and sculpt straight from the bullet with the warmth of your fingers for expert results wherever you are.</p>', '1250', '<p>women,makeup</p>', 0, 20, 10, 0),
(19, 'Matte Revolution Luminous Modern-Matte Lipstick', 'templates/images/products/4142_1485424347__10874771.jpg', '1', '2', '<div data-reactid=\".1cv0nbgwxz4.0.0.1.4.1.3.1.2.1.0.0.0\">\r\n<p>&ldquo;I&rsquo;ve always loved creating a fuller lip effect with matte lipsticks on campaign shoots. Whereas gloss contours, a matte finish can flatten the lips for a wider shape.&rdquo;&nbsp;&mdash; Charlotte&nbsp;Tilbury</p>\r\n<p><strong>What it is:</strong> Matte Revolution is a magical, matte lipstick with a long-lasting, buildable, hydrating formula. It\'s available in 10 modern-matte shades for all skin tones&mdash;one for each of Charlotte&rsquo;s signature looks.&nbsp;</p>\r\n<p><strong>What it does:</strong> The lipstick features&nbsp;3D glow pigments to create the illusion of&nbsp;lit-from-within lips that appear wider and fuller. It is exclusively&nbsp;enriched with Lipstick Tree extract, Charlotte\'s secret ingredient, and orchid extract to protect and soothe for a cashmere finish.&nbsp;</p>\r\n<p><strong>How to use:</strong> Begin by applying lip liner, filling in the lips for added intensity. Then, apply Matte Revolution straight from the bullet for fuller, wider, lit-from-within lips.&nbsp;</p>\r\n<p>Shades:</p>\r\n<p>- Bond Girl (a chic natural berry)</p>\r\n<p>- Red Carpet Red (a true ruby red)</p>\r\n<p>-&nbsp;Lost Cherry (a pop of pastel fuchsia)</p>\r\n<p>-&nbsp;Sexy Sienna (a golden coral)</p>\r\n<p>- Amazing Grace (a&nbsp;vintage tea rose)</p>\r\n<p>- Glastonberry&nbsp;(a sheer blackcurrant)</p>\r\n<p>- Love Liberty (a&nbsp;wild rose flush)</p>\r\n<p>-&nbsp;Birkin Brown (a soft chocolate cream)</p>\r\n<p>-&nbsp;Walk of Shame (a berry-tinted rose)</p>\r\n<p>- Very Victoria (a suede taupe nude)</p>\r\n</div>\r\n<ul data-reactid=\".1cv0nbgwxz4.0.0.1.4.1.3.1.2.1.0.0.1\">\r\n<li data-reactid=\".1cv0nbgwxz4.0.0.1.4.1.3.1.2.1.0.0.1.0:$Paraben-free\">Paraben-free</li>\r\n</ul>\r\n<h2 data-reactid=\".1cv0nbgwxz4.0.0.1.4.1.3.1.2.1.0.0.6.0\">Ingredients</h2>\r\n<p data-reactid=\".1cv0nbgwxz4.0.0.1.4.1.3.1.2.1.0.0.6.1\">Neopentyl Glycol Dicaprylate/Dicaprate, Trimethylolpropane Triisostearate, Dimenthicone, Microcrystalline Wax (Cera Microcristallina), Polyethylene, Polybutene, Dimethicone Crosspolymer, Silica, Dicalcium Phosphate, Mica, Ethyl Vanillin, Caprylic/Capric Trigglyceride, Tocopherol, Zea Mays (Corn) Oil (Zea Mays Oil), Pentaerythrityl Tetera-Di-t-Butyl Hydroxhydrocinnamate, Orchis Mascula Flower Extract, Bixa Orellana Seed Extract, Tocopheryl Acetate, [May contain: Iron Oxides (CI 77491, CI 77492, CI 77499), Blue 1 Lake (CI 42090), Titanium Dioxide (CI 77891), Red 7 Lake (CI 15850), Red 6 (CI 15850), Yellow 6 Lake (CI 15985), Yellow 5 Lake (CI 19140), Carmine (CI 75470)].</p>\r\n<p class=\"disclaimer\" data-reactid=\".1cv0nbgwxz4.0.0.1.4.1.3.1.2.1.0.0.6.2\">Ingredients are subject to change at the manufacturer\'s discretion. For the most complete and up-to-date list of ingredients, refer to the product packaging.</p>\r\n<p>&nbsp;</p>', '625', '<p>women,makeup</p>', 0, 20, 150, 1),
(20, '\'Cheek to Chic\' Swish & Pop Blush', 'templates/images/products/4752_1485424834__9457216.jpg', '1', '2', '<div data-reactid=\".2d78nc0cgsg.0.0.1.4.1.3.1.2.1.0.0.0\">\r\n<p><strong>What it is:</strong> Cheek to Chic Swish and Pop Blush is a two-step application ritual featuring two creamy, color-rich shades filled with finely crushed pearls to give your skin a limitless glow.</p>\r\n<p><strong>What it does:</strong> Light Flex Technology captures light and re-emits it for a luminous complexion, while color-rich pigments smooth and buff your skin for excellent blendability and perfect color uniformity.</p>\r\n<p><strong>How to use:</strong></p>\r\n<p><strong>Swish</strong>: Swish your brush around the outer shade and tap off excess. Run the brush flat up the cheekbone, starting from the apple of the cheek, to structure the face.</p>\r\n<p><strong>Pop</strong>: Take the pointy end of your blush brush, dip it in the center color and tap off excess. Apply to the apples of the cheeks to make them pop and glow. Blend seamlessly together.</p>\r\n</div>\r\n<ul data-reactid=\".2d78nc0cgsg.0.0.1.4.1.3.1.2.1.0.0.1\">\r\n<li data-reactid=\".2d78nc0cgsg.0.0.1.4.1.3.1.2.1.0.0.1.0:$0=128 oz=1\">0.28 oz.</li>\r\n<li data-reactid=\".2d78nc0cgsg.0.0.1.4.1.3.1.2.1.0.0.1.0:$Paraben-free=1\">Paraben-free.</li>\r\n<li data-reactid=\".2d78nc0cgsg.0.0.1.4.1.3.1.2.1.0.0.1.0:$By Charlotte Tilbury=1\">By Charlotte Tilbury.</li>\r\n</ul>\r\n<h2 data-reactid=\".2d78nc0cgsg.0.0.1.4.1.3.1.2.1.0.0.6.0\">Ingredients</h2>\r\n<p data-reactid=\".2d78nc0cgsg.0.0.1.4.1.3.1.2.1.0.0.6.1\">Talc, Mica, Isononyl Isononanoate, Oryza Sativa (Rice) Starch, Dimethicone, Zea Mays (Corn) Starch, Zinc Stearate, Carprylyl Glycol, Phenoxyethanol, Dimethiconol, Hexylene Glycol, Octyldodecyl Stearoyl Stearate, Polymethylsilsesquioxane, Silica, Trimethylsiloxysilicate, Red 7 Lake (Ci 15850), Tin Oxide (Ci 77861), [May Contain Titanium Dioxide (Ci77891), Iron Oxides (Ci 77491, Ci 77491, Ci 77499), Carmine (Ci 75470), Manganese Violet (Ci77742), Red 6 (Ci 15850), Yellow 5 Lake ( 19140)].</p>\r\n<p class=\"disclaimer\" data-reactid=\".2d78nc0cgsg.0.0.1.4.1.3.1.2.1.0.0.6.2\">Ingredients are subject to change at the manufacturer\'s discretion. For the most complete and up-to-date list of ingredients, refer to the product packaging.</p>\r\n<p>&nbsp;</p>', '350', '<p>women,makeup</p>', 50, 20, 10, 0),
(21, '\'Luxury Palette\' Colour-Coded Eyeshadow Palette', 'templates/images/products/402_1485425017__9548643.jpg', '1', '2', '<div data-reactid=\".lvh989wveo.0.0.1.4.1.3.1.2.1.0.0.0\">\r\n<div><strong>What is it</strong>: Charlotte&rsquo;s artistry made effortless. She has decoded the secrets to iconic, mesmerizing eyes with this Colour-Coded Eyeshadow Palette.\r\n<p>&nbsp;</p>\r\n<p><strong>What it does:</strong> Each palette contains four harmonious eye colour wardrobes that offer you a complete desk-to-disco eye.</p>\r\n</div>\r\n<div>\r\n<p>&nbsp;</p>\r\n<p><strong>How to use:</strong></p>\r\n<p>-&nbsp;<strong>Desk (day look)</strong>: Using an eye blender brush, apply Prime to the entire eyelid with a backward and forward motion. Then, using a smudger brush, apply Prime to the inner corners of the eyes to open them. Nestle the Enhance shade in the outer corner of your eye socket using a smudger blush and blend. Then, using the same smudger brush, apply Enhance along the upper and lower lash line.&nbsp;</p>\r\n</div>\r\n<div>- <strong>Dusk (evening look)</strong>: Begin by completing the entire Desk look. Then, using your smudger brush, blend Smoke from the outer corner of the eye upward and into the socket. Then, using the same brush, apply Smoke along the upper lash line and into the socket in a half-moon shape. Also run it along the lower lash line.&nbsp;</div>\r\n<div>- <strong>Disco (night look</strong>): Repeat your Desk and Dusk look. Then, with your ring finger, apply the Pop shade to the center of your eyelid for amped-up glamour.</div>\r\n<div>&nbsp;</div>\r\n<p>&nbsp;</p>\r\n</div>\r\n<ul data-reactid=\".lvh989wveo.0.0.1.4.1.3.1.2.1.0.0.1\">\r\n<li data-reactid=\".lvh989wveo.0.0.1.4.1.3.1.2.1.0.0.1.0:$0=118 oz=1\">0.18 oz.</li>\r\n<li data-reactid=\".lvh989wveo.0.0.1.4.1.3.1.2.1.0.0.1.0:$By Charlotte Tilbury; made in Italy=1\">By Charlotte Tilbury; made in Italy.</li>\r\n</ul>\r\n<h2 data-reactid=\".lvh989wveo.0.0.1.4.1.3.1.2.1.0.0.6.0\">Ingredients</h2>\r\n<p data-reactid=\".lvh989wveo.0.0.1.4.1.3.1.2.1.0.0.6.1\">Talc, Mica, Calcium Sodium Borosilicate, Octyldodecyl Stearoyl Stearate, Dimethicone, Zinc Stearate, Calcium Aluminum Borosilicate, Diisostearyl Malate, Caprylic/Capric Triglyceride, Zea Mays (Corn) Starch, Silica, Hydrogenated Castor Oil Hydroxystearate, Pentaerythrityl Tetraisostearate, Potassium Sorbate, Chlorphenesin, Polyethylene, Isononyl Isononanoate, 1,2-Hexanediol, Caprylyl Glycol, Tin Oxide, Caprylyl Methicone, Tetrasodium Edta, Zeolite, Dimethiconol, Sorbic Acid, Methylparaben, Propylparaben, Butylparaben, Bht, Trimethylsiloxysilicate, [May Contain Ultramarines Ci 77007, Carmine Ci 75470, Ferric Ammonium Ferrocyanide Ci 77510, Ferric Ferrocyanide Ci 77510, Blue 1 Lake Ci 42090, Titanium Dioxide Ci 77891, Manganese Violet Ci 77742, Iron Oxides Ci 77492, Iron Oxides Ci 77499, Iron Oxides Ci 77491]. Ingredients may vary by color.</p>\r\n<p class=\"disclaimer\" data-reactid=\".lvh989wveo.0.0.1.4.1.3.1.2.1.0.0.6.2\">Ingredients are subject to change at the manufacturer\'s discretion. For the most complete and up-to-date list of ingredients, refer to the product packaging.</p>\r\n<p>&nbsp;</p>', '650', '<p>women,makeup</p>', 0, 20, 25, 0),
(22, '\'Full Fat Lashes\' 5 Star Mascara', 'templates/images/products/4804_1485427077__11310659.jpg', '1', '2', '<div data-reactid=\".27mb8wyi2o0.0.0.1.4.1.3.1.2.1.0.0.0\">\r\n<p><strong>What it is:</strong> Full Fat Lashes 5 Star Mascara is a luxurious multitasker that curls, separates, lengthens and dramatizes lashes in a single stroke.</p>\r\n<p><strong>What it does:</strong> The five-groove brush deposits the optimal amount of mascara along your lash line, pushing lashes up and out with each stroke. Fine-tipped bristles catch every lash no matter how small or fine, while the glossy formula creates voluptuous, three-dimensional flutter.</p>\r\n<p><strong>How to use:</strong> Starting from the inner corner and working across, zigzag the brush upward from root to tip to curl and separate lashes. At the outer corner, pull the brush up and out to lengthen lashes. For added volume, nestle the tip of the brush into the roots and brush upward. Repeat with your bottom lashes for added drama.</p>\r\n</div>\r\n<ul data-reactid=\".27mb8wyi2o0.0.0.1.4.1.3.1.2.1.0.0.1\">\r\n<li data-reactid=\".27mb8wyi2o0.0.0.1.4.1.3.1.2.1.0.0.1.0:$0=127 oz=1\">0.27 oz.</li>\r\n<li data-reactid=\".27mb8wyi2o0.0.0.1.4.1.3.1.2.1.0.0.1.0:$By Charlotte Tilbury=1\">By Charlotte Tilbury.</li>\r\n</ul>\r\n<h2 data-reactid=\".27mb8wyi2o0.0.0.1.4.1.3.1.2.1.0.0.6.0\">Ingredients</h2>\r\n<p data-reactid=\".27mb8wyi2o0.0.0.1.4.1.3.1.2.1.0.0.6.1\">Water (Aqua), Synthetic Beeswax, Paraffin, Iron Oxide (Ci 77499), Acacia Senegal Gum, Oryza Sativa (Rice) Bran Wax (Oryza Sativa Cera), Butylene Glycol, Glyceryl Stearate, Stearic Acid, Polybutene, Triethanolamine, Palmitic Acid, Vp/Eicosene Copolymer, Copernicia Cerifera (Carnauba) Wax (Copernicia Cerifera Cera), Glycerin, Phenoxyethanol, Black 2 (Ci 77266), Propylparaben, Hydroxyethylcellulose, Cellulose, Pvp.</p>\r\n<p class=\"disclaimer\" data-reactid=\".27mb8wyi2o0.0.0.1.4.1.3.1.2.1.0.0.6.2\">Ingredients are subject to change at the manufacturer\'s discretion. For the most complete and up-to-date list of ingredients, refer to the product packaging.</p>\r\n<p>&nbsp;</p>', '65', '<p>women,makeup</p>', 0, 20, 12, 1),
(23, '\'Lip Lustre\' Luxe Color-Lasting Lip Lacquer', 'templates/images/products/3670_1485427342__9458011.jpg', '1', '2', '<div data-reactid=\".1b16xkm5bls.0.0.1.4.1.3.1.2.1.0.0.0\">\r\n<p><strong>What it is:</strong> Lip Lustre is a super-luxe, high-gloss lacquer that gives your lips a brilliant mirror-shine finish, creating the illusion of a three-dimensional, voluptuous pout.</p>\r\n<p><strong>What it does:</strong> Its creamy, vinyl, non-sticky texture is enriched with lotus flower extract, which is an antioxidant that protects, hydrates and soothes lips for a gorgeous, perfect, lacquered finish. Color stays in place for six hours without transfer, for lips that shine.</p>\r\n<p><strong>How to use:</strong> Sweep Lip Lustre over your lips for a three-dimensional mirror shine. For day, apply a nude lip liner then glide the lacquer over your lips. For an amped-up evening look, apply a nude lip liner then layer Lip Lustre over a complementary lipstick.</p>\r\n</div>\r\n<ul data-reactid=\".1b16xkm5bls.0.0.1.4.1.3.1.2.1.0.0.1\">\r\n<li data-reactid=\".1b16xkm5bls.0.0.1.4.1.3.1.2.1.0.0.1.0:$0=112 oz=1\">0.12 oz.</li>\r\n<li data-reactid=\".1b16xkm5bls.0.0.1.4.1.3.1.2.1.0.0.1.0:$By Charlotte Tilbury; made in Italy=1\">By Charlotte Tilbury; made in Italy.</li>\r\n</ul>\r\n<h2 data-reactid=\".1b16xkm5bls.0.0.1.4.1.3.1.2.1.0.0.6.0\">Ingredients</h2>\r\n<p data-reactid=\".1b16xkm5bls.0.0.1.4.1.3.1.2.1.0.0.6.1\">Polybutene, Isocetyl Stearate, Trimethylolpropane Triisostearate, Diisostearyl Malate, Silica Dimethyl Silylate, Mica, Propylparaben, Propylene Glycol Dicaprylate/Dicaprate, Flavor (Aroma), Bht, Nelumbo Nucifera Flower Extract (Nelumbian Speciosum Extract), Tin Oxide, Dicalcium Phosphate, Silica, Calcium Sodium Borosilicate, Titanium Dioxide (Ci 77891), [May Contain Carmine (Ci 75470), Iron Oxides (Ci 77491, Ci 77492, Ci 77499), Yellow 5 Lake (Ci 19140), Yellow 6 Lake (Ci 15985), Red 6 (Ci 15850), Red 7 Lake (Ci 15850), Red 22 Lake (Ci 45380), Red 28 Lake (Ci 45410), Red 30 Lake (Ci 73360), Blue 1 Lake (42090)].</p>\r\n<p class=\"disclaimer\" data-reactid=\".1b16xkm5bls.0.0.1.4.1.3.1.2.1.0.0.6.2\">Ingredients are subject to change at the manufacturer\'s discretion. For the most complete and up-to-date list of ingredients, refer to the product packaging.</p>\r\n<p>&nbsp;</p>', '350', '<p>women,makeup</p>', 50, 20, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` int(11) NOT NULL,
  `slider_title` varchar(255) NOT NULL,
  `slider_img` text NOT NULL,
  `slider_disc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`slider_id`, `slider_title`, `slider_img`, `slider_disc`) VALUES
(1, 'Tie Dye Print Crepe Midi Sheath Dress', 'templates/images/sliders/7841_1483539050_3121_1482861935__9914717.jpg', '<h3 class=\"pp-title\">Tie Dye Print Crepe Midi Sheath Dress</h3>'),
(2, '\'Emery\' Sequin Midi Dress', 'templates/images/sliders/6224_1483539037_2453_1482862036__12937561.jpg', '<h3 class=\"pp-title\">\'Emery\' Sequin Midi Dress</h3>\r\n<section>\r\n<div id=\"slider\" class=\"flexslider\">&nbsp;</div>\r\n</section>'),
(3, 'Colorblock Lace Gown', 'templates/images/sliders/889_1483539027_494_1482852873__13013707.jpg', '<h3 class=\"pp-title\">Colorblock Lace Gown</h3>\r\n<section>\r\n<div id=\"slider\" class=\"flexslider\">&nbsp;</div>\r\n</section>'),
(4, 'Embroidered Lace Gown (Regular & Petite)', 'templates/images/sliders/749_1483539015_144_1482851222__100026966.jpg', '<h3 class=\"pp-title\">Embroidered Lace Gown (Regular &amp; Petite)</h3>\r\n<section>\r\n<div id=\"slider\" class=\"flexslider\">&nbsp;</div>\r\n</section>');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `icon_id` int(11) NOT NULL,
  `icon_url` text NOT NULL,
  `icon_img` text NOT NULL,
  `icon_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`icon_id`, `icon_url`, `icon_img`, `icon_title`) VALUES
(1, 'https://www.facebook.com/moyaabdo88', 'templates/images/socials/7391_1482858680_face.png', 'Facebook'),
(2, 'monaabdo88@gmail.com', 'templates/images/socials/3923_1482858704_gmail.png', 'Gmail'),
(3, 'www.Googleplus.com', 'templates/images/socials/2661_1482858724_go.png', 'Google plus'),
(4, 'www.plus.com', 'templates/images/socials/7457_1482858734_p.png', 'Plus'),
(5, 'www.rss.com', 'templates/images/socials/2706_1482858751_rss.png', 'Rss'),
(6, 'www.twitter.com', 'templates/images/socials/5739_1482858853_tw.png', 'Twitter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`partner_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`icon_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `partner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `icon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
