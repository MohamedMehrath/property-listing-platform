DROP TABLE amalya_type_t;

CREATE TABLE `amalya_type_t` (
  `amalya_type_code` int(11) NOT NULL AUTO_INCREMENT,
  `amalya_type_name` varchar(50) NOT NULL,
  PRIMARY KEY (`amalya_type_code`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO amalya_type_t VALUES("7","تمليك كاش");
INSERT INTO amalya_type_t VALUES("8","تمليك تقسيط");
INSERT INTO amalya_type_t VALUES("9","ايجار مفروش");
INSERT INTO amalya_type_t VALUES("10","ايجار");
INSERT INTO amalya_type_t VALUES("13","تمليك");



DROP TABLE aqar_need;

CREATE TABLE `aqar_need` (
  `code` varchar(20) NOT NULL,
  `madena` varchar(30) NOT NULL,
  `madena_other` varchar(50) DEFAULT NULL,
  `aqar_type` varchar(30) NOT NULL,
  `aqar_type_other` varchar(50) DEFAULT NULL,
  `namozg` varchar(30) DEFAULT NULL,
  `namozg_other` varchar(30) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `mesaha` varchar(250) DEFAULT NULL,
  `budget` varchar(250) DEFAULT NULL,
  `tashteeb` varchar(30) NOT NULL,
  `notes` varchar(250) DEFAULT NULL,
  `cust_name` varchar(50) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `masdr` varchar(30) DEFAULT NULL,
  `entry_date` date NOT NULL,
  `modkhel` varchar(30) NOT NULL,
  `update_date` date NOT NULL,
  `motabaa` varchar(30) DEFAULT NULL,
  `amalya_type` varchar(50) NOT NULL,
  `marhala` varchar(30) DEFAULT NULL,
  `log_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updater` varchar(50) DEFAULT NULL,
  `door` varchar(20) DEFAULT NULL,
  `view_v` varchar(250) DEFAULT NULL,
  `rooms` int(11) DEFAULT NULL,
  `WC` int(11) DEFAULT NULL,
  `kmalyat` varchar(250) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `remember` tinyint(1) DEFAULT NULL,
  `details` varchar(2500) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `tashteeb_other` varchar(250) DEFAULT NULL,
  `amalya_type_other` varchar(250) DEFAULT NULL,
  `marhala_other` varchar(250) DEFAULT NULL,
  `call_date` varchar(250) DEFAULT NULL,
  `action_history` varchar(250) DEFAULT NULL,
  `found` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO aqar_need VALUES("10012","مدينتى","","شقة","","70","","","96","325000","بدون","معها عقد وكاله","داليا","","1093009579","","2014-06-17","ايمان","2016-11-11","ايمان","تمليك","7","2016-03-18 03:24:10","admin","0","Park","","","","","","","","","","","","","","0");
INSERT INTO aqar_need VALUES("10013","مدينتى","","شقة","","","32","","186","1300000","","","م/عصام عز","1207879596","1017373072","","0000-00-00","ايمان","2016-03-18","ايمان","تمليك","3","2016-03-18 03:24:10","Ibrahim","","","","","","","","","","","","","","","","0");
INSERT INTO aqar_need VALUES("10014","مدينتى","","شقة","","","74","","69","192000","","","محمد ابراهيم","","1001718642","","0000-00-00","ايمان","2016-03-18","هند","ايجار","7","2016-03-18 03:24:10","Ibrahim","","","","","","","","","","","","","","","","0");
INSERT INTO aqar_need VALUES("10015","مدينتى","","شقة","","30","67","","103","630000","","من طرف أ/ احمد تاج والمفتاح معاه","خالد محمد عبد الفتاح","","1118008999","","2014-08-20","ايمان","2016-03-18","ايمان","ايجار","6","2016-03-18 03:24:10","Ibrahim","","Narrow Garden","","","","","","","","","","","","","","0");
INSERT INTO aqar_need VALUES("10016","مدينتى","","شقة","","","70","","69","185000","","الرقم غلط","سمير","","122252011","","0000-00-00","","2016-03-18","هند","تمليك","7","2016-03-18 03:24:10","Ibrahim","","","","","","","","","","","","","","","","0");
INSERT INTO aqar_need VALUES("10017","الرحاب","","شقة","","","132","","179","975000","","","محمد أبو الفتوح","1282221001","1282221000","","0000-00-00","","2016-03-18","هند","تمليك","10","2016-03-18 03:24:10","Ibrahim","","","","","","","","","","","","","","","","0");
INSERT INTO aqar_need VALUES("10018","مدينتى","","شقة","","","73","","82","195000","","استلام فورى","شريف عبد الحارث","","1204569921","","2014-02-03","ايمان","2016-03-18","","تمليك","7","2016-03-18 03:24:10","Ibrahim","","","","","","","","","","1","","","","","","0");
INSERT INTO aqar_need VALUES("10019","الرحاب","","شقة","","300","34","","177","940000","","لما تستلم هتكلمنا تعرضها ايجار","سهام","1223136441","1224262178","","0000-00-00","","2016-03-18","ايمان","تمليك","3","2016-03-18 03:24:10","Ibrahim","","","","","","","","","","","","","","","","0");
INSERT INTO aqar_need VALUES("10020","مدينتى","","شقة","","300","34","","177","1000000","","بلغتها ان السعر عالى وقالت الاوفر قابل للتفاوض","عطا الله فؤاد","24183491","1286410203","","0000-00-00","","2016-03-18","ايهاب","تمليك","3","2016-03-18 03:24:10","Ibrahim","","","","","","","","","","","","","","","","0");
INSERT INTO aqar_need VALUES("10021","التجمع الخامس","","شقة","","","67","","89","378000","","جاهزة الاستلام","ميشيل","","100520627","","0000-00-00","","2016-03-18","","تمليك","6","2016-03-18 03:24:10","Ibrahim","","Garden","","","","","","","","","","","","","","0");
INSERT INTO aqar_need VALUES("10022","مدينتى","","شقة","","300","32","","177","455000","","","شيماء شاكر","","1001715913","","0000-00-00","","2016-03-18","هند","تمليك","3","2016-03-18 03:24:10","Ibrahim","","","","","","","","","","","","","","","","0");
INSERT INTO aqar_need VALUES("10062","الرحاب","مدينتى - التجمع الخامس","شقة","او عمارة","11","او اى نموذج","اى مكان","150-200","1000-15000","شركة","لا يوجد","محمد حسن","5564564","959599","على","2016-11-17","admin","2016-11-17","على","تمليك كاش","10","2016-11-17 18:24:07","admin","0","Park","2","0","يفضل بلوكنتين","بللاللالللالا","56656","1","دورين على ناصيتين","","اى تشطيب","ايجار قديم","اولى او ثانية","2016-11-17","اتصلت بيه\nوكلمته","0");



DROP TABLE aqar_type_t;

CREATE TABLE `aqar_type_t` (
  `aqar_type_code` int(11) NOT NULL AUTO_INCREMENT,
  `aqar_type_name` varchar(50) NOT NULL,
  PRIMARY KEY (`aqar_type_code`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

INSERT INTO aqar_type_t VALUES("10","شقة");
INSERT INTO aqar_type_t VALUES("11","فيلا");
INSERT INTO aqar_type_t VALUES("12","أرض");
INSERT INTO aqar_type_t VALUES("13","مكتب");
INSERT INTO aqar_type_t VALUES("14","عيادة");
INSERT INTO aqar_type_t VALUES("15","صيدلية");
INSERT INTO aqar_type_t VALUES("16","مصنع");
INSERT INTO aqar_type_t VALUES("17","محل");
INSERT INTO aqar_type_t VALUES("18","اخرى");



DROP TABLE city;

CREATE TABLE `city` (
  `citycode` int(11) NOT NULL AUTO_INCREMENT,
  `cityname` varchar(50) NOT NULL,
  PRIMARY KEY (`citycode`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO city VALUES("11","الرحاب");
INSERT INTO city VALUES("12","مدينتى");
INSERT INTO city VALUES("14","التجمع الخامس");



DROP TABLE door;

CREATE TABLE `door` (
  `doorcode` int(11) NOT NULL AUTO_INCREMENT,
  `doorname` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`doorcode`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO door VALUES("9","0");
INSERT INTO door VALUES("10","1");
INSERT INTO door VALUES("11","2");
INSERT INTO door VALUES("12","3");
INSERT INTO door VALUES("13","4");
INSERT INTO door VALUES("14","5");
INSERT INTO door VALUES("15","6");
INSERT INTO door VALUES("16","اخرى");



DROP TABLE laqab;

CREATE TABLE `laqab` (
  `laqab_code` int(11) NOT NULL AUTO_INCREMENT,
  `laqab_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`laqab_code`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO laqab VALUES("1","الاستاذ");
INSERT INTO laqab VALUES("2","الحاج");
INSERT INTO laqab VALUES("7","مدام");
INSERT INTO laqab VALUES("8","");



DROP TABLE marhala;

CREATE TABLE `marhala` (
  `marhalacode` int(11) NOT NULL AUTO_INCREMENT,
  `marhalaname` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`marhalacode`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO marhala VALUES("1","1");
INSERT INTO marhala VALUES("2","2");
INSERT INTO marhala VALUES("3","3");
INSERT INTO marhala VALUES("4","4");
INSERT INTO marhala VALUES("5","5");
INSERT INTO marhala VALUES("6","6");
INSERT INTO marhala VALUES("7","7");
INSERT INTO marhala VALUES("8","8");
INSERT INTO marhala VALUES("9","9");
INSERT INTO marhala VALUES("10","10");
INSERT INTO marhala VALUES("11","11");
INSERT INTO marhala VALUES("12","12");
INSERT INTO marhala VALUES("13","0");



DROP TABLE namozg;

CREATE TABLE `namozg` (
  `namozgcode` int(11) NOT NULL AUTO_INCREMENT,
  `namozgname` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`namozgcode`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

INSERT INTO namozg VALUES("1","");
INSERT INTO namozg VALUES("2","30");
INSERT INTO namozg VALUES("3","300");
INSERT INTO namozg VALUES("4","60");
INSERT INTO namozg VALUES("6","400");
INSERT INTO namozg VALUES("7","F");
INSERT INTO namozg VALUES("8","A2");
INSERT INTO namozg VALUES("9","500");
INSERT INTO namozg VALUES("10","B");
INSERT INTO namozg VALUES("11","W");
INSERT INTO namozg VALUES("12","T");
INSERT INTO namozg VALUES("13","L");
INSERT INTO namozg VALUES("14","E");
INSERT INTO namozg VALUES("15","H");
INSERT INTO namozg VALUES("16","I2");
INSERT INTO namozg VALUES("17","Z");
INSERT INTO namozg VALUES("18","D");
INSERT INTO namozg VALUES("19","U");
INSERT INTO namozg VALUES("20","G");
INSERT INTO namozg VALUES("21","J");
INSERT INTO namozg VALUES("22","Y");
INSERT INTO namozg VALUES("23","V");
INSERT INTO namozg VALUES("24","I");
INSERT INTO namozg VALUES("25","C");
INSERT INTO namozg VALUES("26","X");
INSERT INTO namozg VALUES("27","T1");
INSERT INTO namozg VALUES("28","A");
INSERT INTO namozg VALUES("29","M");
INSERT INTO namozg VALUES("30","D1");
INSERT INTO namozg VALUES("31","A1");
INSERT INTO namozg VALUES("32","1b");
INSERT INTO namozg VALUES("33","K");
INSERT INTO namozg VALUES("34","80");
INSERT INTO namozg VALUES("35","100");
INSERT INTO namozg VALUES("36","E1");
INSERT INTO namozg VALUES("37","11");
INSERT INTO namozg VALUES("38","200");
INSERT INTO namozg VALUES("39","700");
INSERT INTO namozg VALUES("40","N");
INSERT INTO namozg VALUES("41","P");
INSERT INTO namozg VALUES("42","6");
INSERT INTO namozg VALUES("43","4b");
INSERT INTO namozg VALUES("44","O");
INSERT INTO namozg VALUES("45","II");
INSERT INTO namozg VALUES("46","A4");
INSERT INTO namozg VALUES("47","4");
INSERT INTO namozg VALUES("51","600");
INSERT INTO namozg VALUES("52","70");



DROP TABLE offices;

CREATE TABLE `offices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `emp` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `com_no` varchar(250) DEFAULT NULL,
  `notes` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO offices VALUES("1","مكتب الهدى","الاستاذ احمد","الرحاب السوق العمومى","تليفون 2455554 موبايل 12552255","مكتب جديد");
INSERT INTO offices VALUES("2","يوتوبيا","ابراهيم تاج","الرحاب بحرى","156566222 تليفون\nموبال 1525225\nواتس 00100000","منافس");



DROP TABLE sheet1;

CREATE TABLE `sheet1` (
  `A` varchar(10) DEFAULT NULL,
  `B` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO sheet1 VALUES("","70");
INSERT INTO sheet1 VALUES("","30");
INSERT INTO sheet1 VALUES("","300");
INSERT INTO sheet1 VALUES("","60");
INSERT INTO sheet1 VALUES("","600");
INSERT INTO sheet1 VALUES("","400");
INSERT INTO sheet1 VALUES("","F");
INSERT INTO sheet1 VALUES("","A2");
INSERT INTO sheet1 VALUES("","500");
INSERT INTO sheet1 VALUES("","B");
INSERT INTO sheet1 VALUES("","W");
INSERT INTO sheet1 VALUES("","T");
INSERT INTO sheet1 VALUES("","L");
INSERT INTO sheet1 VALUES("","E");
INSERT INTO sheet1 VALUES("","H");
INSERT INTO sheet1 VALUES("","I2");
INSERT INTO sheet1 VALUES("","Z");
INSERT INTO sheet1 VALUES("","D");
INSERT INTO sheet1 VALUES("","U");
INSERT INTO sheet1 VALUES("","G");
INSERT INTO sheet1 VALUES("","J");
INSERT INTO sheet1 VALUES("","Y");
INSERT INTO sheet1 VALUES("","V");
INSERT INTO sheet1 VALUES("","I");
INSERT INTO sheet1 VALUES("","C");
INSERT INTO sheet1 VALUES("","X");
INSERT INTO sheet1 VALUES("","T1");
INSERT INTO sheet1 VALUES("","A");
INSERT INTO sheet1 VALUES("","M");
INSERT INTO sheet1 VALUES("","D1");
INSERT INTO sheet1 VALUES("","A1");
INSERT INTO sheet1 VALUES("","1b");
INSERT INTO sheet1 VALUES("","K");
INSERT INTO sheet1 VALUES("","80");
INSERT INTO sheet1 VALUES("","100");
INSERT INTO sheet1 VALUES("","E1");
INSERT INTO sheet1 VALUES("","11");
INSERT INTO sheet1 VALUES("","200");
INSERT INTO sheet1 VALUES("","700");
INSERT INTO sheet1 VALUES("","N");
INSERT INTO sheet1 VALUES("","P");
INSERT INTO sheet1 VALUES("","6");
INSERT INTO sheet1 VALUES("","4b");
INSERT INTO sheet1 VALUES("","O");
INSERT INTO sheet1 VALUES("","II");
INSERT INTO sheet1 VALUES("","A4");
INSERT INTO sheet1 VALUES("","4");
INSERT INTO sheet1 VALUES("","70");
INSERT INTO sheet1 VALUES("","30");
INSERT INTO sheet1 VALUES("","300");
INSERT INTO sheet1 VALUES("","60");
INSERT INTO sheet1 VALUES("","600");
INSERT INTO sheet1 VALUES("","400");
INSERT INTO sheet1 VALUES("","F");
INSERT INTO sheet1 VALUES("","A2");
INSERT INTO sheet1 VALUES("","500");
INSERT INTO sheet1 VALUES("","B");
INSERT INTO sheet1 VALUES("","W");
INSERT INTO sheet1 VALUES("","T");
INSERT INTO sheet1 VALUES("","L");
INSERT INTO sheet1 VALUES("","E");
INSERT INTO sheet1 VALUES("","H");
INSERT INTO sheet1 VALUES("","I2");
INSERT INTO sheet1 VALUES("","Z");
INSERT INTO sheet1 VALUES("","D");
INSERT INTO sheet1 VALUES("","U");
INSERT INTO sheet1 VALUES("","G");
INSERT INTO sheet1 VALUES("","J");
INSERT INTO sheet1 VALUES("","Y");
INSERT INTO sheet1 VALUES("","V");
INSERT INTO sheet1 VALUES("","I");
INSERT INTO sheet1 VALUES("","C");
INSERT INTO sheet1 VALUES("","X");
INSERT INTO sheet1 VALUES("","T1");
INSERT INTO sheet1 VALUES("","A");
INSERT INTO sheet1 VALUES("","M");
INSERT INTO sheet1 VALUES("","D1");
INSERT INTO sheet1 VALUES("","A1");
INSERT INTO sheet1 VALUES("","1b");
INSERT INTO sheet1 VALUES("","K");
INSERT INTO sheet1 VALUES("","80");
INSERT INTO sheet1 VALUES("","100");
INSERT INTO sheet1 VALUES("","E1");
INSERT INTO sheet1 VALUES("","11");
INSERT INTO sheet1 VALUES("","200");
INSERT INTO sheet1 VALUES("","700");
INSERT INTO sheet1 VALUES("","N");
INSERT INTO sheet1 VALUES("","P");
INSERT INTO sheet1 VALUES("","6");
INSERT INTO sheet1 VALUES("","4b");
INSERT INTO sheet1 VALUES("","O");
INSERT INTO sheet1 VALUES("","II");
INSERT INTO sheet1 VALUES("","A4");
INSERT INTO sheet1 VALUES("","4");
INSERT INTO sheet1 VALUES("70","");
INSERT INTO sheet1 VALUES("30","");
INSERT INTO sheet1 VALUES("300","");
INSERT INTO sheet1 VALUES("60","");
INSERT INTO sheet1 VALUES("600","");
INSERT INTO sheet1 VALUES("400","");
INSERT INTO sheet1 VALUES("F","");
INSERT INTO sheet1 VALUES("A2","");
INSERT INTO sheet1 VALUES("500","");
INSERT INTO sheet1 VALUES("B","");
INSERT INTO sheet1 VALUES("W","");
INSERT INTO sheet1 VALUES("T","");
INSERT INTO sheet1 VALUES("L","");
INSERT INTO sheet1 VALUES("E","");
INSERT INTO sheet1 VALUES("H","");
INSERT INTO sheet1 VALUES("I2","");
INSERT INTO sheet1 VALUES("Z","");
INSERT INTO sheet1 VALUES("D","");
INSERT INTO sheet1 VALUES("U","");
INSERT INTO sheet1 VALUES("G","");
INSERT INTO sheet1 VALUES("J","");
INSERT INTO sheet1 VALUES("Y","");
INSERT INTO sheet1 VALUES("V","");
INSERT INTO sheet1 VALUES("I","");
INSERT INTO sheet1 VALUES("C","");
INSERT INTO sheet1 VALUES("X","");
INSERT INTO sheet1 VALUES("T1","");
INSERT INTO sheet1 VALUES("A","");
INSERT INTO sheet1 VALUES("M","");
INSERT INTO sheet1 VALUES("D1","");
INSERT INTO sheet1 VALUES("A1","");
INSERT INTO sheet1 VALUES("1b","");
INSERT INTO sheet1 VALUES("K","");
INSERT INTO sheet1 VALUES("80","");
INSERT INTO sheet1 VALUES("100","");
INSERT INTO sheet1 VALUES("E1","");
INSERT INTO sheet1 VALUES("11","");
INSERT INTO sheet1 VALUES("200","");
INSERT INTO sheet1 VALUES("700","");
INSERT INTO sheet1 VALUES("N","");
INSERT INTO sheet1 VALUES("P","");
INSERT INTO sheet1 VALUES("6","");
INSERT INTO sheet1 VALUES("4b","");
INSERT INTO sheet1 VALUES("O","");
INSERT INTO sheet1 VALUES("II","");
INSERT INTO sheet1 VALUES("A4","");
INSERT INTO sheet1 VALUES("4","");
INSERT INTO sheet1 VALUES("namozgcode","nam");
INSERT INTO sheet1 VALUES("","70");
INSERT INTO sheet1 VALUES("","30");
INSERT INTO sheet1 VALUES("","300");
INSERT INTO sheet1 VALUES("","60");
INSERT INTO sheet1 VALUES("","600");
INSERT INTO sheet1 VALUES("","400");
INSERT INTO sheet1 VALUES("","F");
INSERT INTO sheet1 VALUES("","A2");
INSERT INTO sheet1 VALUES("","500");
INSERT INTO sheet1 VALUES("","B");
INSERT INTO sheet1 VALUES("","W");
INSERT INTO sheet1 VALUES("","T");
INSERT INTO sheet1 VALUES("","L");
INSERT INTO sheet1 VALUES("","E");
INSERT INTO sheet1 VALUES("","H");
INSERT INTO sheet1 VALUES("","I2");
INSERT INTO sheet1 VALUES("","Z");
INSERT INTO sheet1 VALUES("","D");
INSERT INTO sheet1 VALUES("","U");
INSERT INTO sheet1 VALUES("","G");
INSERT INTO sheet1 VALUES("","J");
INSERT INTO sheet1 VALUES("","Y");
INSERT INTO sheet1 VALUES("","V");
INSERT INTO sheet1 VALUES("","I");
INSERT INTO sheet1 VALUES("","C");
INSERT INTO sheet1 VALUES("","X");
INSERT INTO sheet1 VALUES("","T1");
INSERT INTO sheet1 VALUES("","A");
INSERT INTO sheet1 VALUES("","M");
INSERT INTO sheet1 VALUES("","D1");
INSERT INTO sheet1 VALUES("","A1");
INSERT INTO sheet1 VALUES("","1b");
INSERT INTO sheet1 VALUES("","K");
INSERT INTO sheet1 VALUES("","80");
INSERT INTO sheet1 VALUES("","100");
INSERT INTO sheet1 VALUES("","E1");
INSERT INTO sheet1 VALUES("","11");
INSERT INTO sheet1 VALUES("","200");
INSERT INTO sheet1 VALUES("","700");
INSERT INTO sheet1 VALUES("","N");
INSERT INTO sheet1 VALUES("","P");
INSERT INTO sheet1 VALUES("","6");
INSERT INTO sheet1 VALUES("","4b");
INSERT INTO sheet1 VALUES("","O");
INSERT INTO sheet1 VALUES("","II");
INSERT INTO sheet1 VALUES("","A4");
INSERT INTO sheet1 VALUES("","4");
INSERT INTO sheet1 VALUES("namozgcode","nam");
INSERT INTO sheet1 VALUES("1","70");
INSERT INTO sheet1 VALUES("2","30");
INSERT INTO sheet1 VALUES("3","300");
INSERT INTO sheet1 VALUES("4","60");
INSERT INTO sheet1 VALUES("5","600");
INSERT INTO sheet1 VALUES("6","400");
INSERT INTO sheet1 VALUES("7","F");
INSERT INTO sheet1 VALUES("8","A2");
INSERT INTO sheet1 VALUES("9","500");
INSERT INTO sheet1 VALUES("10","B");
INSERT INTO sheet1 VALUES("11","W");
INSERT INTO sheet1 VALUES("12","T");
INSERT INTO sheet1 VALUES("13","L");
INSERT INTO sheet1 VALUES("14","E");
INSERT INTO sheet1 VALUES("15","H");
INSERT INTO sheet1 VALUES("16","I2");
INSERT INTO sheet1 VALUES("17","Z");
INSERT INTO sheet1 VALUES("18","D");
INSERT INTO sheet1 VALUES("19","U");
INSERT INTO sheet1 VALUES("20","G");
INSERT INTO sheet1 VALUES("21","J");
INSERT INTO sheet1 VALUES("22","Y");
INSERT INTO sheet1 VALUES("23","V");
INSERT INTO sheet1 VALUES("24","I");
INSERT INTO sheet1 VALUES("25","C");
INSERT INTO sheet1 VALUES("26","X");
INSERT INTO sheet1 VALUES("27","T1");
INSERT INTO sheet1 VALUES("28","A");
INSERT INTO sheet1 VALUES("29","M");
INSERT INTO sheet1 VALUES("30","D1");
INSERT INTO sheet1 VALUES("31","A1");
INSERT INTO sheet1 VALUES("32","1b");
INSERT INTO sheet1 VALUES("33","K");
INSERT INTO sheet1 VALUES("34","80");
INSERT INTO sheet1 VALUES("35","100");
INSERT INTO sheet1 VALUES("36","E1");
INSERT INTO sheet1 VALUES("37","11");
INSERT INTO sheet1 VALUES("38","200");
INSERT INTO sheet1 VALUES("39","700");
INSERT INTO sheet1 VALUES("40","N");
INSERT INTO sheet1 VALUES("41","P");
INSERT INTO sheet1 VALUES("42","6");
INSERT INTO sheet1 VALUES("43","4b");
INSERT INTO sheet1 VALUES("44","O");
INSERT INTO sheet1 VALUES("45","II");
INSERT INTO sheet1 VALUES("46","A4");
INSERT INTO sheet1 VALUES("47","4");
INSERT INTO sheet1 VALUES("namozgcode","nam");
INSERT INTO sheet1 VALUES("1","70");
INSERT INTO sheet1 VALUES("2","30");
INSERT INTO sheet1 VALUES("3","300");
INSERT INTO sheet1 VALUES("4","60");
INSERT INTO sheet1 VALUES("5","600");
INSERT INTO sheet1 VALUES("6","400");
INSERT INTO sheet1 VALUES("7","F");
INSERT INTO sheet1 VALUES("8","A2");
INSERT INTO sheet1 VALUES("9","500");
INSERT INTO sheet1 VALUES("10","B");
INSERT INTO sheet1 VALUES("11","W");
INSERT INTO sheet1 VALUES("12","T");
INSERT INTO sheet1 VALUES("13","L");
INSERT INTO sheet1 VALUES("14","E");
INSERT INTO sheet1 VALUES("15","H");
INSERT INTO sheet1 VALUES("16","I2");
INSERT INTO sheet1 VALUES("17","Z");
INSERT INTO sheet1 VALUES("18","D");
INSERT INTO sheet1 VALUES("19","U");
INSERT INTO sheet1 VALUES("20","G");
INSERT INTO sheet1 VALUES("21","J");
INSERT INTO sheet1 VALUES("22","Y");
INSERT INTO sheet1 VALUES("23","V");
INSERT INTO sheet1 VALUES("24","I");
INSERT INTO sheet1 VALUES("25","C");
INSERT INTO sheet1 VALUES("26","X");
INSERT INTO sheet1 VALUES("27","T1");
INSERT INTO sheet1 VALUES("28","A");
INSERT INTO sheet1 VALUES("29","M");
INSERT INTO sheet1 VALUES("30","D1");
INSERT INTO sheet1 VALUES("31","A1");
INSERT INTO sheet1 VALUES("32","1b");
INSERT INTO sheet1 VALUES("33","K");
INSERT INTO sheet1 VALUES("34","80");
INSERT INTO sheet1 VALUES("35","100");
INSERT INTO sheet1 VALUES("36","E1");
INSERT INTO sheet1 VALUES("37","11");
INSERT INTO sheet1 VALUES("38","200");
INSERT INTO sheet1 VALUES("39","700");
INSERT INTO sheet1 VALUES("40","N");
INSERT INTO sheet1 VALUES("41","P");
INSERT INTO sheet1 VALUES("42","6");
INSERT INTO sheet1 VALUES("43","4b");
INSERT INTO sheet1 VALUES("44","O");
INSERT INTO sheet1 VALUES("45","II");
INSERT INTO sheet1 VALUES("46","A4");
INSERT INTO sheet1 VALUES("47","4");



DROP TABLE status_t;

CREATE TABLE `status_t` (
  `status_code` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(50) NOT NULL,
  PRIMARY KEY (`status_code`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

INSERT INTO status_t VALUES("8","متاح");
INSERT INTO status_t VALUES("9","غير متاح");
INSERT INTO status_t VALUES("10","مباع");
INSERT INTO status_t VALUES("11","مؤجل");
INSERT INTO status_t VALUES("12","اخرى");
INSERT INTO status_t VALUES("13","لغى الفكرة");
INSERT INTO status_t VALUES("14","متأجرة");
INSERT INTO status_t VALUES("15","يتابع");
INSERT INTO status_t VALUES("16","يتابع");
INSERT INTO status_t VALUES("17","يتابع");



DROP TABLE tashteeb_t;

CREATE TABLE `tashteeb_t` (
  `tashteeb_code` int(11) NOT NULL AUTO_INCREMENT,
  `tashteeb_name` varchar(50) NOT NULL,
  PRIMARY KEY (`tashteeb_code`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO tashteeb_t VALUES("8","شركة");
INSERT INTO tashteeb_t VALUES("9","خاص");
INSERT INTO tashteeb_t VALUES("10","نصف تشطيب");
INSERT INTO tashteeb_t VALUES("11","بدون");
INSERT INTO tashteeb_t VALUES("12","اخرى");



DROP TABLE udata;

CREATE TABLE `udata` (
  `code` varchar(20) NOT NULL,
  `madena` varchar(30) NOT NULL,
  `madena_other` varchar(50) DEFAULT NULL,
  `aqar_type` varchar(30) NOT NULL,
  `aqar_type_other` varchar(50) DEFAULT NULL,
  `namozg` varchar(30) DEFAULT NULL,
  `geem` varchar(30) DEFAULT NULL,
  `ain` varchar(30) DEFAULT NULL,
  `wow` varchar(30) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `ard_mesaha` decimal(10,0) DEFAULT NULL,
  `mbna_mesaha` decimal(10,0) DEFAULT NULL,
  `matloob` int(11) DEFAULT NULL,
  `aqd_total` int(11) DEFAULT NULL,
  `kest_modah` int(11) DEFAULT NULL,
  `madfoo` int(11) DEFAULT NULL,
  `alover` int(11) DEFAULT NULL,
  `kest_year` int(11) DEFAULT NULL,
  `kest_month` int(11) DEFAULT NULL,
  `tashteeb` varchar(30) NOT NULL,
  `hagz` varchar(30) DEFAULT NULL,
  `estlam` varchar(30) DEFAULT NULL,
  `nady` varchar(30) DEFAULT NULL,
  `wadyaa` varchar(30) DEFAULT NULL,
  `notes` varchar(250) DEFAULT NULL,
  `cust_title` varchar(20) DEFAULT NULL,
  `cust_name` varchar(50) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `masdr` varchar(30) DEFAULT NULL,
  `entry_date` date NOT NULL,
  `modkhel` varchar(30) NOT NULL,
  `update_date` date NOT NULL,
  `motabaa` varchar(30) DEFAULT NULL,
  `amalya_type` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `marhala` varchar(30) DEFAULT NULL,
  `image1` varchar(250) DEFAULT NULL,
  `image2` varchar(250) DEFAULT NULL,
  `image3` varchar(250) DEFAULT NULL,
  `hadeka` varchar(50) DEFAULT NULL,
  `log_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updater` varchar(50) DEFAULT NULL,
  `door` varchar(20) DEFAULT NULL,
  `modah_ejar` varchar(20) DEFAULT NULL,
  `motabaqi` varchar(20) DEFAULT NULL,
  `view_v` varchar(250) DEFAULT NULL,
  `momz` tinyint(1) DEFAULT NULL,
  `rooms` int(11) DEFAULT NULL,
  `WC` int(11) DEFAULT NULL,
  `ways` varchar(50) DEFAULT NULL,
  `meterprice` varchar(20) DEFAULT NULL,
  `kmalyat` varchar(250) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `remember` tinyint(1) DEFAULT NULL,
  `details` varchar(2500) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`code`),
  UNIQUE KEY `code` (`code`),
  UNIQUE KEY `code1` (`madena`,`geem`,`ain`,`wow`,`amalya_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO udata VALUES("1","مدينتى","","شقة","","300","34","42","2","","45","177","1000000","1150000","10","800000","200000","63000","1800","","","","FALSE","","بلغتها ان السعر عالى وقالت الاوفر قابل للتفاوض","","عطا الله فؤاد","24183491","1286410203","","0000-00-00","","2016-03-18","ايهاب","تمليك","لغى الفكرة","3","","","","45","2016-03-18 03:24:10","Ibrahim","","","350000","","","","","","","","","","","","");
INSERT INTO udata VALUES("10012","مدينتى","","شقة","","70","","15","32","","120","96","325000","530000","17","260000","90000","","23000","بدون","01/01/2008","مستلمه","TRUE","","معها عقد وكاله","","داليا","","1093009579","","2014-06-17","ايمان","2016-11-11","ايمان","تمليك","متاح","7","","","","0","2016-03-18 03:24:10","admin","0","","190000","Park","1","","","","","","","","","","");
INSERT INTO udata VALUES("10013","مدينتى","","شقة","","","32","39","1","","50","186","1300000","","","","","","","","","","FALSE","","","","م/عصام عز","1207879596","1017373072","","0000-00-00","ايمان","2016-03-18","ايمان","تمليك","مباع","3","","","","50","2016-03-18 03:24:10","Ibrahim","","","0","","1","","","","","","","","","","");
INSERT INTO udata VALUES("10014","مدينتى","","شقة","","","74","6","53","","0","69","192000","404000","17","192000","","","1480","","01/01/2008","مستلمه","FALSE","","","","محمد ابراهيم","","1001718642","","0000-00-00","ايمان","2016-03-18","هند","ايجار","متأجرة","7","","","","0","2016-03-18 03:24:10","Ibrahim","","سنه","212000","","","","","","","","","","","","");
INSERT INTO udata VALUES("10015","مدينتى","","شقة","","30","67","8","33","","0","103","630000","","","","","2900","","","05/07/2007","","TRUE","","من طرف أ/ احمد تاج والمفتاح معاه","","خالد محمد عبد الفتاح","","1118008999","","2014-08-20","ايمان","2016-03-18","ايمان","ايجار","مباع","6","","","","0","2016-03-18 03:24:10","Ibrahim","","","","Narrow Garden","","","","","","","","","","","");
INSERT INTO udata VALUES("10016","مدينتى","","شقة","","","70","14","22","","0","69","185000","404000","17","170000","15000","","1400","","","","FALSE","","الرقم غلط","","سمير","","122252011","","0000-00-00","","2016-03-18","هند","تمليك","","7","","","","0","2016-03-18 03:24:10","Ibrahim","","","234000","","1","","","","","","","","","","");
INSERT INTO udata VALUES("10017","الرحاب","","شقة","","","132","2","1","","50","179","975000","1102000","4","835000","140000","112650","5927","","","","FALSE","","","","محمد أبو الفتوح","1282221001","1282221000","","0000-00-00","","2016-03-18","هند","تمليك","مباع","10","","","","50","2016-03-18 03:24:10","Ibrahim","","","267000","","","","","","","","","","","","");
INSERT INTO udata VALUES("10018","مدينتى","","شقة","","","73","55","31","","0","82","195000","436800","17","195000","","","4785","","","","FALSE","","استلام فورى","","شريف عبد الحارث","","1204569921","","2014-02-03","ايمان","2016-03-18","","تمليك","لغى الفكرة","7","","","","0","2016-03-18 03:24:10","Ibrahim","","","241800","","","","","","","","","","","","");
INSERT INTO udata VALUES("10019","الرحاب","","شقة","","300","34","27","2","","45","177","940000","907000","3","840000","100000","","","","","","FALSE","","لما تستلم هتكلمنا تعرضها ايجار","","سهام","1223136441","1224262178","","0000-00-00","","2016-03-18","ايمان","تمليك","لغى الفكرة","3","","","","45","2016-03-18 03:24:10","Ibrahim","","","67000","","","","","","","","","","","","");
INSERT INTO udata VALUES("10021","التجمع الخامس","","شقة","","","67","33","31","","0","89","378000","421000","","378000","","5790","4500","","","","FALSE","","جاهزة الاستلام","","ميشيل","","100520627","","0000-00-00","","2016-03-18","","تمليك","متاح","6","","","","0","2016-03-18 03:24:10","Ibrahim","","","43000","Garden","","","","","","","","","","","");
INSERT INTO udata VALUES("10022","مدينتى","","شقة","","300","32","22","2","","45","177","455000","1780000","10","430000","25000","65000","2350","","","","FALSE","","","","شيماء شاكر","","1001715913","","0000-00-00","","2016-03-18","هند","تمليك","مباع","3","","","","45","2016-03-18 03:24:10","Ibrahim","","","1350000","","","","","","","","","","","","");
INSERT INTO udata VALUES("10023","مدينتى","","شقة","","60","74","22","13","","0","81","250000","496000","17","250000","","21000","","","24/06/2008","","FALSE","","استلام فورى","","ماجدة عبد العظيم","1222651010","1005230700","","0000-00-00","","2016-03-18","ايمان","تمليك","مباع","7","","","","0","2016-03-18 03:24:10","Ibrahim","","","246000","Garden","","","","","","","","","","","");
INSERT INTO udata VALUES("10024","الرحاب","","شقة","","","95","6","26","","0","108","800000","","","","","","","","","","FALSE","","غاز+كرانيش نكلمه خارج مصر","","سامى عطيه جرجيس","","1223275511","اتصال","0000-00-00","","2016-03-18","ايمان","تمليك","متاح","5","","","","0","2016-03-18 03:24:10","Ibrahim","","","0","","","","","","","","","","","","");
INSERT INTO udata VALUES("10025","الرحاب","","شقة","","","100","2","3","","57","176","0","","","","","","","","","","FALSE","","شقة 3و4/ الرقم غير موجود بالخدمه","","فارس","","1001602027","","0000-00-00","","2016-03-18","هند","تمليك","غير متاح","5","","","","57","2016-03-18 03:24:10","Ibrahim","","","0","","1","","","","","","","","","","");
INSERT INTO udata VALUES("10026","مدينتى","","شقة","","","13","22","2","","45","174","640000","550000","10","390000","250000","31000","1200","","","","FALSE","","الهاتف مغلق4/11/2015","","حازم الشاعر","","1129010847","","0000-00-00","","2016-03-18","ايمان","تمليك","","1","","","","45","2016-03-18 03:24:10","Ibrahim","","","160000","","","","","","","","","","","","");
INSERT INTO udata VALUES("10027","مدينتى","","شقة","","70","74","25","34","","0","96","250000","511200","17","250000","","","1870","","22/06/2008","غير مستلمه","FALSE","","دفع دفعة الاستلام","","نجوى مختار","","1114158487","","0000-00-00","","2016-03-18","هند","تمليك","مباع","7","","","","0","2016-03-18 03:24:10","Ibrahim","","","261200","park","","","","","","","","","","","");
INSERT INTO udata VALUES("10028","مدينتى","","شقة","","","72","48","51","","0","65","156000","329500","17","156000","","","1205","","","","FALSE","","","","منى محمد على","1149220044","1225884557","","0000-00-00","","2016-03-18","","تمليك","مباع","7","","","","0","2016-03-18 03:24:10","Ibrahim","","","173500","","","","","","","","","","","","");
INSERT INTO udata VALUES("10029","الرحاب","","شقة","","","119","6","2","","43","171","1400000","","","","","","","","","","FALSE","","","","هناء","1144567157","1110666803","اتصال","0000-00-00","ايمان","2016-03-18","محمد","تمليك","مباع","8","","","","43","2016-03-18 03:24:10","Ibrahim","","","0","garden","","","","","","","","","","","");
INSERT INTO udata VALUES("10030","الرحاب","","شقة","","","122","26","12","","0","294","1520000","1630000","","1320000","200000","96500","23970","","","","FALSE","","لغت فكرت البيع هتسكن فيها","","كريم همام","","1001402329","","0000-00-00","","2016-03-18","","تمليك","لغى الفكرة","8","","","","0","2016-03-18 03:24:10","Ibrahim","","","310000","g&park","","","","","","","","","","","");
INSERT INTO udata VALUES("10031","الرحاب","","شقة","","","18","28","2","","0","170","950000","","","","","","","","","","FALSE","","شقة داخل فيلا فى المرحلة 6","","فايز","","1280599953","","0000-00-00","ايمان","2016-03-18","ايمان","تمليك","مباع","6","","","","0","2016-03-18 03:24:10","Ibrahim","","","0","","","","","","","","","","","","");
INSERT INTO udata VALUES("10032","مدينتى","","شقة","","","72","67","23","","0","81","620000","470000","10","320000","300000","22500","8700","","","","FALSE","","3% عمولة+بدون تشطيب","","أحمد","","1008009255","الوسيط","2014-10-03","ايمان","2016-03-18","ايمان","تمليك","مباع","7","","","","0","2016-03-18 03:24:10","Ibrahim","","","150000","","","","","","","","","","","","");
INSERT INTO udata VALUES("10033","الرحاب","","شقة","","","130","3","52","","0","223","1550000","821870","","821870","728130","","","","","","FALSE","","7000للمتر","","حسام","24196413","1159550454","","0000-00-00","محمد","2016-03-18","ايمان","تمليك","مباع","9","","","","0","2016-03-18 03:24:10","Ibrahim","","","0","R","","","","","","","","","","","");
INSERT INTO udata VALUES("10034","مدينتى","","شقة","","","72","52","32","","0","66","140000","354000","10","130000","10000","14000","1440","","","","FALSE","","","","باسل محمد","","1272000085","","0000-00-00","","2016-03-18","ايمان","تمليك","مباع","7","","","","0","2016-03-18 03:24:10","Ibrahim","","","224000","","","","","","","","","","","","");
INSERT INTO udata VALUES("10035","مدينتى","","شقة","","30","67","2","33","","0","103","445000","365000","17","325000","120000","27500","11500","","","","FALSE","","دفعة الاستلام18000 لم تدفع","","سامية","22738341","1001446036","","0000-00-00","","2016-03-18","ايمان","تمليك","لغى الفكرة","6","","","","0","2016-03-18 03:24:10","Ibrahim","","","40000","st","","","","","","","","","","","");
INSERT INTO udata VALUES("10036","مدينتى","","شقة","","","13","42","13","","0","110","200000","366000","15","200000","","14800","830","","","","FALSE","","الرقم خطأ","","سالى","22875022","1227994157","","0000-00-00","","2016-03-18","ايمان","تمليك","","1","","","","0","2016-03-18 03:24:10","Ibrahim","","","166000","Garden","","","","","","","","","","","");
INSERT INTO udata VALUES("10037","مدينتى","","شقة","","","71","43","13","","0","69","355000","367400","17","215000","140000","","1345","خاص","","مستلمه","FALSE","18400","تشطيبات خاصة بها ساكن لشهر 6/2016بيدفع 1350/ الوديعه فى شهر 6/2016","","هانى","1144147974","1150502830","","2014-10-20","ايمان","2016-03-18","هند","تمليك","متاح","7","","","","0","2016-03-18 03:24:10","Ibrahim","","","","","","","","","","","","","","","");
INSERT INTO udata VALUES("10038","الرحاب","","شقة","","","0","5","2","","0","164","0","","","","","","","","","","FALSE","","البيانات ناقصه","","سونيا","26906020","1151190074","","0000-00-00","","2016-03-18","ايمان","تمليك","","3","","","","0","2016-03-18 03:24:10","Ibrahim","","","0","","","","","","","","","","","","");
INSERT INTO udata VALUES("10039","مدينتى","","شقة","","","23","44","13","","0","110","360000","550000","15","260000","100000","21000","900","","","","FALSE","","","","أم شريف","","","","0000-00-00","محمد","2016-03-18","","تمليك","متاح","2","","","","0","2016-03-18 03:24:10","Ibrahim","","","290000","G&st","","","","","","","","","","","");
INSERT INTO udata VALUES("10040","التجمع الخامس","","شقة","","","17","47","31","","0","106","255000","383000","10","255000","","28300","925","","","","FALSE","","","","عمرو حجازى","1112787181","1114000717","","0000-00-00","","2016-03-18","ايمان","تمليك","مباع","1","","","","0","2016-03-18 03:24:10","Ibrahim","","","128000","park","","","","","","","","","","","");
INSERT INTO udata VALUES("10041","مدينتى","","شقة","","","32","2","22","","0","100","176000","532000","10","176000","","32000","1400","","","","FALSE","","","","رأفت فؤاد","29248879","1223567789","","0000-00-00","","2016-03-18","ايهاب","تمليك","مباع","3","","","","0","2016-03-18 03:24:10","Ibrahim","","","356000","st","","","","","","","","","","","");
INSERT INTO udata VALUES("10042","مدينتى","","شقة","","","31","64","42","","0","104","266000","540000","8","266000","","38000","1835","","","","FALSE","","بالنادى","","نشأت","","1064020109","","0000-00-00","","2016-03-18","ايمان","تمليك","مباع","3","","","","0","2016-03-18 03:24:10","Ibrahim","","","274000","","","","","","","","","","","","");
INSERT INTO udata VALUES("10043","مدينتى","","شقة","","","32","2","12","","0","103","630000","585000","8","530000","100000","32000","5280","شركة","","","FALSE","","بها مستاجر لمدة سنة","","هدى عبد المنعم","","1005275666","","0000-00-00","ايمان","2016-03-18","ايمان","تمليك","متاح","3","","","","0","2016-03-18 03:24:10","Ibrahim","","","","St","","","","","","","","","","","");
INSERT INTO udata VALUES("10044","مدينتى","","شقة","","","34","37","32","","0","100","200465","567000","10","200465","","34600","1220","","","","FALSE","","","","ايمان","","24900002","","0000-00-00","","2016-03-18","ايمان","تمليك","مباع","3","","","","0","2016-03-18 03:24:10","Ibrahim","","","366535","Narrow Garden","","","","","","","","","","","");
INSERT INTO udata VALUES("10045","مدينتى","","شقة","","","30","42","13","","0","103","100000","573000","10","100000","","34950","1235","","","","FALSE","","الرقم غلط","","اسماعيل","","1222306923","","0000-00-00","","2016-03-18","ايمان","تمليك","غير متاح","3","","","","0","2016-03-18 03:24:10","Ibrahim","","","473000","","","","","","","","","","","","");
INSERT INTO udata VALUES("10046","مدينتى","","شقة","","","14","49","12","","0","134","588000","431800","10","338000","250000","25000","960","","","","FALSE","","بنتها في الجامعه وهتسكن فيها","","هبه جعفر","","1227380282","","0000-00-00","ايهاب","2016-03-18","ايمان","تمليك","غير متاح","1","","","","0","2016-03-18 03:24:10","Ibrahim","","","93800","Garden","","","","","","","","","","","");
INSERT INTO udata VALUES("10047","مدينتى","","شقة","","","12","29","64","","0","106","250000","585000","10","250000","","33900","1650","","","","FALSE","","","","محمود طنطاوى","1211865587","1009038838","","0000-00-00","","2016-03-18","هند","تمليك","مباع","1","","","","0","2016-03-18 03:24:10","Ibrahim","","","335000","","","","","","","","","","","","");
INSERT INTO udata VALUES("10048","مدينتى","","شقة","","","113","88","34","","0","114","160000","378000","","160000","","20250","2380","","","","FALSE","","","","نادرزكريا","","1006899078","","0000-00-00","","2016-03-18","هند","تمليك","مباع","11","","","","0","2016-03-18 03:24:10","Ibrahim","","","218000","","","","","","","","","","","","");
INSERT INTO udata VALUES("10049","مدينتى","","شقة","","70","72","38","31","","0","96","290000","486000","17","260000","30000","","21600","بدون","21/06/2008","جاهزه على الاستلام","TRUE","24000","الوديعه يدفعها المشترى ويستلم","","سمير صبحى","26202665","1227395444","","0000-00-00","ايمان","2016-03-18","هند","تمليك","مباع","7","","","","0","2016-03-18 03:24:10","Ibrahim","","","226000","g&park","","","","","","","","","","","");
INSERT INTO udata VALUES("10050","مدينتى","","شقة","","","17","59","23","","0","109","170000","433000","10","400000","150000","24000","11000","","","","FALSE","","","","ليلى","26218160","1061508492","","0000-00-00","ايمان","2016-03-18","ايمان","تمليك","مؤجل","1","","","","0","2016-03-18 03:24:10","Ibrahim","","","263000","Narrow Garden","","","","","","","","","","","");
INSERT INTO udata VALUES("10051","مدينتى","","شقة","","","13","36","33","","0","104","340000","407000","","340000","","","","","","","FALSE","","","","خليفة عريشة","1143333858","105004277","","0000-00-00","","2016-03-18","ايهاب","تمليك","لغى الفكرة","1","","","","0","2016-03-18 03:24:10","Ibrahim","","","67000","","","","","","","","","","","","");
INSERT INTO udata VALUES("10052","مدينتى","","شقة","","","113","56","11","","0","116","330000","488000","10","330000","","25000","2275","","","","FALSE","","بدون تشطيبات","","شادى احمد","","1277727297","","0000-00-00","","2016-03-18","ايمان","تمليك","غير متاح","11","","","","0","2016-03-18 03:24:10","Ibrahim","","","158000","","","","","","","","","","","","");
INSERT INTO udata VALUES("10053","مدينتى","","شقة","","70","71","3","34","","0","96","311000","511180","17","311000","","","1870","","22/06/2008","","FALSE","","","","أشرف وهبه","1200993870","1276050095","","0000-00-00","","2016-03-18","ايمان","تمليك","متاح","7","","","","0","2016-03-18 03:24:10","Ibrahim","","","200180","park","","","","","","","","","","","");
INSERT INTO udata VALUES("10054","مدينتى","","شقة","","70","72","49","51","","0","96","280000","486720","17","250000","30000","","1780","","01/02/2008","","FALSE","","24300وديعة","","ايمن","","1001966412","","0000-00-00","ايمان","2016-03-18","ايمان","تمليك","مباع","7","","","","0","2016-03-18 03:24:10","Ibrahim","","","236720","g&park","","","","","","","","","","","");
INSERT INTO udata VALUES("10055","مدينتى","","شقة","","","31","64","33","","0","109","205000","608000","10","205000","","37000","1300","","","","FALSE","","","","نادر شعبان","","1226420600","","0000-00-00","","2016-03-18","ايمان","تمليك","مباع","3","","","","0","2016-03-18 03:24:10","Ibrahim","","","403000","parkark","","","","","","","","","","","");
INSERT INTO udata VALUES("10056","مدينتى","","شقة","","","113","36","21","","0","116","400000","617000","","350000","50000","","","","","","FALSE","","","","حمدى شاهين","","1001627538","","0000-00-00","","2016-03-18","ايمان","تمليك","","11","","","","0","2016-03-18 03:24:10","Ibrahim","","","267000","","","","","","","","","","","","");
INSERT INTO udata VALUES("10057","مدينتى","","شقة","","","31","58","21","","0","106","240000","608000","10","240000","","37100","1350","","","","FALSE","","","","نبيل عبد الرحمن","123379658","1223631573","","0000-00-00","","2016-03-18","محمد","تمليك","مباع","3","","","","0","2016-03-18 03:24:10","Ibrahim","","","368000","park","","","","","","","","","","","");
INSERT INTO udata VALUES("10058","مدينتى","","شقة","","300","22","27","2","","60","157","0","826250","8","","","","","","","","FALSE","","","","سمير حنا","","","","0000-00-00","محمد","2016-03-18","","تمليك","مباع","2","","","","60","2016-03-18 03:24:10","Ibrahim","","","826250","park","","","","","","","","","","","");
INSERT INTO udata VALUES("10059","مدينتى","","شقة","","","113","91","11","","0","114","210000","617000","17","210000","","22500","2250","","","","FALSE","","","","عمر حلمى","","1004448668","","0000-00-00","","2016-03-18","ايمان","تمليك","مباع","11","","","","0","2016-03-18 03:24:10","Ibrahim","","","407000","","","","","","","","","","","","");
INSERT INTO udata VALUES("10060","مدينتى","","شقة","","","34","38","31","","0","106","235000","629000","","235000","","365000","1290","","","","FALSE","","البيانات خطئ","","مدحت","","1003388850","","0000-00-00","","2016-03-18","","تمليك","","3","","","","0","2016-03-18 03:24:10","Ibrahim","","","394000","park","","","","","","","","","","","");
INSERT INTO udata VALUES("10061","الرحاب","","شقة","","100","20","30","10","الرحاب بجوار السوق","120","90","1000000","900000","3","153","6000","15000","1500","نصف تشطيب","22/10/2016","22/10/2019","بدون","300","اتصال هاتفى مباشر","الحاج","محمد على عثمان","1252525","12245","محمد","2016-11-17","admin","2016-11-17","ابراهيم","تمليك كاش","متاح","1","","","","لا","2016-11-17 15:41:17","admin","2","4","0","Street","1","3","2","بحرى","3000","بلكونهبها زينة فاخرة واسعة","rrrrrr@yahoo.com","12556622","1","دورين على ناصيتين","1");



DROP TABLE udata_images;

CREATE TABLE `udata_images` (
  `code` varchar(20) NOT NULL,
  `image1` varchar(250) DEFAULT NULL,
  `image2` varchar(250) DEFAULT NULL,
  `image3` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO udata_images VALUES("1","images/1_1.jpg","images/1_2.jpg","images/1_3.jpg");
INSERT INTO udata_images VALUES("2","images/2_1.jpg","https://www.youtube.com/watch?v=JM1h_UdHMwI","");



DROP TABLE users;

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) DEFAULT NULL,
  `notes` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO users VALUES("admin","ramadan","admin","Ù„Ù‡ ÙƒØ§ÙØ© Ø§Ù„ØµÙ„Ø§Ø­ÙŠØ§Øª");
INSERT INTO users VALUES("demo","demo","visitor","");
INSERT INTO users VALUES("reda","reda","editor","Ù…Ø¯Ø®Ù„ Ø¨ÙŠØ§Ù†Ø§Øª");
INSERT INTO users VALUES("visitor","visitor","visitor","Ø²Ø§Ø¦Ø± Ù„Ù„Ø§Ø³ØªØ¹Ù„Ø§Ù…Ø§Øª ÙÙ‚Ø·");



DROP TABLE viewvv;

CREATE TABLE `viewvv` (
  `viewcide` int(11) NOT NULL AUTO_INCREMENT,
  `viewname` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`viewcide`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO viewvv VALUES("1","Park");
INSERT INTO viewvv VALUES("2","Wide Garden");
INSERT INTO viewvv VALUES("3","Street");



DROP TABLE website;

CREATE TABLE `website` (
  `url` varchar(250) NOT NULL,
  `sitename` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO website VALUES("http://alrehabgoodnews.com/","جودنيوز للتسويق العقارى");
INSERT INTO website VALUES("http://eg.waseet.net/ar/site/cairo/real_estate","الوسيط للعقارات");
INSERT INTO website VALUES("https://egypt.aqarmap.com/ar/","عقار ماب للتسويق العقارى");



