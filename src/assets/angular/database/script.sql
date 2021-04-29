CREATE DATABASE project;

CREATE TABLE productos (
  codigo int PRIMARY KEY AUTO_INCREMENT,
  descripcion varchar(50),
  marca varchar(50),
  precio decimal(10, 2),
  stock int (10)
);

ALTER TABLE productos CONVERT TO CHARACTER SET utf8mb4;

INSERT INTO productos (codigo,descripcion,marca,precio,stock) VALUES (null,'ThinkPad T14','Lenovo',5199,20),(null,'Legion 7i','Lenovo',8999,10);