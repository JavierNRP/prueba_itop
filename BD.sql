DROP database IF EXISTS BD_prueba_itop;
CREATE database BD_prueba_itop;

USE BD_prueba_itop;


CREATE TABLE entity (
	id INT NOT NULL AUTO_INCREMENT,
	borrado boolean,
	fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,
	fecha_modificacion DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
);

INSERT INTO entity (borrado) 
	VALUES (false),(false),(false),(true),(false),(true),(false);
	-- Ids 1-7 --
	

CREATE TABLE potenciales (
	id INT NOT NULL UNIQUE,
	nombre VARCHAR(30),
	apellido VARCHAR(30),
	dni CHAR(9) UNIQUE,
	estado VARCHAR(30),
	PRIMARY KEY (id),
	FOREIGN KEY (id) REFERENCES Entity (id) ON DELETE  CASCADE
);

INSERT INTO potenciales (id, nombre, apellido, dni) VALUES
	(1, 'Javier', 'Rodriguez', '54060693K'),
	(2, 'Prueba', 'Perez', '36705673L'),
	(4, 'Alvaro', 'del Castillo', '41354006Y'),
	(7, 'Juliana', 'Smith', '70123360V');


CREATE TABLE actividades (
	id INT NOT NULL UNIQUE,
	nombre VARCHAR(30) NOT NULL,
	descripcion VARCHAR(200),
	fecha DATETIME,
	PRIMARY KEY (id),
	FOREIGN KEY (id) REFERENCES Entity (id) ON DELETE  CASCADE
);

INSERT INTO actividades (id, nombre, fecha) VALUES
	(3, 'DAW', '2021-02-10'),
	(5, 'ASIR', '2020-04-27'),
	(6, 'Charla', '2020-09-09');


CREATE TABLE entityrel (
	pot_id INT NOT NULL,
	act_id INT NOT NULL,
	PRIMARY KEY (pot_id, act_id),
	FOREIGN KEY (pot_id) REFERENCES potenciales (id) ON DELETE  CASCADE,
	FOREIGN KEY (act_id) REFERENCES actividades (id) ON DELETE  CASCADE
);

INSERT INTO entityrel (pot_id, act_id) 
	VALUES (1,3),(1,6),(2,3),(2,5),(2,6),(4,6),(7,3);


/**/