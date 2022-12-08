drop database if exists contacts_app;

create database contacts_app;

use contacts_app;

create table users (
    id int auto_increment primary key,
    name varchar(255),
    email varchar(255),
    password varchar(255)
);



create table contacts (
    id int auto_increment primary key,
    name varchar(255),
    phone_number varchar(255)
);

insert into contacts (name, phone_number) values ("Pepe", "1231232312");

insert into users (name, email, password) values ("test", "test@gmail.com", "1234");


