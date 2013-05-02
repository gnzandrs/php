create table persona (

rut			varchar(100) NOT NULL,
nombre		varchar(100) NOT NULL,
telefono	int NOT NULL,
foto		BLOB NOT NULL,
tipo_foto	VARCHAR(10) NOT NULL,

PRIMARY KEY (rut)

);