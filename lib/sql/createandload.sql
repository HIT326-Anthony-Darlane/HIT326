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

create table article(
  article_id int(100) NOT NULL AUTO_INCREMENT,
  title varchar(100) not null,
  content varchar(1000) not null,
  primary key (article_id)
)ENGINE=InnoDB, DEFAULT CHARACTER SET utf8;



/*To insert data into tables*/
insert into author (firstname,lastname) values ("Jon","Smith");
insert into author (firstname,lastname) values ("Jane","Doe");

insert into article (title,content) values ("This is an article title","this is
  content for the first article title. Suspendisse cursus cursus lectus. In hac
  habitasse platea dictumst. Nam ac sollicitudin massa. Maecenas consequat molestie
  purus, et sodales metus rutrum a. Donec ut urna in metus lobortis consequat ut eget nunc");
insert into article (title,content) values ("A second Title","this is content for the second article title.
  Donec nec efficitur orci, quis blandit ipsum. Etiam suscipit sem ac nisl facilisis bibendum.
  Vestibulum vitae commodo eros. Maecenas laoreet urna quis dolor consequat, at facilisis ligula faucibus.
  Fusce posuere id magna sed mollis. Aliquam aliquam ut lacus nec mollis.");
