CREATE TABLE MEMBER (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	firstname VARCHAR(20) NOT NULL,
	lastname VARCHAR(20) NOT NULL,
	email VARCHAR(60) NOT NULL, 
	birthday DATE NOT NULL, 
	gender ENUM('M', 'F') NOT NULL, 
	`password` VARCHAR(50) NOT NULL,
	pre74 INT NOT NULL,
	post74 INT NOT NULL,
    picture VARCHAR(60)
);

CREATE TABLE COMMUNITY (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	`name` VARCHAR(20) NOT NULL
);

CREATE TABLE `SUBJECT` (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	title VARCHAR(20) NOT NULL,
	content TEXT NOT NULL,
	`datetime` DATETIME NOT NULL, 
	`view` INT NOT NULL, 
	community INT NOT NULL,
	member INT NOT NULL    
);

ALTER TABLE `SUBJECT`
ADD FOREIGN KEY (community)
REFERENCES COMMUNITY(id);

ALTER TABLE `SUBJECT`
ADD FOREIGN KEY (member)
REFERENCES MEMBER(id);

CREATE TABLE REPLY (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	`subject` INT NOT NULL,
	content TEXT NOT NULL,
	`datetime` DATETIME NOT NULL, 
	member INT NOT NULL    
);

ALTER TABLE REPLY
ADD FOREIGN KEY (`subject`)
REFERENCES `SUBJECT`(id);

ALTER TABLE REPLY
ADD FOREIGN KEY (member)
REFERENCES MEMBER(id);

CREATE TABLE `EVENT` (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    title VARCHAR(20) NOT NULL,
    `type` ENUM('memoir','article','property','photo') NOT NULL,
    content VARCHAR(800) NOT NULL,
    `datetime` DATETIME NOT NULL,
    `date` DATE NOT NULL,
    `view` INT NOT NULL, 
	`like` INT NOT NULL,
    member INT NOT NULL,
    tags TEXT,
    FULLTEXT(title, tags)
);

ALTER TABLE `EVENT`
ADD FOREIGN KEY (member)
REFERENCES MEMBER(id);

CREATE TABLE MARKER(
	`event` INT NOT NULL PRIMARY KEY,
	lng FLOAT(10,6) NOT NULL,
    lat FLOAT(10,6) NOT NULL
);

ALTER TABLE MARKER
ADD FOREIGN KEY (`event`)
REFERENCES `EVENT`(id);

CREATE TABLE `COMMENT` (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	`event` INT NOT NULL, 
	content TEXT NOT NULL,
	`datetime` DATETIME NOT NULL, 
	member INT NOT NULL    
);

ALTER TABLE `COMMENT`
ADD FOREIGN KEY (`event`)
REFERENCES `EVENT`(id);

ALTER TABLE `COMMENT`
ADD FOREIGN KEY (member)
REFERENCES MEMBER(id);

CREATE TABLE `NOTIFICATION` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`member` INT NOT NULL,
	`owner` INT NOT NULL, 
	`event` INT NOT NULL, 
	`status` ENUM('seen','unseen') NOT NULL, 
	`type` INT NOT NULL, 
	`datetime` DATETIME NOT NULL, 
	PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=1126 DEFAULT CHARSET=utf8;

CREATE TABLE `ROAD` (
	`id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(20) NOT NULL,
    `path` TEXT NOT NULL, 
	PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=1126 DEFAULT CHARSET=utf8;

ALTER TABLE `NOTIFICATION`
ADD FOREIGN KEY (member)
REFERENCES MEMBER(id);

ALTER TABLE `NOTIFICATION`
ADD FOREIGN KEY (`owner`)
REFERENCES MEMBER(id);

ALTER TABLE `NOTIFICATION`
ADD FOREIGN KEY (`event`)
REFERENCES `EVENT`(id);

CREATE TABLE `ROAD_COMMENT` (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	`road` INT NOT NULL, 
	content TEXT NOT NULL,
	`datetime` DATETIME NOT NULL, 
	member INT NOT NULL    
);

ALTER TABLE `ROAD_COMMENT`
ADD FOREIGN KEY (`road`)
REFERENCES `ROAD`(id);

ALTER TABLE `ROAD_COMMENT`
ADD FOREIGN KEY (member)
REFERENCES MEMBER(id);
