# Host: localhost  (Version: 5.6.12)
# Date: 2014-11-07 00:50:12
# Generator: MySQL-Front 5.3  (Build 4.136)

/*!40101 SET NAMES utf8 */;

#
# Data for table "banco"
#

INSERT INTO `banco` (`ID`,`NRO_CUENTA`,`TIPO_CUENTA`,`NOMBRE_BANCO`,`SALDO`,`PERSONA_ID`) VALUES (1,'111','AHORRO','PICHINCHA',0.00,4),(2,'222','AHORRO','PICHINCHA',0.00,10);

#
# Data for table "curso"
#

INSERT INTO `curso` (`ID`,`NOMBRE`,`CONTENIDO`,`PRERREQUISITOS`,`ESPECIALIDAD`) VALUES (1,'IT Essentials','Mantenimiento de Hardware y Software de computadoras','Conocimientos básicos de computación e internet ','Sistemas'),(2,'CCNA 1','Introducción a las versiones de red 5.0','Conocimientos básicos de computación e internet ','Sistemas'),(3,'CCNA 2','R&S Routing y Switching Essentials versión','CCNA1','Sistemas'),(4,'CCNA 3','R&S Scalling Networks versión','CCNA 2','Sistemas'),(5,'CCNA 4','Accessing the WAN 4.0','CCNA1,CCNA2,CCNA3','Sistemas'),(6,'Programación básica ','Aprender a leer, escribir y entender código ','Conocimientos básicos de computación e internet ','Sistemas'),(7,'Contabilidad Básica ','Distinguir los principales aspectos contables','Matemática Básica  ','Contabilidad'),(8,'Electricidad','Capacitación para instalar, operar, proyectar y optimizar los sistemas eléctricos ','Manejo de herramientas básicas ','Electricidad'),(9,'Electrónica ','Leyes de Kirchhoff','Leyes de Omh','Electrónica '),(10,'AUTOCAD','Graficación de dibujos y conjuntos de planos  ','Conocimientos básicos de computación ','Arquitectura');

#
# Data for table "edicion_curso"
#

INSERT INTO `edicion_curso` (`ID`,`ID_CURSO`,`NOMBRE`,`CONTENIDO`,`PRERREQUISITOS`,`ESPECIALIDAD`,`ID_EDICION`,`NRO_EDICION`,`FECHA_INICIO`,`FECHA_FINALIZACION`,`AULA`,`NRO_ESTUDIANTES`,`HORARIO_ID`) VALUES (62,1,'IT Essentials','Mantenimiento de Hardware y Software de computadoras','Conocimientos básicos de computación e internet ','Sistemas',1,1,'2014-10-17','2014-11-20','123',3,3),(63,2,'CCNA 1','Introducción a las versiones de red 5.0','Conocimientos básicos de computación e internet ','Sistemas',2,1,'2014-12-12','2015-03-23','325',0,3),(64,3,'CCNA 2','R&S Routing y Switching Essentials versión','CCNA1','Sistemas',3,1,'2014-09-05','2014-10-01','245',2,3),(65,4,'CCNA 3','R&S Scalling Networks versión','CCNA 2','Sistemas',4,1,'2014-12-22','2015-06-04','253',0,4),(66,3,'CCNA 2','R&S Routing y Switching Essentials versión','CCNA1','Sistemas',5,2,'2014-11-15','2015-06-12','352',0,3),(67,1,'IT Essentials','Mantenimiento de Hardware y Software de computadoras','Conocimientos básicos de computación e internet ','Sistemas',6,2,'2014-11-10','2015-02-10','256',0,1),(68,2,'CCNA 1','Introducción a las versiones de red 5.0','Conocimientos básicos de computación e internet ','Sistemas',7,2,'2014-12-15','2015-03-27','257',0,2),(69,3,'CCNA 2','R&S Routing y Switching Essentials versión','CCNA1','Sistemas',8,2,'2014-11-12','2015-03-02','258',0,3),(70,4,'CCNA 3','R&S Scalling Networks versión','CCNA 2','Sistemas',9,3,'2015-01-05','2015-03-25','123',0,4),(71,5,'CCNA 4','Accessing the WAN 4.0','CCNA1,CCNA2,CCNA3','Sistemas',10,3,'2014-11-22','2015-04-25','355',0,2),(72,6,'Programación básica ','Aprender a leer, escribir y entender código ','Conocimientos básicos de computación e internet ','Sistemas',11,3,'2014-12-27','2015-02-12','235',0,2),(73,7,'Contabilidad Básica ','Distinguir los principales aspectos contables','Matemática Básica  ','Contabilidad',12,1,'2014-11-02','2015-02-01','355',0,4),(74,8,'Electricidad','Capacitación para instalar, operar, proyectar y optimizar los sistemas eléctricos ','Manejo de herramientas básicas ','Electricidad',13,1,'2014-12-01','2015-05-22','333',0,2),(75,9,'Electrónica ','Leyes de Kirchhoff','Leyes de Omh','Electrónica ',14,1,'2014-11-12','2015-04-22','666',0,1),(76,10,'AUTOCAD','Graficación de dibujos y conjuntos de planos  ','Conocimientos básicos de computación ','Arquitectura',15,1,'2014-12-11','2015-05-22','231',0,4),(77,5,'CCNA 4','Accessing the WAN 4.0','CCNA1,CCNA2,CCNA3','Sistemas',16,2,'2014-11-11','1015-04-28','345',0,3),(78,6,'Programación básica ','Aprender a leer, escribir y entender código ','Conocimientos básicos de computación e internet ','Sistemas',17,1,'2014-11-04','2015-02-14','321',0,1),(79,6,'Programación básica ','Aprender a leer, escribir y entender código ','Conocimientos básicos de computación e internet ','Sistemas',18,2,'2014-12-03','2015-07-01','342',0,4),(80,4,'CCNA 3','R&S Scalling Networks versión','CCNA 2','Sistemas',19,2,'2014-11-10','2015-05-11','238',0,3);

#
# Data for table "estadisticas"
#


#
# Data for table "horario"
#

INSERT INTO `horario` (`ID`,`HORA_INICIO`,`HORA_FIN`,`NUM_HORAS`,`DETALLE`) VALUES (1,'08:00:00','10:00:00',2,'LUNES-VIERNES'),(2,'07:00:00','11:00:00',4,'SABADO-DOMINGO'),(3,'07:00:00','16:00:00',10,'SABADO-DOMINGO'),(4,'07:00:00','12:00:00',5,'SABADO-DOMINGO'),(5,'10:00:00','12:00:00',2,'LUNES-VIERNES');

#
# Data for table "curso_edicion"
#

INSERT INTO `curso_edicion` (`ID`,`NRO_EDICION`,`FECHA_INICIO`,`FECHA_FINALIZACION`,`AULA`,`NRO_ESTUDIANTES`,`CURSO_ID`,`HORARIO_ID`) VALUES (1,1,'2014-10-17','2014-11-20','123',3,1,3),(2,1,'2014-12-12','2015-03-23','325',0,2,3),(3,1,'2014-11-05','2014-12-01','245',2,3,3),(4,1,'2014-12-22','2015-06-04','253',0,4,4),(5,2,'2014-11-15','2015-06-12','352',0,3,3),(6,2,'2014-11-10','2015-02-10','256',0,1,1),(7,2,'2014-12-15','2015-03-27','257',0,2,2),(8,2,'2014-11-12','2015-03-02','258',0,3,3),(9,3,'2015-01-05','2015-03-25','123',0,4,4),(10,3,'2014-11-22','2015-04-25','355',0,5,2),(11,3,'2014-12-27','2015-02-12','235',0,6,2),(12,1,'2014-11-02','2015-02-01','355',0,7,4),(13,1,'2014-12-01','2015-05-22','333',0,8,2),(14,1,'2014-11-12','2015-04-22','666',0,9,1),(15,1,'2014-12-11','2015-05-22','231',0,10,4),(16,2,'2014-11-11','1015-04-28','345',0,5,3),(17,1,'2014-11-04','2015-02-14','321',0,6,1),(18,2,'2014-12-03','2015-07-01','342',0,6,4),(19,2,'2014-11-10','2015-05-11','238',0,4,3);

#
# Data for table "formulario"
#


#
# Data for table "faltas_estudiante"
#


#
# Data for table "evaluacion_estudiante"
#


#
# Data for table "curso_edicion_has_personas"
#

INSERT INTO `curso_edicion_has_personas` (`PERSONA_ID`,`CURSO_EDICION_ID`) VALUES (1,1),(2,1),(3,1),(4,3),(10,1),(13,3),(14,3);

#
# Data for table "banco_deposito"
#

INSERT INTO `banco_deposito` (`ID`,`NRO_COMPROBANTE`,`VALOR`,`BANCO_ID`,`CURSO_EDICION_ID`) VALUES (1,'123',400.00,1,3),(2,'100',400.00,2,1);

#
# Data for table "centro_recaudacion_depositos"
#


#
# Data for table "certificado"
#


#
# Data for table "material_didactico"
#


#
# Data for table "curso_has_mat_didactico"
#


#
# Data for table "persona"
#

INSERT INTO `persona` (`ID`,`CEDULA`,`RUC`,`NOMBRES`,`APELLIDOS`,`DIRECCION`,`TELEFONO`,`TITULOS_ACADEMICOS`,`LUGAR_TRABAJO`,`TIPO_PERSONA`,`NRO_CURSOS_APROBADOS`,`FOTO`) VALUES (1,'1003822390',NULL,'Jose Gabriel','Guerra Ortega','ALPACHACA','0989531966',NULL,'CISIC',1,0,NULL),(2,'1002234568',NULL,'Jhonatan ','Quilcra','Urcuqui','0987654318',NULL,'CISIC',1,0,NULL),(3,'1003722389',NULL,'Alexis','Sarsoza','Caranqui','0986341277',NULL,'CISIC',1,0,NULL),(4,'1007822358',NULL,'Juan','Alvarez','Ibarra','0986321566','Ingeniero en Sistema','FICA',3,0,NULL),(5,'1003141237',NULL,'Andrea','Baez','Ibarra','097654128',NULL,'Ibarra',2,0,NULL),(6,'1003484240',NULL,'Cristian','Ichau','Pimampiro','0978541833',NULL,'CISIC',1,0,NULL),(7,'1002435670',NULL,'Daniel','Cañarejo','Ibarra','0985117788',NULL,'CISIC',1,0,NULL),(8,'1004322760',NULL,'Carlos','Cardenas','Otavalo','0956231866',NULL,'CISIC',1,0,NULL),(9,'1008934560',NULL,'Luis','Gonzales','Ibarra','0989531977',NULL,'CISIC',1,0,NULL),(10,'1004486566',NULL,'Pedro','Ruales','Ibarra','0943111122','Ingeniero Industrial','FICA',3,0,NULL),(11,'1003822330',NULL,'Martin','Lopez','Ibarra','098761833','Ingeniero Mecatronico','FICA',3,0,NULL),(12,'1007722190',NULL,'Milton','Aguilar','Ibarra','0965231966',NULL,'CISIC',1,0,NULL),(13,'1003245762',NULL,'Marco','Posso','Ibarra','0912347622',NULL,'CISIC',1,0,NULL),(14,'1004455668',NULL,'Ricardo','Salas','Ibarra','0989123466',NULL,'CISIC',1,0,NULL),(15,'1004567890',NULL,'Pablo','Mendez','Atuntaqui','0987451933','Ingeniero en Sistema','FICA',3,0,NULL),(16,'1005667231',NULL,'Maria','Suarez','Ibarra','0967237754',NULL,'CISIC',1,0,NULL),(17,'1001013457',NULL,'Carla','Arcos','Ibarra','0975111122',NULL,'CIME',1,0,NULL),(18,'1003744892',NULL,'Tatiana','Enriquez','Ibarra','0912456788',NULL,'CIME',1,0,NULL),(19,'1002134218',NULL,'Laura','Yepez','Otavalo','0976341811',NULL,'CIERCOM',1,0,NULL),(20,'1003838210',NULL,'Miguel','Cervantes','Ibarra','0976342899',NULL,'CIERCOM',1,0,NULL),(21,'1003593421',NULL,'Alexander ','Orbes','Imantag','0989158376',NULL,'CISIC',1,0,NULL),(22,'1004561234',NULL,'María','Chavez','Cotacachi','0987676565',NULL,'CIME',1,0,NULL),(23,'1004567656',NULL,'Jorge','Villamizar','Otavalo','0986789876','Técnico en Redes','Otavalo',2,0,NULL),(24,'1003422321',NULL,'Bryan','Recalde','Quiroga','0945683218',NULL,'CISIC',1,0,NULL),(25,'1009898765',NULL,'Martha','Chulde','Tulcán','0934567876',NULL,'Ibarra',2,0,NULL),(26,'0100987898',NULL,'Jorge','Martínez','Ibarra','0988777876',NULL,'Cotacachi',2,0,NULL),(27,'0200999998',NULL,'Hernán','Potosí','San Roque','0977776667',NULL,'Atuntaqui',2,1,NULL),(28,'1004455543',NULL,'Franklin','Ruiz','Ibarra','0988889656',NULL,'CISIC',1,1,NULL),(29,'0403245726',NULL,'Eliana','Morales','Otavalo','0988867283',NULL,'CIME',1,2,NULL),(30,'1009876543',NULL,'Alexander','Recalde','Cotacachi','0923456789',NULL,'CISIC',1,0,NULL),(31,'1003456789',NULL,'Fabián','Ortiz','Ibarra','0987654564','Ingeniero en Redes Y Telecomunicaciones','UTN',3,0,NULL),(32,'1008898765',NULL,'Damián','Francisc','Quito','0977788985',NULL,'CIME',1,0,NULL),(33,'1003324343',NULL,'Luis','Perez','Pichincha','0923456654',NULL,'Quito',2,0,NULL),(34,'1006766464',NULL,'Hernán','Cortez','Ibarra','0953476545',NULL,'Otavalo',2,0,NULL),(35,'0999886776',NULL,'Ramiro','Flores','Cuenca','0987657886',NULL,'Ibarra',2,0,NULL),(36,'1006545785',NULL,'Tobias','Ordonez','Esmeraldas','0942652318',NULL,'Esmeraldas',2,0,NULL),(37,'1009654567',NULL,'David','Mena','Pimampiro','0987654665',NULL,'Ibarra',2,0,NULL),(38,'1003458765',NULL,'Susy','Mármol','Ibarra','0986556754',NULL,'CISIC',1,0,NULL),(39,'1009876544',NULL,'Lllerena','Ordoñez','Otavalo','2958232',NULL,'CIERCOM',1,0,NULL),(40,'1005453465',NULL,'Esteban','Flores','Ibarra','0976556676',NULL,'CIERCOM',1,0,NULL),(41,'1004546577',NULL,'Arón','Mier','Atuntaqui','0987556784',NULL,'CIME',1,0,NULL),(42,'1004545446',NULL,'Nando','Teran','Ibarra','0944545454',NULL,'CIERCOM',1,0,NULL),(43,'1004454366',NULL,'Fernando','Proaño','Cotacachi','0944232456',NULL,'CISIC',1,0,NULL),(44,'1000000357',NULL,'Wiliam','Potosí','Atuntaqui','0945687654',NULL,'CISIC',1,0,NULL),(45,'1009098738',NULL,'Fernando','Yepez','Cotacachi','0954534341',NULL,'CISIC',1,0,NULL),(46,'1005658676',NULL,'Samanta','Ruiz','Otavalo','0966542387',NULL,'CIERCOM',1,0,NULL),(47,'1005456788',NULL,'Martin','Mendoza','Caranqui','0964456856',NULL,'CISIC',1,0,NULL),(48,'1007654886',NULL,'Tito','Morán','Atuntaqui','0955353357',NULL,'CIME',1,0,NULL),(49,'1005576388',NULL,'Gabriel','Fernandez','Ibarra','0976556784',NULL,'CISIC',1,0,NULL),(50,'1008765679',NULL,'Fernanda','Andramuño','Cotacachi','0987655674',NULL,'CISIC',1,0,NULL),(51,'1008654345',NULL,'Bayron','Chavez','Imantag','0995456654',NULL,'Cotacachi',2,1,NULL),(52,'1007688784',NULL,'Diego','Orbes','Imantag','0945767871',NULL,'Imantag',2,1,NULL),(53,'1005664468',NULL,'Ernesto','Gómez','Cotacachi','0967664537',NULL,'Cotacachi',1,0,NULL),(54,'1007677876',NULL,'Ulises','Flores','Cotacachi','0954768787','Contador','Otavalo',2,0,NULL),(55,'1005876755',NULL,'Wilson','Portilla','Otavalo','0986667886',NULL,'CISIC',1,3,NULL),(56,'1006998967',NULL,'Hugo','Chavez','Ibarra','0977776654','General','Ibarra',2,0,NULL),(57,'1003587199',NULL,'Dante','Viracocha','Otavalo','0956654345',NULL,'CIME',1,0,NULL),(58,'1008875345',NULL,'Juan','Sanzhez','Imantag','0987655678',NULL,'Cotacachi',2,0,NULL),(59,'1065456788',NULL,'Victor','Tugumbango','Ibarra','0954567655',NULL,'CISIC',1,0,NULL),(60,'1009876356',NULL,'Oscar','Suarez','Ibarra','0956787655',NULL,'CIERCOM',1,0,NULL),(61,'1303456789',NULL,'Daniel','Flores','Ibarra','0945676543',NULL,'CISIC',1,0,NULL),(62,'1077773737',NULL,'Fernando','Cajas','Otavalo','0967767888',NULL,'Otavalo',2,0,NULL),(63,'1045535333',NULL,'Elena','Villamarca','Ibarra','0934587754',NULL,'CIME',1,4,NULL),(64,'1092336876',NULL,'Iván','Maldonado','Iumán','0977356653',NULL,'Otavalo',1,0,NULL),(65,'1082783778',NULL,'Mario','Conejo','Otavalo','0956785567',NULL,'CISIC',1,0,NULL),(66,'1024653553',NULL,'Nestor','Endara','Cotacachi','0954223456',NULL,'CIME',1,0,NULL),(67,'1056473422',NULL,'Ramiro','Taya','Imantag','0956786544',NULL,'Cotacachi',2,0,NULL),(68,'1014567656',NULL,'Yolanda','Perez','Ibarra','2987654',NULL,'CISIC',1,0,NULL),(69,'1099955555',NULL,'Juan','Morales','Ibarra','0987654654',NULL,'CISIC',1,0,NULL),(70,'102233546',NULL,'Úrsula','Rivadeneira','Ibarra','0968654567',NULL,'CIME',1,0,NULL),(71,'1056599921',NULL,'Hugo','Conde','Cotacachi','0954322345',NULL,'CISIC',1,0,NULL),(72,'1099656473',NULL,'Galo','Chavez','Ibarra','0854665654',NULL,'Quito',2,0,NULL),(73,'1076563287',NULL,'Cristian','Orbes','Imantag','0943456786',NULL,'CIME',1,0,NULL),(74,'1063345677',NULL,'Anibal','Orbes','Ibarra','0954334564',NULL,'CISIC',1,2,NULL),(75,'1056789876',NULL,'Patricio','Orbes','Ibarra','0965434565',NULL,'CISIC',1,3,NULL),(76,'1007567638',NULL,'Daniel','Cañarejo','Ibarra','0911111111',NULL,'CISIC',1,1,NULL),(77,'1008883991',NULL,'Roberto','Gómez','Ibarra','0988871122',NULL,'CISIC',1,0,NULL),(78,'1003789878',NULL,'María ','Bolaños','Cotacachi','0954354112',NULL,'CISIC',1,0,NULL),(79,'1003823845',NULL,'José','Chavez','Cotacachi','0988711233',NULL,'CIME',1,1,NULL),(80,'1003867899',NULL,'Víctor','Portilla','Atuntaqui','0953654757',NULL,'CIERCOM',1,0,NULL),(81,'1008475674',NULL,'Ivan','Torres','Cotacachi','0991355665',NULL,'CISIC',1,1,NULL),(82,'1002222299',NULL,'Verónica','Yepez','Cotacachi','0928786567',NULL,'CISIC',1,1,NULL),(83,'1009999338',NULL,'Llerena','Lita','Imantag','0946738272',NULL,'CIERCOM',1,0,NULL),(84,'1008658789',NULL,'Alberto','Orbes','Otavalo','0987655678',NULL,'Otavalo',2,1,NULL),(85,'1008456837',NULL,'Ximena','Flores','Cotacachi','0984321777',NULL,'CISIC',1,1,NULL),(86,'1008883838',NULL,'Carlos','Méndez','Ibarra','0956273891',NULL,'CISIC',1,0,NULL),(87,'1004857442',NULL,'Andrés','García','Cotacachi','0987655678',NULL,'CIERCOM',1,0,NULL),(88,'1007563421',NULL,'Israel','García','Cotacachi','0987654456',NULL,'Cotacachi',2,0,NULL),(89,'1009992871',NULL,'Alison','Guerra','Ibarra','0987655673',NULL,'CISIC',1,1,NULL),(90,'1099883312',NULL,'Alexander','Savedra','Otavalo','0964658929',NULL,'CIME',1,3,NULL),(91,'1008823454',NULL,'Oswaldo','Orbes','Imantag','0933367621',NULL,'CISIC',1,0,NULL),(92,'1008684767',NULL,'Inés','Piñan','Ibarra','0956787655',NULL,'CISIC',1,0,NULL),(93,'1005676511',NULL,'Zacarías','Maldonado','Otavalo','0954456776',NULL,'CIME',1,0,NULL),(94,'1007544354',NULL,'Daniel','Maigua','Otavalo','0965434564',NULL,'CISIC',1,1,NULL),(95,'1004378928',NULL,'Cristian','Lita','Otavalo','0987646564',NULL,'CIME',1,1,NULL),(96,'1004452819',NULL,'Nancy','Ordoñes','Ibarra','0955456711',NULL,'CISIC',1,1,NULL),(97,'1006785421',NULL,'Esteban','Andrade','Cotacachi','0957564544',NULL,'CISIC',1,1,NULL),(98,'1005235362',NULL,'Walter','Terán','Imantag','0987654567',NULL,'CIME',1,1,NULL),(99,'1005563455',NULL,'David','Menacho','Cotacachi','0987646533',NULL,'CIERCOM',1,1,NULL),(100,'1006535678',NULL,'Carlos','Perez','Ibarra','0965345674',NULL,'CISIC',1,1,NULL);

#
# Data for table "persona_frg1"
#

INSERT INTO `persona_frg1` (`ID`,`FOTO`) VALUES (4,NULL),(10,NULL),(11,NULL),(15,NULL),(31,NULL);

#
# Data for table "persona_frg2"
#

INSERT INTO `persona_frg2` (`ID`,`CEDULA`,`RUC`,`NOMBRES`,`APELLIDOS`,`DIRECCION`,`TELEFONO`,`TITULOS_ACADEMICOS`,`LUGAR_TRABAJO`,`TIPO_PERSONA`,`NRO_CURSOS_APROBADOS`) VALUES (4,'1007822358',NULL,'Juan','Alvarez','Ibarra','0986321566','Ingeniero en Sistema','FICA',3,0),(10,'1004486566',NULL,'Pedro','Ruales','Ibarra','0943111122','Ingeniero Industrial','FICA',3,0),(11,'1003822330',NULL,'Martin','Lopez','Ibarra','098761833','Ingeniero Mecatronico','FICA',3,0),(15,'1004567890',NULL,'Pablo','Mendez','Atuntaqui','0987451933','Ingeniero en Sistema','FICA',3,0),(31,'1003456789',NULL,'Fabián','Ortiz','Ibarra','0987654564','Ingeniero en Redes Y Telecomunicaciones','UTN',3,0);
