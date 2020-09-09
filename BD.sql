DROP database IF EXISTS BD_prueba_itop;
CREATE database BD_prueba_itop;

USE BD_prueba_itop;


CREATE TABLE Entity (
	id INT NOT NULL AUTO_INCREMENT,
	borrado boolean,
	fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,
	fecha_modificacion DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
);

INSERT INTO Entity (borrado) 
	VALUES (true),(false),(false),(true),(false),(true),(false);
	-- Ids 1-7 --
	

CREATE TABLE Potenciales (
	id INT NOT NULL UNIQUE,
	nombre VARCHAR(30),
	apellido VARCHAR(30),
	dni CHAR(9) UNIQUE,
	estado VARCHAR(30),
	PRIMARY KEY (id),
	FOREIGN KEY (id) REFERENCES Entity (id) ON DELETE  CASCADE
);


CREATE TABLE Actividades (
	id INT NOT NULL UNIQUE,
	nombre VARCHAR(30),
	descripcion VARCHAR(200),
	fecha DATETIME,
	PRIMARY KEY (id),
	FOREIGN KEY (id) REFERENCES Entity (id) ON DELETE  CASCADE
);


CREATE TABLE EntityRel (
	pot_id INT NOT NULL,
	act_id INT NOT NULL,
	PRIMARY KEY (pot_id, act_id)
	FOREIGN KEY (pot_id) REFERENCES Potenciales (id) ON DELETE  CASCADE,
	FOREIGN KEY (act_id) REFERENCES Actividades (id) ON DELETE  CASCADE
);
/**/