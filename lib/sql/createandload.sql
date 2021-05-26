drop database if exists article_db;
create database article_db;

use article_db;

drop table if exists users;
drop table if exists article;

create table users(
  user_id int NOT NULL AUTO_INCREMENT,
  username varchar(40) unique not null,
  firstname varchar(40) not null,
  lastname varchar(40) not null,
  password varchar(255) not null,
  primary key (user_id)
)ENGINE=InnoDB, DEFAULT CHARACTER SET utf8;

create table article(
  article_id varchar(255) NOT NULL,
  title varchar(255) not null,
  content varchar(1000) not null,
  created_date timestamp,
  user_id int,
  primary key (article_id),
  foreign key (user_id) references users (user_id)
)ENGINE=InnoDB, DEFAULT CHARACTER SET utf8;

create table tag(
  tag_id varchar(255) NOT NULL,
  tag varchar(50) not null,
  primary key(tag_id)
)ENGINE=InnoDB, DEFAULT CHARACTER SET utf8;

create table tagging(
  article_id varchar(255) not null,
  tag_id varchar(255) not null,
  primary key (article_id, tag_id),
  foreign key (article_id) references article (article_id) on delete cascade,
  foreign key (tag_id) references tag (tag_id) on delete cascade
)ENGINE=InnoDB, DEFAULT CHARACTER SET utf8;

/*some default data*/
/*password for user1 is 'password'*/
/*password for user2 is '1234'*/
insert into users (username,firstname,lastname,password) values ("User1","Jon","Smith","$2y$10$ooV7YV9FZXMVYwp6Bxz5MOMA9sKVzm3VY8iJTTnfTc7t3tj9BRGbK");
insert into users (username,firstname,lastname,password) values ("User2","Jane","Doe","$2y$10$wkSoT3noyNLcDPMfc4fV1ees0csAf5dubeIKRJ6PCUAPGnUmaajG.");

insert into article (article_id,title,content,user_id) values ("1","This is an article title",
"this iscontent for the first article title. Suspendisse cursus cursus lectus. In hac
habitasse platea dictumst. Nam ac sollicitudin massa. Maecenas consequat molestie
purus, et sodales metus rutrum a. Donec ut urna in metus lobortis consequat ut eget nunc","2");
insert into article (article_id,title,content,user_id) values ("2","A second Title",
"this is content for the second article title.Donec nec efficitur orci, quis blandit ipsum. Etiam suscipit
sem ac nisl facilisis bibendum. Vestibulum vitae commodo eros.
Maecenas laoreet urna quis dolor consequat, at facilisis ligula faucibus. Fusce posuere id magna sed mollis. Aliquam aliquam ut lacus nec mollis.","1");


insert into tag (tag_id,tag) values ("1","cool");
insert into tag (tag_id,tag) values ("2","funny");
insert into tag (tag_id,tag) values ("3","bad");

insert into tagging(article_id,tag_id) values ("1","2");
insert into tagging(article_id,tag_id) values ("2","3");
insert into tagging(article_id,tag_id) values ("2","1");
