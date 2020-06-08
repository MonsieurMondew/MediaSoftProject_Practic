create table uploaded_text (
    id int auto_increment,
    content mediumtext null,
    date datetime null,
    words_count int,
    constraint uploaded_pk
    primary key (id)
) engine = INNODB
  character set utf8
    collate utf8_general_ci;

create table word (
    word_id int auto_increment,
    text_id int,
    word varchar(255) null,
    count int null,
    constraint uploaded_pk
        primary key (word_id)
)engine = INNODB
 character set utf8
 collate utf8_general_ci;