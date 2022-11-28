drop database if exists contacts_app;

create database contacts_app;

use contacts_app;

create table contacts (
    id int auto_increment primary key,
    name varchar(255),
    phone_number varchar(255)
);

insert into contacts (name, phone_number) values ("Pepe", "1231232312");
