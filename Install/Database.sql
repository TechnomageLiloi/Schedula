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
    program text null,
    data json not null,
    constraint schedula_road_pk
        primary key (key_day)
);

create table schedula_jobs
(
    key_day date not null,
    key_hour tinyint unsigned not null,
    key_quarter tinyint unsigned not null,
    title varchar(100) not null,
    status tinyint unsigned default 1 not null,
    karma smallint signed default 0 not null,
    constraint schedula_jobs_pk
        primary key (key_day, key_hour, key_quarter),
    constraint schedula_jobs_schedula_road_key_day_fk
        foreign key (key_day) references schedula_road (key_day)
            on update cascade on delete cascade
);

