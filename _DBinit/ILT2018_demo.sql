SET NAMES utf8;
SET time_zone = '+08:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `ilt2018`;
CREATE DATABASE `ilt2018` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `ilt2018`;

-- 
-- 資料庫: `ilt2018`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `account`
-- 

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `serial` int(11) NOT NULL auto_increment,
  `id` varchar(85) NOT NULL default '',
  `idchange` varchar(85) NOT NULL default '',
  `money` varchar(85) NOT NULL default '',
  `atmchk` varchar(85) NOT NULL default '',
  `time` varchar(85) NOT NULL default '',
  PRIMARY KEY  (`serial`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- 列出以下資料庫的數據： `account`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `bestreviewer`
-- 

DROP TABLE IF EXISTS `bestreviewer`;
CREATE TABLE IF NOT EXISTS `bestreviewer` (
  `id` varchar(85) NOT NULL,
  `passwd` varchar(85) NOT NULL,
  `name` varchar(85) NOT NULL,
  `sever` varchar(85) NOT NULL,
  `email` varchar(85) NOT NULL,
  `paperno1` varchar(17) NOT NULL,
  `comment1` text NOT NULL,
  `recommend1` int(4) NOT NULL,
  `paper_chk1` varchar(4) NOT NULL default '0',
  `abstract_chk1` varchar(4) NOT NULL default '0',
  `chk_state1` varchar(4) NOT NULL default '0',
  `chktime1` varchar(34) NOT NULL,
  `paperno2` varchar(17) NOT NULL,
  `comment2` text NOT NULL,
  `recommend2` varchar(85) NOT NULL,
  `paper_chk2` varchar(4) NOT NULL default '0',
  `abstract_chk2` varchar(4) NOT NULL default '0',
  `chk_state2` varchar(4) NOT NULL default '0',
  `chktime2` varchar(34) NOT NULL,
  `paperno3` varchar(17) NOT NULL,
  `comment3` text NOT NULL,
  `recommend3` varchar(85) NOT NULL,
  `paper_chk3` varchar(4) NOT NULL default '0',
  `abstract_chk3` varchar(4) NOT NULL default '0',
  `chk_state3` varchar(4) NOT NULL default '0',
  `chktime3` varchar(17) NOT NULL,
  `paperno4` varchar(17) NOT NULL,
  `comment4` text NOT NULL,
  `recommend4` varchar(85) NOT NULL,
  `paper_chk4` varchar(4) NOT NULL default '0',
  `abstract_chk4` varchar(4) NOT NULL default '0',
  `chk_state4` varchar(4) NOT NULL default '0',
  `chktime4` varchar(34) NOT NULL,
  `paperno5` varchar(17) NOT NULL,
  `comment5` text NOT NULL,
  `recommend5` varchar(85) NOT NULL,
  `paper_chk5` varchar(4) NOT NULL default '0',
  `abstract_chk5` varchar(4) NOT NULL default '0',
  `chk_state5` varchar(4) NOT NULL default '0',
  `chktime5` varchar(34) NOT NULL,
  `paperno6` varchar(17) NOT NULL,
  `comment6` text NOT NULL,
  `recommend6` varchar(85) NOT NULL,
  `paper_chk6` varchar(4) NOT NULL default '0',
  `abstract_chk6` varchar(4) NOT NULL default '0',
  `chk_state6` varchar(4) NOT NULL default '0',
  `chktime6` varchar(34) NOT NULL,
  `paperno7` varchar(17) NOT NULL,
  `comment7` text NOT NULL,
  `recommend7` varchar(85) NOT NULL,
  `paper_chk7` varchar(4) NOT NULL default '0',
  `abstract_chk7` varchar(4) NOT NULL default '0',
  `chk_state7` varchar(4) NOT NULL default '0',
  `chktime7` varchar(34) NOT NULL,
  `paperno8` varchar(17) NOT NULL,
  `comment8` text NOT NULL,
  `recommend8` varchar(85) NOT NULL,
  `paper_chk8` varchar(4) NOT NULL default '0',
  `abstract_chk8` varchar(4) NOT NULL default '0',
  `chk_state8` varchar(4) NOT NULL default '0',
  `chktime8` varchar(34) NOT NULL,
  `paperno9` varchar(17) NOT NULL,
  `comment9` text NOT NULL,
  `recommend9` varchar(85) NOT NULL,
  `paper_chk9` varchar(4) NOT NULL default '0',
  `abstract_chk9` varchar(4) NOT NULL default '0',
  `chk_state9` varchar(4) NOT NULL default '0',
  `chktime9` varchar(34) NOT NULL,
  `paperno10` varchar(17) NOT NULL,
  `comment10` text NOT NULL,
  `recommend10` varchar(85) NOT NULL,
  `paper_chk10` varchar(4) NOT NULL default '0',
  `abstract_chk10` varchar(4) NOT NULL default '0',
  `chk_state10` varchar(4) NOT NULL default '0',
  `chktime10` varchar(34) NOT NULL,
  `paperno11` varchar(17) NOT NULL,
  `comment11` text NOT NULL,
  `recommend11` varchar(85) NOT NULL,
  `paper_chk11` varchar(4) NOT NULL default '0',
  `abstract_chk11` varchar(4) NOT NULL default '0',
  `chk_state11` varchar(4) NOT NULL default '0',
  `chktime11` varchar(34) NOT NULL,
  `paperno12` varchar(17) NOT NULL,
  `comment12` text NOT NULL,
  `recommend12` varchar(85) NOT NULL,
  `paper_chk12` varchar(4) NOT NULL default '0',
  `abstract_chk12` varchar(4) NOT NULL default '0',
  `chk_state12` varchar(4) NOT NULL default '0',
  `chktime12` varchar(34) NOT NULL,
  `paperno13` varchar(17) NOT NULL,
  `comment13` text NOT NULL,
  `recommend13` varchar(85) NOT NULL,
  `paper_chk13` varchar(4) NOT NULL default '0',
  `abstract_chk13` varchar(4) NOT NULL default '0',
  `chk_state13` varchar(4) NOT NULL default '0',
  `chktime13` varchar(34) NOT NULL,
  `paperno14` varchar(17) NOT NULL,
  `comment14` text NOT NULL,
  `recommend14` varchar(85) NOT NULL,
  `paper_chk14` varchar(4) NOT NULL default '0',
  `abstract_chk14` varchar(4) NOT NULL default '0',
  `chk_state14` varchar(4) NOT NULL default '0',
  `chktime14` varchar(34) NOT NULL,
  `paperno15` varchar(17) NOT NULL,
  `comment15` text NOT NULL,
  `recommend15` varchar(85) NOT NULL,
  `paper_chk15` varchar(4) NOT NULL default '0',
  `abstract_chk15` varchar(4) NOT NULL default '0',
  `chk_state15` varchar(4) NOT NULL default '0',
  `chktime15` varchar(34) NOT NULL,
  `chk_number` varchar(4) NOT NULL,
  `reply` varchar(4) NOT NULL default '0',
  `reply_count` varchar(4) NOT NULL default '0',
  `best_id` varchar(255) default NULL,
  `bank_name` varchar(255) default NULL,
  `bank_id` varchar(255) default NULL,
  `address` varchar(255) default NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- 列出以下資料庫的數據： `bestreviewer`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `members`
-- 

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` varchar(85) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `addtime` varchar(255) NOT NULL,
  `sn` int(11) NOT NULL auto_increment,
  `IP` varchar(255) NOT NULL,
  `boss` varchar(255) NOT NULL,
  PRIMARY KEY  (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=38 ;

-- 
-- 列出以下資料庫的數據： `members`
-- 

INSERT INTO `members` VALUES ('ILT001', '512104', '黃彥樺', 's4a512104@student.ncut.edu.tw', '勤益科技大學', '0986703673', '2018-02-09 13:00:02', 1, '140.128.90.132', '');
INSERT INTO `members` VALUES ('ILT004', 'mqvurtit', '黃柏岳', 'taiw127@gmaill.com', '台北科技大學', '0922900735', '2018-03-04 10:31:51', 7, '140.124.32.129', '');
INSERT INTO `members` VALUES ('ILT002', 'kj7utqjz', '林家宏', 'eechl53@gmail.com', '勤益科技大學電機系', '0920091571', '2018-02-27 20:58:20', 4, '120.108.12.230', '');
INSERT INTO `members` VALUES ('ILT003', 'pu821228', '黃世勳', 'pu758614@gmail.com', '勤益科技大學', '0986380182', '2018-03-01 12:26:15', 6, '140.128.86.234', '');
INSERT INTO `members` VALUES ('ILT005', 'nfbvyb0q', '萬本儒', 'benzuwan@ntu.edu.tw', '國立台灣大學化工系', '(02)33663021', '2018-03-05 11:26:28', 8, '140.112.22.68', '');
INSERT INTO `members` VALUES ('ILT006', 'lian0504', '連瑞敬', 'rjlian@cc.hwh.edu.tw', '華夏科技大學', '0973-355651', '2018-03-05 16:58:09', 9, '218.161.28.77', '');
INSERT INTO `members` VALUES ('ILT007', 'power97', '郭威逸', 'm10512047@yuntech.edu.tw', '雲林科技大學', '0909297524', '2018-03-05 20:14:09', 10, '140.125.20.206', '');
INSERT INTO `members` VALUES ('ILT008', 'xup6u6u6', '林宜盈', 'king022273@gmail.com', '逢甲大學', '0988-022273', '2018-03-06 11:38:39', 11, '140.134.18.51', '');
INSERT INTO `members` VALUES ('ILT009', 'tc5ol2r', '郭啟全', 'jacksonk@mail.mcut.edu.tw', '明志科技大學  機械工程系', '02-29089899', '2018-03-06 15:54:55', 12, '140.128.90.132', '');
INSERT INTO `members` VALUES ('ILT010', '8eyr5y03', '白宗禧', 'prius821226@gmail.com', '國立彰化師範大學', '0931755159', '2018-03-06 16:36:35', 13, '120.107.172.23', '');
INSERT INTO `members` VALUES ('ILT011', 't24qxvjh', '邱彥鈞', 'a0917206884@gmail.com', '聖約翰科技大學', '0903513399', '2018-03-07 13:57:46', 14, '101.13.66.232', '');
INSERT INTO `members` VALUES ('ILT012', 'eggs1234', '陳俊榮', '106M05007@stud.sju.edu.tw', '聖約翰科技大學', '0981-857220', '2018-03-07 15:00:18', 15, '218.32.239.34', '');
INSERT INTO `members` VALUES ('ILT013', '810116', '張國鑫', 'a0912312329@yahoo.com.tw', '勤益科技大學', '0970713997', '2018-03-08 11:32:39', 16, '118.163.216.53', '');
INSERT INTO `members` VALUES ('ILT014', 'zmjhslz4', '林鈺軒', 'x6417x@yahoo.com.tw', '國立彰化師範大學', '0978-072165', '2018-03-08 14:16:44', 17, '120.107.171.117', '');
INSERT INTO `members` VALUES ('ILT015', 'lkplngih', '白智仁', 'ma530104@stust.edu.tw', '南臺科技大學', '0932831414', '2018-03-08 14:46:00', 18, '120.117.73.114', '');
INSERT INTO `members` VALUES ('ILT016', 'xhmbrwdh', '蘇志超', 'jc07@ms34.hhinet.net', '國立勤益科技大學', '0933598025', '2018-03-09 10:52:22', 19, '114.38.79.23', '');
INSERT INTO `members` VALUES ('ILT017', 'urc05432', '陳威仁', 'urchen@mail.hust.edu.tw', '修平科技大學', '0921-781686', '2018-03-09 13:26:21', 20, '120.109.165.18', '');
INSERT INTO `members` VALUES ('ILT018', 'oit11224', '張詠儒', '103104348@mail.oit.edu.tw', '亞東技術學院', '0938-159807', '2018-03-09 13:41:34', 21, '120.96.54.19', '');
INSERT INTO `members` VALUES ('ILT019', '10413242', '張晉榤', 'M10413242@yuntech.edu.tw', '雲林科技大學', '0952-709959', '2018-03-09 17:20:53', 22, '140.125.35.173', '');
INSERT INTO `members` VALUES ('ILT020', '76eb5l96', '何佳欣', 'freeze4206@yahoo.com.tw', '勤益科技大學', '0939640936', '2018-03-09 18:54:26', 23, '36.225.29.15', '');
INSERT INTO `members` VALUES ('ILT021', 'qq213213', '郭?塘', 'twfinderaz@gmail.com', '弘光科技大學', '0988-547012', '2018-03-10 03:43:50', 24, '61.224.236.89', '');
INSERT INTO `members` VALUES ('ILT022', 'dkv78mlb', '??嘉', '17360763806@163.com', '河北工?大?', '17360763806', '2018-03-11 11:29:37', 25, '219.243.95.143', '');
INSERT INTO `members` VALUES ('ILT023', 'love0517', '陳沂鈴', 'smile9504270517@gmail.com', '崑山科技大學', '0930491530', '2018-03-12 14:30:36', 26, '120.114.142.159', '');
INSERT INTO `members` VALUES ('ILT024', '10513245', '張馨榕', 'm10513245@yuntech.edu.tw', '國立雲林科技大學', '0911-987398', '2018-03-12 14:37:43', 27, '140.125.35.226', '');
INSERT INTO `members` VALUES ('ILT025', 'mxpb7wy', '陳盈志', 'muscle841121@gmail.com', '崑山科技大學', '0935934402', '2018-03-13 00:31:04', 28, '120.114.73.241', '');
INSERT INTO `members` VALUES ('ILT026', 'k0006899', '魏鴻瑋', 'j12347521@gmail.com', '國立臺灣海洋大學', '0988801842', '2018-03-13 13:18:43', 29, '140.121.136.82', '');
INSERT INTO `members` VALUES ('ILT027', 'uzn90ord', '黎君邁', 'm034961@gmail.com', '國立臺灣海洋大學', '0921069625', '2018-03-13 13:18:44', 30, '140.121.136.106', '');
INSERT INTO `members` VALUES ('ILT028', 'fk19232', '顏嘉佑', 'yhesedison@gmail.com', '德明財經科技大學', '0971354460', '2018-03-13 18:16:36', 31, '140.131.143.63', '');
INSERT INTO `members` VALUES ('ILT029', 'czwstlrw', '廖政豪', 'baby83460@gmail.com', '國立雲林科技大學', '0932658625', '2018-03-14 20:09:56', 32, '140.125.35.224', '');
INSERT INTO `members` VALUES ('ILT030', 'khszovs0', '鄭嘉壕', 'm10513221@yuntech.edu.tw', '國立雲林科技大學', '0918111558', '2018-03-14 20:10:16', 33, '140.125.35.227', '');
INSERT INTO `members` VALUES ('ILT031', 'zopeqtn', '謝秉融', 'name50251@gmail.com', '雲林科技', '0975-220478', '2018-03-14 20:54:18', 34, '111.253.218.146', '');
INSERT INTO `members` VALUES ('ILT032', '830609', '洪銘志', 'benoit830609@gmail.com', '雲林科技大學', '0975-053976', '2018-03-14 21:03:04', 35, '123.205.85.24', '');
INSERT INTO `members` VALUES ('ILT033', 'ojx8eh49', '何亞倫', 'ma530214@stust.edu.tw', '南台科技大學', '0966622373', '2018-03-14 21:16:54', 36, '120.117.73.99', '');
INSERT INTO `members` VALUES ('ILT034', '9136', '卓武舜', 'jwo@ctu.edu.tw', '建國科技大學', '04-7111111 ext.3250', '2018-03-15 11:25:07', 37, '120.109.18.47', '');

-- --------------------------------------------------------

-- 
-- 資料表格式： `papers`
-- 

DROP TABLE IF EXISTS `papers`;
CREATE TABLE IF NOT EXISTS `papers` (
  `serial` int(11) NOT NULL auto_increment,
  `id` varchar(255) character set utf8 collate utf8_bin NOT NULL,
  `papername` varchar(255) character set utf8 collate utf8_bin NOT NULL,
  `paperchinesename` varchar(255) default NULL,
  `paperman` varchar(255) character set utf8 collate utf8_bin NOT NULL,
  `category` varchar(255) character set utf8 collate utf8_bin NOT NULL,
  `papernumber` varchar(255) NOT NULL,
  `nscno` varchar(255) character set utf8 collate utf8_bin NOT NULL,
  `filename` varchar(255) character set utf8 collate utf8_bin NOT NULL,
  `raw_file` varchar(255) character set utf8 collate utf8_bin NOT NULL,
  `abstract` varchar(255) character set utf8 collate utf8_bin NOT NULL,
  `raw_abstract` varchar(255) character set utf8 collate utf8_bin NOT NULL,
  `addtime` varchar(255) character set utf8 collate utf8_bin NOT NULL,
  `edittime` varchar(255) character set utf8 collate utf8_bin NOT NULL,
  `boss` varchar(255) character set utf8 collate utf8_bin default NULL,
  `reviewer1` varchar(255) character set utf8 collate utf8_bin NOT NULL,
  `reviewer2` varchar(255) character set utf8 collate utf8_bin NOT NULL,
  `accept` varchar(255) character set utf8 collate utf8_bin NOT NULL default '0',
  `notify` varchar(255) character set utf8 collate utf8_bin NOT NULL default '0',
  `excellent` varchar(255) NOT NULL default '0',
  `final_file` varchar(255) character set utf8 collate utf8_bin NOT NULL,
  `final_rawfile` varchar(255) character set utf8 collate utf8_bin NOT NULL,
  `final_abstract` varchar(255) character set utf8 collate utf8_bin NOT NULL,
  `final_rawabstract` varchar(255) character set utf8 collate utf8_bin NOT NULL,
  `final_addtime` varchar(255) character set utf8 collate utf8_bin NOT NULL,
  `final_edittime` varchar(255) character set utf8 collate utf8_bin NOT NULL,
  `chk_state` varchar(255) NOT NULL default '0',
  `uploadname` varchar(200) NOT NULL,
  `nsc_papername` varchar(255) default NULL,
  `nsc_number` varchar(255) default NULL,
  `nsc_usename` varchar(255) default NULL,
  `bestreviewer1` varchar(255) default NULL,
  `bestreviewer2` varchar(255) default NULL,
  `bestpaper` varchar(255) default NULL,
  `dream` varchar(255) default NULL,
  PRIMARY KEY  (`serial`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- 
-- 列出以下資料庫的數據： `papers`
-- 

INSERT INTO `papers` VALUES (4, 0x494c54303032, 0xe59fbae696bce99ca7e7abafe8a888e7ae97e7b590e59088e8ada6e7a4bae6849fe6b8ace599a8e88887e6a8a1e7b38ae6b4bee7bfa0e7b6b2e8b7af2846504e29e696bc20e5bea9e581a5e79785e4babae9bcbbe88383e7aea1284e4729e887aae68b94e88887e884abe890bde581b5e6b8ace8bc94e585b7e4b98be7a094e8a3bd, '基於霧端計算結合警示感測器與模糊派翠網路(FPN)於 復健病人鼻胃管(NG)自拔與脫落偵測輔具之研製', 0xe69e97e5aeb6e5ae8f, 0x35, 'ESD001', '', 0x494c543030325f32303138303330313035303835352e706466, 0x323031382de58ba4e79b8ae7a791e5a4a7e699bae685a7e7949fe6b4bbe7a791e68a80e7a094e8a88ee69c832de585a8e696872d32303138303232382e706466, 0x494c543030325f32303138303330313035303835352e706466, 0x323031382de58ba4e79b8ae7a791e5a4a7e699bae685a7e7949fe6b4bbe7a791e68a80e7a094e8a88ee69c832de69198e8a6812d32303138303232382e706466, 0x323031382d30332d30312031333a30383a3535, 0x323031382d30332d30312031333a30383a3535, NULL, '', '', 0x30, 0x30, '0', '', '', '', '', '', '', '0', '林家宏', '', '', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

-- 
-- 資料表格式： `register`
-- 

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `serial` int(11) NOT NULL auto_increment,
  `id` varchar(255) NOT NULL,
  `reportman1` varchar(255) default NULL,
  `reportman2` varchar(255) default NULL,
  `reportman3` varchar(255) default NULL,
  `reportman4` varchar(255) default NULL,
  `reportman5` varchar(255) default NULL,
  `reportman6` varchar(255) default NULL,
  `position1` varchar(255) default NULL,
  `position2` varchar(255) default NULL,
  `position3` varchar(255) default NULL,
  `position4` varchar(255) default NULL,
  `position5` varchar(255) default NULL,
  `position6` varchar(255) default NULL,
  `papername1` varchar(255) character set utf8 collate utf8_bin default NULL,
  `papername2` varchar(255) default NULL,
  `papername3` varchar(255) default NULL,
  `papername4` varchar(255) default NULL,
  `papername5` varchar(255) default NULL,
  `papername6` varchar(255) default NULL,
  `paperchinesename1` varchar(255) default NULL,
  `paperchinesename2` varchar(255) default NULL,
  `paperchinesename3` varchar(255) default NULL,
  `paperchinesename4` varchar(255) default NULL,
  `paperchinesename5` varchar(255) default NULL,
  `paperchinesename6` varchar(255) default NULL,
  `category1` varchar(255) default NULL,
  `category2` varchar(255) default NULL,
  `category3` varchar(255) default NULL,
  `category4` varchar(255) default NULL,
  `category5` varchar(255) default NULL,
  `category6` varchar(255) default NULL,
  `papernumber1` varchar(255) default NULL,
  `papernumber2` varchar(255) default NULL,
  `papernumber3` varchar(255) default NULL,
  `papernumber4` varchar(255) default NULL,
  `papernumber5` varchar(255) default NULL,
  `papernumber6` varchar(255) default NULL,
  `eat1` varchar(255) default NULL,
  `eat2` varchar(255) default NULL,
  `eat3` varchar(255) default NULL,
  `eat4` varchar(255) default NULL,
  `eat5` varchar(255) default NULL,
  `eat6` varchar(255) default NULL,
  `receipt1` varchar(255) default NULL,
  `receipt2` varchar(255) default NULL,
  `receipt3` varchar(255) default NULL,
  `receipt4` varchar(255) default NULL,
  `receipt5` varchar(255) default NULL,
  `receipt6` varchar(255) default NULL,
  `uniformno1` varchar(255) default NULL,
  `uniformno2` varchar(255) default NULL,
  `uniformno3` varchar(255) default NULL,
  `uniformno4` varchar(255) default NULL,
  `uniformno5` varchar(255) default NULL,
  `uniformno6` varchar(255) default NULL,
  `plate` varchar(255) default NULL,
  `money` varchar(255) default '0',
  `idchange` varchar(255) NOT NULL default '0',
  `atmchk` varchar(255) NOT NULL default '0',
  `time` varchar(255) default NULL,
  `status` varchar(255) default NULL,
  `eattotal` varchar(255) default NULL,
  `paynumber` varchar(50) default NULL,
  `paynumber1` varchar(50) default NULL,
  `companion` int(2) default NULL,
  `cname1` varchar(255) default NULL,
  `cname2` varchar(255) default NULL,
  `cname3` varchar(255) default NULL,
  `cname4` varchar(255) default NULL,
  `cname5` varchar(255) default NULL,
  `cname6` varchar(255) default NULL,
  `cname7` varchar(255) default NULL,
  `cname8` varchar(255) default NULL,
  `cname9` varchar(255) default NULL,
  `cname10` varchar(255) default NULL,
  `ceat1` varchar(4) default NULL,
  `ceat2` varchar(4) default NULL,
  `ceat3` varchar(4) default NULL,
  `ceat4` varchar(4) default NULL,
  `ceat5` varchar(4) default NULL,
  `ceat6` varchar(4) default NULL,
  `ceat7` varchar(4) default NULL,
  `ceat8` varchar(4) default NULL,
  `ceat9` varchar(4) default NULL,
  `ceat10` varchar(4) default NULL,
  `cposition1` varchar(2) default NULL,
  `cposition2` varchar(2) default NULL,
  `cposition3` varchar(2) default NULL,
  `cposition4` varchar(2) default NULL,
  `cposition5` varchar(2) default NULL,
  `cposition6` varchar(2) default NULL,
  `cposition7` varchar(2) default NULL,
  `cposition8` varchar(2) default NULL,
  `cposition9` varchar(2) default NULL,
  `cposition10` varchar(2) default NULL,
  `testmoney` varchar(2) default NULL,
  PRIMARY KEY  (`serial`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

-- 
-- 列出以下資料庫的數據： `register`
-- 

INSERT INTO `register` VALUES (7, 'ILT009', '郭啟全', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '葷', '', '', '', '', '', '明志科技大學', '明志科技大學', '明志科技大學', '明志科技大學', '明志科技大學', '明志科技大學', '35701534', '35701534', '35701534', '35701534', '35701534', '35701534', '', '1500', '0', '0', '2018-03-06 15:55:56', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0');
INSERT INTO `register` VALUES (8, 'ILT024', '張馨榕', '', '', '', '', '', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '葷', '', '', '', '', '', '國立雲林科技大學', '國立雲林科技大學', '國立雲林科技大學', '國立雲林科技大學', '國立雲林科技大學', '國立雲林科技大學', '06195262', '06195262', '06195262', '06195262', '06195262', '06195262', '', '1500', '0', '0', '2018-03-12 17:13:54', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0');
INSERT INTO `register` VALUES (14, 'ILT001', '黃彥樺', '', '', '', '', '', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '葷', '', '', '', '', '', '國立勤益科技大學', '國立勤益科技大學', '國立勤益科技大學', '國立勤益科技大學', '國立勤益科技大學', '國立勤益科技大學', '57301337', '57301337', '57301337', '57301337', '57301337', '57301337', '', '1500', '0', '0', '2018-03-14 23:12:37', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0');
INSERT INTO `register` VALUES (10, 'ILT029', '廖政豪', '', '', '', '', '', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '葷', '', '', '', '', '', '國立雲林科技大學', '國立雲林科技大學', '國立雲林科技大學', '國立雲林科技大學', '國立雲林科技大學', '國立雲林科技大學', '06195262', '06195262', '06195262', '06195262', '06195262', '06195262', '', '1500', '0', '0', '2018-03-14 20:12:04', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0');
INSERT INTO `register` VALUES (11, 'ILT030', '鄭嘉壕', '', '', '', '', '', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '葷', '', '', '', '', '', '國立雲林科技大學', '國立雲林科技大學', '國立雲林科技大學', '國立雲林科技大學', '國立雲林科技大學', '國立雲林科技大學', '06195262', '06195262', '06195262', '06195262', '06195262', '06195262', '', '1500', '0', '0', '2018-03-14 20:12:13', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0');
INSERT INTO `register` VALUES (12, 'ILT031', '謝秉融', '', '', '', '', '', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '葷', '', '', '', '', '', '國立雲林科技大學', '國立雲林科技大學', '國立雲林科技大學', '國立雲林科技大學', '國立雲林科技大學', '國立雲林科技大學', '06195262', '06195262', '06195262', '06195262', '06195262', '06195262', '', '1500', '0', '0', '2018-03-14 20:59:19', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0');
INSERT INTO `register` VALUES (13, 'ILT032', '洪銘志', '', '', '', '', '', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '葷', '', '', '', '', '', '國立雲林科技大學', '國立雲林科技大學', '國立雲林科技大學', '國立雲林科技大學', '國立雲林科技大學', '國立雲林科技大學', '06195262', '06195262', '06195262', '06195262', '06195262', '06195262', '', '1500', '0', '0', '2018-03-14 21:06:20', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0');

-- --------------------------------------------------------

-- 
-- 資料表格式： `reviewer`
-- 

DROP TABLE IF EXISTS `reviewer`;
CREATE TABLE IF NOT EXISTS `reviewer` (
  `id` varchar(85) NOT NULL,
  `passwd` varchar(85) NOT NULL,
  `name` varchar(85) NOT NULL,
  `sever` varchar(85) NOT NULL,
  `email` varchar(85) NOT NULL,
  `paperno1` varchar(17) NOT NULL,
  `comment1` text NOT NULL,
  `recommend1` varchar(85) NOT NULL,
  `paper_chk1` varchar(4) NOT NULL default '0',
  `abstract_chk1` varchar(4) NOT NULL default '0',
  `chk_state1` varchar(4) NOT NULL default '0',
  `chktime1` varchar(34) NOT NULL,
  `paperno2` varchar(17) NOT NULL,
  `comment2` text NOT NULL,
  `recommend2` varchar(85) NOT NULL,
  `paper_chk2` varchar(4) NOT NULL default '0',
  `abstract_chk2` varchar(4) NOT NULL default '0',
  `chk_state2` varchar(4) NOT NULL default '0',
  `chktime2` varchar(34) NOT NULL,
  `paperno3` varchar(17) NOT NULL,
  `comment3` text NOT NULL,
  `recommend3` varchar(85) NOT NULL,
  `paper_chk3` varchar(4) NOT NULL default '0',
  `abstract_chk3` varchar(4) NOT NULL default '0',
  `chk_state3` varchar(4) NOT NULL default '0',
  `chktime3` varchar(17) NOT NULL,
  `paperno4` varchar(17) NOT NULL,
  `comment4` text NOT NULL,
  `recommend4` varchar(85) NOT NULL,
  `paper_chk4` varchar(4) NOT NULL default '0',
  `abstract_chk4` varchar(4) NOT NULL default '0',
  `chk_state4` varchar(4) NOT NULL default '0',
  `chktime4` varchar(34) NOT NULL,
  `paperno5` varchar(17) NOT NULL,
  `comment5` text NOT NULL,
  `recommend5` varchar(85) NOT NULL,
  `paper_chk5` varchar(4) NOT NULL default '0',
  `abstract_chk5` varchar(4) NOT NULL default '0',
  `chk_state5` varchar(4) NOT NULL default '0',
  `chktime5` varchar(34) NOT NULL,
  `paperno6` varchar(17) NOT NULL,
  `comment6` text NOT NULL,
  `recommend6` varchar(85) NOT NULL,
  `paper_chk6` varchar(4) NOT NULL default '0',
  `abstract_chk6` varchar(4) NOT NULL default '0',
  `chk_state6` varchar(4) NOT NULL default '0',
  `chktime6` varchar(34) NOT NULL,
  `paperno7` varchar(17) NOT NULL,
  `comment7` text NOT NULL,
  `recommend7` varchar(85) NOT NULL,
  `paper_chk7` varchar(4) NOT NULL default '0',
  `abstract_chk7` varchar(4) NOT NULL default '0',
  `chk_state7` varchar(4) NOT NULL default '0',
  `chktime7` varchar(34) NOT NULL,
  `paperno8` varchar(17) NOT NULL,
  `comment8` text NOT NULL,
  `recommend8` varchar(85) NOT NULL,
  `paper_chk8` varchar(4) NOT NULL default '0',
  `abstract_chk8` varchar(4) NOT NULL default '0',
  `chk_state8` varchar(4) NOT NULL default '0',
  `chktime8` varchar(34) NOT NULL,
  `paperno9` varchar(17) NOT NULL,
  `comment9` text NOT NULL,
  `recommend9` varchar(85) NOT NULL,
  `paper_chk9` varchar(4) NOT NULL default '0',
  `abstract_chk9` varchar(4) NOT NULL default '0',
  `chk_state9` varchar(4) NOT NULL default '0',
  `chktime9` varchar(34) NOT NULL,
  `paperno10` varchar(17) NOT NULL,
  `comment10` text NOT NULL,
  `recommend10` varchar(85) NOT NULL,
  `paper_chk10` varchar(4) NOT NULL default '0',
  `abstract_chk10` varchar(4) NOT NULL default '0',
  `chk_state10` varchar(4) NOT NULL default '0',
  `chktime10` varchar(34) NOT NULL,
  `paperno11` varchar(17) NOT NULL,
  `comment11` text NOT NULL,
  `recommend11` varchar(85) NOT NULL,
  `paper_chk11` varchar(4) NOT NULL default '0',
  `abstract_chk11` varchar(4) NOT NULL default '0',
  `chk_state11` varchar(4) NOT NULL default '0',
  `chktime11` varchar(34) NOT NULL,
  `paperno12` varchar(17) NOT NULL,
  `comment12` text NOT NULL,
  `recommend12` varchar(85) NOT NULL,
  `paper_chk12` varchar(4) NOT NULL default '0',
  `abstract_chk12` varchar(4) NOT NULL default '0',
  `chk_state12` varchar(4) NOT NULL default '0',
  `chktime12` varchar(34) NOT NULL,
  `paperno13` varchar(17) NOT NULL,
  `comment13` text NOT NULL,
  `recommend13` varchar(85) NOT NULL,
  `paper_chk13` varchar(4) NOT NULL default '0',
  `abstract_chk13` varchar(4) NOT NULL default '0',
  `chk_state13` varchar(4) NOT NULL default '0',
  `chktime13` varchar(34) NOT NULL,
  `paperno14` varchar(17) NOT NULL,
  `comment14` text NOT NULL,
  `recommend14` varchar(85) NOT NULL,
  `paper_chk14` varchar(4) NOT NULL default '0',
  `abstract_chk14` varchar(4) NOT NULL default '0',
  `chk_state14` varchar(4) NOT NULL default '0',
  `chktime14` varchar(34) NOT NULL,
  `paperno15` varchar(17) NOT NULL,
  `comment15` text NOT NULL,
  `recommend15` varchar(85) NOT NULL,
  `paper_chk15` varchar(4) NOT NULL default '0',
  `abstract_chk15` varchar(4) NOT NULL default '0',
  `chk_state15` varchar(4) NOT NULL default '0',
  `chktime15` varchar(34) NOT NULL,
  `chk_number` varchar(4) NOT NULL,
  `reply` varchar(4) NOT NULL default '0',
  `reply_count` varchar(4) NOT NULL default '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

-- 
-- 列出以下資料庫的數據： `reviewer`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `session`
-- 

DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `session_id` varchar(85) NOT NULL DEFAULT '' COMMENT '主持人帳號',
  `passwd` varchar(85) NOT NULL DEFAULT '' COMMENT '主持人密碼',
  `category` varchar(85) NOT NULL DEFAULT '' COMMENT '投稿領域代碼',
  `abbr` varchar(85) NOT NULL DEFAULT '' COMMENT '投稿領域簡稱',
  `session_title` varchar(85) NOT NULL DEFAULT '' COMMENT '投稿領域名稱',
  `session_name` varchar(85) NOT NULL DEFAULT '' COMMENT '主持人姓名',
  `session_email` varchar(85) NOT NULL DEFAULT '' COMMENT '主持人Email'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

-- 
-- 列出以下資料庫的數據： `session`
-- 

INSERT INTO `session` (`session_id`, `passwd`, `category`, `abbr`, `session_title`, `session_name`, `session_email`) VALUES
('ILT2018_esd',	'nxgunou7',	'5',	'ESD',	'嵌入式系統開發與應用',	'白能勝',	'pai@ncut.edu.tw'),
('ILT2018_iee',	'j37slefeg',	'1',	'IEE',	'電能與節能技術',	'陳鴻誠',	'hcchen@ncut.edu.tw'),
('ILT2018_ics',	'ig6mnxdh',	'2',	'ICS',	'智慧型控制系統',	'卜文正',	'puo@ncut.edu.tw'),
('ILT2018_sia',	'ybjhfiiui',	'12',	'SIA',	'系統整合與應用',	'林熊徵',	'hclin@ncut.edu.tw'),
('ILT2018_3c',	'bjtz23g0m',	'4',	'3C',	'消費性家電產品開發與設計',	'陳啟鈞',	'chichun@ncut.edu.tw'),
('ILT2018_ctd',	'yue51d7zb',	'6',	'CTD',	'通訊技術',	'曾振東',	'jdtseng@ncut.edu.tw'),
('ILT2018_icd',	'eulytipx',	'3',	'ICD',	'積體電路設計',	'謝韶徽',	'ssh@ncut.edu.tw'),
('ILT2018_oth',	'0wsm0bw6p',	'13',	'OTH',	'其他領域',	'董秋溝',	'tungck@ncut.edu.tw'),
('ILT2018_mdc',	'vh35ovm9',	'8',	'MDC',	'多媒體與數位內容技術',	'陳宏光',	'hankchentw@gmail.com'),
('ILT2018_hcd',	'87rqsjrd',	'9',	'HCD',	'居家照護產品開發與設計',	'王圳木',	'cmwang@ncut.edu.tw'),
('ILT2018_ntd',	'hcvun66e4',	'7',	'NTD',	'網路技術開發與應用',	'陳瑞茂',	'raymond@ncut.edu.tw'),
('ILT2018_cit',	'19r8c95u2',	'11',	'CIT',	'雲端與物聯網應用技術',	'林灶生',	'jslin@ncut.edu.tw'),
('ILT2018_isa',	'p8qpe8w',	'10',	'MSA',	'多媒體安全與應用',	'林基源',	'chiyuan@ncut.edu.tw');
