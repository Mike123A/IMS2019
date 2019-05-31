

CREATE TABLE `almacen_productos` (
  `idMovAlm` int(11) NOT NULL AUTO_INCREMENT,
  `FechaMov` date NOT NULL,
  `idProducto` int(11) NOT NULL,
  `tipo_movimiento` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idMovAlm`),
  KEY `idProducto` (`idProducto`),
  CONSTRAINT `almacen_productos_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `cat_productos` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




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

INSERT INTO cat_clientes VALUES("1","Juan Carlos","Ramires","Torres","Calle 74 #458 Col. Mejorada","9991474747","JuanCaraa1@hotmail.com","","11");
INSERT INTO cat_clientes VALUES("2","Addy","Tun","Dzib","C 3 # 76a x 6 y 8 Col. San Antonio Cinta","9991416297","addy@live.com.mx","","12");
INSERT INTO cat_clientes VALUES("3","Maria Jose","Solis","Pech","Calle 47 #48 Col. Miraflores","9995585857","maria@hotmail.com","","13");
INSERT INTO cat_clientes VALUES("4","Maria","Cocom","Uc","C 147 #439 Col. San Jose Tecoh","9991687514","MariaUc@live.com.mx","","14");



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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO cat_empleados VALUES("1","Miguel Angel","Gomez","Crespo","1996-10-11","miguelgomez_@live.com.mx","C 3 # 76a x 6 y 8 Col. San Antonio Cinta","9991416297","2019-02-07","1");
INSERT INTO cat_empleados VALUES("2","Jesus Manuel","Nah","Cocom","1988-12-31","spin3112@gmail.com","C30 #526 Col. Pacabtun","9996387817","2019-02-07","2");
INSERT INTO cat_empleados VALUES("3","Victor Alfredo","Pool","Ac","1990-08-30","victoralfredo@hotmail.com","C 845 #78 x 7 y 9A San Ramon Norte","9991161834","2019-02-07","3");
INSERT INTO cat_empleados VALUES("4","Alan","Crespo","Caamal","1995-10-20","alan@live.com.mx","C30 #526 Col. Maya","9995787455","1996-02-07","4");
INSERT INTO cat_empleados VALUES("5","Daniel","Solis","Can","1992-06-15","DanSoli@live.com.mx","C304 #56 Col. Pacabtun","9991414141","2019-02-07","5");
INSERT INTO cat_empleados VALUES("6","Joel","May","May","1990-12-11","JuelSas1478@live.com.mx","C 80 #478 Col. Mejorada","9997848484","2019-02-07","6");
INSERT INTO cat_empleados VALUES("7","Angel","Uc","Pech","1997-11-25","angel@hotmail.com","C5 #547 Col. Diaz Ordaz","9999574787","2019-02-07","7");
INSERT INTO cat_empleados VALUES("8","Mariano","Pat","Mena","1997-08-11","Mariano@gmail.com","C47 # 748 Col. Diaz Ordaz","9996656362","1997-07-07","8");
INSERT INTO cat_empleados VALUES("9","Bernardo","Saenz","Polanco","1980-08-14","Bernar@live.com.mx","C478 S/N Col. Madero","9997747512","2019-02-07","9");
INSERT INTO cat_empleados VALUES("10","Edgar Antonio","Avalos","Martin","1991-04-11","Edgar@live.com.mx","C478 #478 Col. Mejorada","9991111214","2019-02-07","10");



CREATE TABLE `cat_estadosventa` (
  `idEstadoVenta` int(11) NOT NULL AUTO_INCREMENT,
  `EstadoVenta` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idEstadoVenta`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO cat_estadosventa VALUES("1","Procesada");
INSERT INTO cat_estadosventa VALUES("2","Produccion");
INSERT INTO cat_estadosventa VALUES("3","Empaque");



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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO cat_productos VALUES("1","Glucheck","12","6","210","GluCheck es la solución que Innovative Medical Solutions ha desarrollado para evitar la fatiga de llevar un monitoreo de los niveles de glucosa, este es un dispositivo a través del cual se realiza el monitoreo evitando la necesidad de ocasionar una herida.","img_6befc080a12d5e71a31b475716b06c75.png","2079","100","Alta");
INSERT INTO cat_productos VALUES("2","1123","12","12","452","asdakjnsdlkas","img_d09c5555b27dd0cac2b0d85605932362.png","654","654","Alta");



CREATE TABLE `cat_tipousuarios` (
  `idtusuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipousuario` varchar(20) NOT NULL,
  PRIMARY KEY (`idtusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO cat_tipousuarios VALUES("1","Admin");
INSERT INTO cat_tipousuarios VALUES("2","Recursos Humanos");
INSERT INTO cat_tipousuarios VALUES("3","Ventas");
INSERT INTO cat_tipousuarios VALUES("4","Produccion");



CREATE TABLE `cat_usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(10) NOT NULL,
  `Contrasenia` varchar(32) NOT NULL,
  `idtusuario` int(11) NOT NULL,
  `estado` varchar(4) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `idtusuario` (`idtusuario`),
  KEY `idtusuario_2` (`idtusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO cat_usuarios VALUES("1","Admin158","22108b0f385f0c948aafa2129101d9e3","1","Alta");
INSERT INTO cat_usuarios VALUES("2","Jesusrh","3341a7f26b82e5a0449812f8f1f127c3","2","Alta");
INSERT INTO cat_usuarios VALUES("3","Victor75","2d9233a00e95217296b37241b1882156","3","Alta");
INSERT INTO cat_usuarios VALUES("4","Alan1478","e33f0966b05cae4404bc3d78898bf916","4","Alta");
INSERT INTO cat_usuarios VALUES("5","DanSCan","e7bac27557afb113488ff044680c8ce3","3","Alta");
INSERT INTO cat_usuarios VALUES("6","Joel147a","1afe3f9e18c8868f92c810bc5efdcb2e","3","Alta");
INSERT INTO cat_usuarios VALUES("7","Angel14785","598456b040babb8a3097c32fb5a86abf","4","Alta");
INSERT INTO cat_usuarios VALUES("8","Max147asd","1efa3472fabdc06d35ea783f995522ef","2","Alta");
INSERT INTO cat_usuarios VALUES("9","Bernar1475","7e6c053ab6c71f7631b843731983c9a9","4","Alta");
INSERT INTO cat_usuarios VALUES("10","EdGor147","d41d8cd98f00b204e9800998ecf8427e","1","Alta");
INSERT INTO cat_usuarios VALUES("11","JuanCar147","9b2a268b0a7eff05d3fa60a7692ffce5","0","Alta");
INSERT INTO cat_usuarios VALUES("12","Addy74","af9fbdd0cc3ebc06342ee7b2872c3f5f","0","Alta");
INSERT INTO cat_usuarios VALUES("13","Mari14782","18d9d4c735bb2df819cbf073ddc54468","0","Alta");
INSERT INTO cat_usuarios VALUES("14"," MariaUc14","be09914eb45a1eb7331a10e531c73b77","0","Alta");



CREATE TABLE `detalle_venta` (
  `idDetalleVentas` int(11) NOT NULL AUTO_INCREMENT,
  `idVenta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idDetalleVentas`),
  KEY `idVenta` (`idVenta`),
  KEY `idProducto` (`idProducto`),
  CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`idVenta`) REFERENCES `ventas` (`idVenta`),
  CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `cat_productos` (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO detalle_venta VALUES("1","1","1","10","2079.00");
INSERT INTO detalle_venta VALUES("2","2","2","6","2079.00");
INSERT INTO detalle_venta VALUES("3","3","1","1","2079.00");
INSERT INTO detalle_venta VALUES("4","4","1","1","2079.00");
INSERT INTO detalle_venta VALUES("5","4","2","1","654.00");



CREATE TABLE `ventas` (
  `idVenta` int(11) NOT NULL AUTO_INCREMENT,
  `FechaVenta` date NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `totalVenta` decimal(10,2) NOT NULL,
  `idestadoVenta` int(11) NOT NULL,
  PRIMARY KEY (`idVenta`),
  KEY `idCliente` (`idCliente`),
  KEY `idEmpleado` (`idEmpleado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO ventas VALUES("1","2019-05-28","12","1","4158.00","1");
INSERT INTO ventas VALUES("2","2019-05-31","11","2","12474.00","1");
INSERT INTO ventas VALUES("3","2019-05-31","13","1","2079.00","1");
INSERT INTO ventas VALUES("4","2019-05-31","11","0","2733.00","1");

