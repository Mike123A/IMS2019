

CREATE TABLE `almacen_productos` (
  `idMovAlm` int(11) NOT NULL AUTO_INCREMENT,
  `FechaMov` date NOT NULL,
  `idProducto` int(11) NOT NULL,
  `tipo_movimiento` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idMovAlm`),
  KEY `idProducto` (`idProducto`),
  CONSTRAINT `almacen_productos_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `cat_productos` (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO almacen_productos VALUES("1","0000-00-00","2","Entrada","10");
INSERT INTO almacen_productos VALUES("2","0000-00-00","1","Salida","50");
INSERT INTO almacen_productos VALUES("3","0000-00-00","1","Entrada","10");
INSERT INTO almacen_productos VALUES("4","0000-00-00","1","Entrada","10");
INSERT INTO almacen_productos VALUES("5","0000-00-00","1","Entrada","15");
INSERT INTO almacen_productos VALUES("6","2019-05-13","1","Entrada","15");
INSERT INTO almacen_productos VALUES("7","2019-05-16","7","Entrada","10");
INSERT INTO almacen_productos VALUES("8","2019-05-16","2","Salida","10");



CREATE TABLE `cat_clientes` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCli` varchar(80) NOT NULL,
  `Apellido1Cli` varchar(30) NOT NULL,
  `Apellido2Cli` varchar(30) NOT NULL,
  `DireccionCli` varchar(80) NOT NULL,
  `TelefonoCli` varchar(10) NOT NULL,
  `CorreoCli` varchar(50) NOT NULL,
  `RFC` varchar(15) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idCliente`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO cat_clientes VALUES("1","Addy","Tun","Dzib","C30 #526 Col. Pacabtun","9991474849","addy@live.com.mx","Addy147851458","5");
INSERT INTO cat_clientes VALUES("2","Mauricio","Pat","Mena","C30 #526 Col. Pacabtun","7788554477","pruba@hotmail.com","56416384s","24");
INSERT INTO cat_clientes VALUES("3","Maria Jose","Uc","Pech","C 845 #78 x 7 y 9A San Ramon Norte","9988776655","maria@live.com.mx","46s8d4a53sd4asd","26");
INSERT INTO cat_clientes VALUES("4","Maria Jose","Uc","Pech","C 845 #78 x 7 y 9A San Ramon Norte","2135468784","ksdjashdlads@sdnaksd.com","46s8d4a53sd4asd","27");



CREATE TABLE `cat_empleados` (
  `idEmpleado` int(10) NOT NULL AUTO_INCREMENT,
  `NombresEmp` varchar(40) NOT NULL,
  `Apellido1Emp` varchar(40) NOT NULL,
  `Apellido2Emp` varchar(30) NOT NULL,
  `FechaNacEmp` date NOT NULL,
  `CorreoEmp` varchar(30) NOT NULL,
  `DireccionEmp` varchar(40) NOT NULL,
  `TelefonoEmp` varchar(10) NOT NULL,
  `FechaContEmp` date NOT NULL,
  `idUsuario` int(10) NOT NULL,
  PRIMARY KEY (`idEmpleado`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

INSERT INTO cat_empleados VALUES("1","Miguel Angel","Gomez","Crespo","1996-10-11","miguelgomez_@live.com.mx","C 3 # 76a x 6 y 8 Col. San Antonio Cinta","9991416297","2019-02-07","1");
INSERT INTO cat_empleados VALUES("2","Mauricio","Pat","Mena","0000-00-00","mauricio@live.com.mx","C30 #526 Col. Pacabtun","9991474800","0000-00-00","2");
INSERT INTO cat_empleados VALUES("3","Victor Alfredo","Pool","Ac","1990-11-11","victoralfredo@hotmail.com","C49 #14 Col. Centro","9988777744","2019-02-07","3");
INSERT INTO cat_empleados VALUES("14","David","Pastrana","Solis","1995-02-11","JoseAlberto@hotmail.com","C 845 #78 x 7 y 9A San Ramon Norte","9991474849","2019-02-07","15");
INSERT INTO cat_empleados VALUES("15","Juanito","Escarchado","segundo","1999-11-11","miguelgomez_@live.com","C 845 #78 x 7 y 9A San Ramon Norte","7788877777","1922-02-07","16");
INSERT INTO cat_empleados VALUES("16","miguel","","","0000-00-00","","","","0000-00-00","1");
INSERT INTO cat_empleados VALUES("17","Miguel","","","0000-00-00","","","","0000-00-00","1");
INSERT INTO cat_empleados VALUES("18","Miguel","","","0000-00-00","","","","0000-00-00","19");
INSERT INTO cat_empleados VALUES("19","Miguel ","asdasd","sdasd","2018-11-11","miguelgomez_@live.com.mx","","","0000-00-00","1");
INSERT INTO cat_empleados VALUES("20","asd","","","0000-00-00","","","","0000-00-00","1");
INSERT INTO cat_empleados VALUES("21","sadasd","","","0000-00-00","","","","0000-00-00","1");
INSERT INTO cat_empleados VALUES("22","Miguelito","Pampas","Brasil","1996-10-11","pampas@hotmail.com","C30 #526 Col. Pacabtun","9988776655","2019-02-02","23");
INSERT INTO cat_empleados VALUES("23","asd","nkon","oknkon","1996-11-11","miguelgomez_@live.com.mx1","asdasd","9991416297","1996-10-10","25");



CREATE TABLE `cat_productos` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `NombreProd` varchar(50) NOT NULL,
  `AltoProd` int(5) NOT NULL,
  `AnchoProd` int(5) NOT NULL,
  `PesoProd` int(5) NOT NULL,
  `DescripcionProd` varchar(300) NOT NULL,
  `ImagenProd` varchar(40) NOT NULL,
  `PrecioProd` float NOT NULL,
  `StockProd` int(11) NOT NULL,
  `estado` varchar(4) NOT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO cat_productos VALUES("1","Relo","8","18","240","Relog para caballero","img_86ce0955dadcd361b9d4b18d2a2ea6dd.png","2595.68","110","Alta");
INSERT INTO cat_productos VALUES("2","Teclado","20","25","850","Blanco con negro","img_69b91182aa3d942e5bda962cab3f926e.png","1599","60","Alta");
INSERT INTO cat_productos VALUES("3","Telfono","18","10","210","celular blanco","img_f100398683b0c5edeb04d05a34de14b8.png","5999.99","100","Alta");
INSERT INTO cat_productos VALUES("4","Reloj1234","12","14","240","","img_06d4cadec9891cfb97a4fa5644719882.png","145","150","Alta");
INSERT INTO cat_productos VALUES("5","Reloj 1231","12","14","240","","img_48e9035bbbdd63cd1bd957ae427a49e6.png","145","150","Alta");
INSERT INTO cat_productos VALUES("6","Reloj 123114587","14","15","14","HEY","img_dc337b9ada3b499959011541798e9c94.png","145","0","Alta");
INSERT INTO cat_productos VALUES("7","NUEVO!"#","14","15","14","HEY","img_ea83df1a405dc5680e557a4a91074a83.png","145","110","Alta");
INSERT INTO cat_productos VALUES("8","Sistem Biomedica","14","15","245","HOLA","img_54d78453390b5fdae2db2bcea55bb4c3.png","145","145","Baja");



CREATE TABLE `cat_tipousuarios` (
  `idtusuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipousuario` varchar(20) NOT NULL,
  PRIMARY KEY (`idtusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO cat_tipousuarios VALUES("1","Admin");
INSERT INTO cat_tipousuarios VALUES("2","Recursos Humanos");



CREATE TABLE `cat_usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(10) NOT NULL,
  `Contrasenia` varchar(32) NOT NULL,
  `idtusuario` int(11) NOT NULL,
  `estado` varchar(4) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `idtusuario` (`idtusuario`),
  KEY `idtusuario_2` (`idtusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

INSERT INTO cat_usuarios VALUES("1","Admin158","Pass74159","1","Alta");
INSERT INTO cat_usuarios VALUES("2","jesus1234","jesus1234","2","Alta");
INSERT INTO cat_usuarios VALUES("3","Vic159753","Vic159753","3","Alta");
INSERT INTO cat_usuarios VALUES("5","addy","addy","0","Alta");
INSERT INTO cat_usuarios VALUES("15","User123","Contr12345","3","Alta");
INSERT INTO cat_usuarios VALUES("16","sdasdasd","asdasdasd","3","Alta");
INSERT INTO cat_usuarios VALUES("17","Admin158","","1","Alta");
INSERT INTO cat_usuarios VALUES("18","Admin158","","1","Alta");
INSERT INTO cat_usuarios VALUES("19","prueba123","","1","Alta");
INSERT INTO cat_usuarios VALUES("20","Admin158","","1","Alta");
INSERT INTO cat_usuarios VALUES("21","Admin158","","1","Alta");
INSERT INTO cat_usuarios VALUES("22","Admin158","","1","Alta");
INSERT INTO cat_usuarios VALUES("23","usER12AA","contra123","1","Alta");
INSERT INTO cat_usuarios VALUES("24","Asdanksldm","AMiS145974","0","Alta");
INSERT INTO cat_usuarios VALUES("25","mdfpmsd","Admin12345","5","Alta");
INSERT INTO cat_usuarios VALUES("26","Uasbdkjasd","Amisbaosd4","0","Alta");
INSERT INTO cat_usuarios VALUES("27","aihsbdkjah","sdlaj51daA","0","Alta");



CREATE TABLE `detalle_venta` (
  `idDetalleVentas` int(11) NOT NULL AUTO_INCREMENT,
  `idVenta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` int(11) NOT NULL,
  PRIMARY KEY (`idDetalleVentas`),
  KEY `idVenta` (`idVenta`),
  KEY `idProducto` (`idProducto`),
  CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`idVenta`) REFERENCES `ventas` (`idVenta`),
  CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `cat_productos` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `ventas` (
  `idVenta` int(11) NOT NULL AUTO_INCREMENT,
  `FechaVenta` date NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `totalVenta` int(11) NOT NULL,
  `estadoVenta` varchar(15) NOT NULL,
  PRIMARY KEY (`idVenta`),
  KEY `idCliente` (`idCliente`),
  KEY `idEmpleado` (`idEmpleado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO ventas VALUES("1","2019-05-18","0","0","0","");
INSERT INTO ventas VALUES("2","2019-05-18","0","0","0","");
INSERT INTO ventas VALUES("3","2019-05-18","0","0","0","");
INSERT INTO ventas VALUES("4","2019-05-18","0","0","0","");

