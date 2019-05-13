

CREATE TABLE `almacen_productos` (
  `idMovAlm` int(11) NOT NULL AUTO_INCREMENT,
  `FechaMov` date NOT NULL,
  `idProducto` int(11) NOT NULL,
  `tipo_movimiento` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idMovAlm`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO almacen_productos VALUES("1","0000-00-00","2","Entrada","10");
INSERT INTO almacen_productos VALUES("2","0000-00-00","1","Salida","50");
INSERT INTO almacen_productos VALUES("3","0000-00-00","1","Entrada","10");
INSERT INTO almacen_productos VALUES("4","0000-00-00","1","Entrada","10");
INSERT INTO almacen_productos VALUES("5","0000-00-00","1","Entrada","15");
INSERT INTO almacen_productos VALUES("6","2019-05-13","1","Entrada","15");



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
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO cat_clientes VALUES("1","Addy","Tun","Dzib","C30 #526 Col. Pacabtun","9991474849","addy@live.com.mx","","5");



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
  PRIMARY KEY (`idEmpleado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO cat_empleados VALUES("1","Miguel Angel","Gomez","Crespo","1996-10-11","miguelgomez_@live.com.mx","C 3 # 76a x 6 y 8 Col. San Antonio Cinta","9991416297","2019-02-07","1");
INSERT INTO cat_empleados VALUES("2","Jesus Manuel","Nah","Cocom","1990-12-30","Jesus@hotmail.com","C30 #526 Col. Pacabtun","9999887788","2019-02-07","2");
INSERT INTO cat_empleados VALUES("3","Victor Alfredo","Pool","Ac","1990-11-11","victoralfredo@hotmail.com","C49 #14 Col. Centro","9988777744","2019-02-07","3");
INSERT INTO cat_empleados VALUES("4","Julio Cesar","Gomez","Crespo","1994-05-26","julio@hotmail.com","C30 #526 Col. Maya","9988774455","2019-02-07","4");



CREATE TABLE `cat_productos` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `NombreProd` varchar(50) NOT NULL,
  `AltoProd` int(4) NOT NULL,
  `AnchoProd` int(4) NOT NULL,
  `PesoProd` varchar(10) NOT NULL,
  `DescripcionProd` varchar(300) NOT NULL,
  `ImagenProd` varchar(40) NOT NULL,
  `PrecioProd` float NOT NULL,
  `StockProd` int(11) NOT NULL,
  `estado` varchar(4) NOT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO cat_productos VALUES("1","Reloj 123","8","18","240","Relog para caballero","img_86ce0955dadcd361b9d4b18d2a2ea6dd.png","2595.68","110","Alta");
INSERT INTO cat_productos VALUES("2","Teclado","20","25","850","Blanco con negro","img_69b91182aa3d942e5bda962cab3f926e.png","1599","70","Alta");
INSERT INTO cat_productos VALUES("3","Telfono 123456","18","10","210","celular blanco","img_f100398683b0c5edeb04d05a34de14b8.png","5999.99","100","Alta");



CREATE TABLE `cat_tipousuarios` (
  `idtusuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipousuario` varchar(20) NOT NULL,
  PRIMARY KEY (`idtusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO cat_tipousuarios VALUES("1","Admin");
INSERT INTO cat_tipousuarios VALUES("2","Recursos Humanos");
INSERT INTO cat_tipousuarios VALUES("3","Produccion");
INSERT INTO cat_tipousuarios VALUES("4","Ventas");



CREATE TABLE `cat_usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(15) NOT NULL,
  `Contrasenia` varchar(10) NOT NULL,
  `idtusuario` int(11) NOT NULL,
  `estado` varchar(4) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO cat_usuarios VALUES("1","Admin158","Pass74159","1","Alta");
INSERT INTO cat_usuarios VALUES("2","jesus1234","jesus1234","2","Alta");
INSERT INTO cat_usuarios VALUES("3","Vic159753","Vic159753","4","Alta");
INSERT INTO cat_usuarios VALUES("4","julio11597","julioA1478","4","Alta");
INSERT INTO cat_usuarios VALUES("5","addy123","Addy1478","0","Alta");



CREATE TABLE `detalle_venta` (
  `idDetalleVentas` int(11) NOT NULL AUTO_INCREMENT,
  `idVenta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` int(11) NOT NULL,
  PRIMARY KEY (`idDetalleVentas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `ventas` (
  `idVenta` int(11) NOT NULL AUTO_INCREMENT,
  `FechaVenta` date NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `totalVenta` int(11) NOT NULL,
  `estadoVenta` varchar(15) NOT NULL,
  PRIMARY KEY (`idVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


