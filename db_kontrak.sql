

/*Table structure for table `kntrk` */



DROP TABLE IF EXISTS `kntrk`;



CREATE TABLE `kntrk` (
  `nmkntrk` varchar(100) NOT NULL,
  `kdpt` int(11) NOT NULL,
  `tglm` date DEFAULT NULL,
  `tglex` date DEFAULT NULL,
  `tglacc` date DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `draftkntrk` text DEFAULT NULL,
  `fkntrk` text DEFAULT NULL,
  PRIMARY KEY (`nmkntrk`,`kdpt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



/*Data for the table `kntrk` */



insert  into `kntrk`(`nmkntrk`,`kdpt`,`tglm`,`tglex`,`tglacc`,`ket`,`draftkntrk`,`fkntrk`) values ('17',28,'2019-01-01','2020-12-31','0000-00-00','Sewa Lahan Terbuka','EXAMPLE.docx',NULL),('4',13,'2019-09-04','2020-02-03','0000-00-00','Gudang Tertutup','EXAMPLE.docx',NULL),('8',19,'2019-03-01','2020-02-28','0000-00-00','Gudang dan Handling','EXAMPLE.docx',NULL),('9',18,'2019-04-01','2020-03-30','0000-00-00','Lahan Terbuka','EXAMPLE.docx',NULL),('SPB-DRU/001/I/2019',7,'2018-11-02','2019-01-03','2019-01-03','Sewa Lahan Terbuka','EXAMPLE.docx',NULL),('SPB-DRU/010/I/2019',24,'2019-01-01','2019-12-31','2019-01-21','Lahan ','EXAMPLE.docx',NULL),('SPB-DRU/015/I/2019',22,'2018-11-24','2019-11-23','2019-01-29','Handling','EXAMPLE.docx',NULL),('SPB-DRU/028/III/2019',4,'2019-01-02','2020-01-01','2019-03-08','Gudang dan Handling','EXAMPLE.docx',NULL),('SPB-DRU/029/III/2019',6,'2019-03-12','2022-03-11','2019-03-12','Lahan Terbuka','EXAMPLE.docx',NULL),('SPB-DRU/031/III/2019',1,'2018-05-01','2023-04-30','2019-03-15','Lahan Terbuka','EXAMPLE.docx',NULL),('SPB-DRU/043/V/2019',2,'2019-04-01','2020-03-30','2019-04-16','Lahan Terbuka','EXAMPLE.docx',NULL),('SPB-DRU/049/V/2019',26,'2019-05-06','2020-05-05','2019-04-29','Trucking','EXAMPLE.docx',NULL),('SPB-DRU/051/V/2019',12,'2019-05-06','2024-05-05','2019-05-02','Tempat Penimbunan Sementara (TPS)','EXAMPLE.docx',NULL),('SPB-DRU/059/V/2019',11,'2019-04-01','2020-03-31','2019-05-13','Lahan Terbuka','EXAMPLE.docx',NULL),('SPB-DRU/060/V/2019',25,'2019-04-29','2020-04-28','2019-05-13','Lahan Terbuka','EXAMPLE.docx',NULL),('SPB-DRU/061/V/2019',20,'2019-04-12','2019-10-11','2019-05-23','Lahan Terbuka','EXAMPLE.docx',NULL),('SPB-DRU/070/VII/2019',17,'2019-06-02','2021-06-02','2019-07-09','Kargo dan Pos','EXAMPLE.docx',NULL),('SPB-DRU/071/VII/2019',27,'2019-06-02','2021-06-01','2019-07-10','Kargo dan Pos','EXAMPLE.docx',NULL),('SPB-DRU/072/VII/2019',8,'2019-06-02','2021-06-01','2019-07-10','Kargo dan Pos','EXAMPLE.docx',NULL),('SPB-DRU/073/VII/2019',16,'2019-06-02','2021-06-01','2019-07-10','Kargo dan Pos','EXAMPLE.docx',NULL),('SPB-DRU/085/IX/2019',15,'2018-09-15','2019-09-14','2019-09-09','Gudang dan Handling','EXAMPLE.docx',NULL),('SPB-DRU/086/IX/2019',15,'2018-10-01','2019-09-30','2019-09-09','Gudang dan Handling','EXAMPLE.docx',NULL),('SPB-DRU/087/IX/2019',23,'2019-10-01','2020-03-31','2019-09-09','Lahan Terbuka','EXAMPLE.docx',NULL),('SPB-DRU/088/IX/2019',21,'2019-10-01','2020-03-31','2019-09-09','Lahan Terbuka','EXAMPLE.docx',NULL),('SPB-DRU/090/IX/2019',3,'2018-12-01','2019-05-31','2019-09-11','Gudang Terbuka dan Tertutup','EXAMPLE.docx',NULL),('SPB-DRU/092/IX/2019',3,'2018-07-15','2019-07-14','2019-09-12','Handling ','EXAMPLE.docx',NULL),('SPB-DRU/093/IX/2019',5,'2019-09-12','2020-09-11','2019-09-12','Pemakaian Gudang Hang Nadim','EXAMPLE.docx',NULL),('SPB-DRU/094/IX/2019',9,'2019-10-01','2020-09-30','2019-09-16','Handling','EXAMPLE.docx',NULL),('SPB-DRU/095/IX/2019',10,'2019-10-01','2022-10-31','2019-09-18','Lahan Terbuka','EXAMPLE.docx',NULL),('SPB-DRU/099/X/2019',20,'2019-10-12','2020-04-11','2019-10-08','Lahan Terbuka','EXAMPLE.docx',NULL),('SPB-DRU/103/X/2019',29,'2019-11-01','2020-04-30','2019-10-30','Lahan Terbuka','EXAMPLE.docx',NULL),('SPB-DRU/104/X/2019',14,'2019-10-01','2021-09-30','2019-10-30','Handling','EXAMPLE.docx',NULL),('SPB-DRU/105/X/2019',14,'2019-10-01','2021-09-30','2019-10-31','Reach Stacker','EXAMPLE.docx',NULL);



/*Table structure for table `pt` */



DROP TABLE IF EXISTS `pt`;



CREATE TABLE `pt` (
  `kdpt` int(11) NOT NULL AUTO_INCREMENT,
  `nmpt` varchar(255) DEFAULT NULL,
  `almt` text DEFAULT NULL,
  PRIMARY KEY (`kdpt`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;



/*Data for the table `pt` */



insert  into `pt`(`kdpt`,`nmpt`,`almt`) values (1,'Mrs. Maryanti',NULL),(2,'PT Adhel Pratama Sejati',NULL),(3,'PT Alexindo Yakin Prima',NULL),(4,'PT Asia Cocoa Indonesia (ACI)',NULL),(5,'PT Barelang Jaya Nusantara',NULL),(6,'PT Batam Tansah Wasesa',NULL),(7,'PT Batam Usaha Jaya Utama (BUJU)',NULL),(8,'PT Batik Air Indonesia',NULL),(9,'PT Damara Perkasa',NULL),(10,'PT EPCM',NULL),(11,'PT Golden Gate Mandiri',NULL),(12,'PT Inti Barokah Utama (IBU)',NULL),(13,'PT Ketrosden Transmitra',NULL),(14,'PT Laut Mas',NULL),(15,'PT Lintas Cahaya Berlian (LCB)',NULL),(16,'PT Lion Air',NULL),(17,'PT Malindo',NULL),(18,'PT Marina Farras Farren (CV Fatiin)',NULL),(19,'PT Penguin Ferry Jasa',NULL),(20,'PT Perintis Usaha Mulia',NULL),(21,'PT Perwira Adika Tria',NULL),(22,'PT Sejahtera Antar Laut',NULL),(23,'PT Sica Duta Supplindo ',NULL),(24,'PT Solnet',NULL),(25,'PT Synthesis',NULL),(26,'PT Vegah Sukses Mandiri',NULL),(27,'PT Wings Abadi',NULL),(28,'PT Yasa Tirta',NULL),(29,'Tuan Pindi',NULL);



/*Table structure for table `usr` */



DROP TABLE IF EXISTS `usr`;



CREATE TABLE `usr` (
  `usr` varchar(50) NOT NULL,
  `pss` varchar(255) DEFAULT NULL,
  `nm_user` varchar(255) DEFAULT NULL,
  `akses` enum('admin','user') DEFAULT NULL,
  `act` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`usr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



/*Data for the table `usr` */



insert  into `usr`(`usr`,`pss`,`nm_user`,`akses`,`act`) values ('admin','admin','admin','admin','Y'),('user','user','user','user','Y');



/*Table structure for table `kontrak` */



DROP TABLE IF EXISTS `kontrak`;



/*!50001 DROP VIEW IF EXISTS `kontrak` */;

/*!50001 DROP TABLE IF EXISTS `kontrak` */;


/*!50001 CREATE TABLE  `kontrak`(
 `nmkntrk` varchar(100) ,
 `kdpt` int(11) ,
 `nmpt` varchar(255) ,
 `almt` text ,
 `tglm` date ,
 `tglex` date ,
 `tglacc` date ,
 `ket` text ,
 `hari` int(7) ,
 `draftkntrk` text ,
 `fkntrk` text 
)*/;


/*Table structure for table `login` */



DROP TABLE IF EXISTS `login`;



/*!50001 DROP VIEW IF EXISTS `login` */;

/*!50001 DROP TABLE IF EXISTS `login` */;


/*!50001 CREATE TABLE  `login`(
 `username` varchar(50) ,
 `password` varchar(32) ,
 `nm_user` varchar(255) ,
 `akses` enum('admin','user') ,
 `act` enum('Y','N') 
)*/;


/*View structure for view kontrak */



/*!50001 DROP TABLE IF EXISTS `kontrak` */;

/*!50001 DROP VIEW IF EXISTS `kontrak` */;



/*!50001 CREATE VIEW `kontrak` AS (select `kntrk`.`nmkntrk` AS `nmkntrk`,`kntrk`.`kdpt` AS `kdpt`,`pt`.`nmpt` AS `nmpt`,`pt`.`almt` AS `almt`,`kntrk`.`tglm` AS `tglm`,`kntrk`.`tglex` AS `tglex`,`kntrk`.`tglacc` AS `tglacc`,`kntrk`.`ket` AS `ket`,to_days(`kntrk`.`tglex`) - to_days(curdate()) AS `hari`,`kntrk`.`draftkntrk` AS `draftkntrk`,`kntrk`.`fkntrk` AS `fkntrk` from (`kntrk` join `pt`) where `kntrk`.`kdpt` = `pt`.`kdpt`) */;



/*View structure for view login */



/*!50001 DROP TABLE IF EXISTS `login` */;

/*!50001 DROP VIEW IF EXISTS `login` */;



/*!50001 CREATE VIEW `login` AS (select `usr`.`usr` AS `username`,md5(`usr`.`pss`) AS `password`,`usr`.`nm_user` AS `nm_user`,`usr`.`akses` AS `akses`,`usr`.`act` AS `act` from `usr`) */;

