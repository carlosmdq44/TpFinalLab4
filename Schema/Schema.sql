CREATE DATABASE worldwork;

USE worldwork;

CREATE TABLE company (
	companyId INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  cuit NVARCHAR(12) NOT NULL,
  companyName NVARCHAR(50) NOT NULL,
  companyCity VARCHAR(50) NOT NULL,
  companyDescription DATE NOT NULL,
  companyEmail DATE NOT NULL,
  companyPhoneNumber NVARCHAR(20) NOT NULL,
  constraint unq_cuit unique (cuit)
)Engine=InnoDB;

CREATE TABLE career (
	careerId int auto_increment not null primary key,
    description NVARCHAR(100) NOT NULL
    active NVARCHAR(20) NOT NULL
)Engine=InnoDB;

CREATE TABLE job (
	jobPositionId int auto_increment not null primary key,
    careerId int,
    constraint fk_careerId foreign key (careerId) references careers (careerId)
    description NVARCHAR(100) NOT NULL,
)Engine=InnoDB;

CREATE TABLE user (
	email NVARCHAR(50) NOT NULL,
    password NVARCHAR(50) NOT NULL,
    constraint unq_email unique (email)
)Engine=InnoDB;

CREATE TABLE jobOffer (
    jobOfferId int auto_increment not null primary key,
    publishedDate date,
    finishDate date,
    task NVARCHAR(50) NOT NULL,
    skills NVARCHAR(50) NOT NULL,
    salary float,
    jobPositionId int,
    companyId int,
    constraint fk_jobPositionId foreign key (jobPositionId) references job (jobPositionId),
    constraint fk_companyId foreign key (companyId) references company (companyId)
)Engine=InnoDB;

alter table careers 
add active boolean;