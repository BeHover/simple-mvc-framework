create table users
(
    id         int(11) unsigned auto_increment primary key,
    email      varchar(255)                        null,
    password   varchar(24)                         null,
    position   varchar(9)                          null,
    created_at timestamp default CURRENT_TIMESTAMP not null,
    updated_at timestamp default CURRENT_TIMESTAMP not null on update CURRENT_TIMESTAMP
)
    collate = utf8mb4_unicode_ci;

INSERT INTO test.users (id, email, password, position, created_at, updated_at) VALUES (1, 'boss1@mail.com', 'boss1!', 'Boss', '2022-08-22 15:31:27', '2022-08-22 15:31:27');
INSERT INTO test.users (id, email, password, position, created_at, updated_at) VALUES (2, 'manager1@mail.com', 'manager1!', 'Manager', '2022-08-22 15:32:58', '2022-08-22 15:32:58');
INSERT INTO test.users (id, email, password, position, created_at, updated_at) VALUES (3, 'manager2@mail.com', 'manager2!', 'Manager', '2022-08-22 15:33:43', '2022-08-22 15:33:43');
INSERT INTO test.users (id, email, password, position, created_at, updated_at) VALUES (4, 'performer1@mail.com', 'performer1!', 'Performer', '2022-08-22 15:34:27', '2022-08-22 15:34:27');
INSERT INTO test.users (id, email, password, position, created_at, updated_at) VALUES (5, 'performer2@mail.com', 'performer2!', 'Performer', '2022-08-22 15:34:44', '2022-08-22 15:34:44');
INSERT INTO test.users (id, email, password, position, created_at, updated_at) VALUES (6, 'performer3@mail.com', 'performer3!', 'Performer', '2022-08-22 15:34:58', '2022-08-22 15:34:58');