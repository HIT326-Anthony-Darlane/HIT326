use article_db;
/*password for user1 is 'password'*/
/*password for Jane227 is '1234'*/
insert into users (username,firstname,lastname,password) values ("JonSmith","Jon","Smith","$2y$10$ooV7YV9FZXMVYwp6Bxz5MOMA9sKVzm3VY8iJTTnfTc7t3tj9BRGbK");
insert into users (username,firstname,lastname,password) values ("Jane227","Jane","Doe","$2y$10$wkSoT3noyNLcDPMfc4fV1ees0csAf5dubeIKRJ6PCUAPGnUmaajG.");

insert into article (article_id,title,content,user_id) values ("1","Charles Darwin University",
"Darwin Community College, founded in 1974 and renamed Darwin Institute of Technology in 1984,
was a combined College of Advanced Education and a TAFE College. It was situated on what is now
the Casuarina Campus, although it used other buildings at various times in Darwin. By the time
of the formation of the Northern Territory University, it gave degrees in arts, education, business and applied science","1");
insert into article (article_id,title,content,user_id) values ("2","Jane Doe",
"Jane Doe is someone whose name can't legally be used, or who simply doesn't want it used. In the case of a man,
you'd call him John Doe. The need for a placeholder name comes up
from time to time in legal cases — and sometimes people
use the term Jane Doe to mean an average, ordinary woman,
or an unidentified patient or crime victim. John Doe has been used since the mid-1700's, with Jane Doe following soon after.","2");


insert into tag (tag_id,tag) values ("1","cool");
insert into tag (tag_id,tag) values ("2","funny");
insert into tag (tag_id,tag) values ("3","bad");
insert into tag (tag_id,tag) values ("4","mystery");

insert into tagging(article_id,tag_id) values ("1","2");
insert into tagging(article_id,tag_id) values ("1","3");
insert into tagging(article_id,tag_id) values ("2","4");
