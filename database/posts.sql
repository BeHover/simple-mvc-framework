create table posts
(
    id         int(11) unsigned auto_increment primary key,
    title      varchar(255)                       null,
    body       varchar(255)                       null,
    user       varchar(255)                       null,
    button     varchar(255)                       null,
    created_at datetime default CURRENT_TIMESTAMP not null
)
    collate = utf8mb4_unicode_ci;