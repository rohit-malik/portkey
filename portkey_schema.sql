create table authentication (
	user_id integer unsigned auto_increment not null unique,
	user_name varchar(40) not null,
	password varchar(40) not null,
	PRIMARY KEY(user_id)
);

create table user_info (
	user_id integer unsigned not null unique,
	first_name varchar(40),
	last_name varchar(40),
	year varchar(40),
	branch varchar(40),
	PRIMARY KEY (user_id),
	FOREIGN KEY (user_id) REFERENCES authentication (user_id) ON DELETE RESTRICT ON UPDATE CASCADE
);

create table pool (
	pool_id integer unsigned auto_increment not null unique,
	destination varchar(40),
	source varchar(40),
	time_departure varchar(40),
	PRIMARY KEY (pool_id)
);

create table pool_connect (
	id integer unsigned not null unique auto_increment,
	user_id integer unsigned not null,
	pool_id integer unsigned not null,
	PRIMARY KEY(id),
	FOREIGN KEY (user_id) REFERENCES user_info (user_id) ON DELETE RESTRICT ON UPDATE CASCADE,
	FOREIGN KEY (pool_id) REFERENCES pool (pool_id)  ON DELETE RESTRICT ON UPDATE CASCADE
);

