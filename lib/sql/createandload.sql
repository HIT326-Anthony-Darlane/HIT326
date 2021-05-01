drop database if exists article_db;
create database article_db;

use article_db;

drop table if exists author;
drop table if exists article;

create table author(
  author_id int(50) NOT NULL AUTO_INCREMENT,
  firstname varchar(40) not null,
  lastname varchar(40) not null,
  primary key (author_id)
)ENGINE=InnoDB, DEFAULT CHARACTER SET utf8;

/*create table article(
  article_id INTEGER PRIMARY KEY AUTO_INCREMENT,
  title varchar(100) not null,
  published_at  DEFAULT(datetime('now','localtime')),
  updated_at
);



--drop table if exists article;--
*/

insert into author (firstname,lastname) values ("Jon","Smith");
insert into author (firstname,lastname) values ("Jane","Doe");
