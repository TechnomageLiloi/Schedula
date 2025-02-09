create table schedula_logs
(
    key_log bigint unsigned auto_increment,
    ts timestamp not null,
    tags varchar(1000) not null,
    data json not null,
    constraint schedula_logs_pk
        primary key (key_log)
);

create table schedula_config
(
    key_config varchar(100) not null,
    data json not null,
    constraint schedula_config_pk
        primary key (key_config)
);

create table schedula_road
(
    key_day date,
    program text not null,
    data json not null,
    constraint schedula_road_pk
        primary key (key_day)
);

create table schedula_problems
(
    key_problem bigint unsigned auto_increment,
    title varchar(100) not null,
    status tinyint unsigned default 1 not null,
    program text not null,
    data json not null,
    constraint schedula_problems_pk
        primary key (key_problem)
);

insert into schedula_problems(title, program, data) values ('Welcome to Schedula!', '-', '{}');

create table schedula_shots
(
    key_day date not null,
    key_hour tinyint unsigned not null,
    key_quarter tinyint unsigned not null,
    key_problem bigint unsigned not null,
    title varchar(100) not null,
    status tinyint unsigned default 1 not null,
    karma smallint signed default 0 not null,
    constraint schedula_shots_pk
        primary key (key_day, key_hour, key_quarter),
    constraint schedula_shots_schedula_road_key_day_fk
        foreign key (key_day) references schedula_road (key_day)
            on update cascade on delete cascade,
    constraint schedula_shots_schedula_problems_key_problem_fk
        foreign key (key_problem) references schedula_problems (key_problem)
            on update cascade on delete cascade
);

