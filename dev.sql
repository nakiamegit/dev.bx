CREATE TABLE IF NOT EXISTS author (
  ID int NOT NULL AUTO_INCREMENT,
  NAME varchar(500) NOT NULL,
  PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS publisher (
  ID int NOT NULL AUTO_INCREMENT,
  NAME varchar(500) NOT NULL,
  PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS store (
  ID int NOT NULL AUTO_INCREMENT,
  CITY varchar(500) NOT NULL,
  PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS book (
  ID int NOT NULL AUTO_INCREMENT,
  NAME varchar(500) NOT NULL,
  ISSUE_YEAR year DEFAULT NULL,
  PUBLISHER_ID int NOT NULL,
  ISBN char(17) DEFAULT NULL,
  PRIMARY KEY (ID),
  INDEX PUBLISHER_ID (PUBLISHER_ID),
  FOREIGN KEY (PUBLISHER_ID) REFERENCES publisher (ID)
);

CREATE TABLE IF NOT EXISTS author_book (
  AUTHOR_ID int NOT NULL,
  BOOK_ID int NOT NULL,
  INDEX AUTHOR_ID (AUTHOR_ID,BOOK_ID),
  INDEX BOOK_ID (BOOK_ID),
  FOREIGN KEY (AUTHOR_ID) REFERENCES author (ID),
  FOREIGN KEY (BOOK_ID) REFERENCES book (ID)
);

CREATE TABLE IF NOT EXISTS book_store (
  BOOK_ID int NOT NULL,
  STORE_ID int NOT NULL,
  PRICE decimal(10,0) NOT NULL,
  QUANTITY int NOT NULL DEFAULT '0',
  INDEX BOOK_ID (BOOK_ID,STORE_ID),
  INDEX STORE_ID (STORE_ID),
  FOREIGN KEY (STORE_ID) REFERENCES store (ID),
  FOREIGN KEY (BOOK_ID) REFERENCES book (ID)
);



INSERT INTO author (ID, `NAME`) VALUES
(1, 'Роберт Мартин'),
(2, 'Скотт Чакон'),
(3, 'Бен Штраус'),
(4, 'Артур Конан Дойл'),
(5, 'Шон Байателл');

INSERT INTO store (ID, CITY) VALUES
(1, 'Калининград'),
(2, 'Советск'),
(3, 'Светлогорск'),
(4, 'Черняховск'),
(5, 'Зеленоградск');

INSERT INTO publisher (ID, `NAME`) VALUES
(1, 'Питер'),
(2, 'Лениздат'),
(3, 'Азбука');

INSERT INTO book (ID, `NAME`, ISSUE_YEAR, PUBLISHER_ID, ISBN) VALUES
(1, 'Чистая архитектура', 2018, 1, NULL),
(2, 'Git для профессионального программиста', 2019, 1, NULL),
(3, 'Шерлок Холмс. Повести и рассказы', 2018, 2, NULL),
(4, 'Дневник книготорговца', 2018, 3, NULL),
(5, 'Чистый код', 2016, 1, NULL);

INSERT INTO author_book (AUTHOR_ID, BOOK_ID) VALUES
(1, 1),
(1, 5),
(2, 2),
(3, 2),
(4, 3),
(5, 4);

INSERT INTO book_store (BOOK_ID, STORE_ID, PRICE, QUANTITY) VALUES
(1, 1, '354', 8),
(2, 1, '520', 6),
(3, 3, '330', 3),
(4, 5, '480', 9),
(5, 1, '680', 2);


