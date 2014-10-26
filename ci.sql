-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 10 月 27 日 00:19
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `ci`
--

-- --------------------------------------------------------

--
-- 表的结构 `gts_articles`
--

CREATE TABLE IF NOT EXISTS `gts_articles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `pubdate` date NOT NULL,
  `body` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `gts_articles`
--

INSERT INTO `gts_articles` (`id`, `title`, `slug`, `pubdate`, `body`, `created`, `modified`) VALUES
(2, 'Demo article', 'demo-article', '2014-01-03', '<p>lloremsdfa nulj lorem lorem jkjk lorem gtskk gts<span >kk lorem</span></p>\r\n<p>&Euml;dfadsf</p>\r\n<p>&nbsp;</p>', '2014-01-05 17:14:31', '2014-01-05 17:14:31'),
(3, 'sdfasdf', 'dddd', '2014-01-05', '<p>sadfdsf</p>', '2014-01-05 17:15:47', '2014-01-05 17:15:47'),
(4, 'lorem test', 'lorem-test', '2014-01-06', '<p>lorem test ok good</p>\r\n<p>Your raejklj kjdslkafjklads lskdfjklasdjfkl</p>\r\n<p>sdjflasjdkfj&nbsp;</p>\r\n<p>jdsklfjklasdjf&nbsp;</p>\r\n<p>jklsjdfkl ajdskfja&nbsp;</p>\r\n<p>jskdfjkads&nbsp;</p>', '2014-01-06 22:10:58', '2014-01-06 22:10:58'),
(5, 'noor demo', 'noor-demo', '2014-01-06', '<p>nlorrjklj This is a good menu.</p>\r\n<p>I like fish very much.</p>\r\n<p>I don''t like chicken.!!!!</p>', '2014-01-06 22:12:59', '2014-01-06 22:12:59');

-- --------------------------------------------------------

--
-- 表的结构 `gts_captcha`
--

CREATE TABLE IF NOT EXISTS `gts_captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `gts_captcha`
--

INSERT INTO `gts_captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(24, 1409584499, '127.0.0.1', '6109');

-- --------------------------------------------------------

--
-- 表的结构 `gts_ci_sessions`
--

CREATE TABLE IF NOT EXISTS `gts_ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `gts_ci_sessions`
--

INSERT INTO `gts_ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('4c974eca7cf17fba6041a416ec85eea0', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36', 1414336105, 'a:8:{s:9:"user_data";s:0:"";s:11:"verify_code";s:4:"bs69";s:7:"user_id";s:1:"1";s:8:"username";s:5:"gtskk";s:11:"displayname";N;s:6:"status";s:1:"1";s:5:"roles";a:1:{i:0;a:4:{s:7:"role_id";s:1:"1";s:4:"role";s:5:"admin";s:4:"full";s:13:"Administrator";s:7:"default";s:1:"0";}}s:12:"user_profile";a:10:{s:2:"id";s:1:"1";s:4:"name";s:0:"";s:6:"gender";s:1:"M";s:12:"display_name";s:12:"哥特式KKK";s:5:"phone";s:11:"15856812418";s:3:"dob";s:10:"2014-10-25";s:7:"country";s:0:"";s:8:"timezone";s:0:"";s:7:"website";s:0:"";s:8:"modified";s:19:"2014-10-25 17:50:08";}}');

-- --------------------------------------------------------

--
-- 表的结构 `gts_country`
--

CREATE TABLE IF NOT EXISTS `gts_country` (
  `Code` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `Name` char(52) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Continent` enum('Asia','Europe','North America','Africa','Oceania','Antarctica','South America') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Asia',
  `Region` char(26) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `LocalName` char(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `gts_country`
--

INSERT INTO `gts_country` (`Code`, `Name`, `Continent`, `Region`, `LocalName`) VALUES
('AD', 'Andorra', 'Europe', 'Southern Europe', 'Andorra'),
('AE', 'United Arab Emirates', 'Asia', 'Middle East', 'Al-Imarat al-´Arabiya al-Muttahida'),
('AF', 'Afghanistan', 'Asia', 'Southern and Central Asia', 'Afganistan/Afqanestan'),
('AG', 'Antigua and Barbuda', 'North America', 'Caribbean', 'Antigua and Barbuda'),
('AI', 'Anguilla', 'North America', 'Caribbean', 'Anguilla'),
('AL', 'Albania', 'Europe', 'Southern Europe', 'Shqipëria'),
('AM', 'Armenia', 'Asia', 'Middle East', 'Hajastan'),
('AO', 'Angola', 'Africa', 'Central Africa', 'Angola'),
('AQ', 'Antarctica', 'Antarctica', 'Antarctica', '–'),
('AR', 'Argentina', 'South America', 'South America', 'Argentina'),
('AS', 'American Samoa', 'Oceania', 'Polynesia', 'Amerika Samoa'),
('AT', 'Austria', 'Europe', 'Western Europe', 'Österreich'),
('AU', 'Australia', 'Oceania', 'Australia and New Zealand', 'Australia'),
('AW', 'Aruba', 'North America', 'Caribbean', 'Aruba'),
('AZ', 'Azerbaijan', 'Asia', 'Middle East', 'Azärbaycan'),
('BA', 'Bosnia and Herzegovina', 'Europe', 'Southern Europe', 'Bosna i Hercegovina'),
('BB', 'Barbados', 'North America', 'Caribbean', 'Barbados'),
('BD', 'Bangladesh', 'Asia', 'Southern and Central Asia', 'Bangladesh'),
('BE', 'Belgium', 'Europe', 'Western Europe', 'België/Belgique'),
('BF', 'Burkina Faso', 'Africa', 'Western Africa', 'Burkina Faso'),
('BG', 'Bulgaria', 'Europe', 'Eastern Europe', 'Balgarija'),
('BH', 'Bahrain', 'Asia', 'Middle East', 'Al-Bahrayn'),
('BI', 'Burundi', 'Africa', 'Eastern Africa', 'Burundi/Uburundi'),
('BJ', 'Benin', 'Africa', 'Western Africa', 'Bénin'),
('BM', 'Bermuda', 'North America', 'North America', 'Bermuda'),
('BN', 'Brunei', 'Asia', 'Southeast Asia', 'Brunei Darussalam'),
('BO', 'Bolivia', 'South America', 'South America', 'Bolivia'),
('BR', 'Brazil', 'South America', 'South America', 'Brasil'),
('BS', 'Bahamas', 'North America', 'Caribbean', 'The Bahamas'),
('BT', 'Bhutan', 'Asia', 'Southern and Central Asia', 'Druk-Yul'),
('BV', 'Bouvet Island', 'Antarctica', 'Antarctica', 'Bouvetøya'),
('BW', 'Botswana', 'Africa', 'Southern Africa', 'Botswana'),
('BY', 'Belarus', 'Europe', 'Eastern Europe', 'Belarus'),
('BZ', 'Belize', 'North America', 'Central America', 'Belize'),
('CA', 'Canada', 'North America', 'North America', 'Canada'),
('CC', 'Cocos (Keeling) Islands', 'Oceania', 'Australia and New Zealand', 'Cocos (Keeling) Islands'),
('CD', 'Congo, The Democratic Republic of the', 'Africa', 'Central Africa', 'République Démocratique du Congo'),
('CF', 'Central African Republic', 'Africa', 'Central Africa', 'Centrafrique/Bê-Afrîka'),
('CG', 'Congo', 'Africa', 'Central Africa', 'Congo'),
('CH', 'Switzerland', 'Europe', 'Western Europe', 'Schweiz/Suisse/Svizzera/Svizra'),
('CI', 'C&ocirc;te d''Ivoire', 'Africa', 'Western Africa', 'C&ocirc;te d''Ivoire'),
('CK', 'Cook Islands', 'Oceania', 'Polynesia', 'The Cook Islands'),
('CL', 'Chile', 'South America', 'South America', 'Chile'),
('CM', 'Cameroon', 'Africa', 'Central Africa', 'Cameroun/Cameroon'),
('CN', 'China', 'Asia', 'Eastern Asia', 'Zhongquo'),
('CO', 'Colombia', 'South America', 'South America', 'Colombia'),
('CR', 'Costa Rica', 'North America', 'Central America', 'Costa Rica'),
('CU', 'Cuba', 'North America', 'Caribbean', 'Cuba'),
('CV', 'Cape Verde', 'Africa', 'Western Africa', 'Cabo Verde'),
('CX', 'Christmas Island', 'Oceania', 'Australia and New Zealand', 'Christmas Island'),
('CY', 'Cyprus', 'Asia', 'Middle East', 'Kýpros/Kibris'),
('CZ', 'Czech Republic', 'Europe', 'Eastern Europe', '¸esko'),
('DE', 'Germany', 'Europe', 'Western Europe', 'Deutschland'),
('DJ', 'Djibouti', 'Africa', 'Eastern Africa', 'Djibouti/Jibuti'),
('DK', 'Denmark', 'Europe', 'Nordic Countries', 'Danmark'),
('DM', 'Dominica', 'North America', 'Caribbean', 'Dominica'),
('DO', 'Dominican Republic', 'North America', 'Caribbean', 'República Dominicana'),
('DZ', 'Algeria', 'Africa', 'Northern Africa', 'Al-Jaza’ir/Algérie'),
('EC', 'Ecuador', 'South America', 'South America', 'Ecuador'),
('EE', 'Estonia', 'Europe', 'Baltic Countries', 'Eesti'),
('EG', 'Egypt', 'Africa', 'Northern Africa', 'Misr'),
('EH', 'Western Sahara', 'Africa', 'Northern Africa', 'As-Sahrawiya'),
('ER', 'Eritrea', 'Africa', 'Eastern Africa', 'Ertra'),
('ES', 'Spain', 'Europe', 'Southern Europe', 'España'),
('ET', 'Ethiopia', 'Africa', 'Eastern Africa', 'YeItyop´iya'),
('FI', 'Finland', 'Europe', 'Nordic Countries', 'Suomi'),
('FJ', 'Fiji Islands', 'Oceania', 'Melanesia', 'Fiji Islands'),
('FK', 'Falkland Islands', 'South America', 'South America', 'Falkland Islands'),
('FM', 'Micronesia, Federated States of', 'Oceania', 'Micronesia', 'Micronesia'),
('FO', 'Faroe Islands', 'Europe', 'Nordic Countries', 'Føroyar'),
('FR', 'France', 'Europe', 'Western Europe', 'France'),
('GA', 'Gabon', 'Africa', 'Central Africa', 'Le Gabon'),
('GB', 'United Kingdom', 'Europe', 'British Islands', 'United Kingdom'),
('GD', 'Grenada', 'North America', 'Caribbean', 'Grenada'),
('GE', 'Georgia', 'Asia', 'Middle East', 'Sakartvelo'),
('GF', 'French Guiana', 'South America', 'South America', 'Guyane française'),
('GH', 'Ghana', 'Africa', 'Western Africa', 'Ghana'),
('GI', 'Gibraltar', 'Europe', 'Southern Europe', 'Gibraltar'),
('GL', 'Greenland', 'North America', 'North America', 'Kalaallit Nunaat/Grønland'),
('GM', 'Gambia', 'Africa', 'Western Africa', 'The Gambia'),
('GN', 'Guinea', 'Africa', 'Western Africa', 'Guinée'),
('GP', 'Guadeloupe', 'North America', 'Caribbean', 'Guadeloupe'),
('GQ', 'Equatorial Guinea', 'Africa', 'Central Africa', 'Guinea Ecuatorial'),
('GR', 'Greece', 'Europe', 'Southern Europe', 'Elláda'),
('GS', 'South Georgia and the South Sandwich Isl', 'Antarctica', 'Antarctica', 'South Georgia and the South Sandwich Isl'),
('GT', 'Guatemala', 'North America', 'Central America', 'Guatemala'),
('GU', 'Guam', 'Oceania', 'Micronesia', 'Guam'),
('GW', 'Guinea-Bissau', 'Africa', 'Western Africa', 'Guiné-Bissau'),
('GY', 'Guyana', 'South America', 'South America', 'Guyana'),
('HK', 'Hong Kong', 'Asia', 'Eastern Asia', 'Xianggang/Hong Kong'),
('HM', 'Heard Island and McDonald Islands', 'Antarctica', 'Antarctica', 'Heard and McDonald Islands'),
('HN', 'Honduras', 'North America', 'Central America', 'Honduras'),
('HR', 'Croatia', 'Europe', 'Southern Europe', 'Hrvatska'),
('HT', 'Haiti', 'North America', 'Caribbean', 'Haïti/Dayti'),
('HU', 'Hungary', 'Europe', 'Eastern Europe', 'Magyarország'),
('ID', 'Indonesia', 'Asia', 'Southeast Asia', 'Indonesia'),
('IE', 'Ireland', 'Europe', 'British Islands', 'Ireland/Éire'),
('IL', 'Israel', 'Asia', 'Middle East', 'Yisra’el/Isra’il'),
('IN', 'India', 'Asia', 'Southern and Central Asia', 'Bharat/India'),
('IO', 'British Indian Ocean Territory', 'Africa', 'Eastern Africa', 'British Indian Ocean Territory'),
('IQ', 'Iraq', 'Asia', 'Middle East', 'Al-´Iraq'),
('IR', 'Iran', 'Asia', 'Southern and Central Asia', 'Iran'),
('IS', 'Iceland', 'Europe', 'Nordic Countries', 'Ísland'),
('IT', 'Italy', 'Europe', 'Southern Europe', 'Italia'),
('JM', 'Jamaica', 'North America', 'Caribbean', 'Jamaica'),
('JO', 'Jordan', 'Asia', 'Middle East', 'Al-Urdunn'),
('JP', 'Japan', 'Asia', 'Eastern Asia', 'Nihon/Nippon'),
('KE', 'Kenya', 'Africa', 'Eastern Africa', 'Kenya'),
('KG', 'Kyrgyzstan', 'Asia', 'Southern and Central Asia', 'Kyrgyzstan'),
('KH', 'Cambodia', 'Asia', 'Southeast Asia', 'Kâmpuchéa'),
('KI', 'Kiribati', 'Oceania', 'Micronesia', 'Kiribati'),
('KM', 'Comoros', 'Africa', 'Eastern Africa', 'Komori/Comores'),
('KN', 'Saint Kitts and Nevis', 'North America', 'Caribbean', 'Saint Kitts and Nevis'),
('KP', 'North Korea', 'Asia', 'Eastern Asia', 'Choson Minjujuui In´min Konghwaguk (Bukhan)'),
('KR', 'South Korea', 'Asia', 'Eastern Asia', 'Taehan Min’guk (Namhan)'),
('KW', 'Kuwait', 'Asia', 'Middle East', 'Al-Kuwayt'),
('KY', 'Cayman Islands', 'North America', 'Caribbean', 'Cayman Islands'),
('KZ', 'Kazakstan', 'Asia', 'Southern and Central Asia', 'Qazaqstan'),
('LA', 'Laos', 'Asia', 'Southeast Asia', 'Lao'),
('LB', 'Lebanon', 'Asia', 'Middle East', 'Lubnan'),
('LC', 'Saint Lucia', 'North America', 'Caribbean', 'Saint Lucia'),
('LI', 'Liechtenstein', 'Europe', 'Western Europe', 'Liechtenstein'),
('LK', 'Sri Lanka', 'Asia', 'Southern and Central Asia', 'Sri Lanka/Ilankai'),
('LR', 'Liberia', 'Africa', 'Western Africa', 'Liberia'),
('LS', 'Lesotho', 'Africa', 'Southern Africa', 'Lesotho'),
('LT', 'Lithuania', 'Europe', 'Baltic Countries', 'Lietuva'),
('LU', 'Luxembourg', 'Europe', 'Western Europe', 'Luxembourg/Lëtzebuerg'),
('LV', 'Latvia', 'Europe', 'Baltic Countries', 'Latvija'),
('LY', 'Libyan Arab Jamahiriya', 'Africa', 'Northern Africa', 'Libiya'),
('MA', 'Morocco', 'Africa', 'Northern Africa', 'Al-Maghrib'),
('MC', 'Monaco', 'Europe', 'Western Europe', 'Monaco'),
('MD', 'Moldova', 'Europe', 'Eastern Europe', 'Moldova'),
('MG', 'Madagascar', 'Africa', 'Eastern Africa', 'Madagasikara/Madagascar'),
('MH', 'Marshall Islands', 'Oceania', 'Micronesia', 'Marshall Islands/Majol'),
('MK', 'Macedonia', 'Europe', 'Southern Europe', 'Makedonija'),
('ML', 'Mali', 'Africa', 'Western Africa', 'Mali'),
('MM', 'Myanmar', 'Asia', 'Southeast Asia', 'Myanma Pye'),
('MN', 'Mongolia', 'Asia', 'Eastern Asia', 'Mongol Uls'),
('MO', 'Macao', 'Asia', 'Eastern Asia', 'Macau/Aomen'),
('MP', 'Northern Mariana Islands', 'Oceania', 'Micronesia', 'Northern Mariana Islands'),
('MQ', 'Martinique', 'North America', 'Caribbean', 'Martinique'),
('MR', 'Mauritania', 'Africa', 'Western Africa', 'Muritaniya/Mauritanie'),
('MS', 'Montserrat', 'North America', 'Caribbean', 'Montserrat'),
('MT', 'Malta', 'Europe', 'Southern Europe', 'Malta'),
('MU', 'Mauritius', 'Africa', 'Eastern Africa', 'Mauritius'),
('MV', 'Maldives', 'Asia', 'Southern and Central Asia', 'Dhivehi Raajje/Maldives'),
('MW', 'Malawi', 'Africa', 'Eastern Africa', 'Malawi'),
('MX', 'Mexico', 'North America', 'Central America', 'México'),
('MY', 'Malaysia', 'Asia', 'Southeast Asia', 'Malaysia'),
('MZ', 'Mozambique', 'Africa', 'Eastern Africa', 'Moçambique'),
('NA', 'Namibia', 'Africa', 'Southern Africa', 'Namibia'),
('NC', 'New Caledonia', 'Oceania', 'Melanesia', 'Nouvelle-Calédonie'),
('NE', 'Niger', 'Africa', 'Western Africa', 'Niger'),
('NF', 'Norfolk Island', 'Oceania', 'Australia and New Zealand', 'Norfolk Island'),
('NG', 'Nigeria', 'Africa', 'Western Africa', 'Nigeria'),
('NI', 'Nicaragua', 'North America', 'Central America', 'Nicaragua'),
('NL', 'Netherlands', 'Europe', 'Western Europe', 'Nederland'),
('NO', 'Norway', 'Europe', 'Nordic Countries', 'Norge'),
('NP', 'Nepal', 'Asia', 'Southern and Central Asia', 'Nepal'),
('NR', 'Nauru', 'Oceania', 'Micronesia', 'Naoero/Nauru'),
('NU', 'Niue', 'Oceania', 'Polynesia', 'Niue'),
('NZ', 'New Zealand', 'Oceania', 'Australia and New Zealand', 'New Zealand/Aotearoa'),
('OM', 'Oman', 'Asia', 'Middle East', '´Uman'),
('PA', 'Panama', 'North America', 'Central America', 'Panamá'),
('PE', 'Peru', 'South America', 'South America', 'Perú/Piruw'),
('PF', 'French Polynesia', 'Oceania', 'Polynesia', 'Polynésie française'),
('PG', 'Papua New Guinea', 'Oceania', 'Melanesia', 'Papua New Guinea/Papua Niugini'),
('PH', 'Philippines', 'Asia', 'Southeast Asia', 'Pilipinas'),
('PK', 'Pakistan', 'Asia', 'Southern and Central Asia', 'Pakistan'),
('PL', 'Poland', 'Europe', 'Eastern Europe', 'Polska'),
('PM', 'Saint Pierre and Miquelon', 'North America', 'North America', 'Saint-Pierre-et-Miquelon'),
('PN', 'Pitcairn', 'Oceania', 'Polynesia', 'Pitcairn'),
('PR', 'Puerto Rico', 'North America', 'Caribbean', 'Puerto Rico'),
('PS', 'Palestine', 'Asia', 'Middle East', 'Filastin'),
('PT', 'Portugal', 'Europe', 'Southern Europe', 'Portugal'),
('PW', 'Palau', 'Oceania', 'Micronesia', 'Belau/Palau'),
('PY', 'Paraguay', 'South America', 'South America', 'Paraguay'),
('QA', 'Qatar', 'Asia', 'Middle East', 'Qatar'),
('RE', 'R&eacute;union', 'Africa', 'Eastern Africa', 'R&eacute;union'),
('RO', 'Romania', 'Europe', 'Eastern Europe', 'România'),
('RU', 'Russian Federation', 'Europe', 'Eastern Europe', 'Rossija'),
('RW', 'Rwanda', 'Africa', 'Eastern Africa', 'Rwanda/Urwanda'),
('SA', 'Saudi Arabia', 'Asia', 'Middle East', 'Al-´Arabiya as-Sa´udiya'),
('SB', 'Solomon Islands', 'Oceania', 'Melanesia', 'Solomon Islands'),
('SC', 'Seychelles', 'Africa', 'Eastern Africa', 'Sesel/Seychelles'),
('SD', 'Sudan', 'Africa', 'Northern Africa', 'As-Sudan'),
('SE', 'Sweden', 'Europe', 'Nordic Countries', 'Sverige'),
('SG', 'Singapore', 'Asia', 'Southeast Asia', 'Singapore/Singapura/Xinjiapo/Singapur'),
('SH', 'Saint Helena', 'Africa', 'Western Africa', 'Saint Helena'),
('SI', 'Slovenia', 'Europe', 'Southern Europe', 'Slovenija'),
('SJ', 'Svalbard and Jan Mayen', 'Europe', 'Nordic Countries', 'Svalbard og Jan Mayen'),
('SK', 'Slovakia', 'Europe', 'Eastern Europe', 'Slovensko'),
('SL', 'Sierra Leone', 'Africa', 'Western Africa', 'Sierra Leone'),
('SM', 'San Marino', 'Europe', 'Southern Europe', 'San Marino'),
('SN', 'Senegal', 'Africa', 'Western Africa', 'Sénégal/Sounougal'),
('SO', 'Somalia', 'Africa', 'Eastern Africa', 'Soomaaliya'),
('SR', 'Suriname', 'South America', 'South America', 'Suriname'),
('ST', 'Sao Tome and Principe', 'Africa', 'Central Africa', 'São Tomé e Príncipe'),
('SV', 'El Salvador', 'North America', 'Central America', 'El Salvador'),
('SY', 'Syria', 'Asia', 'Middle East', 'Suriya'),
('SZ', 'Swaziland', 'Africa', 'Southern Africa', 'kaNgwane'),
('TC', 'Turks and Caicos Islands', 'North America', 'Caribbean', 'The Turks and Caicos Islands'),
('TD', 'Chad', 'Africa', 'Central Africa', 'Tchad/Tshad'),
('TF', 'French Southern territories', 'Antarctica', 'Antarctica', 'Terres australes françaises'),
('TG', 'Togo', 'Africa', 'Western Africa', 'Togo'),
('TH', 'Thailand', 'Asia', 'Southeast Asia', 'Prathet Thai'),
('TJ', 'Tajikistan', 'Asia', 'Southern and Central Asia', 'Toçikiston'),
('TK', 'Tokelau', 'Oceania', 'Polynesia', 'Tokelau'),
('TM', 'Turkmenistan', 'Asia', 'Southern and Central Asia', 'Türkmenostan'),
('TN', 'Tunisia', 'Africa', 'Northern Africa', 'Tunis/Tunisie'),
('TO', 'Tonga', 'Oceania', 'Polynesia', 'Tonga'),
('TP', 'East Timor', 'Asia', 'Southeast Asia', 'Timor Timur'),
('TR', 'Turkey', 'Asia', 'Middle East', 'Türkiye'),
('TT', 'Trinidad and Tobago', 'North America', 'Caribbean', 'Trinidad and Tobago'),
('TV', 'Tuvalu', 'Oceania', 'Polynesia', 'Tuvalu'),
('TW', 'Taiwan', 'Asia', 'Eastern Asia', 'T’ai-wan'),
('TZ', 'Tanzania', 'Africa', 'Eastern Africa', 'Tanzania'),
('UA', 'Ukraine', 'Europe', 'Eastern Europe', 'Ukrajina'),
('UG', 'Uganda', 'Africa', 'Eastern Africa', 'Uganda'),
('UM', 'United States Minor Outlying Islands', 'Oceania', 'Micronesia/Caribbean', 'United States Minor Outlying Islands'),
('US', 'United States', 'North America', 'North America', 'United States'),
('UY', 'Uruguay', 'South America', 'South America', 'Uruguay'),
('UZ', 'Uzbekistan', 'Asia', 'Southern and Central Asia', 'Uzbekiston'),
('VA', 'Holy See (Vatican City State)', 'Europe', 'Southern Europe', 'Santa Sede/Città del Vaticano'),
('VC', 'Saint Vincent and the Grenadines', 'North America', 'Caribbean', 'Saint Vincent and the Grenadines'),
('VE', 'Venezuela', 'South America', 'South America', 'Venezuela'),
('VG', 'Virgin Islands, British', 'North America', 'Caribbean', 'British Virgin Islands'),
('VI', 'Virgin Islands, U.S.', 'North America', 'Caribbean', 'Virgin Islands of the United States'),
('VN', 'Vietnam', 'Asia', 'Southeast Asia', 'Viêt Nam'),
('VU', 'Vanuatu', 'Oceania', 'Melanesia', 'Vanuatu'),
('WF', 'Wallis and Futuna', 'Oceania', 'Polynesia', 'Wallis-et-Futuna'),
('WS', 'Samoa', 'Oceania', 'Polynesia', 'Samoa'),
('YE', 'Yemen', 'Asia', 'Middle East', 'Al-Yaman'),
('YT', 'Mayotte', 'Africa', 'Eastern Africa', 'Mayotte'),
('YU', 'Yugoslavia', 'Europe', 'Southern Europe', 'Jugoslavija'),
('ZA', 'South Africa', 'Africa', 'Southern Africa', 'South Africa'),
('ZM', 'Zambia', 'Africa', 'Eastern Africa', 'Zambia'),
('ZW', 'Zimbabwe', 'Africa', 'Eastern Africa', 'Zimbabwe');

-- --------------------------------------------------------

--
-- 表的结构 `gts_datas`
--

CREATE TABLE IF NOT EXISTS `gts_datas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mac_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `radius` decimal(10,1) NOT NULL,
  `top_ref` decimal(10,1) NOT NULL,
  `length` decimal(10,2) NOT NULL,
  `ruyan_depth` decimal(10,1) NOT NULL,
  `predict_ruyan` decimal(10,1) NOT NULL,
  `shiji_ruyan` decimal(10,2) DEFAULT NULL,
  `quanjin_length` decimal(10,1) NOT NULL,
  `kaizhuan_time` datetime NOT NULL,
  `chengzhuang_time` datetime NOT NULL,
  `hutong_heightRef` decimal(10,2) NOT NULL,
  `jitai_heightRef` decimal(10,2) NOT NULL,
  `zhuzhuangan` decimal(10,1) NOT NULL,
  `fuzhuangan` decimal(10,1) NOT NULL,
  `zhuantou` decimal(10,2) NOT NULL,
  `zhujinguige` varchar(10) NOT NULL,
  `hanjie_length` decimal(10,2) NOT NULL,
  `jiajinguguige` varchar(20) NOT NULL,
  `jiamigujinguige` varchar(20) NOT NULL,
  `jiami_length` int(11) NOT NULL,
  `feimigujinguige` varchar(20) NOT NULL,
  `maoguchang` decimal(10,2) NOT NULL,
  `zongkongshendu` decimal(10,2) NOT NULL,
  `yuci` decimal(10,2) NOT NULL,
  `diaojinhutong` decimal(10,1) NOT NULL,
  `hangmianjitai` decimal(10,1) NOT NULL,
  `dajielongchang` decimal(10,2) NOT NULL,
  `quanjinlongchang` decimal(10,3) NOT NULL,
  `dilong` decimal(10,2) NOT NULL,
  `quanjindilong` decimal(10,3) NOT NULL,
  `hangqiangdu` varchar(5) NOT NULL,
  `hangchaoguanliang` decimal(10,1) NOT NULL,
  `hanglilunliang` decimal(10,3) NOT NULL,
  `extra` text NOT NULL,
  `x_axis` decimal(10,1) NOT NULL,
  `y_axis` decimal(10,1) NOT NULL,
  `proId` int(11) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_proId` (`proId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `gts_datas`
--

INSERT INTO `gts_datas` (`id`, `mac_id`, `type`, `radius`, `top_ref`, `length`, `ruyan_depth`, `predict_ruyan`, `shiji_ruyan`, `quanjin_length`, `kaizhuan_time`, `chengzhuang_time`, `hutong_heightRef`, `jitai_heightRef`, `zhuzhuangan`, `fuzhuangan`, `zhuantou`, `zhujinguige`, `hanjie_length`, `jiajinguguige`, `jiamigujinguige`, `jiami_length`, `feimigujinguige`, `maoguchang`, `zongkongshendu`, `yuci`, `diaojinhutong`, `hangmianjitai`, `dajielongchang`, `quanjinlongchang`, `dilong`, `quanjindilong`, `hangqiangdu`, `hangchaoguanliang`, `hanglilunliang`, `extra`, `x_axis`, `y_axis`, `proId`) VALUES
(1, 1, 'ZZH4', '1.0', '-15.1', '23.27', '2.0', '-26.7', '-26.62', '17.5', '2014-08-26 22:20:36', '2014-08-24 22:20:41', '0.43', '1.83', '3.6', '36.0', '1.60', '20II25', '0.25', 'II14@2000', '8@100', 5, '8@200', '1.00', '40.20', '1.00', '14.5', '14.9', '24.27', '18.513', '6.77', '1.013', 'C40', '2.0', '19.847', '', '0.0', '0.0', 1),
(2, 12, 'KK86', '0.0', '0.0', '0.00', '0.0', '0.0', '0.00', '15.0', '2014-09-24 00:00:00', '2014-09-24 00:00:00', '0.00', '0.00', '0.0', '0.0', '0.00', '0', '0.00', '', '0', 0, '', '0.00', '0.00', '0.00', '0.0', '0.0', '0.00', '0.000', '0.00', '0.000', '', '0.0', '0.000', '<p>测试一下啊</p>', '315.0', '354.0', 1),
(4, 15, 'ZZH4', '0.0', '0.0', '0.00', '0.0', '0.0', '0.00', '0.0', '2014-09-25 00:00:00', '2014-09-25 00:00:00', '0.00', '0.00', '0.0', '0.0', '0.00', '0', '0.00', 'dfd', '0', 0, 'dasdf', '0.00', '0.00', '0.00', '0.0', '0.0', '0.00', '0.000', '0.00', '0.000', '', '0.0', '0.000', '<p>哎呦歪，我来了啊</p>', '415.0', '454.0', 1),
(5, 1, 'ZZH1', '1.0', '-14.8', '27.63', '6.0', '-26.5', '-26.68', '27.6', '2014-09-25 00:00:00', '2014-09-29 00:00:00', '0.00', '0.00', '0.0', '0.0', '0.00', '14Ⅱ18', '0.18', '', 'Φ8＠100', 5, 'Φ8＠200', '0.72', '42.43', '-42.00', '14.1', '0.0', '0.00', '0.000', '0.00', '0.000', '', '0.0', '0.000', '', '121.0', '210.0', 1),
(6, 2, 'ZZH2', '1.2', '-14.8', '28.65', '7.2', '-26.5', '-26.50', '19.1', '2014-09-25 00:00:00', '2014-09-28 00:00:00', '0.00', '0.00', '0.0', '0.0', '0.00', '18Ⅱ20', '0.20', '', 'Φ8＠100', 6, 'Φ8＠200', '0.80', '43.45', '-43.00', '14.0', '0.0', '0.00', '0.000', '0.00', '0.000', '', '0.0', '0.000', '', '140.0', '160.0', 1),
(7, 3, 'ZZH5', '1.0', '-14.8', '23.45', '2.0', '-26.5', '-26.50', '15.6', '2014-09-25 00:00:00', '2014-09-30 00:00:00', '0.00', '0.00', '0.0', '0.0', '0.00', '16Ⅱ18', '0.18', 'Ⅱ14＠2000', 'Φ8＠100', 5, 'Φ8＠200', '0.72', '38.25', '-38.00', '14.1', '0.0', '0.00', '0.000', '0.00', '0.000', '', '0.0', '0.000', '', '111.0', '123.0', 1);

-- --------------------------------------------------------

--
-- 表的结构 `gts_jianlirecords`
--

CREATE TABLE IF NOT EXISTS `gts_jianlirecords` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `num` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `huningtuliang` decimal(10,1) NOT NULL,
  `tanluodu` int(11) NOT NULL,
  `guanzhuGood` char(1) NOT NULL DEFAULT '0',
  `daoguanlikongdishendu` decimal(10,2) NOT NULL,
  `baguanqiandaoguanmaishen` decimal(10,2) NOT NULL,
  `baguanmeijiechangdu` decimal(10,2) NOT NULL,
  `baguanjieshu` int(11) NOT NULL,
  `baguanchangdu` decimal(10,2) NOT NULL,
  `baguanhoudaoguanmaishen` decimal(10,2) NOT NULL,
  `baguanGood` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `gts_jianlirecords`
--

INSERT INTO `gts_jianlirecords` (`id`, `num`, `time`, `huningtuliang`, `tanluodu`, `guanzhuGood`, `daoguanlikongdishendu`, `baguanqiandaoguanmaishen`, `baguanmeijiechangdu`, `baguanjieshu`, `baguanchangdu`, `baguanhoudaoguanmaishen`, `baguanGood`) VALUES
(3, 123, '2014-09-01 16:00:00', '222.0', 23432, '0', '23423.00', '234.00', '23.00', 23, '234.00', '234.00', '1');

-- --------------------------------------------------------

--
-- 表的结构 `gts_login_attempts`
--

CREATE TABLE IF NOT EXISTS `gts_login_attempts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- 表的结构 `gts_migrations`
--

CREATE TABLE IF NOT EXISTS `gts_migrations` (
  `version` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `gts_migrations`
--

INSERT INTO `gts_migrations` (`version`) VALUES
(17);

-- --------------------------------------------------------

--
-- 表的结构 `gts_overrides`
--

CREATE TABLE IF NOT EXISTS `gts_overrides` (
  `user_id` int(10) unsigned NOT NULL,
  `permission_id` smallint(5) unsigned NOT NULL,
  `allow` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `user_id1_idx` (`user_id`),
  KEY `permissions_id1_idx` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `gts_pages`
--

CREATE TABLE IF NOT EXISTS `gts_pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `body` text NOT NULL,
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0',
  `template` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `gts_pages`
--

INSERT INTO `gts_pages` (`id`, `title`, `slug`, `order`, `body`, `parent_id`, `template`) VALUES
(1, 'Homepage', '', 1, '<p>llipsu dfdfkjs dskfjskdf sdjkfjdskfj</p>', 0, 'homepage'),
(7, 'Demo', 'demo', 5, 'jkljkljkljkldsfa', 8, 'page'),
(8, 'About', 'about', 4, '<p>This is the about page content.</p>', 0, 'news_archive'),
(9, 'New archive', 'new_archive', 2, '<p>This is the new archive template test page.</p>', 0, 'news_archive'),
(10, 'Gtskk page', 'gtskk-page', 3, '<p>sdfasdf loerm ,.mdslfmasldkfjadsf</p>', 0, 'page'),
(11, 'Comment', 'comment', 0, '<p>This is the comment page.</p>', 8, 'page');

-- --------------------------------------------------------

--
-- 表的结构 `gts_pangzhans`
--

CREATE TABLE IF NOT EXISTS `gts_pangzhans` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `num` int(11) NOT NULL,
  `project_name` varchar(200) NOT NULL,
  `riqi` date NOT NULL,
  `qihou` varchar(100) NOT NULL,
  `work_address` varchar(200) NOT NULL,
  `pangzhanbuwei` varchar(50) NOT NULL,
  `zhuangjing` decimal(10,1) NOT NULL,
  `pangzhanjianlikaishishijian` date NOT NULL,
  `pangzhanjianlijieshushijian` date NOT NULL,
  `sg_zjArrive` char(1) NOT NULL DEFAULT '0',
  `sg_shanggangzheng` char(1) NOT NULL DEFAULT '0',
  `sg_machineArrive` char(1) NOT NULL DEFAULT '0',
  `sg_materialCheck` char(1) NOT NULL DEFAULT '0',
  `sg_hunningtuDoc` char(1) NOT NULL DEFAULT '0',
  `sg_tiaojianReq` char(1) NOT NULL DEFAULT '0',
  `jl_shuangshejiqiangdu` varchar(50) NOT NULL,
  `jl_kongdibiaogao` decimal(10,2) NOT NULL,
  `jl_kongkoubiaogao` decimal(10,2) NOT NULL,
  `jl_shejishuanmianbiaogao` decimal(10,2) NOT NULL,
  `jl_daoguanchangdu` decimal(10,2) NOT NULL,
  `jl_lilunshuanshouguan` decimal(10,2) NOT NULL,
  `jl_lilunshuanliang` decimal(10,2) NOT NULL,
  `jl_shuanshikuai` varchar(50) NOT NULL,
  `jl_shuanmianbiaogao` decimal(10,2) NOT NULL,
  `jl_chongyingxishu` decimal(10,2) NOT NULL,
  `que_weifanqiangzhixing` char(1) NOT NULL DEFAULT '0',
  `que_yingxiangzhiliang` char(1) NOT NULL DEFAULT '0',
  `chuliyijiang` text NOT NULL,
  `extra` text NOT NULL,
  `shigongqiye` varchar(100) NOT NULL DEFAULT '',
  `jianliqiye` varchar(100) NOT NULL DEFAULT '',
  `xiangmujinglibu` varchar(100) NOT NULL DEFAULT '',
  `xiangmujianlijigou` varchar(100) NOT NULL DEFAULT '',
  `zhijianyuan` varchar(50) NOT NULL DEFAULT '',
  `pangzhanjianli` varchar(50) NOT NULL DEFAULT '',
  `zhijianyuanqianziriqi` date NOT NULL,
  `jianliqianziriqi` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `gts_pangzhans`
--

INSERT INTO `gts_pangzhans` (`id`, `num`, `project_name`, `riqi`, `qihou`, `work_address`, `pangzhanbuwei`, `zhuangjing`, `pangzhanjianlikaishishijian`, `pangzhanjianlijieshushijian`, `sg_zjArrive`, `sg_shanggangzheng`, `sg_machineArrive`, `sg_materialCheck`, `sg_hunningtuDoc`, `sg_tiaojianReq`, `jl_shuangshejiqiangdu`, `jl_kongdibiaogao`, `jl_kongkoubiaogao`, `jl_shejishuanmianbiaogao`, `jl_daoguanchangdu`, `jl_lilunshuanshouguan`, `jl_lilunshuanliang`, `jl_shuanshikuai`, `jl_shuanmianbiaogao`, `jl_chongyingxishu`, `que_weifanqiangzhixing`, `que_yingxiangzhiliang`, `chuliyijiang`, `extra`, `shigongqiye`, `jianliqiye`, `xiangmujinglibu`, `xiangmujianlijigou`, `zhijianyuan`, `pangzhanjianli`, `zhijianyuanqianziriqi`, `jianliqianziriqi`) VALUES
(15, 123, '你好世界', '2014-09-28', '说说', '啊啊', '大大', '0.0', '2014-09-28', '2014-09-28', '0', '0', '0', '0', '0', '0', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0.00', '0.00', '0', '0', '<p>adsfasd</p>', '<p>adsfasd</p>', 'adsfasd', 'sdafsd', '', '', '', '', '2014-09-28', '2014-09-28');

-- --------------------------------------------------------

--
-- 表的结构 `gts_permissions`
--

CREATE TABLE IF NOT EXISTS `gts_permissions` (
  `permission_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `permission` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`permission_id`),
  UNIQUE KEY `permission_UNIQUE` (`permission`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `gts_permissions`
--

INSERT INTO `gts_permissions` (`permission_id`, `permission`, `description`, `parent`, `sort`) VALUES
(3, 'pingjian', '平检数据查看权限', '', NULL),
(4, 'data', '汇总表数据权限', '0', 0),
(5, 'pangzhan', '旁站数据权限', '0', 0),
(6, 'user', '用户管理权限', '0', 0),
(7, 'permission', '权限管理权限', '0', 0),
(8, 'role', '角色管理权限', '0', 0),
(9, 'project', '项目管理权限', '0', 0);

-- --------------------------------------------------------

--
-- 表的结构 `gts_pingjians`
--

CREATE TABLE IF NOT EXISTS `gts_pingjians` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mac_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `radius` decimal(10,1) NOT NULL,
  `shikuai` varchar(50) NOT NULL,
  `kaikong_zhuangdingbiaogao` decimal(10,2) NOT NULL,
  `kaikong_zhuangdibiaogao` decimal(10,2) NOT NULL,
  `kaikong_hutongbiaogao` decimal(10,2) NOT NULL,
  `kaikong_jitaibiaogao` decimal(10,2) NOT NULL,
  `kaikong_zhuantouchangdu` decimal(10,2) NOT NULL,
  `kaikong_shuipingduizhong` char(1) NOT NULL DEFAULT '0',
  `kaikong_kaizhuanshijian` datetime NOT NULL,
  `kaikong_jianli` varchar(50) NOT NULL DEFAULT '',
  `chengkong_zhuganchang` decimal(10,2) NOT NULL,
  `chengkong_zhuanjuzongchang` decimal(10,2) NOT NULL,
  `chengkong_jiyuci` decimal(10,2) NOT NULL,
  `chengkong_zongkongshendu` decimal(10,2) NOT NULL,
  `chengkong_yujiruyanbiaogao` decimal(10,2) NOT NULL,
  `chengkong_yiciqingkongnijiangbizhong` decimal(10,1) NOT NULL,
  `chengkong_shijiruyanbiaogao` decimal(10,2) NOT NULL,
  `chengkong_jianli` varchar(50) NOT NULL,
  `gjgza_zhujinguige` varchar(10) NOT NULL,
  `gjgza_jiaqiangjinguige` varchar(10) NOT NULL,
  `gjgza_jiamiluoxuanjin` varchar(10) NOT NULL,
  `gjgza_jiamichangdu` int(10) NOT NULL,
  `gjgza_feimiluoxuanjin` varchar(10) NOT NULL,
  `gjgza_zhihutongdiaojin` decimal(10,2) NOT NULL,
  `gjgza_quanjinlongjieshu` int(10) NOT NULL,
  `gjgza_banquanjinlongchangdu` decimal(10,6) NOT NULL,
  `gjgza_dajiehoulongchangdu` decimal(10,2) NOT NULL,
  `gjgza_dilongchang` decimal(10,2) NOT NULL,
  `gjgza_leijizonglongshu` int(10) NOT NULL,
  `gjgza_jianli` varchar(50) NOT NULL,
  `gjgza_jianliqianzi` char(1) NOT NULL,
  `ecqk_nijiangbizhong` decimal(10,2) NOT NULL,
  `ecqk_chenzha` int(10) NOT NULL,
  `ecqk_qingkonghoukongshen` decimal(10,2) NOT NULL,
  `ecqk_jianli` varchar(50) NOT NULL,
  `shuanguanzhu_daoguanjukongdijuli` int(10) NOT NULL,
  `shuanguanzhu_shuanqiangdu` varchar(10) NOT NULL,
  `shuanguanzhu_tanluodu` int(10) NOT NULL,
  `shuanguanzhu_shuanshijiliang` decimal(10,2) NOT NULL,
  `shuanguanzhu_shuanlilunliang` decimal(10,2) NOT NULL,
  `shuanguanzhu_chongyingxishu` decimal(10,2) NOT NULL,
  `shuanguanzhu_shuanmianduihutongjuli` decimal(10,2) NOT NULL,
  `shuanguanzhu_shuanmianduijitaijuli` decimal(10,2) NOT NULL,
  `shuanguanzhu_guanzhushijian` datetime NOT NULL,
  `shuanguanzhu_jianli` varchar(50) NOT NULL,
  `extra` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `gts_pingjians`
--

INSERT INTO `gts_pingjians` (`id`, `mac_id`, `type`, `radius`, `shikuai`, `kaikong_zhuangdingbiaogao`, `kaikong_zhuangdibiaogao`, `kaikong_hutongbiaogao`, `kaikong_jitaibiaogao`, `kaikong_zhuantouchangdu`, `kaikong_shuipingduizhong`, `kaikong_kaizhuanshijian`, `kaikong_jianli`, `chengkong_zhuganchang`, `chengkong_zhuanjuzongchang`, `chengkong_jiyuci`, `chengkong_zongkongshendu`, `chengkong_yujiruyanbiaogao`, `chengkong_yiciqingkongnijiangbizhong`, `chengkong_shijiruyanbiaogao`, `chengkong_jianli`, `gjgza_zhujinguige`, `gjgza_jiaqiangjinguige`, `gjgza_jiamiluoxuanjin`, `gjgza_jiamichangdu`, `gjgza_feimiluoxuanjin`, `gjgza_zhihutongdiaojin`, `gjgza_quanjinlongjieshu`, `gjgza_banquanjinlongchangdu`, `gjgza_dajiehoulongchangdu`, `gjgza_dilongchang`, `gjgza_leijizonglongshu`, `gjgza_jianli`, `gjgza_jianliqianzi`, `ecqk_nijiangbizhong`, `ecqk_chenzha`, `ecqk_qingkonghoukongshen`, `ecqk_jianli`, `shuanguanzhu_daoguanjukongdijuli`, `shuanguanzhu_shuanqiangdu`, `shuanguanzhu_tanluodu`, `shuanguanzhu_shuanshijiliang`, `shuanguanzhu_shuanlilunliang`, `shuanguanzhu_chongyingxishu`, `shuanguanzhu_shuanmianduihutongjuli`, `shuanguanzhu_shuanmianduijitaijuli`, `shuanguanzhu_guanzhushijian`, `shuanguanzhu_jianli`, `extra`) VALUES
(1, 2, 'ddd', '3.0', 'sdafsd', '222.00', '1.00', '1.00', '1.00', '1.00', '0', '2014-09-10 00:00:00', 'dddd', '0.00', '0.00', '0.00', '0.00', '0.00', '0.0', '0.00', '', '', '', '', 0, '', '0.00', 0, '0.000000', '0.00', '0.00', 0, '', '0', '0.00', 0, '0.00', '', 0, '', 0, '0.00', '0.00', '0.00', '0.00', '0.00', '2014-09-26 00:00:00', '', 'asdfs');

-- --------------------------------------------------------

--
-- 表的结构 `gts_projects`
--

CREATE TABLE IF NOT EXISTS `gts_projects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `background` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `gts_projects`
--

INSERT INTO `gts_projects` (`id`, `name`, `created`, `modified`, `background`) VALUES
(1, '钻孔灌注桩', '2014-10-24 00:00:00', '0000-00-00 00:00:00', ''),
(2, '测试项目', '2014-10-24 02:59:40', '2014-10-27 00:06:11', 'http://localhost/gongcheng/uploads/7b0b45d5d9fa4b55a5f3d03799566f53.jpg'),
(4, 'demo', '2014-10-27 00:02:12', '2014-10-27 00:18:55', 'http://localhost/gongcheng/uploads/ce0ef89ee59724b61d61e24eb78234ab.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `gts_roles`
--

CREATE TABLE IF NOT EXISTS `gts_roles` (
  `role_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `full` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `default` tinyint(1) NOT NULL,
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `role_UNIQUE` (`role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `gts_roles`
--

INSERT INTO `gts_roles` (`role_id`, `role`, `full`, `default`) VALUES
(1, 'admin', 'Administrator', 0),
(2, 'user', 'User', 1),
(3, 'test', 'TestRole', 0);

-- --------------------------------------------------------

--
-- 表的结构 `gts_role_permissions`
--

CREATE TABLE IF NOT EXISTS `gts_role_permissions` (
  `role_id` tinyint(3) unsigned NOT NULL,
  `permission_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`permission_id`),
  KEY `role_id2_idx` (`role_id`),
  KEY `permission_id2_idx` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `gts_role_permissions`
--

INSERT INTO `gts_role_permissions` (`role_id`, `permission_id`) VALUES
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(2, 3),
(2, 4),
(2, 5),
(3, 3);

-- --------------------------------------------------------

--
-- 表的结构 `gts_users`
--

CREATE TABLE IF NOT EXISTS `gts_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` char(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `approved` tinyint(1) DEFAULT NULL COMMENT 'For acct approval.',
  `meta` varchar(2000) COLLATE utf8_unicode_ci DEFAULT '',
  `last_ip` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `gts_users`
--

INSERT INTO `gts_users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `approved`, `meta`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(1, 'gtskk', '$2a$08$45FEeOvGfuBrWGcxoqOUUe2gCV1mX6VsA2SvXPLaLl.M5tQ6WM91a', 'tttt6399998@126.com', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, 'a:2:{s:12:"display_name";s:12:"哥特式KKK";s:5:"phone";s:11:"15856812418";}', '127.0.0.1', '2014-10-26 23:18:23', '2014-10-21 11:28:39', '2014-10-26 15:18:23'),
(2, 'rock', '$2a$08$vLaY0qSlxRs4UhqxJulaJeGh/KoAul7IA3m97.sbIAn4ny/o9f03G', '107104029@qq.com', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, 'a:2:{s:12:"display_name";s:6:"英雄";s:5:"phone";s:11:"15212230015";}', '127.0.0.1', '2014-10-25 20:54:47', '2014-10-25 16:07:42', '2014-10-25 12:54:47');

-- --------------------------------------------------------

--
-- 表的结构 `gts_user_autologin`
--

CREATE TABLE IF NOT EXISTS `gts_user_autologin` (
  `key_id` char(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_agent` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `gts_user_profiles`
--

CREATE TABLE IF NOT EXISTS `gts_user_profiles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `gender` char(1) COLLATE utf8_unicode_ci DEFAULT '',
  `display_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date NOT NULL,
  `country` char(2) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT '',
  `timezone` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `website` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT '',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `gts_user_profiles`
--

INSERT INTO `gts_user_profiles` (`id`, `name`, `gender`, `display_name`, `phone`, `dob`, `country`, `timezone`, `website`, `modified`) VALUES
(1, '', 'M', '哥特式KKK', '15856812418', '2014-10-25', '', '', '', '2014-10-25 09:50:08'),
(2, '', '', '英雄', '15212230015', '2014-10-25', '', '', '', '2014-10-25 09:50:38'),
(3, '', '', NULL, NULL, '2014-10-25', '', '', '', '2014-10-25 08:26:31'),
(5, '', '', '哥特式KKdadfads', '15212230025', '2014-10-25', '', '', '', '2014-10-25 08:41:58');

-- --------------------------------------------------------

--
-- 表的结构 `gts_user_roles`
--

CREATE TABLE IF NOT EXISTS `gts_user_roles` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_id2_idx` (`user_id`),
  KEY `role_id1_idx` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `gts_user_roles`
--

INSERT INTO `gts_user_roles` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2);

--
-- 限制导出的表
--

--
-- 限制表 `gts_datas`
--
ALTER TABLE `gts_datas`
  ADD CONSTRAINT `fk_proId` FOREIGN KEY (`proId`) REFERENCES `gts_projects` (`id`);

--
-- 限制表 `gts_overrides`
--
ALTER TABLE `gts_overrides`
  ADD CONSTRAINT `permission_id1` FOREIGN KEY (`permission_id`) REFERENCES `gts_permissions` (`permission_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_id1` FOREIGN KEY (`user_id`) REFERENCES `gts_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- 限制表 `gts_role_permissions`
--
ALTER TABLE `gts_role_permissions`
  ADD CONSTRAINT `permission_id2` FOREIGN KEY (`permission_id`) REFERENCES `gts_permissions` (`permission_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `role_id2` FOREIGN KEY (`role_id`) REFERENCES `gts_roles` (`role_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- 限制表 `gts_user_roles`
--
ALTER TABLE `gts_user_roles`
  ADD CONSTRAINT `role_id1` FOREIGN KEY (`role_id`) REFERENCES `gts_roles` (`role_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_id2` FOREIGN KEY (`user_id`) REFERENCES `gts_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
