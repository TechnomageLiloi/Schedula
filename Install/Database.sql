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