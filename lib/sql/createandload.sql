drop database if exists article_db;
create database article_db;

use article_db;

drop table if exists users;
drop table if exists article;

create table users(
  user_id int(50) NOT NULL AUTO_INCREMENT,
  username varchar(40) unique not null,
  firstname varchar(40) not null,
  lastname varchar(40) not null,
  password varchar(255) not null,
  primary key (user_id)
)ENGINE=InnoDB, DEFAULT CHARACTER SET utf8;

create table article(
  article_id int(100) NOT NULL AUTO_INCREMENT,
  title varchar(255) not null,
  content varchar(1000) not null,
  user_id int,
  created_date timestamp,
  primary key (article_id),
  foreign key (user_id) references users(user_id)
)ENGINE=InnoDB, DEFAULT CHARACTER SET utf8;



/*To insert data into tables*/
/*password for user1 is 'password'*/
/*password for user2 is '1234'*/
insert into users (username,firstname,lastname,password) values ("User1","Jon","Smith","$2y$10$ooV7YV9FZXMVYwp6Bxz5MOMA9sKVzm3VY8iJTTnfTc7t3tj9BRGbK");
insert into users (username,firstname,lastname,password) values ("User2","Jane","Doe","$2y$10$wkSoT3noyNLcDPMfc4fV1ees0csAf5dubeIKRJ6PCUAPGnUmaajG.");

insert into article (title,content,user_id) values ("This is an article title","this is
  content for the first article title. Suspendisse cursus cursus lectus. In hac
  habitasse platea dictumst. Nam ac sollicitudin massa. Maecenas consequat molestie
  purus, et sodales metus rutrum a. Donec ut urna in metus lobortis consequat ut eget nunc","2");
insert into article (title,content,user_id) values ("A second Title","this is content for the second article title.
  Donec nec efficitur orci, quis blandit ipsum. Etiam suscipit sem ac nisl facilisis bibendum.
  Vestibulum vitae commodo eros. Maecenas laoreet urna quis dolor consequat, at facilisis ligula faucibus.
  Fusce posuere id magna sed mollis. Aliquam aliquam ut lacus nec mollis.","1");
