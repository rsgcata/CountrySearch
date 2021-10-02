PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE doctrine_migration_versions (version VARCHAR(191) NOT NULL, executed_at DATETIME DEFAULT NULL, execution_time INTEGER DEFAULT NULL, PRIMARY KEY(version));
INSERT INTO doctrine_migration_versions VALUES('DoctrineMigrations\Version20210930194312','2021-09-30 19:43:34',48);
CREATE TABLE countries (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(192) NOT NULL, country_code CHAR(2) DEFAULT NULL, calling_code SMALLINT NOT NULL);
INSERT INTO countries VALUES(1,'Romaniaaaaa','RO',40);
INSERT INTO countries VALUES(2,'France','FR',33);
INSERT INTO countries VALUES(3,'Australia','AU',61);
INSERT INTO countries VALUES(4,'Belgium','BE',32);
INSERT INTO countries VALUES(5,'Canada','CA',1);
INSERT INTO countries VALUES(6,'China','CN',86);
INSERT INTO countries VALUES(7,'Finland','FI',358);
INSERT INTO countries VALUES(8,'Germany','DE',49);
INSERT INTO countries VALUES(9,'Greece','GR',30);
INSERT INTO countries VALUES(10,'Italy','IT',39);
INSERT INTO countries VALUES(11,'Spain','ES',34);
INSERT INTO countries VALUES(12,'United Kingdom','GB',44);
INSERT INTO countries VALUES(13,'United States','US',1);
INSERT INTO countries VALUES(14,'Afghanistan','AF',93);
INSERT INTO countries VALUES(15,'Albania','AL',355);
INSERT INTO countries VALUES(16,'Algeria','DZ',213);
INSERT INTO countries VALUES(17,'American Samoa','AS',1684);
INSERT INTO countries VALUES(18,'Andorra','AD',376);
INSERT INTO countries VALUES(19,'Angola','AO',244);
INSERT INTO countries VALUES(20,'Anguilla','AI',1264);
INSERT INTO countries VALUES(21,'Antarctica','AQ',672);
INSERT INTO countries VALUES(22,'Antigua and Barbuda','AG',1268);
INSERT INTO countries VALUES(23,'Argentina','AR',54);
INSERT INTO countries VALUES(24,'Armenia','AM',374);
INSERT INTO countries VALUES(25,'Aruba','AW',297);
INSERT INTO countries VALUES(26,'Austria','AT',43);
INSERT INTO countries VALUES(27,'Azerbaijan','AZ',994);
INSERT INTO countries VALUES(28,'Bahamas','BS',1242);
INSERT INTO countries VALUES(29,'Bahrain','BH',973);
INSERT INTO countries VALUES(30,'Bangladesh','BD',880);
INSERT INTO countries VALUES(31,'Barbados','BB',1246);
INSERT INTO countries VALUES(32,'Belarus','BY',375);
INSERT INTO countries VALUES(33,'Belize','BZ',501);
INSERT INTO countries VALUES(34,'Benin','BJ',229);
INSERT INTO countries VALUES(35,'Bermuda','BM',1441);
INSERT INTO countries VALUES(36,'Bhutan','BT',975);
INSERT INTO countries VALUES(37,'Bolivia','BO',591);
INSERT INTO countries VALUES(38,'Bosnia and Herzegovina','BA',387);
INSERT INTO countries VALUES(39,'Botswana','BW',267);
INSERT INTO countries VALUES(40,'Brazil','BR',55);
INSERT INTO countries VALUES(41,'British Virgin Islands','VG',1284);
INSERT INTO countries VALUES(42,'Brunei','BN',673);
INSERT INTO countries VALUES(43,'Bulgaria','BG',359);
INSERT INTO countries VALUES(44,'Burkina Faso','BF',226);
INSERT INTO countries VALUES(45,'Burma (Myanmar)','MM',95);
INSERT INTO countries VALUES(46,'Burundi','BI',257);
INSERT INTO countries VALUES(47,'Cambodia','KH',855);
INSERT INTO countries VALUES(48,'Cameroon','CM',237);
INSERT INTO countries VALUES(49,'Cape Verde','CV',238);
INSERT INTO countries VALUES(50,'Cayman Islands','KY',1345);
INSERT INTO countries VALUES(51,'Central African Republic','CF',236);
INSERT INTO countries VALUES(52,'Chad','TD',235);
INSERT INTO countries VALUES(53,'Chile','CL',56);
INSERT INTO countries VALUES(54,'Christmas Island','CX',61);
INSERT INTO countries VALUES(55,'Cocos (Keeling) Islands','CC',61);
INSERT INTO countries VALUES(56,'Colombia','CO',57);
INSERT INTO countries VALUES(57,'Comoros','KM',269);
INSERT INTO countries VALUES(58,'Cook Islands','CK',682);
INSERT INTO countries VALUES(59,'Costa Rica','CR',506);
INSERT INTO countries VALUES(60,'Croatia','HR',385);
INSERT INTO countries VALUES(61,'Cuba','CU',53);
INSERT INTO countries VALUES(62,'Cyprus','CY',357);
INSERT INTO countries VALUES(63,'Czech Republic','CZ',420);
INSERT INTO countries VALUES(64,'Democratic Republic of the Congo','CD',243);
INSERT INTO countries VALUES(65,'Denmark','DK',45);
INSERT INTO countries VALUES(66,'Djibouti','DJ',253);
INSERT INTO countries VALUES(67,'Dominica','DM',1767);
INSERT INTO countries VALUES(68,'Dominican Republic','DO',1809);
INSERT INTO countries VALUES(69,'Ecuador','EC',593);
INSERT INTO countries VALUES(70,'Egypt','EG',20);
INSERT INTO countries VALUES(71,'El Salvador','SV',503);
INSERT INTO countries VALUES(72,'Equatorial Guinea','GQ',240);
INSERT INTO countries VALUES(73,'Eritrea','ER',291);
INSERT INTO countries VALUES(74,'Estonia','EE',372);
INSERT INTO countries VALUES(75,'Ethiopia','ET',251);
INSERT INTO countries VALUES(76,'Falkland Islands','FK',500);
INSERT INTO countries VALUES(77,'Faroe Islands','FO',298);
INSERT INTO countries VALUES(78,'Fiji','FJ',679);
INSERT INTO countries VALUES(79,'French Polynesia','PF',689);
INSERT INTO countries VALUES(80,'Gabon','GA',241);
INSERT INTO countries VALUES(81,'Gambia','GM',220);
INSERT INTO countries VALUES(82,'Gaza Strip',NULL,970);
INSERT INTO countries VALUES(83,'Georgia','GE',995);
INSERT INTO countries VALUES(84,'Ghana','GH',233);
INSERT INTO countries VALUES(85,'Gibraltar','GI',350);
INSERT INTO countries VALUES(86,'Greenland','GL',299);
INSERT INTO countries VALUES(87,'Grenada','GD',1473);
INSERT INTO countries VALUES(88,'Guam','GU',1671);
INSERT INTO countries VALUES(89,'Guatemala','GT',502);
INSERT INTO countries VALUES(90,'Guinea','GN',224);
INSERT INTO countries VALUES(91,'Guinea-Bissau','GW',245);
INSERT INTO countries VALUES(92,'Guyana','GY',592);
INSERT INTO countries VALUES(93,'Haiti','HT',509);
INSERT INTO countries VALUES(94,'Holy See (Vatican City)','VA',39);
INSERT INTO countries VALUES(95,'Honduras','HN',504);
INSERT INTO countries VALUES(96,'Hong Kong','HK',852);
INSERT INTO countries VALUES(97,'Hungary','HU',36);
INSERT INTO countries VALUES(98,'Iceland','IS',354);
INSERT INTO countries VALUES(99,'India','IN',91);
INSERT INTO countries VALUES(100,'Indonesia','ID',62);
INSERT INTO countries VALUES(101,'Iran','IR',98);
INSERT INTO countries VALUES(102,'Iraq','IQ',964);
INSERT INTO countries VALUES(103,'Ireland','IE',353);
INSERT INTO countries VALUES(104,'Isle of Man','IM',44);
INSERT INTO countries VALUES(105,'Israel','IL',972);
INSERT INTO countries VALUES(106,'Ivory Coast','CI',225);
INSERT INTO countries VALUES(107,'Jamaica','JM',1876);
INSERT INTO countries VALUES(108,'Japan','JP',81);
INSERT INTO countries VALUES(109,'Jordan','JO',962);
INSERT INTO countries VALUES(110,'Kazakhstan','KZ',7);
INSERT INTO countries VALUES(111,'Kenya','KE',254);
INSERT INTO countries VALUES(112,'Kiribati','KI',686);
INSERT INTO countries VALUES(113,'Kosovo',NULL,381);
INSERT INTO countries VALUES(114,'Kuwait','KW',965);
INSERT INTO countries VALUES(115,'Kyrgyzstan','KG',996);
INSERT INTO countries VALUES(116,'Laos','LA',856);
INSERT INTO countries VALUES(117,'Latvia','LV',371);
INSERT INTO countries VALUES(118,'Lebanon','LB',961);
INSERT INTO countries VALUES(119,'Lesotho','LS',266);
INSERT INTO countries VALUES(120,'Liberia','LR',231);
INSERT INTO countries VALUES(121,'Libya','LY',218);
INSERT INTO countries VALUES(122,'Liechtenstein','LI',423);
INSERT INTO countries VALUES(123,'Lithuania','LT',370);
INSERT INTO countries VALUES(124,'Luxembourg','LU',352);
INSERT INTO countries VALUES(125,'Macau','MO',853);
INSERT INTO countries VALUES(126,'Macedonia','MK',389);
INSERT INTO countries VALUES(127,'Madagascar','MG',261);
INSERT INTO countries VALUES(128,'Malawi','MW',265);
INSERT INTO countries VALUES(129,'Malaysia','MY',60);
INSERT INTO countries VALUES(130,'Maldives','MV',960);
INSERT INTO countries VALUES(131,'Mali','ML',223);
INSERT INTO countries VALUES(132,'Malta','MT',356);
INSERT INTO countries VALUES(133,'Marshall Islands','MH',692);
INSERT INTO countries VALUES(134,'Mauritania','MR',222);
INSERT INTO countries VALUES(135,'Mauritius','MU',230);
INSERT INTO countries VALUES(136,'Mayotte','YT',262);
INSERT INTO countries VALUES(137,'Mexico','MX',52);
INSERT INTO countries VALUES(138,'Micronesia','FM',691);
INSERT INTO countries VALUES(139,'Moldova','MD',373);
INSERT INTO countries VALUES(140,'Monaco','MC',377);
INSERT INTO countries VALUES(141,'Mongolia','MN',976);
INSERT INTO countries VALUES(142,'Montenegro','ME',382);
INSERT INTO countries VALUES(143,'Montserrat','MS',1664);
INSERT INTO countries VALUES(144,'Morocco','MA',212);
INSERT INTO countries VALUES(145,'Mozambique','MZ',258);
INSERT INTO countries VALUES(146,'Namibia','NA',264);
INSERT INTO countries VALUES(147,'Nauru','NR',674);
INSERT INTO countries VALUES(148,'Nepal','NP',977);
INSERT INTO countries VALUES(149,'Netherlands','NL',31);
INSERT INTO countries VALUES(150,'Netherlands Antilles','AN',599);
INSERT INTO countries VALUES(151,'New Caledonia','NC',687);
INSERT INTO countries VALUES(152,'New Zealand','NZ',64);
INSERT INTO countries VALUES(153,'Nicaragua','NI',505);
INSERT INTO countries VALUES(154,'Niger','NE',227);
INSERT INTO countries VALUES(155,'Nigeria','NG',234);
INSERT INTO countries VALUES(156,'Niue','NU',683);
INSERT INTO countries VALUES(157,'Norfolk Island',NULL,672);
INSERT INTO countries VALUES(158,'North Korea','KP',850);
INSERT INTO countries VALUES(159,'Northern Mariana Islands','MP',1670);
INSERT INTO countries VALUES(160,'Norway','NO',47);
INSERT INTO countries VALUES(161,'Oman','OM',968);
INSERT INTO countries VALUES(162,'Pakistan','PK',92);
INSERT INTO countries VALUES(163,'Palau','PW',680);
INSERT INTO countries VALUES(164,'Panama','PA',507);
INSERT INTO countries VALUES(165,'Papua New Guinea','PG',675);
INSERT INTO countries VALUES(166,'Paraguay','PY',595);
INSERT INTO countries VALUES(167,'Peru','PE',51);
INSERT INTO countries VALUES(168,'Philippines','PH',63);
INSERT INTO countries VALUES(169,'Pitcairn Islands','PN',870);
INSERT INTO countries VALUES(170,'Poland','PL',48);
INSERT INTO countries VALUES(171,'Portugal','PT',351);
INSERT INTO countries VALUES(172,'Puerto Rico','PR',1);
INSERT INTO countries VALUES(173,'Qatar','QA',974);
INSERT INTO countries VALUES(174,'Republic of the Congo','CG',242);
INSERT INTO countries VALUES(175,'Russia','RU',7);
INSERT INTO countries VALUES(176,'Rwanda','RW',250);
INSERT INTO countries VALUES(177,'Saint Barthelemy','BL',590);
INSERT INTO countries VALUES(178,'Saint Helena','SH',290);
INSERT INTO countries VALUES(179,'Saint Kitts and Nevis','KN',1869);
INSERT INTO countries VALUES(180,'Saint Lucia','LC',1758);
INSERT INTO countries VALUES(181,'Saint Martin','MF',1599);
INSERT INTO countries VALUES(182,'Saint Pierre and Miquelon','PM',508);
INSERT INTO countries VALUES(183,'Saint Vincent and the Grenadines','VC',1784);
INSERT INTO countries VALUES(184,'Samoa','WS',685);
INSERT INTO countries VALUES(185,'San Marino','SM',378);
INSERT INTO countries VALUES(186,'Sao Tome and Principe','ST',239);
INSERT INTO countries VALUES(187,'Saudi Arabia','SA',966);
INSERT INTO countries VALUES(188,'Senegal','SN',221);
INSERT INTO countries VALUES(189,'Serbia','RS',381);
INSERT INTO countries VALUES(190,'Seychelles','SC',248);
INSERT INTO countries VALUES(191,'Sierra Leone','SL',232);
INSERT INTO countries VALUES(192,'Singapore','SG',65);
INSERT INTO countries VALUES(193,'Slovakia','SK',421);
INSERT INTO countries VALUES(194,'Slovenia','SI',386);
INSERT INTO countries VALUES(195,'Solomon Islands','SB',677);
INSERT INTO countries VALUES(196,'Somalia','SO',252);
INSERT INTO countries VALUES(197,'South Africa','ZA',27);
INSERT INTO countries VALUES(198,'South Korea','KR',82);
INSERT INTO countries VALUES(199,'Sri Lanka','LK',94);
INSERT INTO countries VALUES(200,'Sudan','SD',249);
INSERT INTO countries VALUES(201,'Suriname','SR',597);
INSERT INTO countries VALUES(202,'Swaziland','SZ',268);
INSERT INTO countries VALUES(203,'Sweden','SE',46);
INSERT INTO countries VALUES(204,'Switzerland','CH',41);
INSERT INTO countries VALUES(205,'Syria','SY',963);
INSERT INTO countries VALUES(206,'Taiwan','TW',886);
INSERT INTO countries VALUES(207,'Tajikistan','TJ',992);
INSERT INTO countries VALUES(208,'Tanzania','TZ',255);
INSERT INTO countries VALUES(209,'Thailand','TH',66);
INSERT INTO countries VALUES(210,'Timor-Leste','TL',670);
INSERT INTO countries VALUES(211,'Togo','TG',228);
INSERT INTO countries VALUES(212,'Tokelau','TK',690);
INSERT INTO countries VALUES(213,'Tonga','TO',676);
INSERT INTO countries VALUES(214,'Trinidad and Tobago','TT',1868);
INSERT INTO countries VALUES(215,'Tunisia','TN',216);
INSERT INTO countries VALUES(216,'Turkey','TR',90);
INSERT INTO countries VALUES(217,'Turkmenistan','TM',993);
INSERT INTO countries VALUES(218,'Turks and Caicos Islands','TC',1649);
INSERT INTO countries VALUES(219,'Tuvalu','TV',688);
INSERT INTO countries VALUES(220,'Uganda','UG',256);
INSERT INTO countries VALUES(221,'Ukraine','UA',380);
INSERT INTO countries VALUES(222,'United Arab Emirates','AE',971);
INSERT INTO countries VALUES(223,'Uruguay','UY',598);
INSERT INTO countries VALUES(224,'US Virgin Islands','VI',1340);
INSERT INTO countries VALUES(225,'Uzbekistan','UZ',998);
INSERT INTO countries VALUES(226,'Vanuatu','VU',678);
INSERT INTO countries VALUES(227,'Venezuela','VE',58);
INSERT INTO countries VALUES(228,'Vietnam','VN',84);
INSERT INTO countries VALUES(229,'Wallis and Futuna','WF',681);
INSERT INTO countries VALUES(230,'West Bank',NULL,970);
INSERT INTO countries VALUES(231,'Yemen','YE',967);
INSERT INTO countries VALUES(232,'Zambia','ZM',260);
INSERT INTO countries VALUES(233,'Zimbabwe','ZW',263);
DELETE FROM sqlite_sequence;
INSERT INTO sqlite_sequence VALUES('countries',233);
CREATE UNIQUE INDEX UNIQ_5D66EBADF026BB7C ON countries (country_code);
COMMIT;