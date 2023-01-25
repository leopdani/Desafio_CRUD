CREATE DATABASE CRUDSystem;
use CRUDSystem;

Create TABLE CRUDTable(
	id int not null AUTO_INCREMENT PRIMARY key,
    nome varchar(40),
    lastName varchar(40),
    email varchar(40),
    pass varchar(40)
    
    );

SELECT * FROM crudtable;

ALTER TABLE crudtable 
RENAME COLUMN nome TO name;

