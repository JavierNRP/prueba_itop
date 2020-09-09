DROP database IF EXISTS BD_prueba_itop;
CREATE database BD_prueba_itop;

USE BD_prueba_itop;


CREATE TABLE Entity (
	id INT NOT NULL AUTO_INCREMENT,
	modulo VARCHAR(30),
	borrado boolean,
	fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,
	fecha_modificacion DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
);

INSERT INTO Entity (modulo, borrado) VALUES ('prueba', false);
	
CREATE TABLE Potenciales (
	id INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(30),
	apellido VARCHAR(30),
	dni CHAR(9),
	estado VARCHAR(30),
	PRIMARY KEY (id)
);

CREATE TABLE Actividades (
	id INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(30),
	descripcion VARCHAR(200),
	fecha DATETIME,
	PRIMARY KEY (id)
);

CREATE TABLE EntityRel (
	id INT NOT NULL AUTO_INCREMENT,
	modulo INT,
	relid INT,
	relmodulo INT,
	PRIMARY KEY (id)
);
/**/