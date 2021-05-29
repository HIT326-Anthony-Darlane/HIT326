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
