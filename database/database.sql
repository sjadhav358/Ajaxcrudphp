/*create database*/
create database crud;
/*create table */

create table Record
(
    
    firstname varchar(50),
    lastname varchar(50),
    email varchar(30),
    contact varchar(50)
    
);


ALTER TABLE `record` ADD `id` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`);